<?php $yamlContent=yaml_parse_file('example.yaml');

$menu=$yamlContent['menu'];
//echo "<ul>";
echo "<h1>Menu</h1>";
foreach($menu as $k=>$elm) {
	echo "<li><a href='{$elm['url']}'>{$elm['caption']}</a></li>";
}
echo "</ul>";