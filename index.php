<?php
include 'koneksi/inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <fieldset style="display: <?= (isset($_GET['kode'])) ? 'none' : 'inline-block' ?> " id=" ftambah">
        <legend>Tambah Data mahasiswa</legend>
        <form action="addData.php" method="post">
            Nama : <input type="text" name="nama" id="" autofocus><br><br>
            NRP : <input type="text" name="nrp" id=""><br><br>
            Prodi : <input type="text" name="prodi" id=""><br><br>
            <button type="submit" name="kirim">Simpan</button>
        </form>
    </fieldset>

    <?php if (isset($_GET['kode'])) {
        $id = $_GET['kode'];
        $sql = "SELECT * FROM mahasiswa WHERE id = $id ";
        $query = mysqli_query($koneksi, $sql);
        $data_old = mysqli_fetch_array($query, MYSQLI_BOTH);
    ?>
        <fieldset style="display:inline-block">
            <legend>Edit Data mahasiswa</legend>
            <form action="editData.php" method="post">
                <input type="hidden" name="id" value="<?= $data_old['id']; ?>">
                Nama : <input type="text" name="nama" id="" value="<?= $data_old['nama'] ?>"><br><br>
                NRP : <input type="text" name="nrp" id="" value="<?= $data_old['nrp'] ?>"><br><br>
                Prodi : <input type="text" name="prodi" id="" value="<?= $data_old['prodi'] ?>"><br><br>
                <button type="submit" name="kirim">Simpan</button>
            </form>
        </fieldset>
    <?php }  ?>

    <br>
    <br>
    <form action="" method="GET">
        <input type="text" name="cari" placeholder="cari data..nama/nrp/prodi">
        <button type="submit">Cari</button>
        <a href="index.php">Reset</a>
    </form>
    <?php
    if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        echo "<b>Hasil pencarian : " . $cari . "</b>";
    }
    ?>
    <br>
    <br>

    <table border="1">
        <tr>
            <th>Nomor</th>
            <th>Nama</th>
            <th>NRP</th>
            <th>Prodi</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
        $no = 1;
        if (isset($_GET['cari'])) {
            $queri = "SELECT * FROM mahasiswa WHERE 
            nama like '%" . $cari . "%' 
            || nrp like '%" . $cari . "%' 
            || prodi like '%" . $cari . "%'";
            $sql = mysqli_query($koneksi, $queri);
        } else {
            $sql = mysqli_query($koneksi, 'SELECT * FROM mahasiswa');
        }
        if (mysqli_num_rows($sql) > 0) {
            while ($data = mysqli_fetch_array($sql)) {
        ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['nrp']; ?></td>
                    <td><?= $data['prodi']; ?></td>
                    <td><a href="index.php?kode=<?= $data['id'] ?>" id="edit">edit</a></td>
                    <td><a href="delData.php?id=<?= $data['id'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')">hapus</a></td>
                </tr>
            <?php }
        } else { ?>
            <tr>
                <td colspan="5" align="center">Tidak Ada Data</td>
            </tr>
        <?php } ?>
    </table>
</body>
<!-- <script>
    const ftambah = document.querySelector('#ftambah');
    const fedit = document.querySelector('#fedit');
    const edit = document.querySelector('#edit');

    edit.addEventListener('onchange', function(e) {
        ftambah.style.display = "none";
    });
</script> -->

</html>