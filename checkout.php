<!DOCTYPE html>
<html>
  <head>
    <title>Checkout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Load a font called Roboto from Google Fonts. -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Here are the CSS files for this page. -->
    <link rel="stylesheet" href="assests/css/shared/general.css">
    <link rel="stylesheet" href="assests/css/checkout/checkout.css">
    <link rel="stylesheet" href="assests/css/checkout/checkout-header.css">
  </head>
  <body>
    <div class="checkout-header">
      <div class="header-content">
        <div class="checkout-header-left-section">
          <a href="index.php">
            <img class="ceylon-craft-logo" src="assests/images/theme-images/ceylon-handy-logo.png">
          </a>
        </div>
        <div class="checkout-header-middle-section">
          Checkout (<a class="return-to-home-link"
            href="index.php">3</a>)
        </div>

        <div class="checkout-header-right-section">
          <img src="assests/images/icons/checkout-lock-icon.png">
        </div>
      </div>
    </div>

    <div class="main">
      <div class="page-title">Review your order</div>
      <div class="checkout-grid">
        <div class="order-summary "> 
          <div class="cart-item-container" >
            <div class="delivery-date">
              Delivery date: thursday,september 5
            </div>

            <div class="cart-item-details-grid">
              <img class="product-image"
                src="assests/images/products/plain-hooded-fleece-sweatshirt-yellow.jpg">

              <div class="cart-item-details">
                <div class="product-name">
                  plain-hooded-fleece-sweatshirt-yellow
                </div>
                <div class="product-price">
                  $20.90
                </div>
                <div class="product-quantity ">
                  <span>
                     Quantity: <span class="quantity-label ">4</span>
                  </span>
                   <span class="update-quantity-link link-primary " >
                    Update
                  </span>
                  <input class="quantity-input ">
                  <span class="save-quantity-link link-primary "
                    >
                    Save
                  </span>
                  <span class="delete-quantity-link link-primary ">
                    Delete
                  </span>
                </div>
              </div>
              <div class="delivery-options">
                <div class="delivery-options-title">
                  Choose a delivery option:
                </div>
                <div class="delivery-option">
                  <input type="radio" 
                    class="delivery-option-input"
                    name="">
                  <div>
                    <div class="delivery-option-date">
                      Thursday,september 5
                    </div>
                    <div class="delivery-option-price">
                      $0.00 Shipping
                    </div>
                  </div>
                </div>
                <div class="delivery-option">
                  <input type="radio" 
                    class="delivery-option-input"
                    name="">
                  <div>
                    <div class="delivery-option-date">
                      Friday,august 30
                    </div>
                    <div class="delivery-option-price">
                      $4.99 Shipping
                    </div>
                  </div>
                </div>
                <div class="delivery-option">
                  <input type="radio" 
                    class="delivery-option-input"
                    name="">
                  <div>
                    <div class="delivery-option-date">
                      wednesday,august 28
                    </div>
                    <div class="delivery-option-price">
                      $10.00 Shipping
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="payment-summary">
          <div class="payment-summary-title">
            Order Summary
          </div>
      
          <div class="payment-summary-row">
            <div>items(1)</div>
            <div class="payment-summary-money">$20</div>
          </div>
      
          <div class="payment-summary-row">
            <div>Shipping &amp; handling:</div>
            <div class="payment-summary-money">$10</div>
          </div>
      
          <div class="payment-summary-row subtotal-row">
            <div>Total before tax:</div>
            <div class="payment-summary-money">$20</div>
          </div>
      
          <div class="payment-summary-row">
            <div>Estimated tax (10%):</div>
            <div class="payment-summary-money">2</div>
          </div>
      
          <div class="payment-summary-row total-row">
            <div>Order total:</div>
            <div class="payment-summary-money">$52</div>
          </div>
      
          <button class="place-order-button button-primary">
            Place your order
          </button>
        </div>
      </div>
    </div>
  </body>
</html>
