// DOM Elements
const sidebar = document.getElementById("sidebar");
const menuToggle = document.getElementById("menuToggle");
const navItems = document.querySelectorAll(".nav-item");
const pages = document.querySelectorAll(".page");
const tabs = document.querySelectorAll(".tab");
const addCarModal = document.getElementById("addCarModal");
const orderDetailsModal = document.getElementById("orderDetailsModal");
const userDetailsModal = document.getElementById("userDetailsModal");
const confirmModal = document.getElementById("confirmModal");
const addCarBtn = document.getElementById("addCarBtn");
const cancelAddCar = document.getElementById("cancelAddCar");
const saveCarBtn = document.getElementById("saveCarBtn");
const closeOrderDetails = document.getElementById("closeOrderDetails");
const closeUserDetails = document.getElementById("closeUserDetails");
const printOrderBtn = document.getElementById("printOrderBtn");
const disableUserBtn = document.getElementById("disableUserBtn");
const cancelConfirm = document.getElementById("cancelConfirm");
const confirmAction = document.getElementById("confirmAction");
const modalCloseButtons = document.querySelectorAll(".modal-close");
const bottomNavItems = document.querySelectorAll(".bottom-nav-item");
const logoutBtn = document.getElementById("logoutBtn");
const saveSettingsBtn = document.getElementById("saveSettingsBtn");
const carForm = document.getElementById("carForm");

// Sample Data (In a real app, this would come from a backend API)
let cars = [
  {
    id: 1,
    make: "Toyota",
    model: "Camry",
    year: 2022,
    price: 5000000,
    mileage: 15000,
    color: "Red",
    description: "Excellent condition with low mileage",
    status: "available",
    images: ["https://via.placeholder.com/300x200?text=Toyota+Camry"]
  },
  {
    id: 2,
    make: "Honda",
    model: "Accord",
    year: 2021,
    price: 4500000,
    mileage: 20000,
    color: "Blue",
    description: "Well maintained with full service history",
    status: "available",
    images: ["https://via.placeholder.com/300x200?text=Honda+Accord"]
  },
  {
    id: 3,
    make: "BMW",
    model: "X5",
    year: 2020,
    price: 8000000,
    mileage: 25000,
    color: "Black",
    description: "Luxury SUV with all features",
    status: "sold",
    images: ["https://via.placeholder.com/300x200?text=BMW+X5"]
  }
];

let orders = [
  {
    id: 1001,
    customer: { id: 1, name: "John Smith", email: "john@example.com", phone: "08012345678" },
    car: { id: 1, make: "Toyota", model: "Camry", year: 2022 },
    price: 5000000,
    date: "2023-05-15",
    status: "confirmed",
    paymentMethod: "Bank Transfer"
  },
  {
    id: 1002,
    customer: { id: 2, name: "Sarah Johnson", email: "sarah@example.com", phone: "08023456789" },
    car: { id: 2, make: "Honda", model: "Accord", year: 2021 },
    price: 4500000,
    date: "2023-05-10",
    status: "pending",
    paymentMethod: "Credit Card"
  },
  {
    id: 1003,
    customer: { id: 3, name: "Michael Brown", email: "michael@example.com", phone: "08034567890" },
    car: { id: 3, make: "BMW", model: "X5", year: 2020 },
    price: 8000000,
    date: "2023-04-28",
    status: "completed",
    paymentMethod: "Bank Transfer"
  },
  {
    id: 1004,
    customer: { id: 4, name: "Emily Davis", email: "emily@example.com", phone: "08045678901" },
    car: { id: 1, make: "Toyota", model: "Camry", year: 2022 },
    price: 5000000,
    date: "2023-05-18",
    status: "cancelled",
    paymentMethod: "Credit Card"
  }
];

