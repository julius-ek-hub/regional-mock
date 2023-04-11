<?php include '../workers/password.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Create password</title>
    <?php include '../includes/head.php'; ?>
    <link href="<?php echo $base_url; ?>/assets/css/form.css" rel="stylesheet"/>
  </head>
  <body>
    <?php include '../includes/nav.php' ?>
    <header class="form">
    <form class="body" method="post">
        <div class="form-container-outer mw-400">
          <h2>Create Password</h2>
          <div class="form-container-inner">
          <div class="input-container error">
            <?php echo $errors; ?>
          </div>
          <div class="input-container">
                <label>New Password:</label>
                <input type = "password" name = "password" placeholder ="Enter password ..." value = "<?php echo $password; ?>"/>
          </div>
          <div class="input-container">
                <label>Repeat Password:</label>
                <input type = "password" name = "password_repeat" placeholder ="Repeat password ..." value = "<?php echo $password_repeat; ?>"/>
          </div>
          <div>
          <input type="checkbox" name="keep_login" <?php echo $keep_login ? 'checked' : ''; ?>>
          <label for="keep_login"> Keep me logged in.</label>
          </div>
          </div>
          <div><button class="btn-dark" type = "submit">Submit</button></div>
        </div>
      </form>

    </header>
    <?php include '../includes/foot.php' ?>
    <script>
      window.addEventListener("load", () => document.querySelector("nav .login-btn").remove());
    </script>
  </body>
</html>