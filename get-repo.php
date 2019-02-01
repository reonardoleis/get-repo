<?php
function getRepositories($user){
		$repositories = array();
		$content = file_get_contents("https://github.com/$user?tab=repositories");
		$content = explode('<div id="user-repositories-list">', $content)[1];
		$content = explode('</li>', $content);
		for($i = 0; $i<count($content)-13; $i++){
				$start = strpos($content[$i], 'itemprop="name codeRepository" >');
				$temp = substr($content[$i], $start);
				$start = strpos($temp, '>');
				$temp = substr($temp, $start+1);
				$temp = str_replace(' ', '', $temp);
				$temp = str_replace(chr(10), '', $temp);
				$end = strpos($temp, '</a>');
				$repositoryName = substr($temp, 0, $end);
				$temp = $content[$i];
				$start = strpos($temp, 'itemprop="description">');
				$temp = substr($temp, $start);
				$start = strpos($temp, '>');
				$temp = substr($temp, $start+1);
				$end = strpos($temp, '</p>');
				$temp = substr($temp, 0, $end);
				$temp = trim($temp);
				$repositoryDescription = $temp;
				$repositories[$repositoryName] = $repositoryDescription;
		}
		return $repositories;
}
foreach(getRepositories('reonardoleis') as $name => $description){
	echo "$name: $description <br>";
}

?>