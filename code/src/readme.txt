***THIS FILE BRIEFLY DESCRIBES THE CONTENTS OF THE FOLDER src***

->.php files:
	*answer.php - calculates answer for question of type text
	*calculate.php - verifies credentials and redirects to answer.php
	*login.php - consists of form input to get to calculate.php
	*retrieve.php - retrieve course number for student ID.
	*main.php - consists of 3 forms:
		f1 - for student ID input
		f2 - course number
		f3 - login

->background.png is a background for the main page

->hyperlink.css and spacing.css are .css files for certain kinds of limited formatting.

->dump.sql is a dump of the original database Application.

->.sh files:
	*createdb.sh creates databases for student ID's in file students.txt

	*generate600.sh creates the question-answer pair and puts them in the file numbers600.txt 
	The contents of numbers600.txt are in the format:
	FIB<TAB><question><TAB><answers in the form <ACK><sha1(question)>>
	The way to run this file is specific:
	sudo bash ./generate600.sh

	*queryid.sh queries the database to get count of Databases starting with Application.
	This count is n+2:
	n - databases for Students
	+1 - main Database Application
	+1 - test Database in my ID (TA's ID - 14057308)

	*deletedb.sh deletes all Application<studentID> databases included in file students.txt + the TA database (Application<14057308>).
