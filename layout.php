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
	<div id="body">
	 <?php echo @$data['bodyContent']; ?>
	</div>
	<div id="footer">
	  &copy; <a href="about.php">NSTU Web Developers 2012</a>
	</div>
  </div>
 </body>
</html>