<?php

namespace model;

include '../setup.php';
include 'Module.php';

class Cursus
{
    protected $id;

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }
    protected $titre;
    protected $niveau;
    protected $modules;

    public function __construct($titre, $niveau,$id=null)
    {
        $this->titre = $titre;
        $this->niveau = $niveau;
        $this->modules =[];
        $this->id = $id;
    }


    public function getTitre()
    {
        return $this->titre;
    }


    public function setTitre($titre)
    {
        $this->titre = $titre;
    }


    public function getNiveau()
    {
        return $this->niveau;
    }


    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
    }

    public function getModules()
    {
        return $this->modules;
    }




    public function setModulesArray($module){

array_push($this->modules,$module);

    }

    public function toArray():array {
        return [
            'idCursus'=>$this->id,
            'titre' => $this->titre,
            'niveau'=> $this->niveau,
            'modules'=> $this ->modules
        ];
    }
}