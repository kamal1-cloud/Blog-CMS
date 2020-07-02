<!-- 

// $user = 'root';
// $password = 'root';
// $db = 'cms_N';
// $host = 'localhost';
// $port = 3307;

// $link = mysqli_connect(
//    "$host:$port", 
//    $user, 
//    $password
// );
// $db_selected = mysqli_select_db(
//    $db, 
//    $link
// );

// if(!$link){
//         die("Not connect");
//     } -->

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "cms_N";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>