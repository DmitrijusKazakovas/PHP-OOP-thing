<?php 

//INIT - stores basic configuration settings. 

//Connect to db
$server = 'localhost';
$user = 'root';
$pass = 'mysql';
$db = 'shopping_cart';
$Database = new mysqli($server,$user, $pass, $db);

//Error reporting
mysqli_report(MYSQLI_REPORT_ERROR);
ini_set('display_errors', 1);

//Set up constants
define('SITE_NAME', 'My Online Store');
define('SITE_PATH', 'http://localhost/OOP%20Shopping%20Cart/');
define('IMAGE_PATH', 'http://localhost/OOP%20Shopping%20Cart/resources/images/');

define('SHOP_TAX', '0.075');

// Include objects
include('app/models/m_template.php');
include('app/models/m_categories.php');
include('app/models/m_products.php');
include('app/models/m_cart.php');


// Create objects
$Template = new Template();
$Categories = new Categories();
$Products = new Products();
$Cart = new Cart();

session_start();

//global
$Template->set_data('cart_total_items', $Cart->get_total_items());
$Template->set_data('cart_total_cost', $Cart->get_total_cost());