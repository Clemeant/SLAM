<?php
// Inclusion des fichiers utiles � l'application
include_once("libraries/utility.php");
utility\includeAll("libraries/");
utility\includeAll("models/");

// Connexion � la BDD
database\connect("localhost", "root", "", "album");

// Gestion du routage
if(file_exists("controllers/c_".router\controller().".php")){
	include("controllers/c_".router\controller().".php");
	$action="ctrl\\".router\controller()."\\".router\action();
	if(function_exists($action)){
		count(router\param())>0 ? call_user_func_array($action, router\param()) : $action(null);
	}
	else {
		echo "ERREUR : cette action n'existe pas pour le contr�leur ".router\controller();
	}
}
else {
	echo "ERREUR : ce contr�leur n'existe pas";
}
?>