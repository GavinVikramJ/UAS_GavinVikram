<?php 
include '../controller/StnkController.php';
$ctrl = new StnkController();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
 <div class="row justify-content-center mt-4">
     <div class="col-lg-7">
         <div class="my-3">
             <h2>Form Add Stnk</h2>
         </div>
        <form method="post" action="<?php echo $ctrl->simpanStnk() ?>">
            <div class="mb-3">
                <label class="form-label">Nomor Stnk</label>
                <input type="text" class="form-control" id="nomor_stnk" name="nomor_stnk" placeholder="...">
            </div>
            <div class="mb-3">
                <label class="form-label">Nomor Registrasi</label>
                <input type="text" class="form-control" id="nomor_registrasi" name="nomor_registrasi" placeholder="...">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Pemilik</label>
                <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" placeholder="...">
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="...">
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis</label>
                <input type="text" class="form-control" id="jenis" name="jenis" placeholder="...">
            </div>
            <div class="mb-3">
                <label class="form-label">Nomor Mesin</label>
                <input type="text" class="form-control" id="nomor_mesin" name="nomor_mesin" placeholder="...">
            </div>
            <div class="mb-3">
                <label class="form-label">Berlaku</label>
                <input type="date" class="form-control" id="berlaku" name="berlaku" placeholder="...">
            </div>
            <button type="submit" name="add" class="btn btn-primary">Submit</button>
        </form>
     </div>
 </div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>