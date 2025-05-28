// Initialize orders page
function initOrdersPage() {
  populateOrdersTable();

  // Add event listeners specific to orders page
  const printOrderBtn = document.getElementById("printOrderBtn");
  if (printOrderBtn) {
    printOrderBtn.addEventListener("click", () => {
      alert("Printing order receipt...");
    });
  }
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
    toggleModal(confirmModal);

    // In a real app, you would send a confirmation email here
    console.log(`Sending confirmation email for order #${orderId}`);
  }
}

// Tab functionality for orders page
const ordersTabs = document.querySelectorAll("#manage-orders .tab");
if (ordersTabs) {
  ordersTabs.forEach((tab) => {
    tab.addEventListener("click", () => {
      const tabId = tab.getAttribute("data-tab");

      // Update active tab
      ordersTabs.forEach((t) => t.classList.remove("active"));
      tab.classList.add("active");

      populateOrdersTable(tabId);
    });
  });
}

// Initialize when orders page loads
if (document.getElementById("orders")) {
  initOrdersPage();
}