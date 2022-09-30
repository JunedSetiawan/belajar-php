<?php
if (isset(['send'])) {
    $sql = "SELECT FROM mahasiswa WHERE id = $id ";
    $query = mysqli_query($koneksi, $sql);
}
