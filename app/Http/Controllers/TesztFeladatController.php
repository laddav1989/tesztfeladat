<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TesztFeladatController extends Controller
{
    private $feladatok=array();

    public function __construct()
    {
        //feladatok létrehozása
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
        $this->feladatok=$feladatok;

    }

    public function randomfeladat()
    {

        return response()->json($this->feladatok[rand(1,sizeof($this->feladatok))]);
      
    }

    public function megoldasellenorzes(Request $request)
    {
        $data = $request->all();


        $helyes=false;
        $errors=array();

        if(!isset($data['id'])){
            $errors[]="Kérem adja meg az azonosítót!";
        }else if(!isset($this->feladatok[$data['id']])){
            $errors[]="Az azonosító nem létezik!";
        }

        if(!isset($data['megoldas'])){
            $errors[]="Kérem adja meg a megoldást!";
        }

        if(sizeof($errors)==0){

            if($this->feladatok[$data['id']]["eredmeny"]!=$data['megoldas']){
                $errors[]="A megoldás helytelen!";
            }else{
                $helyes=true;
            }

        }

        return response()->json(array("helyes"=>$helyes,"errors"=>$errors));
    }
}
