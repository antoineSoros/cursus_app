<?php
include '../setup.php';
include MODEL.'Cursus.php';
include MODEL.'Module.php';
include DAO.'CursusDao.php';

use model\Cursus;
use model\Module;
use dao\CursusDao;



$testDAo = new CursusDao();

$cursusTab = $testDAo->getCursus();
var_dump($testDAo->addModulesToCursus($cursusTab));