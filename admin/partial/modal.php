
  <!-- Bottom Navigation (Mobile Only) -->
  <nav class="bottom-nav">
    <div class="bottom-nav-items">
      <a href="index.html" class="bottom-nav-item active">
        <i class="fas fa-tachometer-alt" aria-hidden="true"></i>
        <span>Dashboard</span>
      </a>
      <a href="cars.html" class="bottom-nav-item">
        <i class="fas fa-car" aria-hidden="true"></i>
        <span>Cars</span>
      </a>
      <a href="orders.html" class="bottom-nav-item">
        <i class="fas fa-shopping-cart" aria-hidden="true"></i>
        <span>Orders</span>
      </a>
      <a href="users.html" class="bottom-nav-item">
        <i class="fas fa-users" aria-hidden="true"></i>
        <span>Users</span>
      </a>
    </div>
  </nav>

 <div class="modal" id="addCarModal">
  <div class="modal-content">
    <div class="modal-header">
      <h3 class="modal-title">Add New Car</h3>
      <button class="modal-close" aria-label="Close modal">&times;</button>
    </div>
    <div class="modal-body">
      <form id="carForm" class="car-form">
        <div class="form-row">
          <div class="form-group">
            <label class="form-label" for="carMake">Make</label>
            <input type="text" id="carMake" class="form-control" placeholder="e.g. Toyota" required />
            <div class="form-hint">Manufacturer brand name</div>
          </div>
          <div class="form-group">
            <label class="form-label" for="carModel">Model</label>
            <input type="text" id="carModel" class="form-control" placeholder="e.g. Camry" required />
            <div class="form-hint">Specific model name</div>
          </div>
        </div>

        <div class="form-row">



 <div class="form-group">
            <label class="form-label" for="carPrice">Cost </label>
            <div class="input-with-icon">
              <input type="number" id="carCost" class="form-control" step="0.01" required />
              <span class="input-icon">₦</span>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" for="carPrice">Price</label>
            <div class="input-with-icon">
              <input type="number" id="carPrice" class="form-control" step="0.01" required />
              <span class="input-icon">₦</span>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label class="form-label" for="carMileage">Mileage</label>
            <div class="input-with-icon">
              <input type="text" id="carMileage" class="form-control" placeholder="e.g. 12,000" />
              <span class="input-icon">mi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label" for="carTransmission">Transmission</label>
            <select id="carTransmission" class="form-control">
              <option value="">Select...</option>
              <option value="Automatic">Automatic</option>
              <option value="Manual">Manual</option>
              <option value="CVT">CVT</option>
              <option value="Dual-Clutch">Dual-Clutch</option>
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label class="form-label" for="carMPG">MPG / Range</label>
            <div class="input-with-icon">
              <input type="text" id="carMPG" class="form-control" placeholder="e.g. 28" />
              <span class="input-icon">mpg</span>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label" for="carHorsepower">Horsepower</label>
            <div class="input-with-icon">
              <input type="text" id="carHorsepower" class="form-control" placeholder="e.g. 250" />
              <span class="input-icon">HP</span>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label class="form-label" for="carType">Vehicle Type</label>
            <select id="carType" class="form-control">
              <option value="">Select...</option>
              <option value="Sedan">Sedan</option>
              <option value="SUV">SUV</option>
              <option value="Truck">Truck</option>
              <option value="Coupe">Coupe</option>
              <option value="Convertible">Convertible</option>
              <option value="Hatchback">Hatchback</option>
              <option value="Minivan">Minivan</option>
              <option value="Sports Car">Sports Car</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label" for="carColor">Color</label>
            <select id="carColor" class="form-control">
              <option value="">Select...</option>
              <option value="Black">Black</option>
              <option value="White">White</option>
              <option value="Silver">Silver</option>
              <option value="Gray">Gray</option>
              <option value="Red">Red</option>
              <option value="Blue">Blue</option>
              <option value="Green">Green</option>
              <option value="Other">Other</option>
            </select>
          </div>
        </div>

<div class="form-row">

  <div class="form-group">
              <label class="form-label" for="carYear">Year</label>
              <div class="input-with-icon">
                <input type="number" id="carYear" class="form-control" min="1900" max="2099" required />
                <span class="input-icon">Year</span>
              </div>
            </div>
          <div class="form-group">
            <label class="form-label" for="carDescription">Description</label>
            <textarea id="carDescription" class="form-control" rows="3" placeholder="Enter detailed description including features, condition, and any special notes"></textarea>
            <div class="form-hint">Max 500 characters</div>
          </div>
