# GABadges
Graduate Attributes and how they can be described by badges. You will need to download this code in your server.

# Information
This folder contains the different files that you need to create for a badge system 
to match the graduate attributes of your institution.

The path used for this application is: https://sam.group.shef.ac.uk/gtabadges/
You will need to change that on the config.php and function.js files

This system works with PHP and a Mysql Database using a MVC framework.

The config.php file stores the necessary to connect to the database, and it has been anonymised so you can put your details. You can see the description of those details on here:
| 	Line	 | 	Description	 | 
| 	:-----:	 | 	:-----:	 | 	
| const DB_NAME_CPANEL = "xxxxxx" | Name of the Database |
| const DB_USER_CPANEL = "xxxxxx" | Username or a user with access to the database |
| const DB_PASS_CPANEL = "xxxxxx" | Password for the user that you have specified |

Controller.php is the file that controls the input from the user
View.php is the file that creates the different interfaces of this application.

# Database
#The structure of the table used in the database is:
| 	Field	 | 	Type	 | Description	 | 
| 	:-----:	 | 	:-----:	 | 		:-----:	 | 	
|id |INT(11)| General key of the item| 
|id_course |VARCHAR(10)| id for the course that is inputting the attributes| 
|id_attribute |INT(11)| General Attributes (1-12)| 
|id_sga1 |INT(11)| First subattribute| 
|id_sga2 |INT(11)| Second subattribute| 
|id_sga3 |INT(11)| Third subattribute| 
|date |DATE| When it was created| 
|description |TEXT| Context for that attribute | 

