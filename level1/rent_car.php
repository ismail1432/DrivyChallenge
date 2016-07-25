<?php
class rent_car{
	
	private $id;
	private $car_id;
	private $start_date;
	private $end_date;
	private $distance;
	private $price_per_day;
	private $price_per_km;

	public function distancePrice(){

		return (($this->price_per_km) * ($this->distance));
	}

	public function nbreJours(){
		$date_dep = date_create($this->start_date);
		$date_ret = date_create($this->end_date);
		$interval = date_diff($date_dep, $date_ret);

		$days = $interval->format('%a');
		return $days + 1;
	}
	public function duringPrice(){

		return $this->price_per_day * $this->nbreJours();

	}

	public function finalPrice(){
		return ($this->duringPrice()) + ($this->distancePrice());
	}

	public function __construct(array $data)
	{
  		foreach ($data as $key => $value)
  			{
   				$method = 'set'.ucfirst($key); // On récupère le nom du setter correspondant à l'attribut.
        			
        			if (method_exists($this, $method)){	 // Si le setter correspondant existe.
   						 
   						$this->$method($value);		 // On appelle le setter.
   						
   						}
   			}
   	}
    

	function setId($id){
		$this->id = $id;
	}

	function setCar_id($car_id){
		$this->car_id = $car_id;
	}

	function setPrice_per_day($price_per_day){
		$this->price_per_day = $price_per_day;
	}

	function setPrice_per_km($price_per_km){
		$this->price_per_km = $price_per_km;
	}

	function setStart_date($start_date){
		$this->start_date = $start_date;
	}

	function setEnd_date($end_date){
		$this->end_date = $end_date;
	}

	function setDistance($distance){
		$this->distance = $distance;
	}

	function getId(){
		return $this->id;
	}

	function getCar_id(){
		return $this->car_id;
	}

	function getStart_date(){
		return $this->start_date;
	}

	function getEnd_date(){
		return $this->end_date;
	}

	function getDistance(){
		return $this->distance;
	}

	function getPrice_per_day(){
		return $this->price_per_day;
	}

	
}