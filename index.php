<?php
session_start();
include 'database/connect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ceylon handy craft</title>
  <link rel="stylesheet" href="assests/css/index.css">
  <link rel="stylesheet" href="assests/css/shared/index-header.css">
  <link rel="stylesheet" href="assests/css/shared/general.css">

</head>

<body>
  <div class="ceylon-craft-header">
    <div class="ceylon-craft-header-left-section">
      <a href="index.php" class="header-link">
        <img class="ceylon-craft-logo"
          src="assests/images/theme-images/ceylon-handy-logo.png">
      </a>
    </div>

    <div class="ceylon-craft-middle-section">
      <input class="search-bar" type="text" placeholder="Search">

      <button class="search-button">
        <img class="search-icon" src="assests/images/icons/search-icon.png">
      </button>
    </div>

    <div class="ceylon-craft-right-section">
      <?php
        if (isset($_SESSION['valid'])) {
          echo "<a class='login-link header-link' href='includes/logout.php'>
                    <span class='login-text'>Log Out</span>
                  </a>";
          
        }else{
      ?>
        <a class="login-link header-link" href="login.php">
          <span class="login-text">Login</span>
        </a>

        <?php } ?>
      <a class="cart-link header-link" href="checkout.php">
        <img class="cart-icon" src="assests/images/icons/cart-icon.png">
        <span class="quantity js-quantity">0</span>
      </a>
    </div>
  </div>
  <div class="main">
    <div class="products-grid">

      <?php
      $sql = "SELECT * FROM products";
      $product_list = mysqli_query($conn, $sql);

      if (mysqli_num_rows($product_list) > 0) {
        while ($product = mysqli_fetch_assoc($product_list)) {
      ?>
          <div class="product-container js-product-container">
            <div class="product-image-container">
              <img class="product-image"
                src="assests/images/products/<?php echo $product["image_path"] ?>">
            </div>

            <div class="product-name limit-text-to-2-lines">
              <?php echo $product["product_name"] ?>
            </div>

            <div class="product-rating-container">
              <img class="product-rating-stars"
                src="assests/images/ratings/<?php echo "rating-{$product["rating"]}.png" ?>">
              <div class="product-rating-count link-primary">
                <?php echo $product["rating"] ?>
              </div>
            </div>

            <div class="product-price">
              <?php echo "\${$product["price"]}" ?>
            </div>

            <div class="product-quantity-container">
              <select>
                <option selected value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select>
            </div>

            <button type="button" data-product-id="<?php echo $product["product_id"] ?>" class="add-to-cart-button button-primary js-add-to-cart
        ">
              Add to Cart
            </button>
          </div>
      <?php
        }
      }
      ?>
    </div>
  </div>
</body>
  <script  src="scripts/addToCart.js"></script> 
</html>