<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Pontus Henriksson" />
    <meta name="publisher" content="Pontus Henriksson" />
    <meta name="copyright" content="Pontus Henriksson" />
    <meta name="owner" content="Pontus Henriksson" />
    <meta
      name="description"
      content="VernFM dashboard is an intuitive and user-friendly platform designed to monitor and manage your VernFM radio stations with ease."
    />
    <title>VernFM dashboard | Dashboard</title>
    <link rel="stylesheet" href="./style.css" />
    <script
      src="https://kit.fontawesome.com/7799275d96.js"
      crossorigin="anonymous"
    ></script>
    <link
      rel="icon"
      type="image/svg+xml"
      href="../private/media/general/images/favicon_light.svg"
      media="(prefers-color-scheme: light)"
    />
    <link
      rel="icon"
      type="image/svg+xml"
      href="../private/media/general/images/dark.svg"
      media="(prefers-color-scheme: dark)"
    />
  </head>
  <body>
    <div class="container">
      <header>
        <div class="notification" id="notificationIcon">
          <i class="fa-solid fa-bell notification-icon"></i>
        </div>
        <img
          class="header-logo"
          src="../private/media/general/images/logo_light.svg"
          alt="VernFM logo"
          id="logo"
        />
        <div class="profile">
          <img
            src="../private/media/general/images/profile.gif"
            alt="Profile Image"
            class="profile-image"
            id="profile-image"
          />
        </div>
      </header>
      <h2>Dashboard</h2>
      <section class="statistics">
        <div class="statistic-card statistic-card1">
          <div class="section-card-title">Website traffic</div>
          3.8k
        </div>
        <div class="statistic-card statistic-card2">
          <div class="section-card-title">Likes</div>
          1.9k
        </div>
        <div class="statistic-card statistic-card3">
          <div class="section-card-title">Leaderboard rank</div>
          #31
        </div>
        <div class="statistic-card statistic-card4">
          <div class="section-card-title">Top leaderboard rank</div>
          #24
        </div>
        <div class="statistic-card statistic-card5">
          <div class="section-card-title">???</div>
          ???
        </div>
        <div class="statistic-card statistic-card6">
          <div class="section-card-title">???</div>
          ???
        </div>
      </section>
      <nav class="navbar-bottom">
        <a href="#" class="nav-page">
          <i class="fa-solid fa-house nav-icon"></i>
          <span class="nav-text">Home</span>
        </a>
        <a href="#" class="nav-page">
          <i class="fa-solid fa-square-poll-vertical nav-icon"></i>
          <span class="nav-text">Statistics</span>
        </a>
        <a href="#" class="nav-page">
          <i class="fa-solid fa-user nav-icon"></i>
          <span class="nav-text">Profile</span>
        </a>
        <a href="#" class="nav-page">
          <i class="fa-solid fa-headphones nav-icon"></i>
          <span class="nav-text">Music</span>
        </a>
      </nav>
    </div>

    <div class="navOverlay" id="navOverlay">
       <span class="overlayTitle">Menu</span>
      <i class="fa-solid fa-xmark" id="navOverlayCloseButton"></i>
      <ul>
        <li><a href="#">Manage Account</a></li>
        <li><a href="#">Settings</a></li>
        <li><a href="#">Help & Feedback</a></li>
        <li><a href="#">Log out</a></li>
        <button id="theme-toggle">Toggle Theme</button>
      </ul>
    </div>

    <!-- This isn't complete -->
