<?php 
class AjaxSearch{
	static public $mysqli;
	function AjaxSearch(){
		AjaxSearch::$mysqli=new mysqli('localhost','root','root','90zufang');
		AjaxSearch::$mysqli->query("SET NAMES utf8");
	}

	function searchSchool(){
		$input = $_POST['input'];
		$sql = "select id,name from school where name like '%$input%'";
		$result = AjaxSearch::select($sql);
		echo json_encode($result);
	}

	function searchCity(){
		$input = $_POST['input'];
		$sql = "select id,name from city where name like '%$input%' and parent=0";
		$result = AjaxSearch::select($sql);
		echo json_encode($result);
	}
	function searchRegion(){
		$input = $_POST['input'];
		$sql = "select id,name from city where parent='$input'";
		$result = AjaxSearch::select($sql);
		echo json_encode($result);
	}
	function searchFavor(){
		$sql = "select id,name from favor where parent=0";
		$result = AjaxSearch::select($sql);
		echo json_encode($result);
	}
	function searchFavor2(){
		$input = $_POST['input'];
		$sql = "select id,name from favor where parent='$input'";
		$result = AjaxSearch::select($sql);
		echo json_encode($result);
	}

	static function select($sql){
		$result=AjaxSearch::$mysqli->query($sql);
		$arr = array();
		if ($result){
		    if($result->num_rows>0){
		    	$i = 0;
		        while($row = $result->fetch_assoc() ){
		            $arr[$i++] = $row;
		        }
		        return $arr;
		    }else{
		    	return 0;
		    }
		}else{
		    return 0;
		}
	}

	function checkName(){
		$input = $_POST['input'];
		$sql = "select * from favor where username='$input'";
		$result = AjaxSearch::select($sql);
		if($result){
			echo 0;
		}else{
			echo 1;
		}
	}
}
header("Content-type: text/html; charset=utf-8"); 
$opt = $_GET['opt'];
$ajaxSearch = new AjaxSearch();
if($opt == 1){
	$ajaxSearch->searchSchool();
}else if($opt == 2){
	$ajaxSearch->searchCity();
}else if($opt == 3){
	$ajaxSearch->searchRegion();
}else if($opt == 4){
	$ajaxSearch->searchFavor();
}else if($opt == 5){
	$ajaxSearch->searchFavor2();
}else if($opt == 6){
	$ajaxSearch->checkName();
}