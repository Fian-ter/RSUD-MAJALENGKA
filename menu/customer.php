<?php
include "../db/koneksi.php";

include "../layout/header.html";


// Proses form jika tombol submit ditekan
if (isset($_POST["customer"])) {
    $id_customer = $_POST["id_customer"];
    $nama_customer = $_POST["nama_customer"];
    $alamat = $_POST["alamat"];
    $telp = $_POST["telp"];
    $fax = $_POST["fax"];
    $email = $_POST["email"];

    // Query untuk memasukkan data ke database
    $sql = "INSERT INTO customer (id_customer, nama_customer, alamat, telp, fax, email) VALUES 
('$id_customer', '$nama_customer', '$alamat', '$telp', '$fax', '$email')";

echo "<pre>$sql</pre>"; // Cek apakah query benar sebelum eksekusi
if ($db->query($sql)) {
    header("Location: customer.php");
    exit();
} else {
    echo "Error: " . $db->error; // Menampilkan error jika query gagal
}

}

// Query untuk mengambil data dari database
$result = $db->query("SELECT * FROM customer");

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Customer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Customer</h2>

        <form id="customer-form" class="mb-4" method="POST">
            <div class="row g-3">
                <div class="col-md-2">
                    <input type="text" name="id_customer" class="form-control" placeholder="ID Customer" required>
                </div>
                <div class="col-md-2">
                    <input type="text" name="nama_customer" class="form-control" placeholder="Nama Customer" required>
                </div>
                <div class="col-md-2">
                    <input type="text" name="alamat" class="form-control" placeholder="alamat" required>
                </div>
                <div class="col-md-2">
                    <input type="text" name="telp" class="form-control" placeholder="telp">
                </div>
                <div class="col-md-2">
                    <input type="text" name="fax" class="form-control" placeholder="fax" required>
                </div>
                <div class="col-md-2">
                    <input type="text" name="email" class="form-control" placeholder="email" required>
                </div>
                <div class="col-md-2">
                    <button type="submit" name="customer" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID Customer</th>
                    <th>Nama customer</th>
                    <th>Alamat</th>
                    <th>Telp</th>
                    <th>Fax</th>
                    <th>email</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row["id_customer"]); ?></td>
                    <td><?php echo htmlspecialchars($row["nama_customer"]); ?></td>
                    <td><?php echo htmlspecialchars($row["alamat"]); ?></td>
                    <td><?php echo htmlspecialchars($row["telp"]); ?></td>
                    <td><?php echo htmlspecialchars($row["fax"]); ?></td>
                    <td><?php echo htmlspecialchars($row["email"]); ?></td>
                </tr>
                <?php } ?>
            </tbody>

        </table>
        <?php 
            include "../layout/footer.html";
            ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>