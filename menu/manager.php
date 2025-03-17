<?php
include "../db/koneksi.php";

include "../layout/header.html";


// Proses form jika tombol submit ditekan
if (isset($_POST["manager"])) {
    $id_user = $_POST["id_user"];
    $nama_user = $_POST["nama_user"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $level = $_POST["level"];

    // Query untuk memasukkan data ke database
    $sql = "INSERT INTO petugas (id_user, nama_user, username, password, level) VALUES 
('$id_user', '$nama_user', '$username', '$password', '$level')";

echo "<pre>$sql</pre>"; // Cek apakah query benar sebelum eksekusi
if ($db->query($sql)) {
    header("Location: manager.php");
    exit();
} else {
    echo "Error: " . $db->error; // Menampilkan error jika query gagal
}

}

// Query untuk mengambil data dari database
$result = $db->query("SELECT * FROM manager");

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Manager</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Manager</h2>

        <form id="customer-form" class="mb-4" method="POST">
            <div class="row g-3">
                <div class="col-md-2">
                    <input type="text" name="id_user" class="form-control" placeholder="ID User" required>
                </div>
                <div class="col-md-2">
                    <input type="text" name="nama_user" class="form-control" placeholder="Nama User" required>
                </div>
                <div class="col-md-2">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="col-md-2">
                    <input type="text" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="col-md-2">
                    <input type="text" name="level" class="form-control" placeholder="Level" required>
                </div>
                <div class="col-md-2">
                    <button type="submit" name="manager" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID User</th>
                    <th>Nama User</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>level
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row["id_user"]); ?></td>
                    <td><?php echo htmlspecialchars($row["nama_user"]); ?></td>
                    <td><?php echo htmlspecialchars($row["username"]); ?></td>
                    <td><?php echo htmlspecialchars($row["password"]); ?></td>
                    <td><?php echo htmlspecialchars($row["lvel"]); ?></td>
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