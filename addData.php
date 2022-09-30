
<?php
include 'koneksi/inc.php';
if (isset($_POST['kirim'])) {
    $nama = $_POST['nama'];
    $nrp = $_POST['nrp'];
    $prodi = $_POST['prodi'];
    $sql = "INSERT INTO mahasiswa (nama,nrp,prodi) 
    VALUES ('$nama','$nrp','$prodi')";
    $query = mysqli_query($koneksi, $sql);
    if ($query) {
        echo "<script>
            alert('Berhasil Tambah Data');
            window.location = 'index.php';
    </script>";
    } else {
        echo "<script>
        alert('Gagal Tambah Data');
    </script>";
    }
}
