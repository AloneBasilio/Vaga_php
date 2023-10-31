<?php

	require __DIR__ .'/vendor/autoload.php';
	
	use \App\Entity\Vaga;

//	if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
//		header('location: index.php?status=error');
//		exit;
//	}

	$oVaga = Vaga::getVaga($GET['id']);

	echo '<pre>';
	print_r($oVaga);
	echo '</pre>';
	exit;

	if (isset($_POST['title'],$_POST['description'],$_POST['action'])) {
		$obVaga = new Vaga;
		
		$obVaga->setTitle($_POST['title']);
		$obVaga->setDescription($_POST['description']);
		$obVaga->setAction($_POST['action']);

		$obVaga->cadastrar();

		header('location: index.php?status=sucess');
		exit;

	}
        include __DIR__ .'/includes/header.php';
        include __DIR__ .'/includes/formulario.php';
        include __DIR__ .'/includes/footer.php';

