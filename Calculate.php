<?php

 include_once "Calculate_Desk.php";
 include_once "Calculate_Beds.php";
 include_once "Calculate_Toys.php";
 include_once "Calculate_Clothes.php";

 $Method=$_REQUEST["Method"];
 $Amount=$_REQUEST["Amount"];

 if($Method == "Desks")
 {
   $Desks=new Needed_Desks();
   $obj= $Desks->Calculate_Needed($Amount);
 }

 if($Method == "Beds")
 {
   $Beds=new Needed_Beds();
   $obj= $Beds->Calculate_Needed($Amount);
 }

 if($Method == "Toys")
 {
   $Toys=new Needed_Toys();
   $obj= $Toys->Calculate_Needed($Amount);
 }

 if($Method == "Clothes")
 {
   $Clothes = new Needed_Clothes();
   $obj= $Clothes->Calculate_Needed($Amount);
 }

 echo $obj;

?>
