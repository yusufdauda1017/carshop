// DOM Elements
const sidebar = document.getElementById("sidebar");
const menuToggle = document.getElementById("menuToggle");
const navItems = document.querySelectorAll(".nav-item");
const pages = document.querySelectorAll(".page");
const tabs = document.querySelectorAll(".tab");
const orderDetailsModal = document.getElementById("orderDetailsModal");
const supportTicketModal = document.getElementById("supportTicketModal");
const bottomNavItems = document.querySelectorAll(".bottom-nav-item");
const viewAllOrdersBtn = document.getElementById("viewAllOrdersBtn");
const printReceiptBtn = document.getElementById("printReceiptBtn");
const downloadPdfBtn = document.getElementById("downloadPdfBtn");
const newTicketBtn = document.getElementById("newTicketBtn");
const cancelTicketBtn = document.getElementById("cancelTicketBtn");
const submitTicketBtn = document.getElementById("submitTicketBtn");
const saveProfileBtn = document.getElementById("saveProfileBtn");
const modalCloseButtons = document.querySelectorAll(".modal-close");
const profileForm = document.getElementById("profileForm");
const ticketForm = document.getElementById("ticketForm");

// Sample data for demonstration
const userData = {
    firstName: "John",
    lastName: "Doe",
    email: "john.doe@example.com",
    phone: "+1234567890",
    address: "123 Main St, City, Country",
    orders: [
        {
            id: "ORD-2874",
            carModel: "Toyota Camry 2022",
            orderDate: "2023-05-15",
            price: "₦25,000,000",
            status: "delivered",
            deliveryDate: "2023-05-20",
            transactionId: "TX-984532",
            carDetails: {
                color: "Red",
                engine: "2.5L 4-cylinder",
                transmission: "Automatic",
                mileage: "0 km",
                features: ["Leather Seats", "Sunroof", "Navigation System"]
            }
        },
        {
            id: "ORD-2873",
            carModel: "Honda Accord 2023",
            orderDate: "2023-06-10",
            price: "₦28,500,000",
            status: "shipped",
            estimatedDelivery: "2023-06-25",
            transactionId: "TX-984533",
            carDetails: {
                color: "Blue",
                engine: "1.5L Turbo",
                transmission: "CVT",
                mileage: "0 km",
                features: ["Apple CarPlay", "LED Headlights", "Blind Spot Monitoring"]
            }
        },
        {
            id: "ORD-2872",
            carModel: "Ford Mustang 2023",
            orderDate: "2023-06-15",
            price: "₦35,000,000",
            status: "confirmed",
            estimatedDelivery: "2023-07-10",
            transactionId: "TX-984534",
            carDetails: {
                color: "Black",
                engine: "5.0L V8",
                transmission: "10-speed Automatic",
                mileage: "0 km",
                features: ["Premium Sound System", "Performance Package", "Leather Seats"]
            }
        },
        {
            id: "ORD-2871",
            carModel: "Tesla Model 3",
            orderDate: "2023-06-18",
            price: "₦32,000,000",
            status: "pending",
            transactionId: "TX-984535",
            carDetails: {
                color: "White",
                engine: "Electric",
                range: "358 km",
                features: ["Autopilot", "Premium Interior", "Glass Roof"]
            }
        }
    ],
    supportTickets: [
        {
            id: "TKT-4587",
            subject: "Question about my order",
            orderId: "ORD-2874",
            status: "Resolved",
            date: "2023-05-22",
            message: "I have a question about the warranty for my Toyota Camry."
        },
        {
            id: "TKT-4588",
            subject: "Delivery delay",
            orderId: "ORD-2873",
            status: "In Progress",
            date: "2023-06-12",
            message: "My Honda Accord was supposed to arrive yesterday but hasn't been delivered yet."
        }
    ]
};

// Initialize the dashboard
document.addEventListener("DOMContentLoaded", function() {
    // Load user data
    loadUserData();
    
    // Load recent orders
    loadRecentOrders();
    
    // Load all orders
    loadAllOrders();
    
    // Load tracking information
    loadTrackingInfo();
    
    // Load support tickets
    loadSupportTickets();
    
    // Populate order dropdown in support ticket modal
    populateOrderDropdown();
    
    // Set up event listeners
    setupEventListeners();
    
    // Update dashboard stats
    updateDashboardStats();
});

