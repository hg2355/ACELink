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
    <label class="booktext"> How would you rate this activity overall on a scale of 0 (bad) to 100 (good)?
    </label>
    <input id="rating" name="rating" data-slider-id="rating" type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="50"/>
</div>
 <div class="col-lg-2 col-lg-offset-5">
        <br>
      </div>
<?php echo Form::submit('Rate',['class'=>'btn btn-info']) ?>
      

<?php echo Form::close() ?>

 </div>

   
@stop
