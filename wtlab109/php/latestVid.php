<?php
include "DB_information.php";
$DBname = "wtlab109";

// Create connection
$conn = new mysqli($DBhost, $DBuser, $DBpass);
mysqli_select_db($conn, $DBname);
mysqli_query($conn, "SET NAMES 'utf8'");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$seriesName = $_POST["seriesName"];

//perform sql search
$stmt = $conn->prepare("SELECT id, title FROM video WHERE seriesName = ? ORDER BY uploadDate DESC");
$stmt->bind_param("s", $seriesName);
$stmt->execute();
$result = $stmt->get_result();

//procces result
$return_arr = array();
if(mysqli_num_rows($result) > 0){
  while ($row = mysqli_fetch_assoc($result)) {
    $row_array = $row;
    array_push($return_arr,$row_array);
  }
}

//回傳json形式
echo json_encode($return_arr);
mysqli_free_result($result);

$stmt->close();
mysqli_close($conn);
?>
