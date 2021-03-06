<?php
  require_once("config/db.class.php");
/**
 *
 */
class CapDo
{
  private $idCapDo;
  private $tenCapDo;
  private $moTaCapDo;

  function __construct($idCapDo, $tenCapDo, $moTaCapDo)
  {
    $this->$idCapDo = $idCapDo;
    $this->$tenCapDo = $tenCapDo;
    $this->moTaCapDo = $moTaCapDo;
  }

  //1. Lấy tất cả cấp độ
  public static function SelectAllCD(){
    $db = new Db();
    $sql = "SELECT * FROM capdo";
    $result = $db->select_to_array($sql);
    return $result;
  }

  //Hàm Lấy cấp độ theo tên lớp
  public static function Get_All_Capo_HasIn_LopHoc($idMonHoc){
    $db = new Db();
    $sql = "SELECT * from lophoc lh LEFT join capdo cd on lh.IDCapDo = cd.IDCapDo WHERE lh.IDMonHoc = '$idMonHoc' GROUP BY lh.IDCapDo, lh.IDMonHoc";
    $result = $db->select_to_array($sql);
    return $result;
  }
 
  public static function Get_All_Capo_By_IdMonHOc_InLopHoc($idMonHoc){
    $db = new Db();
    $sql = "SELECT * from lophoc lh LEFT JOIN capdo cd on lh.IDCapDo = cd.IDCapDo WHERE lh.IDMonHoc = '$idMonHoc' GROUP BY lh.IDCapDo";
    $result = $db->select_to_array($sql);
    return $result;
  }
 }
 ?>
