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
            <!-- Menu Management Page -->
            <div class="page active" id="users">

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
    </main>

</div>
    <?php include './partial/modal.php'; ?>
<script src="./assets/main.js"></script>
<script src="./assets/users.js"></script>


</html>