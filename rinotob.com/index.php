<!DOCTYPE html>
<?php

    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'novoyfit_rinotob_nova');
    define('DB_PASSWORD', 'Brainiac777+');
    define('DB_NAME', 'novoyfit_rinova_db');

    $db_handle = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


    if(isset($_POST['subscribe'])){
        $email = $_POST['email'];
        $subscribequery = "INSERT INTO page_subscribe (email) 
  			                                 VALUES('$email')";
        if(mysqli_query($db_handle, $subscribequery)){
            $msg = 'success!';
        }
    }
    if(isset($_POST['sendm'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $message_query = "INSERT INTO page_contact_us (name, email, message) 
  			                                 VALUES('$name', '$email','$message')";
        if(mysqli_query($db_handle, $message_query)){
            $msg = 'success!';
        }
    }
?>
         <html class="no-js" lang="zxx">
            <!--<![endif]-->
            <meta charset=utf-8>
            <meta content="ie=edge" http-equiv=x-ua-compatible>
            <title>Rinotob | Under Maintainance</title>
            <meta content="" name=description>
            <meta content="width=device-width,initial-scale=1" name=viewport>
            <link href=favicon.ico rel="shortcut icon" type=image/x-icon>
            <link href=favicon.ico rel=icon type=image/x-icon>
            <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel=stylesheet>
            <link href=css/icofont.css rel=stylesheet>
            <link href=css/bootstrap.min.css rel=stylesheet>
            <link href=css/style.css rel=stylesheet>
            <link href=css/responsive.css rel=stylesheet>
            <!--[if lt IE 9 ]><script src=js/modernizr-3.5.0.min.js></script><![endif]-->
            <body class="bg-img body-bg">
                
                
               <!--[if lte IE 9]>
               <p class=browserupgrade>
                  You are using an <strong>outdated</strong> browser. Please <a href=https://browsehappy.com/ >upgrade your browser</a> to improve your experience and security.<![endif]-->
                  <?php include("nova_script.php"); ?>
               <div class=canvas-area>
                  <canvas class=constellation></canvas>
               </div>
               <div class=preloader-wrap>
                  <div class=preloader><span></span> <span></span> <span></span> <span></span></div>
               </div>
               <div class="bg-img color-white main-container">
                  <header class="xs-no-positioning fixed fixed-top main-header">
                     <div class=container-fluid>
                        <div class="clearfix row">
                        </div>
                     </div>
                  </header>
                  <div class="xs-no-positioning fixed fixed-middle main-body">
                     <div class=container-fluid>
                        <div class=row>
                           <div class=col-md-12>
                              <div class=tab-container>
                                 <ul class="pull-left rect-1 tab-controller tab-style-one xs-no-positioning" role=tablist>
                                    <li class=active role=presentation><a href=#home data-toggle=tab aria-controls=home role=tab>Home</a>
                                    <li role=presentation><a href=#contact data-toggle=tab aria-controls=contact role=tab>Contact</a>
                                 </ul>
                                 <div class=tab-content>
                                    <div class="fade tab-pane text-center active home-tab in" id=home role=tabpanel>
                                       <div class=tab-heading>
                                          <h2 class=primary-title>Site Under Maintainance</h2>
                                          <p class=text-light>We're currently undergoing an upgrade to better serve you...
                                       </div>
                                       <div class=tab-body>
                                          <div class="countdown-timer padding-big">
                                            
                                          </div>
                                          <div class=subscribe-form>
                                             <h4>Subscrive to our newsletter for updates</h4>
                                             <form action="home" method="post" class=form-inline>
                                                <input name=email class="form-control btn-rounded" placeholder="Email Address" type=email>
                                                <button class="btn btn-cyan btn-round" name="subscribe" type=submit>Submit</button>
                                             </form>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="fade tab-pane text-center contact-tab" id=contact role=tabpanel>
                                       <div class=tab-heading>
                                          <h1 class=primary-title>Contact Us</h1>
                                          <p class=text-light>please feel free to contact us for more information<br> we'd be happy to get back to you
                                       </div>
                                       <div class=tab-body>
                                          <div class="contact-form pt-70">
                                             <form action="home" method="post" class=clearfix id=contat-form>
                                                <div class=success>Your message has been sent successfully.</div>
                                                <div class=error>E-mail must be valid and message must be longer than 1 character.</div>
                                                <div class="pull-left field-half-width form-field">
                                                   <input name="name" class="form-control" placeholder="Full Name" id=name> <i class="icofont icofont-user"></i>
                                                </div>
                                                <div class="pull-right form-field field-half-width">
                                                   <input name="email" class="form-control" placeholder="Email Address" id="email_address" type="email"> <i class="icofont icofont-envelope"></i>
                                                </div>
                                                <div class="pull-right form-field field-full-width">
                                                   <textarea class=form-control id=message name=message placeholder=Message></textarea>
                                                </div>
                                                <button class="btn btn-cyan btn-big" type=submit id=sendm name=sendm>Send Message</button>
                                             </form>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="fade tab-pane about-tab" id=about role=tabpanel>
                                       <div class=tab-heading>
                                          <h2 class=primary-title>About Us</h2>
                                       </div>
                                       <div class=tab-body>
                                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                          <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing.
                                          <p>And more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.</p>
                                          <a href=# data-toggle=modal data-target=#aboutus class=readmore-link>Read More <i class="icofont icofont-long-arrow-right"></i></a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <footer class="xs-no-positioning fixed fixed-bottom main-footer">
                     <div class=container-fluid>
                        <div class=row>
                           <div class=col-md-12>
                              <div class=footer-content>
                                 <div class="pull-right footer-right">
                                   
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </footer>
               </div>
              
              
               <!--[if lt IE 8]><script src=js/modernizr-3.5.0.min.js></script><![endif]-->
               <script src=js/jquery-3.2.1.min.js></script>
               <script src=js/bootstrap.min.js></script>
               <script src=js/zepto.min.js></script>
               <script src=js/constellation.min.js></script>
               <script src=js/stars.js></script>
               <script src=js/scripts.js></script>