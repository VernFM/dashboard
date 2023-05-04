<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>VernFM</title>
</head>
<body class="landing-part">
    <header class="landing-part">
        <h1>VernFM</h1>
    </header>
    <main class="landing-part">
        <section class="auth-container landing-part">
            <div class="auth-card landing-part">
                <h2 class="landing-part">Login</h2>
                <form class="landing-part" action="../private/scripts/php/login.php" method="POST">
                    <input class="landing-part" type="email" name="email" placeholder="Email" required>
                    <input class="landing-part" type="password" name="password" placeholder="Password" required>
                    <button class="landing-part" type="submit">Login</button>
                </form>
            </div>
            <div class="auth-card landing-part">
                <h2 class="landing-part">Signup</h2>
                <form class="landing-part" action="../private/scripts/php/signup.php" method="POST">
                  <label class="landing-part" for="type">Account Type:</label>
<select class="landing-part"  name="type" id="type">
  <option class="landing-part" value="regular">Regular</option>
  <option class="landing-part" value="artist">Artist</option>
</select>
                    <input class="landing-part" type="text" name="display_name" placeholder="Display Name" required>
                    <input class="landing-part" type="text" name="first_name" placeholder="First Name" required>
                    <input class="landing-part" type="text" name="last_name" placeholder="Last Name" required>
                    <input class="landing-part" type="email" name="email" placeholder="Email" required>
                    <input class="landing-part" type="password" name="password" placeholder="Password" required>
                    <label class="landing-part" for="confirm_password">Confirm Password:</label>
<input class="landing-part" type="password" name="confirm_password" id="confirm_password" required>
                    <button class="landing-part" type="submit">Signup</button>
                </form>
            </div>
        </section>
    </main>
</body>
</html>
