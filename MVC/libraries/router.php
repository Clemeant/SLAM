<?php namespace router;

function index(){
	return "album";
}

function base() {
	return str_replace("/index.php", "", $_SERVER["SCRIPT_NAME"]);
}

function web($path="", $file="") {
	return base()."/public/".$path.$file;
}

function query() {
	return explode("/",substr($_SERVER["REQUEST_URI"], strlen(base())+1));
}

function controller(){
	return isset(query()[0]) && !empty(query()[0]) ? query()[0] : index();
}

function action(){
	eval("\$action=\\ctrl\\".controller()."\\index();");
    return isset(query()[1]) && !empty(query()[1]) ? query()[1] : $action;
}

function param(){
	return array_slice(query(), 2);
}

function url($ctrl, $action, $param=[]){
	return base()."/".$ctrl."/".$action."/".implode("/",$param);
}

?>