</div>

        <div class="form-group">
          <label class="form-label" for="carImage">Image URL</label>
          <input type="url" id="carImage" class="form-control" placeholder="https://example.com/image.jpg" />
          <div class="form-hint">Direct link to high-quality image</div>
        </div>

        <div class="form-group">
          <label class="form-label" for="carImages">Upload Car Images</label>
          <div class="file-upload-area">
            <input type="file" id="carImages" class="file-input" multiple accept="image/*" />
            <label for="carImages" class="file-upload-label">
              <svg class="upload-icon" viewBox="0 0 24 24">
                <path d="M19 13a1 1 0 0 0-1 1v.38l-1.48-1.48a2.79 2.79 0 0 0-3.93 0l-.7.7-2.48-2.48a2.85 2.85 0 0 0-3.93 0L4 12.6V7a1 1 0 0 1 1-1h7a1 1 0 1 0 0-2H5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3v-5a1 1 0 0 0-1-1zM5 20a1 1 0 0 1-1-1v-3.57l2.9-2.9a.79.79 0 0 1 1.09 0l3.17 3.17 4.29 4.3zm13-1a.9.9 0 0 1-.18.53L13.31 15l.7-.7a.77.77 0 0 1 1.1 0L18 17.21zm4.71-14.71l-3-3a1 1 0 0 0-1.42 0l-3 3a1 1 0 0 0 1.42 1.42L18 4.41V10a1 1 0 1 0 2 0V4.41l1.29 1.3a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42z"/>
              </svg>
              <span class="upload-text">Click to browse or drag & drop images</span>
              <span class="upload-hint">PNG, JPG up to 5MB (max 5 files)</span>
            </label>
            <div class="file-preview-container" id="filePreview"></div>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Status</label>
          <div class="radio-group">
            <label class="radio-option">
              <input type="radio" name="carStatus" id="carStatus" value="available" checked />
              <span class="radio-checkmark"></span>
              <span class="radio-label">Available</span>
            </label>
            <label class="radio-option">
              <input type="radio" name="carStatus" value="sold" />
              <span class="radio-checkmark"></span>
              <span class="radio-label">Sold</span>
            </label>
            <label class="radio-option">
              <input type="radio" name="carStatus" value="reserved" />
              <span class="radio-checkmark"></span>
              <span class="radio-label">Reserved</span>
            </label>
          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button class="btn btn-outline" id="cancelAddCar">Cancel</button>
      <button class="btn btn-primary" id="saveCarBtn">
        <span class="btn-spinner hidden"></span>
        <span class="btn-text">Save Car</span>
      </button>
    </div>
  </div>
</div>
<!-- Order Details Modal -->
<div class="modal" id="orderDetailsModal">
  <div class="modal-content">
    <div class="modal-header">
      <h3 class="modal-title">Order Details</h3>
      <button class="modal-close" aria-label="Close modal">&times;</button>
    </div>
    <div class="modal-body" id="orderDetailsContent">
      <div class="detail-card">
        <div class="detail-header">
          <h4 class="detail-title">Order Information</h4>
          <span class="detail-badge status-completed">Completed</span>
        </div>
        <div class="detail-grid">
          <div class="detail-item">
            <span class="detail-label">Order ID:</span>
            <span class="detail-value">#ORD-2023-0567</span>
          </div>
          <div class="detail-item">
            <span class="detail-label">Date:</span>
            <span class="detail-value">May 15, 2023 - 10:45 AM</span>
          </div>
          <div class="detail-item">
            <span class="detail-label">Customer:</span>
            <span class="detail-value">John D. Smith</span>
          </div>
          <div class="detail-item">
            <span class="detail-label">Payment Method:</span>
            <span class="detail-value">Credit Card (VISA ****4242)</span>
          </div>
        </div>
      </div>

      <div class="detail-card">
        <h4 class="detail-title">Items Ordered</h4>
        <div class="order-items">
          <div class="order-item">
            <div class="item-image" style="background-image: url('https://example.com/car1.jpg')"></div>
            <div class="item-info">
              <h5 class="item-name">2022 Toyota Camry XLE</h5>
              <div class="item-meta">VIN: JT2BF22K3W0123456</div>
            </div>
            <div class="item-price">₦8,500,000</div>
          </div>
        </div>
      </div>

      <div class="detail-card">
        <h4 class="detail-title">Order Summary</h4>
        <div class="summary-grid">
          <div class="summary-item">
            <span class="summary-label">Subtotal:</span>
            <span class="summary-value">₦8,500,000</span>
          </div>
          <div class="summary-item">
            <span class="summary-label">Delivery Fee:</span>
            <span class="summary-value">₦25,000</span>
          </div>
          <div class="summary-item">
            <span class="summary-label">Tax:</span>
            <span class="summary-value">₦680,000</span>
          </div>
          <div class="summary-item total">
            <span class="summary-label">Total:</span>
            <span class="summary-value">₦9,205,000</span>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-outline" id="closeOrderDetails">Close</button>
      <button class="btn btn-primary" id="printOrderBtn">
        <svg class="btn-icon" viewBox="0 0 24 24" aria-hidden="true">
          <path d="M19 8H5c-1.66 0-3 1.34-3 3v6h4v4h12v-4h4v-6c0-1.66-1.34-3-3-3zm-3 11H8v-5h8v5zm3-7c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm-1-9H6v4h12V3z"/>
        </svg>
        Print Receipt
      </button>
    </div>
  </div>
