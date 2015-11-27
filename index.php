<?php


if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    include_once('controleur/controleur.php');
    $controller = new controller();
	$controller->handleRequest();
}

