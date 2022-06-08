<?php
include_once "Functions.php";
include_once "UserFunctions.php";

$file=new Functions();
$file->setFunction_Name($_REQUEST["Function_Name"]);
$r= $file->SearchForFunction();

if($r == false)
{
  echo "Function Not Found";
}
else
{
  
  $X=explode("~",$r);

  $User=$_REQUEST["UserType"];
  $file_2=new UserFunctions();
  $file_2->Assign($X[0],$User);
  
}

?>
