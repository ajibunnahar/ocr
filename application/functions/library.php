<?php


function getField($key)
	{
	return @$_REQUEST[$key];		
	}

function addDepartment()
    {
	  	return runSQL(sprintf(INSERT_DEPARTMENT, getField('name'),
											"NOW()"
											));
	}	

function addStudent()
    {
	  	return runSQL(sprintf(INSERT_STUDENT, getField('department_id'),
		                                      getField('name'),
											  getField('roll'),
											  md5(getField('password')),
											"NOW()"
											));
	}		

function addCourse()
    {
	  	return runSQL(sprintf(INSERT_COURSE, getField('name'),
		                                      getField('title'),
											  getField('code'),
											  "NOW()"
											));
	}		
		

	
function getDepartmentCreateForm()
   {
 
   if(isset($_REQUEST['department']))
    {
	 $duplicate = false;
	 $name = getField('name');
	 $result = runSQL("select * from departments");
	  while($row = mysql_fetch_array($result))
	  {
	   if($row['name'] == $name)
	    $duplicate = true;
	  }
	 if(!$duplicate)
	 {
     if($name != NULL && addDepartment())
     $report = 'Successfully Added';
	 else
	 $report = 'Failed to process you request.';
     }
	 else
	  $report = 'Already Exists';
	 }
	 
    $temp = '<div class="department-form">
	           <table border="0" cellspacing="5">
			     <form action="index.php?dept" method="post">
				   <tr><th colspan="3">New Department</th></tr>
				   <tr><td>Department Name</td><td>:</td>
				   <td><input type="text" name="name"></td></tr>
				   <tr><td colspan="3" align="center"><input type="submit" id="submit" name="department" value="Submit"></td></tr>
				 </form>';
	             
	    if(isset($report))
		 $temp .= '<tr><td colspan="3" align="center" id="report">'.$report.'</td></tr>';
	
	$temp .= '</table></div>';
	
	return $temp;
   }
	
	
function getRegistrationForm()
   {
   if(isset($_REQUEST['student']))
    {
	 $password = getField('password');
	 $password1 = getField('password1');
	 if($password == $password1)
	 {
	 $duplicate = false;
	 $roll = getField('roll');
	 $result = runSQL("select * from students where roll = '$roll'");
	  while($row = mysql_fetch_array($result))
	  {
	   if($row['roll'] == $roll)
	    $duplicate = true;
	  }
	 if(!$duplicate)
	 {
     if($roll != NULL && addStudent())
     $report = 'Successfully Added';
	 else
	 $report = 'Failed to process you request.....';
     }
	 else
	  $report = 'Already Exists';
	 }
	 else
	  $report = 'Password Doesn\'t Match';
	 }

    $temp = '<div class="registration-form">
	           <table border="0" cellspacing="5">
			     <form action="index.php?registration" method="post">
				   <tr><th colspan="3">Student Registration</th></tr>
				   <tr><td>Department Name</td><td>:</td><td><select name="department_id">
				   <option value="">--- Select One ---</option>';
		$departments = runSQL("select * from departments");		   
		while($department = mysql_fetch_array($departments))	
		 {
		  $temp .= '<option value="'.$department['id'].'">'.$department['name'].'</option>';
		 }
	   $temp .= '</select></td></tr>
	               <tr><td>Student Name</td><td>:</td><td><input type="text" name="name"></td></tr>
				   <tr><td>Student Roll</td><td>:</td><td><input type="text" name="roll"></td></tr>
				   <tr><td>Password</td><td>:</td><td><input type="password" name="password"></td></tr>
				   <tr><td>Re-Password</td><td>:</td><td><input type="password" name="password1"></td></tr>
				   <tr><td colspan="3" align="center"><input type="submit" id="submit" name="student" value="Submit"></td></tr>
				 </form>';
	             
	    if(isset($report))
		 $temp .= '<tr><td colspan="3" align="center" id="report">'.$report.'</td></tr>';
	
	$temp .= '</table></div>';
	

	return $temp;
   }	
	
function getLoginForm()
   {
   $chk=getField('roll');
   
   if(isset($_REQUEST['login']) && $chk!=NULL )
   {
   $roll = getField('roll');
   
    if($roll!=NULL && isValidUser()) 
    {	
	 $report = 'You are successfully login';
     setLogin();
	}
	else
	$report= 'Invalid Roll or Password.';
   }
   else
   ;
   $temp = '<div class="login-form">
	           <table border="0" cellspacing="5">
			     <form action="index.php?login" method="post">
				   <tr><th colspan="3">Student Login</th></tr>
				    <tr><td>Student Roll</td><td>:</td><td><input type="text" name="roll"></td></tr>
				   <tr><td>Password</td><td>:</td><td><input type="password" name="password"></td></tr>
				   <tr><td colspan="3" align="center"><input type="submit" id="submit" name="login" value=login></td></tr>
				   </form>';
		  if(isset($report))
		 $temp .= '<tr><td colspan="3" align="center" id="report">'.$report.'</td></tr>';
   
   $temp .= '</table></div>';
   return $temp; 
   }
  
 
