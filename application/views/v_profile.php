<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Profile | Asy-Syifa CARE</title>
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

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(<?php echo base_url(); ?>assets/img/bg-img/header.jpg);">
            <h2>Profile</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user-o"></i> My Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area mb-100">
        <div class="container" style="width:70%;">
            <div class="row" >
                <div class="col-12 col-lg-11">
                    <div class="checkout_details_area clearfix">
                        <div style="text-align: center;">
                            <h5 style="color:green;"><i class="fa fa-user-circle" aria-hidden="true"></i></h5>
                            <h5>My Profile</h5>
                            <?php
                                $tampung = $this->uri->segment(3);
                                if (!$tampung == ""){
                                    if ($tampung == 1){
                                        echo "<h5 style='color:green;'>Ganti Password Berhasil !!</h5>";
                                    }
                                    if ($tampung == 2){
                                        echo "<h5 style='color:red;'>Ganti Password Gagal, Password Sebelumnya Salah</h5>";
                                    }
                                    if ($tampung == 3){
                                        echo "<h5 style='color:green;'>Ganti Nomor Handphone Berhasil !!</h5>";
                                    }
                                    if ($tampung == 4){
                                        echo "<h5 style='color:red;'>Ganti Nomor Handphone Gagal, Nomor Handphone Baru sudah Terdaftar</h5>";
                                    }
                                }
                            ?>
                        </div>
                        <div class="row" style="color:black;">
                            <div class="col-md-12 mb-4" style="border-bottom:0.5px solid black;padding-top:20px;">
                                <label style="float:left;">Nama Lengkap</label>
                                <label style="float:right;"><?php echo $_SESSION["nama_lengkap"]; ?></label>
                            </div>
                            <div class="col-12 mb-4" style="border-bottom:0.5px solid black;padding-top:30px;">
                                <label style="float:left;">Alamat Email</label>
                                <label style="float:right;color:green"><?php echo $_SESSION["email"]; ?> &nbsp <i class="fa fa-check" aria-hidden="true"></i> Verified</label>
                            </div>
                            <div class="col-md-12 mb-4" style="border-bottom:0.5px solid black;padding-top:30px;">
                                <label style="float:left;">Nomor Handphone</label>
                                <label style="float:right;"><?php echo $_SESSION["nomor_hp"]; ?></label>
                            </div>
                            <div class="col-md-12 mb-4" style="border-bottom:0.5px solid black;padding-top:30px;">
                                <label style="float:left;">Awal Bergabung</label>
                                <label style="float:right;"><?php echo $_SESSION["awal_join"]; ?></label>
                            </div>
                            <div class="clearfix" style="padding-top:20px;">
                                <!-- Tabs -->
                                <ul class="nav nav-tabs" role="tablist" id="product-details-tab">
                                    <li class="nav-item">
                                        <a href="#ubahPassword" class="nav-link" data-toggle="tab" role="tab">Ubah Password <span class="text-muted"></span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#ubahHP" class="nav-link" data-toggle="tab" role="tab">Ubah Nomor Handphone <span class="text-muted"></span></a>
                                    </li>
                                </ul>
                                <!-- Tab Content -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade" id="ubahPassword">
                                        <div class="submit_a_review_area mt-50">
                                            <form action="<?php echo base_url().'profile/doChangePass/'; ?>" method="post" onsubmit="return confirm('Yakin ubah Password ?');">
                                                <div class="row">
                                                    <div class="col-12 col-md-12">
                                                        <div class="form-group">
                                                            <input style="padding-left:10px;" type="password" name="oldPass" placeholder="Password Sebelumnya.." required />
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="col-12 col-md-12">
                                                        <div class="form-group">
                                                            <input style="padding-left:10px;" id="password1" type="password" pattern='.{6,}' title='password requires 6 characters minimum' name="password1" placeholder="Password Baru.." required />
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="col-12 col-md-12">
                                                        <div class="form-group">
                                                            <input style="padding-left:10px;" type="password" id="password2" name="password2" placeholder="Ulangi Password Baru" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-12" style="padding-top:20px;">
                                                        <button type="submit" class="btn alazea-btn">Ubah Password</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="ubahHP">
                                        <div class="submit_a_review_area mt-50">
                                            <form action="<?php echo base_url().'profile/doChangeHP/'; ?>" method="post" onsubmit="return confirm('Yakin ubah Nomor Handphone ?');">
                                                <div class="row" style="width:85%;">
                                                    <div class="col-12 col-md-12">
                                                        <div class="form-group">
                                                            <input style="padding-left:10px;" type="number" name="notel" placeholder="Nomor Handphone Baru.." required />
                                                        </div>
                                                    </div>
                                                    <div class="col-12" style="padding-top:20px;">
                                                        <button type="submit" class="btn alazea-btn">Ganti Nomor Handphone</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->

   <?php
        $this->load->view('v_footer');
    ?> 

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