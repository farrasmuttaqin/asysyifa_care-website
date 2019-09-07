<!DOCTYPE html>
<html lang="en">

<head>
   <title>Asy-Syifa CARE | About</title>
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

        <?php
            $this->load->view('v_top_header');
        ?> 

        <!-- ***** Navbar Area ***** -->
        <?php
            $this->load->view('v_navbar');
        ?>  
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
         <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(<?php echo base_url(); ?>assets/img/bg-img/header.jpg);">
            <h2>ABOUT US</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-thumbs-up"></i> About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### About Area Start ##### -->
    <section class="about-us-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-5">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>ABOUT US</h2>
                        <p>We are leading in the Islami service fields.</p>
                    </div>
                </div>

                <div class="col-12 col-lg-12">
                    <div class="alazea-benefits-area">
                        <div class="row">
                            <!-- Single Benefits Area -->
                            <div class="col-12 col-sm-12">
                                <div class="single-benefits-area" align="center">
                                    <img src="<?php echo base_url(); ?>assets/img/core-img/b1.png" alt="">
                                    <h5>Our Story</h5>
                                </div>
                                <p style='text-align: justify;'> &nbsp &nbsp Asy-Syifa Care adalah sebuah startup berbasis Aplikasi Mobile & Website yang memudahkan masyarakat dalam menghubungi Professional Pijat, Professional Bekam, maupun Professional Ruqyah secara cepat. Serta memberikan informasi terkait tips-tips cara hidup sehat dan menjual produk-produk halalan thoyyiban kepada pelanggan dengan penawaran kesehatan yang terbaik sesuai dengan kebutuhan pelanggan dengan menerapkan landasan unsur-unsur dengan hukum syariat Islam.</p>
                            </div>

                            <div class="col-12 col-sm-12" style="padding-top: 50px;">
                                <div class="single-benefits-area" align="center">
                                    <img src="<?php echo base_url(); ?>assets/img/core-img/b2.png" alt="">
                                    <h5>Vission</h5>
                                    
                                </div>
                                <p style='text-align: justify;'> &nbsp &nbsp Asy-Syifa Care menjadi layanan jasa yang dapat menjadi sarana untuk menjaga dan meningkatkan kesehatan serta menyembuhkan penyakit atas izin Allah yang dapat dirasakan manfaatnya oleh orang banyak.</p>
                            </div>

                            <div class="col-12 col-sm-12" style="padding-top: 50px;">
                                <div class="single-benefits-area" align="center">
                                    <img src="<?php echo base_url(); ?>assets/img/core-img/b4.png" alt="">
                                    <h5>Mission</h5>
                                </div>
                                <ul style="padding-left:20px;">
                                    <li>
                                        - &nbsp Memudahkan masyarakat dalam menghubungi profesional pijat, bekam, maupun ruqyah secara cepat dengan penawaran kesehatan sesuai dengan kebutuhan pelanggan dan sebagainya). 
                                    </li>
                                    <li>
                                        - &nbsp Memberikan layanan pijat, bekam dan ruqyah di tempat yang pelanggan inginkan (Contoh: Rumah, kantor, dan lain-lain).
                                    </li>
                                    <li>
                                        - &nbsp Menyediakan layanan pijat, bekam, ruqyah yang mudah dan ekonomis.
                                    </li>
                                    <li>
                                        - &nbsp Membuka lapangan pekerjaan bagi para tukang pijat, tukang bekam, dan ahli ruqyah professional.
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="border-line"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Area End ##### -->

    <!-- ##### Team Area Start ##### -->
    <section class="team-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>OUR TEAM</h2>
                        <p>A team of dedicated experienced professionals.</p>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Single Team Member Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-team-member text-center mb-100">
                        <!-- Team Member Thumb -->
                        <div class="team-member-thumb">
                            <img src="img/bg-img/team1.png" alt="">
                            <!-- Social Info -->
                            <div class="team-member-social-info">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <!-- Team Member Info -->
                        <div class="team-member-info mt-30">
                            <h5>Muhammad Fadzly Yusuf</h5>
                            <p>CEO &amp; Founder</p>
                        </div>
                    </div>
                </div>

                <!-- Single Team Member Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-team-member text-center mb-100">
                        <!-- Team Member Thumb -->
                        <div class="team-member-thumb">
                            <img src="img/bg-img/team3.png" alt="">
                            <!-- Social Info -->
                            <div class="team-member-social-info">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <!-- Team Member Info -->
                        <div class="team-member-info mt-30">
                            <h5>Muhammad Iqbal Abdurrazaq</h5>
                            <p>Programmer</p>
                        </div>
                    </div>
                </div>

                <!-- Single Team Member Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-team-member text-center mb-100">
                        <!-- Team Member Thumb -->
                        <div class="team-member-thumb">
                            <img src="img/bg-img/team4.png" alt="">
                            <!-- Social Info -->
                            <div class="team-member-social-info">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <!-- Team Member Info -->
                        <div class="team-member-info mt-30">
                            <h5>Muhammad Rafii Rizqullah</h5>
                            <p>Lead Designer &amp; Social Media Director</p>
                        </div>
                    </div>
                </div>

                 <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-team-member text-center mb-100">
                        <!-- Team Member Thumb -->
                        <div class="team-member-thumb">
                            <img src="img/bg-img/team2.png" alt="">
                            <!-- Social Info -->
                            <div class="team-member-social-info">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <!-- Team Member Info -->
                        <div class="team-member-info mt-30">
                            <h5>Muhammad Farras Muttaqin</h5>
                            <p>Chief Technology Officer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Team Area End ##### -->

     <?php
        $this->load->view('v_footer');
     ?> 
</body>

</html>