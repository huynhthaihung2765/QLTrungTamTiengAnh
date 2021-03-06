<?php
  require_once("config/db.class.php");

  /**
   *
   */
  class ChiTiet_PDK_LH
  {
    public $idChiTiet;
    public $idPhieuDK;
    public $idLopHoc;
    public $ngayBatDauHoc;
    public $ngayKetThucHoc;
    public $trangThaiHoc;

    public function __construct($idChiTiet, $idPhieuDK, $idLopHoc, $ngayBatDauHoc, $ngayKetThucHoc, $trangThaiHoc){
      $this->idChiTiet = $idChiTiet;
      $this->idPhieuDK = $idPhieuDK;
      $this->idLopHoc = $idLopHoc;
      $this->ngayBatDauHoc = $ngayBatDauHoc;
      $this->ngayKetThucHoc = $ngayKetThucHoc;
      $this->trangThaiHoc = $trangThaiHoc;
    }

    public function insert(){
      $db = new Db();
      $sql = "INSERT INTO chitiet_pdk_lh (IDChiTiet_PDK_LH, IDPhieu, IDLopHoc, NgayBatDauKhoaHoc, NgayKetThucKhoaHoc, TrangThaiHoc) VALUES
      ('$this->idChiTiet', '$this->idPhieuDK', '$this->idLopHoc', '$this->ngayBatDauHoc', '$this->ngayKetThucHoc', '$this->trangThaiHoc')";
      $result = $db->query_execute($sql);
      return $result;
    }

    public static function Count_ChiTiet_PDK(){
      $db = new Db();
      $sql = "SELECT count(ctpdk.IDChiTiet_PDK_LH) as soluongchitietphieudangky from chitiet_pdk_lh ctpdk ORDER BY ctpdk.IDChiTiet_PDK_LH DESC LIMIT 1";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public static function Get_Last_ChiTiet_PDK(){
      $db = new Db();
      $sql = "SELECT * from chitiet_pdk_lh ctpdk ORDER BY ctpdk.IDChiTiet_PDK_LH DESC LIMIT 1";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public static function Get_All_ChiTietPDK_ByIDPDK($idpdk){
      $db = new Db();
      $sql = "SELECT * FROM chitiet_pdk_lh ctpdk LEFT JOIN phieudangky pdk on ctpdk.IDPhieu = pdk.IDPhieu WHERE ctpdk.IDPhieu = '$idpdk'  GROUP by ctpdk.IDPhieu, ctpdk.IDLopHoc";
      $result = $db->select_to_array($sql);
      return $result;
    }

    //SELECT * FROM chitiet_pdk_lh ctpdk LEFT JOIN phieudangky pdk on ctpdk.IDPhieu = pdk.IDPhieu WHERE ctpdk.IDPhieu = 2 and ctpdk.TrangThaiHoc = 'false'
    public static function Get_All_ChiTietPDK_ByTrangThai_Fail($idHocVien){
      $db = new Db();
      $sql = "SELECT ctpdk.IDChiTiet_PDK_LH, ctpdk.TrangThaiHoc,pdk.IDPhieu, hv.IDHocVien from chitiet_pdk_lh ctpdk LEFT JOIN phieudangky pdk ON ctpdk.IDPhieu = pdk.IDPhieu LEFT JOIN hocvien hv ON pdk.IDHocVien = hv.IDHocVien WHERE hv.IDHocVien = '$idHocVien' AND ctpdk.TrangThaiHoc = 'false'";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public function delete(){
      $db = new Db();
      $sql = "DELETE FROM chitiet_pdk_lh WHERE IDChiTiet_PDK_LH ='$this->idChiTiet'";
      $result = $db->query_execute($sql);
      return $result;
    }
  }
?>
