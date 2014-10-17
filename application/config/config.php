	<?php
    session_start();
	date_default_timezone_set('Asia/Dhaka');
	/* Database Configuration*/	
	$conf['db_user'] = 'root';
	$conf['db_password'] = '';
	$conf['db_name'] = 'db_cr';
	$conf['db_hostname']= 'localhost';
	$conf['ROOT_PATH'] = 'http://localhost/cr';
	$data['pageTitle'] = 'CR | ';
	
    define('INSERT_DEPARTMENT','INSERT INTO departments ( id,
	                                             name,
												 datetime
												)VALUES (NULL, "%s", %s);
						    					');
												   
    define('INSERT_STUDENT','INSERT INTO students ( id,
	                                             department_id,
												 name,
												 roll,
												 password,
												 datetime
												)VALUES (NULL, "%s", "%s", "%s", "%s", %s);
						    					');			
												
	 define('INSERT_COURSE','INSERT INTO courses ( id,
	                                             name,
												 title,
												 code,
												 datetime
												)VALUES (NULL, "%s", "%s", "%s",%s);
						    					');		
	define('LAYOUT', 'layout.php');

?>