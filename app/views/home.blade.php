@extends('layout.home')
@section('content')
<!-- Section: intro -->
    <section id="intro" class="intro">
  <div class="slogan col-md-4 col-md-offset-4 " >
    <div class="slogan" >
      <h2 >IT'S BETTER, TOGETHER.</h2>
      <H4>We help teachers involve parents in their child's learning.</h4>
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
            <div class="col-sm-3 col-md-3">
        <div class="wow fadeInLeft" data-wow-delay="0.2s">
                <div class="service-box">
          <div class="service-icon">
            <img src="https://s3.amazonaws.com/teachtogether.co/assets/img/service-icon-1.PNG" alt="" />
          </div>
          <div class="service-desc">
            <h5>Inform</h5>
            <p>Teachers can inform parents about their child's progress in less than ten minutes.</p>
          </div>
                </div>
        </div>
            </div>
      <div class="col-sm-3 col-md-3">
        <div class="wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-box">
          <div class="service-icon">
            <img src="https://s3.amazonaws.com/teachtogether.co/assets/img/service-icon-2.PNG" alt="" />
          </div>
          <div class="service-desc">
            <h5>Celebrate</h5>
            <p>Teachers and parents can recognize, share and celebrate student success.</p>
          </div>
                </div>
        </div>
            </div>
      <div class="col-sm-3 col-md-3">
        <div class="wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-box">
          <div class="service-icon">
            <img src="https://s3.amazonaws.com/teachtogether.co/assets/img/service-icon-3.PNG" alt="" />
          </div>
          <div class="service-desc">
            <h5>Empower</h5>
            <p>Teachers can send parents 10-15-min activities to do at home that target their child's specific needs.</p>
          </div>
                </div>
        </div>
            </div>
      <div class="col-sm-3 col-md-3">
        <div class="wow fadeInRight" data-wow-delay="0.2s">
                <div class="service-box">
          <div class="service-icon">
            <img src="https://s3.amazonaws.com/teachtogether.co/assets/img/service-icon-4.PNG" alt="" />
          </div>
          <div class="service-desc">
            <h5>Coordinate</h5>
            <p>Teachers and parents can efficiently coordinate calendars.</div>
                </div>
        </div>
            </div>
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
          <div class="wow bounceInDown" data-wow-delay="0.4s">
          <div class="section-heading">
          <h2>Parent Involvement Matters</h2>
          <i class="fa fa-2x fa-angle-down"></i>

          </div>
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
      <div class="col-md-4 col-md-offset-0" ><br>
        <p>Thirty years of research shows that when families are involved with their children’s education, 
          children do better in school. But modern parents have busy lives and often aren't aware of how best
          to help. With Teach Together, teachers can help and encourage parents to get involved.  </p>
      </div>
    
    </div>
  </div>
</div>
</section>
<!-- /Impact section -->
<!-- Section: contact -->
    <section id="contact" class="home-section text-center">
    <div class="heading-contact">
      <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="wow bounceInDown" data-wow-delay="0.4s">
          <div class="section-heading">
          <h2>Get in touch</h2>
          <i class="fa fa-2x fa-angle-down"></i>

          </div>
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
        <div class="col-lg-8">
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
    
    <div class="col-lg-4">
      <div class="widget-contact">
          <strong>We're on social networks</strong><br>
                        <ul class="company-social">
                            <li class="social-facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li class="social-twitter"><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li class="social-dribble"><a href="#" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                            <li class="social-google"><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        </ul> 
        </address>          
      
      </div>  
    </div>
    </div>  

    </div>
  </section>
  <!-- /Section: contact -->
@stop
