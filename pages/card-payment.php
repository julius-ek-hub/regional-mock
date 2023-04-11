<?php include '../workers/card-payment.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Credit/Debit card Payment</title>
    <?php include '../includes/head.php'; ?>
    <link href="<?php echo $base_url; ?>/assets/css/form.css" rel="stylesheet"/>
    <link href="<?php echo $base_url; ?>/assets/css/select-paper.css" rel="stylesheet"/>
  </head>
  <body>
    <?php include '../includes/nav.php' ?>
    <header class="form">
      <form class="body" method="post">
        <div class="form-container-outer mw-400">
          <h2 class = "btn-dark">Credit/Debit card Payment</h2>
          <div class="form-container-inner">
            <div class = "warning"><strong>WARNING:This is fake, please do not share your real card Info. (Any info will be accepted)</strong></div>
            <div class="input-container">
                <label>Card holder name:</label>
                <input required name = "name" placeholder = "Name on card"/>
            </div>
            <div class="input-container">
                <label>Card type:</label>
                <select required name="card-type">
                    <option value = "master">Master</option>
                    <option value = "visa">Visa</option>
                </select>
            </div>
            <div class="input-container">
                <label>Card number:</label>
                <input required name = "card-no" placeholder = "16 digits card number"/>
            </div>
            <div class="input-container">
                <label>Expiry date:</label>
                <input required name = "expiry-date" type = "month"/>
            </div>
            <div class="input-container">
                <label>CSV:</label>
                <input type = "password" required name = "csv" placeholder = "3 digits code at the back of card"/>
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
