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
         
  <table class="table table-bordered">
    <thead>
      <tr>
       
        <th>Category Name</th>
         <th>Delete Profile</th>
       
      </tr>
    </thead>
    <tbody>

      <?php
      if(!empty($fetch_arr))
      {
      foreach($fetch_arr as $fetch)
      { 
     
     ?>  
      <tr>
        
        <td><?php echo $fetch->cate_name?></td>
        
        <td><a href="Delete?delete_cate_id=<?php echo $fetch->cate_id?>">Delete</a></td>
     

      </tr>
       </table>
  <?php
}
}
else
{
    echo "Data Not Found";
}
?>
    
 
  </div>
    

  </form>
</div>


</body>
</html>