// Function to load user data
function loadUserData() {
    document.getElementById("username").textContent = userData.firstName;
    document.getElementById("firstName").value = userData.firstName;
    document.getElementById("lastName").value = userData.lastName;
    document.getElementById("email").value = userData.email;
    document.getElementById("phone").value = userData.phone;
    document.getElementById("address").value = userData.address;
}

// Function to load recent orders
function loadRecentOrders() {
    const tableBody = document.getElementById("recent-orders-table");
    tableBody.innerHTML = "";
    
    // Show only the 3 most recent orders
    const recentOrders = userData.orders.slice(0, 3);
    
    recentOrders.forEach(order => {
        const row = document.createElement("tr");
        
        row.innerHTML = `
            <td>${order.id}</td>
            <td>${order.carModel}</td>
            <td>${order.orderDate}</td>
            <td>${order.price}</td>
            <td><span class="status ${order.status}">${formatStatus(order.status)}</span></td>
            <td>
                <div class="table-actions">
                    <button class="btn btn-outline view-order-btn" data-order-id="${order.id}">
                        <i class="fas fa-eye" aria-hidden="true"></i>
                    </button>
                    <button class="btn btn-outline print-order-btn" data-order-id="${order.id}">
                        <i class="fas fa-print" aria-hidden="true"></i>
                    </button>
                </div>
            </td>
        `;
        
        tableBody.appendChild(row);
    });
    
    // Add event listeners to the new buttons
    document.querySelectorAll(".view-order-btn").forEach(btn => {
        btn.addEventListener("click", function() {
            const orderId = this.getAttribute("data-order-id");
            showOrderDetails(orderId);
        });
    });
    
    document.querySelectorAll(".print-order-btn").forEach(btn => {
        btn.addEventListener("click", function() {
            const orderId = this.getAttribute("data-order-id");
            printOrderReceipt(orderId);
        });
    });
}

// Function to load all orders
function loadAllOrders() {
    const ordersContainer = document.getElementById("orders-container");
    ordersContainer.innerHTML = "";
    
    userData.orders.forEach(order => {
        const orderCard = document.createElement("div");
        orderCard.className = `order-card ${order.status}`;
        
        orderCard.innerHTML = `
            <div class="order-card-header">
                <div class="order-card-id">${order.id}</div>
                <div class="order-card-time">${formatDate(order.orderDate)}</div>
            </div>
            <div class="order-card-items">
                <div class="order-item">
                    <div class="order-item-name">${order.carModel}</div>
                </div>
            </div>
            <div class="order-card-footer">
                <div class="order-card-total">${order.price}</div>
                <div class="order-card-actions">
                    <span class="status ${order.status}">${formatStatus(order.status)}</span>
                    <button class="btn btn-outline btn-sm view-order-btn" data-order-id="${order.id}">
                        <i class="fas fa-eye" aria-hidden="true"></i> View
                    </button>
                </div>
            </div>
        `;
        
        ordersContainer.appendChild(orderCard);
    });
    
    // Add event listeners to the new buttons
    document.querySelectorAll(".view-order-btn").forEach(btn => {
        btn.addEventListener("click", function() {
            const orderId = this.getAttribute("data-order-id");
            showOrderDetails(orderId);
        });
    });
}

