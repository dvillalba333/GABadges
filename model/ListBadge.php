<?php
require_once('DBCPanel.php');
require_once('Badge.php');


class ListBadge {

	var $listArray = array();
	var $countAttributes = array(0,0,0,0,0,0,0,0,0,0,0,0,0);
	static $db;

	public function __construct($id=0) {
	}
	

	public function sqlBadges($code,$code2) {
        $mysql ="select id,id_course, id_sga1,id_sga2,id_sga3,date,description,id_attribute from badge order by id desc";
	    if (strlen($code) > 1) {
	        if ($code2 > 0) {
	            $mysql ="select id,id_course, id_sga1,id_sga2,id_sga3,date,description,id_attribute from badge where id_course like '".$code."%' and id_attribute=".$code2." order by id desc";
	        } else {
	             $mysql ="select id,id_course, id_sga1,id_sga2,id_sga3,date,description,id_attribute from badge where id_course like '".$code."%' order by id desc";
	        }
	    }
		return $mysql;
	}

	
	public function selectBadges($code,$code2) {
		if (!isset($db)) $db = DBCPanel::singleton();
		$db->init();

		$mysql = $this->sqlBadges($code,$code2);
		$result2 = $db->execute_query($mysql);
		
		while ($rowItem = $db->fetch_array($result2)) {
		    $item = new Badge();
		    $item->insertElement($rowItem);
		    $this->countAttributes[$rowItem[7]]++;
		    $this->listArray[] = $item;
		}
		
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
	public function getBadgeList() {
		return $this->listArray;
	}
	
	public function getAttributesCount() {
		return $this->countAttributes;
	}	


}