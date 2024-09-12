<?php
session_start();


function getCartQuantity($connection)
{
  $user_id = $_SESSION["user_id"];
  $sql_quantity = "SELECT SUM(quantity) AS total_quantity FROM cart_items WHERE user_id= ?";
  $stmt = $connection->prepare($sql_quantity);
  $stmt->bind_param('i', $user_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $totalQuantity = $row['total_quantity'] ?? 0;

  echo $totalQuantity;

  return $totalQuantity;
}


