<div class="alazea-main-menu">
    <div class="classy-nav-container breakpoint-off">
        <div class="container">
            <!-- Menu -->
            <nav class="classy-navbar justify-content-between" id="alazeaNav">

                <!-- Nav Brand -->
                <a href='<?php echo base_url(); ?>' class="nav-brand"><img style="width:150px;height:63px;" src="<?php echo base_url(); ?>assets/img/core-img/logo1.png" alt="Asy-Syifa CARE"></a>
                <?php
                foreach($cart as $keranjangG){
                        $totalCart++;
                    }
                    foreach($pemesanan as $orderG){
                        $totalOrder++;
                    }
                    if ($totalCart == ""){
                        $totalCart = 0;
                    }
                    if ($totalOrder == ""){
                        $totalOrder = 0;
                    }
                    $totalZ=$totalOrder+$totalCart;
                ?>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler badge1" <?php if($totalZ>0){ echo "data-badge='".$totalZ."'"; }?>>
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">
                    <!-- Close Button -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Navbar Start -->
                    <div class="classynav">
                        <ul>
                            <?php
                                echo"   <li><a href='".base_url()."'>Home</a></li>
                                        <li><a href='#'>Product</a>
                                            <ul class='dropdown'>
                                                <li><a href='".base_url()."product/cosmetic/'>Cosmetic & Home Care</a></li>
                                                <li><a href='".base_url()."product/consumtion/'>Healthy Food & Beverage</a></li>
                                                <li><a href='".base_url()."product/herbs/'>Herbs</a>
                                            </ul>
                                        </li>
                                        <li><a href='".base_url()."blog/'>Blog</a></li>
                                        <li><a href='".base_url()."article/'>Article</a></li>
                                        <li><a href='".base_url()."about/'>About Us</a></li>
                                        ";
                            ?>
                        </ul>

                        <!-- Search Icon -->
                        <div id="searchIcon">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </div>
                        <?php
                        if (!$_SESSION["email"] == ""){
                            echo"  
                            <ul>
                                <li> &nbsp &nbsp </li>
                                <li><a href = '#' style='color:#66ff66;'><i class='fa fa-user-o' aria-hidden='true'></i> &nbsp My Profile "; if ($totalZ>0) echo "( ".$totalZ." )"; echo"</a>
                                    <ul class='dropdown'>
                                        <li><a href='".base_url()."profile/'><i class='fa fa-user-circle' aria-hidden='true'></i> &nbsp Lihat Profile</a></li>
                                        ";

                                        if ($totalOrder == 0){
                                            echo "<li><a href='#'"; ?> onclick="return alert('Product yang memerlukan pembayaran kosong');"> <?php echo "<i class='fa fa-credit-card' aria-hidden='true'></i> &nbsp Pembayaran ( ".$totalOrder." )</a></li>";
                                        }else{
                                            echo "<li><a href='".base_url()."checkout/pembayaran/'><i class='fa fa-credit-card' aria-hidden='true'></i> &nbsp Pembayaran ( ".$totalOrder." )</a></li>";
                                        }
                                        echo "<li><a href='".base_url()."checkout/daftar/'><i class='fa fa-list-alt' aria-hidden='true'></i> &nbsp Daftar Transaksi</a></li>";
                                        if ($totalCart == 0){
                                             echo "<li><a href='#'"; ?>onclick="return alert('Maaf Keranjang anda Kosong');"> <?php echo "<i class='fa fa-shopping-cart' aria-hidden='true'></i> &nbsp Keranjang ( ".$totalCart." )</a></li> ";
                                        }else{
                                            echo "<li><a href='".base_url()."cart/'><i class='fa fa-shopping-cart' aria-hidden='true'></i> &nbsp Keranjang ( ".$totalCart." )</a></li> ";
                                        }
                                        echo "
                                        <li><a style='color:red;' href='".base_url()."signout/'><i style='color:red;' class='fa fa-sign-out' aria-hidden='true'></i> &nbsp Sign Out</a></li>
                                    </ul>
                                </li>
                            </ul>";
                        }
                        ?>
                    </div>
                    <!-- Navbar End -->
                </div>
            </nav>

            <!-- Search Form -->
            <div class="search-form">
                <form action='<?php echo base_url(); ?>search/' method="get">
                    <input type="search" name="item" id="search" placeholder="Type product keywords &amp; press enter...">
                    <button type="submit" class="d-none"></button>
                </form>
                <!-- Close Icon -->
                <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
            </div>
        </div>
    </div>
</div>