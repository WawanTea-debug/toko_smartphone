<!-- Feather Icons -->
<footer id="footer">
  <!-- top footer -->
  <div class="footer-container">
  <div class="footer-content">
    <!-- Logo Section -->
    <div class="logo-section">
      <div class="logo">
        <img src="../img/2.png" alt="Ephone Store">
      </div>
      <div class="copyright">©2025 ePhone Store usa.</div>
      <div class="design-by">Website design by <a href="#">Upb</a></div>
      <div class="social-icons">
        <a href="#" class="social-icon" aria-label="Facebook">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#" class="social-icon" aria-label="Pinterest">
          <i class="fab fa-pinterest-p"></i>
        </a>
        <a href="#" class="social-icon" aria-label="Instagram">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="#" class="social-icon" aria-label="TikTok">
          <i class="fab fa-tiktok"></i>
        </a>
      </div>
    </div>

    <!-- Navigation Sections -->
    <div class="nav-columns">
      <div class="nav-column">
        <h3 class="nav-header">shop</h3>
        <div class="nav-links">
          <a href="#" class="nav-link">new</a>
          <a href="#" class="nav-link">all products</a>
          <a href="#" class="nav-link">best sellers</a>
          <a href="#" class="nav-link">value set</a>
          <a href="#" class="nav-link">find a store</a>
        </div>
      </div>

      <div class="nav-column">
        <h3 class="nav-header">help</h3>
        <div class="nav-links">
          <a href="#" class="nav-link">about us</a>
          <a href="#" class="nav-link">shipping & returns</a>
          <a href="#" class="nav-link">faq</a>
          <a href="#" class="nav-link">contact</a>
          <a href="#" class="nav-link">affiliate program</a>
          <a href="#" class="nav-link">terms of use</a>
          <a href="#" class="nav-link">privacy policy</a>
          <a href="#" class="nav-link">authorized resale policy</a>
          <a href="#" class="nav-link">minimum advertised price policy</a>
        </div>
      </div>
    </div>

    <!-- Contact Section -->
    <div class="contact-section">
      <h3 class="nav-header">contact</h3>
      <div class="contact-columns">
        <div class="contact-group">
          <div class="contact-item">
            <span class="contact-label">phone:</span>
            <span class="contact-value">0834-2456-6779</span>
          </div>

          <div class="contact-item">
            <span class="contact-label">customer service:</span>
            <span class="contact-value">0811-2222-3333</span>
          </div>

          <div class="contact-item">
            <span class="contact-label">customer service email:</span>
            <span class="contact-value">support@ephonestore.com</span>
          </div>
        </div>

        <div class="contact-group">
          <div class="contact-item">
            <span class="contact-label">general email:</span>
            <span class="contact-value">hello@ephonestore.com</span>
          </div>

          <div class="contact-item">
            <span class="contact-label">fax:</span>
            <span class="contact-value">0800-1111-2222</span>
          </div>

          <div class="contact-item">
            <span class="contact-label">address:</span>
            <span class="contact-value">Jl. Tanah Abang No. 123, Jakarta</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- /bottom footer -->
</footer>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../asset/js/main.js"></script>
    <script src="../asset/js/app.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        feather.replace();
      });
    </script>
    <script>
    function addToCart(id, name, price) {
    fetch('../function/cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            id: id,
            name: name,
            price: price
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Produk berhasil ditambahkan ke keranjang!');
            updateCartCount(); // opsional: update badge count tanpa reload
        } else {
            alert('Gagal menambahkan ke keranjang.');
        }
    });
    }

    function updateCartCount() {
    fetch('../function/cart_count.php') // kamu buat file ini nanti
    .then(res => res.json())
    .then(data => {
        document.getElementById('cartCount').textContent = data.count;
    });
    }
</script>
<script>
function updateQuantity(id, action) {
    fetch('../function/update_cart.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id: id, action: action })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            location.reload(); // atau updateCartView() untuk dynamic
        }
    });
}

function removeItem(id) {
    if (confirm("Hapus produk ini dari keranjang?")) {
        fetch('../function/remove_from_cart.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id: id })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                location.reload(); // atau updateCartView()
            }
        });
    }
}
</script>
</body>
</html>
