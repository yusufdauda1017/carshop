// Initialize settings page
function initSettingsPage() {
  loadSettings();
  
  // Add event listeners specific to settings page
  const saveSettingsBtn = document.getElementById("saveSettingsBtn");
  if (saveSettingsBtn) {
    saveSettingsBtn.addEventListener("click", saveSettings);
  }
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

// Initialize when settings page loads
if (document.getElementById("settings")) {
  initSettingsPage();
}