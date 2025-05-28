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
        <input type="checkbox" name="vehicle-type" value="minivan" checked />
        Minivan
    </label>
    <label style="display: block; margin-bottom: 0.5rem">
        <input type="checkbox" name="vehicle-type" value="coupe" checked />
        Coupe
    </label>
</div>

          <h4>Price Range</h4>
          <div style="margin-bottom: 1.5rem">
            <input
              type="range"
              min="0"
              max="2000000"
              value="2000000"
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
// Wait for DOM to be fully loaded before executing
document.addEventListener("DOMContentLoaded", function() {
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
    const priceRange = document.getElementById("priceRange");
    const priceRangeValue = document.getElementById("priceRangeValue");
    const applyFiltersBtn = document.getElementById("applyFilters");
    const resetFiltersBtn = document.getElementById("resetFilters");
    const authModal = document.getElementById("authModal"); // Added authModal

    // Current filters state
    let currentFilters = {
        search: '',
        sort: 'featured',
        minPrice: 0,
        maxPrice: 5000000, // 5 million Naira
        types: [],
        minYear: 0,
        mileage: ''
    };

    // Initialize filters and UI
    function initializeFilters() {
        // Initialize price range slider if elements exist
        if (priceRange && priceRangeValue) {
            priceRange.min = 0;
            priceRange.max = 5000000;
            priceRange.value = 5000000;
            priceRangeValue.textContent = "₦5,000,000";
        } else {
            console.error("Price range elements not found");
        }

        // Initialize other filter UI elements with null checks
        const yearSelect = document.querySelector('#filterModal select:nth-of-type(1)');
        const mileageSelect = document.querySelector('#filterModal select:nth-of-type(2)');

        if (yearSelect) yearSelect.value = 'any';
        if (mileageSelect) mileageSelect.value = 'any';
    }

    // Fetch cars and update types dynamically
    function fetchCars() {
        showLoading(true);

        const params = new URLSearchParams();
        params.append('search', currentFilters.search);
        params.append('sort', currentFilters.sort);
        params.append('min_price', currentFilters.minPrice);
        params.append('max_price', currentFilters.maxPrice);
        if (currentFilters.types.length > 0) {
            params.append('types', currentFilters.types.join(','));
        }
        params.append('min_year', currentFilters.minYear);
        params.append('mileage', currentFilters.mileage);
        params.append('debug', 'true');

          fetch(`./inventory_api.php?${params.toString()}`)
            .then(response => {
                if (!response.ok) throw new Error('Network error');
                return response.json();
            })
            .then(data => {
                console.log("API response:", data);
                if (data.success) {
                    renderCars(data.data);
                    updateInventoryCount(data.data.length, data.total);

                    // Update filter UI with actual types
                    if (data.data && data.data.length > 0) {
                        updateTypeFilters(data.data);
                    }
                } else {
                    showError(data.message || 'Failed to load cars');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showError('Failed to load cars. Please try again.');
            })
            .finally(() => {
                showLoading(false);
            });
    }

    // Update type filters based on actual data
    function updateTypeFilters(cars) {
        const uniqueTypes = [...new Set(cars.map(car => car.type))].filter(Boolean);
        const typeContainer = document.querySelector('#filterModal .type-filter-container') ||
                             document.querySelector('#filterModal div[style="margin-bottom: 1.5rem"]');

        if (uniqueTypes.length > 0 && typeContainer) {
            typeContainer.innerHTML = '<h4>Vehicle Type</h4>';
            currentFilters.types = uniqueTypes; // Update current filters

            uniqueTypes.forEach(type => {
                const checkboxId = `type-${type.toLowerCase().replace(/\s+/g, '-')}`;
                typeContainer.innerHTML += `
                    <label style="display: block; margin-bottom: 0.5rem">
                        <input type="checkbox" name="vehicle-type" value="${type}" id="${checkboxId}" checked />
                        ${type}
                    </label>
                `;
            });
        }
    }

   function showLoading(show) {
    if (carsGrid) {
        if (show) {
            // Only show loading if there's no content yet
            if (!carsGrid.querySelector('.car-card')) {
                carsGrid.innerHTML = '<div class="loading-spinner"><i class="fas fa-spinner fa-spin"></i> Loading cars...</div>';
            }
        } else {
            const loadingSpinner = carsGrid.querySelector('.loading-spinner');
            if (loadingSpinner) {
                loadingSpinner.remove();
            }
        }
    }
}

    // Show error message
    function showError(message) {
        if (carsGrid) {
            carsGrid.innerHTML = `<div class="error-message"><i class="fas fa-exclamation-circle"></i> ${message}</div>`;
        }
    }

    // Render cars to the grid
    function renderCars(cars, total) {
        if (!carsGrid) return;
        carsGrid.innerHTML = "";

        if (cars.length === 0) {
            let message = '';
            if (total > 0) {
                message = `<div style="grid-column: 1/-1; text-align: center; padding: 2rem;">
                    <h3>No cars match your current filters</h3>
                    <p>We found ${total} available cars, but none match your filter criteria.</p>
                    <button onclick="resetFilters()" class="btn btn-secondary" style="margin-top: 1rem;">
                        Reset All Filters
                    </button>
                </div>`;
            } else {
                message = '<p style="grid-column: 1/-1; text-align: center;">No cars available in inventory at this time.</p>';
            }
            carsGrid.innerHTML = message;
            return;
        }

        cars.forEach((car) => {
            const carCard = document.createElement("div");
            carCard.className = "car-card";

            const fuelIcon = car.type && car.type.toLowerCase() === "electric" ? "fas fa-bolt" : "fas fa-gas-pump";
            const fuelText = car.type && car.type.toLowerCase() === "electric" ? "Electric" : (car.mpg ? `${car.mpg} MPG` : 'N/A');

            carCard.innerHTML = `
                <img src="${car.image_url || 'https://via.placeholder.com/300x200?text=No+Image'}" alt="${car.make} ${car.model}" class="car-img">
                <div class="car-content">
                    <div class="car-meta">
                        <span>${car.year || 'N/A'}</span>
                        <span>${car.transmission || 'N/A'}</span>
                        <span>${car.mileage ? `${car.mileage.toLocaleString()} mi` : 'N/A'}</span>
                    </div>
                    <h3 class="car-title">${car.make} ${car.model}</h3>
                    <div class="car-specs">
                        <div class="car-spec">
                            <i class="${fuelIcon}"></i>
                            <span>${fuelText}</span>
                        </div>
                        <div class="car-spec">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>${car.horsepower ? `${car.horsepower} HP` : 'N/A'}</span>
                        </div>
                        <div class="car-spec">
                            <i class="fas fa-car"></i>
                            <span>${car.type || 'N/A'}</span>
                        </div>
                    </div>
                    <p class="car-price">₦${car.price ? car.price.toLocaleString() : 'N/A'}</p>
                    <a href="#" class="btn btn-primary view-details" data-car="${car.id}" style="width: 100%;">View Details</a>
                </div>
            `;
            carsGrid.appendChild(carCard);
        });

        bindViewDetailsEvents();
    }

    // Update inventory count
    function updateInventoryCount(shown, total) {
        if (inventoryCount) {
            inventoryCount.textContent = `Showing ${shown} of ${total} vehicles`;
        }
    }

    // Bind view details events
    function bindViewDetailsEvents() {
        document.querySelectorAll(".view-details").forEach((button) => {
            button.addEventListener("click", function(e) {
                e.preventDefault();
                const carId = this.getAttribute("data-car");
                fetchCarDetails(carId);
            });
        });
    }

   function fetchCarDetails(carId) {
    showLoading(true);

    fetch(`./inventory_api.php?action=get_car&id=${carId}`)
        .then(response => {
            if (!response.ok) throw new Error('Network error');
            return response.json();
        })
        .then(data => {
            if (data.success && data.data) {
                showCarDetails(data.data);
            } else {
                showErrorInModal(data.message || 'Car details not found');
            }
        })
        .catch(error => {
            console.error('Error fetching car details:', error);
            showErrorInModal('Failed to load car details. Please try again.');
        })
        .finally(() => {
            // Only hide the loading spinner, don't reset the entire cars grid
            const loadingSpinner = document.querySelector('.loading-spinner');
            if (loadingSpinner) {
                loadingSpinner.style.display = 'none';
            }
        });
}

    // Show car details in modal
    function showCarDetails(car) {
        if (!modalBody) return;

        modalBody.innerHTML = `
            <div class="car-details">
                <div class="car-details-left">
                    <div class="car-details-img">
                        <img src="${car.image_url || 'https://via.placeholder.com/600x400?text=No+Image'}" alt="${car.make} ${car.model}" loading="lazy">
                    </div>
                    <div class="car-quick-info">
                        <h3>${car.make} ${car.model}</h3>
                        <p class="car-details-price">₦${car.price ? car.price.toLocaleString() : 'N/A'}</p>
                        <div class="car-meta">
                            <span class="car-meta-item">
                                <i class="fas fa-tachometer-alt"></i> ${car.mileage ? `${car.mileage.toLocaleString()} miles` : 'N/A'}
                            </span>
                            <span class="car-meta-item">
                                <i class="fas fa-calendar-alt"></i> ${car.year || 'N/A'}
                            </span>
                        </div>
                    </div>
                    <button id="checkoutBtn" class="btn btn-primary" data-car-id="${car.id}">
                        Process to Checkout
                    </button>
                </div>
                <div class="car-details-right">
                    <div class="car-details-specs">
                        ${renderCarSpec('Make', car.make)}
                        ${renderCarSpec('Model', car.model)}
                        ${renderCarSpec('Year', car.year)}
                        ${renderCarSpec('Mileage', car.mileage ? `${car.mileage.toLocaleString()} miles` : null)}
                        ${renderCarSpec('Transmission', car.transmission)}
                        ${renderCarSpec('Type', car.type)}
                        ${renderCarSpec('Color', car.color)}
                        ${renderCarSpec(car.type === 'Electric' ? 'Range' : 'MPG',
                            car.type === 'Electric' ? (car.range || null) : (car.mpg ? `${car.mpg} MPG` : null))}
                        ${renderCarSpec('Horsepower', car.horsepower ? `${car.horsepower} HP` : null)}
                        ${renderCarSpec('Status', car.status ? car.status.charAt(0).toUpperCase() + car.status.slice(1) : null)}
                    </div>
                    <div class="car-details-features">
                        <h3><i class="fas fa-star"></i> Description</h3>
                        <div class="features-list">
                            <p>${car.description || 'No description available.'}</p>
                        </div>
                    </div>
                </div>
            </div>
        `;

        if (carModal) {
            carModal.style.display = "block";
            document.body.style.overflow = "hidden";
        }

        // Add event listener to checkout button
        const checkoutBtn = document.getElementById("checkoutBtn");
        if (checkoutBtn) {
            checkoutBtn.addEventListener("click", () => {
                const carId = checkoutBtn.getAttribute("data-car-id");
                checkUserAuth(carId);
            });
        }
    }

    // Helper function to render car specs
    function renderCarSpec(label, value) {
        if (!value) return '';
        return `
            <div class="car-details-spec">
                <span class="car-details-spec-label">${label}</span>
                <span>${value}</span>
            </div>
        `;
    }

    // Show error in modal
    function showErrorInModal(message) {
        if (modalBody) {
            modalBody.innerHTML = `<div class="error-message"><i class="fas fa-exclamation-circle"></i> ${message}</div>`;
        }
        if (carModal) {
            carModal.style.display = "block";
            document.body.style.overflow = "hidden";
        }
    }

    // Modal close functionality
    if (modalCloseButtons) {
        modalCloseButtons.forEach((btn) => {
            btn.addEventListener("click", closeAllModals);
        });
    }

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
    [carModal, filterModal, authModal].forEach((modal) => {
        if (modal) modal.style.display = "none";
    });
    document.body.style.overflow = "auto";

    // Clear any loading state in the modal
    if (modalBody) {
        modalBody.innerHTML = '';
    }
}

    // Filter cars based on search and filters
    function filterCars() {
        if (searchInput) currentFilters.search = searchInput.value.toLowerCase();
        if (sortBy) currentFilters.sort = sortBy.value;
        fetchCars();
    }

    // Apply filters from modal
    function applyFiltersFromModal() {
        // Get selected vehicle types
        const typeCheckboxes = document.querySelectorAll('input[name="vehicle-type"]:checked');
        currentFilters.types = Array.from(typeCheckboxes).map(cb => cb.value);

        // Get price range
        if (priceRange) currentFilters.maxPrice = parseInt(priceRange.value);

        // Get year filter
        const yearSelect = document.querySelector('#filterModal select:nth-of-type(1)');
        if (yearSelect) currentFilters.minYear = yearSelect.value === 'any' ? 0 : parseInt(yearSelect.value);

        // Get mileage filter
        const mileageSelect = document.querySelector('#filterModal select:nth-of-type(2)');
        if (mileageSelect) currentFilters.mileage = mileageSelect.value === 'any' ? '' : mileageSelect.value;

        if (filterModal) filterModal.style.display = "none";
        fetchCars();
    }

    // Reset all filters
    function resetFilters() {
        // Reset price range
        if (priceRange && priceRangeValue) {
            priceRange.value = 5000000;
            priceRangeValue.textContent = "₦5,000,000";
        }

        // Reset year select
        const yearSelect = document.querySelector('#filterModal select:nth-of-type(1)');
        if (yearSelect) yearSelect.value = 'any';

        // Reset mileage select
        const mileageSelect = document.querySelector('#filterModal select:nth-of-type(2)');
        if (mileageSelect) mileageSelect.value = 'any';

        // Reset current filters
        currentFilters = {
            search: '',
            sort: 'featured',
            minPrice: 0,
            maxPrice: 5000000,
            types: [],
            minYear: 0,
            mileage: ''
        };

        // Reset search input
        if (searchInput) searchInput.value = '';

        // Reset sort dropdown
        if (sortBy) sortBy.value = 'featured';

        // Check all type checkboxes
        document.querySelectorAll('input[name="vehicle-type"]').forEach(checkbox => {
            checkbox.checked = true;
        });

        fetchCars();
    }

    // Setup event listeners
    function setupEventListeners() {
        // Search input with debounce
        if (searchInput) {
            let searchTimeout;
            searchInput.addEventListener("input", () => {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(filterCars, 500);
            });
        }

        // Sort dropdown
        if (sortBy) {
            sortBy.addEventListener("change", filterCars);
        }

        // Filter button
        if (filterBtn) {
            filterBtn.addEventListener("click", () => {
                if (filterModal) filterModal.style.display = "block";
            });
        }

        // Price range slider
        if (priceRange && priceRangeValue) {
            priceRange.addEventListener("input", function() {
                priceRangeValue.textContent = "₦" + parseInt(this.value).toLocaleString();
            });
        }

        // Apply filters button
        if (applyFiltersBtn) {
            applyFiltersBtn.addEventListener("click", applyFiltersFromModal);
        }

        // Reset filters button
        if (resetFiltersBtn) {
            resetFiltersBtn.addEventListener("click", resetFilters);
        }
    }

   // Auth flow functions
function checkUserAuth(carId) {
    const btn = document.getElementById("checkoutBtn");
    if (btn) {
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Checking...';
        btn.disabled = true;
    }

    fetch("./check_auth.php")
        .then((response) => {
            if (!response.ok) throw new Error('Network error');
            return response.json();
        })
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
                btn.innerHTML = '<i class="fas fa-credit-card"></i> Process to Checkout';
                btn.disabled = false;
            }
        });
}

