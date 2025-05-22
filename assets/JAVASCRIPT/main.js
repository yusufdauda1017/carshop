// Intersection Observer for section animations
const sections = document.querySelectorAll('.section');

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, {threshold: 0.1});

sections.forEach(section => {
    observer.observe(section);
});

// AI Navigation Button
const aiNavButton = document.createElement('div');
aiNavButton.className = 'ai-nav';
aiNavButton.innerHTML = `
    <div class="ai-nav-button">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"></path>
            <path d="M12 12v9"></path>
            <path d="m8 17 4 4 4-4"></path>
        </svg>
    </div>
`;
document.body.appendChild(aiNavButton);

// Add click handler for AI button
aiNavButton.addEventListener('click', () => {
    // Add your AI functionality here
    console.log('AI assistant activated');
});
// Document Ready Function
$(document).ready(function() {
    // Mobile Menu Toggle
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        navMenu.classList.toggle('active');
    });

    // Close menu when clicking on a link
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            hamburger.classList.remove('active');
            navMenu.classList.remove('active');
        });
    });

    // Header scroll effect
    window.addEventListener('scroll', () => {
        const header = document.querySelector('.header');
        header.classList.toggle('scrolled', window.scrollY > 50);
    });

    // Initialize Owl Carousels
    $(".model-slider").owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1200: {
                items: 3
            }
        }
    });

    const swiper = new Swiper('.testimonial-slider', {
        // Configuration
        loop: true,
        autoplay: {
            delay: 7000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        },
        slidesPerView: 1,
        spaceBetween: 30,
        centeredSlides: true,
        grabCursor: true,
        effect: 'coverflow',
        coverflowEffect: {
            rotate: 0,
            stretch: 0,
            depth: 100,
            modifier: 2,
            slideShadows: false,
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // Pagination
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            dynamicBullets: true,
        },

        // Breakpoints
        breakpoints: {
            768: {
                slidesPerView: 'auto',
                spaceBetween: 40,
                coverflowEffect: {
                    rotate: 0,
                    stretch: -50,
                    depth: 0,
                    modifier: 1,
                }
            }
        }
    });


    // Price Range Slider
    const priceRange = document.getElementById('price-range');
    const minPrice = document.getElementById('min-price');
    const maxPrice = document.getElementById('max-price');

    priceRange.addEventListener('input', function() {
        maxPrice.textContent = '₦' + parseInt(this.value).toLocaleString();
    });

    // Make and Model Dependencies
    const makeSelect = document.getElementById('make');
    const modelSelect = document.getElementById('model');

    const models = {
        'audi': ['A3', 'A4', 'A6', 'A8', 'Q5', 'Q7', 'Q8', 'e-tron', 'RS7'],
        'bmw': ['3 Series', '5 Series', '7 Series', 'X3', 'X5', 'X7', 'i8', 'M3', 'M5'],
        'mercedes': ['C-Class', 'E-Class', 'S-Class', 'GLA', 'GLC', 'GLE', 'GLS', 'AMG GT'],
        'porsche': ['911', 'Taycan', 'Panamera', 'Cayenne', 'Macan', 'Boxster', 'Cayman'],
        'range-rover': ['Evoque', 'Velar', 'Sport', 'Vogue', 'Defender', 'Discovery'],
        'tesla': ['Model S', 'Model 3', 'Model X', 'Model Y', 'Cybertruck', 'Roadster']
    };

    makeSelect.addEventListener('change', function() {
        modelSelect.innerHTML = '<option value="">All Models</option>';

        if (this.value) {
            models[this.value].forEach(model => {
                const option = document.createElement('option');
                option.value = model.toLowerCase().replace(' ', '-');
                option.textContent = model;
                modelSelect.appendChild(option);
            });
        }
    });

    // Inventory Filter Form Submission
    const inventoryFilterForm = document.getElementById('inventoryFilterForm');
    const filterResults = document.getElementById('filterResults');

    // Sample inventory data
    const inventory = [
        {
            id: 1,
            make: 'bmw',
            model: '7-series',
            year: '2023',
            price: 68900,
            mileage: '12k mi',
            transmission: 'Automatic',
            fuel: '22 MPG',
            horsepower: '335 HP',
            type: 'Sedan',
            image: 'https://images.unsplash.com/photo-1541899481282-d53bffe3c35d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
            title: 'BMW 7 Series'
        },
        {
            id: 2,
            make: 'porsche',
            model: '911',
            year: '2022',
            price: 112500,
            mileage: '8k mi',
            transmission: 'Automatic',
            fuel: '20 MPG',
            horsepower: '443 HP',
            type: 'Coupe',
            image: 'https://images.unsplash.com/photo-1493238792000-8113da705763?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
            title: 'Porsche 911'
        },
        {
            id: 3,
            make: 'range-rover',
            model: 'sport',
            year: '2023',
            price: 79800,
            mileage: '15k mi',
            transmission: 'Automatic',
            fuel: '19 MPG',
            horsepower: '395 HP',
            type: 'SUV',
            image: 'https://images.unsplash.com/photo-1547038577-da80abbc4f19?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1555&q=80',
            title: 'Range Rover Sport'
        },
        {
            id: 4,
            make: 'audi',
            model: 'rs7',
            year: '2023',
            price: 114000,
            mileage: '5k mi',
            transmission: 'Automatic',
            fuel: '18 MPG',
            horsepower: '591 HP',
            type: 'Sedan',
            image: 'https://images.unsplash.com/photo-1555215695-3004980ad54e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
            title: 'Audi RS7 Sportback'
        },
        {
            id: 5,
            make: 'mercedes',
            model: 's-class',
            year: '2023',
            price: 111000,
            mileage: '7k mi',
            transmission: 'Automatic',
            fuel: '24 MPG',
            horsepower: '429 HP',
            type: 'Sedan',
            image: 'https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
            title: 'Mercedes-Benz S-Class'
        },
        {
            id: 6,
            make: 'tesla',
            model: 'model-s',
            year: '2023',
            price: 108000,
            mileage: '3k mi',
            transmission: 'Automatic',
            fuel: 'Electric',
            horsepower: '1020 HP',
            type: 'Sedan',
            image: 'https://images.unsplash.com/photo-1616788494707-ec28f08d05a1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
            title: 'Tesla Model S Plaid'
        }
    ];

    inventoryFilterForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const make = makeSelect.value;
        const model = modelSelect.value;
        const year = document.getElementById('year').value;
        const maxPrice = priceRange.value;

        // Filter inventory
        let results = inventory.filter(car => {
            return (!make || car.make === make) &&
                   (!model || car.model === model) &&
                   (!year || car.year === year) &&
                   (car.price <= maxPrice);
        });

        // Display results
        displayFilterResults(results);
    });

    function displayFilterResults(results) {
        filterResults.innerHTML = '';

        if (results.length === 0) {
            filterResults.innerHTML = '<p class="no-results">No vehicles match your search criteria. Please try different filters.</p>';
            return;
        }

        results.forEach(car => {
            const carCard = document.createElement('div');
            carCard.className = 'car-card';
            carCard.innerHTML = `
                <img src="${car.image}" alt="${car.title}" class="car-img">
                <div class="car-content">
                    <div class="car-meta">
                        <span>${car.year}</span>
                        <span>${car.transmission}</span>
                        <span>${car.mileage}</span>
                    </div>
                    <h3 class="car-title">${car.title}</h3>
                    <div class="car-specs">
                        <div class="car-spec">
                            <i class="fas fa-gas-pump"></i>
                            <span>${car.fuel}</span>
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
                    <p class="car-price">$${car.price.toLocaleString()}</p>
                    <a href="#" class="btn btn-primary view-details" data-car="${car.make}-${car.model}" style="width: 100%;">View Details</a>
                </div>
            `;

            filterResults.appendChild(carCard);
        });

        // Rebind view details events
        bindViewDetailsEvents();
    }

    // Car Details Modal
    const carModal = document.getElementById('carModal');
    const modalClose = document.querySelector('.modal-close');
    const modalBody = document.getElementById('modalBody');

    // Car details data
    const carDetails = {
        'bmw-7-series': {
            title: 'BMW 7 Series',
            year: '2023',
            price: '₦68,900',
            image: 'https://images.unsplash.com/photo-1541899481282-d53bffe3c35d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
            specs: [
                { label: 'Make', value: 'BMW' },
                { label: 'Model', value: '7 Series' },
                { label: 'Year', value: '2023' },
                { label: 'Mileage', value: '12,000 miles' },
                { label: 'Transmission', value: 'Automatic' },
                { label: 'Engine', value: '3.0L Turbocharged I6' },
                { label: 'Horsepower', value: '335 HP' },
                { label: 'MPG', value: '22 City / 29 Highway' },
                { label: 'Drivetrain', value: 'Rear-Wheel Drive' },
                { label: 'Exterior Color', value: 'Mineral White Metallic' },
                { label: 'Interior Color', value: 'Black Vernasca Leather' }
            ],
            features: [
                'Panoramic Sunroof',
                'Heated Front Seats',
                'Apple CarPlay',
                'Android Auto',
                'Wireless Charging',
                'Head-Up Display',
                'Parking Assistant',
                'Harman Kardon Sound System',
                'LED Headlights',
                'Power Trunk'
            ]
        },
        'porsche-911': {
            title: 'Porsche 911',
            year: '2022',
            price: '₦112,500',
            image: 'https://images.unsplash.com/photo-1493238792000-8113da705763?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
            specs: [
                { label: 'Make', value: 'Porsche' },
                { label: 'Model', value: '911 Carrera S' },
                { label: 'Year', value: '2022' },
                { label: 'Mileage', value: '8,000 miles' },
                { label: 'Transmission', value: '8-Speed PDK Automatic' },
                { label: 'Engine', value: '3.0L Twin-Turbo Flat-6' },
                { label: 'Horsepower', value: '443 HP' },
                { label: 'MPG', value: '18 City / 24 Highway' },
                { label: 'Drivetrain', value: 'Rear-Wheel Drive' },
                { label: 'Exterior Color', value: 'GT Silver Metallic' },
                { label: 'Interior Color', value: 'Black Leather' }
            ],
            features: [
                'Sport Chrono Package',
                'Porsche Active Suspension Management',
                '20" Carrera S Wheels',
                'Bose Surround Sound System',
                'Sport Exhaust System',
                'LED Matrix Headlights',
                'Power Sport Seats',
                'Porsche Torque Vectoring',
                'Rear Axle Steering',
                'Porsche Stability Management'
            ]
        },
        'range-rover': {
            title: 'Range Rover Sport',
            year: '2023',
            price: '₦79,800',
            image: 'https://images.unsplash.com/photo-1547038577-da80abbc4f19?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1555&q=80',
            specs: [
                { label: 'Make', value: 'Land Rover' },
                { label: 'Model', value: 'Range Rover Sport' },
                { label: 'Year', value: '2023' },
                { label: 'Mileage', value: '15,000 miles' },
                { label: 'Transmission', value: '8-Speed Automatic' },
                { label: 'Engine', value: '3.0L Supercharged V6' },
                { label: 'Horsepower', value: '395 HP' },
                { label: 'MPG', value: '17 City / 23 Highway' },
                { label: 'Drivetrain', value: 'All-Wheel Drive' },
                { label: 'Exterior Color', value: 'Fuji White' },
                { label: 'Interior Color', value: 'Ebony Windsor Leather' }
            ],
            features: [
                'Terrain Response System',
                'Adaptive Dynamics',
                '21" Alloy Wheels',
                'Meridian Sound System',
                'Panoramic Roof',
                'Keyless Entry',
                'Heated Steering Wheel',
                '360° Parking Aid',
                'Adaptive Cruise Control',
                'Lane Keep Assist'
            ]
        }
    };

    function bindViewDetailsEvents() {
        document.querySelectorAll('.view-details').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const carId = this.getAttribute('data-car');
                showCarDetails(carId);
            });
        });
    }

    function showCarDetails(carId) {
        const car = carDetails[carId];

        if (!car) {
            modalBody.innerHTML = '<p>Details not available for this vehicle.</p>';
            carModal.style.display = 'block';
            return;
        }

        modalBody.innerHTML = `
            <div class="car-details">
                <div class="car-details-img">
                    <img src="${car.image}" alt="${car.title}">
                </div>
                <div class="car-details-info">
                    <h2>${car.title}</h2>
                    <p class="car-details-price">${car.price}</p>

                    <div class="car-details-specs">
                        ${car.specs.map(spec => `
                            <div class="car-details-spec">
                                <span class="car-details-spec-label">${spec.label}:</span>
                                <span>${spec.value}</span>
                            </div>
                        `).join('')}
                    </div>

                    <div class="car-details-features">
                        <h3>Key Features</h3>
                        <div class="features-list">
                            ${car.features.map(feature => `
                                <div class="feature-item">
                                    <i class="fas fa-check"></i>
                                    <span>${feature}</span>
                                </div>
                            `).join('')}
                        </div>
                    </div>
                    <div style="margin-top: 2rem;">
                        <a href="#contact" class="btn btn-primary" style="width: 100%;">Contact Us About This Vehicle</a>
                    </div>
                </div>
            </div>
        `;

        carModal.style.display = 'block';
    }

    // Close modal when clicking X
    modalClose.addEventListener('click', function() {
        carModal.style.display = 'none';
    });

    // Close modal when clicking outside
    window.addEventListener('click', function(e) {
        if (e.target === carModal) {
            carModal.style.display = 'none';
        }
    });

    // Bind initial view details events
    bindViewDetailsEvents();

    // Vehicle Comparison
    const comparisonCards = document.querySelectorAll('.comparison-card');
    const comparisonResults = document.getElementById('comparisonResults');
    const car1Name = document.getElementById('car1Name');
    const car2Name = document.getElementById('car2Name');
    const comparisonTableBody = document.getElementById('comparisonTableBody');

    let selectedCars = [];

    comparisonCards.forEach(card => {
        card.addEventListener('click', function() {
            const carId = this.getAttribute('data-car');

            if (selectedCars.includes(carId)) {
                // Deselect if already selected
                selectedCars = selectedCars.filter(id => id !== carId);
                this.classList.remove('selected');
            } else if (selectedCars.length < 2) {
                // Select if less than 2 selected
                selectedCars.push(carId);
                this.classList.add('selected');
            } else {
                // Replace first selection if already 2 selected
                const firstSelected = document.querySelector(`.comparison-card[data-car="${selectedCars[0]}"]`);
                firstSelected.classList.remove('selected');
                selectedCars[0] = carId;
                this.classList.add('selected');
            }

            updateComparisonResults();
        });
    });

    function updateComparisonResults() {
        if (selectedCars.length === 2) {
            const car1 = carDetails[selectedCars[0]];
            const car2 = carDetails[selectedCars[1]];

            car1Name.textContent = car1.title;
            car2Name.textContent = car2.title;

            // Create comparison table
            comparisonTableBody.innerHTML = '';

            // Add specs to comparison
            const allSpecs = new Set([
                ...car1.specs.map(spec => spec.label),
                ...car2.specs.map(spec => spec.label)
            ]);

            Array.from(allSpecs).forEach(specLabel => {
                const row = document.createElement('tr');

                const spec1 = car1.specs.find(s => s.label === specLabel);
                const spec2 = car2.specs.find(s => s.label === specLabel);

                row.innerHTML = `
                    <td>${specLabel}</td>
                    <td>${spec1 ? spec1.value : 'N/A'}</td>
                    <td>${spec2 ? spec2.value : 'N/A'}</td>
                `;

                comparisonTableBody.appendChild(row);
            });

            comparisonResults.style.display = 'block';
        } else {
            comparisonResults.style.display = 'none';
        }
    }

    // Financing Calculator
    const financingCalculator = document.getElementById('financingCalculator');
    const vehiclePriceInput = document.getElementById('vehiclePrice');
    const vehiclePriceRange = document.getElementById('vehiclePriceRange');
    const downPaymentInput = document.getElementById('downPayment');
    const downPaymentRange = document.getElementById('downPaymentRange');
    const interestRateInput = document.getElementById('interestRate');
    const interestRateRange = document.getElementById('interestRateRange');
    const loanTermSelect = document.getElementById('loanTerm');

    // Sync range and number inputs
    vehiclePriceInput.addEventListener('input', function() {
        vehiclePriceRange.value = this.value;
        calculatePayment();
    });

    vehiclePriceRange.addEventListener('input', function() {
        vehiclePriceInput.value = this.value;
        calculatePayment();
    });

    downPaymentInput.addEventListener('input', function() {
        downPaymentRange.value = this.value;
        calculatePayment();
    });

    downPaymentRange.addEventListener('input', function() {
        downPaymentInput.value = this.value;
        calculatePayment();
    });

    interestRateInput.addEventListener('input', function() {
        interestRateRange.value = this.value;
        calculatePayment();
    });

    interestRateRange.addEventListener('input', function() {
        interestRateInput.value = this.value;
        calculatePayment();
    });

    loanTermSelect.addEventListener('change', calculatePayment);

    // Initial calculation
    calculatePayment();

    function calculatePayment() {
        const vehiclePrice = parseFloat(vehiclePriceInput.value);
        const downPayment = parseFloat(downPaymentInput.value);
        const interestRate = parseFloat(interestRateInput.value) / 100;
        const loanTerm = parseInt(loanTermSelect.value);

        const amountFinanced = vehiclePrice - downPayment;
        const monthlyRate = interestRate / 12;
        const monthlyPayment = (amountFinanced * monthlyRate) / (1 - Math.pow(1 + monthlyRate, -loanTerm));

        // Update results
        document.getElementById('resultVehiclePrice').textContent = '₦' + vehiclePrice.toLocaleString();
        document.getElementById('resultDownPayment').textContent = '₦' + downPayment.toLocaleString();
        document.getElementById('resultAmountFinanced').textContent = '₦' + amountFinanced.toLocaleString();
        document.getElementById('resultInterestRate').textContent = (interestRate * 100).toFixed(1) + '%';
        document.getElementById('resultLoanTerm').textContent = loanTerm + ' months';
        document.getElementById('resultMonthlyPayment').textContent = '₦' + monthlyPayment.toFixed(2);
    }

    financingCalculator.addEventListener('submit', function(e) {
        e.preventDefault();
        calculatePayment();
    });

    // Video Modal
    const videoBtn = document.getElementById('videoBtn');
    const videoModal = document.getElementById('videoModal');
    const videoFrame = document.getElementById('videoFrame');
    const closeVideo = document.querySelector('.close-video');

    videoBtn.addEventListener('click', function(e) {
        e.preventDefault();
        // Convert watch URL to embed format with autoplay
        videoFrame.src = 'https://www.youtube.com/embed/c0C5Vl1CNQs?autoplay=1';
        videoModal.style.display = 'flex';
    });

    closeVideo.addEventListener('click', function() {
        videoFrame.src = '';
        videoModal.style.display = 'none';
    });

    window.addEventListener('click', function(e) {
        if (e.target === videoModal) {
            videoFrame.src = '';
            videoModal.style.display = 'none';
        }
    });







// Neo Accordion
document.querySelectorAll('.neo-question').forEach(button => {
    button.addEventListener('click', () => {
        const expanded = button.getAttribute('aria-expanded') === 'true';
        button.setAttribute('aria-expanded', !expanded);
    });
});

 // Animate cards on scroll
 const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = 1;
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, { threshold: 0.1 });



    // Contact Form Submission
    const contactForm = document.getElementById('contactForm');

    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();

        // Get form values
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const phone = document.getElementById('phone').value;
        const subject = document.getElementById('subject').value;
        const message = document.getElementById('message').value;

        // Here you would typically send the data to a server
        // For demo purposes, we'll just show an alert
        alert(`Thank you for your message, ${name}! We'll contact you soon at ${email} or ${phone}.`);

        // Reset form
        contactForm.reset();
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();

            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: 'smooth'
                });
            }
        });
    });
});
