<?php

    require_once "core/init.php";

    if(isset($_POST['submit']))
    {
        $nama = $_POST['username'];
        $pass = $_POST['password'];

        if(!empty(trim($nama)) && !empty(trim($pass)))
        {
            if(login_cek_nama($nama))
            {
                if(cek_data($nama, $pass))
                {
                    $_SESSION['user'] = $nama;
                    header('location: index.php');
                } else 
                {

                }
            } else 
            {
                echo "nama belum terdaftar di database";
            }    
        }
        else
        {
            echo "Tidak boleh kosong";
        }
    }   


    require_once "view/header.php";
?>


    <form action="login.php" method="post">
        <label for="">Nama</label><br>
        <input type="text" name="username" placeholder="username"><br><br>

        <label for="">Password</label><br>
        <input type="password" name="password" placeholder="password"><br><br>

        <input type="submit" name="submit" value="Daftar">
    </form>
<?php

    require_once "view/footer.php";

?>
