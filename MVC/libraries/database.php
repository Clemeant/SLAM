<?php namespace database;

///// Améliorer les fonctions pour empêcher les injections SQL

function connect($server,$login,$mdp,$bdd){								// se connecter à la bdd 
	$GLOBALS["bdd"]=$bdd;
	$GLOBALS["cnx"]=mysqli_connect($server, $login, $mdp, $bdd);
}

function query($sql){
	$cnx=$GLOBALS["cnx"];
	$res=mysqli_query($cnx,$sql);
	$tab=explode(" ", $sql);
	$action=$tab[0];
	if($action=="INSERT" AND $res==TRUE) {
		return mysqli_insert_id($cnx);
	}
	else {
		return $res;
	}
}

function select($sql,$dim=2) {
	$res=query($sql);
	
	if($dim==0){ 													// Retourne une valeur
		$ligne=mysqli_fetch_array($res, MYSQLI_NUM);
		if(mysqli_num_rows($res)>0) {
			return $ligne[0];
		}
	}
	elseif($dim==1) { 												// Retourne un tableau à une dimension
		if(mysqli_num_rows($res)>0) {
			return mysqli_fetch_array($res, MYSQLI_ASSOC);
		}
	}
	elseif($dim==2) { 												// Retourne un tableau à deux dimensions
		$tab=array();
		if(mysqli_num_rows($res)>0) {
			while($ligne=mysqli_fetch_array($res, MYSQLI_ASSOC)) {
				$tab[]=$ligne;
			}
		}
		return $tab;
	}
	
	return false;
}

function get($table, $id=0){										// récupère deuis la bdd 
	if($id==0){
		$sql="SELECT * FROM ".$table;
		return select($sql);
	}
	else {
		$sql="SELECT * FROM ".$table." WHERE ".getPKName($table)."=".$id;
		return select($sql, 1);
	}
}

function random($table){											// pour retourner un résultat random 
	return select("SELECT ".getPKName($table)." FROM ".$table." ORDER BY RAND() LIMIT 1", 0);
}

function getDBName() {
	return $GLOBALS["bdd"];
}


function getPKName($nomTable) {
	return select("SELECT COLUMN_NAME
				   FROM INFORMATION_SCHEMA.COLUMNS
	               WHERE TABLE_NAME = '".$nomTable."'
				   AND TABLE_SCHEMA='".getDBName()."' 
	               AND COLUMN_KEY='PRI'",0);
}


function set($nomTable, $tbData, $id=0){ 							//pour inscrire qlqchose dans la bdd dans une table 
	if($id==0) { // INSERT
	    $sql="INSERT INTO ";
	}
	else { //UPDATE
		$sql="UPDATE ";
	}
	
	$sql.=$nomTable." SET "; // INSERT & UPDATE
	
	foreach($tbData AS $champ=>$val){ // INSERT & UPDATE
		$sql.=$champ."='".$val."', ";
	}
	
	$sql=substr($sql,0,-2);
	
	if($id!=0) { // UPDATE
		$nomId=getPKName($nomTable);
		$sql.=" WHERE ".$nomId."=".$id;
	}
	
	return query($sql);
}


function del($nomTable, $param) {										//fonction pour supprimer dans la bdd
	if(is_numeric($param)) {
		$id=$param;
		$nomId=getPKName($nomTable);
		$sql="DELETE FROM ".$nomTable." WHERE ".$nomId."=".$id;
	}
	elseif(is_array($param)){
		$sql="DELETE FROM ".$nomTable." WHERE ";
		foreach($param AS $champ=>$val){
			$sql.=$champ."='".$val."' AND ";
		}
	
		$sql=substr($sql,0,-5);
	}
	return query($sql);
}

?>