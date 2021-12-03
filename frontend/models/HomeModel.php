<?php 
	trait HomeModel{
		//lay 6 san pham noi bat
		public function modelHotProducts(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where hot=1 order by id desc limit 0,6");
			return $query->fetchAll();
		}		
		//hien thi cac danh muc co truong displayhome=1
		public function modelListCategories(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from categories where displayhome=1 order by id desc");
			return $query->fetchAll();
		}
		//lay 6 san pham thuoc danh muc co id truyen vao
		public function modelListProducts($category_id){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where category_id=$category_id order by id desc limit 0,6");
			return $query->fetchAll();
		}
		//lay 6 tin tuc noi bat
		public function modelHotNews(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from news where hot=1 order by id desc limit 0,6");
			return $query->fetchAll();
		}
		//tinh tong so sao trung binh tuong ung voi tung san pham
		public function modelTotalRating($product_id){
			$conn = Connection::getInstance();
			//tinh tong cac cot star cua table rating tuong ung voi id truyen vao
			$query1 = $conn->query("select sum(star) as sumStar from rating where product_id=$product_id");
			$result1 = $query1->fetch();
			$sumStar = isset($result1->sumStar) ? $result1->sumStar : 0;
			//tinh so luong cac ban ghi cua taable rating tuong ung voi id truyen vao
			$query2 = $conn->query("select id from rating where product_id=$product_id");
			$totalRecord = $query2->rowCount();
			if($totalRecord > 0){
				$avgStar = $sumStar/($totalRecord);
				return $avgStar;
			}
			return 0;
		}
	}
 ?>