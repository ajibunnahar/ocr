<?php
require_once('application/config/config.php');
require_once('application/functions/library.php');
$data['pageTitle'] .= "Online Center";
$data['bodyContent'] = getHome();
if(isset($_REQUEST['dept']))
$data['bodyContent'] = getDepartmentCreateForm();
if(isset($_REQUEST['registration']))
$data['bodyContent'] = getRegistrationForm();
if(isset($_REQUEST['login']))
$data['bodyContent'] = getLoginForm();
if(isset($_REQUEST['course']))
$data['bodyContent'] = getCourseRegistrationForm();

require_once(LAYOUT);

// just for testing re-commit for realizing how git works.
?>