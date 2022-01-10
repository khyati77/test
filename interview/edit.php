<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
  
  <form action="" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
    <div class="form-group">
      <label for="uname">First Name:</label>
      <input type="text" class="form-control" id="uname" value="<?php echo $fetch->fname;?>" name="fname" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>

     <div class="form-group">
      <label for="uname">Last Name:</label>
      <input type="text" class="form-control" id="uname" value="<?php echo $fetch->lname;?>" name="lname" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>

    
    <div class="form-group">
      <label for="pwd">BirthDate:</label>
      <input type="date" class="form-control" id="pwd" value="<?php echo $fetch->birthdate;?>"name="birthdate" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <?php
    $gender=$fetch->gender;
    if($gender=="male")
    {
      ?>
    <div class="form-check">
      <label class="form-check-label" for="radio1">
        <input type="radio" class="form-check-input" id="radio1" name="gender" value="male" checked>male

      </label>
    </div>
    <div class="form-check">
      <label class="form-check-label" for="radio2">
        <input type="radio" class="form-check-input" id="radio2" name="gender" value="female">female
      </label>
    </div>
<?php
}
else
{

  ?>
  <div class="form-check">
      <label class="form-check-label" for="radio1">
        <input type="radio" class="form-check-input" id="radio1" name="gender" value="male" >male

      </label>
    </div>
    <div class="form-check">
      <label class="form-check-label" for="radio2">
        <input type="radio" class="form-check-input" id="radio2" name="gender" value="female" checked>female
      </label>
    </div>
  <?php
}
?>   
<br/>
  <div class="form-group">
      <label for="pwd">State:</label>
      <select name="sid">
        <option>----select----</option>
        <?php
          foreach($state_arr as $d)
          {
            if($fetch->sid==$d->sid)
            {
            ?>
               <option value="<?php echo $d->sid;?>" selected><?php echo $d->sname?></option>
             <?php
            }
            else
            {
              ?>
              <option value="<?php echo $d->sid;?>"><?php echo $d->sname?></option>
              <?php
            }
      }
      ?>

      </select>

    </div>

     <div class="form-group">
      <label for="pwd">State:</label>
      <select name="cid">
        <option>----select----</option>
        <?php
          foreach($city_arr as $d)
          {
            if($fetch->cid==$d->cid)
            {
            ?>
               <option value="<?php echo $d->cid;?>" selected><?php echo $d->city_name?></option>
             <?php
            }
            else
            {
              ?>
              <option value="<?php echo $d->cid;?>"><?php echo $d->city_name?></option>
              <?php
            }
      }
      ?>

      </select>
    </div>

 <div class="form-group">
      <label for="pwd">Pincode:</label>
      <input type="number" class="form-control" id="pwd" value="<?php echo $fetch->pincode;?>" name="pincode" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>

    <div class="form-group">
      <label for="pwd">Contact Number:</label>
      <input type="number" class="form-control" id="pwd" value="<?php echo $fetch->mobile;?>" name="mobile" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>

    
    <input type="submit" class="btn btn-primary" name="update" value="Update">
  </form>
</div>

<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

</body>
</html>
