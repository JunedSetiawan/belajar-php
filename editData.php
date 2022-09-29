<?php
include 'koneksi/inc.php';
if (isset($_POST['kirim'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nrp = $_POST['nrp'];
    $prodi = $_POST['prodi'];
    $sql_ubah = "UPDATE user SET
		nama='$nama',
		nrp='$nrp',
		prodi='$prodi'		
      WHERE id='$id'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>      
                alert('Berhasil Edit Data');
                window.location = 'index.php';
            </script>";
    } else {
        echo "<script>
            alert('Berhasil Edit Data');
                window.location = 'index.php';
       </script>";
    }
}
