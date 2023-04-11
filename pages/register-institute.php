<?php include '../workers/register-institute.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Register an Institution</title>
    <?php include '../includes/head.php'; ?>
    <link href="<?php echo $base_url; ?>/assets/css/form.css" rel="stylesheet"/>
    <link href="<?php echo $base_url; ?>/assets/css/register-institute.css" rel="stylesheet"/>
  </head>
  <body>
    <?php include '../includes/nav.php' ?>
    <header class="register-header form">
      <form class="body" method="post">
        <div class="form-container-outer">
          <h1>Register an Institute</h1>
            <div class="form-container-inner">
            <div>Sections marked with (<span class = "error">*</span>) are required.</div>
            <h2 class="section-title">Basic Info <span class = "error">*</span></h2>
            <div class="input-container">
                <label>Name of Institution:</label>
                <input required name="name" placeholder ="Name of institution ..." value="<?php echo $name; ?>"/>
            </div>
            <div class="input-container">
                <label>Established by:</label>
                <input required name="owner" placeholder ="Owner/Principal/Registra ..." value="<?php echo $owner; ?>"/>
            </div>
            <div class="input-container">
                <label>Year established:</label>
                <input required name="established" type="date" value="<?php echo $established; ?>"/>
            </div>
            <div class="input-container">
                <label>Certification trainings provided:</label>
                <input name="exam" id = "selected" hidden="true" value = "<?php echo $exam; ?>"/>
                <div id = "selected-container"></div>
                <select required onChange="selectMultiple(this)" id = "picker">
                <option value = ''>---Click to choose---</option>
                <?php foreach ($exams as $key => $value) {echo '<option value=' . $value['id'] . '>' . $value['name'] . '</option>';}?>
                </select>
            </div>
            <h2 class="section-title">Contact Info <span class = "error">*</span></h2>
            <div class="input-container">
                <label>Office Line:</label>
                <input required name="office_line" placeholder ="+237XXXXXXXXX ..." value="<?php echo $office_line; ?>"/>
            </div>
            <div class="input-container">
                <label>Mobile Line:</label>
                <input required name="mobile_line" placeholder ="+237XXXXXXXXX ..." value="<?php echo $mobile_line; ?>"/>
            </div>
            <div class="input-container">
                <label>Email Address:</label>
                <input required name="email" placeholder ="eg. name@provider.com" value="<?php echo $email; ?>"/>
            </div>
            <h2 class="section-title">Location <span class = "error">*</span></h2>
            <div class="input-container">
                <label>Region:</label>
                <input required name="region" placeholder ="eg. South West..." value="<?php echo $region; ?>"/>
            </div>
            <div class="input-container">
                <label>Division:</label>
                <input required name="division" placeholder ="eg. Meme ..." value="<?php echo $division; ?>"/>
            </div>
            <div class="input-container">
                <label>Sub-Division</label>
                <input required name="sub_division" placeholder ="Kumba 2 ..." value="<?php echo $sub_division; ?>"/>
            </div>
            <div class="input-container">
                <label>Town</label>
                <input required name="town" placeholder ="eg. Kumba ..." value="<?php echo $town; ?>"/>
            </div>
            <h2 class="section-title">Other Info</h2>
            <div class="input-container">
                <label>Total number of students:</label>
                <input name="students" placeholder ="Type only number(s)..." type="number" value="<?php echo $students; ?>"/>
            </div>
            <div class="input-container">
                <label>Total number of candidates:</label>
                <input name="candidates" placeholder ="Type only number(s)..." type="number" value="<?php echo $candidates; ?>"/>
            </div>
            <div class="input-container">
                <label>Total number of teachers:</label>
                <input name="teachers" placeholder ="Type only number(s)..." type="number" value="<?php echo $teachers; ?>"/>
            </div>
            <div class="input-container">
                <label>Highest certification training offered:</label>
                <select name="exam_max" id="exam_max" value="<?php echo $exam_max; ?>">
                <option value = ''>---Click to choose---</option>
                <?php foreach ($exams as $key => $value) {echo '<option value=' . $value['id'] . ($value == $exam_max ? ' selected' : '') . '>' . $value['name'] . '</option>';}?>
                </select>
            </div>
            <div class="input-container">
                <label>Last year percentage score for Highest certification:</label>
                <input name="exam_max_percentage" placeholder ="Type only number(s)..." type="number" value="<?php echo $exam_max_percentage; ?>"/>
            </div>
            </div>
            <div>By clicking Submit, you agree to the <a href="#">Terms and condtion</a></div>
            <div><button class="btn-dark" type="submit">Submit</button></div>
        </div>
      </form>
    </header>
    <?php include '../includes/foot.php' ?>
    <script src = "<?php echo "$base_url/assets/js/multi-select.js"; ?>"></script>
  </body>
</html>