// Function to load tracking information
function loadTrackingInfo() {
    const trackingContainer = document.getElementById("tracking-container");
    trackingContainer.innerHTML = "";
    
    // For demo purposes, we'll show tracking for the first order that's not delivered
    const trackingOrder = userData.orders.find(order => order.status !== "delivered") || userData.orders[0];
    
    if (!trackingOrder) {
        trackingContainer.innerHTML = "<p>No orders to track at the moment.</p>";
        return;
    }
    
    let trackingHTML = `
        <h3>Tracking Order: ${trackingOrder.id}</h3>
        <p>Car Model: ${trackingOrder.carModel}</p>
        
        <div class="tracking-steps">
            <div class="tracking-step ${getStepClass(trackingOrder.status, 'ordered')}">
                <div class="step-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="step-label">Ordered</div>
            </div>
            
            <div class="tracking-step ${getStepClass(trackingOrder.status, 'confirmed')}">
                <div class="step-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="step-label">Confirmed</div>
            </div>
            
            <div class="tracking-step ${getStepClass(trackingOrder.status, 'shipped')}">
                <div class="step-icon">
                    <i class="fas fa-truck"></i>
                </div>
                <div class="step-label">Shipped</div>
            </div>
            
            <div class="tracking-step ${getStepClass(trackingOrder.status, 'delivered')}">
                <div class="step-icon">
                    <i class="fas fa-home"></i>
                </div>
                <div class="step-label">Delivered</div>
            </div>
        </div>
        
        <div class="tracking-details">
            <h4>Order Details</h4>
            
            <div class="tracking-info">
                <div class="tracking-info-label">Order Date:</div>
                <div class="tracking-info-value">${formatDate(trackingOrder.orderDate)}</div>
            </div>
            
            <div class="tracking-info">
                <div class="tracking-info-label">Car Model:</div>
                <div class="tracking-info-value">${trackingOrder.carModel}</div>
            </div>
            
            <div class="tracking-info">
                <div class="tracking-info-label">Price:</div>
                <div class="tracking-info-value">${trackingOrder.price}</div>
            </div>
            
            <div class="tracking-info">
                <div class="tracking-info-label">Status:</div>
                <div class="tracking-info-value"><span class="status ${trackingOrder.status}">${formatStatus(trackingOrder.status)}</span></div>
            </div>
            
            ${trackingOrder.estimatedDelivery ? `
            <div class="tracking-info">
                <div class="tracking-info-label">Estimated Delivery:</div>
                <div class="tracking-info-value">${formatDate(trackingOrder.estimatedDelivery)}</div>
            </div>
            ` : ''}
            
            ${trackingOrder.deliveryDate ? `
            <div class="tracking-info">
                <div class="tracking-info-label">Delivery Date:</div>
                <div class="tracking-info-value">${formatDate(trackingOrder.deliveryDate)}</div>
            </div>
            ` : ''}
            
            <div class="tracking-info">
                <div class="tracking-info-label">Transaction ID:</div>
                <div class="tracking-info-value">${trackingOrder.transactionId}</div>
            </div>
        </div>
    `;
    
    trackingContainer.innerHTML = trackingHTML;
}

// Function to load support tickets
function loadSupportTickets() {
    const ticketsTable = document.getElementById("support-tickets");
    ticketsTable.innerHTML = "";
    
    userData.supportTickets.forEach(ticket => {
        const row = document.createElement("tr");
        
        row.innerHTML = `
            <td>${ticket.id}</td>
            <td>${ticket.subject}</td>
            <td>${ticket.orderId || 'N/A'}</td>
            <td><span class="status ${ticket.status.toLowerCase().replace(' ', '-')}">${ticket.status}</span></td>
            <td>${formatDate(ticket.date)}</td>
            <td>
                <button class="btn btn-outline btn-sm view-ticket-btn" data-ticket-id="${ticket.id}">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                </button>
            </td>
        `;
        
        ticketsTable.appendChild(row);
    });
    
    // Add event listeners to view ticket buttons
    document.querySelectorAll(".view-ticket-btn").forEach(btn => {
        btn.addEventListener("click", function() {
            const ticketId = this.getAttribute("data-ticket-id");
            viewTicketDetails(ticketId);
        });
    });
}

// Function to populate order dropdown in support ticket modal
function populateOrderDropdown() {
    const orderDropdown = document.getElementById("ticketOrder");
    
    userData.orders.forEach(order => {
        const option = document.createElement("option");
        option.value = order.id;
        option.textContent = `${order.id} - ${order.carModel}`;
        orderDropdown.appendChild(option);
    });
}

// Function to update dashboard stats
function updateDashboardStats() {
    document.getElementById("total-orders").textContent = userData.orders.length;
    document.getElementById("pending-orders").textContent = userData.orders.filter(order => order.status === 'pending').length;
    document.getElementById("completed-orders").textContent = userData.orders.filter(order => order.status === 'delivered').length;
    
    // Calculate total spent (for demo, we'll just sum the prices)
    const totalSpent = userData.orders.reduce((total, order) => {
        const price = parseInt(order.price.replace(/[^\d]/g, '')) || 0;
        return total + price;
    }, 0);
    
    document.getElementById("total-spent").textContent = `₦${totalSpent.toLocaleString()}`;
}

