<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Car Shop Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="./assets/style.css" />
</head>
<body>
  <!-- Top Header -->
  <header class="top-header">
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu">
      <i class="fas fa-bars" aria-hidden="true"></i>
    </button>
    <div class="header-title">
      <i class="fas fa-car" aria-hidden="true"></i>
      <span>Car Shop Admin</span>
    </div>
    <div class="header-controls">
      <div class="notification-bell">
        <i class="fas fa-bell" aria-hidden="true"></i>
        <span class="notification-badge">3</span>
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
        <div class="sidebar-title">Management</div>
        <button class="nav-item active" data-page="dashboard">
          <i class="fas fa-tachometer-alt" aria-hidden="true"></i>
          <span>Dashboard</span>
        </button>
        <button class="nav-item" data-page="manage-cars">
          <i class="fas fa-car" aria-hidden="true"></i>
          <span>Manage Cars</span>
        </button>
        <button class="nav-item" data-page="manage-orders">
          <i class="fas fa-shopping-cart" aria-hidden="true"></i>
          <span>Manage Orders</span>
        </button>
        <button class="nav-item" data-page="manage-users">
          <i class="fas fa-users" aria-hidden="true"></i>
          <span>Manage Users</span>
        </button>
      </div>

      <div class="sidebar-section">
        <div class="sidebar-title">System</div>
        <button class="nav-item" data-page="settings">
          <i class="fas fa-cog" aria-hidden="true"></i>
          <span>Settings</span>
        </button>
        <button class="nav-item" id="logoutBtn">
          <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
          <span>Logout</span>
        </button>
      </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
      <!-- Dashboard Page -->
      <div class="page active" id="dashboard">
        <div class="content-header">
          <h1 class="page-title">Dashboard Overview</h1>
          <div class="welcome-message">Welcome back, Admin!</div>
        </div>

        <!-- Stats Cards -->
        <div class="dashboard-cards">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Total Cars</h3>
              <div class="card-icon">
                <i class="fas fa-car" aria-hidden="true"></i>
              </div>
            </div>
            <p class="card-value" id="totalCars">0</p>
            <p class="card-footer">
              <span class="positive"><i class="fas fa-arrow-up" aria-hidden="true"></i> 5%</span>
              vs last month
            </p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Total Orders</h3>
              <div class="card-icon">
                <i class="fas fa-shopping-cart" aria-hidden="true"></i>
              </div>
            </div>
            <p class="card-value" id="totalOrders">0</p>
            <p class="card-footer">
              <span class="positive"><i class="fas fa-arrow-up" aria-hidden="true"></i> 12%</span>
              vs last month
            </p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Total Users</h3>
              <div class="card-icon">
                <i class="fas fa-users" aria-hidden="true"></i>
              </div>
            </div>
            <p class="card-value" id="totalUsers">0</p>
            <p class="card-footer">
              <span class="positive"><i class="fas fa-arrow-up" aria-hidden="true"></i> 8%</span>
              vs last month
            </p>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Revenue</h3>
              <div class="card-icon">
                <i class="fas fa-dollar-sign" aria-hidden="true"></i>
              </div>
            </div>
            <p class="card-value" id="totalRevenue">₦0</p>
            <p class="card-footer">
              <span class="positive"><i class="fas fa-arrow-up" aria-hidden="true"></i> 15%</span>
              vs last month
            </p>
          </div>
        </div>

        <!-- Recent Orders Section -->
        <div class="section">
          <div class="section-header">
            <h2 class="section-title">Recent Orders</h2>
            <div class="section-actions">
              <button class="btn btn-outline">
                <i class="fas fa-filter" aria-hidden="true"></i> Filter
              </button>
              <button class="btn btn-outline">
                <i class="fas fa-download" aria-hidden="true"></i> Export
              </button>
            </div>
          </div>

          <div class="data-table-wrapper">
            <table class="data-table" id="recentOrdersTable">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Customer</th>
                  <th>Car</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <!-- Will be populated by JavaScript -->
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Manage Cars Page -->
      <div class="page" id="manage-cars">
        <div class="content-header">
          <h1 class="page-title">Manage Cars</h1>
          <button class="action-button" id="addCarBtn">
            <i class="fas fa-plus" aria-hidden="true"></i> Add New Car
          </button>
        </div>

        <div class="tabs">
          <div class="tab active" data-tab="all">All Cars</div>
          <div class="tab" data-tab="available">Available</div>
          <div class="tab" data-tab="sold">Sold</div>
        </div>

        <div class="section">
          <div class="section-header">
            <h2 class="section-title">Car Inventory</h2>
            <div class="section-actions">
              <button class="btn btn-outline">
                <i class="fas fa-filter" aria-hidden="true"></i> Filter
              </button>
              <button class="btn btn-outline">
                <i class="fas fa-download" aria-hidden="true"></i> Export
              </button>
              <button class="btn btn-primary">
                <i class="fas fa-sync-alt" aria-hidden="true"></i> Refresh
              </button>
            </div>
          </div>

          <div class="data-table-wrapper">
            <table class="data-table" id="carsTable">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Make & Model</th>
                  <th>Year</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <!-- Will be populated by JavaScript -->
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Manage Orders Page -->
      <div class="page" id="manage-orders">
        <div class="content-header">
          <h1 class="page-title">Manage Orders</h1>
          <div class="section-actions">
            <button class="btn btn-outline">
              <i class="fas fa-filter" aria-hidden="true"></i> Filter
            </button>
            <button class="btn btn-outline">
              <i class="fas fa-download" aria-hidden="true"></i> Export
            </button>
          </div>
        </div>

        <div class="tabs">
          <div class="tab active" data-tab="all">All Orders</div>
          <div class="tab" data-tab="pending">Pending</div>
          <div class="tab" data-tab="confirmed">Confirmed</div>
          <div class="tab" data-tab="completed">Completed</div>
          <div class="tab" data-tab="cancelled">Cancelled</div>
        </div>

        <div class="section">
          <div class="section-header">
            <h2 class="section-title">Order List</h2>
          </div>

          <div class="data-table-wrapper">
            <table class="data-table" id="ordersTable">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Customer</th>
                  <th>Car</th>
                  <th>Price</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <!-- Will be populated by JavaScript -->
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Manage Users Page -->
      <div class="page" id="manage-users">
        <div class="content-header">
          <h1 class="page-title">Manage Users</h1>
          <div class="section-actions">
            <button class="btn btn-outline">
              <i class="fas fa-filter" aria-hidden="true"></i> Filter
            </button>
            <button class="btn btn-outline">
              <i class="fas fa-download" aria-hidden="true"></i> Export
            </button>
          </div>
        </div>

        <div class="tabs">
          <div class="tab active" data-tab="all">All Users</div>
          <div class="tab" data-tab="active">Active</div>
          <div class="tab" data-tab="inactive">Inactive</div>
        </div>

        <div class="section">
          <div class="section-header">
            <h2 class="section-title">User List</h2>
          </div>

          <div class="data-table-wrapper">
            <table class="data-table" id="usersTable">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Registered</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <!-- Will be populated by JavaScript -->
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Settings Page -->
      <div class="page" id="settings">
        <div class="content-header">
          <h1 class="page-title">System Settings</h1>
          <button class="action-button" id="saveSettingsBtn">
            <i class="fas fa-save" aria-hidden="true"></i> Save Settings
          </button>
        </div>

        <div class="section">
          <div class="section-header">
            <h2 class="section-title">General Settings</h2>
          </div>
          <form id="settingsForm">
            <div class="form-group">
              <label class="form-label" for="shopName">Shop Name</label>
              <input type="text" id="shopName" class="form-control" placeholder="Enter shop name" />
            </div>

            <div class="form-group">
              <label class="form-label" for="shopEmail">Shop Email</label>
              <input type="email" id="shopEmail" class="form-control" placeholder="Enter shop email" />
            </div>

            <div class="form-group">
              <label class="form-label" for="shopPhone">Shop Phone</label>
              <input type="tel" id="shopPhone" class="form-control" placeholder="Enter shop phone" />
            </div>

            <div class="form-group">
              <label class="form-label" for="shopAddress">Shop Address</label>
              <textarea id="shopAddress" class="form-control" rows="3" placeholder="Enter shop address"></textarea>
            </div>
          </form>
        </div>

        <div class="section">
          <div class="section-header">
            <h2 class="section-title">Notification Settings</h2>
          </div>
          <form>
            <div class="form-group">
              <label class="form-label">Email Notifications</label>
              <div style="display: flex; gap: 15px; margin-top: 8px">
                <label style="display: flex; align-items: center; gap: 5px">
                  <input type="checkbox" name="newOrderEmail" checked /> New Order
                </label>
                <label style="display: flex; align-items: center; gap: 5px">
                  <input type="checkbox" name="orderStatusEmail" checked /> Order Status Change
                </label>
                <label style="display: flex; align-items: center; gap: 5px">
                  <input type="checkbox" name="newUserEmail" /> New User Registration
                </label>
              </div>
            </div>
          </form>
        </div>
      </div>
    </main>
  </div>

  <!-- Add Car Modal -->
  <div class="modal" id="addCarModal">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Add New Car</h3>
        <button class="modal-close" aria-label="Close modal">&times;</button>
      </div>
      <div class="modal-body">
        <form id="carForm">
          <div class="form-row">
            <div class="form-group">
              <label class="form-label" for="carMake">Make</label>
              <input type="text" id="carMake" class="form-control" placeholder="e.g. Toyota" required />
            </div>
            <div class="form-group">
              <label class="form-label" for="carModel">Model</label>
              <input type="text" id="carModel" class="form-control" placeholder="e.g. Camry" required />
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label" for="carYear">Year</label>
              <input type="number" id="carYear" class="form-control" placeholder="e.g. 2022" min="1900" max="2099" required />
            </div>
            <div class="form-group">
              <label class="form-label" for="carPrice">Price (₦)</label>
              <input type="number" id="carPrice" class="form-control" placeholder="e.g. 5000000" step="0.01" required />
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" for="carMileage">Mileage (km)</label>
            <input type="number" id="carMileage" class="form-control" placeholder="e.g. 15000" />
          </div>

          <div class="form-group">
            <label class="form-label" for="carColor">Color</label>
            <input type="text" id="carColor" class="form-control" placeholder="e.g. Red" />
          </div>

          <div class="form-group">
            <label class="form-label" for="carDescription">Description</label>
            <textarea id="carDescription" class="form-control" rows="3" placeholder="Enter car description"></textarea>
          </div>

          <div class="form-group">
            <label class="form-label" for="carImages">Car Images</label>
            <input type="file" id="carImages" class="form-control" multiple accept="image/*" />
            <small class="form-text">You can upload multiple images</small>
          </div>

          <div class="form-group">
            <label class="form-label">Status</label>
            <div style="display: flex; gap: 15px; margin-top: 8px">
              <label style="display: flex; align-items: center; gap: 5px">
                <input type="radio" name="carStatus" value="available" checked /> Available
              </label>
              <label style="display: flex; align-items: center; gap: 5px">
                <input type="radio" name="carStatus" value="sold" /> Sold
              </label>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline" id="cancelAddCar">Cancel</button>
        <button class="btn btn-primary" id="saveCarBtn">Save Car</button>
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
        <button class="btn btn-outline" id="closeOrderDetails">Close</button>
        <button class="btn btn-primary" id="printOrderBtn">
          <i class="fas fa-print" aria-hidden="true"></i> Print Receipt
        </button>
      </div>
    </div>
  </div>

  <!-- User Details Modal -->
  <div class="modal" id="userDetailsModal">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">User Details</h3>
        <button class="modal-close" aria-label="Close modal">&times;</button>
      </div>
      <div class="modal-body" id="userDetailsContent">
        <!-- Will be populated by JavaScript -->
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline" id="closeUserDetails">Close</button>
        <button class="btn btn-danger" id="disableUserBtn">
          <i class="fas fa-user-slash" aria-hidden="true"></i> Disable User
        </button>
      </div>
    </div>
  </div>

  <!-- Confirmation Modal -->
  <div class="modal" id="confirmModal">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="confirmModalTitle">Confirm Action</h3>
        <button class="modal-close" aria-label="Close modal">&times;</button>
      </div>
      <div class="modal-body" id="confirmModalContent">
        Are you sure you want to perform this action?
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline" id="cancelConfirm">Cancel</button>
        <button class="btn btn-danger" id="confirmAction">Confirm</button>
      </div>
    </div>
  </div>

  <!-- Bottom Navigation (Mobile Only) -->
  <nav class="bottom-nav">
    <div class="bottom-nav-items">
      <button class="bottom-nav-item active" data-page="dashboard">
        <i class="fas fa-tachometer-alt" aria-hidden="true"></i>
        <span>Dashboard</span>
      </button>
      <button class="bottom-nav-item" data-page="manage-cars">
        <i class="fas fa-car" aria-hidden="true"></i>
        <span>Cars</span>
      </button>
      <button class="bottom-nav-item" data-page="manage-orders">
        <i class="fas fa-shopping-cart" aria-hidden="true"></i>
        <span>Orders</span>
      </button>
      <button class="bottom-nav-item" data-page="manage-users">
        <i class="fas fa-users" aria-hidden="true"></i>
        <span>Users</span>
      </button>
    </div>
  </nav>

  <script src="./assets/script.js"></script>
</body>
</html>