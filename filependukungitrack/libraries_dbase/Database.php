<?PHP
class Database{
	private $koneksi;
	private $stringSql;   //menampung query sql
	private $run_query;
	public function  __construct()	{
		$this->koneksi=Koneksi::cekInstance();
	}
	private function sendQuery($stringQuery){
		$this->stringSql=$stringQuery;
	}
	public function run_query(){
		$this->run_query=mysql_query($this->stringSql);
		return $this->run_query;
	}
	//mengembalikan hasil query kearray
	public function toArray($stringQuery){
		$this->sendQuery($stringQuery);
		if ($this->run_query()){
			$result=array();
			while($item=mysql_fetch_array($this->run_query)){
				array_push($result,$item);
			}
			return $result;
		}
		else{
			echo "<div style=\"color:red\">".'Error : '.mysql_error().'</div>';
			die();
		}
	}
	//
	public function numRow($stringQuery){
		$this->sendQuery($stringQuery);
		$jumlahrecord=mysql_num_rows($this->run_query());
		return $jumlahrecord;
	}
	public function execQuery($stringQuery){
		$this->sendQuery($stringQuery);
        if (!$this->run_query()){
			echo 'Query Gagal Dijalankan<br>';
			echo "<div style=\"color:red\">s".'Error : '.mysql_error().'</div>';
		}
		else
		echo 'berhasil dijalankan';
	}
	public function deleteRow($stringArray){
		$tablename=$stringArray['tablename'];
		$tablefield=$stringArray['tablefield'];
		$nilai=$stringArray['nilai'];
		$stringArray="delete from ".$tablename." where ".$tablefield."="."'".$nilai."'";
		$this->sendQuery($stringArray);
        if (!$this->run_query()){
			echo 'Query Gagal Dijalankan<br>';
			echo "<div style=\"color:red\">s".'Error : '.mysql_error().'</div>';
		}
	}
	public function insertRow($stringArray){
		$tablename=$stringArray['tablename'];
		$string;
		foreach($stringArray[data] as $nilai){
			$nilai="'".$nilai."',";
			$gabunganstring.=$nilai;
		}
		$gabunganstring=substr("$gabunganstring",0,strlen($gabunganstring)-1);
		$stringArray="insert into ".$tablename." values (".$gabunganstring.")";
		$this->sendQuery($stringArray);
        if (!$this->run_query()){
			echo 'Query Gagal Dijalankan<br>';
			echo "<div style=\"color:red\">".'Error : '.mysql_error().'</div>';
		}
			
		//$tablefield=$stringArray['tablefield'];
		//$nilai=$stringArray['nilai'];
		//$stringArray="delete from ".$tablename." where ".$tablefield."="."'".$nilai."'";
		/*$this->sendQuery($stringArray);
        if (!$this->run_query()){
			echo 'Query Gagal Dijalankan<br>';
			echo "<div style=\"color:red\">s".'Error : '.mysql_error().'</div>';
		}*/
	}
}
?>