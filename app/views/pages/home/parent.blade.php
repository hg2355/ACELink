<?php $student = $user->students()->first() ?>
<?php $teacher = $student->teachers()->first() ?>
<section id="service" class="home-section text-center">
    <div class="container">
    <div class="heading-about">
        <div class="container">
        
        <div class="row ol-lg-8 col-lg-offset-2">
        <h2>Welcome,&nbsp;&nbsp;<?php echo $user->first_name?> </h2>
        <i class="fa fa-2x fa-angle-down"></i>
      </div>
      </div>
   
    <div class="row">
      <div class="col-lg-2 col-lg-offset-5">
        <hr class="marginbot-50">
      </div>
    </div>

    </div>
<!--
    <div class="row col-lg-8 col-lg-offset-2">
              <h3> <span class="glyphicon glyphicon-stats  " aria-hidden="true"></span>&nbsp;Your progress</h3>  

            </div>

<div class="row col-lg-4 col-lg-offset-4 col-xs-10 col-xs-offset-1">

  <img src="https://s3.amazonaws.com/teachtogether.co/assets/img/graph-2.png" class="img-rounded img img-responsive responsive" alt="" />

<br>
</div>

   
    <div class="row">
      <div class="col-lg-2 col-lg-offset-5">
        <hr class="marginbot-50">
      </div>
    </div>
-->

<div class="row">
      <div class="col-lg-2 col-lg-offset-5">
         
      </div></div>


      <div class="col-lg-6 col-lg-offset-3 alert alert-warning" role="alert"><br>
<b><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>&nbsp;</b>&nbsp;
Below are some activities you can do at home to help <?php 
            echo $student->first_name; ?> excel at school. <br><br>

</div> 

<div class="row col-lg-8 col-lg-offset-2">
              <h3> <span class="glyphicon glyphicon-star  " aria-hidden="true"></span>&nbsp;Activity List</h3>      

  

<!-- start of activity box -->
  <div class="col-lg-8 col-lg-offset-2 alert" role="alert">
        <div class="activity alert row col-lg-10 col-md-8 col-sm-8 col-lg-offset-1 col-md-offset-2 col-sm-offset-2">
          <!--  photo -->
          <div class="activity-img col-lg-4 col-sm-4 col-md-4 col-xs-4">
          
          <img src="https://s3.amazonaws.com/teachtogether.co/assets/img/grit.png" class="img-circle" alt="" />
          <DIV type="button">10 PTS</div>
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#grit">
  <span class="glyphicon glyphicon-edit" ></span>&nbsp;Start </button>
          </div>
          <!-- description -->
          <div class="col-lg-8 col-sm-8 col-md-8 col-xs-8 bg-info">
        <h4>CHARACTER SERIES</h4>
        <p> <?php echo $teacher->title.'. '.$teacher->last_name ?> &nbsp;is asking you to discuss Grit with <?php 
            echo $student->first_name; ?>.
          </p>
          
          </div>

      </div>
           
    </div>
<!-- end of activity box -->
 <div class="row">
      <div class="col-lg-2 col-lg-offset-5">

      </div>
    </div>


<!-- start of activity box -->
  <div class="col-lg-8 col-lg-offset-2 alert" role="alert">
        <div class="activity alert row col-lg-10 col-md-8 col-sm-8 col-lg-offset-1 col-md-offset-2 col-sm-offset-2">
          <!--  photo -->
          <div class="activity-img col-lg-4 col-sm-4 col-md-4 col-xs-4">
          
          <img src="https://s3.amazonaws.com/teachtogether.co/assets/img/grit.png" class="img-circle" alt="" />
          <DIV type="button">15 PTS</div>
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#numbersense">
  <span class="glyphicon glyphicon-edit" ></span>&nbsp;Start </button>
          </div>
          <!-- description -->
          <div class="col-lg-8 col-sm-8 col-md-8 col-xs-8 bg-info">
        <h4>Number Sense</h4>
        <p> Help <?php echo $student->first_name; ?> learn more about numbers.
          </p>
          
          </div>

      </div>
           
    </div>
<!-- end of activity box -->


      <div class="row">
      <div class="col-lg-2 col-lg-offset-5">
  
      </div>
    </div>

             
  
<!-- start of activity box -->
  <div class="col-lg-8 col-lg-offset-2 alert" role="alert">
        <div class="activity alert row col-lg-10 col-md-8 col-sm-8 col-lg-offset-1 col-md-offset-2 col-sm-offset-2">
          <!--  photo -->
          <div class="activity-img col-lg-4 col-sm-4 col-md-4 col-xs-4">
          
          <img src="https://s3.amazonaws.com/teachtogether.co/assets/img/grit.png" class="img-circle" alt="" />
          <DIV type="button">15 MIN</div>
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#sounds">
  <span class="glyphicon glyphicon-edit" ></span>&nbsp;Start </button>
          </div>
          <!-- description -->
          <div class="col-lg-8 col-sm-8 col-md-8 col-xs-8 bg-info">
        <h4>Letter Sounds</h4>
        <p> Teach <?php echo $student->first_name ?> about letter sounds.
          </p>
          
          </div>

      </div>
           
    </div>
