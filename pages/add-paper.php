<?php include '../workers/add-paper.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add Paper - RDSE</title>
    <?php include '../includes/head.php'; ?>
    <link href="<?php echo $base_url; ?>/assets/css/form.css" rel="stylesheet"/>
  </head>
  <body>
    <?php include '../includes/nav.php' ?>
    <header class="form">
      <form class="body" method="post">
        <div class="form-container-outer mw-400">
          <h2>Add paper</h2>
          <div class="form-container-inner">
            <div>Please spell correctly because you will not be able to change it later.</div>
            <?php echo $success ? "<h3 class='success'>$success</h3>" : ''; ?>
            <?php echo $error ? "<h3 class='error'>$error</h3>" : ''; ?>
          <div class="input-container">
                <label>Exam</label>
                <select required name = "exam">
                <?php foreach ($exams as $key => $value) {echo '<option value=' . $value['id'] . ($value['id'] == $exam_index ? ' selected' : '') . '>' . $value['name'] . '</option>';}?>
                </select>
            </div>
            <div class="input-container">
                <label>Paper Name</label>
                <input required name = "paper" placeholder = "Paper name"/>
            </div>
          </div>
          <div><button class="btn-dark" type = "submit">Submit</button></div>
        </div>
      </form>
    </header>
    <?php include '../includes/foot.php' ?>
    <script>
    </script>
  </body>
</html>
