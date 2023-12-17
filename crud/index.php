<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style/styles.css"
</head>
<title>
    UAS PEMWEB</title>
<body>
    <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1">UAS PEMWEB</span>
        </div>
    </nav>
<div class="container">
    <br>
    <h4><center>DAFTAR PESERTA UJIAN PEMROGRAMAN WEB</center></h4>
<?php

    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id_peserta'])) {
        $id_peserta=htmlspecialchars($_GET["id_peserta"]);

        $sql="delete from peserta where id_peserta='$id_peserta' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>

<div class="container">
     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th>No</th>
            <th>Nama</th>
            <th>Sekolah</th>
            <th>Jurusan</th>
            <th>No Hp</th>
            <th>Alamat</th>
            <th colspan='3'>Aksi</th>

        </tr>
        </div>
        </thead>

        <?php
        include "koneksi.php";
        $sql="select * from peserta order by id_peserta desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["sekolah"];   ?></td>
                <td><?php echo $data["jurusan"];   ?></td>
                <td><?php echo $data["no_hp"];   ?></td>
                <td><?php echo $data["alamat"];   ?></td>
                <td>
                    <a href="read.php?id_peserta=<?php echo htmlspecialchars($data['id_peserta']); ?>" class="btn btn-info" role="button">Read</a>
                    <a href="update.php?id_peserta=<?php echo htmlspecialchars($data['id_peserta']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_peserta=<?php echo $data['id_peserta']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
</div>
</body>
</html>
