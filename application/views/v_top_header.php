<div class="top-header-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                    if (!$_SESSION["email"]=="")
                    {
                        echo "<div class='top-header-content'>
                                <!-- Top Header Content -->
                                <div class='top-header-meta' style='text-align:center;padding-top:7px;'>
                                    <a style='font-size:15px;' href='https://mail.google.com/mail/?view=cm&fs=1&to=asysyifacare@gmail.com' data-toggle='tooltip' data-placement='bottom' title='asysyifacare@gmail.com'><i class='fa fa-envelope-o' aria-hidden='true'></i>asysyifacare@gmail.com</a>
                                    <a style='font-size:15px;' href='https://api.whatsapp.com/send?phone=6287887142686&amp;text=Hi%20Asy-Syifa%0ACARE%20!!' data-toggle='tooltip' data-placement='bottom' title='+62 878-8714-2686'><i class='fa fa-whatsapp' aria-hidden='true'></i>+62 878-8714-2686</a>
                                </div>
                            </div>";
                    }else{
                        echo "<div class='top-header-content d-flex align-items-center justify-content-between'>
                                <!-- Top Header Content -->
                                <div class='top-header-meta'>
                                    <a style='font-size:16px;' href='https://mail.google.com/mail/?view=cm&fs=1&to=asysyifacare@gmail.com' data-toggle='tooltip' data-placement='bottom' title='asysyifacare@gmail.com'><i class='fa fa-envelope-o' aria-hidden='true'></i><span>asysyifacare@gmail.com</span></a>
                                    <a style='font-size:16px;' href='https://api.whatsapp.com/send?phone=6287887142686&amp;text=Hi%20Asy-Syifa%0ACARE%20!!' data-toggle='tooltip' data-placement='bottom' title='+62 878-8714-2686'><i class='fa fa-whatsapp' aria-hidden='true'></i><span>+62 878-8714-2686</span></a>
                                </div>
                                <div class='top-header-meta d-flex'>
                                    <div class='cart'>
                                        <a style='font-size:16px;' href='".base_url()."login/'><i class='fa fa-user' aria-hidden='true'></i>Sign In / Sign Up</a>
                                    </div>
                                </div>
                            </div>";
                        }
                ?>
                
            </div>
        </div>
    </div>
</div>