let users = [
  {
    id: 1,
    name: "John Smith",
    email: "john@example.com",
    phone: "08012345678",
    registered: "2023-01-15",
    status: "active"
  },
  {
    id: 2,
    name: "Sarah Johnson",
    email: "sarah@example.com",
    phone: "08023456789",
    registered: "2023-02-20",
    status: "active"
  },
  {
    id: 3,
    name: "Michael Brown",
    email: "michael@example.com",
    phone: "08034567890",
    registered: "2023-03-10",
    status: "active"
  },
  {
    id: 4,
    name: "Emily Davis",
    email: "emily@example.com",
    phone: "08045678901",
    registered: "2023-04-05",
    status: "inactive"
  }
];

// State variables
let currentCarId = null;
let currentOrderId = null;
let currentUserId = null;
let confirmCallback = null;

// Initialize the dashboard
function initDashboard() {
  updateStats();
  populateRecentOrders();
  populateCarsTable();
  populateOrdersTable();
  populateUsersTable();
  loadSettings();
}

// Update dashboard statistics
function updateStats() {
  document.getElementById("totalCars").textContent = cars.length;
  document.getElementById("totalOrders").textContent = orders.length;
  document.getElementById("totalUsers").textContent = users.length;
  
  const totalRevenue = orders.reduce((sum, order) => {
    return order.status === 'completed' ? sum + order.price : sum;
  }, 0);
  
  document.getElementById("totalRevenue").textContent = `₦${totalRevenue.toLocaleString()}`;
}

// Populate recent orders table
function populateRecentOrders() {
  const tbody = document.querySelector("#recentOrdersTable tbody");
  tbody.innerHTML = "";
  
  const recentOrders = [...orders].sort((a, b) => new Date(b.date) - new Date(a.date)).slice(0, 5);
  
  recentOrders.forEach(order => {
    const row = document.createElement("tr");
    
    row.innerHTML = `
      <td>#${order.id}</td>
      <td>${order.customer.name}</td>
      <td>${order.car.year} ${order.car.make} ${order.car.model}</td>
      <td>₦${order.price.toLocaleString()}</td>
      <td><span class="status ${order.status}">${order.status.charAt(0).toUpperCase() + order.status.slice(1)}</span></td>
      <td>${formatDate(order.date)}</td>
      <td>
        <div class="table-actions">
          <button class="btn btn-outline view-order-btn" data-id="${order.id}">
            <i class="fas fa-eye" aria-hidden="true"></i>
          </button>
          <button class="btn btn-outline">
            <i class="fas fa-print" aria-hidden="true"></i>
          </button>
        </div>
      </td>
    `;
    
    tbody.appendChild(row);
  });
  
  // Add event listeners to view order buttons
  document.querySelectorAll(".view-order-btn").forEach(btn => {
    btn.addEventListener("click", (e) => {
      const orderId = parseInt(e.currentTarget.getAttribute("data-id"));
      viewOrderDetails(orderId);
    });
  });
}

// Populate cars table
function populateCarsTable(filter = "all") {
  const tbody = document.querySelector("#carsTable tbody");
  tbody.innerHTML = "";
  
  let filteredCars = cars;
  
  if (filter === "available") {
    filteredCars = cars.filter(car => car.status === "available");
  } else if (filter === "sold") {
    filteredCars = cars.filter(car => car.status === "sold");
  }
  
  filteredCars.forEach(car => {
    const row = document.createElement("tr");
    
    row.innerHTML = `
      <td><img src="${car.images[0]}" alt="${car.make} ${car.model}" class="car-thumbnail" /></td>
      <td>${car.make} ${car.model}</td>
      <td>${car.year}</td>
      <td>₦${car.price.toLocaleString()}</td>
      <td><span class="status ${car.status}">${car.status.charAt(0).toUpperCase() + car.status.slice(1)}</span></td>
      <td>
        <div class="table-actions">
          <button class="btn btn-outline edit-car-btn" data-id="${car.id}">
            <i class="fas fa-edit" aria-hidden="true"></i>
          </button>
          <button class="btn btn-outline delete-car-btn" data-id="${car.id}">
            <i class="fas fa-trash" aria-hidden="true"></i>
          </button>
        </div>
      </td>
    `;
    
    tbody.appendChild(row);
  });
  
  // Add event listeners to edit and delete buttons
  document.querySelectorAll(".edit-car-btn").forEach(btn => {
    btn.addEventListener("click", (e) => {
      const carId = parseInt(e.currentTarget.getAttribute("data-id"));
      editCar(carId);
    });
  });
  
  document.querySelectorAll(".delete-car-btn").forEach(btn => {
    btn.addEventListener("click", (e) => {
      const carId = parseInt(e.currentTarget.getAttribute("data-id"));
      showConfirmModal(
        "Delete Car",
        "Are you sure you want to delete this car? This action cannot be undone.",
        () => deleteCar(carId)
      );
    });
  });
}

