const menuItems = document.querySelectorAll('.settings-menu li');
const panels = document.querySelectorAll('.settings-panel');

menuItems.forEach(item => {
  item.addEventListener('click', () => {
    // Remove active class from all menu items
    menuItems.forEach(i => i.classList.remove('active'));
    item.classList.add('active');

    // Show corresponding panel
    panels.forEach(panel => {
      panel.classList.remove('active');
      if (panel.id === item.dataset.section) {
        panel.classList.add('active');
      }
    });
  });
});

const profileInput = document.getElementById('profile-picture');
const profileImg = document.querySelector('.profile-img');

profileInput.addEventListener('change', function () {
  const file = this.files[0];
  if (file) {
    profileImg.src = URL.createObjectURL(file);
  }
});

// Change Password
const toggleIcons = document.querySelectorAll('.toggle-password');

toggleIcons.forEach(icon => {
  icon.addEventListener('click', () => {
    const input = icon.previousElementSibling;
    const isPassword = input.type === 'password';
    input.type = isPassword ? 'text' : 'password';
    icon.classList.toggle('fa-eye');
    icon.classList.toggle('fa-eye-slash');
  });
});

// Theme Settings
const primaryColorPicker = document.getElementById('primaryColor');
const themeForm = document.getElementById('themeForm');
const resetBtn = document.getElementById('resetTheme'); // tombol reset

function hexToRgb(hex) {
  const cleanedHex = hex.replace('#', '');
  const bigint = parseInt(cleanedHex, 16);
  const r = (bigint >> 16) & 255;
  const g = (bigint >> 8) & 255;
  const b = bigint & 255;
  return { r, g, b };
}

// Fungsi buat darken warna
function darkenColor(hex, percent = 20) {
  let num = parseInt(hex.replace("#", ""), 16);
  let r = (num >> 16) - percent;
  let g = ((num >> 8) & 0x00FF) - percent;
  let b = (num & 0x0000FF) - percent;

  r = Math.max(0, r);
  g = Math.max(0, g);
  b = Math.max(0, b);

  return "#" + (r << 16 | g << 8 | b).toString(16).padStart(6, '0');
}

function isColorBright(hex) {
  const { r, g, b } = hexToRgb(hex);
  return (r * 0.299 + g * 0.587 + b * 0.114) > 186; // Bright jika di atas threshold
}

// Apply saved theme on load
const savedColor = localStorage.getItem('primaryColor');
if (savedColor) {
  const hoverColor = darkenColor(savedColor, 20);
  const { r, g, b } = hexToRgb(savedColor);
  const tintColor = `rgba(${r}, ${g}, ${b}, 0.15)`;
  const paleColor = `rgba(${r}, ${g}, ${b}, 0.03)`;

  document.documentElement.style.setProperty('--primary-color', savedColor);
  document.documentElement.style.setProperty('--primary-hover-color', hoverColor);
  document.documentElement.style.setProperty('--primary-tint-color', tintColor);
  document.documentElement.style.setProperty('--primary-pale-color', paleColor);

  document.documentElement.style.setProperty('--primary-text-color', isColorBright(savedColor) ? '#000' : '#fff');
  primaryColorPicker.value = savedColor;
}

themeForm.addEventListener('submit', function (e) {
  e.preventDefault();
  const selectedColor = primaryColorPicker.value;
  const hoverColor = darkenColor(selectedColor, 20);
  const { r, g, b } = hexToRgb(selectedColor);
  const tintColor = `rgba(${r}, ${g}, ${b}, 0.15)`;
  const paleColor = `rgba(${r}, ${g}, ${b}, 0.03)`;
  
  document.documentElement.style.setProperty('--primary-color', selectedColor);
  document.documentElement.style.setProperty('--primary-hover-color', hoverColor);
  document.documentElement.style.setProperty('--primary-tint-color', tintColor);
  document.documentElement.style.setProperty('--primary-pale-color', paleColor);
  
  document.documentElement.style.setProperty('--primary-text-color', isColorBright(selectedColor) ? '#000' : '#fff');
  
  localStorage.setItem('primaryColor', selectedColor);
});

resetBtn.addEventListener('click', function () {
  const defaultColor = '#5a3ef9';
  const defaultHover = '#4733d3';
  const { r, g, b } = hexToRgb(defaultColor);
  const tintColor = `rgba(${r}, ${g}, ${b}, 0.15)`;
  const paleColor = `rgba(${r}, ${g}, ${b}, 0.03)`;

  document.documentElement.style.setProperty('--primary-color', defaultColor);
  document.documentElement.style.setProperty('--primary-hover-color', defaultHover);
  document.documentElement.style.setProperty('--primary-tint-color', tintColor);
  document.documentElement.style.setProperty('--primary-pale-color', paleColor);
  
  document.documentElement.style.setProperty('--primary-text-color', '#fff');

  primaryColorPicker.value = defaultColor;
  localStorage.removeItem('primaryColor');
});