<?php
    class StnkModel {

        protected $db;
        function __construct($db)
        {
            $this->db = $db;
        }
        function tampil_data()
        {
            $row = $this->db->prepare("SELECT * FROM tbl_stnk");
            $row->execute();
            return $hasil = $row->fetchAll();
        }

        function getData($id){
            $row = $this->db->prepare("SELECT * FROM tbl_stnk WHERE id = $id");
            $row->execute();
            return $hasil = $row->fetch();
        }

        function simpanData($data){
            //buat array untuk isi values insert sumber kode
            //pdo prepared multi insert
            $rowsSQL = array();
            //buat bind param prepared statment
            $toBind = array();
            //list nama kollom
            $columnNames = array_keys($data[0]);
            foreach($data as $arrayIndex => $row){
                $params = array();
                foreach($row as $columnName => $columnValue){
                    $param = ":" . $columnName . $arrayIndex;
                    $params[] = $param;
                    $toBind[$param] = $columnValue;
                }
                $rowsSQL[] = "(" . implode(", ", $params) . ")";
            }
            $sql = "INSERT INTO tbl_stnk (" . implode(", ", $columnNames). ") VALUES " . implode(", ", $rowsSQL);
            $row = $this->db->prepare($sql);
            //bind our values
            foreach($toBind as $param => $val){
                $row->bindValue($param, $val);
            }
            //Execute our statment (insert the data)
            return $row->execute();
        }

        function updateData($data, $id)
        {
            $setPart = array();
            foreach ($data as $key => $value) {
                $setPart[] = $key . "=:" . $key;
            }
    
            $sql = "UPDATE tbl_stnk SET " . implode(', ', $setPart) . " WHERE id = :id";
    
            $row = $this->db->prepare($sql);
    
            $row->bindValue(':id', $id);
            foreach ($data as $param => $val) {
                $row->bindValue($param, $val);
            }
            return $row->execute();
        }

        function hapusData($id){
            $sql = "DELETE FROM tbl_stnk WHERE id = ?";
            $row = $this->db->prepare($sql);
            return $row->execute(array($id));
        }
    }
?>