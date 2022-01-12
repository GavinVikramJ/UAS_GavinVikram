<?php
    error_reporting(0);
    //panggil file
    include '../Database.php';
    include '../model/StnkModel.php';

    class StnkController {
        public $model;

        function __construct(){
            $db = new Database();
            $conn = $db->DBConnect();
            $this->model = new StnkModel($conn); //menghilangkan pesan error
        }

        function index(){
            $stnk = $this->model->tampil_data();
            return $stnk;   
        }

        function getData($id){
            $stnk = $this->model->getData($id);
            return $stnk;
        }

        function simpanStnk(){
            // Taking all values from the form data(input)
            if (isset($_POST['add'])){
                $nomor_stnk =  $_POST['nomor_stnk'];
                $nomor_registrasi = $_POST['nomor_registrasi']; //name atau id kolom
                $nama_pemilik =  $_POST['nama_pemilik'];
                $alamat = $_POST['alamat'];
                $jenis = $_POST['jenis'];  
                $nomor_mesin = $_POST['nomor_mesin'];
                $berlaku = $_POST['berlaku'];                      
                

                $data[] = array(
                    'nomor_stnk' => $nomor_stnk,
                    'nomor_registrasi' => $nomor_registrasi, 
                    'nama_pemilik' => $nama_pemilik, 
                    'alamat' => $alamat, 
                    'jenis' => $jenis, 
                    'nomor_mesin' => $nomor_mesin, 
                    'berlaku' => $berlaku, 
                );
                $result = $this->model->simpanData($data);
                if($result){
                    header("Location:index.php?pesan=success&frm=add");
//                    echo "<script>window.location.href='content.php?pesan=success&frm=edit';</script>";
                } else {
                    header("Location:index.php?pesan=failed&frm=failed");
//                    echo "<script>window.location.href='content.php?pesan=success&frm=edit';</script>";
                }
            }
        }

        function updateStnk(){
            // Taking all values from the form data(input)
            if (isset($_POST['update'])){
                $id = $_POST['id'];
                $nomor_stnk =  $_POST['nomor_stnk'];
                $nomor_registrasi = $_POST['nomor_registrasi']; //name atau id kolom
                $nama_pemilik =  $_POST['nama_pemilik'];
                $alamat = $_POST['alamat'];
                $jenis = $_POST['jenis'];  
                $nomor_mesin = $_POST['nomor_mesin'];
                $berlaku = $_POST['berlaku'];

                $data[] = array(
                    'id' => $id,
                    'nomor_stnk' => $nomor_stnk,
                    'nomor_registrasi' => $nomor_registrasi, 
                    'nama_pemilik' => $nama_pemilik, 
                    'alamat' => $alamat, 
                    'jenis' => $jenis, 
                    'nomor_mesin' => $nomor_mesin, 
                    'berlaku' => $berlaku, 
                );
                
                $result = $this->model->updateData($data, $id);

                if($result){
                    header("Location:index.php?pesan=success&frm=edit");
                    //echo "<script>window.location.href='index.php?pesan=success&frm=edit';</script>";
                } else {
                    header("Location:index.php?pesan=success&frm=failed");
                    //echo "<script>window.location.href='index.php?pesan=success&frm=edit';</script>";
                }
            }
        }
        
        function hapusStnk(){
            if (isset($_POST['delete'])){
                $id = $_POST['id'];
                
                $result = $this->model->hapusData($id);
                if ($result){
                    //header('Refresh: 1; url:index.php?pesan=success&frm=delete');
                    header("Refresh: 2; Location:index.php?pesan=success&frm=delete; location.reload();");
                    //echo "<script>window.location.href='index.php?pesan=success&frm=delete';</script>";
                } else {
                    header("Refresh: 2; Location:index.php?pesan=success&frm=failed");
                    //echo "<script>window.location.href='index.php?pesan=success&frm=delete';</script>";
                }
                
            }
        }
    }
?>