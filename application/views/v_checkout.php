<!DOCTYPE html>
<html lang="en">

<head>
    <title>Checkout | Asy-Syifa CARE</title>
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

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(<?php echo base_url(); ?>assets/img/bg-img/header.jpg);">
            <h2>Checkout</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area mb-100">
        <div class="container">
            <div class="row justify-content-between" style="color:black;">
                <div class="col-12 col-lg-7">
                    <div class="checkout_details_area clearfix">
                        <h5>Checkout Details</h5>
                        <form action='<?php echo base_url()."checkout/inputCheckout/"; ?>' method="post" onsubmit="return confirm('Alamat Pengiriman Sudah Yakin Benar ?');">
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label style="float:left;">Nama Lengkap</label>
                                    <label style="float:right;"><?php echo $_SESSION["nama_lengkap"]; ?></label>
                                </div>
                                <div class="col-12 mb-4">
                                    <label style="float:left;">Alamat Email</label>
                                    <label style="float:right;"><?php echo $_SESSION["email"]; ?></label>
                                </div>
                                <div class="col-12 mb-4">
                                    <label style="float:left;">Nomor Handphone</label>
                                    <label style="float:right;"><?php echo $_SESSION["nomor_hp"]; ?></label>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="company">Alamat Pengiriman</label>
                                    <input type="text" class="form-control" name="alamat" placeholder="Cont, Jl Pedati Raya No 10 block cA 1/7" required>
                                    <label style="color:red;padding-top: 10px;">(Saat ini hanya melayani pengiriman di wilayah JABODETABEK)</label>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="city">Kota</label>
                                    <select class="form-control" name="kota" required>
                                      <option value="" selected>Pilih Kota</option>
                                      <option value="Jakarta">Jakarta</option>
                                      <option value="Bogor">Bogor</option>
                                      <option value="Depok">Depok</option>
                                      <option value="Tangerang">Tangerang</option>
                                      <option value="Bekasi">Bekasi</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="state">Provinsi</label>
                                    <input type="text" class="form-control" name="provinsi" required>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="postcode">Kode Pos</label>
                                    <input type="number" class="form-control" name="kodepos" required>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="order-notes">Catatan Pengiriman (optional)</label>
                                    <textarea class="form-control" name="notes" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </div>
                        
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="checkout-content">
                        <h5 class="title--">Your Order</h5>
                        <div class="products">
                            <div class="products-data">
                                <h5>Products:</h5>
                                <?php foreach($cart as $keranjang) { $total = $keranjang->quantity * $keranjang->harga_product; $subtotal = $subtotal+$total; ?>
                                    <div class="single-products d-flex justify-content-between align-items-center" style="padding-top: 10px;">
                                        <p><?php echo $keranjang->nama_product." x".$keranjang->quantity; ?></p>
                                        <h5><?php echo "Rp. ".strrev(implode('.',str_split(strrev(strval($total)),3))); ?></h5>
                                    </div>
                                <?php } 
                                if ($keranjang->nama_product == ""){
                                    redirect(base_url());
                                }?>
                            </div>
                        </div>
                        <div class="subtotal d-flex justify-content-between align-items-center">
                            <h5 style="color:green;">Subtotal + PPN 5%</h5>
                            <h5 style="color:green;"><?php $subtotal = ($subtotal*0.05) + $subtotal; echo "Rp. ".strrev(implode('.',str_split(strrev(strval($subtotal)),3))); ?></h5>
                        </div>
                        <div class="shipping d-flex justify-content-between align-items-center">
                            <h5>Harga Pengiriman</h5>
                            <h5>Rp. 10.000</h5>
                        </div>
                        <div class="order-total d-flex justify-content-between align-items-center">
                            <h5 style="color:red;">Total</h5>
                            <h5 id="total" style="color:red;"><?php $subtotal=$subtotal+10000; echo "Rp. ".strrev(implode('.',str_split(strrev(strval($subtotal)),3))); ?>
                            <input type="hidden" name="totalz" value="<?php echo $subtotal; ?>" />
                        </div>
                        <div class="checkout-btn mt-30">
                            <input type="submit" class="btn alazea-btn w-100" value="Bayar" />
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->

    <?php
        $this->load->view('v_footer');
    ?> 
</body>

</html>


TINGGAL BENERIN SEND TO EMAIL + TAMBAHIN NOTE* DIBAGIAN BAWAH UPLOAD BUKTI GAMBAR