<?php 
	require_once('config/db.class.php');
	/*
	
	 */
	class GiaoVien
	{
		public $idGiaovien;
		public $hoTenGV;
		public $gioiTinh;
		public $ngaySinh;
		public $cMND;
		public $email;
		public $bangCap;
		public $chuyenMon;
		public $soDienThoai;
		public $hinhAnh;
		public $diaChi;


		public function __construct($idGiaovien, $hoTenGV, $gioiTinh, $ngaySinh, $cMND, $email, $bangCap, $chuyenMon, $soDienThoai, $hinhAnh, $diaChi)
		{
			$this->idGiaovien = $idGiaovien;
			$this->hoTenGV = $hoTenGV;
			$this->gioiTinh = $gioiTinh;
			$this->ngaySinh = $ngaySinh;
			$this->cMND = $cMND;
			$this->email = $email;
			$this->bangCap = $bangCap;
			$this->chuyenMon = $chuyenMon;
			$this->soDienThoai = $soDienThoai;
			$this->hinhAnh = $hinhAnh;
			$this->diaChi = $diaChi;
		}


		// thêm giáo viên
		public function insert()
		{
			$db = new Db();
			$sql = "INSERT INTO giaovien (HoTenGV, GioiTinh, NgaySinh, CMND, Email,BangCap, ChuyenMon, SDT, HinhAnh, DiaChi) VALUES
			('$this->hoTenGV','$this->gioiTinh','$this->ngaySinh',$this->cMND','$this->email','$this->bangCap', '$this->chuyenMon','$this->soDienThoai', '$this->hinhAnh', 'this->diaChi')";
			$result = $db->query_execute($sql);
			return $result;
		}
		//
		// Sửa giáo viên
		// 
		public function edit($id){
	      $db = new Db();
	      $sql = "UPDATE hocvien SET HoTenGV='$this->hoTenGV', GioiTinh='$this->gioiTinh',NgaySinh='$this->ngaySinh',CMND='$this->cMND',Email='$this->email',BangCap='$this->bangCap',ChuyenMon='$this->chuyenMon', SDT='$this->soDienThoai', HinhAnh = '$this->hinhAnh', DiaChi='this->diaChi' ";
	       $result = $db->query_execute($sql);
	       return $result;
    	}
    	//
    	// Xoá giáo viên
    	// 
    	public function delete($id)
    	{
    		$sql = "DELETE FROM giaovien WHERE IDGiaoVien='$id'";
	      	$result = $db->query_execute($sql);
	      	$db->connection->close();
	      	return $result;
    	}
    	//
    	// Xem một giáo viên
    	//
    	public static function Get_A_HV($id)
    	{
	      $db = new Db();
	      $sql = "SELECT * FROM giaovien gv WHERE gv.IDGiaoVien='$id'";
	      $result = $db->select_to_array($sql); 
	      return $result;
	    }
	    //
	    // Xem tất cả giáo viên
	    //
	    public static function Get_All_GV()
	    {
	    	$db = new Db();
	    	$sql = "SELECT * FROM giaovien";
	    	$result = $db-> select_to_array($sql);
	    	return $result;
	    }
	    //
	    //Tìm giáo viên
	    //
	    public static function Search_GV()
	    {

	    }
	}
 ?>