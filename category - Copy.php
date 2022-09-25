<?php
$tag = 'Category';
require 'head.php';
//call the search box which is after the navbar
require 'searchbox.php';

//if category is not referred the url parameter then redirect to index.php
//this is for error handling
//if not then get the anchor name after the 'anc=' ann pass it to the url
if (!$_GET['cat']) {
	header('location:index.php');
} else {
	$cate = $_GET['cat'];
}
echo '<h2 align="center">All posts in "' . $cate . '"</h2>';
//if id is not set then refer the url parameter to 1 
//if not then get the id adn pass it to the url
if (!isset($_GET['id'])) {
	$id = 1;
} else {
	$id = $_GET['id'];
}
//same logic as  index.php file except the query
$start = 0;
$limit = 12;
$start = ($id - 1) * $limit;

$sql = $pdo->prepare("SELECT * FROM posts WHERE `Category` = ? ORDER BY ID DESC");
$sql->execute([$cate]);
$results  = $sql->fetchAll();
$rows = count($results);
$total = ceil($rows / $limit);

if ($rows < 1) {
	echo 'No Post added yet!';
} else {
	//same logic as index.php file
	foreach ($results as $row) {
		require 'date.php';
		echo '<a style="text-decoration:none;color:black;" href="readmore.php?id=' . $row['ID'] . '">';
		if ($row['Image']) {
			echo '<p align="center"><img src="admin/' . $row['Image'] . '" " height="240px" width="50%"></p>';
		}
		echo '<h3 align="center"> ' . $row['Title'] . '<br></a><span style="font-size:13px;">By: <a href="anchor.php?anc=' . $row['Anchor'] . '" style="text-decoration:none;color:black;font-size:13px;">' . $row['Anchor'] . '</a> | ' . $row['Category'] . '</span></h3>
							
							<a style="text-decoration:none;color:black;" href="readmore.php?id=' . $row['ID'] . '"><p align="justify">' . substr(nl2br($row['Content']), 0, 20) . '... <i style="color: red;">Read More</i> </p></a><p align="right">' . $d . ' ' . $dc . ', ' . $dy . ' </p><hr>';
	}
	if ($id > 1) {
		echo '<a href="?id=' . $id - 1 . '">Prev </a>';
	}
	if ($id < $total) {
		echo '<a href="?id=' . $id + 1 . '">Next </a>';
	}
}

require 'footer.php';
