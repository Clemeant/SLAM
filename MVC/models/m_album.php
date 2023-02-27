<?php namespace models\album;

	function get($id=0){
		return \database\get("albums", $id);            // fonction qui permet de récupere avec la fonction get depuis libraries > database
	}

    function random(){
        return \database\random("albums");              // fonction qui permet de faire un affichage random 
    }

    function add(){
        return \database\set("albums", $_POST);         // fonction qui permet d'ajouter avec la fonction et 
    }

    function update($id){
        \database\set("albums", $_POST, $id);           // fonction qui permet de modifier avec la fonction update 
    }

    function delete($id){
        \database\del("albums", $id);                   // fonction qui permet de supprimer avec la fonction del 
    }
?>