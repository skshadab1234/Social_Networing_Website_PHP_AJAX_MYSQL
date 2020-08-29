<?php
    require_once "session.php";
  
    $loginURL = $gClient->createAuthUrl();
    
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/signup.css">
</head>
<!------ Include the above in your HEAD tag ---------->
<body class="hm-gradient">
    <main>
        <!--MDB Forms-->
        <div class="container mt-4">
            <!-- Grid row -->
            <div class="row">
               <div class="col-md-2"></div>
                <!-- Grid column -->
            <div class="col-md-8 mb-4">
                    <div class="card">
                        <div class="card-body">
                            
                            <!-- Form register -->
                            <form method="post" id="frmsubmit">
                                <h2 class="text-center font-up font-bold deep-orange-text py-4">Login</h2>
                                <div class="md-form">
                                    <i class="fa fa-envelope prefix grey-text"></i>
                                    <input type="text" id="orangeForm-email3" class="form-control email">
                                    <span class="error_span" id="email_error"></span>
                                    <label for="orangeForm-email3">Your email</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-lock prefix grey-text"></i>
                                    <input type="password" id="orangeForm-pass3" class="form-control password">
                                    <span class="error_span" id="password_error"></span>
                                    <label for="orangeForm-pass3">Your password</label>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-deep-orange" id="submit_form">next<i class="fa fa-angle-double-right pl-2" aria-hidden="true"></i>
                                    </button>
                             <div class="container" style="position: relative;">
                                <span id="signup_error" style="color: red"></span>
                                <span id="signup_success" style="color: green"></span>
                                    <h5 class="loader" style="background-image: url(loader.gif);background-size: cover;width: 20px;height: 20px;display: none;position: absolute;left: 50%"></h5>
                                </div>
                                </div>

                            </form>

                            <div class="col s12 m1 offset-m1 center-align google_login">
                                <h5>-- or --</h5>
                            <button class="oauth-container btn darken-4 white black-text" onclick="window.location = '<?php echo $loginURL ?>';"  name="google" style="text-transform:none">
                                <div class="left">
                                    <img width="20px" style="margin-top:7px; margin-right:8px" alt="Google sign-in" 
                                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                                </div>
                                <span style="color: #000;padding: 7px;display: block;">Login with Google</span>
                            </button>
                        </div>
                        </div>
                    </div>
                </div>
               <div class="col-md-2"></div>
               
            </div>
        </div>
        <!--MDB Forms-->
      
    </main>

    <script type="text/javascript">
       jQuery(document).ready(function(){
            jQuery('#submit_form').click(function(e){
            
            jQuery('#email_error').html('').hide();
            jQuery('#password_error').html('').hide();
            jQuery('#signup_error').html('').hide();
            var name = jQuery('.name').val();
            var email = jQuery('.email').val();
            var password = jQuery('.password').val();
            var repassword = jQuery('.repassword').val();

            // disabling button click on click
            jQuery('#submit_form').attr('disabled',true);
            jQuery('.loader').show();
            jQuery('.loader').fadeIn();
            
            jQuery.ajax({
                url:"verify.php",
                type:"post",
                data: {
                    email:email,
                    password:password,
                },
                success:function(data){
                    jQuery('#submit_form').attr('disabled',false);
                    jQuery('.loader').hide();
                    jQuery('#submit_form').html('next');
                    var result = jQuery.parseJSON(data);
                    if (result.status == 'error') {
                        jQuery('#'+result.field).fadeIn();
                        jQuery('#'+result.field).html(result.msg);
                        jQuery('#'+result.field).show();
                    }
                    if (result.status == 'success') {
                      jQuery('#submit_form').attr('disabled',true);
                        jQuery('#'+result.field).html(result.msg);
                        jQuery('#'+result.field).show();
                        window.location = 'index.php';
                    }
                }



            });
        e.preventDefault();
    }); 
});
        </script>
        <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>
  
</body>