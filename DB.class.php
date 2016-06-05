<?php
	/*
 		* 作者：胡安延
		* time：2016-6-5
 		* 描述：数据库操作 类
 		* 更新：2016-6-5  
	*/
class DB{
	private static $mysqli="";
	private static $ip='localhost';
	private static $port=3306;
	private static $user='root';
	private static $passwd='root';
	private static $dbName='90zufang';

	//连接数据库
	static function connect($dbName='shuileme'){
		if(self::$mysqli==""){		
			self::$mysqli = new mysqli(Db::$ip.':'.Db::$port,Db::$user,DB::$passwd,self::$dbName);
			self::$mysqli->query("SET NAMES utf8");
		}
	}

	static function select($sql){
		$result=DB::$mysqli->query($sql);
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

	static function insert($sql){
		$result = DB::$mysqli -> query($sql);
		if($result){
			return self::$mysqli->insert_id;
		}else{
			return 0;
		}
	}

}