@extends('layout.welcome')
@section('content')
<!-- Section: intro -->
    <section id="intro" class="intro">
<div class="slogan col-md-4 col-md-offset-4 " >
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
@if( count($errors->all()) > 0 )
<div class="alert alert-danger alert-dismissible" role="alert">
<ul style="text-align:left">
<?php foreach($errors->all() as $error)
      {
        echo '<li>'.$error.'</li>';
      }
?>
</ul>
</div>
@endif
    <div class="slogan" >
      <h2 style="font-size:300%"><br>
        TRANSFORM PARENTS INTO <SPAN style="color:orange">PARTNERS</spam></h2>
    </div>
    <div class="page-scroll">
      <a href="#service" class="btn btn-circle">
        <i class="fa fa-angle-double-down animated"></i>
      </a>
    </div><br><br><br><br><br>
  </div>
    </section>
  <!-- /Section: intro -->
    <!-- Section: services -->
    <section id="service" class="home-section text-center">
    
    <div class="heading-about">
      <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          
          <div class="section-heading">
          <h2>Our Service</h2>
          <i class="fa fa-2x fa-angle-down"></i>

          </div>
         
        </div>
      </div>
      </div>
    </div>
    <div class="container">
    <div class="row">
      <div class="col-lg-2 col-lg-offset-5">
        <hr class="marginbot-50">
      </div>
    </div>
        <div class="row">
            <div class="col-sm-4 col-md-4">
        <div class="wow fadeInLeft" >
                <div class="service-box">
          <div class="service-icon">
            <img src="https://s3.amazonaws.com/teachtogether.co/assets/img/service-icon-1.png" alt="" />
          </div>
          <div class="service-desc">
            <h5>Inform</h5>
            <p>Teachers can inform parents about their child's progress in 
              less than ten minutes.</p>
          </div>
                </div>
        </div>
            </div>
         <div class="col-sm-4 col-md-4">
        <div class="wow fadeInUp" >
                <div class="service-box">
          <div class="service-icon">
            <img src="https://s3.amazonaws.com/teachtogether.co/assets/img/service-icon-3.png" alt="" />
          </div>
          <div class="service-desc">
            <h5>Empower</h5>
            <p>Teach Together automatically sends parents 5 or 10-min activities to do at home that target 
              their child's specific needs.</p>
          </div>
                </div>
        </div>
            </div>


             <div class="col-sm-4 col-md-4">
        <div class="wow fadeInUp" >
                <div class="service-box">
          <div class="service-icon">
            <img src="https://s3.amazonaws.com/teachtogether.co/assets/img/service-icon-2.png" alt="" />
          </div>
          <div class="service-desc">
            <h5>Celebrate</h5>
            <p>Together, teachers and parents recognize, share and celebrate student success.</p>
          </div>
                </div>
        </div>
            </div>
  
      <!--
      <div class="col-sm-3 col-md-3">
        <div class="wow fadeInRight" >
                <div class="service-box">
          <div class="service-icon">
            <img src="https://s3.amazonaws.com/teachtogether.co/assets/img/service-icon-4.png" alt="" />
          </div>
          <div class="service-desc">
            <h5>Coordinate</h5>
            <p>Teachers and parents can efficiently coordinate calendars.</div>
                </div>
        </div>
            </div>

          -->
        </div>    
    </div>
  </section>


  <!-- /Section: services -->


  <!-- Impact section -->

  <section id="service" class="home-section text-center bg-gray">
    
    <div class="heading-about">
      <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
      
          <div class="section-heading">
          <h2>Parent Involvement Matters</h2>
          <i class="fa fa-2x fa-angle-down"></i>

          </div>
      
        </div>
      </div>
      </div>
    </div>
<div class="container">
    <div class="row">
      <div class="col-lg-2 col-lg-offset-5">
        <hr class="marginbot-50">
      </div>
    </div>
    <div class="row">
    <div class="container">
      <div class="col-md-2 col-md-offset-3" > 
        <img src="https://s3.amazonaws.com/teachtogether.co/assets/img/result.png">
       </div>
      <div class="col-md-4 col-md-offset-0" >
        <p>Thirty years of research shows that when families are involved with their children’s education, 
          children do better in school. But modern parents have busy lives and often aren't aware of how best
          to help. With Teach Together, teachers can help and encourage parents to get involved.  </p>
      </div>
    
    </div>
  </div>
</div>
</section>
<!-- /Impact section -->
 
<section id="service" class="home-section text-center bg-info">
    
    <div class="heading-about">
      <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
     
          <div class="section-heading">
          <h2>GET INVITED</h2>
          <i class="fa fa-2x fa-angle-down"></i>

          </div>
       
        </div>
      </div>
      </div>
    </div>

   
<div class="container">
    <div class="row">
      <div class="col-lg-2 col-lg-offset-5">
        <hr class="marginbot-50">
      </div>
    </div>
    <div class="row">
    <div class="container">
      <div class="col-lg-4 col-lg-offset-4 col-sm-4 col-sm-offset-4" ><p> 
        Teach Together is currently invitation only. To get invited, please leave us your email address: 
                    
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" name="invite_email" id="invite_email" placeholder="Enter email" required="required" />
                              </div></p>
                              <button type="submit" class="btn btn-skin" id="invite_submit">
                          Join Us</button>
      </div>
    </div>
  </div>
</div>


</section>



<!-- Section: contact -->



<!--
    <section id="contact" class="home-section text-center">
    <div class="heading-contact">
      <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          
          <div class="section-heading">
          <h2>Get in touch</h2>
          <i class="fa fa-2x fa-angle-down"></i>

          </div>
      
        </div>
      </div>
      </div>
    </div>
    <div class="container">

    <div class="row">
      <div class="col-lg-2 col-lg-offset-5">
        <hr class="marginbot-50">
      </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="boxed-grey">
                <form id="contact-form">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Subject</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="na" selected="">Choose One:</option>
                                <option value="service">General Customer Service</option>
                                <option value="suggestions">Suggestions</option>
                                <option value="product">Product Support</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-skin pull-right" id="btnContactUs">
                            Send Message</button>
                    </div>
                </div>
                </form>
            </div>
        </div>


    </div>  

    </div>
  </section>

-->
@stop
