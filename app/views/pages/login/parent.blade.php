<!-- Section: main -->
<section id="service" class="home-section text-center">
    <div class="container">
    <div class="heading-about">
      <div class="wow bounceInDown" data-wow-delay="0.4s">
        <div class="container">
  
        <div class="row">
        <h2>Login below or <span class="btn btn-skin" data-toggle="modal" data-target="#signupModal">Signup with code</span></h2>
        <i class="fa fa-2x fa-angle-down"></i>
      </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2 col-lg-offset-5">
        <hr class="marginbot-50">
      </div>
    </div>

    </div>
    <div class="row">
   

    <div class="col-md-6 col-md-offset-3">
    
        <!-- to calculate that do (12-6)/2. The 12 is total number of md columns, subtract by the number  and then divide by 2 -->          
            <div class="panel-group" id="accordion">
             
              <div class="panel panel-primary">
                  <div class="panel-heading unselectable" onclick="javascript:ShowTab(this);">
                  <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#parentLogin">Parent Login</a></h4>
                </div>
                   <div id="parentLogin" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-2 col-md-offset-2">
                              <label>Email: </label>
                            </div>
                            <div class="col-md-4 col-md-offset-1">
                              <input type="text" class="form-control" id="email">
                      </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-md-2 col-md-offset-2">
                              <label>Password:</label>
                              </div>
                              <div class="col-md-4 col-md-offset-1"> <input type="password" class="form-control" id="password">
                      </div>
                    </div>
<div class="row">&nbsp;</div>
                      <div class="row">
                        

          <span class="btn btn-default" data-toggle="modal" data-target="#forgotPasswordModal">Forgot Password</span><span id="login" class="btn btn-success fleft" >Log in</span>
                       </div>
                  </div>
                </div>
              </div>
            </div>
</div>



            <!-- /panel-group -->

</div></div>
  </section>
  
  <!-- /Section: services -->

    
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

      <h2 class="modal-title" id="signupModalLabel">Welcome Parent
      <button type="button" class="close" data-dismiss="modal">
      <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button></h2></div>
      <div class="modal-body" style="position: static">
        <div id="signup_alert" class="alert alert-danger hidden" role="alert">
            <ul id="signup_errors">
            </ul>
        </div>
        <form>
            <div class="form-group">
                <label>Parent email</label>
                <input type="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label>Parent Full Name</label>
                <input type="text" class="form-control" id="parent_fullname">
            </div>
            <div class="form-group">
                <label>Student Full Name</label>
                <input type="text" class="form-control" id="student_fullname">
            </div>
            <div class="form-group">
                <label>Student Code</label>
                <input type="text" maxlength="6" class="form-control" id="student_code">
            </div>
            <div class="form-group">
                <label>Parent relationship with student</label>
                {{ Form::select('relationship',FormList::relationships(),null,array('id'=>'relationship','class'=>'form-control')) }}
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <span type="button" class="btn btn-default" data-dismiss="modal">Cancel</span>
        <span id="student_signup" type="button" class="btn btn-success">Signup</span>
    </div>
    </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="signupSuccessModal" tabindex="-1" role="dialog" aria-labelledby="signupSuccessModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h2 class="modal-title" id="signupSuccessModalLabel">Registration</h2>
        </div>
        <div class="modal-body">
          <p class="booktext">Check your email for login details.</p>
      </div>
      <div class="modal-footer">
        <span type="button" class="btn btn-success" data-dismiss="modal">OK</span>
      </div>
    </div>
  </div>
</div>
    
<!-- Modal -->
<div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h2 class="modal-title" id="forgotPasswordModalLabel">Reset Password</h2>
      </div>
      <div class="modal-body">
        <table class="frmTable">
            <tr class="text-danger text-center hidden"><td colspan="2" id="errorText"></td></tr>
            <tr>
                <td>Your registered E-mail address:</td>
                <td><input type="text" id="email" class="form-control"></td>
            </tr>
        </table>
      </div>
      <div class="modal-footer">
        <span type="button" class="btn btn-default" data-dismiss="modal">Cancel</span>
        <span type="button" class="btn btn-primary">Reset Password</span>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="forgotPasswordSuccessModal" tabindex="-1" role="dialog" aria-labelledby="signupSuccessModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h2 class="modal-title" id="signupSuccessModalLabel">A link for password reset is sent to email.<br>Please activate your account through the link mentioned in mail.</h2>
      </div>
      <div class="modal-footer">
          <span type="button" class="btn btn-success" data-dismiss="modal">OK</span>
      </div>
    </div>
  </div>
</div>


