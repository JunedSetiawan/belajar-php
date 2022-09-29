<?php
if (isset(['send'])) {
    $sql = "SELECT FROM user WHERE id = $id ";
    $query = mysqli_query($koneksi, $sql);
}