function getHome()
{
 $temp = '<div class="home-form">
	           <table border="0" cellspacing="5">
			        <tr><th colspan="10">Welcome to NSTU Online Course Registration Center</th></tr>
					 <tr><th colspan="10"></th></tr>
					 <tr><th colspan="10">Please Fill Up every form carefully.</th></tr>
					 <tr><th colspan="10">Fill up only Own form.</th></tr>
					 <tr><th colspan="10">For Form Fillup You have to registration first.</th></tr>
					 <tr><th colspan="10">After confirmation Your registration You can Login.</th></tr>
					 <tr><th colspan="10">If You face any problem contact with Administration.</th></tr>
					 <tr><th colspan="10">You can Email at: admin@courseregistration.nstu.edu.bd</th></tr>
				   <form>';
		 $temp .= '</table></div>';		   
return $temp;
}
 /*************************************************************************************/
/*************************************************************************************/
  
function getCourseRegistrationForm()
   {
    if(isLogin())
	{
   if(isset($_REQUEST['coderegi']))
    {
	 $duplicate = false;
	 
	 $duplicate1 = false;
	 $n = getField('code');
	 $result = runSQL("select * from courses");
	  while($row = mysql_fetch_array($result))
	  {
	   if($row['code'] == $n)
	    $duplicate = true;
	  }
	  $nn=getField('name');
	  $result1 = runSQL("select * from courses");
	  while($row = mysql_fetch_array($result1))
	  {
	   if($row['name'] == $nn)
	    $duplicate1 = true;
	  }
	 if(!$duplicate ||!$duplicate1)
	 {
     if($n!= NULL && addCourse())
	 	 $report = 'Successfully Added';
	 else
	 {
	$report = 'Failed to process you request.';
     }
	 }
	 else
	  $report = 'Already Exists';
	 }

    $temp = '<div class="registration-form">
	           <table border="0" cellspacing="5">
			     <form action="index.php?course" method="post">
				   <tr><th colspan="3">Course Registration</th></tr>
				  	 <tr><td>Student Roll</td><td>:</td><td><select name="name">
				   <option value="">--- Select One ---</option>';
		$students = runSQL("select * from students");		   
		while($student = mysql_fetch_array($students))	
		 {
		  $temp .= '<option value="'.$student['roll'].'">'.$student['roll'].'</option>';
		 }
				  
		
	   $temp .= '</select></td></tr>
	               <tr><td>Course Title</td><td>:</td><td><input type="text" name="title"></td></tr>
				   <tr><td>Course Code</td><td>:</td><td><input type="text" name="code"></td></tr>
				   
				   <tr><td colspan="3" align="center"><input type="submit" id="submit" name="coderegi" value="Submit"></td></tr>
				 </form>';
	             
	    if(isset($report))
		 $temp .= '<tr><td colspan="3" align="center" id="report">'.$report.'</td></tr>';
	
	$temp .= '</table></div>';
	}
	 else
   $temp="Please login first;";
	return $temp;
		
   }	
 /*************************************************************************************/
 /*************************************************************************************/
	
function isValidUser()
	{ $result=runSQL('SELECT id FROM students where roll="'.getField('roll').'" and password="'.md5(getField('password')).'" ');
		if(mysql_num_rows($result)==1)
		{ $row=mysql_fetch_array($result);
		  $_SESSION['user_id']=$row['id'];	
		  		   return true;
		}	
		return false;
	}

function isLogin()
	{
		if(@$_SESSION['user_login']=='yes')
			return true;
			
		return false;
	}
	
function setLogin()
	{ 
		$_SESSION['user_login']='yes';	
				
	}
	
function logout()
	{
	$temp;
	if(isLogin())
	{
		$_SESSION['user_login']='';
        $_SESSION['user_id']='';
	$temp = '<div class="logout-form">
	           <table border="0" cellspacing="5">
			        <tr><th colspan="10">"You are succesfully logout."</th></tr>
					 
				   <form>';
		 $temp .= '</table></div>';		   
}
else
{
$temp = '<div class="logout-form">
	           <table border="0" cellspacing="5">
			        <tr><th colspan="10">"You have to login first."</th></tr>					 
				   <form>';
		 $temp .= '</table></div>';		
}
		 return $temp;	
		
	}

	/********************************
	*******************************/
				 
	 $con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("db_cr", $con);

	function ShowCourses()
	{
	if(isLogin())
	{
	
	$temp='<form action="index.php?courselist" method="post">
Roll: <input type="text" name="name" />
<input type="submit" />
</form>';
$a=$_POST["name"];
$result = mysql_query("SELECT * FROM courses where name='$a' ");
$temp.="Roll: ";
 $temp.=$a;
 $temp.="<br/>";
while($row = mysql_fetch_array($result))
  {
  
 $temp.="Course Code:";
  $temp.= $row['code'] ;
$temp.="				";
$temp.= "::::::::::::::::::::::";
 $temp.="Course Title:";
$temp.= $row['title'];
  $temp.= "<br />";
  
  }
return $temp;

  }

else
{
$temp="Please Login First.";
}	
return $temp;
	
}
	/************************
	************************/
	
function runSQL($query)
	{
		global $conf;
		
		$link = mysql_connect($conf['db_hostname'], $conf['db_user'], $conf['db_password']);
		
		mysql_select_db($conf['db_name']);
		
		return mysql_query($query);
    }
	
?>