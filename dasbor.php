<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koperasi Pegawai RSUD Tarakan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Tambahkan jQuery -->
    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }

    /* Header */
    #header {
        width: 100%;
        background: #0d47a1;
        color: white;
        padding: 15px;
        text-align: left;
        font-size: 1.5rem;
        font-weight: bold;
        padding-left: 20px;
        display: flex;
        align-items: center;
        position: relative;
    }

    /* Tombol Menu */
    #menu-button {
        background: white;
        color: #0d47a1;
        border: none;
        padding: 8px 12px;
        cursor: pointer;
        border-radius: 5px;
        margin-left: auto;
        font-size: 18px;
    }

    /* Sidebar Menu */
    #sidebar {
        position: fixed;
        top: 0;
        left: -250px;
        width: 250px;
        height: 100%;
        background: #0d47a1;
        color: white;
        padding-top: 20px;
        transition: left 0.3s ease-in-out;
        box-shadow: 2px 0px 5px rgba(0, 0, 0, 0.3);
        z-index: 1000;
    }

    #sidebar.active {
        left: 0;
    }

    /* Daftar menu */
    .nav-link {
        display: block;
        color: white;
        padding: 12px 20px;
        text-decoration: none;
        transition: 0.3s;
    }

    .nav-link:hover {
        background: rgba(255, 255, 255, 0.2);
    }

    /* Area Konten */
    #content {
        margin-left: 0;
        padding: 20px;
        transition: margin-left 0.3s ease-in-out;
    }

    #sidebar.active+#content {
        margin-left: 250px;
    }
    </style>
</head>

<body>

    <!-- Header -->
    <div id="header">
        KOPERASI PEGAWAI RSUD TARAKAN
        <button id="menu-button">☰</button>
    </div>

    <!-- Sidebar Menu -->
    <div id="sidebar">
        <a href="#" class="nav-link" onclick="loadPage('dashboard.php')">Dasboard</a>
        <a href="#" class="nav-link" onclick="loadPage('beranda.php')">Beranda</a>
        <a href="#" class="nav-link" onclick="loadPage('customer.php')">Customer</a>
        <a href="#" class="nav-link" onclick="loadPage('petugas.php')">Petugas</a>
        <a href="#" class="nav-link" onclick="loadPage('manager.php')">Manager</a>
        <a href="login.php" class="nav-link">Login</a>
    </div>

    <!-- Main Content -->
    <div id="content">
        <h2>Selamat Datang di Koperasi Pegawai RSUD Tarakan</h2>
    </div>

    <script>
    // Fungsi untuk membuka/menutup sidebar
    document.getElementById("menu-button").addEventListener("click", function() {
        document.getElementById("sidebar").classList.toggle("active");
    });

    // Fungsi untuk memuat halaman tanpa reload
    function loadPage(page) {
        $.ajax({
            url: page,
            type: 'GET',
            success: function(response) {
                $("#content").html(response);
            },
            error: function() {
                $("#content").html("<h2>Halaman tidak ditemukan</h2>");
            }
        });
    }
    </script>

</body>

</html>