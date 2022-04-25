<?php
include_once "Common_Functions.php";

$file=new Functions();
$file->setFunction_Name($_REQUEST["FunctionName"]);
$file->StoreFunction($file->getFileManagerObj(),$Act);

header("location:ListMenu.php");
?>
