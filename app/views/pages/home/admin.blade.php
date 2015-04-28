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
<div class="table-responsive" style="margin-top: 15px">
<table class="table table-striped table-bordered" style="margin-top: 15px">
<tr>
    <td>Title</td>
    <td>Avg. Rating</td>
    <td>% Fun for Q1</td>
    <td>% Appropriate for Q2</td>
    <td>% Parents who finished this activity</td>
    <td>Actions</td>
<?php 

foreach($activities as $activity)
{
    echo '<tr id="'.$activity->title.'">';
    echo '<td>'.$activity->title.'</td>';
    $rating = $activity->avgRating();
    
    echo '<td>'.$rating.'</td>';
    echo '<td>'.$activity->q1Percent().'%</td>';
    echo '<td>'.$activity->q2Percent().'%</td>';
    echo '<td>'.$activity->finishedPercent().'%</td>';

    $deleteString = "'".$activity->id."'".",'activity','".$activity->title."'";
    echo '<td><a href="'.URL::route('activity.edit',[$activity->id]).'" class="btn btn-warning">Edit</a><a href="#" data-token="'.csrf_token().'" class="btn btn-danger" style="margin-left: 15px" onclick="destroy('.$deleteString.')">Delete</a></td>';
    echo '</tr>';
}
?>
</tr>
</table>
</div>
</div>
</section>

