@extends('layout.rate')
@section('content')
<div class="page-header">
<h1>Rate Activity</h1>
</div>

@if( count($errors->all()) > 0 )
<div class="alert alert-danger alert-dismissible" role="alert">
<ul>
<?php foreach($errors->all() as $error)
      {
        echo '<li>'.$error.'</li>';
      }
?>
</ul>
</div>
@endif
<?php $student = $user->students()->first() ?>

<?php echo Form::open( ['route'=>['activity.complete.post',$activity->id],'style'=>''] ) ?>
<div class="form-group">
<label class="booktext"> Did <?php echo $student->first_name ?> find this activity fun or boring? </label>
<?php echo Form::select('experience',FormList::experience(),null,array('id'=>'experience','class'=>'form-control')) ?>
</div>

<div class="form-group">
    <label class="booktext"> Was this activity appropiate for <?php echo $student->first_name ?>? </label>
    <?php echo Form::select('appropriate',FormList::confirm(),null,array('id'=>'appropriate','class'=>'form-control')) ?>
</div>

<div class="form-group">
    <label class="booktext"> How would you rate this activity overall on a scale of 0 (bad) to 5 (good)?
    </label>
    <input id="rating" name="rating" type="number" class="rating" min=0 max=5 step=1 data-size="md"/>
</div>
 <div class="col-lg-2 col-lg-offset-5">
        <br>
      </div>
<?php echo Form::submit('Rate',['class'=>'btn btn-info']) ?>
      

<?php echo Form::close() ?>

 </div>

   
@stop
