<?php namespace ctrl\album;

function index() {
	return "afficher";
}

function afficher($id=null){           									//fonction afficher qui va récupérer les modèle et les views
	if($id==null){
		$id=\models\album\random();										// pour par dafaut afficher un album de manièe random
	}
	view("album",[														// récupérer la vue "album" 	
		"titre"=>"Album",												// lui donner en titre son nomAlb inscrit dans la bdd
		"id"=> $id,														
		"albums"=>\models\album\get(),									// récupère les albums de la bdd à l'aide de la fonction get qui se trouve dans le chemin renseigné
		"photos"=>\models\photo\getByAlbum($id)							// récupère les photos de l'album sélectionné (à l'aide de l'id) de la bdd à l'aide de la fonction getByAlbum qui se trouve dans le chemin renseigné
	]);
}

function editer($id=null){												// fonction éditer

	if($id==null){														// 
		view("album_editer", [											// 	si il n'y a pas d'id, prendre dans la vue album_editer et montrer le bouton ajouter en utilisant la fonction add 
			"titre"=>"ajouter",											// 			la fonction ajouter et défini en dessus 
			"action"=> \router\url("album", "ajouter")					// 
		]);
	}else{
		view("album_editer",[											//
			"titre"=>"modifier", 										//	
			"album"=>\models\album\get($id),							//	si il y a une id (que l'on récupère en cliquant sur le nom d'un album), prendre dans la vue album_editer et montrer le boutton modifier et la fonction update dep
			"action"=> \router\url("album", "modifier", [$id]),			//			la fonction modifier et défini en 
			"id"=> $id													//
		]);
	}
	
}

function ajouter(){
	$id=\models\album\add();
	redirect("album", "afficher",[$id]);
}

function modifier($id){
	\models\album\update($id);
	redirect("album", "afficher", [$id]);
}

function confirmer($id){												// fonction confirmer
	
	view("confirmer", [													// reprend la vue confirmer 
		"non"=> \router\url("album", "afficher", [$id]),				// si on clique sur non, on affiche (à l'aide de la fonction afficher) l'albums que l'on vennait de sélectionner (graçe à l'id)
		"oui"=> \router\url("album", "supprimer", [$id])				// si on clique sur oui on supprime (avec la fonction supprimé en dessous) l'album sélectionné (graçe à l'id)
	]);
	
}

function supprimer($id){												//	pour supprimer l'album séléctioner (graçe à l'id)
	\models\album\delete($id);											//	on utilise la fonction "del" qui se trouve dans le chemin suivant 
	redirect("album", "afficher");										//	et on refait l'affichage par défaut de la fonction affichage  
}

?>