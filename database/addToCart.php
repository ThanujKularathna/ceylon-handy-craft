<?php
session_start();
include ('./connect.php');


header('Content-Type: application/json');

// Check if the user is logged in
if (!isset($_SESSION['valid'])) {
  echo json_encode(['success' => false, 'message' => 'You are not sign up']);
  exit();
}else{

  // Get the POST data
  $data = json_decode(file_get_contents('php://input'), true);
  $product_id = $data['product_id'];
  $quantity = $data['quantity'];
  $user_id = $_SESSION['user_id'];  
  $added_date = date('Y-m-d');

  // Check if the product is already in the cart
  $sql_check = "SELECT * FROM cart_items WHERE product_id = ? AND user_id = ?";
  $stmt_check = $conn->prepare($sql_check);
  $stmt_check->bind_param('ii', $product_id, $user_id);
  $stmt_check->execute();
  $result_check = $stmt_check->get_result();

  if ($result_check->num_rows > 0) {
    // If product exists, update the quantity
    $sql_update = "UPDATE cart_items SET quantity = quantity + ?, added_on = ? WHERE product_id = ? AND user_id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param('isii', $quantity,$added_date,$product_id, $user_id);
    $stmt_update->execute();
  } else {
    // If product does not exist, insert a new row
    $sql_insert = "INSERT INTO cart_items (product_id, user_id,quantity) VALUES (?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param('iii', $product_id, $user_id, $quantity);
    $stmt_insert->execute();
  }
  // Get the total cart quantity for the user
  $sql_quantity = "SELECT SUM(quantity) AS total_quantity FROM cart_items WHERE user_id = ?";
  $stmt = $conn->prepare($sql_quantity);
  $stmt->bind_param('i', $user_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $totalQuantity = $row['total_quantity'] ?? 0;

  echo json_encode(['success' => true,'totalQuantity'=>$totalQuantity]);
}
?>