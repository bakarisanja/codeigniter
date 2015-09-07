/**
 *acepts username nad token, geting pass from prompt,and pass this values to actiondelete, resiving from it json, and alerts propper answer
 *(error mesage or deleted username) 
  */
$(document).ready(function() {
	function deleteForm(event)
	{
		var dataArray = $(this).serializeArray();
		
		bootbox.prompt('Enter your password', function(res){

			if (res == null || res == '') {
                bootbox.alert("You need to enter password!");
            } else {
                dataArray.push({name: 'password', value: res});
                $.ajax({
                    url: 'actiondelete',
                    dataType: 'json',
                    type: 'post',
                    contentType: 'application/x-www-form-urlencoded',
                    data: $.param(dataArray),
                    success: function(data)
                    {
                        if (data.error_message){
                            bootbox.alert(data.error_message);
                        } else {
                            bootbox.alert('success remove of user: '+data.username, function() {
                                window.location.reload();
                            });
                        }  
                    },
                    error: function (jqXhr, textStatus, errorThrown)
                    {
                        bootbox.alert(errorThrown);
                    }
                });
            }

		});
		event.preventDefault();
	}

	$('.delete').submit(deleteForm);
});