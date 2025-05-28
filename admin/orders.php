<!DOCTYPE html>
<html lang="en">
<head>
  <?php include './partial/head.php'; ?>
</head>
<body>
<!-- Include header -->
    <?php include './partial/header.php'; ?>
    <!-- Main Layout -->
    <div class="main-layout">
        <!-- Sidebar (same as main dashboard) -->
        <nav class="sidebar" id="sidebar">
<?php include './partial/sidebar.php'; ?>
        </nav>

        <!-- Main Content -->
        <main class="main-content">

      <div class="page active" id="orders">
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
    </main>
</div>
    <?php include './partial/modal.php'; ?>
<script src="./assets/main.js"></script>

</body>
</html>