<?php
include "../db/koneksi.php";

include "../layout/header.html";


// Proses form jika tombol submit ditekan
if (isset($_POST["sales"])) {
    $id_sales = $_POST["id_sales"];
    $tgl_sales = $_POST["tgl_sales"];
    $id_customer = $_POST["id_customer"];
    $do_number = $_POST["do_number"];
    $status = $_POST["status"];

    // Query untuk memasukkan data ke database
    $sql = "INSERT INTO sales (id_sales, tgl_sales, id_customer, do_number, status) VALUES 
    ('$id_sales','$tgl_sales','$id_customer','$do_number','$status')";

    if ($db->query($sql)) {
        // Redirect agar data yang baru diinput langsung terlihat di tabel
        header("Location: sales.php");
        exit();
    } else {
        echo "Error: " . $db->error;
    }
}

// Query untuk mengambil data dari database
$result = $db->query("SELECT * FROM sales");

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Sales</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Sales</h2>

        <form id="Sales-form" class="mb-4" method="POST">
            <div class="row g-3">
                <div class="col-md-2">
                    <input type="text" name="id_sales" class="form-control" placeholder="ID Sales" required>
                </div>
                <div class="col-md-2">
                    <input type="date" name="tgl_sales" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <input type="text" name="id_customer" class="form-control" placeholder="ID Customer" required>
                </div>
                <div class="col-md-2">
                    <input type="text" name="do_number" class="form-control" placeholder="DO Number">
                </div>
                <div class="col-md-2">
                    <input type="text" name="status" class="form-control" placeholder="Status" required>
                </div>
                <div class="col-md-2">
                    <button type="submit" name="sales" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID Sales</th>
                    <th>Tanggal Sales</th>
                    <th>ID Customer</th>
                    <th>DO Number</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row["id_sales"]); ?></td>
                    <td><?php echo htmlspecialchars($row["tgl_sales"]); ?></td>
                    <td><?php echo htmlspecialchars($row["id_customer"]); ?></td>
                    <td><?php echo htmlspecialchars($row["do_number"]); ?></td>
                    <td><?php echo htmlspecialchars($row["status"]); ?></td>
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