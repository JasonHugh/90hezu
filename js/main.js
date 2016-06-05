$(function(){
	$('#citymodal').find('a.navigate-right').click(function(){
		$('#citymodal').removeClass('active');
		$('#regionmodal').addClass('active');
	})
	$('#regionmodal').find('a.navigate-right').click(function(){
		$('input[name=city]').val($(this).text().trim());
		$('#regionmodal').removeClass('active');
	})
	$('#favormodal').find('a.navigate-right').click(function(){
		$('input[name=favor]').val($(this).text().trim());
		$('#favormodal').removeClass('active');
	})

	$('#school_search').click(function(){
		var input = $('input[name=school]').val().trim();
		if(input != ''){
			$('#schoolmodal').addClass('active');
			$.post('AjaxSearch.class.php?opt=1',{input:input},function(data){
				if(data != 0){
					$.each(data, function (i, row) {
		               $('#schoolmodal').find('ul').append('<li class="table-view-cell"><a onclick="selectSchool(this);" class="navigate-right" id='+row.id+'>'+row.name+'</a></li>')
		           });
				}
			},'json')
		}
	})
	$('#city_search').click(function(){
		var input = $('input[name=city]').val().trim();
		if(input != ''){
			$('#citymodal').addClass('active');
			$.post('AjaxSearch.class.php?opt=2',{input:input},function(data){
				if(data != 0){
					$.each(data, function (i, row) {
		               $('#citymodal').find('ul').append('<li class="table-view-cell"><a onclick="selectCity(this);" class="navigate-right" id='+row.id+'>'+row.name+'</a></li>')
		           });
				}
			},'json')
		}
	})
	$('#favor_search').click(function(){
		$('#favormodal').addClass('active');
		$.post('AjaxSearch.class.php?opt=4',{},function(data){
			if(data != 0){
				$.each(data, function (i, row) {
	               $('#favormodal').find('ul').append('<li class="table-view-cell"><a onclick="selectFavor(this);" class="navigate-right" id='+row.id+'>'+row.name+'</a></li>')
	           });
			}
		},'json')
	})

	
})

function selectSchool(obj){
	$('input[name=school]').val($(obj).text());
	$('input[name=school_id]').val($(obj).attr('id'))
	$('#schoolmodal').find('ul').html('');
	$('#schoolmodal').removeClass('active');
}

function selectCity(obj){
	$('#citymodal').find('ul').html('');
	$('#citymodal').removeClass('active');
	var input = $(obj).attr('id');
	if(input != ''){
		$('#regionmodal').addClass('active');
		$.post('AjaxSearch.class.php?opt=3',{input:input},function(data){
			if(data != 0){
				$.each(data, function (i, row) {
	               $('#regionmodal').find('ul').append('<li class="table-view-cell"><a onclick="selectRegion(this);" class="navigate-right" id='+row.id+'>'+row.name+'</a></li>')
	           });
			}
		},'json')
	}
}
function selectRegion(obj){
	$('input[name=city]').val($(obj).text());
	$('input[name=city_id]').val($(obj).attr('id'))
	$('#regionmodal').find('ul').html('');
	$('#regionmodal').removeClass('active');
}
function selectFavor(obj){
	$('#favormodal').find('ul').html('');
	$('#favormodal').removeClass('active');
	var input = $(obj).attr('id');
	if(input != ''){
		$('#favormodal2').addClass('active');
		$.post('AjaxSearch.class.php?opt=5',{input:input},function(data){
			if(data != 0){
				$.each(data, function (i, row) {
	               $('#favormodal2').find('ul').append('<li class="table-view-cell"><a onclick="selectFavor2(this);" class="navigate-right" id='+row.id+'>'+row.name+'</a></li>')
	           });
			}
		},'json')
	}
}
function selectFavor2(obj){
	$('input[name=favor]').val($(obj).text());
	$('input[name=favor_id]').val($(obj).attr('id'))
	$('#favormodal2').find('ul').html('');
	$('#favormodal2').removeClass('active');
}
function addSubmit(){
	var select = $('input[name=is_sex]')
	selectInputHidden(select)
	var select = $('input[name=is_school]')
	selectInputHidden(select)
	var select = $('input[name=is_favor]')
	selectInputHidden(select)
	$('form').submit()
}

function selectInputHidden(select){
	if(select.prev('div').hasClass('active')){
		select.val(1)
	}else{
		select.val(0)
	}
}