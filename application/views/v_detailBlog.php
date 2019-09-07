<!DOCTYPE html>
<html lang="en">

<head>
    <title>Detail Blog | Asy-Syifa CARE</title>
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
    <?php
        $tampungXYZ =0;
    ?>
    <!-- ##### Blog Content Area Start ##### -->
    <section class="blog-content-area section-padding-0-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Blog Posts Area -->
                <div class="col-12 col-md-8">
                    <div class="blog-posts-area">
                        <?php foreach($blog as $paper) { $tampungXYZ ++;?>
                        
                        <!-- Post Details Area -->
                        <div class="single-post-details-area">
                            <div class="post-content" style="text-align: justify;"> 
                                <h4 class="post-title"><?php echo $paper->judul; ?></h4>
                                <div class="post-meta mb-30">
                                    <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $paper->tanggal_publish; ?></a>
                                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i><?php echo $paper->nama_pembuat; ?></a>
                                </div>
                                <div class="post-thumbnail mb-30" align="center">
                                    <img style="max-width: 80%;" src="<?php echo base_url(); ?>assets/img/blog/<?php echo $paper->thumbnail; ?>" alt="">
                                </div>
                                <?php echo $paper->isi; ?>
                            </div>
                        </div>

                        <!-- Post Tags & Share -->
                        <div class="post-tags-share d-flex justify-content-between align-items-center">
                            <!-- Tags -->
                            <ol class="popular-tags d-flex align-items-center flex-wrap">
                                <li><span>Tag:</span></li>
                                <li><a>Asy-Syifa CARE</a></li>
                                <li><a><?php echo $paper->tags; ?></a></li>
                            </ol>
                        </div>
                        <?php } 

                        if ($tampungXYZ == 0){
                            redirect(base_url());
                        }?>
                        <!-- Comment Area Start -->
                        <div class="comment_area clearfix">
                            <?php $tampungKomen = 0; foreach ($comment as $komen) {$tampungKomen++;} 

                            if ($tampungKomen==0){
                                    echo "";
                                }else{
                                echo "<h4 class='headline'>".$tampungKomen." Comments</h4>";
                            }
                            ?>
                            

                            <ol>
                                <!-- Single Comment Area -->
                                <li class="single_comment_area">
                                    <?php foreach ($comment as $komen) { ?>
                                    <div class="comment-wrapper d-flex">
                                        <!-- Comment Meta -->
                                        <div class="comment-author">
                                            <img src="img/bg-img/37.jpg" alt="">
                                        </div>
                                        <!-- Comment Content -->
                                        <div class="comment-content">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h5><?php echo $komen->nama; ?></h5>
                                                <span class="comment-date"><?php echo $komen->tanggal_komen; ?></span>
                                            </div>
                                            <p><?php echo $komen->komen; ?></p>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </li>
                            </ol>
                        </div>

                        <!-- Leave A Comment -->
                        <?php if ($_SESSION["email"]==""){
                        echo "<a href='".base_url()."login/'><button style='background-color: red;border-color: red;' class='btn alazea-btn'>Sign In to Post Comment</button></a>";
                            }else{
                            $id_blog=$this->uri->segment(3);
                            echo "<div class='leave-comment-area clearfix'>
                                    <div class='comment-form'>
                                        <h4 class='headline'>Leave A Comment</h4>

                                        <div class='contact-form-area'>
                                            <!-- Comment Form -->
                                            <form action='".base_url()."blog/inputComment/' method='post' ";?> onsubmit="return confirm('Komen yang anda berikan tidak bisa di hapus, yakin beri komen ?');" <?php echo ">
                                                <div class='row'>
                                                    <div class='col-12'>
                                                        <div class='form-group'>
                                                            <textarea class='form-control' name='komen' id='message' cols='30' rows='10' placeholder='Comment' required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class='col-12'>
                                                        <input type='hidden' name='id_blog' value='".$id_blog."' />
                                                        <input type='submit' class='btn alazea-btn' value='Post Comment' />
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>";
                            }
                            ?>
                    </div>
                </div>

                <!-- Blog Sidebar Area -->
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
                                <div class="post-content" >
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
    <!-- ##### Blog Content Area End ##### -->
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