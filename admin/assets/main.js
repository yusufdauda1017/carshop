// DOM Elements that exist on all pages
const sidebar = document.getElementById("sidebar");
const menuToggle = document.getElementById("menuToggle");
const logoutBtn = document.getElementById("logoutBtn");
const modalCloseButtons = document.querySelectorAll(".modal-close");

// State variables
let currentCarId = null;
let currentOrderId = null;
let currentUserId = null;
let confirmCallback = null;

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
  // ... other cars ...
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
  // ... other orders ...
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
  // ... other users ...
];

// Shared utility functions
function formatDate(dateString) {
  const options = { year: 'numeric', month: 'short', day: 'numeric' };
  return new Date(dateString).toLocaleDateString(undefined, options);
}

function toggleModal(modal) {
  modal.classList.toggle("active");
}

function showConfirmModal(title, content, callback) {
  document.getElementById("confirmModalTitle").textContent = title;
  document.getElementById("confirmModalContent").textContent = content;
  confirmCallback = callback;
  toggleModal(confirmModal);
}
document.addEventListener('DOMContentLoaded', function() {
  // Navigation click handlers
  document.querySelectorAll('.nav-item[data-page]').forEach(item => {
    item.addEventListener('click', function(e) {
      e.preventDefault();

      const page = this.getAttribute('data-page');
      if (page) {
        window.location.href = page + '.php';
      }
    });
  });

  // Logout button handler
  const logoutBtn = document.getElementById('logoutBtn');
  if (logoutBtn) {
    logoutBtn.addEventListener('click', function(e) {
      e.preventDefault();
      window.location.href = 'logout.php';
    });
  }

  // Nav group toggle functionality (if you have collapsible sections)
  document.querySelectorAll('.nav-group-header').forEach(header => {
    header.addEventListener('click', function() {
      const group = this.closest('.nav-group');
      if (group) {
        group.classList.toggle('expanded');
      }
    });
  });

  // Add any additional page-specific functionality here
  // For example, you could check the current page and initialize specific functions
  const currentPage = window.location.pathname.split('/').pop();

  if (currentPage === 'index.php') {
    // Initialize dashboard-specific functions
  } else if (currentPage === 'cars.php') {
    // Initialize cars page functions
  }



});

// Toggle sidebar on mobile
menuToggle.addEventListener("click", () => {
  sidebar.classList.toggle("active");
});

// Close modals when clicking close button
modalCloseButtons.forEach((btn) => {
  btn.addEventListener("click", function() {
    const modal = this.closest(".modal");
    toggleModal(modal);
  });
});

// Close modals when clicking outside
document.querySelectorAll(".modal").forEach((modal) => {
  modal.addEventListener("click", function(e) {
    if (e.target === this) {
      toggleModal(this);
    }
  });
});

// Logout
if (logoutBtn) {
  logoutBtn.addEventListener("click", () => {
    showConfirmModal(
      "Logout",
      "Are you sure you want to logout?",
      () => {
  window.location.href =  './logout.php';
      }
    );
  });
}

// Responsive adjustments
window.addEventListener("resize", () => {
  if (window.innerWidth >= 768) {
    sidebar.classList.remove("active");
  }
});
