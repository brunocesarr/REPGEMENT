<?php 
	session_start();
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
	  unset($_SESSION['login']);
	  unset($_SESSION['senha']);
	  echo"<script language='javascript' type='text/javascript'>alert('Faça o login primeiro!');window.location.href='./index.html';</script>";
	}
	
	session_destroy();
	echo "<script language='javascript' type='text/javascript'>alert('Logout realizado com sucesso.');window.location.href='./index.html';</script>";
?>