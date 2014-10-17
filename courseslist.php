<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#">
  <head>
    <title><?php echo @$data['pageTitle']; ?></title>
	<link type="text/css" href="stylesheets/application.css" rel="stylesheet" />
	<script type="text/javascript" src="javascripts/application.js"></script>
 </head>
 
 <body>
  <div id="container">
    <div id="header">
	 Course Registration
	</div>
	<div class="menu-bk">
	<div class="menu-container">
	    <div class="menu"><a href="index.php?home">Home</a></div>
		<div class="menu"><a href="index.php?dept">Department</a></div>
		<div class="menu"><a href="index.php?registration">Registration</a></div>
		<div class="menu"><a href="index.php?login">Login</a></div>
		<div class="menu"><a href="index.php?course">Add Course</a></div>
		<div class="menu"><a href="courseslist.php">Courselist</a></div>
		<div class="menu"><a href="about.php">About US</a></div>
		<div class="menu"><a href="logout.php">logout</a></div>
		<div class="clear"></div>
	 </div>
	 </div>
	<html>

		<div id="body-about">
	
<!-- Mirrored from w3helps.com/css/view.php?filename=trycss_border-style by HTTrack Website Copier/3.x [XR&CO'2008], Wed, 04 Feb 2009 17:55:02 GMT -->
<head>
<style type="text/css">

p.solid {
left: 50px;
height: 20px;
width: 50;
 background-color: black;
 padding: 15px;
 color: white}
footer{
 height: 22px;
 background-color: #555;
 text-align: center;
 color: #ddd;
 font-size: 14px;
 font-family: verdana;
 padding-top: 8px;
}
</style>
</head>

<body>



<?php
require_once('application/config/config.php');
require_once('application/functions/library.php');
$db_host = 'localhost';
$db_user = 'root';
$db_pwd = '';

$database = 'db_cr';
$table = 'courses';

$temp='<form action="courseslist.php" method="post">
Roll: <input type="text" name="name" />
<input type="submit" />
</form>';
echo $temp;

if (!mysql_connect($db_host, $db_user, $db_pwd))
    die("Can't connect to database");

if (!mysql_select_db($database))
    die("Can't select database");

// sending query

$r=getField('name');
$result = mysql_query("SELECT code,title FROM {$table} WHERE name='$r' ");
if (!$result) {
    die("Query to show fields from table failed");
}

$fields_num = mysql_num_fields($result);

echo "<h1>Student Roll: $r </h1>";
echo "<table border='1'><tr>";
// printing table headers
/*for($i=0; $i<$fields_num; $i++)
{
    $field = mysql_fetch_field($result);*/
    echo "<td><b>Course Code</b></td>";
	echo "<td><b>Course Title</b></td>";
//}
//echo "</tr>\n";
// printing table rows
while($row = mysql_fetch_row($result))
{
    echo "<tr>";

    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
    foreach($row as $cell)
        echo "<td>$cell</td>";

    echo "</tr>\n";
}

?>

</body>


<!-- Mirrored from w3helps.com/css/view.php?filename=trycss_border-style by HTTrack Website Copier/3.x [XR&CO'2008], Wed, 04 Feb 2009 17:55:02 GMT -->
</html>


	

	</div>		
  </div>

 </body>
  
</html>
