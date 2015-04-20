@extends('layout.create')
@section('content')
<div class="page-header">
    <h1>Activity Upload</h1>
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

<?php echo Form::open( ['route'=>['activity.update',$activity->id],'files'=>'true','style'=>'width:50%','method'=>'PUT'] ) ?>
<div class="form-group">
    <label> Title </label>
    <input value=<?php echo '"'.$activity->title.'"' ?> name="title" id="title" type="text" class="form-control">
</div>

<div class="form-group">
    <label> Time (in minutes) </label>
    <input value=<?php echo '"'.$activity->time.'"' ?> name="time" id="time" type="number" min="1" max="120" class="form-control"></textarea>
</div>

<div class="form-group">
    <label> Description </label>
    <?php echo Form::file('description',['id'=>'description','class'=>'form-control','accept'=>'.php']) ?>
</div>

<div class="form-group">
    <label> Activity </label>
    <?php echo Form::file('activity',['id'=>'activity','class'=>'form-control','accept'=>'.php']) ?>
</div>

<?php echo Form::submit('Upload',['class'=>'btn btn-info']) ?>
<?php echo Form::close() ?>
@stop
