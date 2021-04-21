<?php
    error_reporting(0);
    include 'koneksi.php';
?>

<html>
<head>
    <title>Aplikasi Web CRUD Upload Gambar dengan PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="margin-top:20px ;">
    <img src="images/Shiroko.jpg" style="position: absolute; margin-left:20.85%; z-index:0;    top: 0;     left: 0;     right: 0;     bottom: 0;        width: 58.31%;  height:16.30%   ;object-fit:cover; opacity:100%;">
        <h1 style="text-align: left; position:relative; color: white; margin-left: 1%; ">Data Buku 2021</h1>
        
        <hr>
        <table  style="width: 100%; position:relative;">
            <tr>
                
                <td style="padding-right:62%" >
                    <form action="" method="POST" style="text-align: right;">
                    <input type="text" name="query" placeholder="Cari Buku"/>
                    <input type="submit" name="cari" value="Search"/>
                    </form>
                </td>
                <td>
                    <a style="font-family:Arial; text-decoration: none; font-size: 25px; color: black; padding-right:2%;" href="form_simpan.php">Tambah Data</a><br><br>
                </td>
            </tr>
        </table>
        
        <table class="table table-striped table-sm table-bordered" >
            <thead class="thead-dark">
                <tr style="text-align: center; padding: 0%;">
                    <th class="table-primary">Gambar Buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = $_POST['query'];
                if ($query != '') {
                    $select = mysqli_query($conn, "SELECT * FROM buku WHERE gambar LIKE '%".$query."%' OR judul LIKE '%".$query."%' OR pengarang LIKE '%".$query."%' OR penerbit LIKE '%".$query."%' ");
                }else{
                    $select = mysqli_query($conn, "SELECT * FROM buku");
                }

                if (mysqli_num_rows($select )) {
                
                while ($data = mysqli_fetch_array($select)) 
                {
                        echo "<tr style='vertical-align:center; text-align:center;'>";
                        echo "<td><img src='images/" . $data['gambar'] . "' width='105' height='150'></td>";
                        echo "<td>" . $data['judul'] . "</td>";
                        echo "<td>" . $data['pengarang'] . "</td>";
                        echo "<td>" . $data['penerbit'] . "</td>";
                        echo "<td><a href='form_ubah.php?id=" . $data['id'] . "' class='badge badge-warning'>Ubah</a></td>";
                        echo "<td><a href='proses_hapus.php?id=" . $data['id'] . "' class='badge badge-danger' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a></td>";
                        echo "</tr>";
                    }
                }else
                {
                    echo '<tr><td colspan="7">Tidak ada data</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>