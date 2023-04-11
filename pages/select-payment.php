<?php include '../workers/select-payment.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Select payment method</title>
    <?php include '../includes/head.php'; ?>
    <link href="<?php echo $base_url; ?>/assets/css/select-payment.css" rel="stylesheet"/>
  </head>
  <body class = "select-payment">
    <?php include '../includes/nav.php' ?>
    <header>
      <div class="body">
        <div class="mw-400">
            <h2>Select payment method</h2>
            <a class = "btn-light mtn-btn" href = "<?php echo "$base_url/pages/mtn-payment.php"; ?>">MTM Mobile Money</a>
            <a class = "btn-dark orange-btn" href = "<?php echo "$base_url/pages/orange-payment.php"; ?>">Orange Money</a>
            <a class = "btn-dark" href = "<?php echo "$base_url/pages/card-payment.php"; ?>">Credit/Debit Card</a>
          </div>
        </div>
      </div>
    </header>
    <?php include '../includes/foot.php' ?>
  </body>
</html>
