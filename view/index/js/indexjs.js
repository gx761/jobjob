$(function()
{	
	$('.dropdown-toggle').dropdown();
	
	$('#addJob').click(function(){
		var d = new Date();
		var strDate = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();
		var job={
			job_title:$('#job_title').val(),
			company:$('#company').val(),
			description:$('#description').val(),
			interest_rating:$('#interest_rating').val(),
			link:$('#link').val(),
			applying_date: strDate,
			job_type:($('#job_type').val()=="part")? "part":"full"
		
					};
					
		$.post('index/addJob/',job,function(o){  
			alert(o);
			 /** ajax adding new job to the list
			$('#indextable .th').after('<tr class="added" rel="'+o+'"><td>'+job.job_title+'</td>'+
									'<td>'+job.company+'</td>' +
									'<td>'+job.job_type+'</td>' +
									'<td>'+job.description+'</td>' +
									'<td>'+job.interest_rating+'</td>' +
									'<td>'+job.applying_date+'</td>' +
									'<td>'+'waiting'+'</td>' +
									'<td><a href="'+job.link+'">click here</a></td>' +
									
									'<td><div class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Action</a><ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">'+
    			'<li><a href="" rel='+o+'>Edit</a></li>'+
    			'<li><a href="" rel='+o+'>Delete</a></li></ul></div></td>'+							
									'</tr>');
			
			**/
	
		},'json');
		return false;

	});
	
	
	
	
	
	
	
	$('.pageButton').click(function(){
		
	var page = $(this).attr('rel');
	var id= $(this).attr('id');
	
	if(id=="pageNumber")
	{
	$('#prev').attr("rel",(parseInt(page)-1));
	$('#next').attr("rel",(parseInt(page)+1));
	$('.pageButton').css("background-color","white");
	$(this).css("background-color","#716F78");
	}
	
	else
	{
		$('.pageButton').css("background-color","white");
		$('#pageNumber[rel="'+page+'"]').css("background-color","#716F78");
		$('#prev').attr("rel",(parseInt(page)-1));
		$('#next').attr("rel",(parseInt(page)+1));
			
	}
	
	
	
	

	

	$.get('index/getJobList/'+page,function(o)
	{
		
	
		
		$('#indextable .added').empty();
	

		
		

		for(var i=0;i<5;i++)
		{
			
			
			$('#indextable').append('<tr class="added" rel="'+i+'"><td>'+o[i]['job_title']+'</td>'+
									'<td>'+o[i]['company']+'</td>' +
									'<td>'+o[i]['job_type']+'</td>' +
									'<td>'+o[i]['description']+'</td>' +
									'<td>'+o[i]['interest_rating']+'</td>' +
									'<td>'+o[i]['applying_date']+'</td>' +
									'<td>'+o[i]['status']+'</td>' +
									'<td><a href="'+o[i]['link']+'">click here</a></td>' +
									
									'<td><div class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Action</a><ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">'+
    			'<li><a href="index/getSingleJob/'+o[i]['jid']+'" class="edit" rel='+o[i]['jid']+'>Edit</a></li>'+
    			'<li><a href="" class="delete" rel='+o[i]['jid']+'>Delete</a></li></ul></div></td>'+							
									'</tr>');
		}
		
		

		
		
		
		
		
		
		

		
	},'json');
	return false;
							
											});
											
	$('.delete').live('click',function(){
			
				var delItem=$(this);			
				var id=$(this).attr('rel');
				var xx='.added[rel="'+id+'"]';
				$.post('index/deleteJob/',{jid:id},function(o){  
				delItem.parent().parent().parent().parent().parent().remove();  
				
					
	
				},'json');
				return false;
		
										});											
										

											
											
											
											
											
											
											
											
											
});
