<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Car Orders - Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    <!-- Top Header -->
    <header class="top-header">
        <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu">
            <i class="fas fa-bars" aria-hidden="true"></i>
        </button>
        <div class="header-title">
            <i class="fas fa-car" aria-hidden="true"></i>
            <a href="#" class="logo">CAR<span>SHOP</span></a>
        </div>
        <div class="header-controls">
            <div class="notification-bell">
                <i class="fas fa-bell" aria-hidden="true"></i>
                <span class="notification-badge">2</span>
            </div>
            <div class="user-avatar">
                <i class="fas fa-user" aria-hidden="true"></i>
            </div>
        </div>
    </header>

    <!-- Main Layout -->
    <div class="main-layout">
        <!-- Sidebar Navigation -->
        <nav class="sidebar" id="sidebar">
            <div class="sidebar-section">
                <div class="sidebar-title">My Account</div>
                <button class="nav-item active" data-page="dashboard">
                    <i class="fas fa-tachometer-alt" aria-hidden="true"></i>
                    <span>Dashboard</span>
                </button>
                <button class="nav-item" data-page="orders">
                    <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                    <span>My Orders</span>
                </button>
                <button class="nav-item" data-page="tracking">
                    <i class="fas fa-truck" aria-hidden="true"></i>
                    <span>Order Tracking</span>
                </button>
            </div>

            <div class="sidebar-section">
                <div class="sidebar-title">Account Settings</div>
                <button class="nav-item" data-page="profile">
                    <i class="fas fa-user-cog" aria-hidden="true"></i>
                    <span>Profile</span>
                </button>
                <button class="nav-item" data-page="support">
                    <i class="fas fa-headset" aria-hidden="true"></i>
                    <span>Support</span>
                </button>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Dashboard Page -->
            <div class="page active" id="dashboard">
                <div class="content-header">
                    <h1 class="page-title">Dashboard Overview</h1>
                </div>

                <!-- Welcome Message -->
                <div class="section">
                    <h2 class="section-title">Welcome back, <span id="username">User</span>!</h2>
                    <p>Here's a quick overview of your recent car orders and account status.</p>
                </div>

                <!-- Stats Cards -->
                <div class="dashboard-cards">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Total Orders</h3>
                            <div class="card-icon">
                                <i class="fas fa-shopping-bag" aria-hidden="true"></i>
                            </div>
                        </div>
                        <p class="card-value" id="total-orders">0</p>
                        <p class="card-footer">
                            <span class="positive"><i class="fas fa-arrow-up" aria-hidden="true"></i> 2</span>
                            this month
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Pending Orders</h3>
                            <div class="card-icon">
                                <i class="fas fa-clock" aria-hidden="true"></i>
                            </div>
                        </div>
                        <p class="card-value" id="pending-orders">0</p>
                        <p class="card-footer">
                            Waiting for processing
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Completed Orders</h3>
                            <div class="card-icon">
                                <i class="fas fa-check-circle" aria-hidden="true"></i>
                            </div>
                        </div>
                        <p class="card-value" id="completed-orders">0</p>
                        <p class="card-footer">
                            Successfully delivered
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Total Spent</h3>
                            <div class="card-icon">
                                <i class="fas fa-dollar-sign" aria-hidden="true"></i>
                            </div>
                        </div>
                        <p class="card-value" id="total-spent">₦0</p>
                        <p class="card-footer">
                            On all your orders
                        </p>
                    </div>
                </div>

                <!-- Recent Orders Section -->
                <div class="section">
                    <div class="section-header">
                        <h2 class="section-title">Recent Orders</h2>
                        <button class="btn btn-primary" id="viewAllOrdersBtn">
                            View All Orders
                        </button>
                    </div>

                    <div class="data-table-wrapper">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Car Model</th>
                                    <th>Order Date</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="recent-orders-table">
                                <!-- Will be populated by JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Orders Page -->
            <div class="page" id="orders">
                <div class="content-header">
                    <h1 class="page-title">My Car Orders</h1>
                    <div class="section-actions">
                        <button class="btn btn-outline" id="filterOrdersBtn">
                            <i class="fas fa-filter" aria-hidden="true"></i> Filter
                        </button>
                    </div>
                </div>

                <div class="tabs">
                    <div class="tab active" data-tab="all">All Orders</div>
                    <div class="tab" data-tab="pending">Pending</div>
                    <div class="tab" data-tab="confirmed">Confirmed</div>
                    <div class="tab" data-tab="delivered">Delivered</div>
                </div>

                <div class="section">
                    <div class="order-queue" id="orders-container">
                        <!-- Will be populated by JavaScript -->
                    </div>
                </div>
            </div>

            <!-- Order Tracking Page -->
            <div class="page" id="tracking">
                <div class="content-header">
                    <h1 class="page-title">Order Tracking</h1>
                </div>

                <div class="section">
                    <div class="tracking-container" id="tracking-container">
                        <!-- Will be populated by JavaScript -->
                    </div>
                </div>
            </div>

            <!-- Profile Page -->
            <div class="page" id="profile">
                <div class="content-header">
                    <h1 class="page-title">My Profile</h1>
                    <button class="action-button" id="saveProfileBtn">
                        <i class="fas fa-save" aria-hidden="true"></i> Save Changes
                    </button>
                </div>

                <div class="section">
                    <form id="profileForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="firstName">First Name</label>
                                <input type="text" id="firstName" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="lastName">Last Name</label>
                                <input type="text" id="lastName" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="phone">Phone</label>
                                <input type="tel" id="phone" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="address">Address</label>
                            <textarea id="address" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Change Password</label>
                            <input type="password" id="currentPassword" class="form-control" placeholder="Current Password">
                            <input type="password" id="newPassword" class="form-control mt-2" placeholder="New Password">
                            <input type="password" id="confirmPassword" class="form-control mt-2" placeholder="Confirm New Password">
                        </div>
                    </form>
                </div>
            </div>

            <!-- Support Page -->
            <div class="page" id="support">
                <div class="content-header">
                    <h1 class="page-title">Customer Support</h1>
                    <button class="action-button" id="newTicketBtn">
                        <i class="fas fa-plus" aria-hidden="true"></i> New Support Ticket
                    </button>
                </div>

                <div class="section">
                    <div class="data-table-wrapper">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Ticket ID</th>
                                    <th>Subject</th>
                                    <th>Order #</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="support-tickets">
                                <!-- Will be populated by JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Order Details Modal -->
            <div class="modal" id="orderDetailsModal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Order Details</h3>
                        <button class="modal-close" aria-label="Close modal">&times;</button>
                    </div>
                    <div class="modal-body" id="orderDetailsContent">
                        <!-- Will be populated by JavaScript -->
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline" id="printReceiptBtn">
                            <i class="fas fa-print" aria-hidden="true"></i> Print Receipt
                        </button>
                        <button class="btn btn-primary" id="downloadPdfBtn">
                            <i class="fas fa-download" aria-hidden="true"></i> Download PDF
                        </button>
                    </div>
                </div>
            </div>

            <!-- Support Ticket Modal -->
            <div class="modal" id="supportTicketModal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">New Support Ticket</h3>
                        <button class="modal-close" aria-label="Close modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="ticketForm">
                            <div class="form-group">
                                <label class="form-label" for="ticketSubject">Subject</label>
                                <input type="text" id="ticketSubject" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="ticketOrder">Related Order (optional)</label>
                                <select id="ticketOrder" class="form-control">
                                    <option value="">Select an order</option>
                                    <!-- Will be populated by JavaScript -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="ticketMessage">Message</label>
                                <textarea id="ticketMessage" class="form-control" rows="5" required></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline" id="cancelTicketBtn">Cancel</button>
                        <button class="btn btn-primary" id="submitTicketBtn">Submit Ticket</button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Bottom Navigation (Mobile Only) -->
    <nav class="bottom-nav">
        <div class="bottom-nav-items">
            <button class="bottom-nav-item active" data-page="dashboard">
                <i class="fas fa-tachometer-alt" aria-hidden="true"></i>
                <span>Dashboard</span>
            </button>
            <button class="bottom-nav-item" data-page="orders">
                <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                <span>Orders</span>
            </button>
            <button class="bottom-nav-item" data-page="tracking">
                <i class="fas fa-truck" aria-hidden="true"></i>
                <span>Tracking</span>
            </button>
            <button class="bottom-nav-item" data-page="profile">
                <i class="fas fa-user" aria-hidden="true"></i>
                <span>Profile</span>
            </button>
        </div>
    </nav>

    <script src="./assets/script.js"></script>
</body>
</html>