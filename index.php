<?php include 'workers/init.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Regional Mock Website</title>
    <?php include 'includes/head.php'; ?>
    <link href="<?php echo $base_url; ?>/assets/css/home.css" rel="stylesheet"/>
    <link href="<?php echo $base_url; ?>/assets/css/carousel.css" rel="stylesheet"/>
  </head>
  <body class = "home">
    <?php include 'includes/nav.php' ?>
    <header>
      <section class="body">
        <div class="intro">
          <div>
            <h1>Regional<br/>Mock Examination</h1>
            <div>
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry. Lorem Ipsum has been the industry's standard dummy text
              ever since the 1500s, when
              <?php 
               foreach ($exams as $key => $value) {
                echo '<strong>' . $value['name'] . '</strong>' . ($key < sizeof($exams) - 1 ? ', ': '');
               }
              ?>.
            </div>
            <div class="register-btn-container">
              <a class="btn-dark login-btn" href="<?php echo $institute ? 'pages/account.php' : 'pages/register-institute.php'; ?>"><?php echo $institute ? 'Go to Account' : 'Register Institute' ?></a>
            </div>
          </div>
        </div>
        <?php include 'includes/carousel.php'; ?>
      </section>
    </header>
    <?php include 'includes/foot.php' ?>
    <script src="<?php echo "$base_url/assets/js/carousel.js" ?>"></script>
  </body>
</html>
