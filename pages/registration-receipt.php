<?php include '../workers/registration-receipt.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>RDSE MOCK <?php echo date('Y')?> registration Receipt </title>
    <?php include '../includes/head.php'; ?>
    <link href="<?php echo $base_url; ?>/assets/css/registration-receipt.css" rel="stylesheet"/>
  </head>
  <body class = "registration-receipt">
    <?php include '../includes/nav.php' ?>
    <header>
        <div class="body">
          <div class="logo-container"><img src="<?php echo $base_url; ?>/assets/images/pwf.png"/></div>
          <h1>REGIONAL DELEGATION FOR SECONDARY EDUCATION</h1>
          <h1>(MOCK <?php echo date('Y')?> registration Receipt)</h1>
        <div class = "w-80">
          <div>Full names: <strong><?php echo $candidate_info['fname'] . ' ' . $candidate_info['mname'] . ' ' . $candidate_info['lname']; ?></strong></div>
          <div>Exam: <strong><?php echo $exam['name']; ?></strong></div>
          <div>Institution: <strong><?php echo $institute['name']; ?></strong></div>
          <div>Candidate N<sup>o</sup>: <strong><?php echo $candidate_info['candidate_number']; ?></strong></div>
          <div>Registration fee: <strong><?php echo $exam['registration_fee']; ?> CFA</strong></div>
          <div>Cost per paper: <strong><?php echo $exam['cost_per_paper']; ?> CFA</strong></div>
          <div>Papers registered: <strong><?php echo $candidate_info['paper_names'] . ' (' . $num_papers . ')'; ?></strong></div>
          <div>Total: <strong><?php echo $total ?> CFA</strong></div>
          <div>Status: <strong><?php echo $candidate_info['status']; ?></strong></div>
          <div>Date registered: <strong><?php echo $candidate_info['reg_date']; ?></strong></div>
          <button class="btn-dark no-print print-btn" type="submit" onclick="window.print()">Print</button>
        </div>
        </div>
    </header>
    <?php include '../includes/foot.php' ?>
  </body>
</html>
