<!DOCTYPE html>
<html lang="en">

<head>
    <title>Menunggu Pembayaran | Asy-Syifa CARE </title>
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
            <h2> Payment </h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Menunggu Pembayaran</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Cart Area Start ##### -->
    <div class="cart-area section-padding-0-100 clearfix">
        <div class="container">
            <div class="row" >
                <div class="col-12">
                    <div class="cart-table clearfix" >
                        <table align="center" class="table table-responsive" style="color:black;">
                            <thead>
                                <tr>
                                    <th>Nomor Invoice</th>
                                    <th>Total Biaya</th>
                                    <th>Status Pembayaran</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="pagin">
                            <?php foreach($pemesanan as $payment){ ?>
                                <tr>
                                    <td class="cart_product_img">
                                       <h5> <?php $nomor = "INV-"."00".$payment->nomor_invoice; echo $nomor; ?></h5>
                                       <a style="margin-left:20px;" href="<?php echo base_url()."checkout/detail/".$payment->nomor_invoice."/"; ?>"> <h5>Lihat Invoice</h5></a>
                                    </td>
                                    <td class="price"><span><?php echo "Rp. ".strrev(implode('.',str_split(strrev(strval($payment->biaya_total)),3))); ?></span></td>
                                    <td class="total_price">
                                        <span style='color:red;''><?php echo $payment->status_pembayaran; ?></span>
                                    </td>
                                    <td class='total_price'><?php echo "<a class='btn alazea-btn w-50' href='".base_url()."checkout/detail/".$payment->nomor_invoice."/'><span>Bayar Sekarang</span></a>"; ?></td>
                                </tr>
                            
                                <?php } ?>
                            </tbody>
                            <?php 
                            if ($payment->nomor_invoice == ""){
                                redirect(base_url());
                            } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/pagination/src/jquery.paginate.js"></script>

        <script>
            //call paginate
            $('#pagin').paginate();
        </script>
        <?php
            $this->load->view('v_footer');
        ?> 
</body>

</html>