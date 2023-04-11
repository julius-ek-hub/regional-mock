<?php include '../workers/register-candidate.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Register Candidate</title>
    <?php include '../includes/head.php'; ?>
    <link href="<?php echo $base_url; ?>/assets/css/form.css" rel="stylesheet"/>
    <link href="<?php echo $base_url; ?>/assets/css/register.css" rel="stylesheet"/>
  </head>
  <body>
    <?php include '../includes/nav.php' ?>
    <header class="register-header form">
      <form class="body" method="post">
        <div class="form-container-outer">
          <h2></h2>
          <h1><?php echo $institute['name']; ?> candidate registration form for Regional Mock Exams <?php echo date('Y'); ?></h1>
          <div>Fill info as in birth certificate. Fields marked with (<span class = "error">*</span>) are required.</div>
            <div class="form-container-inner">
                <div class="input-container">
                    <label>First name <span class = "error">*</span>:</label>
                    <input required name="fname" placeholder ="Candidate's first name..." value="<?php echo $name; ?>"/>
                </div>
                <div class="input-container">
                    <label>Middle name:</label>
                    <input name="mname" placeholder ="Candidate's middle name..." value="<?php echo $name; ?>"/>
                </div>
                <div class="input-container">
                    <label>Last name <span class = "error">*</span>:</label>
                    <input required name="lname" placeholder ="Candidate's last name ..." value="<?php echo $name; ?>"/>
                </div>
                <div class="input-container">
                    <label>Sex <span class = "error">*</span>:</label>
                    <select required name="sex">
                        <option value="M" selected>Male</option>
                        <option value="F">Female</option>
                    </select>
                </div>
                <div class="input-container">
                    <label>Born on <span class = "error">*</span>:</label>
                    <input required name="established" type="date" value="<?php echo $established; ?>"/>
                </div>
                <div class="input-container">
                    <label>By <span class = "error">*</span>:</label>
                    <input required name="owner" placeholder ="Father's full names ..." value="<?php echo $owner; ?>"/>
                </div>
                <div class="input-container">
                    <label>And <span class = "error">*</span>:</label>
                    <input required name="owner" placeholder ="Mother's full names ..." value="<?php echo $owner; ?>"/>
                </div>
                <div class="input-container">
                    <label>At <span class = "error">*</span>:</label>
                    <input required name="owner" placeholder ="Place of birth..." value="<?php echo $owner; ?>"/>
                </div>
                <div class="input-container">
                    <label>Name of Institution:</label>
                    <input name="name" placeholder ="Name of institution ..." value="<?php echo $institute['name']; ?>" readonly disabled/>
                </div>

                <div class="input-container">
                    <label>Exam:</label>
                    <select name="exam" id="exam" value="gce-al">
                    <?php foreach ($exams as $key => $value) {echo '<option value=' . "$value[0]" . ($value[0] == $exam ? ' selected' : '') . '>' . $value[1] . '</option>';}?>
                    </select>
                </div>
            </div>
        <div>By clicking Submit, you agree to the<a href="register-institute.php">Terms and condtion</a></div>
        <div><button class="btn-dark" type="submit">Submit</button></div>
        </div>
      </form>
    </header>
    <?php include '../includes/foot.php' ?>
    <script>
    </script>
  </body>
</html>
