<?php
require_once('DBCPanel.php');

class Badge {

	 private $badgeid,
	 	$course,
	 	$sga1,
	 	$sga2,
	 	$sga3,
	 	$date,	 
	 	$attribute,
	 	$description;
	 static $db;

	public function __construct($id=0) {
	}
	
	public function sqlId() {
		$mysql ="select id from badge order by id desc limit 1";
		return $mysql;
	}
	
	public function insertBadge($idcourse,$idattribute,$idsga1,$idsga2,$idsga3,$date,$description) {
		if (!isset($db)) $db = DBCPanel::singleton();
		$db->init();
		
		$mysql = $this->sqlId();

		$result2 = $db->execute_query($mysql);	
		$rowItem = $db->fetch_row($result2);
		$lastregister = $rowItem[0]+1;
		
		$mysql = "insert into badge (id,id_course,id_attribute,id_sga1,id_sga2,id_sga3,date,description) values (".$lastregister.",'".$idcourse."',".$idattribute.",".$idsga1.",".$idsga2.",".$idsga3.",'".$date."','".$description."')";

		$db->execute_query($mysql);
		$db->close();
	}
	
	
	public function insertElement($itemArray) {
		$this->badgeid = $itemArray[0];	    
		$this->course = $itemArray[1];
		$this->sga1 = $itemArray[2];
		$this->sga2 = $itemArray[3];		
		$this->sga3 = $itemArray[4];
		$this->date = $itemArray[5];
		$this->description = $itemArray[6];
		$this->attribute = $itemArray[7];		
	}


	//get functions
	public function getBadgeId() {
		return $this->badgeid;
	}

	public function getCourse() {
		return $this->course;
	}
	
	public function getAttribute() {
	    return $this->attribute;
	}

	public function getSGA1() {
		return $this->sga1;
	}

	public function getSGA2() {
		return $this->sga2;
	}

	public function getSGA3() {
		return $this->sga3;
	}

	public function getDate() {
		return $this->date;
	}
	
	public function getDescription() {
		return $this->description;
	}
	

	public function getSGADescription($sgaid) {
	    $descriptionSGA="";
	    $descriptionSGA = Config::SUBATTRIBUTES[$sgaid];
	    return $descriptionSGA;
	}
	
	
	public function getAttributeDescription($sgaid) {
	    $descriptionSGA="";
	    $descriptionSGA = Config::ATTRIBUTES[$sgaid];
	    return $descriptionSGA;
	}


}

?>
