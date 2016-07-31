<?php

require 'percent.php';


class rent_car{
	

	use Percent;

	private $id;
	private $car_id;
	private $start_date;
	private $end_date;
	private $distance;
	private $price_per_day;
	private $price_per_km;
	private $decrease;
	private $amount;
	private $amount_decrease_ten;
	private $amount_decrease_thirty;
	private $amount_decrease_fifty;
	private $a, $b, $c;
	private $total_b, $total_c;
	private $finalPrice;




function decrease(){

	$days = $this->getDaysnumber();
	$price_per_day = $this->price_per_day;

for($i = 1; $i <= $days; $i ++){		//For Loop to calculate number of days

	if($i == 1){
		$this->finalPrice = $price_per_day * $i;			//For the first day No decrease SORRY !
	}

	
	if($i > 1 && $i < 5){				
		$this->a++;	
						//We iterate to know how may days there is
		$this->amount_decrease_ten = $this->a * $price_per_day;	

			if($days < 4){

		
			$this->finalPrice += ($this->percentage($this->amount_decrease_ten, 10));	//Between The 2nd and the Fourth day, 10%
			
			}

			if($i == 4){
			$this->finalPrice += ($this->percentage($this->amount_decrease_ten, 10));
			}
		
	}

	if($i > 4 && $i < 11){
		$this->b++;				//We iterate to know how may days there is
		$this->amount_decrease_thirty = $this->b * $price_per_day;

			if($i == 10){
			$this->total_b += $this->percentage($this->amount_decrease_thirty, 30);		//Between 5 and 10 days, 30% Good Deal !
			$this->finalPrice += $this->total_b;
		}
	}
		
	if($i > 10){
		$this->c++;				//We iterate to know how may days there is
		$this->amount_decrease_fifty = $this->c * $price_per_day;
		
			if($i == ($days)){
			$this->total_c += $this->percentage($this->amount_decrease_fifty, 50);		//More 10 days, 50% Waouwwww ! Very Good Deal !
			$this->finalPrice += $this->total_c;
			}
		}
}

		
		return $this->finalPrice + $this->distancePrice();
		

}

	public function distancePrice(){

		return (($this->price_per_km) * ($this->distance));
	}

	public function Daysnumber(){
		$date_dep = date_create($this->start_date);
		$date_ret = date_create($this->end_date);
		$interval = date_diff($date_dep, $date_ret);

		$days = $interval->format('%a');
		return $days + 1;
	}
	public function duringPrice(){

		return $this->price_per_day * $this->Daysnumber();

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

	function getDaysnumber(){
		return $this->Daysnumber();
	}

	
}