<!DOCTYPE html>
<html lang="en">

<head>
    <title>Asy-Syifa CARE | Article</title>
    <?php
        $this->load->view('v_header');
    ?>     
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/pagination/src/jquery.paginate.css" />
    <style>
        .paginate { padding: 0; margin: 0; }
        .paginate > li { list-style: none; padding: 10px 20px; border: 1px solid #ddd; margin: 10px 0; }
    </style>
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

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(<?php echo base_url(); ?>assets/img/bg-img/header.jpg);">
            <h2>Article</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-book"></i> Article</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

	<!-- content page -->
	<section class="bgwhite p-t-60">
		<div class="container">
			<div class="row" id="pagin">
                <?php foreach($article as $paper){ ?>
			    <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-blog-post mb-100">
                        <div class="post-thumbnail mb-30 item-blog-img pos-relative dis-block">
                            <a href="<?php echo base_url('article/detailArticle/'.$paper->id_paper.'/'); ?>"><img src="<?php echo base_url('assets/img/article/'.$paper->thumbnail); ?>" alt=""></a>
                        </div>
                        <div class="post-content">
                            <a href="<?php echo base_url('article/detailArticle/'.$paper->id_paper.'/'); ?>" class="post-title">
                                <h5><?php echo $paper->judul; ?></h5>
                            </a>
                            <div class="post-meta">
                                <a href="<?php echo base_url('article/detailArticle/'.$paper->id_paper.'/'); ?>"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $paper->tanggal_publish; ?></a>
                                <a href="<?php echo base_url('article/detailArticle/'.$paper->id_paper.'/'); ?>"><i class="fa fa-user" aria-hidden="true"></i><?php echo $paper->nama_pembuat; ?></a>
                            </div>
                            <p style="text-align:justify;" class="post-excerpt"><?php $tampung = substr($paper->kalimat_pendek, 0, 200).'...'; echo $tampung; ?></p>
                            <br>
                            <a href="<?php echo base_url('article/detailArticle/'.$paper->id_paper.'/'); ?>" class="btn alazea-btn w-40">
							Read More
						    </a>
                        </div>
                    </div>
                </div>
                <?php } ?>
			</div>
		</div>
	</section>
     <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/pagination/src/jquery.paginate.js"></script>

    <script>
        //call paginate
        $('#pagin').paginate();
    </script>

    <!-- ##### Footer Area Start ##### -->
    <?php
        $this->load->view('v_footer');
    ?> 
</body>

</html>