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

<?php echo Form::open( ['route'=>'activity.store','files'=>'true','style'=>'width:50%'] ) ?>
<div class="form-group">
    <label> Title </label>
    <input value=<?php echo '"'.Input::old('title').'"' ?> name="title" id="title" type="text" class="form-control">
</div>

<div class="form-group">
    <label> Time (in minutes) </label>
    <input value=<?php echo '"'.Input::old('time').'"' ?> name="time" id="time" type="number" min="1" max="120" class="form-control"></textarea>
</div>

<div class="form-group">
    <label> Activity Box </label>
    <?php echo Form::file('description',['id'=>'description','class'=>'form-control','accept'=>'.php']) ?>
</div>

<div class="form-group">
    <label> Activity Page </label>
    <?php echo Form::file('activity',['id'=>'activity','class'=>'form-control','accept'=>'.php']) ?>
</div>

<?php echo Form::submit('Upload',['class'=>'btn btn-info']) ?>
<?php echo Form::close() ?>
@stop
