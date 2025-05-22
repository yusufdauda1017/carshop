<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<!-- Meta tags should always come first in the <head> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title should come after meta -->
    <title>CARSHOP | Premium Automotive Experience</title>

    <!-- Fonts (like Google Fonts) should come before icons and custom styles -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS libraries (carousel, font-awesome, swiper, etc.) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <!-- Your custom stylesheet should be last so it can override library styles -->
    <link rel="stylesheet" href="./assets/CSS/style.css">


</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <nav class="navbar">
                <a href="#" class="logo">CAR<span>SHOP</span></a>

                <ul class="nav-menu">
                    <li class="nav-item"><a href="#home" class="nav-link active">Home</a></li>

                    <li class="nav-item"><a href="Inventory.php" class="nav-link">Inventory</a></li>
                    <li class="nav-item"><a href="#services" class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                    <li class="nav-item nav-cta"><a href="login.php" class="btn btn-primary">Sign in</a></li>
                </ul>

                <div class="hamburger">
                    <i class="fas fa-bars"></i>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero section" id="home">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Find Your <span>Dream Car</span> Today</h1>
                <p class="hero-text">Discover the perfect vehicle for your lifestyle from our extensive collection of premium cars at unbeatable prices.</p>
                <div class="hero-buttons">
                    <a href="register.php" class="btn btn-primary" id="exploreBtn">Get Started</a>
                    <a href="#" class="btn btn-outline" id="videoBtn">Watch Video</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Cars -->
    <section id="featured" class="section featured-cars">
        <div class="container">
            <h2 class="section-title">Featured Vehicles</h2>
            <p class="section-subtitle">Explore our hand-picked selection of premium automobiles</p>
            <div class="cars-grid">
                <!-- Car 1 -->
                <div class="car-card">
                    <img src="https://images.unsplash.com/photo-1541899481282-d53bffe3c35d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Luxury Sedan" class="car-img">
                    <div class="car-content">
                        <div class="car-meta">
                            <span>2023</span>
                            <span>Automatic</span>
                            <span>12k mi</span>
                        </div>
                        <h3 class="car-title">BMW 7 Series</h3>
                        <div class="car-specs">
                            <div class="car-spec">
                                <i class="fas fa-gas-pump"></i>
                                <span>22 MPG</span>
                            </div>
                            <div class="car-spec">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>335 HP</span>
                            </div>
                            <div class="car-spec">
                                <i class="fas fa-car"></i>
                                <span>Sedan</span>
                            </div>
                        </div>
                        <p class="car-price">₦68,900</p>
                        <a href="#" class="btn btn-primary view-details" data-car="bmw-7-series" style="width: 100%;">View Details</a>
                    </div>
                </div>

                <!-- Car 2 -->
                <div class="car-card">
                    <img src="https://images.unsplash.com/photo-1493238792000-8113da705763?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Sports Car" class="car-img">
                    <div class="car-content">
                        <div class="car-meta">
                            <span>2022</span>
                            <span>Automatic</span>
                            <span>8k mi</span>
                        </div>
                        <h3 class="car-title">Porsche 911</h3>
                        <div class="car-specs">
                            <div class="car-spec">
                                <i class="fas fa-gas-pump"></i>
                                <span>20 MPG</span>
                            </div>
                            <div class="car-spec">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>443 HP</span>
                            </div>
                            <div class="car-spec">
                                <i class="fas fa-car"></i>
                                <span>Coupe</span>
                            </div>
                        </div>
                        <p class="car-price">₦112,500</p>
                        <a href="#" class="btn btn-primary view-details" data-car="porsche-911" style="width: 100%;">View Details</a>
                    </div>
                </div>

                <!-- Car 3 -->
                <div class="car-card">
                    <img src="https://images.unsplash.com/photo-1547038577-da80abbc4f19?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1555&q=80" alt="Luxury SUV" class="car-img">
                    <div class="car-content">
                        <div class="car-meta">
                            <span>2023</span>
                            <span>Automatic</span>
                            <span>15k mi</span>
                        </div>
                        <h3 class="car-title">Range Rover Sport</h3>
                        <div class="car-specs">
                            <div class="car-spec">
                                <i class="fas fa-gas-pump"></i>
                                <span>19 MPG</span>
                            </div>
                            <div class="car-spec">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>395 HP</span>
                            </div>
                            <div class="car-spec">
                                <i class="fas fa-car"></i>
                                <span>SUV</span>
                            </div>
                        </div>
                        <p class="car-price">₦79,800</p>
                        <a href="#" class="btn btn-primary view-details" data-car="range-rover" style="width: 100%;">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Inventory Filter -->
    <section id="services" class="section">
        <div class="container">
            <h2 class="section-title">Find Your Perfect Car</h2>
            <p class="section-subtitle">Use our advanced filters to narrow down your search</p>

            <div class="inventory-filter">
                <form id="inventoryFilterForm" class="filter-form">
                    <div class="filter-group">
                        <label for="make" class="filter-label">Make</label>
                        <select id="make" class="filter-select">
                            <option value="">All Makes</option>
                            <option value="audi">Audi</option>
                            <option value="bmw">BMW</option>
                            <option value="mercedes">Mercedes-Benz</option>
                            <option value="porsche">Porsche</option>
                            <option value="range-rover">Range Rover</option>
                            <option value="tesla">Tesla</option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <label for="model" class="filter-label">Model</label>
                        <select id="model" class="filter-select">
                            <option value="">All Models</option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <label for="price-range" class="filter-label">Price Range</label>
                        <input type="range" id="price-range" class="filter-range" min="0" max="200000" step="5000" value="200000">
                        <div class="price-display">
                            <span id="min-price">₦0</span> - <span id="max-price">₦200,000</span>
                        </div>
                    </div>

                    <div class="filter-group">
                        <label for="year" class="filter-label">Year</label>
                        <select id="year" class="filter-select">
                            <option value="">All Years</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                        </select>
                    </div>

                    <div class="filter-group filter-submit">
                        <button type="submit" class="btn btn-primary">Search Inventory</button>
                    </div>
                </form>
            </div>

            <div id="filterResults" class="cars-grid">
                <!-- Results will be populated by JavaScript -->
            </div>
        </div>
    </section>

    <!-- Latest Models -->
    <section class="section latest-models">
        <div class="container">
            <h2 class="section-title">Latest Models</h2>
            <p class="section-subtitle">Discover our newest arrivals featuring cutting-edge technology and premium craftsmanship</p>

            <div class="model-slider owl-carousel">
                <!-- Model 1 -->
                <div class="model-card">
                    <div class="model-img-container">
                        <img src="https://images.unsplash.com/photo-1555215695-3004980ad54e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Audi RS7" class="model-img">
                    </div>
                    <div class="model-content">
                        <h3 class="model-title">Audi RS7 Sportback</h3>
                        <p class="model-subtitle">Performance Edition</p>
                        <div class="model-features">
                            <span class="model-feature">4.0L V8</span>
                            <span class="model-feature">591 HP</span>
                            <span class="model-feature">AWD</span>
                        </div>
                        <p class="model-price">₦114,000</p>
                        <p class="model-desc">The Audi RS7 Sportback combines breathtaking performance with everyday usability and striking design.</p>
                        <a href="#" class="btn btn-primary">Schedule Test Drive</a>
                    </div>
                </div>

                <!-- Model 2 -->
                <div class="model-card">
                    <div class="model-img-container">
                        <img src="https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Mercedes-Benz" class="model-img">
                    </div>
                    <div class="model-content">
                        <h3 class="model-title">Mercedes-Benz S-Class</h3>
                        <p class="model-subtitle">Luxury Redefined</p>
                        <div class="model-features">
                            <span class="model-feature">3.0L I6</span>
                            <span class="model-feature">429 HP</span>
                            <span class="model-feature">Hybrid</span>
                        </div>
                        <p class="model-price">₦111,000</p>
                        <p class="model-desc">The benchmark for automotive luxury, with cutting-edge technology and unparalleled comfort.</p>
                        <a href="#" class="btn btn-primary">Schedule Test Drive</a>
                    </div>
                </div>

                <!-- Model 3 -->
                <div class="model-card">
                    <div class="model-img-container">
                        <img src="https://images.unsplash.com/photo-1616788494707-ec28f08d05a1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Tesla Model S" class="model-img">
                    </div>
                    <div class="model-content">
                        <h3 class="model-title">Tesla Model S Plaid</h3>
                        <p class="model-subtitle">Electric Performance</p>
                        <div class="model-features">
                            <span class="model-feature">Electric</span>
                            <span class="model-feature">1,020 HP</span>
                            <span class="model-feature">396 mi</span>
                        </div>
                        <p class="model-price">₦108,000</p>
                        <p class="model-desc">The quickest accelerating production car ever built, with industry-leading range and technology.</p>
                        <a href="#" class="btn btn-primary">Schedule Test Drive</a>
                    </div>
                </div>

                <!-- Model 4 -->
                <div class="model-card">
                    <div class="model-img-container">
                        <img src="https://images.unsplash.com/photo-1617531653332-bd46c24f2068?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1515&q=80" alt="Porsche Taycan" class="model-img">
                    </div>
                    <div class="model-content">
                        <h3 class="model-title">Porsche Taycan Turbo S</h3>
                        <p class="model-subtitle">Electric Sports Sedan</p>
                        <div class="model-features">
                            <span class="model-feature">Electric</span>
                            <span class="model-feature">750 HP</span>
                            <span class="model-feature">AWD</span>
                        </div>
                        <p class="model-price">₦186,000</p>
                        <p class="model-desc">Porsche's first all-electric sports car delivers breathtaking performance with zero emissions.</p>
                        <a href="#" class="btn btn-primary">Schedule Test Drive</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section id="about" class="section why-us">
        <div class="container">
            <h2 class="section-title">Why Choose CARSHOP</h2>
            <p class="section-subtitle">We're committed to providing an exceptional car buying experience</p>

            <div class="features">
                <!-- Feature 1 -->
                <div class="feature">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="feature-title">Certified Quality</h3>
                    <p class="feature-text">Every vehicle undergoes a rigorous 150-point inspection by our certified technicians.</p>
                </div>

                <!-- Feature 2 -->
                <div class="feature">
                    <div class="feature-icon">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <h3 class="feature-title">Best Value</h3>
                    <p class="feature-text">We offer competitive pricing and financing options to fit every budget.</p>
                </div>

                <!-- Feature 3 -->
                <div class="feature">
                    <div class="feature-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3 class="feature-title">5-Star Service</h3>
                    <p class="feature-text">Our award-winning customer service team is available 7 days a week.</p>
                </div>

                <!-- Feature 4 -->
                <div class="feature">
                    <div class="feature-icon">
                        <i class="fas fa-car"></i>
                    </div>
                    <h3 class="feature-title">Huge Selection</h3>
                    <p class="feature-text">Choose from over 500 vehicles in stock across all makes and models.</p>
                </div>
            </div>
        </div>
    </section>
   <!-- Ultra-Modern Testimonial Slider -->
   <section class="testimonials">
    <div class="container">
        <div class="testimonial-header">
            <span class="testimonial-tag">Testimonials</span>
            <h2 class="testimonial-title">Trusted by Industry Leaders</h2>
            <p class="testimonial-subtitle">Hear from our satisfied clients about their experiences with our services</p>
        </div>


        <!-- Slider main container -->
        <div class="testimonial-slider swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <!-- Testimonial 1 -->
                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <div class="rating">
                                <span class="rating-star">★</span>
                                <span class="rating-star">★</span>
                                <span class="rating-star">★</span>
                                <span class="rating-star">★</span>
                                <span class="rating-star">★</span>
                            </div>
                            <p class="testimonial-text">"CARSHOP revolutionized our fleet management. Their vehicles' reliability and their team's professionalism exceeded all our expectations."</p>
                        </div>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Michael Johnson" class="author-image">
                            <div class="author-info">
                                <h4>Michael Johnson</h4>
                                <p>CTO, TechCorp</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <div class="rating">
                                <span class="rating-star">★</span>
                                <span class="rating-star">★</span>
                                <span class="rating-star">★</span>
                                <span class="rating-star">★</span>
                                <span class="rating-star">★</span>
                            </div>
                            <p class="testimonial-text">"The seamless purchasing experience and after-sales support set CARSHOP apart. We've standardized our entire fleet with their vehicles."</p>
                        </div>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sarah Williams" class="author-image">
                            <div class="author-info">
                                <h4>Sarah Williams</h4>
                                <p>Director, MobilityPlus</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <div class="rating">
                                <span class="rating-star">★</span>
                                <span class="rating-star">★</span>
                                <span class="rating-star">★</span>
                                <span class="rating-star">★</span>
                                <span class="rating-star">☆</span>
                            </div>
                            <p class="testimonial-text">"Impressive inventory quality and transparent pricing. The digital buying process saved us weeks of negotiation time compared to traditional vendors."</p>
                        </div>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="David Chen" class="author-image">
                            <div class="author-info">
                                <h4>David Chen</h4>
                                <p>CEO, AutoSolutions</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

    <!-- Vehicle Comparison -->
    <section class="section comparison-section">
        <div class="container">
            <h2 class="section-title">Compare Vehicles</h2>
            <p class="section-subtitle">Select two vehicles to compare their features side by side</p>

            <div class="comparison-container">
                <div class="comparison-selector">
                    <div class="comparison-card" data-car="bmw-7-series">
                        <img src="https://images.unsplash.com/photo-1541899481282-d53bffe3c35d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="BMW 7 Series">
                        <h3>BMW 7 Series</h3>
                    </div>
                    <div class="comparison-card" data-car="porsche-911">
                        <img src="https://images.unsplash.com/photo-1493238792000-8113da705763?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Porsche 911">
                        <h3>Porsche 911</h3>
                    </div>
                    <div class="comparison-card" data-car="range-rover">
                        <img src="https://images.unsplash.com/photo-1547038577-da80abbc4f19?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1555&q=80" alt="Range Rover">
                        <h3>Range Rover</h3>
                    </div>
                </div>

                <div id="comparisonResults" class="comparison-results">
                    <h3>Comparison Results</h3>
                    <table class="comparison-table">
                        <thead>
                            <tr>
                                <th>Feature</th>
                                <th id="car1Name">Car 1</th>
                                <th id="car2Name">Car 2</th>
                            </tr>
                        </thead>
                        <tbody id="comparisonTableBody">
                            <!-- Comparison data will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Financing Calculator -->
    <section class="section calculator-section">
        <div class="container">
            <h2 class="section-title">Financing Calculator</h2>
            <p class="section-subtitle">Estimate your monthly payments with our easy-to-use calculator</p>

            <div class="calculator-container">
                <form id="financingCalculator" class="calculator-form">
                    <div class="calculator-group">
                        <label for="vehiclePrice" class="calculator-label">Vehicle Price (₦)</label>
                        <input type="number" id="vehiclePrice" class="calculator-input" value="50000" min="0" step="1000">
                        <input type="range" id="vehiclePriceRange" class="calculator-range" min="0" max="200000" step="1000" value="50000">
                    </div>

                    <div class="calculator-group">
                        <label for="downPayment" class="calculator-label">Down Payment (₦)</label>
                        <input type="number" id="downPayment" class="calculator-input" value="10000" min="0" step="1000">
                        <input type="range" id="downPaymentRange" class="calculator-range" min="0" max="100000" step="1000" value="10000">
                    </div>

                    <div class="calculator-group">
                        <label for="loanTerm" class="calculator-label">Loan Term (months)</label>
                        <select id="loanTerm" class="calculator-input">
                            <option value="24">24 months</option>
                            <option value="36">36 months</option>
                            <option value="48" selected>48 months</option>
                            <option value="60">60 months</option>
                            <option value="72">72 months</option>
                        </select>
                    </div>

                    <div class="calculator-group">
                        <label for="interestRate" class="calculator-label">Interest Rate (%)</label>
                        <input type="number" id="interestRate" class="calculator-input" value="5.5" min="0" max="20" step="0.1">
                        <input type="range" id="interestRateRange" class="calculator-range" min="0" max="20" step="0.1" value="5.5">
                    </div>

                    <button type="submit" class="btn btn-primary">Calculate Payment</button>
                </form>

                <div class="calculator-results">
                    <h3>Payment Estimate</h3>
                    <div class="calculator-result-item">
                        <span class="calculator-result-label">Vehicle Price</span>
                        <span class="calculator-result-value" id="resultVehiclePrice">₦50,000</span>
                    </div>
                    <div class="calculator-result-item">
                        <span class="calculator-result-label">Down Payment</span>
                        <span class="calculator-result-value" id="resultDownPayment">₦10,000</span>
                    </div>
                    <div class="calculator-result-item">
                        <span class="calculator-result-label">Amount Financed</span>
                        <span class="calculator-result-value" id="resultAmountFinanced">₦40,000</span>
                    </div>
                    <div class="calculator-result-item">
                        <span class="calculator-result-label">Interest Rate</span>
                        <span class="calculator-result-value" id="resultInterestRate">5.5%</span>
                    </div>
                    <div class="calculator-result-item">
                        <span class="calculator-result-label">Loan Term</span>
                        <span class="calculator-result-value" id="resultLoanTerm">48 months</span>
                    </div>
                    <div class="calculator-total">
                        <span class="calculator-result-label">Estimated Monthly Payment</span>
                        <span class="calculator-result-value" id="resultMonthlyPayment">₦931.60</span>
                    </div>
                </div>
            </div>
        </div>
    </section>


      <!-- Neo-FAQ Section -->
      <section class="neo-section">
        <div class="container">
            <div class="neo-section-header">
                <h2 class="neo-section-title">Intelligent Support</h2>
                <p class="neo-section-subtitle">Instant answers to power your automotive journey</p>
            </div>

            <div class="hologrid">
                <!-- Holographic Card 1 -->
                <div class="holocard" data-category="purchase">
                    <div class="holocard-header">
                        <div class="holocard-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <h3 class="holocard-category">Digital Purchase</h3>
                    </div>
                    <div class="neo-accordion">
                        <div class="neo-item">
                            <button class="neo-question" aria-expanded="false">
                                <span>What crypto payments do you accept?</span>
                                <i class="fas fa-chevron-down neo-arrow"></i>
                            </button>
                            <div class="neo-answer">
                                <p>We accept Bitcoin (BTC), Ethereum (ETH), and CARSHOP Coin (CSC) through our blockchain-powered payment gateway. Transactions settle in under 2 minutes with zero fees.</p>
                            </div>
                        </div>
                        <div class="neo-item">
                            <button class="neo-question" aria-expanded="false">
                                <span>How does VR test driving work?</span>
                                <i class="fas fa-chevron-down neo-arrow"></i>
                            </button>
                            <div class="neo-answer">
                                <p>Our VR platform streams ultra-low latency 8K footage from actual vehicles. Use any VR headset to experience realistic driving dynamics with haptic feedback before purchase.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Holographic Card 2 -->
                <div class="holocard" data-category="tech">
                    <div class="holocard-header">
                        <div class="holocard-icon">
                            <i class="fas fa-microchip"></i>
                        </div>
                        <h3 class="holocard-category">Vehicle AI</h3>
                    </div>
                    <div class="neo-accordion">
                        <div class="neo-item">
                            <button class="neo-question" aria-expanded="false">
                                <span>What can the neural network learn?</span>
                                <i class="fas fa-chevron-down neo-arrow"></i>
                            </button>
                            <div class="neo-answer">
                                <p>Our onboard AI adapts to your driving style, predicts maintenance needs, and automatically adjusts hundreds of parameters for optimal performance and comfort.</p>
                            </div>
                        </div>
                        <div class="neo-item">
                            <button class="neo-question" aria-expanded="false">
                                <span>How secure is the biometric system?</span>
                                <i class="fas fa-chevron-down neo-arrow"></i>
                            </button>
                            <div class="neo-answer">
                                <p>Military-grade facial recognition with 3D depth sensing and vein pattern authentication ensures your vehicle only responds to authorized users.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Holographic Card 3 -->
                <div class="holocard" data-category="delivery">
                    <div class="holocard-header">
                        <div class="holocard-icon">
                            <i class="fas fa-robot"></i>
                        </div>
                        <h3 class="holocard-category">Autonomous Delivery</h3>
                    </div>
                    <div class="neo-accordion">
                        <div class="neo-item">
                            <button class="neo-question" aria-expanded="false">
                                <span>How does self-driving delivery work?</span>
                                <i class="fas fa-chevron-down neo-arrow"></i>
                            </button>
                            <div class="neo-answer">
                                <p>Your vehicle navigates to your location autonomously using our HD mapping network. Unlock via the app when it arrives - no human interaction required.</p>
                            </div>
                        </div>
                        <div class="neo-item">
                            <button class="neo-question" aria-expanded="false">
                                <span>What's drone-assisted detailing?</span>
                                <i class="fas fa-chevron-down neo-arrow"></i>
                            </button>
                            <div class="neo-answer">
                                <p>Our micro-drones perform contactless exterior cleaning at delivery, using precisely controlled air and nano-fluid streams for a showroom finish anywhere.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </section>

    <!-- Contact Form -->
    <section id="contact" class="section contact-section">
        <div class="container">
            <h2 class="section-title">Contact Us</h2>
            <p class="section-subtitle">Have questions? Get in touch with our team today</p>

            <div class="contact-container">
                <div class="contact-info">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Visit Us</h3>
                            <p>234 Jekadafari Gombe, Gombe State Nigeria</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Call Us</h3>
                            <p>9122190440</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Email Us</h3>
                            <p>info@carshop.com</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Hours</h3>
                            <p>Mon-Sat: 9AM - 8PM<br>Sun: 10AM - 6PM</p>
                        </div>
                    </div>
                </div>

                <form id="contactForm" class="contact-form">
                    <div class="form-group">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" id="name" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" id="email" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" id="phone" class="form-input">
                    </div>

                    <div class="form-group">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" id="subject" class="form-input">
                    </div>

                    <div class="form-group">
                        <label for="message" class="form-label">Message</label>
                        <textarea id="message" class="form-textarea"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary form-submit">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <!-- Column 1 -->
                <div class="footer-col">
                    <h3 class="footer-logo">CAR<span>SHOP</span></h3>
                    <p class="footer-text">Your trusted partner for premium automotive experiences since 2005. We're committed to excellence in every aspect of our business.</p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <!-- Column 2 -->
                <div class="footer-col">
                    <h3 class="footer-title">Quick Links</h3>
                    <ul class="footer-links">
                        <li class="footer-link"><a href="#">Home</a></li>
                        <li class="footer-link"><a href="Inventory.php">Inventory</a></li>
                        <li class="footer-link"><a href="#services">Services</a></li>
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
                        <p><i class="fas fa-map-marker-alt"></i> 234 Jekadafari Gombe, Gombe State Nigeria</p>
                        <p><i class="fas fa-phone-alt"></i> 9122190440</p>
                        <p><i class="fas fa-envelope"></i> info@carshop.com</p>
                        <p><i class="fas fa-clock"></i> Mon-Sat: 9AM - 8PM, Sun: 10AM - 6PM</p>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2025 CARSHOP. All Rights Reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
            </div>
        </div>
    </footer>

    <!-- Car Details Modal -->
    <div id="carModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Vehicle Details</h3>
                <span class="modal-close">&times;</span>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- Content will be loaded by JavaScript -->
            </div>
        </div>
    </div>

    <!-- Video Modal -->
    <div id="videoModal" class="video-modal">
        <div class="video-container">
            <span class="close-video">&times;</span>
            <iframe id="videoFrame" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
 <!-- Swiper JS -->
 <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="./assets/JAVASCRIPT/main.js"></script>

</body>
</html>