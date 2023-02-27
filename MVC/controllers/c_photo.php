<?php namespace ctrl\photo;

function index() {
	return "afficher";
}

function afficher($id=null){
	view("photo",[
		"titre"=> "photo",
		"photo"=>\models\photo\get($id),
	]);
}

function modifier(){
	//redirect("photo", "afficher", ["id"=>1]);
}


?>