// Function to show order details in modal
function showOrderDetails(orderId) {
    const order = userData.orders.find(o => o.id === orderId);
    if (!order) return;
    
    const modalContent = document.getElementById("orderDetailsContent");
    
    modalContent.innerHTML = `
        <div class="order-details">
            <div class="tracking-info">
                <div class="tracking-info-label">Order ID:</div>
                <div class="tracking-info-value">${order.id}</div>
            </div>
            
            <div class="tracking-info">
                <div class="tracking-info-label">Transaction ID:</div>
                <div class="tracking-info-value">${order.transactionId}</div>
            </div>
            
            <div class="tracking-info">
                <div class="tracking-info-label">Order Date:</div>
                <div class="tracking-info-value">${formatDate(order.orderDate)}</div>
            </div>
            
            <div class="tracking-info">
                <div class="tracking-info-label">Status:</div>
                <div class="tracking-info-value"><span class="status ${order.status}">${formatStatus(order.status)}</span></div>
            </div>
            
            ${order.deliveryDate ? `
            <div class="tracking-info">
                <div class="tracking-info-label">Delivery Date:</div>
                <div class="tracking-info-value">${formatDate(order.deliveryDate)}</div>
            </div>
            ` : ''}
            
            ${order.estimatedDelivery ? `
            <div class="tracking-info">
                <div class="tracking-info-label">Estimated Delivery:</div>
                <div class="tracking-info-value">${formatDate(order.estimatedDelivery)}</div>
            </div>
            ` : ''}
            
            <h4 class="mt-4">Car Details</h4>
            
            <div class="tracking-info">
                <div class="tracking-info-label">Model:</div>
                <div class="tracking-info-value">${order.carModel}</div>
            </div>
            
            <div class="tracking-info">
                <div class="tracking-info-label">Price:</div>
                <div class="tracking-info-value">${order.price}</div>
            </div>
            
            <div class="tracking-info">
                <div class="tracking-info-label">Color:</div>
                <div class="tracking-info-value">${order.carDetails.color}</div>
            </div>
            
            <div class="tracking-info">
                <div class="tracking-info-label">Engine:</div>
                <div class="tracking-info-value">${order.carDetails.engine}</div>
            </div>
            
            <div class="tracking-info">
                <div class="tracking-info-label">Transmission:</div>
                <div class="tracking-info-value">${order.carDetails.transmission}</div>
            </div>
            
            ${order.carDetails.mileage ? `
            <div class="tracking-info">
                <div class="tracking-info-label">Mileage:</div>
                <div class="tracking-info-value">${order.carDetails.mileage}</div>
            </div>
            ` : ''}
            
            ${order.carDetails.range ? `
            <div class="tracking-info">
                <div class="tracking-info-label">Range:</div>
                <div class="tracking-info-value">${order.carDetails.range}</div>
            </div>
            ` : ''}
            
            <div class="tracking-info">
                <div class="tracking-info-label">Features:</div>
                <div class="tracking-info-value">
                    <ul>
                        ${order.carDetails.features.map(feature => `<li>${feature}</li>`).join('')}
                    </ul>
                </div>
            </div>
        </div>
    `;
    
    // Store the current order ID for print/download functions
    printReceiptBtn.setAttribute("data-order-id", orderId);
    downloadPdfBtn.setAttribute("data-order-id", orderId);
    
    // Show the modal
    toggleModal(orderDetailsModal);
}

// Function to view ticket details
function viewTicketDetails(ticketId) {
    const ticket = userData.supportTickets.find(t => t.id === ticketId);
    if (!ticket) return;
    
    alert(`Ticket Details:\n\nID: ${ticket.id}\nSubject: ${ticket.subject}\nOrder: ${ticket.orderId || 'N/A'}\nStatus: ${ticket.status}\nDate: ${ticket.date}\n\nMessage:\n${ticket.message}`);
}

// Function to print order receipt
function printOrderReceipt(orderId) {
    const order = userData.orders.find(o => o.id === orderId);
    if (!order) return;
    
    // In a real app, this would open a print dialog with a formatted receipt
    alert(`Printing receipt for order ${orderId}`);
}

// Function to download PDF receipt
function downloadPdfReceipt(orderId) {
    const order = userData.orders.find(o => o.id === orderId);
    if (!order) return;
    
    // In a real app, this would generate and download a PDF
    alert(`Downloading PDF receipt for order ${orderId}`);
}

