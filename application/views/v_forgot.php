<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | Asy-Syifa CARE</title>
    <?php
        $this->load->view('v_header');
    ?>     
</head>
<?php
        $tampungURL = base_url();
        if (!$_SESSION["email"]==""){
            header("Location: $tampungURL");
        }
?>
<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="<?php echo base_url(); ?>assets/img/core-img/logo4.png" alt="">
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- ***** Top Header Area ***** -->
        <?php
            $this->load->view('v_top_header');
        ?> 

        <!-- ***** Navbar Area ***** -->
        <?php
            $this->load->view('v_navbar');
        ?>   
    </header>
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(<?php echo base_url(); ?>assets/img/bg-img/header.jpg);">
            <h2>Forgot Password</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-lock"></i> Forgot Password</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="bgwhite p-t-60">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 p-b-20">
                    <?php
                        if (!$tampungForgot == ""){
                                if ($tampungForgot == 1){
                                    echo "<h4 style='color:green;font-size:20px;' class='m-text16 t-center'>
                                            Password Reset Link has been Sent to your Email
                                        </h4>";
                                }else{
                                    echo "<h4 style='color:red;font-size:20px;' class='m-text16 t-center'>
                                            Your Email Address is not Registered <br> Please Register at Asy-Syifa CARE
                                        </h4>";
                                }
                        }else{
                            echo "<h4 class='m-text16 t-center'>
                                        Enter Your Email..
                                    </h4>";
                        }
                    ?>
                    
                    <br>
                    <form action='<?php echo base_url()."login/forgotAction/"; ?>' method='post' enctype='multipart/form-data'>
                        <div class='search-product pos-relative bo4 of-hidden'>
                            <input class='s-text7 size2 p-l-23 p-r-50' pattern='[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$' type='email' name='email' placeholder='Your Email..' required>
                            <button class='flex-c-m size5 ab-r-m color2 color0-hov trans-0-4'>
                                <i class='icon_mail'></i>
                            </button>
                        </div>
                        <br>
                        <button type='submit' class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-t-10'>
                            Forgot Password
                        </button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>
     <!-- Footer Bottom Area -->
    <?php
        $this->load->view('v_footer');
    ?> 

    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    <script>
            var password = document.getElementById("password1")
          , confirm_password = document.getElementById("password2");
        
        function validatePassword(){
          if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
          } else {
            confirm_password.setCustomValidity('');
          }
        }
        
        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
        
</body>

</html>