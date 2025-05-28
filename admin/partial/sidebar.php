<nav class="sidebar" id="sidebar">
  <div class="sidebar-section">
    <div class="sidebar-title">Management</div>
    <button class="nav-item <?= basename($_SERVER['PHP_SELF']) === 'index.php' ? 'active' : '' ?>" data-page="index">
      <i class="fas fa-tachometer-alt" aria-hidden="true"></i>
      <span>Dashboard</span>
    </button>
    <button class="nav-item <?= basename($_SERVER['PHP_SELF']) === 'cars.php' ? 'active' : '' ?>" data-page="cars">
      <i class="fas fa-car" aria-hidden="true"></i>
      <span>Manage Cars</span>
    </button>
    <button class="nav-item <?= basename($_SERVER['PHP_SELF']) === 'orders.php' ? 'active' : '' ?>" data-page="orders">
      <i class="fas fa-shopping-cart" aria-hidden="true"></i>
      <span>Manage Orders</span>
    </button>
    <button class="nav-item <?= basename($_SERVER['PHP_SELF']) === 'users.php' ? 'active' : '' ?>" data-page="users">
      <i class="fas fa-users" aria-hidden="true"></i>
      <span>Manage Users</span>
    </button>
  </div>

  <div class="sidebar-section">
    <div class="sidebar-title">System</div>
    <button class="nav-item <?= basename($_SERVER['PHP_SELF']) === 'settings.php' ? 'active' : '' ?>" data-page="settings">
      <i class="fas fa-cog" aria-hidden="true"></i>
      <span>Settings</span>
    </button>
    <button class="nav-item" id="logoutBtn">
      <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
      <span>Logout</span>
    </button>
  </div>
</nav>