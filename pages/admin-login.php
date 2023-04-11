<?php include '../workers/admin-login.php'; ?>

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
          <h2>Admin Login</h2>
          <div>No admin Account present!! (Use default username = admin, password = admin)</div>
          <div class="form-container-inner">
          <div class="input-container error">
            <?php echo $errors; ?>
          </div>
          <div class="input-container">
                <label>Username:</label>
                <input name = "username" placeholder ="Username ..." value = "<?php echo $username; ?>"/>
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
          <div><button class="btn-dark" type = "submit">Submit</button></div>
        </div>
      </form>
    </header>
    <?php include '../includes/foot.php' ?>
  </body>
</html>
