<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helper/Format.php');
?>

<?php 
/**
* 
*/
class Barang
{
	
	private $db;
	private $fm;

	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getAllBarang(){
 		$query = " SELECT * FROM tbl_barang ORDER BY id_barang DESC ";
 		$result = $this->db->select($query);
 		return $result;
 	}

 	public function delBarangById($id){
		$query = "DELETE FROM tbl_barang WHERE id_barang = '$id' ";
		$deldata = $this->db->delete($query);
	}

	public function barangInsert($data){
 		$nm_brg = mysqli_real_escape_string($this->db->link, $data['nm_barang']);
 		$harga = mysqli_real_escape_string($this->db->link, $data['hrg_satuan']);
 		$stok = mysqli_real_escape_string($this->db->link, $data['stok']);

	    if ($nm_brg == "" || $harga == "" || $stok == "") {
	    	$pesan = "<span class='error'>Form tidak boleh kosong</span> ";
	    	return $pesan;
	    }else{
	    	$query = " INSERT INTO tbl_barang (nm_barang, hrg_satuan, stok)
					   VALUES
					   ('$nm_brg', '$harga', '$stok' )";
		
			$masukkan_data = $this->db->insert($query);
			header("Location:?p=barang");	
	    }
 	}

 	public function getBarangById($id){
		$query = "SELECT * FROM tbl_barang 
				  WHERE 
				  id_barang = '$id' ";	
		$result = $this->db->select($query);
		return $result;
	}

	public function barangUpdate($data, $id){
 		$nm_brg = mysqli_real_escape_string($this->db->link, $data['nm_barang']);
 		$harga = mysqli_real_escape_string($this->db->link, $data['hrg_satuan']);
 		$stok = mysqli_real_escape_string($this->db->link, $data['stok']);

 		if ($nm_brg == "" || $harga == "" || $stok == "") {
	    	$pesan = "<span class='error'>Form tidak boleh kosong</span> ";
	    	return $pesan;
	    }else{
	    	$query = "UPDATE tbl_barang
			    				SET
			    				nm_barang = '$nm_brg',
			    				hrg_satuan = '$harga',
			    				stok = '$stok'
			    				WHERE
			    				id_barang = '$id'
			    				";
			$masukkan_data = $this->db->update($query);
			header("Location:?p=barang");	
	    }

	}
}

 ?>