<!-- Section: main -->

<section id="service" class="home-section text-center">
    <div class="container">
    <div class="heading-about">
      <div class="wow bounceInDown" data-wow-delay="0.4s">
        <div class="container">
  
        <div class="row">
        <h2>Login below or <span class="btn btn-skin" data-toggle="modal" data-target="#signupModal">Signup for free</span></h2>
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
              <div class="panel panel-success">
                <div class="panel-heading unselectable"  onclick="javascript:ShowTab(this);">
                  <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#teacherLogin">Teacher Login</a></h4>
                </div>
                <div id="teacherLogin" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <div class="row">
                      <form id="contact-form">
                        
                        <table class="frmTable" style="text-align:center;width:100%">
                          <tr class="text-danger text-center hidden">
                            <td id="errorText" style="text-align:center"><br><Br></td></tr></table>


                        <div class="form-group">
                        <div class="col-md-2 col-md-offset-2">

                              <label for="email">Email: </label>
                            </div>
                            <div class="col-md-4 col-md-offset-1">
                              <input type="email" class="form-control" id="email" required="required" />
                      </div>
                    </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="form-group">
                      <div class="col-md-2 col-md-offset-2">
                              <label for="name">Password:</label>
                              </div>
                              <div class="col-md-4 col-md-offset-1"> 
                                <input type="password" class="form-control" id="password" />
                      </div></div>
                    </div>
<div class="row">&nbsp;</div>
                      <div class="row">
                        

          <span class="btn btn-default" data-toggle="modal" data-target="#forgotPasswordModal">Forgot Password</span>
          <span type="submit" id="login" class="btn btn-skin" >Log in</span>
                      </form>
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

        <h2 class="modal-title" id="signupModalLabel">Welcome Teacher
      <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button></h2></div>
      <div class="modal-body">
        
        <div id="signup_alert" class="alert alert-danger hidden" role="alert">
            <ul id="signup_errors">
            </ul>
        </div>
        <form>
            <div class="form-group">
                <label>Title</label>
                <?php $titles = [''=>'Select a title','Mr'=>'Mr','Ms'=>'Ms','Mrs'=>'Mrs']; ?>
                <?php echo Form::select('title',$titles, null, ['class'=>'form-control','id'=>'title']); ?>
            </div>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" id="first_name">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" id="last_name">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label>Grade You are Teaching</label>
                <?php $grades = [''=>'Select a grade','K'=>'Kindergarten','1'=>'First']; ?>
                <?php echo Form::select('grade', $grades, null, ['class'=>'form-control','id'=>'grade']); ?>
                <br>
                *Teach Together currrently has content for Kindergarten and 1st grade students. More content will
                be added later.

            </div>
            <div class="form-group">
                <label>Zipcode</label>
                <input type="text" class="form-control" maxLength=5 id="zipcode">
            </div>
            <div class="form-group">
                <label>School name</label>
                <input type="text" class="form-control" id="school">
            </div>
        </form>
      <div class="modal-footer">
        <span type="button" class="btn btn-default" data-dismiss="modal">Cancel</span>
        <span id="teacher_signup" type="button" class="btn btn-success" >Create Account</span>
      </div>
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
        <h2 class="modal-title" id="signupSuccessModalLabel">Signup successful. Login credentials were sent to your email address.
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
                 <input type="hidden" id="forgotType" value="1" />
            </tr>
        </table>
      </div>
      <div class="modal-footer">
        <span type="button" class="btn btn-default" data-dismiss="modal">Cancel</span>
        <span type="button" id="reset_password" class="btn btn-primary">Reset Password</span>
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
        <h2 class="modal-title" id="signupSuccessModalLabel">A new password was sent to your email to login with.</h2>
      </div>
      <div class="modal-footer">
          <span type="button" class="btn btn-success" data-dismiss="modal">OK</span>
      </div>
    </div>
  </div>
</div>


<!-- /wrapper -->
