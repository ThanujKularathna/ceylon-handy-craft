export function fetchCartQuantity(){
	const cartQuantityUrl = "includes/getCartQuantity.php";
	const cartQuantity = document.querySelector('.js-cart-quantity');
    // Function to fetch the user's cart quantity
    fetch(cartQuantityUrl, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
			.then(response => response.json()) // Parse the JSON from the server
			.then(data => {
					// Assuming the response contains the cart quantity in 'quantity' field
					if (data && data.quantity !== undefined) {
						cartQuantity.innerHTML = data.quantity;
					} else {
						cartQuantity.innerHTML = data.quantity; // Default if not logged in
					}
			})
			.catch(error => {
					console.error('Error fetching cart quantity:', error);
					document.getElementById('cart-quantity').textContent = 0; // Default if error
			});
}

export default fetchCartQuantity;


