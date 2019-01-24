<?php

namespace dao;
include '../setup.php';

use \PDO;
use model\Cursus;
use model\Module;

class CursusDao
{

    private $pdo;


    function __construct()
    {
        $conf = parse_ini_file(CONFIG_FILE_PATH);

        $dsn = $conf["dsn"];
        $user = $conf["user"];
        $password = $conf["password"];


        $this->pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8']);
    }


    public function getCursus()
    {

        $cursusTab = [];
        $sql = 'Select * from cursus';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $cursus = new Cursus($row['Titre'], $row['Niveau'], $row['IDCURSUS']);
            array_push($cursusTab, $cursus);
        }

        return $cursusTab;
    }


    public function addModulesToCursus(array $cursusTab)
    {

        foreach ($cursusTab as $cursus) {

                $sql = "SELECT * FROM `cursusmodule` INNER JOIN cursus on cursusmodule.IDCURSUS = cursus.IDCURSUS INNER JOIN `module` on cursusmodule.IDMODULE = module.IDMODULE where cursusmodule.IDCURSUS ={$cursus->getId()} ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $module = new Module($row['intitule'], $row['heures'], $row['description'], $row['IDMODULE']);
            $cursus->setModulesArray($module);}
        }
        return $cursusTab;

    }

    public function objectToTable($tabCusus) : array {
        $tabResult=[];
        foreach ($tabCusus as $cursus){
            $tabMod=[];
            foreach ($cursus->getModules() as $module) {
                array_push($tabMod,$module->toArray());
            }
            $tabStrCursus = [
                'idCursus'=> $cursus->getId(),
                'titre' => $cursus->getTitre(),
                'niveau'=> $cursus->getNiveau(),
                'modules'=> $tabMod
            ];
            array_push($tabResult,$tabStrCursus);
        }
        return $tabResult;
    }


}
