<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blog | Asy-Syifa CARE</title>
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
            <h2>Blog</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-paper-plane"></i> Blog</li>
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
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-75">
					<div class="p-r-50 p-r-0-lg" id="pagin">
						<!-- item blog -->
						<?php foreach($blog as $log){ ?>
						<div class="item-blog p-b-80">
							<a href="<?php echo base_url('blog/detailBlog/'.$log->id_paper.'/'); ?>" class="item-blog-img pos-relative dis-block hov-img-zoom">
								<div align="center">
									<img style="max-width:80%;" src="<?php echo base_url(); ?>assets/img/blog/<?php echo $log->thumbnail; ?>" alt="IMG-BLOG">
								</div>
								<span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">
									<?php echo $log->tanggal_publish; ?>
								</span>
							</a>

							<div class="item-blog-txt p-t-33">
								<h4 class="p-b-11">
									<a href="<?php echo base_url('blog/detailBlog/'.$log->id_paper.'/'); ?>" style="font-size:30px;">
										<?php echo $log->judul; ?>
									</a>
								</h4>

								<div class="s-text8 flex-w flex-m p-b-21">
									<span>
										<?php echo $log->nama_pembuat; ?>
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										<?php echo $log->tags; ?>
										<span class="m-l-3 m-r-6">|</span>
									</span>
								</div>

								<p class="p-b-12">
									<?php $tampung = substr($log->kalimat_pendek, 0, 200).'...'; echo $tampung; ?>
								</p>

								<a href="<?php echo base_url('blog/detailBlog/'.$log->id_paper.'/'); ?>" class="s-text20">
									Continue Reading
									<i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
								</a>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>

				<div class="col-md-4 col-lg-3 p-b-75">
					<div class="rightbar">
						<!-- Featured Products -->
						<div class="single-widget-area">
                            <!-- Title -->
                            <div class="widget-title">
                                <h4>Featured Blog & Promo</h4>
                            </div>
                            <?php foreach($recent as $post) { ?>
                            <!-- Single Latest Posts -->
                            <div class="single-latest-post d-flex align-items-center">
                                <div class="post-thumb">
                                    <img src="<?php echo base_url(); ?>assets/img/blog/<?php echo $post->thumbnail; ?>" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="<?php echo base_url('blog/detailBlog/'.$post->id_paper.'/'); ?>" class="post-title">
                                        <h6><?php echo $post->judul; ?></h6>
                                    </a>
                                    <a href="<?php echo base_url('blog/detailBlog/'.$post->id_paper.'/'); ?>" class="post-date"><?php echo $post->tanggal_publish; ?></a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
						<!-- Tags -->
						<div class="single-widget-area">
                            <!-- Title -->
                            <div class="widget-title">
                                <h4>Tag Cloud</h4>
                            </div>
                            <!-- Tags -->
                            <ol class="popular-tags d-flex flex-wrap">
                                <?php foreach($tags as $tag) { ?>
                                <li><a><?php echo $tag->tags; ?></a></li>
                                <?php } ?>
                            </ol>
                        </div>

						 <div class="single-widget-area">
                            <!-- Title -->
                            <div class="widget-title">
                                <h4>BEST SELLER</h4>
                            </div>

                             <?php
                                foreach($best_product as $best){
                                    echo " <div class='single-best-seller-product d-flex align-items-center'>
                                        <div class='product-thumbnail'>
                                            <a href='".base_url()."product/detailProduct/".$best->id_product."/'><img src='".base_url()."assets/products/".$best->gambar_product."' alt=''></a>
                                        </div>
                                        <div class='product-info'>
                                            <a href='".base_url()."product/detailProduct/".$best->id_product."/'>".$best->nama_product."</a>
                                            <p>Rp. ".strrev(implode('.',str_split(strrev(strval($best->harga_product)),3)))."</p>
                                            <div class='ratings'>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                            </div>
                                        </div>
                                        </div>";
                                }
                            ?>
                        </div>
					</div>
				</div>
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