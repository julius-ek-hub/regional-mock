<?php include '../workers/orange-payment.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Orange payment</title>
    <?php include '../includes/head.php'; ?>
    <link href="<?php echo $base_url; ?>/assets/css/form.css" rel="stylesheet"/>
    <link href="<?php echo $base_url; ?>/assets/css/select-payment.css" rel="stylesheet"/>
  </head>
  <body>
    <?php include '../includes/nav.php' ?>
    <header class="form">
      <form class="body" method="post">
        <div class="form-container-outer mw-400">
          <h2 class="orange-btn btn-light">Orange Money</h2>
          <div class="form-container-inner">
            <div class = "warning"><strong>WARNING:This is fake, please do not share your real Orange Money Info. (Any info will be accepted)</strong></div>
            <div class="input-container">
                <label>Account Name</label>
                <input required name = "name" placeholder = "Account name"/>
            </div>
            <div class="input-container">
                <label>Telephone Number</label>
                <input required name = "tel" placeholder = "Paper name"/>
            </div>
            <div class="input-container">
                <label>PIN</label>
                <input type = "password" required name = "pin" placeholder = "PIN"/>
            </div>
          </div>
          <div><button class="btn-dark" type = "submit">Pay <?php echo $pending_candidate_payment_amount; ?> CFA</button></div>
        </div>
      </form>
    </header>
    <?php include '../includes/foot.php' ?>
    <script>
    </script>
  </body>
</html>