</div>

<!-- User Details Modal -->
<div class="modal" id="userDetailsModal">
  <div class="modal-content">
    <div class="modal-header">
      <h3 class="modal-title">User Details</h3>
      <button class="modal-close" aria-label="Close modal">&times;</button>
    </div>
    <div class="modal-body" id="userDetailsContent">
      <div class="user-profile">
        <div class="user-avatar">
          <div class="avatar-image" style="background-image: url('https://example.com/avatar.jpg')"></div>
          <div class="avatar-status active"></div>
        </div>
        <div class="user-info">
          <h4 class="user-name">Michael Johnson</h4>
          <div class="user-role">Administrator</div>
        </div>
      </div>

      <div class="detail-grid">
        <div class="detail-item">
          <span class="detail-label">Email:</span>
          <span class="detail-value">michael.johnson@example.com</span>
        </div>
        <div class="detail-item">
          <span class="detail-label">Phone:</span>
          <span class="detail-value">+234 812 345 6789</span>
        </div>
        <div class="detail-item">
          <span class="detail-label">Joined:</span>
          <span class="detail-value">January 15, 2022</span>
        </div>
        <div class="detail-item">
          <span class="detail-label">Last Active:</span>
          <span class="detail-value">2 hours ago</span>
        </div>
      </div>

      <div class="user-stats">
        <div class="stat-card">
          <div class="stat-value">24</div>
          <div class="stat-label">Orders</div>
        </div>
        <div class="stat-card">
          <div class="stat-value">₦18.7M</div>
          <div class="stat-label">Total Spent</div>
        </div>
        <div class="stat-card">
          <div class="stat-value">4.8</div>
          <div class="stat-label">Avg. Rating</div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-outline" id="closeUserDetails">Close</button>
      <button class="btn btn-danger" id="disableUserBtn">
        <svg class="btn-icon" viewBox="0 0 24 24" aria-hidden="true">
          <path d="M13 3h-2v10h2V3zm4.83 2.17l-1.42 1.42C17.99 7.86 19 9.81 19 12c0 3.87-3.13 7-7 7s-7-3.13-7-7c0-2.19 1.01-4.14 2.58-5.42L6.17 5.17C4.23 6.82 3 9.26 3 12c0 4.97 4.03 9 9 9s9-4.03 9-9c0-2.74-1.23-5.18-3.17-6.83z"/>
        </svg>
        Disable User
      </button>
    </div>
  </div>
</div>

<!-- Confirmation Modal -->
<div class="modal" id="confirmModal">
  <div class="modal-content" style="max-width: 500px;">
    <div class="modal-header">
      <h3 class="modal-title" id="confirmModalTitle">Confirm Action</h3>
      <button class="modal-close" aria-label="Close modal">&times;</button>
    </div>
    <div class="modal-body" id="confirmModalContent">
      <div class="confirm-icon">
        <svg viewBox="0 0 24 24">
          <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
        </svg>
      </div>
      <p class="confirm-message">Are you sure you want to disable this user account? The user will no longer be able to access the system.</p>
      <div class="confirm-details">
        <strong>User:</strong> Michael Johnson<br>
        <strong>Email:</strong> michael.johnson@example.com
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-outline" id="cancelConfirm">Cancel</button>
      <button class="btn btn-danger" id="confirmAction">
        <span class="btn-spinner hidden"></span>
        <span class="btn-text">Confirm</span>
      </button>
    </div>
  </div>
</div>
