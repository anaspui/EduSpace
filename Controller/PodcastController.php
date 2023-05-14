<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  include('db_connect.php');

  $sql = 'SELECT * FROM `podcasts`';
  $result = $conn->query($sql);

  $arr = array(); // Initialize the array

  while ($row = $result->fetch_assoc()) {
    $arr[] = array(
      'author' => $row['author'],
      'published' => $row['published'],
      'rating' => $row['rating']
    );
  }

  header('Content-Type: application/json'); // Set the response content type
  echo json_encode($arr); // Output only the JSON response
}