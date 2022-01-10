<?php
include('model.php');

class control extends model
{
	function __construct()
	{
		session_start();

		model::__construct();

		$url=$_SERVER['PATH_INFO'];

		switch($url)
		{
			case '/registration':
			$state_arr=$this->select('state');
			$city_arr=$this->select('city');
			if(isset($_REQUEST['submit']))
			{
				$fname=$_REQUEST['fname'];
				$lname=$_REQUEST['lname'];
				$pwd=$_REQUEST['pwd'];
				$birthdate=$_REQUEST['birthdate'];
				$gender=$_REQUEST['gender'];
				$sid=$_REQUEST['sid'];
				$cid=$_REQUEST['cid'];
				$pincode=$_REQUEST['pincode'];
				$mobile=$_REQUEST['mobile'];

				$where = array('fname' =>$fname , 'lname' =>$lname ,'pwd' =>$pwd ,'birthdate' =>$birthdate ,'gender' =>$gender ,'sid' =>$sid ,'cid' =>$cid ,'pincode' =>$pincode ,'mobile' =>$mobile);
				$res=$this->insert('customer',$where);
				if($res)
				{
					echo"<script>
						alert('registration Success');
						window.location='login';
					</script>";
				}
			}
			include_once('registration.php');
			break;


			case'/login':
			if(isset($_REQUEST['login']))
			{
				$fname=$_REQUEST['fname'];
				$pwd=$_REQUEST['pwd'];

					$where = array('fname' =>$fname,'pwd' =>$pwd);
					$res=$this->select_where('customer',$where);
					$chk=$res->num_rows;
					if($chk==1)
					{
						$fetch=$res->fetch_object();
						$status=$fetch->status;
						$cust_id=$fetch->cust_id;
						if($status=="active")
						{
							$_SESSION['fname']=$fname;
							$_SESSION['cust_id']=$cust_id;
							echo"<script>
							alert('login Success');
							window.location='myaccount';
							</script>";
						}
						else
						{
							echo"<script>
							alert('sorry You are not an Active user');
							window.location='login';
							</script>";
						}
						
					}
					else
					{
						echo"<script>
							alert('login failed due to user name and password not match');
							window.location='login';
							</script>";
					}
			}
			include_once('login.php');
			break;

			case '/logout':
			session_destroy();
			echo"<script>
							alert('logout Success');
							window.location='login';
							</script>";
			break;

			case '/myaccount':
			$cust_id=$_SESSION['cust_id'];
			$where = array('cust_id' =>$cust_id);
			$res=$this->select_join_where_data('customer','state','customer.sid=state.sid','city','customer.cid=city.cid',$where);
			$fetch=$res->fetch_object();
			include_once('myaccount.php');
			break;


			case '/Delete':
			if(isset($_REQUEST['delete_id']))
			{
				$cust_id=$_REQUEST['delete_id'];
				$where = array('cust_id'=>$cust_id);
				$res=$this->delete('customer',$where);
				if($res)
				{
					echo"<script>
						alert('Delete Success');
						window.location='myaccount';
					</script>";
				}
			}

			if(isset($_REQUEST['delete_cate_id']))
			{
				$cate_id=$_REQUEST['delete_cate_id'];
				$where = array('cate_id'=>$cate_id);
				$res=$this->delete('category',$where);
				if($res)
				{
					echo"<script>
						alert('Delete Success');
						window.location='manage_category';
					</script>";
				}
			}

			if(isset($_REQUEST['delete_subcate_id']))
			{
				$subcate_id=$_REQUEST['delete_subcate_id'];
				$where = array('subcate_id'=>$subcate_id);
				$res=$this->delete('sub_category',$where);
				if($res)
				{
					echo"<script>
						alert('Delete Success');
						window.location='manage_sub_category';
					</script>";
				}
			}

			if(isset($_REQUEST['delete_pro_id']))
			{
				$pro_id=$_REQUEST['delete_pro_id'];
				$where = array('pro_id'=>$pro_id);
				$res=$this->delete('product',$where);
				if($res)
				{
					echo"<script>
						alert('Delete Success');
						window.location='manage_product';
					</script>";
				}
			}

			break;

			case '/edit':
			$state_arr=$this->select('state');
			$city_arr=$this->select('city');
			if(isset($_REQUEST['edit_id']))
			{
				$cust_id=$_REQUEST['edit_id'];
				$where = array('cust_id'=>$cust_id);
				$res=$this->select_where('customer',$where);
				$fetch=$res->fetch_object();

				if(isset($_REQUEST['update']))
				{
				$fname=$_REQUEST['fname'];
				$lname=$_REQUEST['lname'];
				$birthdate=$_REQUEST['birthdate'];
				$gender=$_REQUEST['gender'];
				$sid=$_REQUEST['sid'];
				$cid=$_REQUEST['cid'];
				$pincode=$_REQUEST['pincode'];
				$mobile=$_REQUEST['mobile'];

				$data = array('fname' =>$fname , 'lname' =>$lname ,'birthdate' =>$birthdate ,'gender' =>$gender ,'sid' =>$sid ,'cid' =>$cid ,'pincode' =>$pincode ,'mobile' =>$mobile);
				$res=$this->update('customer',$data,$where);
				if($res)
				{
					echo"<script>
						alert('Update Success');
						window.location='myaccount';
					</script>";
				}
				}
			}
			include_once('edit.php');
			break;

			case '/category':
			if(isset($_REQUEST['add_category']))
			{
				$cate_name=$_REQUEST['cate_name'];
				

				$where = array('cate_name' =>$cate_name);
				$res=$this->insert('category',$where);
				if($res)
				{
					echo"<script>
						alert('Add Category Success');
						window.location='manage_category';
					</script>";
				}
			}
			include_once('category.php');
			break;

			case '/manage_category':
			$fetch_arr=$this->select('category');
			include_once('manage_category.php');
			break;


			case '/subcategory':
			$cate_arr=$this->select('category');
			if(isset($_REQUEST['add_sub_category']))
			{
				$cate_id=$_REQUEST['cate_id'];
				$subcate_name=$_REQUEST['subcate_name'];

				$where = array('cate_id' =>$cate_id,'subcate_name' =>$subcate_name);
				$res=$this->insert('sub_category',$where);
				if($res)
				{
					echo"<script>
						alert('Add Category Success');
						window.location='manage_sub_category';
					</script>";
				}
			}
			include_once('subcategory.php');
			break;

			case '/manage_sub_category':

			$fetch_arr=$this->select_join('sub_category','category','sub_category.cate_id=category.cate_id');
			include_once('manage_sub_category.php');
			break;


			case '/product':
			$cate_arr=$this->select('category');
			$subcate_arr=$this->select('sub_category');
			if(isset($_REQUEST['add_product']))
			{
				$cate_id=$_REQUEST['cate_id'];
				$subcate_id=$_REQUEST['subcate_id'];
				$pro_name=$_REQUEST['pro_name'];
				$pro_price=$_REQUEST['pro_price'];
				$image=$_FILES['image']['name'];
				$path='upload/'.$image;
				$tmp_image=$_FILES['image']['tmp_name'];
				move_uploaded_file($tmp_image, $path);

				$where = array('cate_id'=>$cate_id,'subcate_id'=>$subcate_id,'pro_name'=>$pro_name,
					'pro_price'=>$pro_price,'image' =>$image);

				$res=$this->insert('product',$where);
				if($res)
				{
					echo"<script>
						alert('Add product Success');
						window.location='manage_product';
					</script>";
				}
			}
			include_once('product.php');
			break;

			case '/manage_product':

			$fetch_arr=$this->select_join3('product','sub_category','product.subcate_id=sub_category.subcate_id','category','product.cate_id=category.cate_id');
			include_once('manage_product.php');
			break;



		}
	}
}
$obj=new control;
?>