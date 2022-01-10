
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


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">


<script>
  $(document).ready(function() 
  {
    $('#table').DataTable();
  } );
</script>
    





<body>

<div class="container">
  
  <form action="" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
     <div class="table-responsive-sm">   
         
  <table class="table table-bordered" id="table">
    <thead>
      <tr>
       
        <th>Category Name</th>
        <th> Sub Category Name</th>
        <th> Product Name</th>
        <th> Product Price</th>
        <th> Product Image</th>
        
         <th>Delete </th>
       
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
        <td><?php echo $fetch->subcate_name?></td>
        <td><?php echo $fetch->pro_name?></td>
        <td><?php echo $fetch->pro_price?></td>
        <td><img src="upload/<?php echo $fetch->image?>" height="50px" width="50px"></td>
        <td><a href="Delete?delete_pro_id=<?php echo $fetch->pro_id?>">Delete</a></td>
     

      </tr>
       
  <?php
}
}
else
{
    echo "Data Not Found";
}
?>
    
 
  </div>
    
</table>
  </form>
</div>


</body>
</html>
