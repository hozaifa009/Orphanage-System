<?php

include_once "iCalculate.php";
include_once "FileManager.php";
class Needed_Beds implements Calculate
{
    private $FileManagerObj; 
    function __construct()
    {
        $this->FileManagerObj=new FileManager();
        $this->FileManagerObj->setFilename("Orphan.txt");
        $this->FileManagerObj->setSeparator("~");
    }
	function Calculate_Needed($Amount) 
    {
        $total_Or=$this->FileManagerObj->Count_File();
        $Needed=$total_Or-$Amount;
        return $Needed;
    }
	function getFileManagerObj() 
    {
		return $this->FileManagerObj;
	}
	function setFileManagerObj($FileManagerObj): self 
    {
		$this->FileManagerObj = $FileManagerObj;
		return $this;
	}
}

?>
