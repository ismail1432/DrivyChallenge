<?php 

trait Percent{
//function to calculate percentage
	
public function percentage($amount, $decrease) {

	 $result = $amount * $decrease / 100;
	 return $amount - $result;
}

}