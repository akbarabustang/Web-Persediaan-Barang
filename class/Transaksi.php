<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helper/Format.php');
?>

<?php 
/**
* 
*/
class Transaksi
{
	
	private $db;
	private $fm;

	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getAllTransaksi(){
 		$query = " SELECT * FROM tbl_transaksi WHERE status = '0' ORDER BY id_transaksi  DESC ";
 		$result = $this->db->select($query);
 		return $result;
 	}

	public function transaksiInsert($data){
 		$id_barang = mysqli_real_escape_string($this->db->link, $data['id_barang']);
 		$qty = mysqli_real_escape_string($this->db->link, $data['qty']);

 		$tquery = 	"SELECT * FROM tbl_barang WHERE id_barang = '$id_barang' ";
		$result	=	$this->db->select($tquery)->fetch_assoc();
		$nm_barang = $result['nm_barang'];
		$hrg_satuan = $result['hrg_satuan'];

	    if ($qty == "") {
	    	$pesan = "<span class='error'>Form tidak boleh kosong</span> ";
	    	return $pesan;
	    }else{
	    	$query = " INSERT INTO 
	    				tbl_transaksi (id_barang, nm_barang, hrg_satuan,qty, status)
					   VALUES
					   ('$id_barang','$nm_barang' ,'$hrg_satuan' ,'$qty', '0' )";
		
			$masukkan_data = $this->db->insert($query);
			header("Location:?p=transaksi");	
	    }
 	}

 	public function transaksiUpdate($data){
 		$query = " UPDATE tbl_transaksi SET status = '1' ";
 		$result = $this->db->update($query);
 		if ($result) {
			$pesan = "<span class='success'>Terimakasih telah berbelanja</span> ";
			return $pesan;
		}
 	}

}

 ?>