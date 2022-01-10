<?php
if(isset($_SESSION['cust_id']))
{

}
else
{
  echo"<script>
            alert('login first ');
            window.location='login';
          </script>";
}
?>
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
     <div class="table-responsive-sm">   
     <?php 
     if(!empty($fetch))
     {
     ?>      
  <table class="table table-bordered">
    <thead>
      <tr>
       
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Birth Date</th>
        <th>Gender</th>
        <th>State</th>
        <th>City</th>
         <th>Pincode</th>
         <th>Mobile</th>
         <th>Edit Profile</th>
         <th>Delete Profile</th>
         <th>Logout </th>

      </tr>
    </thead>
    <tbody>
      <tr>
        
        <td><?php echo $fetch->fname?></td>
        <td><?php echo $fetch->lname?></td>
        <td><?php echo $fetch->birthdate?></td>
        <td><?php echo $fetch->gender?></td>
        <td><?php echo $fetch->sname?></td>
        <td><?php echo $fetch->city_name?></td>
        <td><?php echo $fetch->pincode?></td>
        <td><?php echo $fetch->mobile?></td>

        <td><a href="edit?edit_id=<?php echo $fetch->cust_id?>">Edit Profile</a></td>
        <td><a href="Delete?delete_id=<?php echo $fetch->cust_id?>">Delete Profile</a></td>
        <td><a href="logout">Logout</a></td>

      </tr>
    </tbody>
  </table>
  <?php
}
else
{
    echo "Data Not Found";
}
?>
  </div>
    

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
