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
            $navbar["navbar"] = 5;
            $this->load->view('admin/a_navbar',$navbar);
        ?> 
        <!-- sidebar menu area end -->
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
                            <h4 class="page-title pull-left">Tabel Reviews Produk</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Data Reviews</span></li>
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
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="data-tables">
                                    <table id="dataTable" class="text-center">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th>ID Produk</th>
                                                <th>ID User</th>
                                                <th>Rating</th>
                                                <th>Reason</th>
                                                <th>Komen</th>
                                                <th>Tanggal Review</th>
                                                <th>Aksi : </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach($reviews as $best){
                                            ?>
                                                <tr>
                                                    <td><?php echo $best->id_product; ?></td>
                                                    <td><?php echo $best->id_user; ?></td>
                                                    <td><?php echo $best->rating; ?></td>
                                                    <td><?php echo $best->reason; ?></td>
                                                    <td><?php echo $best->komen; ?></td>
                                                    <td><?php echo $best->tgl_review; ?></td>
                                                    <td><a href="<?php echo base_url(); ?>Admin_Dashboard/deleteReviews/<?php echo $best->id_reviews; ?>" onclick="return confirm('Hapus review ini ?');"><img style="width:25px;height:25px;" src="<?php echo base_url(); ?>adminassets/images/delete.png"></a></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- data table end -->
                </div>
            </div>
        </div>
        <footer>
            <div class="footer-area">
            <p>© 2018 Asy-Syifa CARE. All Rights Reserved.</p>
            </div>
        </footer>
    </div>
    <?php
        $this->load->view('admin/a_footer');
    ?> 
</body>

</html>
