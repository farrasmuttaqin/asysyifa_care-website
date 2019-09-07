<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cart | Asy-Syifa CARE </title>
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
            <h2>Cart</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <?php
        foreach($data_All as $max)
        {
            $totalProduct = $max->stock;
        }
    ?>

    <!-- ##### Cart Area Start ##### -->
    <div class="cart-area section-padding-0-100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table clearfix">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Products</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>TOTAL</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($cart as $keranjang){ $total = $keranjang->quantity * $keranjang->harga_product; $subtotal = $subtotal+$total; ?>
                                <tr>
                                    <td class="cart_product_img">
                                        <a href="<?php echo base_url()."product/detailProduct/".$keranjang->id_product."/"; ?>"><img src='<?php echo base_url()."assets/products/".$keranjang->gambar_product; ?>' alt="Product"></a>
                                       <h5><?php echo $keranjang->nama_product; ?></h5>
                                    </td>
                                    <td class="qty">
                                        <div class="quantity" style="text-align: center;">
                                            <?php
                                                if ($keranjang->quantity > 1) {
                                            ?>
                                            <a href="<?php echo base_url()."cart/kurang/".$keranjang->id_product."/"; ?>"><span class="qty-minus" ><i class="fa fa-minus" aria-hidden="true"></i></span></a>
                                            <?php } ?>
                                            <input readonly="readonly" type="number" class="qty-text" id="qty" step="1" min="1" max="99" name="quantity" value="<?php echo $keranjang->quantity; ?>">
                                            <?php
                                                if ($keranjang->quantity < $totalProduct) {
                                            ?>
                                            <a href="<?php echo base_url()."cart/tambah/".$keranjang->id_product."/"; ?>"> <span onclick="<?php echo base_url()."cart/tambah/"; ?>; return false" class="qty-plus" ><i class="fa fa-plus" aria-hidden="true"></i></span></a>
                                            <?php } ?>
                                        </div>
                                        <br>
                                        Stock di Gudang : <?php echo $totalProduct; ?> Buah
                                    </td>
                                    <td class="price"><span><?php echo "Rp. ".strrev(implode('.',str_split(strrev(strval($keranjang->harga_product)),3)))." /pcs"; ?></span></td>
                                    <td class="total_price"><span><?php echo "Rp. ".strrev(implode('.',str_split(strrev(strval($total)),3))); ?></span></td>
                                    <td class="action"><a href="<?php echo base_url()."cart/delete/".$keranjang->id_product."/"; ?>" onclick="return confirm('Hapus Product dari Keranjang ?');"><i class="icon_close"></i></a></td>
                                </tr>
                                <?php } 
                                if ($keranjang->nama_product == ""){
                                    redirect(base_url());
                                }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">

                

                <!-- Cart Totals -->
                <div class="col-12 col-lg-12">
                    <div class="cart-totals-area mt-70">
                        <h5 class="title--">Cart Total</h5>
                        <div class="subtotal d-flex justify-content-between">
                            <h5 style="color:green;">Subtotal + PPN 5%</h5>
                            <h5 style="color:green;"><?php $subtotal=($subtotal*0.05)+$subtotal; echo "Rp. ".strrev(implode('.',str_split(strrev(strval($subtotal)),3))); ?></h5>
                        </div>
                        <div class="shipping d-flex justify-content-between">
                            <h5>Check Kota Pengiriman</h5>
                            <div class="shipping-address" >
                                <form action="#" method="post">
                                    <select class="custom-select" name="kota" onchange="yesnoCheck(this);" style="font-size:16px;width:200px;">
                                      <option value="dalam" selected>Wilayah JABODETABEK</option>
                                      <option value="luar">Selain JABODETABEK</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div class="total d-flex justify-content-between">
                            <h5>Harga Pengiriman</h5>
                            <h5 id="harga">Rp. 10.000</h5>
                        </div>
                        <div class="total d-flex justify-content-between">
                            <h5 style="color:red;">Total</h5>
                            <h5 id="total" style="color:red;"><?php $subtotal=$subtotal+10000; echo "Rp. ".strrev(implode('.',str_split(strrev(strval($subtotal)),3))); ?></h5>
                        </div>
                        <br>
                        <div class="checkout-btn" style='text-align: center;'>
                            <a href="<?php echo base_url()."checkout/"; ?>" class="btn alazea-btn w-40">Checkout</a><br><br><h5>OR</h5><br>
                            <a href="<?php echo base_url()."product/"; ?>" class="btn alazea-btn w-40">Beli Product yang Lain</a>
                        </div>
                    </div>
                    <script>
                        function yesnoCheck(that) {
                            if (that.value == "luar") {
                                document.getElementById("harga").innerHTML = "Belum ada Tarif Pengiriman";
                                document.getElementById("total").style.display = "none";
                            } else {
                                document.getElementById("harga").innerHTML = "Rp. 10.000";
                                document.getElementById("total").style.display = "";
                            }
                        }
                    </script>
                </div>
            </div>

        </div>
    </div>
    <!-- ##### Cart Area End ##### -->

      <!-- Footer Bottom Area -->
        <?php
            $this->load->view('v_footer');
        ?> 
</body>

</html>