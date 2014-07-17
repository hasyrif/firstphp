<?PHP
error_reporting (E_ALL ^ E_NOTICE); 
class Koneksi{
	//konfigurasi mysql lokal
	private $host='localhost';
	private $username='root';
	private $password='';
	private $database='db_aset'; 
	//konfigurasi mysql online
	/*private $host='mysql.idhostinger.com';
	private $username='u870976281_peta';
	private $password='1122334455';
	private $database='u870976281_peta';*/
	
	private  static $_akses_koneksi = 0;
	private static $_instance;
	private function __construct()
	{
		$connection = mysql_connect($this->host,$this->username,$this->password);
		if ($connection){
			$connectdb = mysql_select_db($this->database);
			if (!$connectdb)
				echo 'Database Tidak Ditemukan';
		}
		else
			echo 'Koneksi Gagal';
	}
	public static function cekInstance()
	{
		//jika objek $_instance kosong
		if(is_null(self::$_instance))
		{
			//buat objek baru
			self::$_instance = new self();
        	}
		return self::$_instance;
	}
}
?>