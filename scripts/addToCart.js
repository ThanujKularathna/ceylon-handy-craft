export function addToCart() {
  const addToCartUrl = "database/addToCart.php";
  document.addEventListener("DOMContentLoaded", () => {
    const addToCartButtons = document.querySelectorAll(".js-add-to-cart");

    addToCartButtons.forEach((button) => {
      button.addEventListener("click", function () {
        const productId = this.getAttribute("data-product-id");
        const quantity =
          this.closest(".js-product-container").querySelector("select").value;

        // Send AJAX request to add the product to the cart
        fetch(addToCartUrl, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            product_id: productId,
            quantity: quantity,
          }),
        })
          .then((response) => {
            return response.json();
          }) // Use .text() to get the raw response
          .then((data) => {
            if (data.success) {
              document.querySelector(".js-cart-quantity").innerHTML = data.totalQuantity
              // Optionally update cart icon with the new quantity
            } else {
              alert(data.message);
              window.location.replace("login.php");
            }
          })
          .catch((error) => {
            console.log("Error:", error);
          });
      });
    });
  });
}

export default addToCart;