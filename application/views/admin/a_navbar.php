<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href='<?php echo base_url(); ?>Admin_Dashboard/' class="nav-brand"><img style="width:300px;height:55px;" src="<?php echo base_url(); ?>assets/img/core-img/logo1.png" alt="Asy-Syifa CARE"></a>
            <h5 style="color:white;letter-spacing:5px;">ADMIN</h4>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li <?php if ($navbar == 2) { echo "class='active'"; }?>>
                        <a href='<?php echo base_url()."Admin_Dashboard/invoice/"; ?>' aria-expanded="true"><i class="ti-dashboard"></i><span>Tabel Invoice</span></a>
                    </li>
                    <li <?php if ($navbar == 3) { echo "class='active'"; }?>>
                        <a href='<?php echo base_url()."Admin_Dashboard/paper/"; ?>' aria-expanded="true"><i class="ti-dashboard"></i><span>Tabel Blog & Artikel</span></a>
                    </li>
                    <li <?php if ($navbar == 4) { echo "class='active'"; }?>>
                        <a href="<?php echo base_url()."Admin_Dashboard/product/"; ?>" aria-expanded="true"><i class="ti-dashboard"></i><span>Tabel Produk</span></a>
                    </li>
                    <li <?php if ($navbar == 5) { echo "class='active'"; }?>>
                        <a href="<?php echo base_url()."Admin_Dashboard/reviews/"; ?>" aria-expanded="true"><i class="ti-dashboard"></i><span>Tabel Reviews</span></a>
                    </li>
                    <li <?php if ($navbar == 6) { echo "class='active'"; }?>>
                        <a href="<?php echo base_url()."Admin_Dashboard/comment/"; ?>" aria-expanded="true"><i class="ti-dashboard"></i><span>Tabel Komen</span></a>
                    </li>
                    <li <?php if ($navbar == 7) { echo "class='active'"; }?>>
                        <a href="<?php echo base_url()."Admin_Dashboard/contact/"; ?>" aria-expanded="true"><i class="ti-dashboard"></i><span>Tabel Contact Us</span></a>
                    </li>
                    <li <?php if ($navbar == 8) { echo "class='active'"; }?>>
                        <a href="<?php echo base_url()."Admin_Dashboard/users/"; ?>" aria-expanded="true"><i class="ti-dashboard"></i><span>Tabel Users</span></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>