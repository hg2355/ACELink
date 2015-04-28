<?php $student = $user->students()->first() ?>
<?php $teacher = $student->teachers()->first() ?>
<section id="service" class="home-section text-center">
    <div class="container">
    <div class="heading-about">
        <div class="container">
        
        <div class="row text-center">
        <h2>Welcome,&nbsp;&nbsp;<?php echo $user->first_name?> </h2>
        
      </div>
      <i class="fa fa-2x fa-angle-down"></i>
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
    echo '<div class="alert alert-info" role="alert">No more activities at the moment. Please check back tomorrow.</div>';
}
?>

 <div class="row">
      <div class="row col-lg-8 col-lg-offset-2 col-sm-8 col-sm-offset-2 text-center">
        <h3>Scoreboard&nbsp;<span class="glyphicon glyphicon-info-sign" data-toggle="modal" data-target="#scoreboard" 
        aria-hidden="true"></span></h3>
      </div>
    </div>


<div class="row col-lg-8 col-lg-offset-2 col-sm-8 col-sm-offset-2 text-center">
    <table class="table">
    <tr>
        <td><?php echo $student->first_name.'\'s'. ' activity time (in minutes)'?></td>
        <td><?php echo 'Average student activity time (in minutes)'?></td>
    </tr>
    <tr>
        <td><?php echo $student->traits()->first()->activity_total_time ?></td>
        <td><?php echo $avg ?></td>
    </tr>
    </table>    
</div>  

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

<div class="modal fade" id="scoreboard" tabindex="-1" role="dialog" aria-labelledby="NotesModalLabel" aria-hidden="true">
   <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

      </div>
      <div class="modal-body">
       <p class="booktext">Scoreboard shows how much time you've spent on Teach Together compared 
        with the average of other parents in <?php echo $student->first_name.'\'s'. ' class. '?> We recommend you spend 
        15 minutes per week reading with <?php echo $student->first_name.'' ?> using Teach Together activities.</p>
      </div>
      <div class="modal-footer">
        <span type="button" class="btn btn-default" data-dismiss="modal">Got It</span>
      </div>
    </div>
  </div>
</div>
