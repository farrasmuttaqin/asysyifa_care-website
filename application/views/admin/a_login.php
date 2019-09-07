<!doctype html>
<html class="no-js" lang="en">

<?php
    $this->load->view('admin/a_header');
?> 


<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-bg">
        <div class="container">
            <div class="login-box ptb--100">
                <form action='<?php echo base_url()."Admin/loginAction/"; ?>' method='post' enctype='multipart/form-data'>
                    <div class="login-form-head">
                        <a href='<?php echo base_url(); ?>Admin/' class="nav-brand"><img style="width:200px;height:85px;" src="<?php echo base_url(); ?>assets/img/core-img/logo1.png" alt="Asy-Syifa CARE"></a>
                        <h4>Login</h4>
                    </div>
                    <div class="login-form-body">
                    <?php
                        if ($tampungLogin == 99)
                        {
                            echo "<h4 style='color:red;font-size:20px;' class='m-text16 t-center'><br> Username / Password Wrong</h4><br>";
                        }
                        
                            echo "<div class='form-gp'>
                                <label for='exampleInputEmail1'>Username</label>
                                <input type='text' name='username'>
                                <i class='ti-email'></i>
                            </div>
                            <div class='form-gp'>
                                <label for='exampleInputPassword1'>Password</label>
                                <input type='password' name='pass'>
                                <i class='ti-lock'></i>
                            </div>
                            <div class='row mb-4 rmber-area'>
                                <div class='col-6'>
                                    <div class='custom-control custom-checkbox mr-sm-2'>
                                        <input type='checkbox' class='custom-control-input' id='customControlAutosizing'>
                                        <label class='custom-control-label' for='customControlAutosizing'>Remember Me</label>
                                    </div>
                                </div>
                            </div>
                            <div class='submit-btn-area'>
                                <button id='form_submit' type='submit'>Login <i class='ti-arrow-right'></i></button>
                            </div>";
                        
                    ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
        $this->load->view('admin/a_footer');
    ?> 
</body>

</html>