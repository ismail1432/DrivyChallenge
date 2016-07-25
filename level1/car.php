<?php


class car{
	
	private $id;
	private $price_per_day;
	private $price_per_km;
	

	public function __construct(array $data)
	{
  		foreach ($data as $key => $value)
  			{
   				$method = 'set'.ucfirst($key); // We take the setter name in the attribute
        			
        			if (method_exists($this, $method)){	 // If the setter exist we call it.
   						 
   						$this->$method($value);		 // call setter.
   						
   						}
   			}
   	}
    
    //SETTERS

	function setId($id){
		$this->id = $id;
	}

	function setPrice_per_day($price_per_day){
		$this->price_per_day = $price_per_day;
	}

	function setPrice_per_km($price_per_km){
		$this->price_per_km = $price_per_km;
	}

	//GETTERS
	function getId(){
		return $this->id;
	}

	function getPrice_per_day(){
		return $this->price_per_day;
	}

	function getPrice_per_km(){
		return $this->price_per_km;
	}

	
}