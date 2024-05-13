<?php
require_once('View.php');

require_once('model/Badge.php');
require_once('model/ListBadge.php');


class Controller {
	private $option;
	private $code;
	private $code2;
	private $parameters;
	private $parameterList;
	private $date;	
	
	public function init() {

		switch (floor($this->option)) {
			case 0:
				$this->createView($this->code);
			break;
			case 1:
				$this->insertBadge($this->code,$this->parameterList,$this->date);
			break;	
			case 2:
				$this->listOfBadges($this->code,$this->code2);
			break;			
			default:
			    $this->errorMessage();
		}
	}

	//set values to all internal parameters
	public function setOption($option) {
		$this->option=$option;
	}
	public function setCode($code) {
		$this->code=$code;
	}
	public function setCode2($code2) {
		$this->code2=$code2;
	}
	public function setDate($date) {
		$this->date=$date;
	}	
	public function setParameters($parameters) {
		$strparameter = urldecode($parameters);
		//echo $strparameter;
		$this->parameterList = explode("_", $strparameter);
		
	}

///////////////////////////////////////////////////
// Create View
///////////////////////////////////////////////////
    private function createView($courseid)
    {
		$view = new View();
		$view->insertHead($courseid);
    }

    private function errorMessage()
    {
		$view = new View();
		$view->errorMessage();
    }
    
    private function listOfBadges($code,$code2)
    {
        $listBadge = new ListBadge();
        $listBadge->selectBadges($code,$code2);
        $listBadges = $listBadge->getBadgeList();
        $countAttributes = $listBadge->getAttributesCount();        
		$view = new View();
		$view->createList($listBadges,$countAttributes);
    }


///////////////////////////////////////////////////
// Database Functions
///////////////////////////////////////////////////

	private function insertBadge($courseid,$paramList,$date) {
		$badge = new Badge();
		$badge->insertBadge($courseid,$paramList[0],$paramList[1],$paramList[2],$paramList[3],$date,$paramList[4]);
	}



}

?>
