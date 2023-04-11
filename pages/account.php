<?php include '../workers/account.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Regional Mock - <?php echo $institute['name']; ?></title>
    <?php include '../includes/head.php'; ?>
    <link
      href="<?php echo $base_url; ?>/assets/css/account.css"
      rel="stylesheet"
    />
  </head>
  <body class="account">
    <?php include '../includes/nav.php' ?>
    <header>
      <div class="body">
        <div class="w-80">
          <h1>
            Regional Mock Portal, March
            <?php echo date('Y'); ?>
            session
          </h1>
          <h2>
            Institution: <?php echo $institute['name']; ?>
          </h2>
          <h2>
            Exam(s): <?php echo empty($exam) ? implode(', ', $institute_exam_names) : $institute_exams[$exam]['name']; ?>
          </h2>
          <h2>
            Total Registered:
            <?php echo sizeof($all_candidate); ?>
          </h2>
          <div class="no-print actions-div">
            <a
              class="btn-dark"
              href="<?php echo $base_url; ?>/pages/register-candidate.php"
              >Register candidate +</a
            >
            <div class="filter-by">
              Filter by Exam: 
              <select onChange = "runFilter(this.value)">
                <option value = "">All</option>
              <?php foreach ($institute_exams as $key => $value) {echo '<option value=' . $value['id'] . ($value['id'] == $exam ? ' selected' : '') . '>' . $value['name'] . '</option>';}?>
              </select>
            </div>
            <button class="btn btn-dark" onClick="window.print()">
              Print List
            </button>
          </div>
          <hr />
          <div>
            <table border="1">
              <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Sex</th>
                <th>Exam</th>
                <th>Candidate N<sup>o</sup></th>
                <th>Date Registered</th>
                <th>Papers</th>
                <th>Status</th>
                <th></th>
              </tr>
              <?php
                for ($i=0; $i < sizeof($all_candidate); $i++) { 
                $id = $all_candidate[$i][0];
                echo ("
                <tr>
                  <td>" . $i + 1 . "</td>
                  <td>" . $all_candidate[$i][1] . ' ' . $all_candidate[$i][2] . ' ' . $all_candidate[$i][3] . "</td>
                  <td>" . $all_candidate[$i][4] . "</td>
                  <td>" . $exams[$all_candidate[$i][9]]['name'] . "</td>
                  <td>" . $all_candidate[$i][11] . "</td>
                  <td>" . $all_candidate[$i][12] . "</td>
                  <td>" . $all_candidate[$i][14] . "</td>
                  <td>" . $all_candidate[$i][10] . "</td>
                  <td class = 'no-print'>
                    <a href='$base_url/pages/registration-receipt.php?candidate_id=$id' class = 'btn btn-light'>Print Receipt</a>
                  </td>
                </tr>
              "); } ?>
            </table>
          </div>
        </div>
      </div>
    </header>
    <?php include '../includes/foot.php' ?>
    <script>
      function runFilter(value){
        window.location.href = window.location.protocol + '//' + window.location.host + window.location.pathname + '?exam=' + value
      }
    </script>
  </body>
</html>
