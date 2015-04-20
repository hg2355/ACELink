<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/jquery.min.js"></script>
<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/bootstrap.min.js"></script>
<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/jquery.easing.min.js"></script> 
<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/jquery.scrollTo.js"></script>
<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/wow.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.fileDownload/1.4.2/jquery.fileDownload.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/custom.js"></script>
<script>

$("#print_codes").click(function()
{
        var count = $("#student_count").val();
        var teacherId = '<?php echo $user->id; ?>';
        var message = $("#message").html(); 

        var dataString = 'count='+count+
                         '&teacher_id='+teacherId+
                         '&message='+message;

        $.ajax({
                url: "/print-codes",
                type: "post",
                data: dataString,
                processData: false,
                success: function(data)
                {
                    var url = data.url;
                    $.fileDownload(url);
                },
                error: function(x,status,error) 
                {
                    if( x.status == 403 )
                        window.location.href = '/login';
                    else
                        alert('Oops something went wrong on the server. Contact the admin.');

                }
        });

});

function destroy(id,entity,name)
{
    var token = $(this).data('token');

    if ( confirm("Delete "+name+"?") )
    {
        $.ajax({
                type:"post",
                url: '/'+entity+'/'+id,
                data: {_method: 'delete',_token:token},
                success: function()
                {
                    window.location.href = '/home';
                },

                error: function()
                {
                    alert('Oops something went wrong on the server. Contact the admin.');
                }
                
            });
    }
}

</script>
