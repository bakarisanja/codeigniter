/**
 * ajax post request
 *  sending post request to action controller and reciving json success or error
 * @return json
 */
$(document).ready(function() {
    function processForm (event){
        $.ajax({
            url: 'actionCreate',
            dataType: 'json',
            type: 'post',
            contentType: 'application/x-www-form-urlencoded',
            data: $(this).serialize(),
            success: function (data)
            {
                if (data.error_message) {
                    $('#milos').html(data.error_message);
                }else{
                    $('#milos').html(data.username+' is created!');
                }
            },
            error: function (jqXhr, textStatus, errorThrown)
            {
                $('#milos').html(errorThrown);
            }
        });
        event.preventDefault();
    }

    $('#createForm').submit(processForm);
});