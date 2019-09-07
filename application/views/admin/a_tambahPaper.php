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
        <!-- sidebar menu area start -->
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
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Tambah Paper</span></li>
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
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                    <form action='<?php echo base_url()."Admin_Dashboard/tambahPaperAct/"; ?>' method='post' enctype='multipart/form-data'>
                                        <h4 class="header-title">Tambah Paper</h4>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Judul</label>
                                            <input class="form-control" type="text" name="judul" id="example-text-input" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Jenis Paper</label>
                                            <select class="form-control" name="jenis" required>
                                                <option value="">Select</option>
                                                <option value="Article">Article</option>
                                                <option value="Blog">Blog</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Tag</label>
                                            <input class="form-control" type="text" name="tag" id="example-text-input" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email-input" class="col-form-label">Isi</label>
                                            <textarea class="form-control" name="isi" id="example-email-input" required>
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-url-input" class="col-form-label">Isi Singkat</label>
                                            <textarea class="form-control" name="isi_singkat" id="example-email-input" required>
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-tel-input" class="col-form-label">Thumbnail</label>
                                            <input class="form-control" type="file" id="example-tel-input" name="thumbnail" required>
                                        </div>
                                        <div class="col-auto my-1" align="center">
                                            <button style="font-size:18px;" type="submit" class="btn btn-primary">Tambah Paper</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            <!-- Textual inputs end -->
                            <!-- Radios start -->
                            </div>
                            </div>
                            <!-- Custom file input end -->
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
    <?php
        $this->load->view('admin/a_footer');
    ?> 
</body>

</html>
