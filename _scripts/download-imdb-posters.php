<?php
set_time_limit(0);
ini_set('socket_set_timeout', 0);

$json_file = '_data/top250movies.json';
$movies = json_decode(file_get_contents($json_file), true);

foreach ($movies['data']['movies'] as $key => &$movie) {
	$title = preg_replace('/[^A-Za-z0-9]/', '-', strtolower($movie['title']));
	$title = preg_replace('/[-]+/', '-', $title);
	$title = rtrim($title, '-');

	$filename = 'assets/images/movies/'.$title.'.jpg';
	$ch = curl_init($movie['urlPoster']);
	$fp = fopen($filename, 'wb');
	curl_setopt($ch, CURLOPT_FILE, $fp);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_exec($ch);
	curl_close($ch);
	fclose($fp);

	$movie['localPosterPath'] = $filename;

	echo $title; echo '<br>';
}

file_put_contents($json_file, json_encode($movies));
