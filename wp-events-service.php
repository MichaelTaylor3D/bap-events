<?php

$user = 'tatianc4_test';
$password = 'abc1234';
$dbname = 'tatianc4_wp_bap';
$server = 'localhost';

mysqli_connect($server, $user, $password) or die("can't connect");
mysqli_select_db($dbname) or die("can't select database ".$dbname);

$sql = "USE tatianc4_wp_bap; SELECT meta.post_id as id, meta.meta_key AS mkey, meta.meta_value as mval "
	 + "FROM wp_posts AS post "
	 + "JOIN wp_postmeta AS meta ON meta.post_id=post.id "
	 + "WHERE post.post_type='tribe_events' "
	 + "GROUP BY meta.post_id;";

$s = "SHOW DATABASES;"

$results = mysqli_fetch_array(mysqli_query($sql));

var_dump($results);