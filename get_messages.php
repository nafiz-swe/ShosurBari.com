<?php
// get_messages.php

require_once("includes/dbconn.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $query = "SELECT * FROM messages ORDER BY msg_date ASC"; // Change 'messages' to your actual table name
  $result = mysqli_query($conn, $query);

  if ($result) {
    $messages = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $messages[] = $row;
    }
    echo json_encode(array('success' => true, 'messages' => $messages));
  } else {
    echo json_encode(array('success' => false, 'error' => 'Failed to fetch messages'));
  }
}
?>