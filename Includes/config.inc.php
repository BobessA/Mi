<?php
$title = array(
    'title' => 'Mi project',
);

$header = array(
    'imagePath' => 'Git.png',
    'imageDef' => 'gitLogo',
	'title' => 'none'
);

$footer = array(
    'Mi' => 'Mi project'
);

$pages = array(
	'/' => array('file' => 'home', 'texts' => 'Home', 'menun' => array(1,1)),
    'signIn' => array('file' => 'bejelent', 'texts' => 'Sign in', 'menun' => array(1,1)),
    'signUp' => array('file' => 'signUp', 'texts' => 'Sign up', 'menun' => array(1,1)),
    'login' => array('file' => 'login', 'texts' => '', 'menun' => array(0,0)),
    'registration' => array('file' => 'registration', 'texts' => '', 'menun' => array(0,0))
);

$errorPage = array ('file' => '404', 'texts' => 'A keresett oldal nem található!');
?>