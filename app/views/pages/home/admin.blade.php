<section id="service" class="home-section text-center">
<div class="container">
<h2>Activities</h2>
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
?>
<a href="/activity/create" class="btn btn-large btn-danger">Upload New Activity</a>
<table class="table table-striped table-bordered">
</table>
</div>
</section>
