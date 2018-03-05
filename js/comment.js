$(function() {
			
    $('#send').click(function(){
			
			var date = new Date();
			formattedDate = [
				date.getFullYear(),
				('0' + (date.getMonth() + 1)).slice(-2),
				('0' + date.getDate()).slice(-2)
			].join('-');
			
			if($('#textarea').val()==''||$('#name').val()==''){
				$('.commentError').empty();
				$('.commentError').append('<p>Please write name and comment</p>');
			}else{
				$.ajax({
        type: "POST",
        url: "send.php",
				dataType: "json",
        data: {
					comment : $('#textarea').val(),
					name: $('#name').val()
				},
      }).done(function(data) {
      	$('.comments').append('<p class="comment-content">'+data.comment+'</p><p class="comment-name">'+data.name+'<span class="comment-date">('+formattedDate+')</span></p>');
				$('#textarea').val('');
				$('#name').val('');
      }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
       
        alert('Error : ' + errorThrown);
      });
			}
			
      
			
    });

  });