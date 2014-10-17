<?php
require_once('application/config/config.php');
require_once('application/functions/library.php');

$data['bodyContent'] = logout();
require_once(LAYOUT);
?>