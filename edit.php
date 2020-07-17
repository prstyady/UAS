<?php
  session_start();
  if(!isset($_SESSION['id_user'])){
    header("Location: ./login.php");
    die();
  }

  include "config.php";
?>
<?php
    // Check apakah form telah di submit untuk update, setelah itu redirect ke index setelah update
    if(isset($_POST['update']))
    {   
      $id = $_POST['id'];
        $jenisalokasi = $_POST['jenisalokasi'];
        $no = $_POST['no'];
        $alokasi = $_POST['alokasi'];
        $jumlahtransaksi = $_POST['jumlahtransaksi'];
        $jumlahdana = $_POST['jumlahdana'];
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];

        // Update data
        $result = mysqli_query($conn, "UPDATE covid19 SET jenisalokasi='$jenisalokasi', no='$no', alokasi='$alokasi', jumlahtransaksi='$jumlahtransaksi', jumlahdana='$jumlahdana', nama='$nama', nim='$nim' WHERE id=$id");

        // Redirect ke homepage
        header("Location: index.php");
    }
?>
<!DOCTYPE HTML>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <style>
      body{
        background-color: #f0f8ff;
      }
      .table th {
        text-align: center;
      }
      .table td {
        text-align: center;
      }
    </style>

    <title>Home</title>
  </head>
  <body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">KELOMPOK 8 ( 06TPLM007 )</h5>
        <nav class="my-2 my-md-0 mr-md-3">
          <a class="p-2 text-dark" href="index.php">Home</a>
          <a class="p-2 text-dark" href="input.php">Insert Data</a>
          <a class="p-2 text-dark" href="laporan.php">Laporan</a>
        </nav>
        <a class="btn btn-outline-primary" href="logout.php">Log Out</a>
    </div>

    <div class="container">
      <?php
        // Display selected user data based on id
        // Getting id from url
        $id = $_GET['id'];

        // Fetech user data based on id
        $result = mysqli_query($conn, "SELECT * FROM covid19 WHERE id=$id");

        while($user_data = mysqli_fetch_array($result))
        {
            $jenisalokasi = $user_data['jenisalokasi'];
            $no = $user_data['no'];
            $alokasi = $user_data['alokasi'];
            $jumlahtransaksi = $user_data['jumlahtransaksi'];
            $jumlahdana = $user_data['jumlahdana'];
            $nama = $user_data['nama'];
            $nim = $user_data['nim'];
        }
      ?>
      <h1>Edit Data</h1><br>
      <form name="update_user" action="edit.php" method="post">
        <div class="form-group">
          <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></input>
          <label>Jenis Alokasi</label>
          <select name="jenisalokasi" class="form-control" style="width: 50%;">
            <option value="">Pilih Jenis Alokasi</option>
            <option value="Alat Pelindung Diri">Alat Pelindung Diri</option>
            <option value="Logistik Mahasiswa">Logistik Mahasiswa</option>
            <option value="Bantuan Kuota Mahasiswa">Bantuan Kuota Mahasiswa</option>
            <option value="Hand Sanitizer">Hand Sanitizer</option>
            <option value="Sembako Masyarakat">Sembako Masyarakat</option>
          </select><br>
          <label>No</label>
          <input type="text" name="no" class="form-control" placeholder="No" style="width:50%;"></input><br>
          <label>Alokasi</label>
          <input type="text" name="alokasi" class="form-control" placeholder="Alokasi" style="width:50%;"></input><br>
          <label>Jumlah Transaksi</label>
          <input type="text" name="jumlahtransaksi" class="form-control" placeholder="Jumlah Transaksi" style="width:50%;"></input><br>
          <label>Jumlah Dana</label>
          <input type="text" name="jumlahdana" class="form-control" placeholder="Jumlah Dana" style="width:50%;"></input><br>
          <label>Nama Operator</label>
          <input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>" style="width:50%;"></input><br>
          <label>NIM Operator</label>
          <input type="text" name="nim" class="form-control" value="<?php echo $nim; ?>" style="width:50%;"></input><br><br>
          <button type="submit" name="update" class="btn btn-outline-primary">Edit</button> <button type="reset" class="btn btn-outline-primary">Reset</button>
        </div>
      </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>