<!DOCTYPE html>
<html lang="en">

<head>
    <title>Asy-Syifa CARE | Official Website</title>
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
    <!-- ##### Header Area End ##### -->

    <?php
        if ($loginSukses == 1)
        {
            echo ""; //fungsi pop up berhasil login
        }else{
            echo "";
        }
    ?>
    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-post-slides owl-carousel">

            <div class="single-hero-post">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(<?php echo base_url(); ?>assets/img/bg-img/slider_1.jpg);"></div>
                <div class="container h-100">
                   
                </div>
            </div>

            <!-- Single Hero Post -->
            <div class="single-hero-post">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(<?php echo base_url(); ?>assets/img/bg-img/slider_3.jpg);"></div>
                <div class="container h-100">
                   
                </div>
            </div>

            <div class="single-hero-post">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(<?php echo base_url(); ?>assets/img/bg-img/slider_222.jpg);"></div>
                <div class="container h-100">
                   
                </div>
            </div>

        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Service Area Start ##### -->
    <section class="our-services-area bg-gray section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>OUR SERVICES</h2>
                        <p>We provide the perfect service for you.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-between">
                <div class="col-12 col-lg-12">
                    <div class="alazea-video-area bg-overlay mb-100" >
                        <img  src="<?php echo base_url(); ?>assets/img/bg-img/slider_33.jpg" alt="">
                        <a href="https://www.youtube.com/embed/SZlUbxJ_ZFc" class="video-icon">
                            <i class="fa fa-play" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Service Area End ##### -->

    <!-- ##### About Area Start ##### -->
    <section class="about-us-area section-padding-100-0">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-12" align="center">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>Top Product</h2>
                        <p>These are Our Top Products</p>
                    </div>

                    <!-- Progress Bar Content Area -->
                </div>

                <div class="col-12 col-lg-12" align="center">
                    <div class="alazea-benefits-area">
                        <div class="row">
                            <!-- Single Benefits Area -->
                            <?php foreach ($best_product as $best) { ?>
                            <div class="col-12 col-lg-6">
                                <div class="single-benefits-area">
                                    <a href='<?php echo base_url(); ?>product/detailProduct/<?php echo $best->id_product; ?>' >
                                        <img width="300" height="400px" src="<?php echo base_url(); ?>assets/products/<?php echo $best->gambar_product; ?>" alt="">
                                    </a>
                                    <a href='<?php echo base_url(); ?>product/detailProduct/<?php echo $best->id_product; ?>' >
                                    <h5><?php echo $best->nama_product; ?></h5>
                                    </a>
                                    <p><?php echo "Rp. ".strrev(implode('.',str_split(strrev(strval($best->harga_product)),3))); ?> </p>
                                    <div class='ratings' style="color:yellow;">
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
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

    <!-- ##### Portfolio Area Start ##### -->
    
    <!-- ##### Portfolio Area End ##### -->

    <!-- ##### Testimonial Area Start ##### -->
    <section class="testimonial-area section-padding-100">
        <div class="section-heading text-center">
                            <h2>TESTIMONIAL</h2>
                            <p>Some kind words from costumers about Asy-Syifa CARE</p>
                        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testimonials-slides owl-carousel">
                        

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-thumb">
                                        <img src="<?php echo base_url(); ?>assets/img/testimonial/ichsan.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-content">
                                        <h5>“Startup Asy-Syifa CARE! Mau urut, mau bekam, atau... Ruqyah?? Di Asy-Syifa CARE AJA!!”</h5>
                                        </br>
                                        <div class="testimonial-author-info">
                                            <h6>Muhamad Ichsan</h6>
                                            <p>LEADER of LDK ASSALAM 2018</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-thumb">
                                        <img src="<?php echo base_url(); ?>assets/img/testimonial/eva.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-content">
                                        <!-- Section Heading -->
                                        <h5>“Bagusss banget kalo mau pijat bisa hubungi Asy Syifa ajaaa. Don't Forget sudah ahli lohhhh.”</h5>
                                        </br>
                                        <div class="testimonial-author-info">
                                            <h6>Eva Septiawati</h6>
                                            <p>LEADER of MPM Universitas Trilogi 2018</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-thumb">
                                        <img src="<?php echo base_url(); ?>assets/img/testimonial/ridhan.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-content">
                                        <!-- Section Heading -->
                                        <h5>“Cara baru memesan kang pijet ala mahasiswa.”</h5>
                                        </br>
                                        <div class="testimonial-author-info">
                                            <h6>Rafi Ridhan</h6>
                                            <p>EMPLOYEE</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Testimonial Area End ##### -->
    <section class="alazea-blog-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>BLOG & PROMO</h2>
                        <p>These are our Blog & Promotion</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

                <!-- Single Blog Post Area -->
                <?php foreach($blog as $log) { ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-blog-post mb-100">
                        <div class="post-thumbnail mb-30">
                            <a href="<?php echo base_url('blog/detailBlog/'.$log->id_paper.'/'); ?>"><img src="<?php echo base_url(); ?>assets/img/blog/<?php echo $log->thumbnail; ?>" alt=""></a>
                        </div>
                        <div class="post-content">
                            <a href="single-post.html" class="post-title">
                                <h5><?php echo $log->judul; ?></h5>
                            </a>
                            <div class="post-meta">
                                <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $log->tanggal_publish; ?></a>
                                <a href="#"><i class="fa fa-user" aria-hidden="true"></i><?php echo $log->nama_pembuat; ?></a>
                            </div>
                            <p class="post-excerpt"><?php $tampung = substr($log->kalimat_pendek, 0, 200).'...'; echo $tampung; ?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- ##### Blog Area Start ##### -->
    <section class="alazea-blog-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>RECENT ARTICLE</h2>
                        <p>Our recent article</p>
                    </div>
                    <div class="portfolio-slides owl-carousel mb-100">
                        <!-- Single Portfolio Slide -->
                        <?php foreach($recent as $paper) { ?>
                        <div class="single-portfolio-slide">
                            <a href="<?php echo base_url('article/detailArticle/'.$paper->id_paper.'/'); ?>"><img src="<?php echo base_url('assets/img/article/'.$paper->thumbnail); ?>" alt=""></a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Blog Area End ##### -->
    
    <!-- ##### Subscribe Area Start ##### -->
    <section class="subscribe-newsletter-area" style="background-image: url(img/bg-img/subscribe.png);">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-5">
                    <!-- Section Heading -->
                    <div class="section-heading mb-0">
                        <h2>Join the Newsletter</h2>
                        <p>Subscribe to our newsletter and get the latest information from Asy-Syifa CARE</p>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="subscribe-form">
                        <form action="<?php echo base_url(); ?>subscribe/index" method="post" onsubmit="return alert('Terima kasih sudah subcribe website kami :)');">
                            <input type="email" name="email" pattern='[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$' id="subscribeEmail" placeholder="Enter your email.." required>
                            <button type="submit" class="btn alazea-btn">SUBSCRIBE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subscribe Side Thumbnail -->
        <div class="subscribe-side-thumb wow fadeInUp" data-wow-delay="500ms">
            <img class="first-img" src="<?php echo base_url(); ?>assets/img/core-img/leaf.png" alt="">
        </div>
    </section>
    <!-- ##### Subscribe Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-5">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>GET IN TOUCH</h2>
                        <p>Send us a message !</p>
                    </div>
                    <!-- Contact Form Area -->
                    <div class="contact-form-area mb-100">
                        <form action="<?php echo base_url(); ?>subscribe/contact/" method="post" onsubmit="return alert('Pesan anda sudah kami tampung, kami akan segera membalas pesan anda melalui e-mail anda');">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="contact-name" placeholder="Your Name" name="name" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="contact-email" placeholder="Your Email" name="email" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="contact-subject" placeholder="Subject" name="subject" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message" name="message" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn alazea-btn mt-15">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <!-- Google Maps -->
                    <div class="map-area mb-100">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.382724896959!2d106.83232491483933!3d-6.344456663838693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ec33e40b7323%3A0x256f1f48e2bdff3b!2sJl.+Gardu+I+No.2a%2C+RT.10%2FRW.2%2C+Srengseng+Sawah%2C+Jagakarsa%2C+Kota+Jakarta+Selatan%2C+Daerah+Khusus+Ibukota+Jakarta+12630!5e0!3m2!1sid!2sid!4v1544276517933" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    

        <!-- Footer Bottom Area -->
        <?php
            $this->load->view('v_footer');
        ?> 
        
</body>

</html>
