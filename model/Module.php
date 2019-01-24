<?php


namespace model;
include '../setup.php';

class Module
{
 protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
 protected $intitule;
 protected $heures;
 protected $description;


    public function __construct( $intitule,  $heures, $description,$id=null)
    {
        $this->intitule = $intitule;
        $this->heures = $heures;
        $this->description = $description;
        $this->id=$id;
    }


    public function getIntitule()
    {
        return $this->intitule;
    }


    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;
    }


    public function getHeures()
    {
        return $this->heures;
    }


    public function setHeures($heures)
    {
        $this->heures = $heures;
    }


    public function getDescription()
    {
        return $this->description;
    }



    public function setDescription($description)
    {
        $this->description = $description;
    }


    public function toArray():array {
        return [
            'idModule'=>$this->id,
            'intitule' => $this->intitule,
            'heures'=> $this->heures,
            'description'=>$this->description

        ];
    }



}