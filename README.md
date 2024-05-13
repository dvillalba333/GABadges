# GABadges
Graduate Attributes and how they can be described by badges

# Information
#This folder contains the different files that you need to create a badge system 
#to match the graduate attributes of your institution.

#The path used for this application is: https://sam.group.shef.ac.uk/gtabadges/
#You will need to change that on the config.php and function.js files

#This system works with PHP and a Mysql Database using a MVC framework, the config.php file stores the necessary 
#to connect to the database, and it has been anonymised so you can put your details:

| 	Line	 | 	Description	 | 
| 	:-----:	 | 	:-----:	 | 	
| const DB_NAME_CPANEL = "xxxxxx" | Name of the Database |
| const DB_USER_CPANEL = "xxxxxx" | Username or a user with access to the database |
| const DB_PASS_CPANEL = "xxxxxx" | Password for the user that you have specified |

#Controller.php is the file that controls the input from the user
#View.php is the file that creates the different interfaces of this application.

#The structure of the table used in the database is:
| 	Field	 | 	Type	 | 
| 	:-----:	 | 	:-----:	 | 	
|id |INT(11)|
|id_course |VARCHAR(10)|
|id_sga1 |INT(11)|
|id_sga2 |INT(11)|
|id_sga3 |INT(11)|
|date |DATE|
|description |TEXT|
|id_attribute |INT(11)|
