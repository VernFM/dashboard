<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="../private/styles.css" />
    <script
      src="https://kit.fontawesome.com/7799275d96.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="container">
      <header>
        <div class="notification">
          <i class="fa-solid fa-bell notification-icon"></i>
        </div>
        <img class="header-logo" src="../private/logo.svg" alt="VernFM logo" id="logo" />
        <div class="profile">
          <img
            src="../private/profile.gif"
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
          <div class="section-card-title">???</div>
          ???
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

    <div class="overlay" id="overlay">
      <ul>
        <li><a href="#">Manage Account</a></li>
        <li><a href="#">Settings</a></li>
        <li><a href="#">Help & Feedback</a></li>
        <li><a href="#">Log out</a></li>
        <button id="theme-toggle">Toggle Theme</button>
      </ul>
    </div>
    <script src="../private/scripts.js"></script>
  </body>
</html>
