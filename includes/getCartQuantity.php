
<?php
session_start();
include "../database/connect.php";
header('Content-Type: application/json');

// Check if the user is logged in
if (isset($_SESSION['valid'])) {
    $user_id = $_SESSION['user_id'];
    $cart_quantity = getCartQuantity($user_id); // Example function

    // Return the quantity as JSON
    echo json_encode(['quantity' => $cart_quantity]);
} else {
    echo json_encode(['quantity' => 0]);
}

function getCartQuantity(){
  global $conn;
  $user_id = $_SESSION["user_id"];
  $sql_quantity = "SELECT SUM(quantity) AS total_quantity FROM cart_items WHERE user_id= ?";
  $stmt = $conn->prepare($sql_quantity);
  $stmt->bind_param('i', $user_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $totalQuantity = $row['total_quantity'] ?? 0;
  return $totalQuantity;
}
?>
