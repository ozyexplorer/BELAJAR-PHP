<?php

    function register_user($nama, $pass)
    {

        global $koneksi;

        //mencegah sql injection
        $nama = mysqli_real_escape_string($koneksi, $nama);
        $pass = mysqli_real_escape_string($koneksi, $pass);

        //membuat password menjadi password default
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $query = "INSERT INTO user (username, password) VALUES('$nama', '$pass')";

        if(mysqli_query($koneksi, $query))
        {
            return true;
        } else
        {
            return false;
        }

    }

    function register_cek_nama($nama)
    {
        global $koneksi;

        //mencegah sql injection
        $nama = mysqli_real_escape_string($koneksi, $nama);

        $query = "SELECT * FROM user WHERE username = '$nama'";

        if($result = mysqli_query($koneksi, $query))
        {
            if(mysqli_num_rows($result) == 0) return true;
        } else
        {
            return false;
        }
    }

    //untuk menguji nama tersedia atau belum di login
    function login_cek_nama($nama)
    {
        global $koneksi;

        //mencegah sql injection
        $nama = mysqli_real_escape_string($koneksi, $nama);

        $query = "SELECT * FROM user WHERE username = '$nama'";
        
        if($result = mysqli_query($koneksi, $query))
        {
            if(mysqli_num_rows($result) != 0) return true;
        } else
        {
            return false;
        }
    } 


    //untuk sistem login

    function cek_data($nama, $pass)
    {
        global $koneksi;

        //mencegah sql injection
        $nama = mysqli_real_escape_string($koneksi, $nama);
        $pass = mysqli_real_escape_string($koneksi, $pass);

        $query = "SELECT password FROM user WHERE username = '$nama'";
        $result = mysqli_query($koneksi, $query);

        $hash = mysqli_fetch_assoc($result)['password'];

        if(password_verify($pass, $hash))
        {
            return true;
        } else 
        {
            return false;
        }
    }

?>