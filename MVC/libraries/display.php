<?php

function view($vue, $tbData=array()){								// fonction qui permet d'appeler une vue 
		if(!empty($tbData)) {
			extract($tbData);
		}
		include("views/v_".$vue.".php");
}
	
function redirect($ctrl, $action, $param=[]){						// fonctin qu permet de rediriger 
	header("Location: ".router\url($ctrl, $action, $param));
}

?>