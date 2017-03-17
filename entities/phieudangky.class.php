<?php
  require_once("config/db.class.php");

  /**
   *
   */
  class PhieuDangKy
  {
    public $idPhieu;
    public $idHocVien;
    public $tenPhieu;
    public $ngayLapPhieu;


    public function __construct($idPhieu, $idHocVien, $tenPhieu, $ngayLapPhieu){
      $this->idPhieu = $idPhieu;
      $this->idHocVien = $idHocVien;
      $this->tenPhieu = $tenPhieu;
      $this->ngayLapPhieu = $ngayLapPhieu;
    }

    public function insert(){


      $db = new Db();
      $sql = "INSERT INTO phieudangky (IDPhieu, IDHocVien, TenPhieu, NgayLapPhieu) VALUES
      ('$this->idPhieu', '$this->idHocVien', '$this->tenPhieu', '$this->ngayLapPhieu')";
      $result = $db->query_execute($sql);
      return $result;
    }


    public static function Get_Last_PDK(){
      $db = new Db();
      $sql = "SELECT * from phieudangky pdk ORDER BY pdk.IDPhieu DESC LIMIT 1";
      $result = $db->select_to_array($sql);
      return $result;
    }
  }
?>