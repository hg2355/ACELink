<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/jquery.min.js"></script>
<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/bootstrap.min.js"></script>
<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/jquery.easing.min.js"></script> 
<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/jquery.scrollTo.js"></script>
<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/wow.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/custom.js"></script>

<script>
    $("#create").click(function(){
        
        var errorText = $("#error_text").empty();
        
        var firstName = $("#first_name").val();
        var lastName = $("#last_name").val();
        var email = $("#email").val();
        var grade = $("#grade").val();
        var zipcode = $("#zipcode").val();
        var school = $("#school").val();
        var title = $("#title").val();

        var dataString = 'first_name='+firstName+
                         '&last_name='+lastName+
                         '&email='+email+
                         '&grade='+grade+
                         '&zipcode='+zipcode+
                         '&school='+school+
                         '&title='+title;
        $.ajax({
                url: "teacher",
                type: "post",
                data: dataString,
                dataType: "json",
                processData: false,
                success: function(data)
                {   
                    var success = data.success;

                    if( success == 1)
                    {
                        $('#signupModal').modal('hide');
                        $('#signupSuccessModal').modal('show');
                    }

                    else
                    {
                        var errors = data.errors;
                        var msg = '';

                        $.each(errors, function(key, value)
                        {
                            msg = msg.concat(value).concat("<br>");
                        });

                        errorText.html(msg);
                        $(".text-danger").removeClass('hidden');
                    }
                },
                error: function(data) 
                {
                    alert('Oops something went went on the server. Contact the admin.');
                }
        });
    });
</script>
