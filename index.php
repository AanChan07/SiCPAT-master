<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="build/css/style.css">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="build/images/logo.png">
    <title>SiCPAT | Login</title>
</head>

<body>
    <img src="build/images/HEADER_PA_TPI.png" alt="Logo Pengadilan" class="logo">
    <div class="container" id="container">
        <div class="form-container sign-in">
            <form action="check_login.php" method="POST">
                <h1>SiCPAT</h1>
                <span>Gunakan akun Anda untuk masuk</span>
                <input type="text" class="form-control" placeholder="NIP" required="" name="nip" />
                <input type="password" class="form-control" placeholder="Password" required="" name="password" />
                <button type="submit" name="login" class="btn btn-default submit">Masuk</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>Selamat Datang di SiCPAT</h1>
                    <p>Sistem Informasi Cuti Pengadilan Agama Tanjungpinang</p>
                    <p>©2025 Pengadilan Agama Tanjungpinang Kelas IA Loey & V, All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</html>
