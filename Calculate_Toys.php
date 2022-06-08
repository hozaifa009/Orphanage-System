<?php

include_once "iCalculate.php";
include_once "FileManager.php";
class Needed_Toys implements Calculate
{
    private $FileMangagerObj;
    function __construct()
    {
        $this->FileMangagerObj=new FileManager();
        $this->FileMangagerObj->setFilename("Orphan.txt");
        $this->FileMangagerObj->setSeparator("~");
    }
	function Calculate_Needed($Amount) 
    {
	   $total_Or=$this->getFileMangagerObj()->Count_File();
       $Needed=$total_Or-$Amount;
       $Needed=$Needed*2;
       return $Needed;
    }
    function getFileMangagerObj()
    {
		return $this->FileMangagerObj;
	}
	function setFileMangagerObj($FileMangagerObj): self 
    {
		$this->FileMangagerObj = $FileMangagerObj;
		return $this;
	}
}

?>
