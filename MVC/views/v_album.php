<?php
include("inc/header.php");

echo "<nav>"; 
foreach($albums as $album){

	$idt = $id==$album['idAlb'] ? ' id="courant" ' : '';
    echo  '<a '.$idt.'href="'.router\url("album", "afficher", [$album['idAlb']]).'">'.$album['nomAlb'].'</a>';
}
echo '<a href="'.router\url("album", "editer").'"> Ajouter</a>';
echo '<a href="'.router\url("album", "editer", [$id]).'"> Modifier</a>';
echo '<a href="'.router\url("album", "confirmer", [$id]).'"> Supprimer</a>';

echo "</nav>";


foreach($photos AS $photo){
	echo '<a target="_blank" href="'.router\url("photo", "afficher", [$photo['idPh']]).'"><img class="vignette" src="'.router\web('photos/', $photo['nomPh']).'" /></a>';
}

include("inc/footer.php");
?>