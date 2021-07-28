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

$helyes=false;
$errors=array();

if(!isset($_REQUEST['id'])){
	$errors[]="Kérem adja meg az azonosítót!";
}else if(!isset($feladatok[$_REQUEST['id']])){
	$errors[]="Az azonosító nem létezik!";
}

if(!isset($_REQUEST['megoldas'])){
	$errors[]="Kérem adja meg a megoldást!";
}

if(sizeof($errors)==0){

	if($feladatok[$_REQUEST['id']]["eredmeny"]!=$_REQUEST['megoldas']){
		$errors[]="A megoldás helytelen!";
	}else{
		$helyes=true;
	}

}

echo json_encode(array("helyes"=>$helyes,"errors"=>$errors));

?>
