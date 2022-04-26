<?php
 include_once"Common_Functions.php";
 
 $file=new Functions();
 $file->DeleteFunction($_REQUEST["ID"]);
 $file->ListAllFunctions();

 header("location:ListMenu.php");
?>
