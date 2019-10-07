<?php

include "DB_information.php";
$DBname = "wtlab109";

// Create connection
$conn = new mysqli($DBhost, $DBuser, $DBpass);
mysqli_select_db($conn, $DBname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//perform sql search
$keyTitle = $_POST['keyTitle'];
$keyTag = $_POST['keyTag'];
$sortMethod = $_POST['sortMethod'];

$sql = "";
$sql = setSQL($keyTitle, $keyTag, $sortMethod);

$result = mysqli_query($conn, $sql);

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

mysqli_close($conn);

function setSQL($keys, $tags, $method){
  $sql = "SELECT id, title FROM video ";
  $sql = $sql . search($keys, $tags);
  $sql = $sql . orderMethod($keys, $method);

  return $sql;
}

function search($keys, $tags){
  $returnText = "WHERE";

  if($tags[0] != "" && $keys[0] != ""){
    $tagCount = count($tags);
    for($i = 0; $i < $tagCount-1; $i ++){
      $returnText = $returnText . " tag like '%".$tags[$i]."%' AND";
    }
    $returnText = $returnText . " tag like '%".$tags[$tagCount-1]."%'";
    $returnText = $returnText . " AND" . " (";
    $keyCount = count($keys);
    for($i = 0; $i < $keyCount-1; $i ++){
      $returnText = $returnText . " title like '%".$keys[$i]."%' OR";
    }
    $returnText = $returnText . " title like '%".$keys[$keyCount-1]."%') ";
  }
  else if($tags[0] != ""){
    $tagCount = count($tags);
    for($i = 0; $i < $tagCount-1; $i ++){
      $returnText = $returnText . " tag like '%".$tags[$i]."%' AND";
    }
    $returnText = $returnText . " tag like '%".$tags[$tagCount-1]."%'";
  }
  else if($keys[0] != ""){
    $keyCount = count($keys);
    for($i = 0; $i < $keyCount-1; $i ++){
      $returnText = $returnText . " title like '%".$keys[$i]."%' OR";
    }
    $returnText = $returnText . " title like '%".$keys[$keyCount-1]."%'";
  }

  return $returnText;
}

function orderMethod($keys, $method){
  $returnText = "ORDER BY ";
  switch($method){
    case "relevant":
      $returnText = $returnText . byRelevant($keys);
      break;
    case "date desc":
      $returnText = $returnText . "uploadDate DESC";
      break;
    case "date asc":
      $returnText = $returnText . "uploadDate ASC";
      break;
  }

  return $returnText;
}

function byRelevant($keys){
  $keyCount = count($keys);
  $returnText = "";
  for($i = 0; $i < $keyCount-1; $i ++){
    $returnText = $returnText . "CASE WHEN title like '%" . $keys[$i]. "%' THEN 1 ELSE 0 END +";
  }
  $returnText = $returnText . "CASE WHEN title like '%" . $keys[$i]. "%' THEN 1 ELSE 0 END DESC";

  return $returnText;
}
?>