// Function to submit a new support ticket
function submitSupportTicket() {
    const subject = document.getElementById("ticketSubject").value;
    const orderId = document.getElementById("ticketOrder").value;
    const message = document.getElementById("ticketMessage").value;
    
    if (!subject || !message) {
        alert("Please fill in all required fields");
        return;
    }
    
    // In a real app, this would send the data to the server
    const newTicket = {
        id: `TKT-${Math.floor(1000 + Math.random() * 9000)}`,
        subject: subject,
        orderId: orderId || null,
        status: "Open",
        date: new Date().toISOString().split('T')[0],
        message: message
    };
    
    userData.supportTickets.unshift(newTicket);
    loadSupportTickets();
    toggleModal(supportTicketModal);
    ticketForm.reset();
    
    alert("Your support ticket has been submitted successfully!");
}

// Function to save profile changes
function saveProfileChanges() {
    const firstName = document.getElementById("firstName").value;
    const lastName = document.getElementById("lastName").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const address = document.getElementById("address").value;
    const currentPassword = document.getElementById("currentPassword").value;
    const newPassword = document.getElementById("newPassword").value;
    const confirmPassword = document.getElementById("confirmPassword").value;
    
    if (!firstName || !lastName || !email || !phone || !address) {
        alert("Please fill in all required fields");
        return;
    }
    
    if (newPassword && newPassword !== confirmPassword) {
        alert("New passwords don't match");
        return;
    }
    
    // In a real app, this would send the data to the server
    userData.firstName = firstName;
    userData.lastName = lastName;
    userData.email = email;
    userData.phone = phone;
    userData.address = address;
    
    document.getElementById("username").textContent = firstName;
    
    if (newPassword) {
        // In a real app, you would handle password change securely
        alert("Password changed successfully!");
        document.getElementById("currentPassword").value = "";
        document.getElementById("newPassword").value = "";
        document.getElementById("confirmPassword").value = "";
    }
    
    alert("Profile updated successfully!");
}

// Helper function to format status
function formatStatus(status) {
    return status.charAt(0).toUpperCase() + status.slice(1);
}

// Helper function to format date
function formatDate(dateString) {
    const options = { year: 'numeric', month: 'short', day: 'numeric' };
    return new Date(dateString).toLocaleDateString(undefined, options);
}

// Helper function to determine step class for tracking
function getStepClass(currentStatus, step) {
    const statusOrder = ['ordered', 'confirmed', 'shipped', 'delivered'];
    const currentIndex = statusOrder.indexOf(currentStatus);
    const stepIndex = statusOrder.indexOf(step);
    
    if (stepIndex < currentIndex) return 'completed';
    if (stepIndex === currentIndex) return 'active';
    return 'pending';
}

// Function to toggle modal
function toggleModal(modal) {
    modal.classList.toggle("active");
}

// Function to switch pages
function switchPage(pageId) {
    // Update active nav item in sidebar
    navItems.forEach((navItem) => {
        navItem.classList.remove("active");
        if (navItem.getAttribute("data-page") === pageId) {
            navItem.classList.add("active");
        }
    });

    // Update active bottom nav item
    bottomNavItems.forEach((navItem) => {
        navItem.classList.remove("active");
        if (navItem.getAttribute("data-page") === pageId) {
            navItem.classList.add("active");
        }
    });

    // Show selected page
    pages.forEach((page) => page.classList.remove("active"));
    document.getElementById(pageId).classList.add("active");

    // Close sidebar on mobile after selection
    if (window.innerWidth < 768) {
        sidebar.classList.remove("active");
    }
}

