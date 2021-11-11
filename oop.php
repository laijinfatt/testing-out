<?php

    class Car{
    public $Modal = "";
    public $Engine = "";
    public function setModal($newval)
    {
    $this->Modal = $newval;
     }
    public function setEngine($newval)
    {
    $this->Engine = $newval;
     }
    public function getModal()
    {
    return "Car Modal is ".$this->Modal . "<br />";
     }
    public function getEngine()
    {
    return "Car Engine is ".$this->Engine . "<br />";
     }
    }
    
    class Compact extends Car
    {
    private $Seat = "0";
    public function setSeat($newval)
    {
    $this->Seat = $newval;
    }
    public function getSeat()
    {
    return "Amount of seats is ".$this->Seat . "<br />";
    }
    }
    
    class MPV extends Car
    {
    private $minSeat = "0";
    private $maxSeat = "0";
    public function setSeat($min,$max)
    {
    $this->minSeat = $min;
    $this->maxSeat = $max;
    }
    public function getSeat()
    {
    return "Amount of seats is between ".$this->minSeat . " and " .$this->maxSeat . "<br />";
    }
    }

     $car1=new Compact;
     $car1->setModal("Saga");
     $car1->setEngine("1300CC");
     $car1->setSeat("5");
     echo $car1->getModal();
     echo $car1->getEngine();
     echo $car1->getSeat();

     $car2=new Compact;
     $car2->setModal("Axia");
     $car2->setEngine("100CC");
     $car2->setSeat("6");
     echo $car2->getModal();
     echo $car2->getEngine();
     echo $car2->getSeat();

     $car3=new MPV;
     $car3->setModal("WISH");
     $car3->setEngine("1800CC");
     $car3->setSeat(5,7);
     echo $car3->getModal();
     echo $car3->getEngine();
     echo $car3->getSeat();

?> 