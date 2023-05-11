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
$test = new ListingPremium();
$test->setDescription('My description <b>good tags</b> and <a href="http://example.com">bad tags</a>!');
var_dump($test);
var_dump(get_class($test));
var_dump(is_a($test, 'ListingBasic'));
var_dump($test->getStatus());
var_dump(get_object_vars($ltest));
var_dump(get_class_methods($test));
var_dump(get_class_vars($test));

foreach ($directory->listings as $listing) {
    
    include 'views/list_item.php';
}

require 'inc/footer.php';