<?php

class View {
	private $title =Config::TITLE;
	private $attributes = Config::ATTRIBUTES;
	private $path = Config::PATH;
	private $code = 0; 

	public function insertHead($code) {
        echo '<!DOCTYPE html>';
        echo '<html>';
        echo '<head>';
            echo '<link rel="stylesheet" href="styles.css">';
		    echo '<title>'.$this->title.'</title>';
 	        echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
 	        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.js"></script>';
            echo '<script src="js/functions.js" language="javascript"></script>';
        echo '</head>';

		echo '<body>';
		$this->insertBody($code);
		$this->insertFieldset();		
		echo '</body>';
		echo '</html>';
	}
	
	
	public function createList($badgeList,$countList) {
        echo '<!DOCTYPE html>';
        echo '<html>';
        echo '<head>';
            echo '<link rel="stylesheet" href="styles.css">';
		    echo '<title>'.$this->title.'</title>';
 	        echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
 	        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.js"></script>';
        echo '</head>';

		echo '<body>';
		$this->insertList($badgeList,$countList);
		echo '</body>';
		echo '</html>';
	}
	
	
	public function errorMessage() {
        echo '<!DOCTYPE html>';
        echo '<html>';
        echo '<head>';
            echo '<link rel="stylesheet" href="styles.css">';
		    echo '<title>'.$this->title.'</title>';
 	        echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
 	        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.js"></script>';
        echo '</head>';

		echo '<body>';
		echo '<h1>This option is not valid</h1>';
		echo '</body>';
		echo '</html>';
	}	
	
	public function insertList($badgeList,$countList) {
        echo '<h1>List of Badges</h1>';
        
        //Filter Options
        echo '<fieldset>';
        echo '<legend>Filter Options</legend>';
        echo '<form id="formFilter" action="'.$this->path.'index.php">';
        echo '<table>';
        echo '<tr>';
        echo '<td>';
        echo '<label>Department Code</label>';
        echo '<input type="text" name="code" id="code" maxlength="30"></input>';
        echo '</td><td>';        
        echo '<label>Attribute</label>';        
        echo '<select name="code2">';
                    echo '<option value="0">Select Option</option> ';  
                    for($i = 1; $i < count($this->attributes); $i++) {
                         echo '<option value="'.$i.'">'.$this->attributes[$i].'</option>';
                    }
            echo '</select>';        
        echo '<input type="hidden" name="option" value="2"/>';        
        echo '</td><td>';                
        echo '<input type="submit"/>';                
        echo '</td>';                
        echo '<tr>';        
        echo '</table>';        
        echo '</form>';        
        echo '</fieldset>';     

        //All Attributes
        echo '<table border="1">';
		foreach ($badgeList as $badge) {
		    $attribute= $badge->getAttribute();
			echo '<tr><td>'.$badge->getCourse().'</td>';
			echo '<td>'.$badge->getBadgeId().'</td>';			
			if (($attribute>0) && ($attribute<=4)) $bgcolor = "#46009b";
			if (($attribute>4) && ($attribute<9)) $bgcolor = "red";
			if ($attribute>=9) $bgcolor = "#0090bd";
			 echo '<td bgcolor="'.$bgcolor.'" style="color:white">'.$badge->getAttributeDescription($attribute).'</td><td>'.$badge->getAttribute().'</td>';
			echo '<td>'.$badge->getDescription().'</td>';			
			echo '<td>'.$badge->getDate().'</td>';			
			echo '</tr>';
		}   
        echo '</table>';        
        
        //Attributes Stats
        $totalNumber = max($countList);
        
        echo '<table>';
            for($i = 1; $i < count($countList); $i++) {
                $itemNumber = floor(($countList[$i]/$totalNumber)*10);
			    if (($i>0) && ($i<=4)) $bgcolor = "#46009b";
			    if (($i>4) && ($i<9)) $bgcolor = "red";
			    if ($i>=9) $bgcolor = "#0090bd";
                echo '<tr><td bgcolor="'.$bgcolor.'" style="color:white;width:10%" colspan="'.$itemNumber.'">'.$this->attributes[$i].'('.$countList[$i].')</td>';
                for ($j=$itemNumber;$j<10;$j++) {
                       echo '<td></td>';
                }                    
                echo '</tr>';
            }
        echo '</table>';     
	}
	
	public function insertBody($code) {
        echo '<form>';
            echo '<fieldset>';
                echo '<legend>Sheffield Graduate Attributes Mapping</legend>';
            echo '<label for="attribute"> Select the One of the <a href="https://students.sheffield.ac.uk/skills/sga">Sheffield Graduate Attributes</a></label>';
            echo '<br/>';
            echo '<select name="attribute" id="attribute"/>';
                    echo '<option value="0">Select Option</option> ';  
                    for($i = 1; $i < count($this->attributes); $i++) {
                         echo '<option value="'.$i.'">'.$this->attributes[$i].'</option>';
                    }
            echo '</select>';
            echo '<p id="attributedetails"></p>';
            echo '<hr/>';
            echo '<label id="labelExplanation" for="explanation"> Type the explanation for the selected attribute</label>';
            echo '<br/>';
            echo '<textarea rows="4" cols="50" id="explanation"></textarea>';
            echo '<br/>';
            echo '<input type="hidden" id="code" value="'.$code.'"/>';
            echo '<input type="button" id="createAttribute" value="Create"/>';
            echo '</fieldset>';       
        echo '</form>';
	}
	
	public function insertFieldset() {
        echo '<br/>';
        echo '<fieldset id="copyCode">';
            echo '<legend>Use <> to insert this code in Blackboard</legend>';
            echo '<p rows="4" cols="50" id="result"></p>';
 
            echo '<button id="copyButton">Copy to Clipboard</button>';
        echo '</fieldset>	';    
	}
	
	public function setTitle($title) {
		$this->title = $title;
	}


}

?>