<div class="notificationOverlay" id="notificationOverlay">
  <span class="overlayTitle">Notifications</span>
  <i class="fa-solid fa-xmark" id="notificationOverlayCloseButton"></i>
      <ul>
        <li>
          <div class="message-container" id="message">
            <div class="message-profile">
              <img
                src="../private/media/general/images/profile.gif"
                alt="Profile Image"
                class="message-profile-image"
              />
            </div>
            <div>
              <div class="top-message">
                <div class="message-title">VernFM (1)</div>
                <span class="message-date">8m ago</span>
              </div>
              <div class="message-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas
                nesciunt expedita, ratione libero impedit dolorum quo culpa
                dolor maxime nisi itaque blanditiis aliquam id deserunt ullam?
                Nihil rem reprehenderit tempore?
              </div>
            </div>
          </div>

          <div class="message-container" id="message">
            <div class="message-profile">
              <img
                src="../private/media/general/images/profile.gif"
                alt="Profile Image"
                class="message-profile-image"
              />
            </div>
            <div>
              <div class="top-message">
                <div class="message-title">VernFM (1)</div>
                <span class="message-date">8m ago</span>
              </div>
              <div class="message-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas
                nesciunt expedita, ratione libero impedit dolorum quo culpa
                dolor maxime nisi itaque blanditiis aliquam id deserunt ullam?
                Nihil rem reprehenderit tempore?
              </div>
            </div>
          </div>

          <div class="message-container" id="message">
            <div class="message-profile">
              <img
                src="../private/media/general/images/profile.gif"
                alt="Profile Image"
                class="message-profile-image"
              />
            </div>
            <div>
              <div class="top-message">
                <div class="message-title">VernFM (1)</div>
                <span class="message-date">8m ago</span>
              </div>
              <div class="message-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas
                nesciunt expedita, ratione libero impedit dolorum quo culpa
                dolor maxime nisi itaque blanditiis aliquam id deserunt ullam?
                Nihil rem reprehenderit tempore?
              </div>
            </div>
          </div>

          <div class="message-container" id="message">
            <div class="message-profile">
              <img
                src="../private/media/general/images/profile.gif"
                alt="Profile Image"
                class="message-profile-image"
              />
            </div>
            <div>
              <div class="top-message">
                <div class="message-title">VernFM (1)</div>
                <span class="message-date">8m ago</span>
              </div>
              <div class="message-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas
                nesciunt expedita, ratione libero impedit dolorum quo culpa
                dolor maxime nisi itaque blanditiis aliquam id deserunt ullam?
                Nihil rem reprehenderit tempore?
              </div>
            </div>
          </div>

          <div class="message-container" id="message">
            <div class="message-profile">
              <img
                src="../private/media/general/images/profile.gif"
                alt="Profile Image"
                class="message-profile-image"
              />
            </div>
            <div>
              <div class="top-message">
                <div class="message-title">VernFM (1)</div>
                <span class="message-date">8m ago</span>
              </div>
              <div class="message-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas
                nesciunt expedita, ratione libero impedit dolorum quo culpa
                dolor maxime nisi itaque blanditiis aliquam id deserunt ullam?
                Nihil rem reprehenderit tempore?
              </div>
            </div>
          </div>

          <div class="message-container" id="message">
            <div class="message-profile">
              <img
                src="../private/media/general/images/profile.gif"
                alt="Profile Image"
                class="message-profile-image"
              />
            </div>
            <div>
              <div class="top-message">
                <div class="message-title">VernFM (1)</div>
                <span class="message-date">8m ago</span>
              </div>
              <div class="message-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas
                nesciunt expedita, ratione libero impedit dolorum quo culpa
                dolor maxime nisi itaque blanditiis aliquam id deserunt ullam?
                Nihil rem reprehenderit tempore?
              </div>
            </div>
          </div>

          <div class="message-container" id="message">
            <div class="message-profile">
              <img
                src="../private/media/general/images/profile.gif"
                alt="Profile Image"
                class="message-profile-image"
              />
            </div>
            <div>
              <div class="top-message">
                <div class="message-title">VernFM (1)</div>
                <span class="message-date">8m ago</span>
              </div>
              <div class="message-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas
                nesciunt expedita, ratione libero impedit dolorum quo culpa
                dolor maxime nisi itaque blanditiis aliquam id deserunt ullam?
                Nihil rem reprehenderit tempore?
              </div>
            </div>
          </div>

          <div class="message-container" id="message">
            <div class="message-profile">
              <img
                src="../private/media/general/images/profile.gif"
                alt="Profile Image"
                class="message-profile-image"
              />
            </div>
            <div>
              <div class="top-message">
                <div class="message-title">VernFM (1)</div>
                <span class="message-date">8m ago</span>
              </div>
              <div class="message-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas
                nesciunt expedita, ratione libero impedit dolorum quo culpa
                dolor maxime nisi itaque blanditiis aliquam id deserunt ullam?
                Nihil rem reprehenderit tempore?
              </div>
            </div>
          </div>

          <div class="message-container" id="message">
            <div class="message-profile">
              <img
                src="../private/media/general/images/profile.gif"
                alt="Profile Image"
                class="message-profile-image"
              />
            </div>
            <div>
              <div class="top-message">
                <div class="message-title">VernFM (1)</div>
                <span class="message-date">8m ago</span>
              </div>
              <div class="message-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas
                nesciunt expedita, ratione libero impedit dolorum quo culpa
                dolor maxime nisi itaque blanditiis aliquam id deserunt ullam?
                Nihil rem reprehenderit tempore?
              </div>
            </div>
          </div>

          <div class="message-container" id="message">
            <div class="message-profile">
              <img
                src="../private/media/general/images/profile.gif"
                alt="Profile Image"
                class="message-profile-image"
              />
            </div>
            <div>
              <div class="top-message">
                <div class="message-title">VernFM (1)</div>
                <span class="message-date">8m ago</span>
              </div>
              <div class="message-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas
                nesciunt expedita, ratione libero impedit dolorum quo culpa
                dolor maxime nisi itaque blanditiis aliquam id deserunt ullam?
                Nihil rem reprehenderit tempore?
              </div>
            </div>
          </div>

          <div class="message-container" id="message">
            <div class="message-profile">
              <img
                src="../private/media/general/images/profile.gif"
                alt="Profile Image"
                class="message-profile-image"
              />
            </div>
            <div>
              <div class="top-message">
                <div class="message-title">VernFM (1)</div>
                <span class="message-date">8m ago</span>
              </div>
              <div class="message-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas
                nesciunt expedita, ratione libero impedit dolorum quo culpa
                dolor maxime nisi itaque blanditiis aliquam id deserunt ullam?
                Nihil rem reprehenderit tempore?
              </div>
            </div>
          </div>

          <div class="message-container" id="message">
            <div class="message-profile">
              <img
                src="../private/media/general/images/profile.gif"
                alt="Profile Image"
                class="message-profile-image"
              />
            </div>
            <div>
              <div class="top-message">
                <div class="message-title">VernFM (1)</div>
                <span class="message-date">8m ago</span>
              </div>
              <div class="message-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas
                nesciunt expedita, ratione libero impedit dolorum quo culpa
                dolor maxime nisi itaque blanditiis aliquam id deserunt ullam?
                Nihil rem reprehenderit tempore?
              </div>
            </div>
          </div>

          <div class="message-container" id="message">
            <div class="message-profile">
              <img
                src="../private/media/general/images/profile.gif"
                alt="Profile Image"
                class="message-profile-image"
              />
            </div>
            <div>
              <div class="top-message">
                <div class="message-title">VernFM (1)</div>
                <span class="message-date">8m ago</span>
              </div>
              <div class="message-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas
                nesciunt expedita, ratione libero impedit dolorum quo culpa
                dolor maxime nisi itaque blanditiis aliquam id deserunt ullam?
                Nihil rem reprehenderit tempore?
              </div>
            </div>
          </div>
        </li>
        <button id="refresh-messages">Refresh messages</button>
      </ul>
    </div>
    <!-- This isn't complete -->

    <script src="../private/scripts/main.js"></script>
  </body>
</html>