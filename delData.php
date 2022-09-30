<?php
include 'koneksi/inc.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM mahasiswa WHERE id = $id ";
    $query = mysqli_query($koneksi, $sql);
    if ($query) {
        echo "<script>
            alert('Berhasil Hapus Data');
            window.location = 'index.php';
    </script>";
    } else {
        echo "<script>
        alert('Gagal Hapus Data');
    </script>";
    }
}
