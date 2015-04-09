<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/jquery.min.js"></script>
<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/bootstrap.min.js"></script>
<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/jquery.easing.min.js"></script> 
<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/jquery.scrollTo.js"></script>
<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/wow.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/custom.js"></script>

<script>
    
    $("#reset_password").click(function()
    {
        $("#forgotPasswordModal #errorText").parent().addClass("hidden");

        var email = $("#forgotPasswordModal #email").val();

        if( !$.trim(email).length )
        {
            alert('Please fill in email');
            return;
        }
        
        var dataString = 'email='+email;

        $.ajax({
                url: "reset-password",
                type: "post",
                data: dataString,
                dataType: "json",
                processData: false,
                success: function(data)
                {   
                    var success = data.success;

                    if( success == 1)
                    {
                        $('#forgotPasswordModal').modal('hide');
                        $('#forgotPasswordSuccessModal').modal('show');
                    }

                    else
                    {
                        $("#forgotPasswordModal #errorText").html('Wrong email or email does not exist.');
                        $("#forgotPasswordModal #errorText").parent().removeClass('hidden');
                    }
                },
                error: function(data) 
                {
                    alert('Oops something went went on the server. Contact the admin.');
                }
        });

    });    

    $("#login").click(function()
    {
        var email = $("#email").val();
        var password = $("#password").val();
        
        if( !$.trim(email).length || !$.trim(password).length )
        {
            alert('Please fill in email and password');
            return;
        }

        var dataString = 'email='+email+
                         '&password='+password;
        
        $.ajax({
                url: "login",
                type: "post",
                data: dataString,
                dataType: "json",
                processData: false,
                success: function(data)
                {   
                    alert(data.msg);
                },
                error: function(data) 
                {
                    alert('Oops something went went on the server. Contact the admin.');
                }
        });

    });

    $("#create").click(function(){
        
        var errorText = $("#error_text").empty();
        
        var firstName = $("#first_name").val();
        var lastName = $("#last_name").val();
        var email = $("#signupModal #email").val();
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
                        
                        if(errors)
                        {
                            $.each(errors, function(key, value)
                            {
                                msg = msg.concat(value).concat("<br>");
                            });

                            errorText.html(msg);
                            $(".text-danger").removeClass('hidden');
                        }

                        else
                        {
                            msg = data.msg;
                            errorText.html(msg);
                            $(".text-danger").removeClass('hidden');
                        }
                    }
                },
                error: function(data) 
                {
                    alert('Oops something went went on the server. Contact the admin.');
                }
        });
    });
</script>