function showAuthModal(carId) {
    if (carModal) carModal.style.display = "none";
    if (authModal) {
        // Store car ID in the modal for later use
        authModal.dataset.carId = carId;
        authModal.style.display = "block";
        document.body.style.overflow = "hidden";
    }
}

function proceedToCheckout(carId) {
    // Encode the current URL to return after login/registration
    const redirectUrl = encodeURIComponent(`./checkout.php?car_id=${carId}`);
    window.location.href = `./checkout.php?car_id=${carId}&redirect=${redirectUrl}`;
}

// Setup auth button handlers
function setupAuthHandlers() {
    // Login button - redirect to login page with return URL
    document.getElementById("loginBtn")?.addEventListener("click", () => {
        const carId = authModal?.dataset.carId;
        if (carId) {
            const redirectUrl = encodeURIComponent(`./checkout.php?car_id=${carId}`);
            window.location.href = `./login.php?redirect=${redirectUrl}`;
        } else {
            window.location.href = `./login.php`;
        }
    });

    // Register button - redirect to register page with return URL
    document.getElementById("registerBtn")?.addEventListener("click", () => {
        const carId = authModal?.dataset.carId;
        if (carId) {
            const redirectUrl = encodeURIComponent(`./checkout.php?car_id=${carId}`);
            window.location.href = `./register.php?redirect=${redirectUrl}`;
        } else {
            window.location.href = `./register.php`;
        }
    });

    // Guest checkout button
    document.getElementById("guestBtn")?.addEventListener("click", () => {
        const carId = authModal?.dataset.carId;
        closeAllModals();
        if (carId) {
            proceedToCheckout(carId);
        }
    });
}


    // Initialize the application
    function init() {
        initializeFilters();
        setupEventListeners();
        fetchCars();
        setupAuthHandlers();
    }

    // Start the application
    init();
});
</script>
  </body>
</html>