// Populate orders table
function populateOrdersTable(filter = "all") {
  const tbody = document.querySelector("#ordersTable tbody");
  tbody.innerHTML = "";
  
  let filteredOrders = orders;
  
  if (filter !== "all") {
    filteredOrders = orders.filter(order => order.status === filter);
  }
  
  filteredOrders.forEach(order => {
    const row = document.createElement("tr");
    
    row.innerHTML = `
      <td>#${order.id}</td>
      <td>${order.customer.name}</td>
      <td>${order.car.year} ${order.car.make} ${order.car.model}</td>
      <td>₦${order.price.toLocaleString()}</td>
      <td>${formatDate(order.date)}</td>
      <td><span class="status ${order.status}">${order.status.charAt(0).toUpperCase() + order.status.slice(1)}</span></td>
      <td>
        <div class="table-actions">
          <button class="btn btn-outline view-order-btn" data-id="${order.id}">
            <i class="fas fa-eye" aria-hidden="true"></i>
          </button>
          ${order.status === 'pending' ? `
            <button class="btn btn-primary confirm-order-btn" data-id="${order.id}">
              <i class="fas fa-check" aria-hidden="true"></i> Confirm
            </button>
          ` : ''}
        </div>
      </td>
    `;
    
    tbody.appendChild(row);
  });
  
  // Add event listeners to view and confirm buttons
  document.querySelectorAll(".view-order-btn").forEach(btn => {
    btn.addEventListener("click", (e) => {
      const orderId = parseInt(e.currentTarget.getAttribute("data-id"));
      viewOrderDetails(orderId);
    });
  });
  
  document.querySelectorAll(".confirm-order-btn").forEach(btn => {
    btn.addEventListener("click", (e) => {
      const orderId = parseInt(e.currentTarget.getAttribute("data-id"));
      showConfirmModal(
        "Confirm Order",
        "Are you sure you want to confirm this order?",
        () => confirmOrder(orderId)
      );
    });
  });
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

// View order details
function viewOrderDetails(orderId) {
  const order = orders.find(o => o.id === orderId);
  if (!order) return;
  
  currentOrderId = orderId;
  
  const content = document.getElementById("orderDetailsContent");
  content.innerHTML = `
    <div class="order-details-item">
      <span class="order-details-label">Order ID:</span>
      <span class="order-details-value">#${order.id}</span>
    </div>
    <div class="order-details-item">
      <span class="order-details-label">Date:</span>
      <span class="order-details-value">${formatDate(order.date)}</span>
    </div>
    <div class="order-details-item">
      <span class="order-details-label">Status:</span>
      <span class="order-details-value"><span class="status ${order.status}">${order.status.charAt(0).toUpperCase() + order.status.slice(1)}</span></span>
    </div>
    <div class="order-details-item">
      <span class="order-details-label">Payment Method:</span>
      <span class="order-details-value">${order.paymentMethod}</span>
    </div>
    
    <h4 style="margin: 1.5rem 0 0.5rem; color: var(--primary);">Customer Information</h4>
    <div class="order-details-item">
      <span class="order-details-label">Name:</span>
      <span class="order-details-value">${order.customer.name}</span>
    </div>
    <div class="order-details-item">
      <span class="order-details-label">Email:</span>
      <span class="order-details-value">${order.customer.email}</span>
    </div>
    <div class="order-details-item">
      <span class="order-details-label">Phone:</span>
      <span class="order-details-value">${order.customer.phone}</span>
    </div>
    
    <h4 style="margin: 1.5rem 0 0.5rem; color: var(--primary);">Car Information</h4>
    <div class="order-details-item">
      <span class="order-details-label">Make & Model:</span>
      <span class="order-details-value">${order.car.year} ${order.car.make} ${order.car.model}</span>
    </div>
    <div class="order-details-item">
      <span class="order-details-label">Price:</span>
      <span class="order-details-value">₦${order.price.toLocaleString()}</span>
    </div>
  `;
  
  toggleModal(orderDetailsModal);
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

// Add new car
function addNewCar() {
  currentCarId = null;
  carForm.reset();
  toggleModal(addCarModal);
}

// Edit car
function editCar(carId) {
  const car = cars.find(c => c.id === carId);
  if (!car) return;
  
  currentCarId = carId;
  
  // Fill the form with car data
  document.getElementById("carMake").value = car.make;
  document.getElementById("carModel").value = car.model;
  document.getElementById("carYear").value = car.year;
  document.getElementById("carPrice").value = car.price;
  document.getElementById("carMileage").value = car.mileage;
  document.getElementById("carColor").value = car.color;
  document.getElementById("carDescription").value = car.description;
  
  // Set status radio button
  document.querySelector(`input[name="carStatus"][value="${car.status}"]`).checked = true;
  
  toggleModal(addCarModal);
}

// Save car (add or update)
function saveCar() {
  const make = document.getElementById("carMake").value;
  const model = document.getElementById("carModel").value;
  const year = document.getElementById("carYear").value;
  const price = document.getElementById("carPrice").value;
  const mileage = document.getElementById("carMileage").value;
  const color = document.getElementById("carColor").value;
  const description = document.getElementById("carDescription").value;
  const status = document.querySelector('input[name="carStatus"]:checked').value;
  
  // Simple validation
  if (!make || !model || !year || !price) {
    alert("Please fill in all required fields");
    return;
  }
  
  if (currentCarId) {
    // Update existing car
    const carIndex = cars.findIndex(c => c.id === currentCarId);
    if (carIndex !== -1) {
      cars[carIndex] = {
        ...cars[carIndex],
        make,
        model,
        year: parseInt(year),
        price: parseFloat(price),
        mileage: mileage ? parseInt(mileage) : null,
        color,
        description,
        status
      };
    }
  } else {
    // Add new car
    const newCar = {
      id: Math.max(...cars.map(c => c.id), 0) + 1,
      make,
      model,
      year: parseInt(year),
      price: parseFloat(price),
      mileage: mileage ? parseInt(mileage) : null,
      color,
      description,
      status,
      images: ["https://via.placeholder.com/300x200?text=" + make + "+" + model]
    };
    
    cars.push(newCar);
  }
  
  // Update UI
  populateCarsTable(document.querySelector(".tab.active").getAttribute("data-tab"));
  updateStats();
  toggleModal(addCarModal);
}

// Delete car
function deleteCar(carId) {
  cars = cars.filter(c => c.id !== carId);
  
  // Also remove any orders for this car
  orders = orders.filter(o => o.car.id !== carId);
  
  // Update UI
  populateCarsTable(document.querySelector(".tab.active").getAttribute("data-tab"));
  populateOrdersTable(document.querySelector("#manage-orders .tab.active").getAttribute("data-tab"));
  updateStats();
  toggleModal(confirmModal);
}

// Confirm order
function confirmOrder(orderId) {
  const orderIndex = orders.findIndex(o => o.id === orderId);
  if (orderIndex !== -1) {
    orders[orderIndex].status = "confirmed";
    
    // Update the car status to sold
    const carId = orders[orderIndex].car.id;
    const carIndex = cars.findIndex(c => c.id === carId);
    if (carIndex !== -1) {
      cars[carIndex].status = "sold";
    }
    
    // Update UI
    populateOrdersTable(document.querySelector("#manage-orders .tab.active").getAttribute("data-tab"));
    populateCarsTable(document.querySelector("#manage-cars .tab.active").getAttribute("data-tab"));
    updateStats();
    toggleModal(confirmModal);
    
    // In a real app, you would send a confirmation email here
    console.log(`Sending confirmation email for order #${orderId}`);
  }
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

// Show confirmation modal
function showConfirmModal(title, content, callback) {
  document.getElementById("confirmModalTitle").textContent = title;
  document.getElementById("confirmModalContent").textContent = content;
  confirmCallback = callback;
  toggleModal(confirmModal);
}

// Load settings
function loadSettings() {
  // In a real app, this would come from a backend API
  const settings = {
    shopName: "Premium Auto Shop",
    shopEmail: "info@premiumautoshop.com",
    shopPhone: "08001234567",
    shopAddress: "123 Auto Plaza, Victoria Island, Lagos"
  };
  
  document.getElementById("shopName").value = settings.shopName;
  document.getElementById("shopEmail").value = settings.shopEmail;
  document.getElementById("shopPhone").value = settings.shopPhone;
  document.getElementById("shopAddress").value = settings.shopAddress;
}

// Save settings
function saveSettings() {
  const settings = {
    shopName: document.getElementById("shopName").value,
    shopEmail: document.getElementById("shopEmail").value,
    shopPhone: document.getElementById("shopPhone").value,
    shopAddress: document.getElementById("shopAddress").value
  };
  
  // In a real app, you would save these to a backend API
  console.log("Saving settings:", settings);
  alert("Settings saved successfully!");
}

// Format date
function formatDate(dateString) {
  const options = { year: 'numeric', month: 'short', day: 'numeric' };
  return new Date(dateString).toLocaleDateString(undefined, options);
}

// Toggle modal
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

// Event Listeners
document.addEventListener("DOMContentLoaded", initDashboard);

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
    const parentPage = tab.closest(".page").id;

    // Update active tab
    tabs.forEach((t) => {
      if (t.closest(".page").id === parentPage) {
        t.classList.remove("active");
      }
    });
    tab.classList.add("active");

    // Update the corresponding table
    if (parentPage === "manage-cars") {
      populateCarsTable(tabId);
    } else if (parentPage === "manage-orders") {
      populateOrdersTable(tabId);
    } else if (parentPage === "manage-users") {
      populateUsersTable(tabId);
    }
  });
});

