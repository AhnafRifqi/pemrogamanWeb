<?php
include "auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Anggota</title>
    <meta name="csrf-token" content="<?php echo $_SESSION['csrf_token']; ?>">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    
    <style>
        /* CSS tambahan untuk tampilan seperti gambar */
        .navbar-brand { font-weight: bold; }
        .container { max-width: 900px; }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-dark bg-primary">
            <a class="navbar-brand" href="index.php" style="color: #fff;">
                CRUD Dengan Ajax
            </a>
        </nav>
        
        <div class="row">
            <div class="col-sm-12" style="margin: 30px 0px 0px 0px;">
                <h2 align="center">Data Anggota</h2>
                <form method="post" class="form-data" id="form-data">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="hidden" name="id" id="id">
                                <input type="text" name="nama" id="nama" class="form-control" required="true">
                                <p class="text-danger" id="err_nama"></p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin:</label>
                                <div class="form-check">
                                    <input type="radio" name="jenis_kelamin" id="jenkel1" value="L" required="true">
                                    <label for="jenkel1">Laki-laki</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="jenis_kelamin" id="jenkel2" value="P" required="true">
                                    <label for="jenkel2">Perempuan</label>
                                </div>
                                <p class="text-danger" id="err_jenis_kelamin"></p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea class="form-control" name="alamat" id="alamat" required="true"></textarea>
                        <p class="text-danger" id="err_alamat"></p>
                    </div>

                    <div class="form-group">
                        <label for="no_telp">No Telepon:</label>
                        <input type="number" class="form-control" name="no_telp" id="no_telp" required="true">
                        <p class="text-danger" id="err_no_telp"></p>
                    </div>

                    <div class="form-group">
                        <button type="button" name="simpan" id="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
            
            <div class="col-sm-12" style="margin: 30px 0px 0px 0px;">
                <div class="data">
                    </div>
            </div>
        </div>
    </div>
    
    <div class="text-center text-secondary">
        Copyright &copy; <?php echo date("Y"); ?> | Desain Dan Pemrograman Web
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            
            // Memuat data tabel saat halaman pertama kali diakses
            $('.data').load("data.php");
            
            // Script untuk Tambah/Update (akan disempurnakan di langkah berikutnya)
            $("#simpan").click(function() {
                var data = $('.form-data').serialize();
                // **CATATAN**: Skrip validasi dan AJAX POST harus ditambahkan di sini (Langkah 15 & 16)
                
                // Ini adalah placeholder untuk memanggil AJAX tanpa validasi (sebelum langkah 15)
                var csrf_token = $('meta[name="csrf-token"]').attr('content');
                
                $.ajax({
                    type: 'POST',
                    url: "form_action.php",
                    data: data,
                    headers: {
                        'Csrf-Token': csrf_token
                    },
                    success: function() {
                        $('.data').load("data.php"); // Reload data
                        document.getElementById("form-data").reset(); // Reset form
                        $('#id').val(""); // Reset ID tersembunyi
                    }
                });
            });
        });

        $("#simpan").click(function() {
            var data = $('.form-data').serialize();
            var jenkel1 = document.getElementById("jenkel1").checked;
            var jenkel2 = document.getElementById("jenkel2").checked;
            var nama = document.getElementById("nama").value;
            var alamat = document.getElementById("alamat").value;
            var no_telp = document.getElementById("no_telp").value;

            if (nama == "") {
                document.getElementById("err_nama").innerHTML = "Nama Harus Diisi";
            } else {
                document.getElementById("err_nama").innerHTML = "";
            }

            if (alamat == "") {
                document.getElementById("err_alamat").innerHTML = "Alamat Harus Diisi";
            } else {
                document.getElementById("err_alamat").innerHTML = "";
            }

            if (jenkel1 == false && jenkel2 == false) {
                document.getElementById("err_jenis_kelamin").innerHTML = "Jenis Kelamin Harus Dipilih";
            } else {
                document.getElementById("err_jenis_kelamin").innerHTML = "";
            }

            if (no_telp == "") {
                document.getElementById("err_no_telp").innerHTML = "No Telepon Harus Diisi";
            } else {
                document.getElementById("err_no_telp").innerHTML = "";
            }

            if (nama != "" && alamat != "" && (jenkel1 == true || jenkel2 == true) && no_telp != "") {
                var csrf_token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: "form_action.php",
                    data: data,
                    headers: {
                        'Csrf-Token': csrf_token
                    },
                    success: function(response) {
                        $('.data').load("data.php");
                        document.getElementById("form-data").reset();
                        document.getElementById("id").value = "";
                    },
                    error: function(response) {
                        console.log(response.responseText);
                    }
                });
            }
        });
        
    </script>
    <form method="post" class="form-data" id="form-data">
    <div class="row">
        <div class="col-sm-9">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="hidden" name="id" id="id">
                <input type="text" name="nama" id="nama" class="form-control" required="true">
                <p class="text-danger" id="err_nama"></p>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <div class="form-check">
                    <input type="radio" name="jenis_kelamin" id="jenkel1" value="L" required="true">
                    <label for="jenkel1">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="jenis_kelamin" id="jenkel2" value="P" required="true">
                    <label for="jenkel2">Perempuan</label>
                </div>
                <p class="text-danger" id="err_jenis_kelamin"></p>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="alamat">Alamat:</label>
        <textarea class="form-control" name="alamat" id="alamat" required="true"></textarea>
        <p class="text-danger" id="err_alamat"></p>
    </div>

    <div class="form-group">
        <label for="no_telp">No Telepon:</label>
        <input type="number" class="form-control" name="no_telp" id="no_telp" required="true">
        <p class="text-danger" id="err_no_telp"></p>
    </div>

    <div class="form-group">
        <button type="button" name="simpan" id="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
    </div>
</form>
</body>
</html>