<?php
	foreach ($data_userTrue as $akun){
       $_SESSION["nama_lengkap_admin"] = $akun->nama_lengkap;
    }
   	
    $tampung = base_url()."Admin_Dashboard/";
   	header("Location: $tampung");
?>