<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CARSHOP Inventory | Premium Automotive Selection</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
   <style>
  /* ===== Global Variables & Reset ===== */
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

  /* ===== Animations ===== */
  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(10px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes lineExpand {
    from {
      width: 0;
      opacity: 0;
    }
    to {
      width: 60px;
      opacity: 1;
    }
  }

  @keyframes modalFadeIn {
    from {
      opacity: 0;
      transform: translateY(-50px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes pulse {
    0% {
      box-shadow: 0 0 0 0 rgba(58, 134, 255, 0.7);
    }
    70% {
      box-shadow: 0 0 0 15px rgba(58, 134, 255, 0);
    }
    100% {
      box-shadow: 0 0 0 0 rgba(58, 134, 255, 0);
    }
  }

  @keyframes slideUp {
    from {
      transform: translateY(50px);
      opacity: 0;
    }
    to {
      transform: translateY(0);
      opacity: 1;
    }
  }

  @keyframes textReveal {
    from {
      opacity: 0;
      transform: translateX(-20px);
    }
    to {
      opacity: 1;
      transform: translateX(0);
    }
  }

  /* ===== Buttons ===== */
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

  .btn-secondary {
    background-color: var(--light-gray);
    color: var(--dark);
  }

  .btn-secondary:hover {
    background-color: var(--medium-gray);
    color: var(--white);
    transform: translateY(-2px);
  }

  /* ===== Header ===== */
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

  /* ===== Sections ===== */
  .section {
    padding: 3rem 0;
    opacity: 0;
    transform: translateY(100px);
    transition: all 0.9s cubic-bezier(0.215, 0.61, 0.355, 1);
  }

  .section.visible {
    opacity: 1;
    transform: translateY(0);
  }

  .section-title {
    font-size: 2.2rem;
    font-weight: 700;
    margin-bottom: 2rem;
    position: relative;
    display: inline-block;
    background: linear-gradient(90deg, var(--primary), #3a86ff);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    animation: textReveal 2s ease-out;
  }

  .section-title::after {
    content: "";
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 60px;
    height: 4px;
    background: linear-gradient(90deg, var(--primary), #3a86ff);
    border-radius: 2px;
    animation: lineExpand 0.8s 0.3s cubic-bezier(0.19, 1, 0.22, 1) both;
  }

  .section-subtitle {
    font-size: 1rem;
    color: var(--medium-gray);
    margin-bottom: 3rem;
    font-weight: 500;
    animation: fadeIn 1s 0.4s both;
  }

  /* ===== Featured Cars ===== */
  .featured-cars {
    background-color: var(--light);
  }

  .cars-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 2rem;
  }

  .car-card {
    background-color: var(--white);
    border-radius: var(--border-radius);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: var(--transition);
  }

  .car-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-lg);
  }

  .car-img {
    height: 200px;
    width: 100%;
    object-fit: cover;
  }

  .car-content {
    padding: 1.5rem;
  }

  .car-meta {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
    flex-wrap: wrap;
  }

  .car-meta span {
    background-color: var(--light-gray);
    padding: 0.3rem 0.8rem;
    border-radius: 50px;
    font-size: 0.8rem;
    font-weight: 500;
  }

  .car-title {
    font-size: 1.3rem;
    margin-bottom: 0.5rem;
  }

  .car-price {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary);
    margin: 1rem 0;
  }

  .car-specs {
    display: flex;
    justify-content: space-between;
    margin-bottom: 1.5rem;
  }

  .car-spec {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .car-spec i {
    font-size: 1.2rem;
    color: var(--primary);
    margin-bottom: 0.5rem;
  }

  .car-spec span {
    font-size: 0.8rem;
    color: var(--medium-gray);
  }

  /* ===== Model Slider ===== */
  .model-slider {
    position: relative;
  }

  .model-card {
    background-color: var(--white);
    border-radius: var(--border-radius);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    margin: 1rem;
  }

  .model-img-container {
    height: 250px;
    overflow: hidden;
  }

  .model-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
  }

  .model-card:hover .model-img {
    transform: scale(1.05);
  }

  .model-content {
    padding: 1.5rem;
  }

  .model-title {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
  }

  .model-subtitle {
    font-size: 0.9rem;
    color: var(--primary);
    font-weight: 600;
    margin-bottom: 1rem;
  }

  .model-features {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-bottom: 1.5rem;
  }

  .model-feature {
    background-color: var(--light-gray);
    padding: 0.3rem 0.8rem;
    border-radius: 50px;
    font-size: 0.8rem;
    font-weight: 500;
  }

  .model-price {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--primary);
    margin: 1rem 0;
  }

  .model-desc {
    color: var(--medium-gray);
    margin-bottom: 1.5rem;
    font-size: 0.95rem;
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

  /* ===== Modals ===== */
  .modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    backdrop-filter: blur(4px);
    z-index: 2000;
    overflow-y: auto;
    padding: 2rem;
    animation: fadeIn 0.3s ease-out;
  }

  .modal-content {
    background: white;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    margin: 2rem auto;
    animation: slideUp 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
  }

  .car-modal-content {
    max-width: 900px;
    width: 90%;
    max-height: 90vh;
    display: flex;
    flex-direction: column;
  }

  .auth-modal-content {
    max-width: 450px;
    width: 90%;
  }

  .modal-header {
    padding: 20px;
    border-bottom: 1px solid #eee;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: var(--dark);
    color: var(--white);
  }

  .auth-modal-header {
    padding: 20px;
    text-align: center;
    border-bottom: 1px solid #eee;
  }

  .modal-title {
    font-size: 1.5rem;
    font-weight: 600;
    margin: 0;
  }

  .modal-close {
    background: none;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
    color: #888;
    transition: var(--transition);
  }

  .modal-close:hover {
    color: var(--primary);
  }

  .modal-body {
    padding: 2rem;
    overflow-y: auto;
    flex-grow: 1;
  }

  .auth-modal-body {
    padding: 25px;
  }

  .modal-actions {
    display: flex;
    justify-content: flex-end;
    gap: 15px;
    padding: 1.5rem;
    border-top: 1px solid var(--light-gray);
  }

  /* Car Details Modal */
  .car-details {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
  }

  .car-details-left {
    display: flex;
    flex-direction: column;
  }

  .car-details-img {
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 20px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  }

  .car-details-img img {
    width: 100%;
    height: auto;
    display: block;
    transition: transform 0.3s;
  }

  .car-details-img:hover img {
    transform: scale(1.02);
  }

  .car-quick-info {
    background: #f9f9f9;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 20px;
  }

  .car-details-price {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--primary);
    margin: 10px 0;
  }

  .car-meta {
    display: flex;
    gap: 15px;
    margin-bottom: 15px;
  }

  .car-meta-item {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 0.9rem;
    color: #666;
  }

  .car-meta-item i {
    color: var(--primary);
  }

  /* Car Details Right Column */
  .car-details-specs {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
    margin-bottom: 25px;
  }

  .car-details-spec {
    background: #f9f9f9;
    padding: 12px;
    border-radius: 6px;
  }

  .car-details-spec-label {
    font-weight: 600;
    color: #555;
    font-size: 0.9rem;
    display: block;
    margin-bottom: 5px;
  }

  .car-details-features {
    margin-top: 25px;
  }

  .features-list {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
  }

  .feature-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.95rem;
  }

  .feature-item i {
    color: var(--primary);
  }

  /* Auth Modal */
  .auth-illustration {
    text-align: center;
    font-size: 3rem;
    color: var(--primary);
    margin-bottom: 20px;
  }

  .auth-modal-subtitle {
    text-align: center;
    color: #666;
    margin-bottom: 25px;
  }

  .auth-options {
    display: flex;
    flex-direction: column;
    gap: 12px;
  }

  .auth-btn {
    width: 100%;
    padding: 14px;
    border-radius: 8px;
    font-size: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    transition: all 0.2s;
  }

  .auth-btn i {
    font-size: 1.1rem;
  }

  .auth-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .auth-footer {
    margin-top: 20px;
    text-align: center;
    font-size: 0.8rem;
    color: #999;
  }

  .auth-footer i {
    color: var(--primary);
  }

  .checkout-btn-container {
    margin: 2rem auto 0;
    padding: 2rem;
  }

  /* ===== Inventory Page ===== */
  .inventory-hero {
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
      url("https://images.unsplash.com/photo-1489824904134-891ab64532f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1631&q=80");
    background-size: cover;
    background-position: center;
    padding: 180px 0 100px;
    text-align: center;
    color: white;
  }

  .inventory-hero h1 {
    font-size: 3rem;
    margin-bottom: 1rem;
  }

  .inventory-hero p {
    font-size: 1.2rem;
    max-width: 800px;
    margin: 0 auto 2rem;
  }

  .inventory-main {
    padding: 60px 0;
  }

  .inventory-sort {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    flex-wrap: wrap;
    gap: 15px;
  }

  .inventory-count {
    font-weight: 500;
    color: #555;
  }

  .search-filter-section {
    display: flex;
    align-items: center;
    gap: 15px;
    flex-wrap: wrap;
  }

  .search-bar {
    position: relative;
    display: flex;
    align-items: center;
  }

  .search-bar i {
    position: absolute;
    left: 12px;
    color: var(--medium-gray);
  }

  .search-bar input {
    padding: 10px 15px 10px 35px;
    border: 1px solid #ddd;
    border-radius: 4px;
    min-width: 250px;
  }

  .filter-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 15px;
    background-color: var(--light-gray);
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: var(--transition);
  }

  .filter-btn:hover {
    background-color: var(--medium-gray);
    color: white;
  }

  .sort-options {
    display: flex;
    align-items: center;
    gap: 15px;
  }

  .sort-label {
    font-weight: 500;
  }

  .sort-select {
    padding: 10px 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    background-color: white;
  }

  .inventory-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 30px;
  }

  .inventory-pagination {
    display: flex;
    justify-content: center;
    margin-top: 50px;
    gap: 10px;
  }

  .page-link {
    padding: 8px 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    color: #333;
    text-decoration: none;
    transition: all 0.3s;
  }

  .page-link:hover,
  .page-link.active {
    background-color: #1a1a1a;
    color: white;
    border-color: #1a1a1a;
  }

  /* ===== AI Navigation ===== */
  .ai-nav {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    z-index: 1000;
  }

  .ai-nav-button {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--primary), #3a86ff);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 20px rgba(58, 134, 255, 0.3);
    cursor: pointer;
    transition: all 0.3s ease;
    animation: pulse 2s infinite;
  }

  .ai-nav-button:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 25px rgba(58, 134, 255, 0.4);
  }

  /* ===== Responsive Styles ===== */
  @media (max-width: 992px) {
    .nav-menu {
      position: fixed;
      top: 80px;
      left: -100%;
      width: 100%;
      height: calc(100vh - 80px);
      background-color: var(--white);
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 2rem;
      transition: var(--transition);
      z-index: 999;
    }

    .nav-menu.active {
      left: 0;
    }

    .hamburger {
      display: block;
    }

    .inventory-hero {
      padding: 150px 0 80px;
    }

    .inventory-hero h1 {
      font-size: 2.5rem;
    }
  }

  @media (max-width: 768px) {
    .car-details {
      grid-template-columns: 1fr;
    }

    .car-details-specs,
    .features-list {
      grid-template-columns: 1fr;
    }

    .inventory-hero {
      padding: 120px 0 60px;
    }

    .inventory-hero h1 {
      font-size: 2.2rem;
    }

    .inventory-hero p {
      font-size: 1rem;
    }

    .search-filter-section {
      width: 100%;
    }

    .search-bar {
      width: 100%;
    }

    .search-bar input {
      width: 100%;
    }

    .sort-options {
      width: 100%;
      justify-content: space-between;
    }

    .modal-content {
      margin: 1rem;
    }
  }

  @media (max-width: 576px) {
    .inventory-hero {
      padding: 100px 0 50px;
    }

    .inventory-hero h1 {
      font-size: 1.8rem;
    }

    .auth-modal-content {
      width: 95%;
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
              <a href="index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="inventory.php" class="nav-link active">Inventory</a>
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
              <a href="login.php" class="btn btn-primary">Sign in</a>
            </li>
          </ul>

          <div class="hamburger">
            <i class="fas fa-bars"></i>
          </div>
        </nav>
      </div>
    </header>

    <!-- Inventory Hero -->
    <section class="inventory-hero">
      <div class="container">
        <h1>Our Premium Inventory</h1>
        <p>
          Browse our extensive collection of luxury vehicles, sports cars, and
          family SUVs. Each vehicle undergoes a rigorous inspection process to
          ensure quality and reliability.
        </p>
        <a href="#inventory-filter" class="btn btn-primary">Filter Vehicles</a>
      </div>
    </section>

    <!-- Main Inventory Content -->
    <main class="inventory-main">
      <div class="container">
        <div class="inventory-sort">
          <div class="inventory-count">Showing 12 of 86 vehicles</div>

          <!-- Search and Filter Section -->
          <div class="search-filter-section">
            <div class="search-bar">
              <i class="fas fa-search"></i>
              <input
                type="text"
                id="searchInput"
                placeholder="Search for cars..."
              />
            </div>

            <button class="filter-btn" id="filterBtn">
              <i class="fas fa-filter"></i>
              Filters
            </button>

            <div class="sort-options">
              <span class="sort-label">Sort by:</span>
              <select class="sort-select" id="sortBy">
                <option value="featured">Featured</option>
                <option value="price-low">Price: Low to High</option>
                <option value="price-high">Price: High to Low</option>
                <option value="year-new">Year: Newest First</option>
                <option value="year-old">Year: Oldest First</option>
                <option value="mileage-low">Mileage: Low to High</option>
              </select>
            </div>
          </div>
        </div>

        <!-- Car Grid - Will be populated by JavaScript -->
        <div class="inventory-grid" id="carsGrid">
          <!-- Car cards will be inserted here by JavaScript -->
        </div>

        <!-- Pagination -->
        <div class="inventory-pagination">
          <a href="#" class="page-link"><i class="fas fa-chevron-left"></i></a>
          <a href="#" class="page-link active">1</a>
          <a href="#" class="page-link">2</a>
          <a href="#" class="page-link">3</a>
          <a href="#" class="page-link">4</a>
          <a href="#" class="page-link">5</a>
          <a href="#" class="page-link"><i class="fas fa-chevron-right"></i></a>
        </div>
      </div>
    </main>

    <!-- Filter Modal (hidden by default) -->
    <div id="filterModal" class="modal">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Filters</h3>
          <span class="modal-close">&times;</span>
        </div>
        <div class="modal-body">
          <h4>Vehicle Type</h4>
          <div style="margin-bottom: 1.5rem">
            <label style="display: block; margin-bottom: 0.5rem">
              <input
                type="checkbox"
                name="vehicle-type"
                value="sedan"
                checked
              />
              Sedan
            </label>
            <label style="display: block; margin-bottom: 0.5rem">
              <input type="checkbox" name="vehicle-type" value="suv" checked />
              SUV
            </label>
            <label style="display: block; margin-bottom: 0.5rem">
              <input
                type="checkbox"
                name="vehicle-type"
                value="coupe"
                checked
              />
              Coupe
            </label>
            <label style="display: block; margin-bottom: 0.5rem">
              <input
                type="checkbox"
                name="vehicle-type"
                value="electric"
                checked
              />
              Electric
            </label>
          </div>

          <h4>Price Range</h4>
          <div style="margin-bottom: 1.5rem">
            <input
              type="range"
              min="0"
              max="200000"
              value="200000"
              id="priceRange"
              style="width: 100%"
            />
            <div
              style="
                display: flex;
                justify-content: space-between;
                margin-top: 0.5rem;
              "
            >
              <span>₦0</span>
              <span id="priceRangeValue">₦200,000</span>
            </div>
          </div>

          <h4>Year</h4>
          <div style="margin-bottom: 1.5rem">
            <select class="sort-select" style="width: 100%">
              <option value="any">Any Year</option>
              <option value="2023">2023</option>
              <option value="2022">2022</option>
              <option value="2021">2021</option>
              <option value="2020">2020</option>
            </select>
          </div>

          <h4>Mileage</h4>
          <div style="margin-bottom: 1.5rem">
            <select class="sort-select" style="width: 100%">
              <option value="any">Any Mileage</option>
              <option value="under-10k">Under 10,000 miles</option>
              <option value="10k-30k">10,000 - 30,000 miles</option>
              <option value="30k-50k">30,000 - 50,000 miles</option>
              <option value="over-50k">Over 50,000 miles</option>
            </select>
          </div>
        </div>
        <div class="modal-actions">
          <button id="resetFilters" class="btn btn-secondary">Reset</button>
          <button id="applyFilters" class="btn btn-primary">
            Apply Filters
          </button>
        </div>
      </div>
    </div>

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

    <!-- Car Details Modal -->
    <div id="carModal" class="modal">
      <div class="modal-content car-modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Vehicle Details</h2>
          <button class="modal-close">&times;</button>
        </div>
        <div class="modal-body" id="modalBody"></div>
      </div>
    </div>

    <!-- Auth Choice Modal -->
    <div id="authModal" class="modal auth-modal">
      <div class="modal-content auth-modal-content">
        <div class="auth-modal-header">
          <h2>Continue to Checkout</h2>
          <button class="modal-close">&times;</button>
        </div>
        <div class="auth-modal-body">
          <div class="auth-illustration">
            <i class="fas fa-user-shield"></i>
          </div>
          <p class="auth-modal-subtitle">
            Please choose how you'd like to proceed:
          </p>
          <div class="auth-options">
            <button id="loginBtn" class="btn btn-primary auth-btn">
              <i class="fas fa-sign-in-alt"></i> Login to Your Account
            </button>
            <button id="registerBtn" class="btn btn-secondary auth-btn">
              <i class="fas fa-user-plus"></i> Create New Account
            </button>
            <button id="guestBtn" class="btn btn-outline auth-btn">
              <i class="fas fa-shopping-bag"></i> Continue as Guest
            </button>
          </div>
          <div class="auth-footer">
            <p>
              Secure checkout powered by <i class="fas fa-lock"></i> SSL
              encryption
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
      // Sample car data (will be replaced with DB data in production)
      const carsData = [
        {
          id: "bmw-7-series",
          make: "BMW",
          model: "7 Series",
          year: 2023,
          price: 68900,
          mileage: "12k mi",
          transmission: "Automatic",
          mpg: "22 MPG",
          horsepower: "335 HP",
          type: "Sedan",
          image:
            "https://images.unsplash.com/photo-1541899481282-d53bffe3c35d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
        },
        {
          id: "porsche-911",
          make: "Porsche",
          model: "911",
          year: 2022,
          price: 112500,
          mileage: "8k mi",
          transmission: "Automatic",
          mpg: "20 MPG",
          horsepower: "443 HP",
          type: "Coupe",
          image:
            "https://images.unsplash.com/photo-1493238792000-8113da705763?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
        },
        {
          id: "range-rover",
          make: "Range Rover",
          model: "Sport",
          year: 2023,
          price: 79800,
          mileage: "15k mi",
          transmission: "Automatic",
          mpg: "19 MPG",
          horsepower: "395 HP",
          type: "SUV",
          image:
            "https://images.unsplash.com/photo-1547038577-da80abbc4f19?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1555&q=80",
        },
        {
          id: "audi-rs7",
          make: "Audi",
          model: "RS7 Sportback",
          year: 2023,
          price: 114000,
          mileage: "5k mi",
          transmission: "Automatic",
          mpg: "18 MPG",
          horsepower: "591 HP",
          type: "Sedan",
          image:
            "https://images.unsplash.com/photo-1555215695-3004980ad54e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
        },
        {
          id: "mercedes-s-class",
          make: "Mercedes-Benz",
          model: "S-Class",
          year: 2023,
          price: 111000,
          mileage: "7k mi",
          transmission: "Automatic",
          mpg: "24 MPG",
          horsepower: "429 HP",
          type: "Sedan",
          image:
            "https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
        },
        {
          id: "tesla-model-s",
          make: "Tesla",
          model: "Model S Plaid",
          year: 2023,
          price: 108000,
          mileage: "3k mi",
          transmission: "Automatic",
          range: "396 mi",
          horsepower: "1,020 HP",
          type: "Electric",
          image:
            "https://images.unsplash.com/photo-1616788494707-ec28f08d05a1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
        },
        {
          id: "porsche-taycan",
          make: "Porsche",
          model: "Taycan Turbo S",
          year: 2023,
          price: 186000,
          mileage: "6k mi",
          transmission: "Automatic",
          range: "212 mi",
          horsepower: "750 HP",
          type: "Electric",
          image:
            "https://images.unsplash.com/photo-1617531653332-bd46c24f2068?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1515&q=80",
        },
        {
          id: "audi-q8",
          make: "Audi",
          model: "Q8",
          year: 2023,
          price: 85500,
          mileage: "9k mi",
          transmission: "Automatic",
          mpg: "21 MPG",
          horsepower: "335 HP",
          type: "SUV",
          image:
            "https://images.unsplash.com/photo-1542362567-b07e54358753?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
        },
        {
          id: "bmw-x5",
          make: "BMW",
          model: "X5",
          year: 2023,
          price: 72300,
          mileage: "11k mi",
          transmission: "Automatic",
          mpg: "23 MPG",
          horsepower: "335 HP",
          type: "SUV",
          image:
            "https://images.unsplash.com/photo-1555215278-0d9faca8b5a5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
        },
      ];

      // Car details data
      const carDetails = {
        "bmw-7-series": {
          title: "BMW 7 Series",
          year: "2023",
          price: "₦68,900",
          image:
            "https://images.unsplash.com/photo-1541899481282-d53bffe3c35d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
          specs: [
            { label: "Make", value: "BMW" },
            { label: "Model", value: "7 Series" },
            { label: "Year", value: "2023" },
            { label: "Mileage", value: "12,000 miles" },
            { label: "Transmission", value: "Automatic" },
            { label: "Engine", value: "3.0L Turbocharged I6" },
            { label: "Horsepower", value: "335 HP" },
            { label: "MPG", value: "22 City / 29 Highway" },
            { label: "Drivetrain", value: "Rear-Wheel Drive" },
            { label: "Exterior Color", value: "Mineral White Metallic" },
            { label: "Interior Color", value: "Black Vernasca Leather" },
          ],
          features: [
            "Panoramic Sunroof",
            "Heated Front Seats",
            "Apple CarPlay",
            "Android Auto",
            "Wireless Charging",
            "Head-Up Display",
            "Parking Assistant",
            "Harman Kardon Sound System",
            "LED Headlights",
            "Power Trunk",
          ],
        },
        "porsche-911": {
          title: "Porsche 911",
          year: "2022",
          price: "₦112,500",
          image:
            "https://images.unsplash.com/photo-1493238792000-8113da705763?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
          specs: [
            { label: "Make", value: "Porsche" },
            { label: "Model", value: "911 Carrera S" },
            { label: "Year", value: "2022" },
            { label: "Mileage", value: "8,000 miles" },
            { label: "Transmission", value: "8-Speed PDK Automatic" },
            { label: "Engine", value: "3.0L Twin-Turbo Flat-6" },
            { label: "Horsepower", value: "443 HP" },
            { label: "MPG", value: "18 City / 24 Highway" },
            { label: "Drivetrain", value: "Rear-Wheel Drive" },
            { label: "Exterior Color", value: "GT Silver Metallic" },
            { label: "Interior Color", value: "Black Leather" },
          ],
          features: [
            "Sport Chrono Package",
            "Porsche Active Suspension Management",
            '20" Carrera S Wheels',
            "Bose Surround Sound System",
            "Sport Exhaust System",
            "LED Matrix Headlights",
            "Power Sport Seats",
            "Porsche Torque Vectoring",
            "Rear Axle Steering",
            "Porsche Stability Management",
          ],
        },
        "range-rover": {
          title: "Range Rover Sport",
          year: "2023",
          price: "₦79,800",
          image:
            "https://images.unsplash.com/photo-1547038577-da80abbc4f19?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1555&q=80",
          specs: [
            { label: "Make", value: "Land Rover" },
            { label: "Model", value: "Range Rover Sport" },
            { label: "Year", value: "2023" },
            { label: "Mileage", value: "15,000 miles" },
            { label: "Transmission", value: "8-Speed Automatic" },
            { label: "Engine", value: "3.0L Supercharged V6" },
            { label: "Horsepower", value: "395 HP" },
            { label: "MPG", value: "17 City / 23 Highway" },
            { label: "Drivetrain", value: "All-Wheel Drive" },
            { label: "Exterior Color", value: "Fuji White" },
            { label: "Interior Color", value: "Ebony Windsor Leather" },
          ],
          features: [
            "Terrain Response System",
            "Adaptive Dynamics",
            '21" Alloy Wheels',
            "Meridian Sound System",
            "Panoramic Roof",
            "Keyless Entry",
            "Heated Steering Wheel",
            "360° Parking Aid",
            "Adaptive Cruise Control",
            "Lane Keep Assist",
          ],
        },
        "mercedes-e-class": {
          title: "Mercedes E-Class",
          year: "2021",
          price: "₦62,500",
          image:
            "https://images.unsplash.com/photo-1562911791-c7a97b729ec5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80",
          specs: [
            { label: "Make", value: "Mercedes" },
            { label: "Model", value: "E-Class" },
            { label: "Year", value: "2021" },
            { label: "Mileage", value: "18,000 miles" },
            { label: "Transmission", value: "Automatic" },
            { label: "Engine", value: "2.0L Turbo Diesel" },
            { label: "Horsepower", value: "255 HP" },
            { label: "MPG", value: "32 City / 42 Highway" },
            { label: "Drivetrain", value: "Rear-Wheel Drive" },
            { label: "Exterior Color", value: "Obsidian Black" },
            { label: "Interior Color", value: "Black Leather" },
          ],
          features: [
            "MBUX Infotainment System",
            "Panoramic Sunroof",
            "Heated Front Seats",
            "Apple CarPlay",
            "Android Auto",
            "Wireless Charging",
            "Head-Up Display",
            "Burmester Sound System",
            "LED Headlights",
            "Power Trunk",
          ],
        },
        "audi-a6": {
          title: "Audi A6",
          year: "2020",
          price: "₦58,700",
          image:
            "https://images.unsplash.com/photo-1555215695-3004980ad54e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
          specs: [
            { label: "Make", value: "Audi" },
            { label: "Model", value: "A6" },
            { label: "Year", value: "2020" },
            { label: "Mileage", value: "22,000 miles" },
            { label: "Transmission", value: "Automatic" },
            { label: "Engine", value: "2.0L Turbocharged I4" },
            { label: "Horsepower", value: "248 HP" },
            { label: "MPG", value: "24 City / 32 Highway" },
            { label: "Drivetrain", value: "All-Wheel Drive" },
            { label: "Exterior Color", value: "Ibiza White" },
            { label: "Interior Color", value: "Black Leather" },
          ],
          features: [
            "Virtual Cockpit",
            "Panoramic Sunroof",
            "Heated Front Seats",
            "Apple CarPlay",
            "Android Auto",
            "Wireless Charging",
            "Head-Up Display",
            "Bang & Olufsen Sound System",
            "LED Headlights",
            "Power Trunk",
          ],
        },
        "tesla-model3": {
          title: "Tesla Model 3",
          year: "2022",
          price: "₦72,500",
          image:
            "https://images.unsplash.com/photo-1551836022-d5d88e9218df?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1387&q=80",
          specs: [
            { label: "Make", value: "Tesla" },
            { label: "Model", value: "Model 3" },
            { label: "Year", value: "2022" },
            { label: "Mileage", value: "9,000 miles" },
            { label: "Transmission", value: "Automatic" },
            { label: "Engine", value: "Electric" },
            { label: "Horsepower", value: "283 HP" },
            { label: "Range", value: "272 miles" },
            { label: "Drivetrain", value: "Rear-Wheel Drive" },
            { label: "Exterior Color", value: "Midnight Silver" },
            { label: "Interior Color", value: "Black Vegan Leather" },
          ],
          features: [
            '15" Touchscreen Display',
            "Autopilot",
            "Heated Front Seats",
            "Wireless Phone Charging",
            "Premium Audio System",
            "Keyless Entry",
            "Power Trunk",
            "LED Headlights",
            "All Glass Roof",
            "Supercharger Capable",
          ],
        },
      };

      // DOM Elements
      const carsGrid = document.getElementById("carsGrid");
      const searchInput = document.getElementById("searchInput");
      const sortBy = document.getElementById("sortBy");
      const filterBtn = document.getElementById("filterBtn");
      const inventoryCount = document.querySelector(".inventory-count");
      const carModal = document.getElementById("carModal");
      const modalBody = document.getElementById("modalBody");
      const filterModal = document.getElementById("filterModal");
      const modalCloseButtons = document.querySelectorAll(".modal-close");

      // Initialize the page when loaded
      document.addEventListener("DOMContentLoaded", function () {
        renderCars(carsData);
        updateInventoryCount(carsData.length);
        setupEventListeners();
      });

      // Render cars to the grid
      function renderCars(cars) {
        carsGrid.innerHTML = "";

        if (cars.length === 0) {
          carsGrid.innerHTML =
            '<p style="grid-column: 1/-1; text-align: center;">No cars match your search criteria.</p>';
          return;
        }

        cars.forEach((car) => {
          const carCard = document.createElement("div");
          carCard.className = "car-card";

          // Determine which icon to use for fuel type
          const fuelIcon =
            car.type === "Electric" ? "fas fa-bolt" : "fas fa-gas-pump";
          const fuelText = car.type === "Electric" ? "Electric" : car.mpg;

          carCard.innerHTML = `
              <img src="${car.image}" alt="${car.make} ${
            car.model
          }" class="car-img">
              <div class="car-content">
                  <div class="car-meta">
                      <span>${car.year}</span>
                      <span>${car.transmission}</span>
                      <span>${car.mileage}</span>
                  </div>
                  <h3 class="car-title">${car.make} ${car.model}</h3>
                  <div class="car-specs">
                      <div class="car-spec">
                          <i class="${fuelIcon}"></i>
                          <span>${fuelText}</span>
                      </div>
                      <div class="car-spec">
                          <i class="fas fa-tachometer-alt"></i>
                          <span>${car.horsepower}</span>
                      </div>
                      <div class="car-spec">
                          <i class="fas fa-car"></i>
                          <span>${car.type}</span>
                      </div>
                  </div>
                  <p class="car-price">₦${car.price.toLocaleString()}</p>
                  <a href="#" class="btn btn-primary view-details" data-car="${
                    car.id
                  }" style="width: 100%;">View Details</a>
              </div>
          `;
          carsGrid.appendChild(carCard);
        });

        bindViewDetailsEvents();
      }

      // Update inventory count
      function updateInventoryCount(count) {
        inventoryCount.textContent = `Showing ${count} of ${carsData.length} vehicles`;
      }

      // Bind view details events
      function bindViewDetailsEvents() {
        document.querySelectorAll(".view-details").forEach((button) => {
          button.addEventListener("click", function (e) {
            e.preventDefault();
            const carId = this.getAttribute("data-car");
            showCarDetails(carId);
          });
        });
      }


      const authModal = document.getElementById("authModal");
      const modalCloses = document.querySelectorAll(".modal-close");

      // Enhanced car details template
      function showCarDetails(carId) {
        const car = carDetails[carId];

        modalBody.innerHTML = car
          ? `
    <div class="car-details">
      <div class="car-details-left">
        <div class="car-details-img">
          <img src="${car.image}" alt="${car.title}" loading="lazy">
        </div>

        <div class="car-quick-info">
          <h3>${car.title}</h3>
          <p class="car-details-price">${car.price}</p>

          <div class="car-meta">
            <span class="car-meta-item">
              <i class="fas fa-tachometer-alt"></i> ${car.mileage || "N/A"}
            </span>
            <span class="car-meta-item">
              <i class="fas fa-calendar-alt"></i> ${car.year || "N/A"}
            </span>
          </div>

        </div>

          <button id="checkoutBtn" class="btn btn-primary" >
            Process to Checkout
          </button>


      </div>

      <div class="car-details-right">
        <div class="car-details-specs">
          ${car.specs
            .map(
              (spec) => `
            <div class="car-details-spec">
              <span class="car-details-spec-label">${spec.label}</span>
              <span>${spec.value}</span>
            </div>
          `
            )
            .join("")}
        </div>

        <div class="car-details-features">
          <h3><i class="fas fa-star"></i> Key Features</h3>
          <div class="features-list">
            ${car.features
              .map(
                (feature) => `
              <div class="feature-item">
                <i class="fas fa-check-circle"></i>
                <span>${feature}</span>
              </div>
            `
              )
              .join("")}
          </div>
        </div>
      </div>
    </div>
  `
          : "<p>Details not available for this vehicle.</p>";

        carModal.style.display = "block";
        document.body.style.overflow = "hidden";

        // Add event listener to checkout button
        document
          .getElementById("checkoutBtn")
          ?.addEventListener("click", () => {
            checkUserAuth(carId);
          });
      }

      // Modal close functionality
      modalCloses.forEach((btn) => {
        btn.addEventListener("click", closeAllModals);
      });

      window.addEventListener("click", (e) => {
        if (e.target.classList.contains("modal")) {
          closeAllModals();
        }
      });

      document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
          closeAllModals();
        }
      });

      function closeAllModals() {
        [carModal, authModal].forEach((modal) => {
          modal.style.display = "none";
        });
        document.body.style.overflow = "auto";
      }

      // Auth flow functions
      function checkUserAuth(carId) {
        // Show loading state
        const btn = document.getElementById("checkoutBtn");
        if (btn) {
          btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Checking...';
          btn.disabled = true;
        }

        fetch("check_auth.php")
          .then((response) => response.json())
          .then((data) => {
            if (data.authenticated) {
              proceedToCheckout(carId);
            } else {
              showAuthModal(carId);
            }
          })
          .catch((error) => {
            console.error("Error:", error);
            showAuthModal(carId);
          })
          .finally(() => {
            if (btn) {
              btn.innerHTML =
                '<i class="fas fa-credit-card"></i> Process to Checkout';
              btn.disabled = false;
            }
          });
      }

      function showAuthModal(carId) {
        carModal.style.display = "none";
        authModal.style.display = "block";
        authModal.dataset.carId = carId;
      }

      function proceedToCheckout(carId) {
        window.location.href = `checkout.php?car_id=${carId}`;
      }

      // Auth button handlers
      document.getElementById("loginBtn")?.addEventListener("click", () => {
        window.location.href = `login.php?redirect=${encodeURIComponent(
          window.location.href
        )}`;
      });

      document.getElementById("registerBtn")?.addEventListener("click", () => {
        window.location.href = `register.php?redirect=${encodeURIComponent(
          window.location.href
        )}`;
      });

      document.getElementById("guestBtn")?.addEventListener("click", () => {
        const carId = authModal.dataset.carId;
        closeAllModals();
        proceedToCheckout(carId);
      });
      // Filter cars based on search
      function filterCars() {
        const searchTerm = searchInput.value.toLowerCase();
        const sortValue = sortBy.value;

        let filteredCars = carsData.filter((car) => {
          return (
            car.make.toLowerCase().includes(searchTerm) ||
            car.model.toLowerCase().includes(searchTerm) ||
            `${car.make} ${car.model}`.toLowerCase().includes(searchTerm)
          );
        });

        // Sort cars
        sortCars(filteredCars, sortValue);
      }

      // Sort cars based on selected option
      function sortCars(cars, sortValue) {
        switch (sortValue) {
          case "price-low":
            cars.sort((a, b) => a.price - b.price);
            break;
          case "price-high":
            cars.sort((a, b) => b.price - a.price);
            break;
          case "year-new":
            cars.sort((a, b) => b.year - a.year);
            break;
          case "year-old":
            cars.sort((a, b) => a.year - b.year);
            break;
          case "mileage-low":
            // Extract numeric value from mileage string (e.g., "12k mi" -> 12)
            cars.sort((a, b) => {
              const aMileage = parseInt(a.mileage);
              const bMileage = parseInt(b.mileage);
              return aMileage - bMileage;
            });
            break;
          default:
            // Featured (default) - no sorting
            break;
        }

        renderCars(cars);
        updateInventoryCount(cars.length);
      }

      // Setup event listeners
      function setupEventListeners() {
        // Search input
        searchInput.addEventListener("input", filterCars);

        // Sort dropdown
        sortBy.addEventListener("change", () => {
          filterCars();
        });

        // Filter button
        filterBtn.addEventListener("click", () => {
          filterModal.style.display = "block";
        });

        // Close modals when clicking X or outside
        document.addEventListener("click", function (e) {
          if (
            e.target.classList.contains("modal-close") ||
            e.target === carModal ||
            e.target === filterModal
          ) {
            carModal.style.display = "none";
            filterModal.style.display = "none";
          }
        });

        // Apply filters button in filter modal
        document
          .getElementById("applyFilters")
          ?.addEventListener("click", function () {
            // Implement filter logic here
            filterModal.style.display = "none";
          });

        // Reset filters button
        document
          .getElementById("resetFilters")
          ?.addEventListener("click", function () {
            // Reset all filter inputs
            document
              .querySelectorAll('#filterModal input[type="checkbox"]')
              .forEach((checkbox) => {
                checkbox.checked = true;
              });
            document.getElementById("priceRange").value = 200000;
            document.getElementById("priceRangeValue").textContent = "₦200,000";
          });

        // Price range slider
        const priceRange = document.getElementById("priceRange");
        if (priceRange) {
          priceRange.addEventListener("input", function () {
            document.getElementById("priceRangeValue").textContent =
              "₦" + parseInt(this.value).toLocaleString();
          });
        }
      }
    </script>
  </body>
</html>
