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
            <h2> Checkout Detail </h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Product</li>
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
            <div class="row" style="color:black;">
                <div class="col-12">
                    <div class="cart-table clearfix">
                        <h5>Nomor Invoice : <?php $nomor = "INV-"."00".$invoicee; echo $nomor; ?></h5><br><br>
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
                                <?php foreach($cartB as $keranjang){ $total = $keranjang->quantity * $keranjang->harga_product; $subtotal = $subtotal+$total; ?>
                                <tr>
                                    <td class="cart_product_img">
                                        <a href="<?php echo base_url()."product/detailProduct/".$keranjang->id_product."/"; ?>"><img src='<?php echo base_url()."assets/products/".$keranjang->gambar_product; ?>' alt="Product"></a>
                                       <h5><?php echo $keranjang->nama_product; ?></h5>
                                    </td>
                                    <td class="qty">
                                        <h5><?php echo $keranjang->quantity; ?></h5>
                                    </td>
                                    <td class="price"><span><?php echo "Rp. ".strrev(implode('.',str_split(strrev(strval($keranjang->harga_product)),3)))." /pcs"; ?></span></td>
                                    <td class="total_price"><span><?php echo "Rp. ".strrev(implode('.',str_split(strrev(strval($total)),3))); ?></span></td>
                                    <td class="total_price">
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php foreach($pemesananB as $item){
                    $alamat = $item->alamat_pengiriman;
                    $kota = $item->kota;
                    $provinsi = $item->provinsi;
                    $pos = $item->kode_pos;
                    $terima_barang = $item->status_penerimaan_barang;
                    $bayar_barang = $item->status_pembayaran;
                    $notes = $item->catatan;
                }
                ?>
                <!-- Coupon Discount -->
                <div class="col-12 col-lg-6" >
                    <div class="coupon-discount mt-70" >
                        <h5>DETAIL PEMESANAN</h5>
                        <p style="padding-top:20px;">Alamat Pengiriman</p>
                        <p><?php echo $alamat; ?></p>
                        <p style="padding-top:20px;">Kota</p>
                        <p><?php echo $kota; ?></p>
                        <p style="padding-top:20px;">Provinsi</p>
                        <p><?php echo $provinsi; ?></p>
                        <p style="padding-top:20px;">Kode Pos</p>
                        <p><?php echo $pos; ?></p>
                        <p style="padding-top:20px;">Catatan Pengiriman</p>
                        <p><?php echo $notes; ?></p>
                    </div>
                </div>

                <!-- Cart Totals -->
                <div class="col-12 col-lg-6">
                    <div class="cart-totals-area mt-70">
                        <h5 class="title--">Cart Total</h5>
                        <?php if($bayar_barang != "Sudah dibayar" && $bayar_barang !="Sudah dikonfirmasi"){
                            $style ="style='color:red;'";
                        }else{
                            $style ="style='color:green;'";
                        }
                        ?>
                        <div class="subtotal d-flex justify-content-between">
                            <h5 style="color:green;">Subtotal (Total Products + PPN 5%)</h5>
                            <h5 style="color:green;"><?php $subtotal=($subtotal*0.05)+$subtotal; $totalZ = $subtotal; echo "Rp. ".strrev(implode('.',str_split(strrev(strval($subtotal)),3))); ?></h5>
                        </div>
                        <div class="total d-flex justify-content-between">
                            <h5>Biaya Pengiriman</h5>
                            <h5 id="harga">Rp. 10.000</h5>
                        </div>
                        <div class="total d-flex justify-content-between">
                            <h5 <?php echo $style; ?>>Total</h5>
                            <h5 id="total"<?php echo $style; ?>><?php $subtotal=$subtotal+10000; echo "Rp. ".strrev(implode('.',str_split(strrev(strval($subtotal)),3))); ?></h5>
                        </div>
                        <div style="border:0px solid black;" class="total d-flex justify-content-between">
                            <h5>Status Pemesanan</h5>
                            <h5 id="total"><?php echo $terima_barang; ?></h5>
                        </div>
                        <div style="border:0px solid black;" class="total d-flex justify-content-between">
                            <h5>Status Pembayaran</h5>
                            <h5 id="total" <?php echo $style; ?>><?php echo $bayar_barang; ?></h5>
                        </div>
                        <?php
                            if($bayar_barang != "Sudah dibayar" && $bayar_barang != "Sudah dikonfirmasi"){
                            echo "<div style='border:0px solid black;' class='shipping-address'>
                                    <h5>Upload Bukti Pembayaran</h5>
                                    <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>
                                    <form enctype='multipart/form-data' action='".base_url()."checkout/order/".$invoicee."/' method='post' id='form1' runat='server' "; ?>onsubmit="return confirm('Bukti Pembayaran Yang di Upload Sudah Yakin Benar ?');" <?php echo">
                                        <input id='file' type='file' style='padding-top:10px;' name='gambar' accept='image/*' required />
                                           <br><h5 style='font-size:14px;padding-top:10px;color:#A9A9A9;'>Pastikan ukuran Gambar tidak melebihi 2 MB </h5>
                                           <br><img id='blah' src='#' alt='your image' />
                                           <input style='margin-top:20px;' type='submit' class='btn alazea-btn w-100' value='Order Sekarang' />
                                           <input type='hidden' name='subtotal' value='".$totalZ."' />
                                           <input type='hidden' name='total' value='".$subtotal."' />
                                    </form>
                                </div>";
                            }
                        ?>
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

                        var uploadField = document.getElementById("file");

                        uploadField.onchange = function() {
                            if(this.files[0].size > 2000000){
                               alert("Pastikan ukuran Gambar tidak melebihi 2 MB");
                               this.value = "";
                            };
                        };

                        function readURL(input) {

                          if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function(e) {
                              $('#blah').attr('src', e.target.result);
                            }

                            reader.readAsDataURL(input.files[0]);
                          }
                        }

                        $("#file").change(function() {
                          readURL(this);
                        });
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