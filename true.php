  <!-- Footer -->
  <footer>
    <div class="footer-content">
      <div class="footer-section">
        <h3>About Us</h3>
        <p>DONE'S FASHION offers the latest fashion trends in Nairobi. We provide high-quality clothing, footwear and accessories at affordable prices.</p>
      </div>
      
      <div class="footer-section">
        <h3>Quick Links</h3>
        <a href="index.php">Home</a>
        <a href="shop.php">Shop</a>
        <a href="new_arrivals.php">New Arrivals</a>
        <a href="sale.php">Sale</a>
      </div>
      
      <div class="footer-section">
        <h3>Contact Us</h3>
        <p>Nairobi Town, Dynamic Mall</p>
        <p>Shop ML 55, 2nd Floor</p>
        <p>Phone: +254 703 427 147</p>
        <p>Email: info@donesshop.com</p>
        
        <div class="social-links">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-tiktok"></i></a>
        </div>
      </div>
    </div>
    
    <div class="copyright">
      <p>&copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. All Rights Reserved.</p>
    </div>
  </footer>

  <!-- Shopping Cart Modal -->
  <div class="cart-modal" id="cart-modal">
    <div class="cart-header">
      <h3>Your Shopping Cart</h3>
      <button class="close-cart" id="close-cart">&times;</button>
    </div>
    <div class="cart-items" id="cart-items">
      <?php if (empty($_SESSION['cart'])): ?>
        <p>Your cart is empty</p>
      <?php else: ?>
        <?php 
        $subtotal = 0;
        foreach($_SESSION['cart'] as $item): 
          $item_total = $item['price'] * $item['quantity'];
          $subtotal += $item_total;
        ?>
          <div class="cart-item">
            <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" class="cart-item-image">
            <div class="cart-item-details">
              <h4 class="cart-item-title"><?php echo $item['name']; ?></h4>
              <p class="cart-item-price"><?php echo formatPrice($item['price']); ?> × <?php echo $item['quantity']; ?></p>
              <p class="cart-item-total"><?php echo formatPrice($item_total); ?></p>
              <div class="quantity-control">
                <button class="quantity-btn minus" data-id="<?php echo $item['id']; ?>">-</button>
                <input type="number" class="quantity-input" value="<?php echo $item['quantity']; ?>" min="1">
                <button class="quantity-btn plus" data-id="<?php echo $item['id']; ?>">+</button>
              </div>
            </div>
            <button class="cart-item-remove" data-id="<?php echo $item['id']; ?>">
              <i class="fas fa-trash"></i>
            </button>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
    <div class="cart-summary">
      <div class="bill-details">
        <div class="bill-row">
          <span>Subtotal:</span>
          <span id="cart-subtotal"><?php echo formatPrice($subtotal); ?></span>
        </div>
        <div class="bill-row">
          <span>Delivery Fee:</span>
          <span id="delivery-fee"><?php echo formatPrice($subtotal > 5000 ? 0 : 200); ?></span>
        </div>
        <div class="bill-row bill-total">
          <span>Total:</span>
          <span id="cart-total"><?php echo formatPrice($subtotal + ($subtotal > 5000 ? 0 : 200)); ?></span>
        </div>
      </div>
      <button class="checkout-btn" id="checkout-btn">Proceed to Checkout</button>
    </div>
  </div>

  <!-- Checkout Form Modal -->
  <div class="checkout-modal" id="checkout-modal">
    <div class="checkout-header">
      <h3>Complete Your Order</h3>
      <button class="close-checkout" id="close-checkout">&times;</button>
    </div>
    <div class="checkout-form">
      <form id="customer-info-form" method="post" action="cart.php">
        <div class="form-group">
          <label for="full-name">Full Name</label>
          <input type="text" id="full-name" name="full_name" required placeholder="Enter your full name">
        </div>
        
        <div class="form-group">
          <label for="phone-number">Phone Number</label>
          <input type="tel" id="phone-number" name="phone" required placeholder="e.g. 254712345678">
        </div>
        
        <div class="form-group">
          <label for="location">Delivery Location</label>
          <input type="text" id="location" name="location" required placeholder="Enter your delivery address">
        </div>
        
        <div class="form-group">
          <label for="mpesa-code">M-Pesa Transaction Code</label>
          <input type="text" id="mpesa-code" name="mpesa_code" required placeholder="Enter your M-Pesa code">
          <small class="help-text">Check your M-Pesa message for the transaction code</small>
        </div>
        
        <div class="form-group">
          <label for="delivery-instructions">Delivery Instructions (Optional)</label>
          <textarea id="delivery-instructions" name="instructions" placeholder="Any special delivery instructions?"></textarea>
        </div>
        
        <input type="hidden" name="checkout" value="1">
        <button type="submit" class="submit-order-btn">Submit Order</button>
      </form>
    </div>
  </div>
  
  <!-- Overlay -->
  <div class="overlay" id="overlay"></div>

  <script src="js/script.js"></script>
</body>
</html>