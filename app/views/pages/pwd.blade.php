@extends('layout.pwd')
@section('content')
<!-- Section: services -->
<section id="service" class="home-section text-center">

@if( count($errors->all()) > 0 )
<div class="alert alert-danger alert-dismissible center-block" style="max-width: 400px" role="alert">
<ul style="text-align: left">
<?php foreach($errors->all() as $error)
      {
        echo '<li>'.$error.'</li>';
      }
?>
</ul>
</div>
@endif

<?php echo Form::open( ['route'=>['pwd.change.post'],'style'=>''] ) ?>
<div class="form-group">
<label class="booktext">Current Password</label>
<?php echo Form::password('old_password',['id'=>'old_password','class'=>'form-control center-block','style'=>'max-width: 400px']) ?>
</div>

<div class="form-group">
    <label class="booktext">New Password</label>
    <?php echo Form::password('password',['id'=>'password','class'=>'form-control center-block','style'=>'max-width: 400px']) ?>
</div>

<div class="form-group">
    <label class="booktext">Confirm New Password</label>
    <?php echo Form::password('password_confirmation',['id'=>'password_confirmation','class'=>'form-control center-block','style'=>'max-width: 400px']) ?>
</div>
<div class="row">

</div>
<?php echo Form::submit('Change Password',['class'=>'btn btn-info']) ?>
<?php echo Form::close() ?>


</section>
@stop
