<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>90合租-寻找兴趣相投的合租校友</title>
	<link href="//cdn.bootcss.com/ratchet/2.0.2/css/ratchet.min.css" rel="stylesheet">
	<script src="//cdn.bootcss.com/ratchet/2.0.2/js/ratchet.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<header class='bar bar-nav header'><h1 class="title">校友合租</h1></header>
	<div class='content'>
		<i class='focus'>*填写你的资料，匹配到最适合你的合租伙伴</i>
		<form class="input-group" action='addUser.php' method="post">
		  <i class='focus'>*用户名</i>
		  <div class="input-row">
		    <label>姓名</label>
		    <input type="text" name='username' placeholder="请输入你的姓名">
		  </div>
		  <div class="input-row">
		    <label>性别</label>
		    <select name='sex' class='select'>
			  <option value='1'>男</option>
			  <option value='0'>女</option>
			</select>
		  </div>
		  <div class="input-row">
		    <label>学校</label>
		    <input type="text" name='school' placeholder="输入毕业大学搜索">
		    <input type="hidden" name='school_id'>
		    <a href='#'><span id='school_search' class="icon icon-search"></span></a>
		  </div>
		  <div class="input-row">
		    <label>城市</label>
		    <input type="text" name='city' placeholder="输入租房城市搜索">
		    <input type="hidden" name='city_id'>
		    <a href='#'><span id='city_search' class="icon icon-search"></span></a>
		  </div>
		  <div class="input-row">
		    <label>行业</label>
		    <input type="text" name='favor' placeholder="添加你从事的行业" readonly>
		    <input type="hidden" name='favor_id'>
		    <a href='#'><span id='favor_search' class="icon icon-plus"></span></a>
		  </div>
		  <i class='focus'>*以下选择你期望合租伙伴信息</i>
		  <ul class="table-view">
		      <li class="table-view-cell">
			    必须相同性别
			    <div class="toggle active">
			      <div class="toggle-handle"></div>
			    </div>
		        <input type="hidden" name='is_sex'>
			  </li>
			  <li class="table-view-cell">
			    必须相同学校
			    <div class="toggle active">
			      <div class="toggle-handle"></div>
			    </div>
		        <input type="hidden" name='is_school'>
			  </li>
			  <li class="table-view-cell">
			    必须相同行业
			    <div class="toggle">
			      <div class="toggle-handle"></div>
			    </div>
		        <input type="hidden" name='is_favor'>
			  </li>
			  <li class="table-view-cell" style="height:50px">
			    <button class="btn btn-positive btn-block" onclick="addSubmit()">开始寻找</button>
			  </li>
		  </ul>
		</form>
	</div>

	<div id="schoolmodal" class="modal">
	  <header class="bar bar-nav">
	    <h1 class="title">学校</h1>
	  </header>
	  <div class="content">
	    <ul class="table-view">
		</ul>
	  </div>
	</div>
	<div id="citymodal" class="modal">
	  <header class="bar bar-nav">
	    <h1 class="title">城市</h1>
	  </header>
	  <div class="content">
	    <ul class="table-view">
		</ul>
	  </div>
	</div>
	<div id="regionmodal" class="modal">
	  <header class="bar bar-nav">
	    <h1 class="title">区域</h1>
	  </header>
	  <div class="content">
	    <ul class="table-view">
		</ul>
	  </div>
	</div>
	<div id="favormodal" class="modal">
	  <header class="bar bar-nav">
	    <h1 class="title">行业</h1>
	  </header>

	  <div class="content">
	    <ul class="table-view">
		</ul>
	  </div>
	</div>
	<div id="favormodal2" class="modal">
	  <header class="bar bar-nav">
	    <h1 class="title">行业</h1>
	  </header>

	  <div class="content">
	    <ul class="table-view">
		</ul>
	  </div>
	</div>
	<script type="text/javascript" src='http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js'></script>
	<script type="text/javascript" src='js/main.js'></script>
</body>
</html>