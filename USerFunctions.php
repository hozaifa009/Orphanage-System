<?php

include_once "FileManager.php";
include_once "Functions.php";
  class UserFunctions
  { 
    private $User_ID;
    Private $FileManagerObj;
    Private $FileManagerObj2;
    function __construct()
    {

      $this->FileManagerObj= new FileManager();
      $this->FileManagerObj->setFilename("usertype.txt");
      $this->FileManagerObj->setSeparator("~");
      $this->FileManagerObj2=new FileManager();
      $this->FileManagerObj2->setFilename("User Type Menu.txt");
      $this->FileManagerObj2->setSeparator("~");
    
    }
    function Assign($Function_ID,$UserType)
    {
      $UserType_ID=$this->getFileManagerObj()->getIDbyName($UserType,0);

      $line= $this->getFileManagerObj2()->getRowById($UserType_ID);

      if($line != false)
     { 
        $r=$this->getFileManagerObj2()->Search_Content($line,$Function_ID);
      
       if($r == false)
       { 
         $line1=(substr($line,0,strlen($line)-2))."~".$Function_ID;
         $this->getFileManagerObj2()->DeleteRecord($line);
         $this->getFileManagerObj2()->StoreRecord($line1);
       }
       else
       {
         echo "Function Already Assigned";
       }
     }
     else
     {
        $record=$UserType_ID.$this->getFileManagerObj2()->getSeparator().$Function_ID;
        $this->getFileManagerObj2()->StoreRecord($record);
     }
    }
    function List_Functions($User_ID)
    {
      include_once "List_User_Functions.php";

      $Obj=new Functions();
     
      $line2=$this->getFileManagerObj2()->getRowById($User_ID);
      $Array1=explode($this->getFileManagerObj2()->getSeparator(),$line2);
     
      $Array2=array();
  
      $z=0;

      for($k=1;$k<count($Array1);$k++)
      {
        if($k == count($Array1)-1)
        {
          $Array1[$k]=substr($Array1[$k],0,-2);
        }

        $Array2[$z]=$Obj->GetFunctionByID($Array1[$k])->getFunction_Name();
        $Array2[$z]=substr($Array2[$z],0,-2);
        $z++;
      }

      return $Array2;
    }
	  function SearchForFunction()
    {
      $Search=$this->getUser_ID();
      $r = $this->getFileManagerObj()->SearchFile($Search);

      if($r==false)
      {
        return false;
      }
      else
      {
       return $r;
      } 
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
	function getUser_ID() 
  {
	  return $this->User_ID;
	}
	function setUser_ID($User_ID): self
    {
	  $this->User_ID = $User_ID;
	  return $this;
	}
    public function getFileManagerObj2()
    {
      return $this->FileManagerObj2;
    }
    public function setFileManagerObj2($FileManagerObj2)
    {
      $this->FileManagerObj2 = $FileManagerObj2;
      return $this;
    }
   }
?>
