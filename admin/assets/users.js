// Initialize users page
function initUsersPage() {
  populateUsersTable();

  // Add event listeners specific to users page
  const disableUserBtn = document.getElementById("disableUserBtn");
  if (disableUserBtn) {
    disableUserBtn.addEventListener("click", () => {
      showConfirmModal(
        "Confirm Action",
        `Are you sure you want to ${users.find(u => u.id === currentUserId).status === 'active' ? 'disable' : 'enable'} this user?`,
        () => toggleUserStatus(currentUserId)
      );
    });
  }
}

// Populate users table
function populateUsersTable(filter = "all") {
  const tbody = document.querySelector("#usersTable tbody");
  tbody.innerHTML = "";
  
  let filteredUsers = users;

  if (filter === "active") {
    filteredUsers = users.filter(user => user.status === "active");
  } else if (filter === "inactive") {
    filteredUsers = users.filter(user => user.status === "inactive");
  }

  filteredUsers.forEach(user => {
    const row = document.createElement("tr");

    row.innerHTML = `
      <td>${user.name}</td>
      <td>${user.email}</td>
      <td>${user.phone}</td>
      <td>${formatDate(user.registered)}</td>
      <td><span class="status ${user.status}">${user.status.charAt(0).toUpperCase() + user.status.slice(1)}</span></td>
      <td>
        <div class="table-actions">
          <button class="btn btn-outline view-user-btn" data-id="${user.id}">
            <i class="fas fa-eye" aria-hidden="true"></i>
          </button>
          <button class="btn btn-outline disable-user-btn" data-id="${user.id}">
            <i class="fas fa-user-slash" aria-hidden="true"></i>
          </button>
        </div>
      </td>
    `;

    tbody.appendChild(row);
  });
  
  // Add event listeners to view and disable buttons
  document.querySelectorAll(".view-user-btn").forEach(btn => {
    btn.addEventListener("click", (e) => {
      const userId = parseInt(e.currentTarget.getAttribute("data-id"));
      viewUserDetails(userId);
    });
  });

  document.querySelectorAll(".disable-user-btn").forEach(btn => {
    btn.addEventListener("click", (e) => {
      const userId = parseInt(e.currentTarget.getAttribute("data-id"));
      const user = users.find(u => u.id === userId);
      const action = user.status === 'active' ? 'disable' : 'enable';

      showConfirmModal(
        `${action.charAt(0).toUpperCase() + action.slice(1)} User`,
        `Are you sure you want to ${action} this user?`,
        () => toggleUserStatus(userId)
      );
    });
  });
}

// View user details
function viewUserDetails(userId) {
  const user = users.find(u => u.id === userId);
  if (!user) return;
  
  currentUserId = userId;

  const content = document.getElementById("userDetailsContent");
  content.innerHTML = `
    <div class="user-details-grid">
      <div class="user-details-item">
        <div class="user-details-label">Name</div>
        <div class="user-details-value">${user.name}</div>
      </div>
      <div class="user-details-item">
        <div class="user-details-label">Email</div>
        <div class="user-details-value">${user.email}</div>
      </div>
      <div class="user-details-item">
        <div class="user-details-label">Phone</div>
        <div class="user-details-value">${user.phone}</div>
      </div>
      <div class="user-details-item">
        <div class="user-details-label">Registered</div>
        <div class="user-details-value">${formatDate(user.registered)}</div>
      </div>
      <div class="user-details-item">
        <div class="user-details-label">Status</div>
        <div class="user-details-value"><span class="status ${user.status}">${user.status.charAt(0).toUpperCase() + user.status.slice(1)}</span></div>
      </div>
    </div>

    <h4 style="margin: 1.5rem 0 0.5rem; color: var(--primary);">User Orders</h4>
    <div class="data-table-wrapper">
      <table class="data-table">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Car</th>
            <th>Price</th>
            <th>Date</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          ${orders.filter(o => o.customer.id === userId).map(order => `
            <tr>
              <td>#${order.id}</td>
              <td>${order.car.year} ${order.car.make} ${order.car.model}</td>
              <td>₦${order.price.toLocaleString()}</td>
              <td>${formatDate(order.date)}</td>
              <td><span class="status ${order.status}">${order.status.charAt(0).toUpperCase() + order.status.slice(1)}</span></td>
            </tr>
          `).join('') || '<tr><td colspan="5" style="text-align: center;">No orders found</td></tr>'}
        </tbody>
      </table>
    </div>
  `;
  
  // Update disable/enable button text based on current status
  disableUserBtn.innerHTML = `
    <i class="fas fa-user-slash" aria-hidden="true"></i> ${user.status === 'active' ? 'Disable' : 'Enable'} User
  `;

  toggleModal(userDetailsModal);
}

// Toggle user status (active/inactive)
function toggleUserStatus(userId) {
  const userIndex = users.findIndex(u => u.id === userId);
  if (userIndex !== -1) {
    users[userIndex].status = users[userIndex].status === 'active' ? 'inactive' : 'active';

    // Update UI
    populateUsersTable(document.querySelector("#manage-users .tab.active").getAttribute("data-tab"));
    toggleModal(confirmModal);

    // Close user details modal if open
    if (userDetailsModal.classList.contains("active")) {
      toggleModal(userDetailsModal);
    }
  }
}

// Tab functionality for users page
const usersTabs = document.querySelectorAll("#manage-users .tab");
if (usersTabs) {
  usersTabs.forEach((tab) => {
    tab.addEventListener("click", () => {
      const tabId = tab.getAttribute("data-tab");

      // Update active tab
      usersTabs.forEach((t) => t.classList.remove("active"));
      tab.classList.add("active");

      populateUsersTable(tabId);
    });
  });
}

// Initialize when users page loads
if (document.getElementById("manage-users")) {
  initUsersPage();
}