<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
  
  <form action="" method="POST" enctype="multipart/form-data">

     <div class="form-group">
      <label for="pwd">category:</label>
      <select name="cate_id">
        <option>----select----</option>
        <?php
          foreach($cate_arr as $d)
          {
            ?>
        <option value="<?php echo $d->cate_id;?>"><?php echo $d->cate_name?></option>
        <?php
      }
      ?>

      </select>
    </div>

    <div class="form-group">
      <label for="uname">First Name:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter Sub Category" name="subcate_name">
      
    </div>

     
    
    <input type="submit" class="btn btn-primary" name="add_sub_category" value="Add Sub Category">
  </form>
</div>

</body>
</html>
