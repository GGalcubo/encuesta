<?php
	const SERVER="localhost";
	const USUARIO="encuesta";
	const CLAVE="Basico1234";
	const BASE="encuesta";

	$link=mysqli_connect(SERVER, USUARIO, CLAVE, BASE);
	mysqli_set_charset($link, "utf8");
?>