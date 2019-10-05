<?php 
	class libs{
		public function __construct(){}

		/*Reset auto increment*/
        public function reset_ai($table ='',$col=''){
            $conn=new connect();

            $sql = 'SET  @num := 0; UPDATE ' .$table. ' SET '. $col .'= @num := (@num+1); ALTER TABLE '.$table.' AUTO_INCREMENT = 1';
            $results=$conn->excute($sql);
            return $results;
        }

         /**
	     * insert thêm dữ liẹu
	     * @param string $table tên bảng muốn thêm, array $data dữ liệu cần thêm
	     * @return boolean
	     */
	    public function insert($table = '', $data = [])
	    {
	    	$conn=new connect();
	        $keys = '';
	        $values= '';
	        foreach ($data as $key => $value) {
	            $keys .= ',' . $key;
	            $values .= ',"' .$value.'"';
	        }
	        $sql = 'INSERT INTO ' .$table . '(' . trim($keys,',') . ') VALUES (' . trim($values,',') . ')';
	        $results=$conn->excute($sql);
            return $results;
	    }
	    /**
	     * delete xóa dữ liệu
	     * @param string $table tên bảng muốn xóa, array|int điều kiện
	     * @return boolean
	     */
	    public function delete($table= '', $data = [])
	    {
	       	$conn=new connect();
	        $keys = '';
	        $values= '';

	        foreach ($data as $key => $value) {
	            $where = $key.'="'.$value.'"';
	        }
	        $sql = 'DELETE FROM ' . $table . ' WHERE '. $where;
	        $results = $conn->excute($sql);
            return $results;
	    }
	     
	    /*
         * Truy vấn tất cả các id
         */
        public function select_all($table = '',$condition =''){
            $conn=new connect();
            $sql = 'SELECT * FROM '.$table .' ORDER BY '.$condition.' DESC';
            $results = $conn->getData($sql);
            return $results;
        }
        /*
         * Truy vấn all theo where
         */
        public function select_by_where($table = '',$where = []){
            $conn=new connect();
            $key = '';
            $value ='';
            $content = '';
            foreach ($where as $key => $value) {
	            $content .= $key.'="'.$value.'"';
	        }
            $sql = 'SELECT * FROM '.$table.' WHERE '.$content;
            $results = $conn->getData($sql);
            return $results;
        }
        /*
         * Truy vấn all theo 2 where
         */
        public function select_by_2_where($table = '',$where1 = [], $where2 = []){
            $conn=new connect();
            $key = '';
            $value ='';
            $key2 = '';
            $value2 ='';
            $content = '';
            $content2 = '';
            foreach ($where1 as $key => $value) {
                $content .= $key.'="'.$value.'"';
            }
            foreach ($where2 as $key2 => $value2) {
                $content2 .= $key2.'="'.$value2.'"';
            }
            $sql = 'SELECT * FROM '.$table.' WHERE '.$content.' AND '.$content2;
            $results = $conn->getRow($sql);
            return $results;
        }
         /*
         * Truy vấn limit 1
         */
        public function select_where_limit_1($table = '',$where = []){
            $conn=new connect();
            $key = '';
            $value ='';
            $content = '';
            foreach ($where as $key => $value) {
	            $content .= $key.'="'.$value.'"';
	        }
            $sql = 'SELECT * FROM '.$table.' WHERE '.$content .' LIMIT 1';
            $results = $conn->getData($sql);
            return $results;
        }

        /*
         * Truy vấn 1 record
         */
        public function select_one_by_where($table = '',$where =[]){
            $conn=new connect();
            $key = '';
            $value ='';
            $content = '';
            foreach ($where as $key => $value) {
	            $content .= $key.'="'.$value.'"';
	        }
            $sql = 'SELECT * FROM '.$table .' WHERE '.$content;
            $results = $conn->getRow($sql);
            return $results;
        }

        /*
         * Truy vấn id theo where and order by
         */
        public function select_where_and_order_desc($table = '',$where =[], $order = ''){
            $conn=new connect();
            $key = '';
            $value ='';
            $content = '';
            foreach ($where as $key => $value) {
	            $content .= $key.'="'.$value.'"';
	        }
	        
            $sql = 'SELECT * FROM '. $table .' WHERE '.$content .' ORDER BY '.$order.' DESC' ;
            $results = $conn->getData($sql);
            return $results;
        }
        /*
         * Truy vấn id theo where and order by and limit
         */
        public function select_where_order_limit($table = '',$where =[], $order = '',$limit =''){
            $conn=new connect();
            $key = '';
            $value ='';
            $content = '';
            foreach ($where as $key => $value) {
                $content .= $key.'="'.$value.'"';
            }
            
            $sql = 'SELECT * FROM '. $table .' WHERE '.$content .' ORDER BY '.$order.' DESC LIMIT '.$limit ;
            $results = $conn->getData($sql);
            return $results;
        }
        
        /*
         * Truy vấn số record theo type
         */
        public function select_num_by_type($table = '',$where=[],$condition='',$num=''){
            $conn=new connect();
            $key = '';
            $value ='';
            $content = '';
            foreach ($where as $key => $value) {
	            $content .= $key.'="'.$value.'"';
	        }
            $sql = 'SELECT * FROM '.$table.' WHERE '.$content.' ORDER BY '.$condition.' DESC LIMIT '.$num;
            $results = $conn->getData($sql);
            return $results;
        }
        /*
         * Truy vấn số record mới nhất
         */
        public function select_num_newst($table = '',$condition='',$num=''){
            $conn=new connect();
            
            $sql = 'SELECT * FROM '.$table.' ORDER BY '.$condition.' DESC LIMIT '.$num;
            $results = $conn->getData($sql);
            return $results;
        }

        /*
         * Truy vấn số record bất kì
         */
        public function select_num_rand($table = '',$num=''){
            $conn=new connect();
            
            $sql = 'SELECT * FROM '.$table.' ORDER BY RAND() LIMIT '.$num;
            $results = $conn->getData($sql);
            return $results;
        }

         /*
         * Truy vấn số record bất kì theo where
         */
        public function select_by_where_num_rand($table = '',$where=[] ,$num=''){
            $conn=new connect();
            $key = '';
            $value ='';
            $content = '';
            foreach ($where as $key => $value) {
                $content .= $key.'="'.$value.'"';
            }
            
            $sql = 'SELECT * FROM '. $table .' WHERE '.$content .' ORDER BY RAND() LIMIT '.$num ;
            $results = $conn->getData($sql);
            return $results;
        }

         /**
	     * update sửa dữ liệu
	     * @param string $table tên bảng muốn sửa, array $data dữ liệu cần sửa, array|int $id điều kiện
	     * @return boolean
	     */
	    public function update($table = '',$data = [],$where = [])
	    {
	    	$conn=new connect();
	        $key1 = '';
	        $value1 = '';
	        $key2 = '';
	        $value2 = '';
	        $content = '';
	        $content2 = '';

	        foreach ($data as $key1 => $value1) {
	            $content .= ','. $key1 . '="' . $value1.'"';
	        }

	        foreach ($where as $key2 => $value2) {
	            $content2 .= ','. $key2 . '="' . $value2.'"';
	        }
	        $sql = 'UPDATE ' .$table.' SET '.trim($content,','). ' WHERE '.trim($content2,',');

	        $results=$conn->excute($sql);
            return $results;
	    }


         /**
         * update Data with 2 where
         * @param string $table tên bảng muốn sửa, array $data dữ liệu cần sửa, array|int $id điều kiện
         * @return boolean
         */
        public function update_2_where($table = '',$data = [],$where = [], $where_2 =[])
        {
            $conn=new connect();
            $key1 = '';
            $value1 = '';
            $key2 = '';
            $value2 = '';
            $content = '';
            $content2 = '';
            $key3 = '';
            $value3 = '';
            $content3 = '';
            foreach ($data as $key1 => $value1) {
                $content .= ','. $key1 . '="' . $value1.'"';
            }

            foreach ($where as $key2 => $value2) {
                $content2 .= ','. $key2 . '="' . $value2.'"';
            }
            foreach ($where2 as $key3 => $value3) {
                $content3 .= ','. $key3 . '="' . $value3.'"';
            }
            $sql = 'UPDATE ' .$table.' SET '.trim($content,','). ' WHERE '.trim($content2,',').' AND '.trim($content3,',');

            $results=$conn->excute($sql);
            return $results;
        }



        
		/*
         * Đếm số lượng record of all
         */
        public function count_data($table){
        	$conn=new connect();
        	$sql = 'SELECT COUNT(*) FROM '.$table;
        	$results = $conn->excute($sql);
            return $results;
    	}
        /*
         * Đếm số lượng record of 1 id
         */
        public function count_id($table='',$where=[]){
            $conn=new connect();
            $key = '';
            $value ='';
            $content = '';
            foreach ($where as $key => $value) {
                $content .= '"'.$key.'" = "'.$value.'"';
            }

            $sql = 'SELECT COUNT(*) FROM "'.$table.'" WHERE '.$content;
            $results = $conn->getRow($sql);
            return $results;
        }
	}
 ?>