// Function to setup event listeners
function setupEventListeners() {
    // Toggle sidebar on mobile
    menuToggle.addEventListener("click", () => {
        sidebar.classList.toggle("active");
    });

    // Navigation between pages (sidebar)
    navItems.forEach((item) => {
        item.addEventListener("click", (e) => {
            e.preventDefault();
            const pageId = item.getAttribute("data-page");
            switchPage(pageId);
        });
    });

    // Navigation between pages (bottom nav)
    bottomNavItems.forEach((item) => {
        item.addEventListener("click", (e) => {
            e.preventDefault();
            const pageId = item.getAttribute("data-page");
            switchPage(pageId);
        });
    });

    // Tab functionality
    tabs.forEach((tab) => {
        tab.addEventListener("click", () => {
            const tabId = tab.getAttribute("data-tab");

            // Update active tab
            tabs.forEach((t) => t.classList.remove("active"));
            tab.classList.add("active");

            // Filter orders based on tab
            filterOrders(tabId);
        });
    });

    // View all orders button
    viewAllOrdersBtn.addEventListener("click", () => {
        switchPage("orders");
    });

    // Print receipt button
    printReceiptBtn.addEventListener("click", () => {
        const orderId = printReceiptBtn.getAttribute("data-order-id");
        printOrderReceipt(orderId);
    });

    // Download PDF button
    downloadPdfBtn.addEventListener("click", () => {
        const orderId = downloadPdfBtn.getAttribute("data-order-id");
        downloadPdfReceipt(orderId);
    });

    // New ticket button
    newTicketBtn.addEventListener("click", () => {
        toggleModal(supportTicketModal);
    });

    // Cancel ticket button
    cancelTicketBtn.addEventListener("click", () => {
        toggleModal(supportTicketModal);
        ticketForm.reset();
    });

    // Submit ticket button
    submitTicketBtn.addEventListener("click", submitSupportTicket);

    // Save profile button
    saveProfileBtn.addEventListener("click", saveProfileChanges);

    // Close modals when clicking close button
    modalCloseButtons.forEach((btn) => {
        btn.addEventListener("click", function() {
            const modal = this.closest(".modal");
            toggleModal(modal);
        });
    });

    // Close modals when clicking outside
    document.querySelectorAll(".modal").forEach((modal) => {
        modal.addEventListener("click", function(e) {
            if (e.target === this) {
                toggleModal(this);
            }
        });
    });

    // Responsive adjustments
    window.addEventListener("resize", () => {
        if (window.innerWidth >= 768) {
            sidebar.classList.remove("active");
        }
    });
}

// Function to filter orders based on tab selection
function filterOrders(filter) {
    const ordersContainer = document.getElementById("orders-container");
    const orders = userData.orders;
    
    let filteredOrders = orders;
    
    if (filter === 'pending') {
        filteredOrders = orders.filter(order => order.status === 'pending');
    } else if (filter === 'confirmed') {
        filteredOrders = orders.filter(order => order.status === 'confirmed');
    } else if (filter === 'delivered') {
        filteredOrders = orders.filter(order => order.status === 'delivered');
    }
    
    ordersContainer.innerHTML = "";
    
    filteredOrders.forEach(order => {
        const orderCard = document.createElement("div");
        orderCard.className = `order-card ${order.status}`;
        
        orderCard.innerHTML = `
            <div class="order-card-header">
                <div class="order-card-id">${order.id}</div>
                <div class="order-card-time">${formatDate(order.orderDate)}</div>
            </div>
            <div class="order-card-items">
                <div class="order-item">
                    <div class="order-item-name">${order.carModel}</div>
                </div>
            </div>
            <div class="order-card-footer">
                <div class="order-card-total">${order.price}</div>
                <div class="order-card-actions">
                    <span class="status ${order.status}">${formatStatus(order.status)}</span>
                    <button class="btn btn-outline btn-sm view-order-btn" data-order-id="${order.id}">
                        <i class="fas fa-eye" aria-hidden="true"></i> View
                    </button>
                    ${order.status === 'pending' ? `
                    <button class="btn btn-danger btn-sm cancel-order-btn" data-order-id="${order.id}">
                        <i class="fas fa-times" aria-hidden="true"></i> Cancel
                    </button>
                    ` : ''}
                </div>
            </div>
        `;
        
        ordersContainer.appendChild(orderCard);
    });
    
    // Add event listeners to the new buttons
    document.querySelectorAll(".view-order-btn").forEach(btn => {
        btn.addEventListener("click", function() {
            const orderId = this.getAttribute("data-order-id");
            showOrderDetails(orderId);
        });
    });
    
    document.querySelectorAll(".cancel-order-btn").forEach(btn => {
        btn.addEventListener("click", function() {
            const orderId = this.getAttribute("data-order-id");
            if (confirm("Are you sure you want to cancel this order?")) {
                // In a real app, this would send a request to the server
                const order = userData.orders.find(o => o.id === orderId);
                if (order) {
                    order.status = 'cancelled';
                    loadAllOrders();
                    loadRecentOrders();
                    updateDashboardStats();
                    alert("Order has been cancelled successfully.");
                }
            }
        });
    });
}