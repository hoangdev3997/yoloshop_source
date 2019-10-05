<?php 
	class connect{
		//Khởi tạo thuộc tính cho class Connect
		var $db = null;

		//Kết nối Database
		public function __construct(){
			$dsn='mysql:host=localhost;dbname=yolo';
			$user='root';
			$pass='';
			$this->db=new PDO($dsn,$user,$pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		}

		//Lấy tất cả dữ liệu từ database
		public function getData($select){
			try {
				$results = $this -> db -> query($select);
				return $results; 
			} catch (PDOException $e) {
				throw $e;
			}
			finally{
				$this->db = null;
			}
		}

		//Tạo function lấy 1 hàng của bảng
		public function getRow($select){
			
			try {
				$results = $this -> db -> query($select);
				$result = $results -> fetch();
				return $result;
			} catch (PDOException $e) {
				throw $e;
			}
			finally{
				$this->db = null;
			}
		}

		//Tạo phương thức chạy các câu lệnh khác
		public function excute($query){
			try {
			$result = $this -> db -> exec($query);
			return $result;
			} catch (PDOException $e) {
				throw $e;
			}
			finally{
				$this->db = null;
			}
		}

		public function __destruct(){
			$this->db = null;
		}
	}
 ?>