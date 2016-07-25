<?php 

ini_set('display_errors', '1');		//Show errors on screen


//We include folders
$json = file_get_contents('data.json'); //Get datas from data.json
include('car.php');
include('rent_car.php');
include('rentals.php');


$arr_json = json_decode($json, true); //We decode json in an array

$arr_cars = $arr_json["cars"];	// Cars array

$arr_rentals = $arr_json["rentals"]; // Rentals array


foreach($arr_rentals as $rentals_element) {			// Foreach on Rentals
							foreach($arr_cars as $cars_element) {	//Foreach on Cars
								
								if($rentals_element["car_id"] == $cars_element["id"]) //If the rent is equal to the car we book the car
								{

									//We are getting informations to book the car
									$rent_car = new rent_car($rentals_element);		
									$cars = new car($cars_element);
									
									$cPricekm = $cars->getPrice_per_km();
									$rent_car->setPrice_per_km($cPricekm);

									$cPriceday = $cars->getPrice_per_day();
									$rent_car->setPrice_per_day($cPriceday);

									$id = $rent_car->getId();
									$price = $rent_car->finalPrice();

									$rentals =  new rentals($id, $price);	//we reserve the vehicle

									//here we send the informations to output.json in json format
									$rentals  = array($rentals);
									$outputjson = json_encode($rentals);

									$folder = fopen('output.json', 'a+');
									fputs($folder, $outputjson);
									
								}

					}
			}
