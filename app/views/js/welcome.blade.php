<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/jquery.min.js"></script>
<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/bootstrap.min.js"></script>
<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/jquery.easing.min.js"></script> 
<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/jquery.scrollTo.js"></script>
<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/wow.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/custom.js"></script>
<script>

$("#invite_submit").click(function()
{
    var email = $("#invite_email").val();
    var dataString = 'email='+email;

    $.ajax({
                url: "/invite",
                type: "post",
                data: dataString,
                processData: false,
                success: function(data)
                {
                    window.location.href = "/";
                },
                error: function(x,status,error) 
                {
                    alert('Oops something went wrong on the server. Contact the admin.');
                }
        });

});

</script>
