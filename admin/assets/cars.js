(function () {
  // Global variables
  let currentCarId = null;
  const addCarModal = document.getElementById("addCarModal");
  const confirmModal = document.getElementById("confirmModal");

  // Initialize cars page
  function initCarsPage() {
    loadCars();
    setupModalHandlers();
    setupSaveHandler();
    setupTabHandlers();
    setupFileUploadPreview();
  }

  // Setup modal event handlers
  function setupModalHandlers() {
    const modal = document.getElementById("addCarModal");
    const modalContent = document.querySelector(".modal-content");

    // Open modal
    document.getElementById("addCarBtn")?.addEventListener("click", () => {
      resetModal();
      openModal();
    });

    // Close modal function
    const closeModal = () => {
      modal.classList.remove("active");
      document.body.style.overflow = "";
      modal.setAttribute("aria-hidden", "true");
      resetModal();
    };

    // Close with button
    document
      .querySelector(".modal-close")
      ?.addEventListener("click", closeModal);
    document
      .getElementById("cancelAddCar")
      ?.addEventListener("click", closeModal);

    // Close when clicking outside
    modal?.addEventListener("click", (e) => {
      if (e.target === modal) closeModal();
    });

    // Close with Escape key
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape" && modal.classList.contains("active")) {
        closeModal();
      }
    });

    // Trap focus inside modal when open
    modal.addEventListener("keydown", (e) => {
      if (e.key !== "Tab" || !modal.classList.contains("active")) return;

      const focusable = modalContent.querySelectorAll(
        'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
      );
      if (focusable.length === 0) return;

      const first = focusable[0];
      const last = focusable[focusable.length - 1];

      if (e.shiftKey) {
        if (document.activeElement === first) {
          last.focus();
          e.preventDefault();
        }
      } else {
        if (document.activeElement === last) {
          first.focus();
          e.preventDefault();
        }
      }
    });
  }

  function openModal() {
    const modal = document.getElementById("addCarModal");
    modal.classList.add("active");
    document.body.style.overflow = "hidden";
    modal.setAttribute("aria-hidden", "false");

    // Focus first input when modal opens
    setTimeout(() => {
      const firstInput = document.querySelector(".modal-content input");
      if (firstInput) firstInput.focus();
    }, 100);
  }

  // Setup file upload preview
  function setupFileUploadPreview() {
    const fileInput = document.getElementById("carImages");
    const previewContainer = document.getElementById("filePreview");

    if (fileInput && previewContainer) {
      fileInput.addEventListener("change", function (e) {
        previewContainer.innerHTML = "";
        const files = e.target.files;

        if (files.length > 5) {
          showNotification(
            "Warning",
            "Maximum 5 files allowed. Only the first 5 will be processed.",
            "warning"
          );
        }

        const filesToShow = Array.from(files).slice(0, 5);

        filesToShow.forEach((file) => {
          if (!file.type.match("image.*")) {
            showNotification(
              "Error",
              `${file.name} is not an image file`,
              "error"
            );
            return;
          }

          const reader = new FileReader();
          reader.onload = function (e) {
            const preview = document.createElement("div");
            preview.className = "file-preview-item";
            preview.innerHTML = `
              <img src="${e.target.result}" alt="${file.name}" />
              <span class="file-name">${file.name}</span>
              <span class="file-size">${formatFileSize(file.size)}</span>
            `;
            previewContainer.appendChild(preview);
          };
          reader.readAsDataURL(file);
        });
      });
    }
  }

  function formatFileSize(bytes) {
    if (bytes === 0) return "0 Bytes";
    const k = 1024;
    const sizes = ["Bytes", "KB", "MB", "GB"];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2) + " " + sizes[i]);
  }

  // Setup save car handler
  function setupSaveHandler() {
    document.getElementById("saveCarBtn")?.addEventListener("click", saveCar);
  }

  // Setup tab handlers
  function setupTabHandlers() {
    const carsTabs = document.querySelectorAll(".tab");
    carsTabs?.forEach((tab) => {
      tab.addEventListener("click", () => {
        const tabId = tab.getAttribute("data-tab");
        carsTabs.forEach((t) => t.classList.remove("active"));
        tab.classList.add("active");
        loadCars(tabId);
      });
    });
  }

  // Load cars from server
  async function loadCars(filter = "all") {
    try {
      showLoadingState(true);
      const status = filter === "all" ? "" : filter;
      const response = await fetch(
        `./cars_api.php?action=get_cars&status=${status}`
      );

      if (!response.ok) throw new Error("Network response was not ok");

      const result = await response.json();

      if (result.success) {
        if (result.data && result.data.length > 0) {
          populateCarsTable(result.data);
          updateCarStats(result.data);
        } else {
          showEmptyState();
          resetStats();
        }
      } else {
        showNotification(
          "Error",
          result.message || "Failed to load cars",
          "error"
        );
        showEmptyState();
        resetStats();
      }
    } catch (error) {
      showNotification("Error", "Failed to connect to server", "error");
      console.error("Error loading cars:", error);
      showEmptyState();
      resetStats();
    } finally {
      showLoadingState(false);
    }
  }

  function showLoadingState(show) {
    const tbody = document.querySelector("#carsTable tbody");
    const loadingRow = document.getElementById("loadingRow");

    if (show) {
      if (loadingRow) return;

      const row = document.createElement("tr");
      row.id = "loadingRow";
      row.innerHTML = `
        <td colspan="6" class="loading-state">
          <div class="loading-spinner"></div>
          <span>Loading cars...</span>
        </td>
      `;
      if (tbody) tbody.appendChild(row);
    } else {
      if (loadingRow) loadingRow.remove();
    }
  }

  // Update car statistics
  function updateCarStats(carsData = []) {
    document.getElementById("totalCarsCount").textContent = carsData.length;
    document.getElementById("availableCarsCount").textContent = carsData.filter(
      (c) => c.status === "available"
    ).length;
    document.getElementById("soldCarsCount").textContent = carsData.filter(
      (c) => c.status === "sold"
    ).length;

    // Fixed reduce with initial value
    const totalValue = carsData.reduce(
      (sum, car) => sum + (parseFloat(car.price) || 0),
      0
    );
    document.getElementById(
      "inventoryValue"
    ).textContent = `₦${totalValue.toLocaleString()}`;
  }

  // Populate cars table
  function populateCarsTable(cars = []) {
    const tbody = document.querySelector("#carsTable tbody");
    if (!tbody) return;

    tbody.innerHTML = cars
      .map(
        (car) => `
      <tr>
        <td>
          ${
            car.image_url
              ? `<img src="${car.image_url}" alt="${car.make} ${car.model}" class="car-thumbnail" />`
              : '<div class="no-image"><i class="fas fa-car"></i></div>'
          }
        </td>
        <td>
          <div class="car-make-model">${car.make} ${car.model}</div>
          ${car.type ? `<div class="car-type">${car.type}</div>` : ""}
        </td>
        <td>${car.year}</td>
        <td>₦${parseFloat(car.price).toLocaleString()}</td>
        <td><span class="status ${car.status}">${capitalizeFirstLetter(
          car.status
        )}</span></td>
        <td>
          <div class="table-actions">
            <button class="btn btn-outline edit-car-btn" data-id="${
              car.id
            }" aria-label="Edit ${car.make} ${car.model}">
              <i class="fas fa-edit" aria-hidden="true"></i>
            </button>
            <button class="btn btn-outline delete-car-btn" data-id="${
              car.id
            }" aria-label="Delete ${car.make} ${car.model}">
              <i class="fas fa-trash" aria-hidden="true"></i>
            </button>
            ${
              car.status === "available"
                ? `
            <button class="btn btn-outline sell-car-btn" data-id="${car.id}" aria-label="Mark ${car.make} ${car.model} as sold">
              <i class="fas fa-tag" aria-hidden="true"></i>
            </button>`
                : ""
            }
          </div>
        </td>
      </tr>
    `
      )
      .join("");

    // Add event listeners to action buttons
    document.querySelectorAll(".edit-car-btn").forEach((btn) => {
      btn.addEventListener("click", (e) => {
        const carId = parseInt(e.currentTarget.getAttribute("data-id"));
        editCar(carId);
      });
    });

    document.querySelectorAll(".delete-car-btn").forEach((btn) => {
      btn.addEventListener("click", (e) => {
        const carId = parseInt(e.currentTarget.getAttribute("data-id"));
        showConfirmModal(
          "Delete Car",
          "Are you sure you want to delete this car? This action cannot be undone.",
          () => deleteCar(carId)
        );
      });
    });

    document.querySelectorAll(".sell-car-btn").forEach((btn) => {
      btn.addEventListener("click", (e) => {
        const carId = parseInt(e.currentTarget.getAttribute("data-id"));
        showConfirmModal(
          "Mark as Sold",
          "Are you sure you want to mark this car as sold?",
          () => markCarAsSold(carId)
        );
      });
    });
  }

  function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
  }

  // Edit car
  async function editCar(carId) {
    try {
      showLoadingState(true);
      const response = await fetch(`./cars_api.php?action=get_car&id=${carId}`);

      if (!response.ok) throw new Error("Network response was not ok");

      const result = await response.json();

      if (result.success) {
        currentCarId = carId;
        populateCarForm(result.data);
        openModal();
      } else {
        showNotification(
          "Error",
          result.message || "Failed to load car details",
          "error"
        );
      }
    } catch (error) {
      showNotification("Error", "Failed to connect to server", "error");
      console.error("Error loading car:", error);
    } finally {
      showLoadingState(false);
    }
  }

  // Populate car form with data
  function populateCarForm(car) {
    const form = document.getElementById("carForm");
    if (!form) return;

    form.reset();

    document.getElementById("carMake").value = car.make || "";
    document.getElementById("carModel").value = car.model || "";
    document.getElementById("carYear").value = car.year || "";
    document.getElementById("carCost").value = car.cost || "";
    document.getElementById("carPrice").value = car.price || "";
    document.getElementById("carMileage").value = car.mileage || "";
    document.getElementById("carTransmission").value = car.transmission || "";
    document.getElementById("carMPG").value = car.mpg || "";
    document.getElementById("carHorsepower").value = car.horsepower || "";
    document.getElementById("carType").value = car.type || "";
    document.getElementById("carColor").value = car.color || "";
    document.getElementById("carDescription").value = car.description || "";
    document.getElementById("carImage").value = car.image_url || "";

    // Set status radio
    const statusRadio = document.querySelector(
      `input[name="carStatus"][value="${car.status}"]`
    );
    if (statusRadio) statusRadio.checked = true;

    // Show current image if exists
    const filePreview = document.getElementById("filePreview");
    if (filePreview && car.image_url) {
      filePreview.innerHTML = `
        <div class="file-preview-item">
          <img src="${car.image_url}" alt="Current car image" />
          <span class="file-name">Current Image</span>
        </div>
      `;
    }
  }

  // Save car (add or update)
  async function saveCar(e) {
    e.preventDefault();

    const form = document.getElementById("carForm");
    const saveBtn = document.getElementById("saveCarBtn");
    const btnText = saveBtn.querySelector(".btn-text");
    const btnSpinner = saveBtn.querySelector(".btn-spinner");

    // Validate form first
    if (!validateForm()) return;

    // Show loading state
    btnText.classList.add("hidden");
    btnSpinner.classList.remove("hidden");
    saveBtn.disabled = true;

    try {
      const formData = new FormData();

      // Map form fields to expected PHP names
      formData.append("make", document.getElementById("carMake").value);
      formData.append("model", document.getElementById("carModel").value);
      formData.append("year", document.getElementById("carYear").value);
      formData.append("price", document.getElementById("carPrice").value);
      formData.append("cost", document.getElementById("carCost").value);
      formData.append("mileage", document.getElementById("carMileage").value);
      formData.append(
        "transmission",
        document.getElementById("carTransmission").value
      );
      formData.append("mpg", document.getElementById("carMPG").value);
      formData.append(
        "horsepower",
        document.getElementById("carHorsepower").value
      );
      formData.append("type", document.getElementById("carType").value);
      formData.append("color", document.getElementById("carColor").value);
      formData.append(
        "description",
        document.getElementById("carDescription").value
      );
     const selectedStatus = document.querySelector('input[name="carStatus"]:checked').value;
      formData.append("status", selectedStatus);
      if (currentCarId) formData.append("id", currentCarId);

      // Handle file uploads
      const fileInput = document.getElementById("carImages");
      if (fileInput.files.length > 0) {
        // For now, just take the first file to match your PHP backend
        formData.append("image", fileInput.files[0]);
      }
      const response = await fetch("./cars_api.php?action=save_car", {
        method: "POST",
        body: formData,
      });

      if (!response.ok) throw new Error("Network response was not ok");

      const result = await response.json();

      if (result.success) {
        showNotification(
          "Success",
          currentCarId ? "Car updated successfully" : "Car added successfully",
          "success"
        );
        loadCars(
          document.querySelector(".tab.active")?.getAttribute("data-tab") ||
            "all"
        );
        closeModal();
      } else {
        showNotification(
          "Error",
          result.message || "Failed to save car",
          "error"
        );
      }
    } catch (error) {
      showNotification("Error", "Failed to connect to server", "error");
      console.error("Error saving car:", error);
    } finally {
      btnText.classList.remove("hidden");
      btnSpinner.classList.add("hidden");
      saveBtn.disabled = false;
    }
  }

  // Form validation
  function validateForm() {
    let isValid = true;
    const requiredFields = [
      { id: "carMake", name: "Make" },
      { id: "carModel", name: "Model" },
      { id: "carYear", name: "Year" },
      { id: "carPrice", name: "Price" },
    ];

    // Clear previous errors
    document.querySelectorAll(".form-group").forEach((group) => {
      group.classList.remove("has-error", "has-success");
      const errorMsg = group.querySelector(".error-message");
      if (errorMsg) errorMsg.remove();
    });

    // Validate each required field
    requiredFields.forEach((field) => {
      const input = document.getElementById(field.id);
      const group = input?.closest(".form-group");
      if (!group) return;

      if (!input?.value.trim()) {
        group.classList.add("has-error");
        const errorMsg = document.createElement("div");
        errorMsg.className = "error-message";
        errorMsg.textContent = `${field.name} is required`;
        group.appendChild(errorMsg);
        isValid = false;
      } else {
        group.classList.add("has-success");
      }
    });

    // Additional validation for year
    const yearInput = document.getElementById("carYear");
    if (yearInput && yearInput.value) {
      const year = parseInt(yearInput.value);
      const currentYear = new Date().getFullYear();
      const group = yearInput.closest(".form-group");

      if (year < 1900 || year > currentYear + 1) {
        group.classList.add("has-error");
        const errorMsg = document.createElement("div");
        errorMsg.className = "error-message";
        errorMsg.textContent = `Please enter a valid year (1900-${
          currentYear + 1
        })`;
        group.appendChild(errorMsg);
        isValid = false;
      }
    }

    // Validate price is greater than cost
    const priceInput = document.getElementById("carPrice");
    const costInput = document.getElementById("carCost");
    if (priceInput && costInput && priceInput.value && costInput.value) {
      const price = parseFloat(priceInput.value);
      const cost = parseFloat(costInput.value);
      const group = priceInput.closest(".form-group");

      if (price < cost) {
        group.classList.add("has-error");
        const errorMsg = document.createElement("div");
        errorMsg.className = "error-message";
        errorMsg.textContent = "Price must be greater than cost";
        group.appendChild(errorMsg);
        isValid = false;
      }
    }

    return isValid;
  }

  // Mark car as sold
  async function markCarAsSold(carId) {
    try {
      showLoadingState(true);
      const response = await fetch(
        `./cars_api.php?action=mark_sold&id=${carId}`
      );

      if (!response.ok) throw new Error("Network response was not ok");

      const result = await response.json();

      if (result.success) {
        showNotification(
          "Success",
          "Car marked as sold successfully",
          "success"
        );
        loadCars(
          document.querySelector(".tab.active")?.getAttribute("data-tab") ||
            "all"
        );
      } else {
        showNotification(
          "Error",
          result.message || "Failed to mark car as sold",
          "error"
        );
      }
    } catch (error) {
      showNotification("Error", "Failed to connect to server", "error");
      console.error("Error marking car as sold:", error);
    } finally {
      showLoadingState(false);
    }
  }

  // Delete car
  async function deleteCar(carId) {
    try {
      showLoadingState(true);
      const response = await fetch(
        `./cars_api.php?action=delete_car&id=${carId}`
      );

      if (!response.ok) throw new Error("Network response was not ok");

      const result = await response.json();

      if (result.success) {
        showNotification("Success", "Car deleted successfully", "success");
        loadCars(
          document.querySelector(".tab.active")?.getAttribute("data-tab") ||
            "all"
        );
      } else {
        showNotification(
          "Error",
          result.message || "Failed to delete car",
          "error"
        );
      }
    } catch (error) {
      showNotification("Error", "Failed to connect to server", "error");
      console.error("Error deleting car:", error);
    } finally {
      showLoadingState(false);
      confirmModal?.classList.remove("active");
    }
  }

 function showConfirmModal(title, message, confirmCallback) {
  const modal = document.getElementById("confirmModal");
  if (!modal) return;

  // Set modal content
  modal.querySelector(".modal-title").textContent = title;
  modal.querySelector(".confirm-message").textContent = message;

  // Clear previous event listeners (better approach)
  const confirmBtn = modal.querySelector("#confirmAction");
  const closeBtn = modal.querySelector(".modal-close");
  const cancelBtn = modal.querySelector("#cancelConfirm");

  // Remove all existing listeners
  const newConfirmBtn = confirmBtn.cloneNode(true);
  confirmBtn.replaceWith(newConfirmBtn);

  // Add new listeners
  newConfirmBtn.addEventListener("click", () => {
    confirmCallback();
    modal.classList.remove("active");
  });

  closeBtn.addEventListener("click", () => {
    modal.classList.remove("active");
  });

  cancelBtn.addEventListener("click", () => {
    modal.classList.remove("active");
  });

  // Show modal
  modal.classList.add("active");
}
  // Reset form when modal closes
  function resetModal() {
    currentCarId = null;
    const form = document.getElementById("carForm");
    if (form) form.reset();

    // Reset all validation states
    document.querySelectorAll(".form-group").forEach((group) => {
      group.classList.remove("has-error", "has-success");
      const errorMsg = group.querySelector(".error-message");
      if (errorMsg) errorMsg.remove();
    });

    // Clear file preview
    const filePreview = document.getElementById("filePreview");
    if (filePreview) filePreview.innerHTML = "";

    // Reset file input
    const fileInput = document.getElementById("carImages");
    if (fileInput) fileInput.value = "";

    // Reset status radio to default
    const defaultRadio = document.querySelector(
      'input[name="carStatus"][value="available"]'
    );
    if (defaultRadio) defaultRadio.checked = true;
  }

  function closeModal() {
    const modal = document.getElementById("addCarModal");
    if (modal) {
      modal.classList.remove("active");
      document.body.style.overflow = "";
      modal.setAttribute("aria-hidden", "true");
    }
    resetModal();
  }

  function showEmptyState() {
    const tbody = document.querySelector("#carsTable tbody");
    if (tbody) {
      tbody.innerHTML = `
        <tr class="empty-state">
          <td colspan="6">
            <div class="empty-content">
              <i class="fas fa-car" aria-hidden="true"></i>
              <h3>No Cars Found</h3>
              <p>Add your first car to get started</p>
              <button class="btn btn-primary" id="addFirstCarBtn">
                <i class="fas fa-plus" aria-hidden="true"></i> Add Car
              </button>
            </div>
          </td>
        </tr>
      `;

      document
        .getElementById("addFirstCarBtn")
        ?.addEventListener("click", () => {
          document.getElementById("addCarBtn").click();
        });
    }
  }

  function resetStats() {
    document.getElementById("totalCarsCount").textContent = "0";
    document.getElementById("availableCarsCount").textContent = "0";
    document.getElementById("soldCarsCount").textContent = "0";
    document.getElementById("inventoryValue").textContent = "₦0";
  }

  function showNotification(title, message, type = "info") {
    const notification = document.createElement("div");
    notification.className = `notification notification-${type}`;
    notification.setAttribute("role", "alert");
    notification.setAttribute("aria-live", "assertive");

    notification.innerHTML = `
      <div class="notification-title">${title}</div>
      <div class="notification-message">${message}</div>
      <button class="notification-close" aria-label="Close notification">&times;</button>
    `;

    document.body.appendChild(notification);

    // Auto-remove after 5 seconds
    const autoRemove = setTimeout(() => {
      notification.classList.add("fade-out");
      setTimeout(() => notification.remove(), 300);
    }, 5000);

    // Manual close
    notification
      .querySelector(".notification-close")
      .addEventListener("click", () => {
        clearTimeout(autoRemove);
        notification.remove();
      });
  }

  // Initialize when cars page loads
  if (document.getElementById("cars")) {
    document.addEventListener("DOMContentLoaded", initCarsPage);
  }
})();
