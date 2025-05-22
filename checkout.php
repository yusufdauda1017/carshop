<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout | CARSHOP</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <style>
      /* Reuse your existing styles with some additions */
      :root {
        --primary: #e51b17;
        --primary-hover: #e34019;
        --primary-light: rgba(229, 27, 23, 0.1);
        --primary-extra-light: rgba(229, 27, 23, 0.05);
        --yellow: #fbbf24;
        --dark: #1a1a1a;
        --dark-gray: #2d2d2d;
        --medium-gray: #767f7e;
        --light-gray: #e9ecef;
        --light-bg: #f8f9fa;
        --light: #f8f9fa;
        --white: #ffffff;
        --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.05);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
          0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
          0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
          0 10px 10px -5px rgba(0, 0, 0, 0.04);
        --transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        --border-radius: 16px;
        --max-width: 1400px;
      }

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: "Inter", sans-serif;
        line-height: 1.6;
        color: var(--dark);
        background-color: var(--white);
        overflow-x: hidden;
      }

      a {
        text-decoration: none;
        color: inherit;
      }

      img {
        max-width: 100%;
        height: auto;
        display: block;
      }

      .container {
        width: 100%;
        max-width: var(--max-width);
        margin: 0 auto;
        padding: 0 2rem;
      }

      .section {
        padding: 3rem 0;
      }

      .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.8rem 2rem;
        border-radius: var(--border-radius);
        font-weight: 600;
        transition: var(--transition);
        border: none;
        cursor: pointer;
        font-size: 1rem;
      }

      .btn-primary {
        background-color: var(--primary);
        color: var(--white);
      }

      .btn-primary:hover {
        background-color: var(--primary-hover);
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
      }

      .btn-outline {
        background-color: #fff;
        color: var(--dark);
        border: 2px solid var(--dark);
      }

      .btn-outline:hover {
        background-color: var(--dark);
        color: var(--white);
        transform: translateY(-2px);
      }

      /* Header styles */
      .header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
        background-color: var(--white);
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
      }

      .header.scrolled {
        box-shadow: var(--shadow-lg);
      }

      .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 80px;
      }

      .logo {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--dark);
      }

      .logo span {
        color: var(--primary);
      }

      .nav-menu {
        display: flex;
        align-items: center;
        gap: 2rem;
      }

      .nav-item {
        list-style: none;
      }

      .nav-link {
        font-weight: 500;
        position: relative;
        padding: 0.5rem 0;
      }

      .nav-link::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background-color: var(--primary);
        transition: var(--transition);
      }

      .nav-link:hover::after {
        width: 100%;
      }

      .nav-cta {
        margin-left: 1rem;
      }

      .hamburger {
        display: none;
        cursor: pointer;
        font-size: 1.5rem;
      }

      /* Checkout specific styles */
      .checkout-hero {
        background-color: var(--light);
        padding: 120px 0 40px;
      }

      .checkout-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        margin-top: 2rem;
      }

      @media (max-width: 992px) {
        .checkout-container {
          grid-template-columns: 1fr;
        }
      }

      .car-summary {
        background-color: var(--white);
        border-radius: var(--border-radius);
        padding: 2rem;
        box-shadow: var(--shadow-sm);
      }

      .car-summary-title {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        color: var(--primary);
      }

      .car-summary-img {
        border-radius: var(--border-radius);
        overflow: hidden;
        margin-bottom: 1.5rem;
      }

      .car-summary-img img {
        width: 100%;
        height: auto;
      }

      .car-summary-specs {
        margin-bottom: 1.5rem;
      }

      .car-summary-spec {
        display: flex;
        justify-content: space-between;
        padding: 0.8rem 0;
        border-bottom: 1px solid var(--light-gray);
      }

      .car-summary-spec:last-child {
        border-bottom: none;
      }

      .car-summary-price {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--primary);
        margin: 1.5rem 0;
        text-align: right;
      }

      .checkout-form {
        background-color: var(--white);
        border-radius: var(--border-radius);
        padding: 2rem;
        box-shadow: var(--shadow-sm);
      }

      .checkout-title {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        color: var(--primary);
      }

      .form-group {
        margin-bottom: 1.5rem;
      }

      .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
      }

      .form-control {
        width: 100%;
        padding: 0.8rem 1rem;
        border: 1px solid var(--light-gray);
        border-radius: var(--border-radius);
        font-family: inherit;
        font-size: 1rem;
        transition: var(--transition);
      }

      .form-control:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px var(--primary-light);
      }

      .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
      }

      .form-actions {
        margin-top: 2rem;
      }

 /* ===== Footer ===== */
  .footer {
    background-color: var(--dark);
    color: var(--white);
    padding: 4rem 0 2rem;
  }

  .footer-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 3rem;
    margin-bottom: 3rem;
  }

  .footer-logo {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 1rem;
  }

  .footer-logo span {
    color: var(--primary);
  }

  .footer-text {
    color: var(--light-gray);
    margin-bottom: 1.5rem;
    font-size: 0.95rem;
  }

  .social-links {
    display: flex;
    gap: 1rem;
  }

  .social-link {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: var(--transition);
  }

  .social-link:hover {
    background-color: var(--primary);
    transform: translateY(-3px);
  }

  .footer-title {
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
    position: relative;
  }

  .footer-title::after {
    content: "";
    position: absolute;
    bottom: -8px;
    left: 0;
    width: 40px;
    height: 2px;
    background-color: var(--primary);
  }

  .footer-links {
    list-style: none;
  }

  .footer-link {
    margin-bottom: 0.8rem;
  }

  .footer-link a {
    color: var(--light-gray);
    transition: var(--transition);
    font-size: 0.95rem;
  }

  .footer-link a:hover {
    color: var(--primary);
    padding-left: 5px;
  }

  .footer-contact p {
    display: flex;
    align-items: center;
    gap: 0.8rem;
    margin-bottom: 1rem;
    color: var(--light-gray);
    font-size: 0.95rem;
  }

  .footer-contact i {
    color: var(--primary);
  }

  .footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    padding-top: 2rem;
    text-align: center;
    color: var(--light-gray);
    font-size: 0.9rem;
  }
      /* Responsive styles */
      @media (max-width: 768px) {
        .form-row {
          grid-template-columns: 1fr;
        }
      }
    </style>
  </head>
  <body>
    <!-- Header -->
    <header class="header">
      <div class="container">
        <nav class="navbar">
          <a href="index.html" class="logo">CAR<span>SHOP</span></a>

          <ul class="nav-menu">
            <li class="nav-item">
              <a href="index.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="inventory.html" class="nav-link">Inventory</a>
            </li>
            <li class="nav-item">
              <a href="index.html#services" class="nav-link">Services</a>
            </li>
            <li class="nav-item">
              <a href="about.php" class="nav-link">About</a>
            </li>
            <li class="nav-item">
              <a href="contact.php" class="nav-link">Contact</a>
            </li>
            <li class="nav-item nav-cta">
              <a href="#" id="authButton" class="btn btn-primary">Sign In</a>
            </li>
          </ul>

          <div class="hamburger">
            <i class="fas fa-bars"></i>
          </div>
        </nav>
      </div>
    </header>

    <!-- Checkout Hero -->
    <section class="checkout-hero">
      <div class="container">
        <h1>Complete Your Purchase</h1>
        <p>Please review your vehicle details and provide your information to complete the transaction.</p>
      </div>
    </section>

    <!-- Checkout Main Content -->
    <main class="section">
      <div class="container">
        <div id="checkoutContent">
          <!-- Content will be loaded by JavaScript based on car ID -->
        </div>
      </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="footer-grid">
          <!-- Column 1 -->
          <div class="footer-col">
            <h3 class="footer-logo">CAR<span>SHOP</span></h3>
            <p class="footer-text">
              Your trusted partner for premium automotive experiences since
              2005. We're committed to excellence in every aspect of our
              business.
            </p>
            <div class="social-links">
              <a href="#" class="social-link"
                ><i class="fab fa-facebook-f"></i
              ></a>
              <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
              <a href="#" class="social-link"
                ><i class="fab fa-instagram"></i
              ></a>
              <a href="#" class="social-link"
                ><i class="fab fa-linkedin-in"></i
              ></a>
            </div>
          </div>

          <!-- Column 2 -->
          <div class="footer-col">
            <h3 class="footer-title">Quick Links</h3>
            <ul class="footer-links">
              <li class="footer-link"><a href="index.html">Home</a></li>
              <li class="footer-link">
                <a href="inventory.html">Inventory</a>
              </li>
              <li class="footer-link">
                <a href="index.html#services">Services</a>
              </li>
              <li class="footer-link"><a href="about.php">About Us</a></li>
              <li class="footer-link"><a href="contact.php">Contact</a></li>
            </ul>
          </div>

          <!-- Column 3 -->
          <div class="footer-col">
            <h3 class="footer-title">Services</h3>
            <ul class="footer-links">
              <li class="footer-link"><a href="#">Vehicle Sales</a></li>
              <li class="footer-link"><a href="#">Financing</a></li>
              <li class="footer-link"><a href="#">Trade-In</a></li>
              <li class="footer-link"><a href="#">Test Drives</a></li>
              <li class="footer-link"><a href="#">Maintenance</a></li>
            </ul>
          </div>

          <!-- Column 4 -->
          <div class="footer-col">
            <h3 class="footer-title">Contact Us</h3>
            <div class="footer-contact">
              <p>
                <i class="fas fa-map-marker-alt"></i> 234 Jekadafari Gombe,
                Gombe State Nigeria
              </p>
              <p><i class="fas fa-phone-alt"></i> 9122190440</p>
              <p><i class="fas fa-envelope"></i> info@carshop.com</p>
              <p>
                <i class="fas fa-clock"></i> Mon-Sat: 9AM - 8PM, Sun: 10AM - 6PM
              </p>
            </div>
          </div>
        </div>

        <div class="footer-bottom">
          <p>
            &copy; 2025 CARSHOP. All Rights Reserved. |
            <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
          </p>
        </div>
      </div>
    </footer>

    <script>
      // Sample car data (in a real app, this would come from your backend)
      const carDetails = {
        "bmw-7-series": {
          title: "BMW 7 Series",
          year: "2023",
          price: "₦68,900",
          image: "https://images.unsplash.com/photo-1541899481282-d53bffe3c35d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
          specs: [
            { label: "Make", value: "BMW" },
            { label: "Model", value: "7 Series" },
            { label: "Year", value: "2023" },
            { label: "Mileage", value: "12,000 miles" },
            { label: "Transmission", value: "Automatic" },
            { label: "Engine", value: "3.0L Turbocharged I6" },
            { label: "Horsepower", value: "335 HP" },
            { label: "MPG", value: "22 City / 29 Highway" },
          ],
        },
        "porsche-911": {
          title: "Porsche 911",
          year: "2022",
          price: "₦112,500",
          image: "https://images.unsplash.com/photo-1493238792000-8113da705763?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
          specs: [
            { label: "Make", value: "Porsche" },
            { label: "Model", value: "911 Carrera S" },
            { label: "Year", value: "2022" },
            { label: "Mileage", value: "8,000 miles" },
            { label: "Transmission", value: "8-Speed PDK Automatic" },
            { label: "Engine", value: "3.0L Twin-Turbo Flat-6" },
            { label: "Horsepower", value: "443 HP" },
            { label: "MPG", value: "18 City / 24 Highway" },
          ],
        },
        // Add other car details as needed
      };

      // Function to get URL parameter
      function getUrlParameter(name) {
        name = name.replace(/[[]/, '\\[').replace(/[\]]/, '\\]');
        const regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        const results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
      }

      // Function to render checkout content based on car ID
      function renderCheckoutContent() {
        const checkoutContent = document.getElementById('checkoutContent');
        const carId = getUrlParameter('car');
        const car = carDetails[carId];

        if (!car) {
          // Car not found
          checkoutContent.innerHTML = `
            <div style="text-align: center; padding: 2rem;">
              <h2 style="font-size: 1.5rem; margin-bottom: 1rem; color: var(--primary);">Vehicle Not Found</h2>
              <p style="margin-bottom: 1.5rem; color: var(--medium-gray);">The vehicle you're trying to purchase could not be found.</p>
              <a href="inventory.html" class="btn btn-primary">Browse Inventory</a>
            </div>
          `;
          return;
        }

        // Show checkout form (no login required)
        checkoutContent.innerHTML = `
          <div class="checkout-container">
            <div class="car-summary">
              <h2 class="car-summary-title">Your Vehicle</h2>
              <div class="car-summary-img">
                <img src="${car.image}" alt="${car.title}">
              </div>

              <div class="car-summary-specs">
                ${car.specs.map(spec => `
                  <div class="car-summary-spec">
                    <span>${spec.label}</span>
                    <span>${spec.value}</span>
                  </div>
                `).join('')}
              </div>

              <div class="car-summary-price">${car.price}</div>
            </div>

            <div class="checkout-form">
              <h2 class="checkout-title">Payment Information</h2>

              <form id="paymentForm">
                <div class="form-row">
                  <div class="form-group">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="form-label">Email</label>
                    <input type="email" class="form-control" required>
                </div>

                <div class="form-group">
                  <label class="form-label">Phone Number</label>
                  <input type="tel" class="form-control" required>
                </div>

                <div class="form-group">
                  <label class="form-label">Address</label>
                  <input type="text" class="form-control" required>
                </div>

                <div class="form-row">
                  <div class="form-group">
                    <label class="form-label">City</label>
                    <input type="text" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label class="form-label">ZIP Code</label>
                    <input type="text" class="form-control" required>
                  </div>
                </div>

                <h3 style="margin: 2rem 0 1rem; font-size: 1.2rem;">Payment Method</h3>

                <div class="form-group">
                  <label class="form-label">Card Number</label>
                  <input type="text" class="form-control" placeholder="1234 5678 9012 3456" required>
                </div>

                <div class="form-row">
                  <div class="form-group">
                    <label class="form-label">Expiration Date</label>
                    <input type="text" class="form-control" placeholder="MM/YY" required>
                  </div>
                  <div class="form-group">
                    <label class="form-label">CVV</label>
                    <input type="text" class="form-control" placeholder="123" required>
                  </div>
                </div>

                <div class="form-actions">
                  <button type="submit" class="btn btn-primary" style="width: 100%;">Complete Purchase</button>
                </div>
              </form>
            </div>
          </div>
        `;

        // Add form submission handler
        document.getElementById('paymentForm')?.addEventListener('submit', function(e) {
          e.preventDefault();
          // In a real app, you would process the payment here
          alert('Purchase completed successfully!');
          // Redirect to confirmation page
          window.location.href = 'comfirmation.php';
        });
      }

      // Initialize the page when loaded
      document.addEventListener('DOMContentLoaded', function() {
        // Render the checkout content
        renderCheckoutContent();
        
        // Handle auth button click (optional, if you still want this functionality)
        document.getElementById('authButton')?.addEventListener('click', function(e) {
          e.preventDefault();
          window.location.href = 'login.html';
        });
      });
    </script>
  </body>
</html>