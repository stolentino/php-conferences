<?php
include 'inc/config.php';

$filter = ['status'=>'active'];
if (isset($_GET['status'])) {
    $filter['status'] = filter_input(
        INPUT_GET, 
        'status', 
        FILTER_SANITIZE_STRING
    );
}
$directory->selectListings($filter);

$title = "PHP Conferences";
require 'inc/header.php';
$test = new ListingInactive(['description' => 'My description <b>good tags</b> and <a href="http://example.com">bad tags</a>!']);
//$test->setDescription('My description <b>good tags</b> and <a href="http://example.com">bad tags</a>!');
var_dump($test);
var_dump(get_class($test));
var_dump(is_a($test, 'ListingBasic'));
var_dump($test->getStatus());
/*var_dump(get_object_vars($test));
var_dump(get_class_methods($test));
var_dump(get_class_vars($test));*/
$test = new ListingFeatured(['description' => 'My description <b>good tags</b> and <a href="http://example.com">bad tags</a>!']);
//$test->setDescription('My description <b>good tags</b> and <a href="http://example.com">bad tags</a>!');
var_dump($test);
var_dump(get_class($test));
var_dump(is_a($test, 'ListingBasic'));
var_dump($test->getStatus());

echo '<ul class="nav nav-tabs">';
echo '<li role="presentation"';
if ($filter['status'] == 'active') echo ' class="active"';
echo '><a href="index.php">Active</a></li>';
foreach ($directory->getStatuses() as $status){
    echo '<li role="presentation"';
    if ($filter['status'] == $status) echo ' class="active"';
    echo '><a href="index.php?status=' . $status . '">';
    echo ucwords($status) . '</a></li>'; 
}
echo '</ul>';
foreach ($directory->listings as $listing) {
    
    include 'views/list_item.php';
}

require 'inc/footer.php';