<?php
	foreach ($data_userTrue as $akun){
       $_SESSION["id_user"] = $akun->id_user;
       $_SESSION["nama_lengkap"] = $akun->nama_lengkap;
       $_SESSION["email"] = $akun->email;
       $_SESSION["awal_join"] = $akun->awal_join;
       $_SESSION["nomor_hp"] = $akun->nomor_hp;
    }

    $name = $_SESSION["nama_lengkap"];
    $parts = explode(' ', $name);
    $firstname = $parts[0];
    $_SESSION["nama_depan"] = trim($firstname); 
   	
    $tampung = base_url()."loginSuccess/";
   	header("Location: $tampung");
?>