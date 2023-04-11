<?php include '../workers/select-papers.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Select Papers</title>
    <?php include '../includes/head.php'; ?>
    <link href="<?php echo $base_url; ?>/assets/css/form.css" rel="stylesheet"/>
    <link href="<?php echo $base_url; ?>/assets/css/select-paper.css" rel="stylesheet"/>
  </head>
  <body>
    <?php include '../includes/nav.php' ?>
    <header class="form">
      <form class="body" method="post">
        <div class="form-container-outer mw-400">
          <h2>Select papers</h2>
          <?php echo $error ? "<h3 class='error'>$error.</h3>" : ''; ?>
          <div class="form-container-inner">
            <div class="input-container">
              <div>Exam: <strong><?php echo $exam; ?></strong></div>
              <div>Registration fee: <strong><?php echo $exam_info['registration_fee']; ?> CFA</strong></div>
              <div>Cost per paper: <strong><?php echo $exam_info['cost_per_paper']; ?> CFA</strong></div>
              <input name="papers_selected" id = "selected" hidden value = "<?php echo $papers_selected; ?>"/>
              <div id = "selected-container"></div>
              <div>Number of papers: <strong id="total-papers"></strong></div>
              <div>Total cost: <strong id="total-cost"></strong> <strong>CFA</strong></div>
              <select required onChange="selectMultiple(this)" id = "picker">
              <option value= ''>---Click to choose---</option>
              <?php foreach ($papers_allowed as $key => $value) {echo '<option value=' . "$key" . '>' . $value . '</option>';}?>
              </select>
            </div>
          </div>
          <div>Can't find paper? <a target = "_blank" href = "<?php echo "$base_url/pages/add-paper.php"; ?>">Add</a> </div>
        <div><button class="btn-dark" type = "submit">Next</button></div>
      </form>
    </header>
    <?php include '../includes/foot.php' ?>
    <script src = "<?php echo "$base_url/assets/js/multi-select.js"; ?>"></script>
    <script>
        let cost_per_paper = <?php echo $exam_info['cost_per_paper']?>;
        let registration_fee = <?php echo $exam_info['registration_fee']?>;
        
        onChangeCallbacks.push(() => {
            let selected_ids = (selected.value || "").split(",").filter((id) => id);
            document.querySelector('#total-papers').textContent = selected_ids.length;
            document.querySelector('#total-cost').textContent = selected_ids.length*cost_per_paper + registration_fee;
        });
    </script>
  </body>
</html>
