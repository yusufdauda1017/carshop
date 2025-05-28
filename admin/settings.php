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

      <div class="page active" id="settings">
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

    <?php include './partial/modal.php'; ?>
<script src="./assets/main.js"></script>
<script src="./assets/settings.js"></script>

</body>
</html>