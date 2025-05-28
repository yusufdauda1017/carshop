<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Car Shop Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="./assets/style.css" />
  <style>
    /* Loading states */
.loading-state {
  text-align: center;
  padding: 2rem;
}

.loading-spinner {
  display: inline-block;
  width: 2rem;
  height: 2rem;
  border: 3px solid rgba(0,0,0,0.1);
  border-radius: 50%;
  border-top-color: var(--primary);
  animation: spin 1s ease-in-out infinite;
  margin-right: 0.5rem;
  vertical-align: middle;
}

@keyframes spin {
  to { transform: rotate(360deg); }
}

/* Empty state */
.empty-state {
  text-align: center;
}

.empty-content {
  padding: 2rem;
  max-width: 300px;
  margin: 0 auto;
}

.empty-content i {
  font-size: 3rem;
  color: var(--medium-gray);
  margin-bottom: 1rem;
}

.empty-content h3 {
  margin-bottom: 0.5rem;
  color: var(--dark-gray);
}

.empty-content p {
  color: var(--medium-gray);
  margin-bottom: 1.5rem;
}

/* File upload preview */
.file-preview-container {
  display: flex;
  flex-wrap: wrap;
  gap: 0.5rem;
  margin-top: 0.5rem;
}

.file-preview-item {
  position: relative;
  width: 100px;
  border: 1px solid var(--light-gray);
  border-radius: var(--border-radius);
  padding: 0.25rem;
  background: var(--light-bg);
}

.file-preview-item img {
  width: 100%;
  height: 60px;
  object-fit: cover;
  border-radius: var(--border-radius-sm);
}

.file-name, .file-size {
  display: block;
  font-size: 0.7rem;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.file-name {
  font-weight: 500;
  margin-top: 0.25rem;
}

.file-size {
  color: var(--medium-gray);
}

/* Car thumbnail in table */
.car-thumbnail {
  width: 60px;
  height: 40px;
  object-fit: cover;
  border-radius: var(--border-radius-sm);
}

.no-image {
  width: 60px;
  height: 40px;
  background: var(--light-bg);
  border-radius: var(--border-radius-sm);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--medium-gray);
}

/* Status badges */
.status {
  display: inline-block;
  padding: 0.25rem 0.5rem;
  border-radius: 1rem;
  font-size: 0.8rem;
  font-weight: 500;
}

.status.available {
  background-color: var(--success-light);
  color: var(--success-dark);
}

.status.sold {
  background-color: var(--danger-light);
  color: var(--danger-dark);
}

.status.reserved {
  background-color: var(--warning-light);
  color: var(--warning-dark);
}

/* Car details in table */
.car-make-model {
  font-weight: 500;
}

.car-type {
  font-size: 0.8rem;
  color: var(--medium-gray);
}

/* Table actions */
.table-actions {
  display: flex;
  gap: 0.25rem;
}

.table-actions .btn {
  padding: 0.35rem;
  min-width: auto;
}

.table-actions .btn i {
  margin: 0;
}
.error-message{
  color:#e74c3c;
}
  </style>
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
            <!-- Menu Management Page -->
            <div class="page active" id="cars">

        <div class="content-header">
          <h1 class="page-title">Manage Cars</h1>
          <button class="action-button" id="addCarBtn">
            <i class="fas fa-plus" aria-hidden="true"></i> Add New Car
          </button>
        </div>
<div class="stats-container">
    <div class="stat-card">
        <div class="stat-value" id="totalCarsCount">0</div>
        <div class="stat-label">Total Cars</div>
    </div>
    <div class="stat-card">
        <div class="stat-value" id="availableCarsCount">0</div>
        <div class="stat-label">Available</div>
    </div>
    <div class="stat-card">
        <div class="stat-value" id="soldCarsCount">0</div>
        <div class="stat-label">Sold</div>
    </div>
    <div class="stat-card highlight">
        <div class="stat-value" id="inventoryValue">₦0</div>
        <div class="stat-label">Inventory Value</div>
    </div>
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
</main>
</div>

  <?php include './partial/modal.php'; ?>

  <script src="./assets/main.js"></script>
  <script src="./assets/cars.js"></script>

</body>
</html>

