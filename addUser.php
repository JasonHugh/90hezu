<?php
header('Content-type:text/html;charset=utf-8');
include('DB.class.php');
$name = $_POST['username'];
$sex = $_POST['sex'];
$school = $_POST['school_id'];
$city = $_POST['city_id'];
$favor = $_POST['favor_id'];
$is_sex = $_POST['is_sex'];
$is_school = $_POST['is_school'];
$is_favor = $_POST['is_favor'];

DB::connect();
$sql = "insert into user(username,sex,school,city,favor,is_sex,is_school,is_favor) values('$name','$sex','$school','$city','$favor','$is_sex','$is_school','$is_favor')";
$result = DB::insert($sql);
$uid = $result;
if($result){
	//匹配用户
	if($is_sex && $is_school && $is_favor){
		$sql = "select * from user where city='$city' and sex='$sex' and school='$school' and favor='$favor'";
	}else{
		$sql = "select * from user where city='$city' and school='$school'";
	}
	$sql += " and username!='$name' and match_num=0";
	$result = DB::select($sql);
	if($result){
		var_dump($result[0]);
		//插入匹配记录
		$sql = "insert into match(uid1,uid2) values('$uid','$result[0]')";
	}else{
		echo '目前没有符合要求的用户';
	}
}
