<!doctype html>
<html class="no-js" lang="en">

<?php
    $this->load->view('admin/a_header');
?> 

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <?php
            $navbar["navbar"] = 2;
            $this->load->view('admin/a_navbar',$navbar);
        ?> 
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Detail Invoice</span></li>
                            </ul>
                        </div>
                    </div>
                   <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["nama_lengkap_admin"]; ?><i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo base_url(); ?>Admin_Dashboard/logout/">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                            <?php
                                foreach($invoice as $best){
                            ?>
                                <div class="invoice-area">
                                    <div class="invoice-head">
                                        <div class="row">
                                            <div class="iv-left col-6">
                                                <span>INVOICE</span>
                                            </div>
                                            <div class="iv-right col-6 text-md-right">
                                                <span><?php echo "INV-00".$best->nomor_invoice; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <div class="invoice-address">
                                                <h3>invoiced to</h3>
                                                <h5><?php
                                                foreach($user as $nama){
                                                    echo $nama->nama_lengkap;
													$tampungEmail = $nama->email;
                                                }
                                                    ?></h5>
                                                <?php echo $best->alamat_pengiriman; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-md-right">
                                            <ul class="invoice-date">
                                                <li>Invoice Date : <?php echo $best->tanggal_invoice; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="invoice-table table-responsive mt-5">
                                        <table class="table table-bordered table-hover text-right">
                                            <thead>
                                                <tr class="text-capitalize">
                                                    <th class="text-left" style="width: 30%; min-width: 130px;">Products</th>
                                                    <th class="text-center" style="width: 5%;">Quantity</th>
                                                    <th>Price</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                foreach($cart as $keranjang){
                                            ?>  
                                                <tr>
                                                    <td class="text-left"><img style="width:100px;height:100px;" src='<?php echo base_url()."assets/products/".$keranjang->gambar_product; ?>'><?php echo $keranjang->nama_product; ?></td>
                                                    <td class="text-center"><?php echo $keranjang->quantity; ?></td>
                                                    <td><?php echo "Rp. ".strrev(implode('.',str_split(strrev(strval($keranjang->harga_product)),3)))." /pcs"; ?></td>
                                                    <td><?php $total=$keranjang->quantity*$keranjang->harga_product; echo "Rp. ".strrev(implode('.',str_split(strrev(strval($total)),3))); ?></td>
                                                </tr>
                                            <?php
                                                }
                                            ?>  
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="3">Biaya Pengiriman :</td>
                                                    <td><?php echo "Rp. ".strrev(implode('.',str_split(strrev(strval($best->biaya_pengiriman)),3))); ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">Biaya Total (Subtotal + PPN 5%) + Pengiriman :</td>
                                                    <td><?php echo "Rp. ".strrev(implode('.',str_split(strrev(strval($best->biaya_total)),3))); ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">Bukti Transaksi :</td>
													<?php
														if ($best->bukti_transaksi != null){							
													?>
                                                    <td align="center"><img style="width:250px;height:350px;" src='<?php $name = str_replace(' ', '_', $best->bukti_transaksi); echo base_url()."assets/bukti/".$name; ?>'></td>
														<?php }else{ ?>
														<td style="color:red;">Belum ada bukti transaksi</td>
														<?php } ?>
                                                </tr>
                                            </tfoot>
                                        </table>
                                       
                                    </div>
                                    <?php
                                        }
                                    ?>
                                    <div class="row align-items-center">
                                        <div class="col-md-6 text-md-center">
                                            <div class="invoice-address">
                                                <h5>Status Pembayaran</h5>
                                                <?php echo $best->status_pembayaran; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-md-center">
                                            <div class="invoice-address">
                                                <h5>Status Penerimaan Barang</h5>
                                                <?php echo $best->status_penerimaan_barang; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if ($best->status_penerimaan_barang == "Sudah diterima"){

                                    }else{
										if ($best->status_penerimaan_barang == "Sedang dikirim"){ ?>
										<div class="form-group" style="margin-top:25px;">
                                        <form action='<?php echo base_url()."Admin_Dashboard/konfirmasiPenerimaanBarang2/"; ?>' method='post' enctype='multipart/form-data'>
                                            <label class="col-form-label">Konfirmasi Penerimaan Barang</label>
                                            <select style="height:50px;" class="form-control" name="confirmation" required>
                                                <option value="">Apakah Barang Sudah Diterima ?</option>
                                                <option value="ya">Ya</option>
                                                <option value="tidak">Belum</option>
                                            </select>
                                            <input type="hidden" name="nomor_invoice" value="<?php echo $this->uri->segment(3); ?>" required />
											<input type="hidden" name="email_user" value="<?php echo $tampungEmail ?>" required />
                                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Konfirmasi Penerimaan Barang</button>
                                        </form>
                                    </div>
										
										<?php }
                                        if ($best->status_pembayaran == "Sudah dikonfirmasi" && $best->status_penerimaan_barang != "Sedang dikirim"){
                                    ?>
                                     <div class="form-group" style="margin-top:25px;">
                                        <form action='<?php echo base_url()."Admin_Dashboard/konfirmasiPenerimaanBarang/"; ?>' method='post' enctype='multipart/form-data'>
                                            <label class="col-form-label">Konfirmasi Pengiriman Barang</label>
                                            <select style="height:50px;" class="form-control" name="confirmation" required>
                                                <option value="">Apakah Barang Sudah Dikirim ?</option>
                                                <option value="ya">Ya</option>
                                                <option value="tidak">Belum</option>
                                            </select>
                                            <input type="hidden" name="nomor_invoice" value="<?php echo $this->uri->segment(3); ?>" required />
											<input type="hidden" name="email_user" value="<?php echo $tampungEmail ?>" required />
                                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Konfirmasi Pengiriman Barang</button>
                                        </form>
                                    </div>
                                    <?php
                                        }
										if($best->bukti_transaksi != null){
											if ($best->status_pembayaran != "Sudah dikonfirmasi"){
                                    ?>
                                    <div class="form-group" style="margin-top:25px;">
                                        <form action='<?php echo base_url()."Admin_Dashboard/konfirmasiPembayaran/"; ?>' method='post' enctype='multipart/form-data'>
                                            <label class="col-form-label">Konfirmasi Pembayaran</label>
                                            <select style="height:50px;" class="form-control" id="confirmation" name="confirmation" required>
                                                <option value="">Apakah Bukti Transaksi Bernilai Benar ?</option>
                                                <option value="ya">Ya</option>
                                                <option value="tidak">Tidak</option>
                                            </select>
											<label id="pengiriman1" style="display:none;" class="col-form-label"><br> Konfirmasi Pengiriman</label>
                                            <select id="pengiriman2" style="display:none;height:50px;" class="form-control" name="pengiriman2">
                                                <option value="">Kirim Barang Sekarang ?</option>
                                                <option value="ya">Ya</option>
                                                <option value="tidak">Tidak</option>
                                            </select>
                                            <input type="hidden" name="nomor_invoice" value="<?php echo $this->uri->segment(3); ?>" required />
											<input type="hidden" name="email_user" value="<?php echo $tampungEmail ?>" required />
                                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Konfirmasi Pembayaran</button>
                                        </form>
                                    </div>
											<?php }}else{ ?>
									<div align="center" style="margin-top:50px;">
										<h4 style="color:red;"><?php echo "INV-00".$best->nomor_invoice; ?> Belum Dibayar</h4>
									</div>
									<?php }
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
            <p>© 2018 Asy-Syifa CARE. All Rights Reserved.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
	
	<script>
		var confirmation = document.getElementById('confirmation')
		var pengiriman1 = document.getElementById('pengiriman1');
		var pengiriman2 = document.getElementById('pengiriman2');
		console.log(confirmation);
		
		confirmation.addEventListener('change',function(){
          if (confirmation.value === "ya"){
				pengiriman1.style.display="inline";
				pengiriman2.style.display="inline";
				pengiriman2.setAttribute('required','required');
			}else{
				pengiriman1.style.display="none";
				pengiriman2.style.display="none";
				pengiriman2.required=false;
			}
		})
		
	</script>
    <?php
        $this->load->view('admin/a_footer');
    ?> 
</body>

</html>
