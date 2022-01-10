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
<script type="text/javascript">

   function validate()
   {
    var cate_id=document.forms["myform"]["cate_id"].value;  
  if(cate_id=="" || cate_id==null)  // for null condition
  {
    alert('Please select category');  // alert msg
    return false;   //return false means msg show and again on same page with value not refresh page
  }

var subcate_id=document.forms["myform"]["subcate_id"].value;  
  if(subcate_id=="" || subcate_id==null)  // for null condition
  {
    alert('Please select subcategory');  // alert msg
    return false;   //return false means msg show and again on same page with value not refresh page
  }


    var pro_name=document.forms["myform"]["pro_name"].value;  
  if(pro_name=="" || pro_name==null)  // for null condition
  {
    alert('Please fill out the Product');  // alert msg
    return false;   //return false means msg show and again on same page with value not refresh page
  }

   var pro_price=document.forms["myform"]["pro_price"].value;  
  if(pro_price=="" || pro_price==null)  // for null condition
  {
    alert('Please fill out the Product Price');  // alert msg
    return false;   //return false means msg show and again on same page with value not refresh page
  }

  var image=document.forms["myform"]["image"].value;  
  if(image=="" || image==null)  // for null condition
  {
    alert('Please select image');  // alert msg
    return false;   //return false means msg show and again on same page with value not refresh page
  }

   }
  


</script>
<body>

<div class="container">
  
  <form action="" method="POST" name="myform" enctype="multipart/form-data" onsubmit="return validate();">

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
      <label for="pwd">sub category:</label>
      <select name="subcate_id">
        <option>----select----</option>
        <?php
          foreach($subcate_arr as $d)
          {
            ?>
        <option value="<?php echo $d->subcate_id;?>"><?php echo $d->subcate_name?></option>
        <?php
      }
      ?>

      </select>
    </div>

    <div class="form-group">
      <label for="uname">Product Name:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter product" name="pro_name">
      
    </div>

    <div class="form-group">
      <label for="uname">Product price:</label>
      <input type="number" class="form-control" id="uname" placeholder="Enter product price" name="pro_price">
      
    </div>

    <div class="form-group">
      <label for="uname">Product Name:</label>
      <input type="file" class="form-control" id="uname" name="image">
      
    </div>

     
    
    <input type="submit" class="btn btn-primary" name="add_product" value="Add Product">
  </form>
</div>

</body>
</html>
