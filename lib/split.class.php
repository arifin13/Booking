<?php

class split
{
	private $MaxData;
	private $MaxSplit;
	private $JmlData;
	private $NamaFile;
	private $CssStyle;
	private $SplitLanjut;
	private $SplitRecord;
	private $SplitData;

	function __construct($NamaFile='index.php',$JmlData=100,$MaxData=20,$MaxSplit=9,$CssStyle='')
	{
		$this->MaxData=$MaxData;
		$this->MaxSplit=$MaxSplit;
		$this->JmlData=$JmlData;
		$this->NamaFile=$NamaFile;
		$this->CssStyle=$CssStyle;
	}

	function splitPage($SplitLanjut,$TambahUrl=array(),$KataBack='Back',$KataNext='Next')
	{
		$this->SplitLanjut=$SplitLanjut;
		$this->SplitData=$this->JmlData/$this->MaxData;
		if(is_float($this->SplitData))
    	    $this->SplitData=intval($this->SplitData)+1;
		if($this->SplitLanjut>$this->MaxSplit)
		{
			$SplitUrl='';
			foreach($TambahUrl as $val)
			{
				$val='&'.$val;
			    $SplitUrl=$SplitUrl.$val;
			}
			$back=$this->SplitLanjut-$this->MaxSplit;
			$SplitRecord=($this->SplitLanjut-2)*$this->MaxData;
			print "<a href='$this->NamaFile?SplitLanjut=$back&SplitRecord=$SplitRecord$SplitUrl' class='$this->CssStyle'>$KataBack</a>&nbsp;";
		}
		if($this->MaxSplit>($this->SplitData-$this->SplitLanjut))
			$this->MaxSplit=($this->SplitData-$this->SplitLanjut)+1;
		for($i=$this->SplitLanjut;$i<$this->SplitLanjut+$this->MaxSplit;$i++)
		{
			$SplitUrl='';
			foreach($TambahUrl as $val)
			{
				$val='&'.$val;
			    $SplitUrl=$SplitUrl.$val;
			}
			$SplitRecord=($i-1)*$this->MaxData;
		    print "<a href='$this->NamaFile?SplitLanjut=$this->SplitLanjut&SplitRecord=$SplitRecord$SplitUrl' class='$this->CssStyle'>$i</a>&nbsp;";
		}
		if(($this->SplitData>=$this->MaxSplit)&&($i<=$this->SplitData))
		{
			$SplitUrl='';
			foreach($TambahUrl as $val)
			{
				$val='&'.$val;
			    $SplitUrl=$SplitUrl.$val;
			}
			$SplitRecord=($i-1)*$this->MaxData;
			print "<a href='$this->NamaFile?SplitLanjut=$i&SplitRecord=$SplitRecord$SplitUrl' class='$this->CssStyle'>$KataNext</a>";
		}
	}

	function noPage($SplitRecord)
	{
		$this->SplitRecord=$SplitRecord;
		return ($this->SplitRecord+$this->MaxData)/$this->MaxData;
	}

	function totalPage()
	{
		$this->SplitData=$this->JmlData/$this->MaxData;
		if(is_float($this->SplitData))
    	    $this->SplitData=intval($this->SplitData)+1;
		return 	$this->SplitData;
	}
}

if(!isset($_GET['SplitLanjut']))
    $_GET['SplitLanjut']=1;

if(!isset($_GET['SplitRecord']))
    $_GET['SplitRecord']=0;
?>
