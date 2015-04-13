<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/jquery.min.js"></script>
<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/bootstrap.min.js"></script>
<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/jquery.easing.min.js"></script> 
<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/jquery.scrollTo.js"></script>
<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/wow.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="https://s3.amazonaws.com/teachtogether.co/assets/js/custom.js"></script>

<script>

    $('#studentSignUpModal').on('show.bs.modal', function () {
        $('.modal .modal-body').css('overflow-y', 'auto'); 
        $('.modal .modal-body').css('height', $(window).height() * 0.7);
    });

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
                    window.location.href = '/home';
                },
                error: function(x,status,error) 
                {
                    if( x.status == 403 )
                        window.location.href = '/login';
                }
        });

    });

    $("#student_signup").click(function(){

        $('#signup_errors').empty();
        $("#signup_alert").addClass('hidden');
    
        var parentFullName = $("#parent_fullname").val();
        var studentFullName = $("#student_fullname").val();
        var email = $("#sigmupModal #email").val();
        var code = $("#student_code").val();
        var relation = $("#relationship").val();

        var dataString = 'parent_fullname='+parentFullName+
                         '&student_fullname='+studentFullName+
                         '&email='+email+
                         '&student_code='+code+
                         '&relationship='+relation;
        $.ajax({
                url: "parent",
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
                        
                        if(errors)
                        {
                            $.each(errors, function(key, value)
                            {
                                $('#signup_errors').append('<li>'+value+'</li>');
                            });

                            $("#signup_alert").removeClass('hidden');
                        }
                    }
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
