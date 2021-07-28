<?php 

header('Content-Type: application/json');

$feladatok=array();

$iter=1;

for($i=1;$i<=100;$i++){
	for($l=1;$l<=100;$l++){

		//szorzas
		if($i*$l<=100){
			$feladatok[$iter]=array("id"=>$iter,"muvelet"=>$i."x".$l,"eredmeny"=>$i*$l);
			$iter++;
		}

		//osszeadas
		if($i+$l<=100){
			$feladatok[$iter]=array("id"=>$iter,"muvelet"=>$i."+".$l,"eredmeny"=>$i+$l);
			$iter++;
		}

	}
}

echo json_encode($feladatok[rand(0,(sizeof($feladatok)-1))]);


/*
echo "<pre>";
var_dump($feladatok);
echo "<pre/>";
*/

?>
