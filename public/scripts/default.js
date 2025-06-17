// Theme Initialization
(function () {
  const savedColor = localStorage.getItem('primaryColor');

  if (savedColor) {
    const root = document.documentElement;

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

    function hexToRgb(hex) {
      const cleanedHex = hex.replace('#', '');
      const bigint = parseInt(cleanedHex, 16);
      const r = (bigint >> 16) & 255;
      const g = (bigint >> 8) & 255;
      const b = bigint & 255;
      return { r, g, b };
    }

    // Fungsi untuk hitung brightness (0-255)
    function getBrightness({r, g, b}) {
      return (r * 299 + g * 587 + b * 114) / 1000;
    }

    // Fungsi untuk pilih warna teks: hitam atau putih berdasarkan brightness
    function getPrimaryTextColor(hex) {
      const rgb = hexToRgb(hex);
      const brightness = getBrightness(rgb);
      return brightness > 180 ? '#000000' : '#FFFFFF';  // Threshold 180 bisa disesuaikan
    }

    function getSecondaryTextColor(hex) {
        return hex == '#000000' ? '#FFFFFF' : '#000000';
    }

    const hoverColor = darkenColor(savedColor, 20);
    const { r, g, b } = hexToRgb(savedColor);
    const tintColor = `rgba(${r}, ${g}, ${b}, 0.15)`;
    const paleColor = `rgba(${r}, ${g}, ${b}, 0.03)`;
    const ptextColor = getPrimaryTextColor(savedColor);
    const stextColor = getSecondaryTextColor(ptextColor);

    root.style.setProperty('--primary-color', savedColor);
    root.style.setProperty('--primary-hover-color', hoverColor);
    root.style.setProperty('--primary-tint-color', tintColor);
    root.style.setProperty('--primary-pale-color', paleColor);
    root.style.setProperty('--primary-text-color', ptextColor);
    root.style.setProperty('--secondary-text-color', stextColor);
  }
})();