// Modal controls
addCarBtn.addEventListener("click", addNewCar);
cancelAddCar.addEventListener("click", () => toggleModal(addCarModal));
saveCarBtn.addEventListener("click", saveCar);

closeOrderDetails.addEventListener("click", () => toggleModal(orderDetailsModal));
closeUserDetails.addEventListener("click", () => toggleModal(userDetailsModal));

printOrderBtn.addEventListener("click", () => {
  alert("Printing order receipt...");
  // In a real app, this would open a print dialog with the order details
});

disableUserBtn.addEventListener("click", () => {
  showConfirmModal(
    "Confirm Action",
    `Are you sure you want to ${users.find(u => u.id === currentUserId).status === 'active' ? 'disable' : 'enable'} this user?`,
    () => toggleUserStatus(currentUserId)
  );
});

cancelConfirm.addEventListener("click", () => toggleModal(confirmModal));
confirmAction.addEventListener("click", () => {
  if (confirmCallback) {
    confirmCallback();
  }
});

// Close modals when clicking close button
modalCloseButtons.forEach((btn) => {
  btn.addEventListener("click", function () {
    const modal = this.closest(".modal");
    toggleModal(modal);
  });
});

// Close modals when clicking outside
document.querySelectorAll(".modal").forEach((modal) => {
  modal.addEventListener("click", function (e) {
    if (e.target === this) {
      toggleModal(this);
    }
  });
});

// Logout
logoutBtn.addEventListener("click", () => {
  showConfirmModal(
    "Logout",
    "Are you sure you want to logout?",
    () => {
      alert("You have been logged out. Redirecting to login page...");
      // In a real app, this would redirect to the login page
    }
  );
});

// Save settings
saveSettingsBtn.addEventListener("click", saveSettings);

// Responsive adjustments
window.addEventListener("resize", () => {
  if (window.innerWidth >= 768) {
    sidebar.classList.remove("active");
  }
});