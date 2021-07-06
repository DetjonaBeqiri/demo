<?php
 
header("Content-Type:application/json");
include('connection.php');
 
if (isset($_GET['klient_id']) && $_GET['klient_id']!="") {
 
 $klient_id = $_GET['klient_id'];
 $query = "SELECT * FROM `klient` WHERE klient_id=$klient_id";
 $result = mysqli_query($con,$query);
 $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
 
 $klientData['klient_id'] = $row['klient_id'];
 $klientData['klient_name'] = $row['klient_name'];
 $klientData['klient_email'] = $row['klient_email'];
 $klientData['klient_contact'] = $row['klient_contact'];
 $klientData['klient_address'] = $row['klient_address'];
 $klientData['country'] = $row['country'];
 
 $response["status"] = "true";
 $response["message"] = "Klient Details";
 $response["customers"] = $klientData;
 
} else {
 $response["status"] = "false";
 $response["message"] = "Nuk ka klient te regjistruar";
}
echo json_encode($response); exit;
 
?>