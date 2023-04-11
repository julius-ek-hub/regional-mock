<?php include '../workers/institute-login.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Institute Login</title>
    <?php include '../includes/head.php'; ?>
    <link href="<?php echo $base_url; ?>/assets/css/form.css" rel="stylesheet"/>
  </head>
  <body>
    <?php include '../includes/nav.php' ?>
    <header class="form">
      <form class="body" method="post">
        <div class="form-container-outer mw-400">
          <h2>Login</h2>
          <div class="form-container-inner">
          <div class="input-container error">
            <?php echo $errors; ?>
          </div>
          <div class="input-container">
                <label>Contact:</label>
                <input name = "contact" placeholder ="Email or Telephone ..." value = "<?php echo $contact; ?>"/>
          </div>
          <div class="input-container">
                <label>Password:</label>
                <input type = "password" name = "password" placeholder ="Password ..." value = "<?php echo $password; ?>"/>
          </div>
          <div>
          <input type="checkbox" name="keep_login" <?php echo $keep_login ? 'checked' : ''; ?>>
          <label for="keep_login"> Keep me logged in.</label>
          </div>
          </div>
          <div><a href="forgot-password.php">Forgot password?</a></div>
          <div><a href="register-institute.php">Don't have Account?</a></div>
          <div><button class="btn-dark" type = "submit">Submit</button></div>
        </div>
      </form>
    </header>
    <?php include '../includes/foot.php' ?>
    <script>
      window.addEventListener("load", () => {
        let slideIndex = 0;
        login_link = document.querySelector("nav .login-btn");
        login_link.innerHTML = 'Register Institute'
        login_link.href = 'register-institute.php'
      });
    </script>
  </body>
</html>
