<!DOCTYPE html>
<html lang="en">
<head>
  <?php include './partial/head.php'; ?>
</head>
<body>
  <!-- Main Layout -->
  <div class="main-layout">
    <?php include './partial/header.php'; ?>
    <?php include './partial/sidebar.php'; ?>

    <!-- Main Content -->
    <main class="main-content">
      <!-- Dashboard Page -->
      <div class="page active" id="index">
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
    </main>
  </div>

  <?php include './partial/modal.php'; ?>

  <script src="./assets/main.js"></script>
  <script src="./assets/dashboard.js"></script>

</body>
</html>