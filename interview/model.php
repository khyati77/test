<?php

class model
{
	
	public $conn="";
	function __construct()
	{
		$this->conn=new mysqli('localhost','root','','khyati');
	}
	
	
	function select($tbl)
	{
		$sel="select * from $tbl";   //  query
		$run=$this->conn->query($sel);  // run
		while($fetch=$run->fetch_object())  // after run fetch data from Database
		{
			$arr[]=$fetch;
		}
		if(!empty($arr))
		{
			return $arr;
		}
	}
	
	function select_join($tbl1,$tbl2,$on)
	{
		$sel="select * from $tbl1 join $tbl2 on $on";   //  query
		$run=$this->conn->query($sel);  // run
		while($fetch=$run->fetch_object())  // after run fetch data from Database
		{
			$arr[]=$fetch;
		}
		if(!empty($arr))
		{
			return $arr;
		}
		
	}
	
	function select_join3($tbl1,$tbl2,$on1,$tbl3,$on2)
	{
		$sel="select * from $tbl1 join $tbl2 on $on1 join $tbl3 on $on2";   //  query
		$run=$this->conn->query($sel);  // run
		while($fetch=$run->fetch_object())  // after run fetch data from Database
		{
			$arr[]=$fetch;
		}
		if(!empty($arr))
		{
			return $arr;
		}
		
	}
	//SELECT * FROM Customers WHERE CustomerName LIKE 'a%';
	function select_like($tbl,$col,$value)
	{
		$sel="select * from $tbl where $col like '$value%'";   //  query
		$run=$this->conn->query($sel);  // run
		while($fetch=$run->fetch_object())  // after run fetch data from Database
		{
			$arr[]=$fetch;
		}
		if(!empty($arr))
		{
			return $arr;
		}
		
	}
	
	
	
	function insert($tbl,$arr)
	{
		
		$arr_col=array_keys($arr);
		$col=implode(",",$arr_col); 
		
		$arr_values=array_values($arr);
		$values=implode("','",$arr_values);  
		echo $ins="insert into $tbl ($col) values ('$values')";   //  query
		$run=$this->conn->query($ins);  // run
		return $run;
	}
	
	
	// login / fetch data 
	function select_where($tbl,$where)
	{
		$sel="select * from $tbl where 1=1"; //1=1 quey continue
		$arr_col=array_keys($where);
		$arr_values=array_values($where);
		$i=0;
		foreach($where as $w)
		{
			$sel.=" and $arr_col[$i]='$arr_values[$i]'";
			$i++;
		}
		$run=$this->conn->query($sel);
		return $run;
	}
	
	// fetch join data with where
	function select_join_where($tbl1,$tbl2,$on,$where)
	{
		$sel="select * from $tbl1 join $tbl2 on $on"; 
		$arr_col=array_keys($where);
		$arr_values=array_values($where);
		$i=0;
		foreach($where as $w)
		{
			$sel.=" and $arr_col[$i]='$arr_values[$i]'";
			$i++;
		}
		$run=$this->conn->query($sel);
		return $run;
	}
	
	function select_join_where_data($tbl1,$tbl2,$on1,$tbl3,$on2,$where)
	{
		$sel="select * from $tbl1 join $tbl2 on $on1 join $tbl3 on $on2"; 
		$arr_col=array_keys($where);
		$arr_values=array_values($where);
		$i=0;
		foreach($where as $w)
		{
			$sel.=" and $arr_col[$i]='$arr_values[$i]'";
			$i++;
		}
		$run=$this->conn->query($sel);
		return $run;
	}
	
	
	function update($tbl,$data,$where)
	{
		$upd="update $tbl set ";
		$arr_col=array_keys($data);
		$arr_values=array_values($data);
		$j=0;
		
		$count=count($data); // count total value of $data arr
		foreach($data as $w)
		{
			if($count==$j+1)
			{	
				$upd.=" $arr_col[$j]='$arr_values[$j]'";	
			}
			else
			{
				$upd.=" $arr_col[$j]='$arr_values[$j]',";
				$j++;
			}
		}
		
		$upd.=" where 1=1"; //1=1 quey continue
		$warr_col=array_keys($where);
		$warr_values=array_values($where);
		$i=0;
		foreach($where as $w)
		{
		    $upd.=" and $warr_col[$i]='$warr_values[$i]'";
			$i++;
		}
		$run=$this->conn->query($upd);
		return $run;	
	}

	function delete($tbl,$where)
	{
		$del="delete from $tbl where 1=1"; //1=1 quey continue
		$arr_col=array_keys($where);
		$arr_values=array_values($where);
		$i=0;
		foreach($where as $w)
		{
			$del.=" and $arr_col[$i]='$arr_values[$i]'";
			$i++;
		}
		$run=$this->conn->query($del);
		return $run;
	}
		
}

$obj=new model;


?>