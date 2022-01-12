<?php 
include '../controller/StnkController.php';
$ctrl = new StnkController();
$stnk = $ctrl->index();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
  <h1>DATA STNK</h1>
  <div class="text-end">
    <a href="add.php" class="btn btn-primary">tambah</a>
  </div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nomor Stnk</th>
      <th scope="col">Nomor Registrasi</th>
      <th scope="col">Nama Pemilik</th>
      <th scope="col">Alamat</th>
      <th scope="col">Jenis</th>
      <th scope="col">Nomor Mesin</th>
      <th scope="col">Berlaku</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($stnk as $val){ ?>
      <tr>
        <th scope="row">1</th>
        <td><?php echo $val['nomor_stnk'] ?></td>
        <td><?php echo $val['nomor_registrasi'] ?></td>
        <td><?php echo $val['nama_pemilik'] ?></td>
        <td><?php echo $val['alamat'] ?></td>
        <td><?php echo $val['jenis'] ?></td>
        <td><?php echo $val['nomor_mesin'] ?></td>
        <td><?php echo $val['berlaku'] ?></td>
        <td>
          <a href="edit.php?id=<?php echo $val['id']; ?>" class = "btn btn-warning">Edit</a>
          <a href="#" class = "btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $val['id'] ?>">Hapus</a>

          <!-- Modal -->
          <div class="modal fade" id="deleteModal<?= $val['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Delete Data Surat</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="<?= $ctrl->hapusStnk() ?>" method="post">
                          <div class="modal-body">
                              <h6>Apakah anda yakin ingin menghapus data ini<strong><span class="grt"></span></strong> ?</h6>
                              <input type="hidden" name="id" id="id" value="<?= $val['id'] ?>">
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                              <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>