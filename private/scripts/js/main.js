const getElement = id => document.getElementById(id);
const toggleDisplay = element =>
  (element.style.display = element.style.display === 'flex' ? 'none' : 'flex');
const togglePointerEvents = (element, state) =>
  (element.style.pointerEvents = state);
const toggleBodyScroll = lock =>
  (document.body.style.overflow = lock ? 'hidden' : '');

// Update the toggleLightMode function
const toggleLightMode = element => {
  element.classList.toggle('light-mode');
  if (element === document.body) {
    getElement('notificationOverlayCloseButton').classList.toggle('light-mode');
    document.querySelector('.overlayTitle').classList.toggle('light-mode');
  }
};

const themeToggle = getElement('theme-toggle');
const logo = getElement('header-logo');
const notificationIcon = getElement('notificationIcon');
const navOverlayLinks = document.querySelectorAll('.navOverlay a');
const navOverlayCloseButton = getElement('navOverlayCloseButton');
const notificationOverlay = getElement('notificationOverlay');
const notificationOverlayCloseButton = getElement(
  'notificationOverlayCloseButton'
);
const profileImage = getElement('profile-image');
const navOverlay = getElement('navOverlay');

// Toggle theme
themeToggle.addEventListener('click', () => {
  const elementsToToggle = [
    document.body,
    navOverlay,
    notificationOverlay,
    themeToggle,
    ...navOverlayLinks,
    ...document.querySelectorAll('.message-container'),
  ];

  elementsToToggle.forEach(toggleLightMode);
  logo.src = document.body.classList.contains('light-mode')
    ? '../../private/media/general/images/logo_dark.svg'
    : '../../private/media/general/images/logo_light.svg';
});

// Handle profile image click
profileImage.addEventListener('click', () => {
  toggleDisplay(navOverlay);
  togglePointerEvents(profileImage, 'none');
  toggleDisplay(navOverlayCloseButton);
  toggleBodyScroll(true);
});

// Handle navOverlay click
navOverlay.addEventListener('click', ({ target }) => {
  if (target === navOverlay) {
    toggleDisplay(navOverlay);
    toggleDisplay(navOverlayCloseButton);
    togglePointerEvents(profileImage, 'all');
    toggleBodyScroll(false);
  }
});

// Handle navOverlayCloseButton click
navOverlayCloseButton.addEventListener('click', () => {
  toggleDisplay(navOverlay);
  toggleDisplay(navOverlayCloseButton);
  togglePointerEvents(profileImage, 'all');
  toggleBodyScroll(false);
});

// Handle notificationIcon click
notificationIcon.addEventListener('click', () => {
  toggleDisplay(notificationOverlay);
  togglePointerEvents(notificationIcon, 'none');
  notificationOverlayCloseButton.style.display = 'block';
  toggleBodyScroll(true);
  notificationOverlay.style.overflowY = 'auto';
});

// Handle notificationOverlay click
notificationOverlay.addEventListener('click', ({ target }) => {
  if (target === notificationOverlay) {
    toggleDisplay(notificationOverlay);
    togglePointerEvents(notificationIcon, 'all');
    toggleBodyScroll(false);
  }
});

// Handle notificationOverlayCloseButton click
notificationOverlayCloseButton.addEventListener('click', () => {
  toggleDisplay(notificationOverlay);
  toggleDisplay(notificationOverlayCloseButton);
  togglePointerEvents(notificationIcon, 'all');
  toggleBodyScroll(false);
});

// Toggle expanded message on click
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.message-container').forEach(message => {
    message.addEventListener('click', () =>
      message.classList.toggle('expanded')
    );
  });
});

function saveUserLoginInfo(userId, profileImage) {
  localStorage.setItem('user_id', userId);
  localStorage.setItem('profile_image', profileImage);
}

function removeUserLoginInfo() {
  localStorage.removeItem('user_id');
  localStorage.removeItem('profile_image');
}
