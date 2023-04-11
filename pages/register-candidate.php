<?php include '../workers/register-candidate.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Register Candidate</title>
    <?php include '../includes/head.php'; ?>
    <link href="<?php echo $base_url; ?>/assets/css/form.css" rel="stylesheet"/>
  </head>
  <body>
    <?php include '../includes/nav.php' ?>
    <header class="form">
      <form class="body" method="post">
        <div class="form-container-outer">
          <h2></h2>
          <h1><?php echo $institute['name']; ?> candidate registration form for Regional Mock Exams <?php echo date('Y'); ?></h1>
          <div>Fill info as in birth certificate. Fields marked with (<span class = "error">*</span>) are required.</div>
            <div class="form-container-inner">
                <div class="input-container">
                    <label>First name <span class = "error">*</span>:</label>
                    <input required name="fname" placeholder ="Candidate's first name..." value="<?php echo $fname; ?>"/>
                </div>
                <div class="input-container">
                    <label>Middle name:</label>
                    <input name="mname" placeholder ="Candidate's middle name..." value="<?php echo $mname; ?>"/>
                </div>
                <div class="input-container">
                    <label>Last name <span class = "error">*</span>:</label>
                    <input required name="lname" placeholder ="Candidate's last name ..." value="<?php echo $lname; ?>"/>
                </div>
                <div class="input-container">
                    <label>Sex <span class = "error">*</span>:</label>
                    <select required name="sex">
                        <option value="M" <?php echo $sex == "M" ? "selected": ""?>>Male</option>
                        <option value="F" <?php echo $sex == "F" ? "selected": ""?>>Female</option>
                    </select>
                </div>
                <div class="input-container">
                    <label>Born on <span class = "error">*</span>:</label>
                    <input required name="dob" type="date" value="<?php echo $dob; ?>"/>
                </div>
                <div class="input-container">
                    <label>By <span class = "error">*</span>:</label>
                    <input required name="father" placeholder ="Father's full names ..." value="<?php echo $father; ?>"/>
                </div>
                <div class="input-container">
                    <label>And <span class = "error">*</span>:</label>
                    <input required name="mother" placeholder ="Mother's full names ..." value="<?php echo $mother; ?>"/>
                </div>
                <div class="input-container">
                    <label>At <span class = "error">*</span>:</label>
                    <input required name="pob" placeholder ="Place of birth..." value="<?php echo $pob; ?>"/>
                </div>
                <div class="input-container">
                    <label>Name of Institution:</label>
                    <input name="name" placeholder ="Name of institution ..." value="<?php echo $institute['name']; ?>" readonly disabled/>
                </div>

                <div class="input-container">
                    <label>Exam:</label>
                    <select required name="exam" id="exam">
                    <option value = ''>---Click to choose---</option>
                    <?php foreach ($institute_exams as $key => $value) {echo '<option value=' . $value['id'] . ($value['id'] == $exam ? ' selected' : '') . '>' . $value['name'] . '</option>';}?>
                    </select>
                </div>
            </div>
        <div>By clicking Submit, you agree to the<a href="#">Terms and condtion</a></div>
        <div><button class="btn-dark" type="submit">Next</button></div>
        </div>
      </form>
    </header>
    <?php include '../includes/foot.php' ?>
  </body>
</html>
