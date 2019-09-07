<!DOCTYPE html>
<html lang="en">

<head>
    <title>Asy-Syifa CARE | Detail Product</title>
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
    <?php
        foreach($detail as $detailProduct){
            $deskripsi_product = $detailProduct->deskripsi_product;
            $addInfo = $detailProduct->addinfo_product;
            $nama = $detailProduct->nama_product;
            $harga = $detailProduct->harga_product;
            $desSingkat = $detailProduct->deskripsi_singkat_product;

            if ($detailProduct->jenis_product == "cosmetic dan home care"){
                $id_pro = "CHC001";
                $tags = "Asy-Syifa CARE, Cosmetic, Home Care, Product";
            }
            if ($detailProduct->jenis_product == "healthy food dan beverage"){
                $id_pro = "HFB010";
                $tags = "Asy-Syifa CARE, Healthy, Food, Beverage, Product";
            }
            if ($detailProduct->jenis_product == "herbs"){
                $id_pro = "H100";
                $tags = "Asy-Syifa CARE, Herbs, Product";
            }
            $id = $detailProduct->id_product;
            $jenis = $detailProduct->jenis_product;
            $stock = $detailProduct->stock;
            $gambar_product=$detailProduct->gambar_product;
        }

        foreach($cartz as $keranjang){
            $tampung = $keranjang->quantity;
        }

        $max=$stock-$tampung;
    ?>  
   <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(<?php echo base_url(); ?>assets/img/bg-img/header.jpg);">
            <h2>Product Detail</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $nama; ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area mb-50">
        <div class="produts-details--content mb-50">
            <div class="container">
                <div class="row justify-content-between">
                <?php
                    echo "
                    <div class='col-12 col-md-6 col-lg-5'>
                        <div class='single_product_thumb'>
                            <div id='product_details_slider' class='carousel slide' data-ride='carousel'>
                                <div class='carousel-inner'>
                                    <div class='carousel-item active' style='text-align: center;'>
                                        <img class='d-block' style='height:400px;width:300px;' src='".base_url()."assets/products/".$gambar_product."' alt='1'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='col-12 col-md-6'>
                        <div class='single_product_desc'>
                            <h4 class='title'>".$nama."</h4>
                            <h4 class='price'>Rp. ".strrev(implode('.',str_split(strrev(strval($harga)),3)))."</h4>
                            <div class='short_overview'>
                                <p>".$desSingkat."</p>
                            </div>

                            <div class='cart--area d-flex flex-wrap align-items-center'>
                                <!-- Add to Cart Form -->
                                ";
                                ?>
                                <?php
                                    if (!$stock == 0)
                                    {
                                        if($stock == $tampung)
                                        {
                                            echo "<h4 style='color:red;font-size:16px;'> Anda Sudah Memasukkan Seluruh Stock Product ".$nama." Ke Dalam Keranjang</h4>";
                                        }else{
                                ?>
                                <form action='<?php echo base_url()."cart/inputCart/"; ?>' class="cart clearfix d-flex align-items-center" method="post" onsubmit="return confirm('Masukkan Produk Kedalam Keranjang ?');">
                                    <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="<?php echo $max; ?>" name="quantity" value="1">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                        <input type="hidden" name="id_product" value="<?php $t=$this->uri->segment(3); echo $t; ?>">
                                        <input type="hidden" name="nama_product" value="<?php echo $nama; ?>">
                                        <input type="hidden" name="gambar_product" value="<?php echo $gambar_product; ?>">
                                        <input type="hidden" name="harga_product" value="<?php echo $harga; ?>">
                                    </div>
                                    <button type="submit" name="addtocart" value="5" class="btn alazea-btn ml-15">Add to cart</button>
                                </form>
                                <?php
                                        }
                                    }else{
                                        echo "<h4 style='color:red;font-size:22px;' class='title'> MAAF, PRODUCT INI SEDANG KOSONG</h4>";
                                    }
                                ?>
                                <?php
                                echo "
                            </div>
                            ";
                            if ($tampung > 0){
                                echo "<div class='products--meta'>
                                        <h5 style='color:green;'>'Sudah ada ".$tampung." di Keranjang '</h5>
                                    </div>";
                            }
                            echo "
                            <div class='products--meta'>
                                <p><span>ID Product :</span> <span>".$id_pro.$id."</span></p>
                                <p><span>Jenis Product :</span> <span>".$jenis."</span></p>
                                <p><span>Stock di Gudang :</span> <span>".$stock." Buah</span></p>
                                <p><span>Tags :</span> <span>".$tags."</span></p>
                            </div>
                        </div>
                    </div>";
                    ?>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_details_tab clearfix">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs" role="tablist" id="product-details-tab">
                            <li class="nav-item">
                                <a href="#description" class="nav-link active" data-toggle="tab" role="tab">Description</a>
                            </li>
                            <li class="nav-item">
                                <a href="#addi-info" class="nav-link" data-toggle="tab" role="tab">Additional Information</a>
                            </li>
                            <li class="nav-item">
                                <?php $cnt=0; foreach ($review as $reviews){ $cnt++; } ?>
                                <a href="#reviews" class="nav-link" data-toggle="tab" role="tab">Reviews <span class="text-muted"><?php echo '('.$cnt.')'; ?></span></a>
                            </li>
                        </ul>
                        <!-- Tab Content -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="description">
                                <div class="description_area">
                                    <p><?php echo $deskripsi_product; ?></p>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="addi-info">
                                <div class="additional_info_area">
                                    <p><?php echo $addInfo; ?></p>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="reviews">
                                <div class="reviews_area">
                                    <ul id='pagin'>
                                        <?php
                                            $a=0;
                                            foreach ($review as $reviews){
                                            $rating = $reviews->rating;
                                            $reason = $reviews->reason;
                                            $komen = $reviews->komen;
                                            $date = $reviews->tgl_review;
                                            $nama_depan = $reviews->nama_depan_reviewers;
                                                echo "
                                                    <li>
                                                        <div class='single_user_review mb-15'>
                                                            <div class='review-rating'>";
                                                                for ($a=0;$a<$rating;$a++){
                                                                    echo "<i class='fa fa-star' aria-hidden='true'></i>";
                                                                }
                                                                echo "
                                                                <span>for $reason</span>
                                                            </div>
                                                            <div class='review-details'>
                                                                <p>by <a>$nama_depan</a> on <span>$date</span></p>
                                                            </div>
                                                            <div class='review-details'>
                                                                "; echo '<p>"'.$reviews->komen.'"</p>'; 
                                                                echo "
                                                            </div>
                                                        </div>
                                                    </li>
                                                ";
                                            }
                                        ?>
                                        
                                    </ul>
                                </div>

                                <div class="submit_a_review_area mt-50">
                                    <h4>Submit A Review</h4>
                                    <?php $id_product = $this->uri->segment(3); ?>
                                    <form action="<?php echo base_url().'review/index/'.$id_product.'/'; ?>" method="post" onsubmit="return alert('Terima Kasih, masukkan anda telah kami tampung');">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group d-flex align-items-center">
                                                    <span class="mr-15">Your Ratings:</span>
                                                    <div class="stars">
                                                        <input type="radio" name="star" class="star-1" id="star-1" value="1" required>
                                                        <label class="star-1" for="star-1">1</label>
                                                        <input type="radio" name="star" class="star-2" id="star-2" value="2" >
                                                        <label class="star-2" for="star-2">2</label>
                                                        <input type="radio" name="star" class="star-3" id="star-3" value="3" >
                                                        <label class="star-3" for="star-3">3</label>
                                                        <input type="radio" name="star" class="star-4" id="star-4" value="4" >
                                                        <label class="star-4" for="star-4">4</label>
                                                        <input type="radio" name="star" class="star-5" id="star-5" value="5" >
                                                        <label class="star-5" for="star-5">5</label>
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="options">Reason for your rating</label>
                                                    <select class="form-control" id="options" name="reason" required>
                                                          <option value = "">Choose your reason..</option>
                                                          <option value = "Quality">Quality</option>
                                                          <option value = "Value">Value</option>
                                                          <option value = "Design">Design</option>
                                                          <option value = "Price">Price</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="comments">Comments</label>
                                                    <textarea class="form-control" name="komen" id="comments" rows="5" data-max-length="150" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn alazea-btn">Submit Your Review</button>
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
    </section>
    <!-- ##### Single Product Details Area End ##### -->

    <!-- ##### Related Product Area Start ##### -->
    <div class="related-products-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php
                foreach($similiarProduct as $product){
                    echo "<div class='col-12 col-sm-6 col-lg-3'>
                        <div class='single-product-area mb-100'>
                            <div class='product-img'>
                                <a href='shop-details.html'><img style='height:250px;' src='".base_url()."assets/products/".$product->gambar_product."' ></a>
                                <div class='product-tag'>
                                    <a href='#'>Hot</a>
                                </div>
                                <div class='product-meta d-flex'>
                                    <a style='opacity:0;'></a>
                                    <a href='".base_url()."product/detailProduct/".$product->id_product."/' class='add-to-cart-btn'>Add to cart</a>
                                    <a style='opacity:0;'></a>
                                </div>
                            </div>
                            <div class='product-info mt-15 text-center'>
                                <a href='".base_url()."product/detailProduct/".$product->id_product."/'>
                                    <p>".$product->nama_product."</p>
                                </a>
                                <h6>Rp. ".strrev(implode('.',str_split(strrev(strval($product->harga_product)),3)))."</h6>
                            </div>
                        </div>
                    </div>";
                }
                ?>
            </div>
        </div>
    </div>
    <!-- ##### Related Product Area End ##### -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/pagination/src/jquery.paginate.js"></script>

    <script>
        //call paginate
        $('#pagin').paginate();
    </script>
    <!-- ##### Footer Area Start ##### -->
    <!-- Footer Bottom Area -->
        <?php
            $this->load->view('v_footer');
        ?> 
</body>

</html>