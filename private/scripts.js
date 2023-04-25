const themeToggle = document.getElementById('theme-toggle');
const logo = document.getElementById('logo');
const overlayLinks = document.querySelectorAll('.overlay a'); // Add this line to select all text links in the overlay

themeToggle.addEventListener('click', () => {
  document.body.classList.toggle('light-mode');
  overlay.classList.toggle('light-mode');
  themeToggle.classList.toggle('light-mode'); // Add this line to toggle light-mode on the theme toggle button

  overlayLinks.forEach(link => {
    // Add this block to toggle light-mode on each overlay text link
    link.classList.toggle('light-mode');
  });

  if (document.body.classList.contains('light-mode')) {
    logo.src = '../private/logo_darkmode.svg';
  } else {
    logo.src = '../private/logo.svg';
  }
});

const profileImage = document.getElementById('profile-image');
const overlay = document.getElementById('overlay');

profileImage.addEventListener('click', () => {
  overlay.style.display = 'flex';
});

overlay.addEventListener('click', event => {
  if (event.target === overlay) {
    overlay.style.display = 'none';
  }
});
