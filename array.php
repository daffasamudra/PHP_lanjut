<?php
// Array data
$data = array(
    array("nama" => "John", "umur" => 25),
    array("nama" => "Alice", "umur" => 30),
    array("nama" => "Bob", "umur" => 40),
    array("nama" => "Emma", "umur" => 22),
    array("nama" => "Michael", "umur" => 35),
    array("nama" => "Sophia", "umur" => 27),
    array("nama" => "David", "umur" => 45),
    array("nama" => "Olivia", "umur" => 29),
    array("nama" => "James", "umur" => 33),
    array("nama" => "Emily", "umur" => 20),
    array("nama" => "Daniel", "umur" => 38),
    array("nama" => "Charlotte", "umur" => 31),
    array("nama" => "William", "umur" => 42),
    array("nama" => "Ava", "umur" => 26),
    array("nama" => "Alexander", "umur" => 28)
);

// Konversi ke JSON
$json_data = json_encode($data);

// Tampilkan JSON
echo $json_data;
?>
