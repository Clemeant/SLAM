<?php namespace models\photo;

	function get($id=0){
		return \database\get("photos", $id);
	}

	function getByAlbum($id){
		$sql = "SELECT photos.* FROM photos
        INNER JOIN comporter ON photos.idPh=comporter.idPh
        WHERE idAlb=".$id;
		return \database\select($sql);
	}

?>