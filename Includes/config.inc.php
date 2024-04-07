<?php
$title = array(
    'title' => 'Mi project',
);

$header = array(
    'imagePath' => 'Git.png',
    'imageDef' => 'gitLogo',
	'title' => 'Mi project'
);

$footer = array(
    'Mi' => 'Mi project'
);

//array(0,1)-csak bejelentkezve elérhető, array(1,0) csak kijelentkezve
$pages = array(
	'/' => array('file' => 'home', 'texts' => 'Kezdőlap', 'menun' => array(1,1)),
    'travels' => array('file' => 'travels', 'texts' => 'Utazásaink', 'menun' => array(1,1)),
    'contact' => array('file' => 'contact', 'texts' => 'Kapcsolat', 'menun' => array(1,1)),
    'messages' => array('file' => 'messages', 'texts' => 'Üzeneteim', 'menun' => array(0,1)),
    'gallery' => array('file' => 'gallery', 'texts' => 'Galéria', 'menun' => array(1,1)),
    'signInUp' => array('file' => 'signInUp', 'texts' => 'Belépés', 'menun' => array(1,0)),
    'signOut' => array('file' => 'signOut', 'texts' => 'Kijelentkezés', 'menun' => array(0,1)),
    'login' => array('file' => 'login', 'texts' => '', 'menun' => array(0,0)),
    'registration' => array('file' => 'registration', 'texts' => '', 'menun' => array(0,0)),
    'mail' => array('file' => 'mail', 'texts' => '', 'menun' => array(0,0))
);

$errorPage = array ('file' => '404', 'texts' => 'A keresett oldal nem található!');

$Folder = './Images/';
$FileExtension = array('.jpg', '.png');
$MediaTypes = array('image/jpeg', 'image/png');
$Date = "Y.m.d. H:i";
$MaxSize = 500 * 1024;
?>