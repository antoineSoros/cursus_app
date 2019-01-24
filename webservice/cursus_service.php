<?php

include '../setup.php';

use dao\CursusDao;
use model\Module;
use model\Cursus;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');


if($_SERVER['REQUEST_METHOD']==='GET') {


    try {
        $cursusDao = new CursusDao();

        $cursusTab = $cursusDao->getCursus();
        $cursusJson = $cursusDao->addModulesToCursus($cursusTab);
        $result = $cursusDao->objectToTable($cursusJson);
     echo(json_encode($result));
//      var_dump($result);
    } catch (PDOException $ex) {

        http_response_code(500);
    }

//}elseif($_SERVER['REQUEST_METHOD']==='POST'){
//
//    $json = file_get_contents('php://input');
//    $tab = json_decode($json,true);
//    $cursus = new Cursus()
//    var_dump($cursus);
//
//    try{
//        $dao = new CursusDao();
//        $dao->addPerson($cursus);
//        http_response_code(201);
//    }catch (PDOException $ex){
//        http_response_code(500);
    }
