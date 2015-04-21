<?php $student = $user->students()->first() ?>
<?php $teacher = $student->teachers()->first() ?>
<section id="service" class="home-section text-center">
    <div class="container">
    <div class="heading-about">
        <div class="container">
        
        <div class="row ol-lg-8 col-lg-offset-2 center-block">
        <h2>Welcome,&nbsp;&nbsp;<?php echo $user->first_name?> </h2>
        <i class="fa fa-2x fa-angle-down"></i>
      </div>
      </div>
<?php 
if( Session::has('warning') )
{
    echo '<div class="alert alert-warning" role="alert">'.Session::get('warning').'</div>';
}
else if( Session::has('info') )
{
   echo '<div class="alert alert-info" role="alert">'.Session::get('info').'</div>';
}
else if( Session::has('success') )
{
   echo '<div class="alert alert-success" role="alert">'.Session::get('success').'</div>';
}

if( count($activities) === 0 )
{
    echo '<div class="alert alert-info" role="alert">No more activities at the moment.</div>';
}
?>
  
<!-- START OF ACTIVITIES SECTION -->  
    <div class="row">
      <div class="col-lg-2 col-lg-offset-5">
        <hr class="marginbot-50">
      </div>
    </div>
    
    </div>

    <?php 
            foreach($activities as $activity)
            {
                $format = '%s%s';
                
                $path = sprintf($format,public_path(),$activity->description_url);

                include($path);
            }
     ?>
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

