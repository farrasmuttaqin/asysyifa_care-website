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
            $navbar["navbar"] = 3;
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
                            <h4 class="page-title pull-left">Tabel Blog & Artikel</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Data Blog & Artikel</span></li>
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
                                                <th>ID Paper</th>
                                                <th>Jenis Paper</th>
                                                <th>Judul</th>
                                                <th>Thumbnail</th>
                                                <th>Aksi : </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach($paper as $best){
                                            ?>
                                                <tr>
                                                    <td><?php echo $best->id_paper; ?></td>
                                                    <td><?php echo $best->jenis; ?></td>
                                                    <td><?php echo $best->judul; ?></td>
                                                    <?php if ($best->jenis == "Article"){ ?>
                                                        <td><img style="width:100px;height:100px;" src="<?php echo base_url(); ?>assets/img/article/<?php $name = str_replace(' ', '_', $best->thumbnail); echo $name ?>"></td>
                                                    <?php }else{ ?>
                                                    <td><img style="width:100px;height:100px;" src="<?php echo base_url(); ?>assets/img/blog/<?php $name = str_replace(' ', '_', $best->thumbnail); echo $name ?>"></td>
                                                    <?php } ?>
                                                    <td><a href="<?php echo base_url(); ?>Admin_Dashboard/editPaper/<?php echo $best->id_paper; ?>" ><img style="width:25px;height:25px;" src="<?php echo base_url(); ?>adminassets/images/edit.png"></a> &nbsp &nbsp <a href="<?php echo base_url(); ?>Admin_Dashboard/deletePaper/<?php echo $best->id_paper; ?>" onclick="return confirm('Hapus paper ini ?');"><img style="width:25px;height:25px;" src="<?php echo base_url(); ?>adminassets/images/delete.png"></a></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="<?php echo base_url(); ?>Admin_Dashboard/tambahPaper/">
                                    <div class="col-auto my-1" align="center">
                                        <button style="font-size:18px;" type="button" class="btn btn-primary">Tambah Paper</button>
                                    </div>
                                </a>
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
