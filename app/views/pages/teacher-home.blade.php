<section id="service" class="home-section text-center">

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


    <div class="container">
    <div class="heading-about">
       
   

    <div class="row">
     
    </div>
    </div>
 <br><br>
   <div class="row col-lg-8 col-lg-offset-2 bg-info">
                   
<p class="col-lg-6 col-lg-offset-3 bg-info"><br>
<b><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>&nbsp;</b>To register students, send parents a note home that gives them the registration info. You can automatically print
parent notes using the button below.<br><br>

<button type="button" class="btn btn-info" data-toggle="modal" data-target="#StudentCodes">
    <span class="glyphicon glyphicon-print" aria-hidden="true"></span> &nbsp; Print Parent Notes</button></p>
   
  </div>
<div class="row">
      <div class="col-lg-2 col-lg-offset-5">
        <hr class="marginbot-50">
      </div>
    </div>
<div class="row">
        <h3>Active Students</h3>
        
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
            <th style="vertical-align:bottom">Student Name</th>
            <th style="vertical-align:bottom">Parent Info</th>
        </tr></thead>
        <tbody >
                <?php $students = $user->students()->get() ?>              
                @foreach($students as $student)
                <tr>
					<td>
						<button type="button" class="btn btn-info " disabled="disabled">
						<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> &nbsp; </button>
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> &nbsp; </button>
					</td>
                    <td style="text-align:left; vertical-align:middle"> {{ $student->fullname }} </td>
                    <?php $relationship = $student->partners()->first()->relationship ?>
                    <td style="text-align:left; vertical-align:middle"> {{ $relationship }} </td>
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

<div class="modal fade" id="EditStudent" tabindex="-1" role="dialog" aria-labelledby="NotesModalLabel" aria-hidden="true">
   <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h2 class="modal-title" id="signupModalLabel">Notes App
      <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button></h2></div>
      <div class="modal-body">
        <table>
          <tr><td><img src="https://s3.amazonaws.com/teachtogether.co/assets/img/youtube.png" alt="Teacher Explains the App"></td></tr>
          <tr><td>
          <p><br><b>Description</b><br>
        This app allows teachers to view parent activity logs and send parents customized notes of recognition or encouragement.
</p></td></tr></table>
      </div>
      <div class="modal-footer">
        <span type="button" class="btn btn-default" data-dismiss="modal">Cancel</span>
        <span type="button" class="btn btn-success" onclick="location.href='">Install App</span>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="StudentCodes" tabindex="-1" role="dialog" aria-labelledby="NotesModalLabel" aria-hidden="true">
   <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h2 class="modal-title" id="signupModalLabel">Student Codes
      <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button></h2></div>
      <div class="modal-body">
        <table>
          <tr><td>
          <p>
            <?php 
                    echo 'How many students do you have?&nbsp;&nbsp;<input id="student_count" value="1" type="number" min="1" step"1">
                            <br>
                            <p>The note to parents will include information to register (webiste URL and special codes) 
                            with the following message to parents. If you want to edit the message, click edit below or 
                            click print to continue.</p>
                            <div id="message">
                            <hr>
                            Dear Parent,<br><br>
                            I\'m using a new service called Teach Together to help me connect with my students\' parents.<br><br>
                            To register for the service, use your smartphone or computer to login to the following website and click the \'Parents\' tab.<br><br>
                            <b>Website:</b> teachtogether.co<br>
                            </hr>
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
