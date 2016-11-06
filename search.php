<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'hotel';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $db->query("SELECT * FROM menu WHERE itemname LIKE '%".$searchTerm."%' ORDER BY itemname ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['itemname'];
}
//return json data
echo json_encode($data);
?>