<!-- end of activity box -->


<div class="row">
      <div class="col-lg-2 col-lg-offset-5">
         
      </div></div>

      

           
  
<!-- start of activity box -->
  <div class="col-lg-8 col-lg-offset-2 alert" role="alert">
        <div class="activity alert row col-lg-10 col-md-8 col-sm-8 col-lg-offset-1 col-md-offset-2 col-sm-offset-2">
          <!--  photo -->
          <span type="activity">
          <div class="activity-img col-lg-4 col-sm-4 col-md-4 col-xs-4">
          
          <img src="https://s3.amazonaws.com/teachtogether.co/assets/img/grit.png" class="img-circle" alt="" />
          <DIV type="button"><br></div>
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="href:http://www.lacasaazulbookstore.com/educators.html">
  <span class="glyphicon glyphicon-edit" ></span>&nbsp;Info</button>
</span>
          </div>
          <!-- description -->
          <div class="col-lg-8 col-sm-8 col-md-8 col-xs-8 bg-info">
        <h4>Community Event</h4>
        <p> Take <?php echo $student->first_name ?> to family literacy night at 
          La Casa Azul Bookstore this Tuesday from 4 to 6pm.


          </p>
          
          </div>

      </div>
           
    </div>
<!-- end of activity box -->

  
<div class="row">
      <div class="col-lg-2 col-lg-offset-5">
         
      </div></div>
           

<!-- start of activity box -->
  <div class="col-lg-8 col-lg-offset-2 alert" role="alert">
        <div class="activity alert row col-lg-10 col-md-8 col-sm-8 col-lg-offset-1 col-md-offset-2 col-sm-offset-2">
          <!--  photo -->
          <span type="activity">
          <div class="activity-img col-lg-4 col-sm-4 col-md-4 col-xs-4">
          
          <img src="https://s3.amazonaws.com/teachtogether.co/assets/img/grit.png" class="img-circle" alt="" />
          <DIV type="button">15 PTS</div>
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="">
  <span class="glyphicon glyphicon-edit" ></span>&nbsp;Start</button>
</span>
          </div>
          <!-- description -->
          <div class="col-lg-8 col-sm-8 col-md-8 col-xs-8 bg-info">
        <h4>Jobs of the future</h4>
        <p> Help <?php echo $student->first_name ?> understand what the future will be like. </p>
          </div>

      </div>
           
    </div>
<!-- end of activity box -->

</div>

<!-- END OF ACTIVITIES SECTION -->

</section>

<div class="modal fade" id="letters" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h2 class="modal-title" >Letter Names
      <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button></h2></div>
      <div class="modal-body"><center>
        <img style="text-align:center;" src="https://s3.amazonaws.com/teachtogether.co/assets/img/letter.png"></center>
      </div>
   
    </div>
  </div>
</div>

<div class="modal fade" id="sounds" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h2 class="modal-title" >Letter Sounds
      <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button></h2></div>
      <div class="modal-body"><center>
        <img style="text-align:center;" src="https://s3.amazonaws.com/teachtogether.co/assets/img/sounds.png"></center>
      </div>
   
    </div>
  </div>
</div>

<div class="modal fade" id="invitation" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h2 class="modal-title" >Invitation
      <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button></h2></div>
      <div class="modal-body"><center>



      </center>
      </div>
   
    </div>
  </div>
</div>


<div class="modal fade" id="grit" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h2 class="modal-title" >Grit
      <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button></h2></div>
      <div class="modal-body">
        <p><b>
           <span class="glyphicon glyphicon-question " aria-hidden="true"></span>&nbsp;What is grit?&nbsp;</b>
           Grit is perseverance and passion for long-term goals. Being gritty means:<Br>
            <ul><li>Finishing what you begin</li><li>Staying committed to your goals</li><li>
Working hard even after experiencing failure or when you feel like quitting</li><li>
Sticking with a project or activity for more than a few weeks</li></ul>
</p><p>
        <b>
        <span class="glyphicon glyphicon-info " aria-hidden="true"></span>&nbsp;Why teach grit?</b>&nbsp;Research shows
        that grit is predictive of achievement, e.g. gritty students are more likely to excel at school.<br>


      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal"  data-target="grit2">
        Start activity</button><a href="/parents/activity" style="color:black">Start</a>
        <span type="button" class="btn btn-info" data-dismiss="modal">Save for later</span>
      </div>
   
    </div>
  </div>
</div>


<div class="modal fade" id="numbersense" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h2 class="modal-title" >Number Sense
      <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button></h2></div>
      <div class="modal-body"><center>
        open
      </center>
      </div>
   <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal"  data-target="">Start activity</button>
        <span type="button" class="btn btn-info" data-dismiss="modal">Save for later</span>
      </div>
    </div>
  </div>
</div>

