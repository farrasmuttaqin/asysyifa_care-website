<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | Asy-Syifa CARE</title>
    <?php
        $this->load->view('v_header');
    ?>     
</head>
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
            <h2>Sign In / Sign Up</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-lock"></i> Sign In / Sign Up</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="bgwhite p-t-60">
        <div class="container">
            <?php
                if ($status != ""){
                    echo "<div class='row' style='text-align:center;padding-bottom:30px;'>
                        <div class='col-md-12 p-b-20'>
                            <h4 style='color:red;'>$status</h4>
                        </div>
                    </div>";
                }
            ?>
            <div class="row">
                <div class="col-md-5 p-b-20">
                    <h4 class="m-text16 t-center">
                        Sign In
                    </h4>
                    <br>
                    <form action='<?php echo base_url()."login/loginAction/"; ?>' method='post' enctype='multipart/form-data'>
                        <?php
                            if ($tampungLogin == 99)
                            {
                                echo "<h4 style='color:red;font-size:20px;' class='m-text16 t-center'>Login Failed <br> Your Email / Password Wrong.</h4><br>";
                            }
                            if ($tampungLogin == 999)
                            {
                                foreach ($data_userFalse as $akun){
                                   $_SESSION["emailFalse"] = $akun->email;
                                   $_SESSION["hashh"] = $akun->hashh;
                                }
                                
                                $verify=$this->uri->segment(3);

                                if (!$verify == 1){
                                    echo "<h4 style='color:red;font-size:20px;' class='m-text16 t-center'>Account Not Activated <br>You Must Activate your Account to Sign In<br>Please Check Activation Link at <br><br> ".$_SESSION["emailFalse"]." <br><br></h4>";
                                    echo "<div class='forget m-t-5 t-center' >
                                            <a class='forget m-t-5 t-center' href='".base_url()."login/sentVerification/'>Didn't Receive Activation Code? Click Here to Resend it</a>
                                          </div><br>";
                                }else{
                                    echo "<h4 style='color:red;font-size:20px;' class='m-text16 t-center'>Activation Code Sent <br> Now you can check Activation Code at <br><br> ".$_SESSION["emailFalse"]." <br><br></h4>";
                                    echo "<div class='forget m-t-5 t-center' >
                                            <a  class='forget m-t-5 t-center' href='".base_url()."login/sentVerification/'>Click Here to Resend the Code Again.</a>
                                            </div><br>
                                    ";
                                }
                            }
                        ?>
                        <div class='search-product pos-relative bo4 of-hidden'>
                            <input class='s-text7 size2 p-l-23 p-r-50' pattern='[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$' type='email' name='e1' placeholder='Email' required>
                            <button class='flex-c-m size5 ab-r-m color2 color0-hov trans-0-4'>
                                <i class='icon_mail'></i>
                            </button>
                        </div>
                        <div class='search-product m-t-10 pos-relative bo4 of-hidden'>
                            <input class='s-text7 size2 p-l-23 p-r-50' type='password' name='p1' placeholder='Password' required>
                            <button class='flex-c-m size5 ab-r-m color2 color0-hov trans-0-4'>
                                <i class='fa fa-key'></i>
                            </button>
                        </div>
                        <br>
                        <div class='forget m-t-5 t-center'>
                            <a class='fs-13' href='<?php echo base_url()."login/forgotPassword/"; ?>'><i class='fa fa-undo'></i> Forgot Password?</a>
                        </div>
                        <br>
                        <button type='submit' class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-t-10'>
                            Login
                        </button>
                    </form>
                </div>
                <div class="col-md-2">
                    <h4 class="m-text16 t-center">
                            OR
                    </h4>
                </div>
                
                <div class="col-md-5">
                    <h4 class="m-text16 t-center">
                            Sign Up
                    </h4>
                    <br>
                    <?php
                        if ($tampung == 1)
                        {
                            echo "<h4 style='color:green;font-size:20px;' class='m-text16 t-center'>Sign Up Success !! </h4><br><h4 style='font-size:19px;color:red'>You Must Activate your Account in Order to Sign In <br><br>Check Your Email and Click Our Activation Code</h4>";
                        }else {
                            if ($tampung == 2 || $tampung == 3 || $tampung == "" || $tampung == 99)
                            {
                                if ($tampung == 2)
                                {
                                    echo "<h4 style='color:red;font-size:20px;' class='m-text16 t-center'>Sign Up Failed, Your Email or Phone Number Already Registered</h4><br>";
                                }
                                if ($tampung == 3)
                                {
                                    echo "<h4 style='color:red;font-size:20px;' class='m-text16 t-center'>Your Email Is not Exist <br> Please Register with Your Real Email Address</h4><br>";
                                }
                                if ($tampung == "" || $tampung == 99)
                                {
                                    echo "";
                                }
                                echo "
                                <form action='".base_url()."login/register/' method='post' enctype='multipart/form-data'>
                                    <div class='search-product pos-relative bo4 of-hidden m-b-10'>
                                        <input class='s-text7 size2 p-l-23 p-r-50' type='text' name='namaLengkap' placeholder='Full Name' required>
                                        <button class='size5 ab-r-m color2 color0-hov trans-0-4'>
                                            <i class='fa fa-users'></i>
                                        </button>
                                    </div>
                                    <div class='search-product m-t-10 pos-relative bo4 of-hidden'>
                                        <input placeholder='Phone Number' class='s-text7 size2 p-l-23 p-r-50' type='number' name='notel2' required>
                                        <button class='flex-c-m size5 ab-r-m color2 color0-hov trans-0-4'>
                                            <i class='fa fa-key'></i>
                                        </button>
                                    </div>
                                    <div class='search-product m-t-10 pos-relative bo4 of-hidden'>
                                        <input class='s-text7 size2 p-l-23 p-r-50' pattern='[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$' type='email' name='email2' placeholder='Email' required>
                                        <button class='flex-c-m size5 ab-r-m color2 color0-hov trans-0-4'>
                                            <i class='icon_mail'></i>
                                        </button>
                                    </div>
                                    <div class='search-product m-t-10 pos-relative bo4 of-hidden'>
                                        <input id='password1' pattern='.{6,}' title='password requires 6 characters minimum' class='s-text7 size2 p-l-23 p-r-50' type='password' name='password1' placeholder='Password' required>
                                        <button class='flex-c-m size5 ab-r-m color2 color0-hov trans-0-4'>
                                            <i class='fa fa-key'></i>
                                        </button>
                                    </div>
                                    <div class='search-product m-t-10 pos-relative bo4 of-hidden'>
                                        <input id='password2' class='s-text7 size2 p-l-23 p-r-50' type='password' name='password2' placeholder='Confirm Password' required>
                                        <button class='flex-c-m size5 ab-r-m color2 color0-hov trans-0-4'>
                                            <i class='fa fa-key'></i>
                                        </button>
                                    </div>
                                    <br>
                                    <button type='submit' class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-t-20 m-b-50'>
                                        Create Account
                                    </button>
                                </form>
                                ";
                            }
                        }
                    ?>
                </div>
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