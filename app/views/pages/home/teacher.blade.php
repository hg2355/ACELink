<section id="service" class="home-section text-center">
<!--
 <div class="col-md-6 col-md-offset-4 btn-group text-center" role="group"  aria-label="...">
    <a class="btn-navbar btn active btn-default" role="button" href="">
          <img src="https://s3.amazonaws.com/teachtogether.co/assets/img/service-icon-3.png"  class="img-circle" alt="" /><br>
    Class</a>

        <a class="btn-navbar btn btn-default" role="button" href="#" class="btn dropdown-toggle" data-toggle="dropdown">
        <img src="https://s3.amazonaws.com/teachtogether.co/assets/img/service-icon-5.png" class="img-circle"  alt="" /><br>
    Activities <span class="caret"></span></a>

            <ul class="dropdown-menu" role="menu">
                <li><a href="" >Math</a>
                </li><br>
                <li><a href="" >Literacy</a>
                </li><br>
                <li><a href="" >Character</a>
                </li>
            </ul>
        
        <a class="btn-navbar btn  btn-default" role="button" href="">
          <img src="https://s3.amazonaws.com/teachtogether.co/assets/img/service-icon-1.png" class="img-circle"  alt="" /><br>
    Reports</a>

        <a class="btn-navbar btn btn-default" role="button" href="">
          <img src="https://s3.amazonaws.com/teachtogether.co/assets/img/service-icon-4.png" class="img-circle"  alt="" /><br>
    Messages</a>

        <br> 
</div>
-->

    <div class="container">

 <div class="row col-lg-8 col-lg-offset-2" >
 <button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#codes">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>&nbsp;
  How do I register parents?</button></div>
             
   <div class="row col-lg-6 col-lg-offset-3 bg-info collapse" id="codes">
                   
<p class="col-lg-6 col-lg-offset-3 bg-info"><br>
<b><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>&nbsp;</b>To register parents, send a note home that gives them the registration info. 
You can automatically print
parent notes using the button below.<br><br>

<button type="button" class="btn btn-info" data-toggle="modal" data-target="#StudentCodes">
    <span class="glyphicon glyphicon-print" aria-hidden="true"></span> &nbsp; Print Parent Notes</button></p>
   
  </div>
  
<div class="row">
      <Br><br><br>
    </div>
<div class="row">
       <h3>Active Students&nbsp;
        <span class="glyphicon glyphicon-info-sign" data-toggle="modal" data-target="#parentsignup" 
        aria-hidden="true"></span></h3>
        
      </div>
<div class="row">

<div class="col-lg-8 col-lg-offset-2">
   
<div class="container-fluid" id="dispData">
     <table class="table table-bordered sttable table-striped">
        
        <col width="25%">
        <col width="60%">
        <col width="15%">
                <thead>
                <tr>
            <th style="vertical-align:bottom">Student Name</th>
            <th style="vertical-align:bottom">Parent Info</th>
            <th style="vertical-align:bottom">Time Spent</th>
        </tr></thead>
        <tbody >
                <?php $students = $user->students()->get() ?>              
                @foreach($students as $student)
                <tr>
          
                    <td style="text-align:left; vertical-align:middle"> 
                      {{ $student->fullname }} </td>
                    <?php $relationship = $student->partners()->first()->relationship ?>
                    <td style="text-align:left; vertical-align:middle"> 
                      {{ $student->fullname }}'s {{ $relationship }} has signed up successfully.</td>
                      <td style="text-align:left; vertical-align:middle"> 
                      <!--

                      Insert code here to get time spent per parent over their entire lifetime on the website.
                      Later on we may need to change this to the "past week" or "past month" etc.

                    -->

                  </td> 
                @endforeach
                
        </tbody>
    </table>

    
</div>
    </div>
  </div>
  
 <!--
  <div class="row">
      <div class="col-lg-2 col-lg-offset-5">
        <hr class="marginbot-50">
      </div>
    </div>
  <div class="row">
        <h3>Inactive Students</h3>
        
      </div>

      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
   
<div class="container-fluid" id="dispData">
    <table class="table table-bordered sttable table-striped">
        <col width="30%">
        
        <col width="35%">
        <col width="35%"
                <thead>
                <tr>
            <th></th>
            
            <th style="text-align:left; vertical-align:middle">Student Name</th>
            <th style="text-align:left; vertical-align:middle">Options</th>
        </tr></thead>
        <tbody>
            <tr>
              <td>
                <button type="button" class="btn btn-info " data-toggle="modal" data-target="#EditStudent">
    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> &nbsp; </button>
    <button type="button" class="btn btn-danger" disabled="disabled">
    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> &nbsp; </button></td>
                <td style="text-align:left; vertical-align:middle">Example line</td>
                <td style="text-align:left; vertical-align:middle">
                  <button type="button" class="btn btn-danger">Delete student</button>
                    </td>
            </tr>
        </tbody>
    </table>
</div>

    

    </div>
  </div>
</div>
-->
</section>



<div class="modal fade" id="StudentCodes" tabindex="-1" role="dialog" aria-labelledby="NotesModalLabel" aria-hidden="true">
   <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h2 class="modal-title" id="signupModalLabel">Student Codes
      <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button></h2></div>
      <div class="modal-body">
        <table class="table table-hover table-striped">
          <tr><td>
          <p>
            <?php 
                    echo 'How many students do you have?&nbsp;&nbsp;<input id="student_count" value="1" type="number" min="1" step"1">
                            <br>
                            <p>The note to parents will include information to register (website URL and special codes) 
                            with the following message to parents.
                            <div id="message">
                            <hr><div class="row"><br><br></div>
                            Dear Parent,<br><br>
                            I\'m using a new service called Teach Together to help me connect with my students\' parents. 
                            To register for the service, use your smartphone or computer and visit this website and 
                            click the \'Parents\' tab.</p>
                            <br><br>
                            <b>Website:</b> teachtogether.co <br>
                            
                            </div>'; 
            ?>
          </p></td></tr></table>
      </div>
      <div class="modal-footer">
        <span type="button" class="btn btn-default" data-dismiss="modal">Cancel</span>
        <span id="print_codes" type="button" class="btn btn-success" >Print Codes</span>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="parentsignup" tabindex="-1" role="dialog" aria-labelledby="NotesModalLabel" aria-hidden="true">
   <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

      </div>
      <div class="modal-body">
       <p class="booktext">When parents have registered, their information shows up in the active students list. If parents do not register,
    please follow up with email, phone call or text to support them with the sign-up process.</p>
      </div>
      <div class="modal-footer">
        <span type="button" class="btn btn-default" data-dismiss="modal">Got It</span>
      </div>
    </div>
  </div>
</div>
