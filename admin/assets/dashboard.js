function updateStats() {
  document.getElementById("totalCars").textContent = cars.length;
  document.getElementById("totalOrders").textContent = orders.length;
  document.getElementById("totalUsers").textContent = users.length;
  
  const revenue = orders.reduce((sum, order) => sum + order.price, 0);
  document.getElementById("totalRevenue").textContent = `₦${revenue.toLocaleString()}`;
}

function populateRecentOrders() {
  const tbody = document.querySelector("#recentOrdersTable tbody");
  tbody.innerHTML = orders.slice(0, 5).map(order => `
    <tr>
      <td>#${order.id}</td>
      <td>${order.customer.name}</td>
      <td>${order.car.make} ${order.car.model}</td>
      <td>₦${order.price.toLocaleString()}</td>
      <td><span class="status ${order.status}">${order.status}</span></td>
      <td>${formatDate(order.date)}</td>
      <td>
        <button class="btn btn-outline view-order-btn" data-id="${order.id}">
          <i class="fas fa-eye"></i>
        </button>
      </td>
    </tr>
  `).join('');
  
  // Add event listeners
  document.querySelectorAll(".view-order-btn").forEach(btn => {
    btn.addEventListener("click", () => {
      const orderId = parseInt(btn.getAttribute("data-id"));
      viewOrderDetails(orderId);
    });
  });
}

function viewOrderDetails(orderId) {
  const order = orders.find(o => o.id === orderId);
  if (!order) return;

  const content = document.getElementById("orderDetailsContent");
  content.innerHTML = `
    <div>Order #${order.id}</div>
    <div>Customer: ${order.customer.name}</div>
    <div>Car: ${order.car.make} ${order.car.model}</div>
    <div>Price: ₦${order.price.toLocaleString()}</div>
  `;

  toggleModal(document.getElementById("orderDetailsModal"));
}

// Initialize when orders page loads
if (document.getElementById("index")) {
  updateStats();
  populateRecentOrders();
}