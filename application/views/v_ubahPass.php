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
            <h2>Change Password</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-lock"></i> Change Password</li>
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
                        if ($tampung == ""){
                            $hashh = $this->uri->segment(3);
                            $email = $this->uri->segment(4);        
                            echo "
                                <h4 class='m-text16 t-center'>
                                   Enter Your New Password..
                                </h4>
                                <br>
                                <form action='".base_url()."login/changePassword/' method='post' enctype='multipart/form-data'>
                                    <input type='hidden' name='hashh' value=".$hashh." />
                                    <input type='hidden' name='email' value=".$email." />
                                    <div class='search-product m-t-10 pos-relative bo4 of-hidden'>
                                        <input id='password1' class='s-text7 size2 p-l-23 p-r-50' type='password' pattern='.{6,}' title='password requires 6 characters minimum' name='p1' placeholder='Your New Password' required>
                                        <button class='flex-c-m size5 ab-r-m color2 color0-hov trans-0-4'>
                                            <i class='fa fa-key'></i>
                                        </button>
                                    </div>
                                    <div class='search-product m-t-10 pos-relative bo4 of-hidden'>
                                        <input class='s-text7 size2 p-l-23 p-r-50' type='password' id='password2' name='p2' placeholder='Repeat Your New Password' required>
                                        <button class='flex-c-m size5 ab-r-m color2 color0-hov trans-0-4'>
                                            <i class='fa fa-key'></i>
                                        </button>
                                    </div>
                                    <br>
                                    <button type='submit' class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-t-10'>
                                        Change My Password
                                    </button>
                                </form>
                            ";
                        }else{
                            echo "<h4 style='color:green;font-size:24px;' class='m-text16 t-center'>
                                   Change Password Success!
                                  </h4><br>";
                            echo "<h4 style='color:green;font-size:20px;' class='m-text16 t-center'>
                                   Your password has been Reset
                                  </h4><br>
                                  <h4 style='color:green;font-size:20px;' class='m-text16 t-center'>
                                   <a href='".base_url()."login/'>Click Here to Login</a>
                                  </h4>";
                        }
                    ?>
                    
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