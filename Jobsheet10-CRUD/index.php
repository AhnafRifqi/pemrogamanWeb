<!DOCTYPE html>
<html>
<head>
    <title>Data Anggota</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
<body>
    <div class="container mt-4">
        <a href="create.php" class="btn btn-success mt-2">Tambah Data</a>
        <h2>Data Anggota</h2>
        
        <?php
        include 'koneksi.php';

        $query = "SELECT * FROM anggota order by id desc";
        $result = pg_query($koneksi, $query);

        if (pg_num_rows($result) > 0) {
            $no = 1;
            
            echo "<table class='table table-striped table-hover'>";
            echo "<thead class='thead-light'><tr><th>No</th><th>Nama</th><th>Jenis Kelamin</th><th>Alamat</th><th>No. Telp</th><th>Aksi</th></tr></thead>";
            echo "<tbody>";
            
            while ($row = pg_fetch_assoc($result)) {
                $kelamin = ($row['jenis_kelamin'] == 'L') ? 'Laki-laki' : 'Perempuan';
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $kelamin . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['no_telp'] . "</td>";
                echo "<td><a href='edit.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Edit</a> | 
                      <a href='#' data-toggle='modal' data-target='#hapusModal".$row['id']."' class='btn btn-danger btn-sm'>Hapus</a></td>";
                echo "</tr>";
                
                // Modal Hapus
                echo "<div class='modal fade' id='hapusModal".$row['id']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
                echo "<div class='modal-dialog' role='document'>";
                echo "<div class='modal-content'>";
                echo "<div class='modal-header'>";
                echo "<h5 class='modal-title' id='exampleModalLabel'>Konfirmasi Hapus</h5>";
                echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                echo "<span aria-hidden='true'>&times;</span>";
                echo "</button>";
                echo "</div>";
                echo "<div class='modal-body'>";
                echo "Apakah Anda yakin ingin menghapus data dengan nama **".$row['nama']."**?";
                echo "</div>";
                echo "<div class='modal-footer'>";
                echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Batal</button>";
                echo "<a href='proses.php?aksi=hapus&id=".$row['id']."' class='btn btn-danger'>Hapus</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<div class='alert alert-warning' role='alert'>Tidak ada data.</div>";
        }

        pg_close($koneksi);
        ?>
        
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>