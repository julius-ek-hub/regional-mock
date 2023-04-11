<?php require '../workers/var.php';?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Error 500</title>
    <?php include '../includes/head.php'; ?>
  </head>
  <body>
    <?php include '../includes/nav.php' ?>
    <header>
      <main class="body">
        <div class="mw-400">
          <h2>Error 500</h2>
        <div><span class="error"></span></div>
        </div>
      </main>
    </header>
    <?php include '../includes/foot.php' ?>
    <script>
        document.querySelector('span').innerText = decodeURI(window.location.search.split('?error=')[1] || 'Something went wrong.');
    </script>
  </body>
</html>
