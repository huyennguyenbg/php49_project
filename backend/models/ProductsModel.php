<?php 
	trait ProductsModel{
		//ham lay danh sach cac ban ghi co phan trang
		public function modelRead($recordPerPage){
			//lay bien p truyen tu url
			$p = isset($_GET["p"]) && is_numeric($_GET["p"]) && $_GET["p"] > 0 ? ($_GET["p"]-1) : 0;			
			//lay tu ban ghi nao
			$from = $p * $recordPerPage;
			//---
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from products order by id desc limit $from,$recordPerPage");
			//lay toan bo ket qua tra ve
			$result = $query->fetchAll();			
			//---
			return $result;
		}
		//tinh tong so ban ghi
		public function totalRecord($recordPerPage){
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select id from products");
			//tra ve tong so ban ghi
			return $query->rowCount();
		}
		//lay mot ban ghi
		public function modelGetRecord($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where id=$id");
			//tra ve mot ban ghi
			return $query->fetch();
		}		
		//update ban ghi
		public function modelUpdate($id){
			$name = $_POST["name"];
			$description = $_POST["description"];
			$content = $_POST["content"];
			$hot = isset($_POST["hot"]) ? 1 : 0;
			$price = $_POST["price"];
			$discount = $_POST["discount"];
			$category_id = $_POST["category_id"];
			//lay bien ket noi
			$conn = Connection::getInstance();
			//update du lieu tuong ung voi id truyen vao
			$conn->query("update products set name='$name',description='$description',content='$content',hot=$hot,price=$price,discount=$discount,category_id=$category_id where id=$id");
			//kiem tra xem user co chon anh de upload khong, neu co thi xoa anh cu, upload anh moi
			if($_FILES["photo"]["name"] != ""){
				//---
				//lay anh cu
				$queryOldPhoto = $conn->query("select photo from products where id=$id");
				//lay mot ban ghi
				$oldPhoto = $queryOldPhoto->fetch();
				if($oldPhoto->photo != "" && file_exists("../assets/upload/products/".$oldPhoto->photo))
					unlink("../assets/upload/products/".$oldPhoto->photo);
				//---
				$photo = time()."_".$_FILES["photo"]["name"];
				//upload anh
				move_uploaded_file($_FILES["photo"]["tmp_name"], "../assets/upload/products/$photo");
				//update lai truong photo
				$conn->query("update products set photo='$photo' where id=$id");
			}
			if($_FILES["photo1"]["name"] != ""){
				//---
				//lay anh cu
				$queryOldPhoto = $conn->query("select photo1 from products where id=$id");
				//lay mot ban ghi
				$oldPhoto = $queryOldPhoto->fetch();
				if($oldPhoto->photo1 != "" && file_exists("../assets/upload/products/".$oldPhoto->photo1))
					unlink("../assets/upload/products/".$oldPhoto->photo1);
				//---
				$photo1 = time()."_".$_FILES["photo1"]["name"];
				//upload anh
				move_uploaded_file($_FILES["photo1"]["tmp_name"], "../assets/upload/products/$photo1");
				//update lai truong photo1
				$conn->query("update products set photo1='$photo1' where id=$id");
			}
			if($_FILES["photo2"]["name"] != ""){
				//---
				//lay anh cu
				$queryOldPhoto = $conn->query("select photo2 from products where id=$id");
				//lay mot ban ghi
				$oldPhoto = $queryOldPhoto->fetch();
				if($oldPhoto->photo2 != "" && file_exists("../assets/upload/products/".$oldPhoto->photo2))
					unlink("../assets/upload/products/".$oldPhoto->photo2);
				//---
				$photo2 = time()."_".$_FILES["photo2"]["name"];
				//upload anh
				move_uploaded_file($_FILES["photo2"]["tmp_name"], "../assets/upload/products/$photo2");
				//update lai truong photo2
				$conn->query("update products set photo2='$photo2' where id=$id");
			}
			if($_FILES["photo3"]["name"] != ""){
				//---
				//lay anh cu
				$queryOldPhoto = $conn->query("select photo3 from products where id=$id");
				//lay mot ban ghi
				$oldPhoto = $queryOldPhoto->fetch();
				if($oldPhoto->photo3 != "" && file_exists("../assets/upload/products/".$oldPhoto->photo3))
					unlink("../assets/upload/products/".$oldPhoto->photo3);
				//---
				$photo3 = time()."_".$_FILES["photo3"]["name"];
				//upload anh
				move_uploaded_file($_FILES["photo3"]["tmp_name"], "../assets/upload/products/$photo3");
				//update lai truong photo3
				$conn->query("update products set photo3='$photo3' where id=$id");
			}
			if($_FILES["photo4"]["name"] != ""){
				//---
				//lay anh cu
				$queryOldPhoto = $conn->query("select photo4 from products where id=$id");
				//lay mot ban ghi
				$oldPhoto = $queryOldPhoto->fetch();
				if($oldPhoto->photo4 != "" && file_exists("../assets/upload/products/".$oldPhoto->photo4))
					unlink("../assets/upload/products/".$oldPhoto->photo4);
				//---
				$photo4 = time()."_".$_FILES["photo4"]["name"];
				//upload anh
				move_uploaded_file($_FILES["photo4"]["tmp_name"], "../assets/upload/products/$photo4");
				//update lai truong photo4
				$conn->query("update products set photo4='$photo4' where id=$id");
			}
			if($_FILES["photo5"]["name"] != ""){
				//---
				//lay anh cu
				$queryOldPhoto = $conn->query("select photo5 from products where id=$id");
				//lay mot ban ghi
				$oldPhoto = $queryOldPhoto->fetch();
				if($oldPhoto->photo5 != "" && file_exists("../assets/upload/products/".$oldPhoto->photo5))
					unlink("../assets/upload/products/".$oldPhoto->photo5);
				//---
				$photo5 = time()."_".$_FILES["photo5"]["name"];
				//upload anh
				move_uploaded_file($_FILES["photo5"]["tmp_name"], "../assets/upload/products/$photo5");
				//update lai truong photo5
				$conn->query("update products set photo5='$photo5' where id=$id");
			}
		}
		//create bang ghi
		public function modelCreate(){
			$name = $_POST["name"];
			$description = $_POST["description"];
			$content = $_POST["content"];
			$hot = isset($_POST["hot"]) ? 1 : 0;
			$photo = "";
			$photo1 = "";
			$photo2 = "";
			$photo3 = "";
			$photo4 = "";
			$photo5 = "";
			$price = $_POST["price"];
			$discount = $_POST["discount"];
			$category_id = $_POST["category_id"];
			//kiem tra xem user co chon anh de upload khong, neu co thi xoa anh cu, upload anh moi
			if($_FILES["photo"]["name"] != ""){				
				$photo = time()."_".$_FILES["photo"]["name"];
				//upload anh
				move_uploaded_file($_FILES["photo"]["tmp_name"], "../assets/upload/products/$photo");				
			}
			if($_FILES["photo1"]["name"] != ""){				
				$photo1 = time()."_".$_FILES["photo1"]["name"];
				//upload anh
				move_uploaded_file($_FILES["photo1"]["tmp_name"], "../assets/upload/products/$photo1");				
			}
			if($_FILES["photo2"]["name"] != ""){				
				$photo2 = time()."_".$_FILES["photo2"]["name"];
				//upload anh
				move_uploaded_file($_FILES["photo2"]["tmp_name"], "../assets/upload/products/$photo2");				
			}
			if($_FILES["photo3"]["name"] != ""){				
				$photo3 = time()."_".$_FILES["photo3"]["name"];
				//upload anh
				move_uploaded_file($_FILES["photo3"]["tmp_name"], "../assets/upload/products/$photo3");				
			}
			if($_FILES["photo4"]["name"] != ""){				
				$photo4 = time()."_".$_FILES["photo4"]["name"];
				//upload anh
				move_uploaded_file($_FILES["photo4"]["tmp_name"], "../assets/upload/products/$photo4");				
			}
			if($_FILES["photo5"]["name"] != ""){				
				$photo5 = time()."_".$_FILES["photo5"]["name"];
				//upload anh
				move_uploaded_file($_FILES["photo5"]["tmp_name"], "../assets/upload/products/$photo5");				
			}
			//lay bien ket noi
			$conn = Connection::getInstance();
			//update du lieu tuong ung voi id truyen vao
			$conn->query("insert into products set name='$name',description='$description',content='$content',hot=$hot,photo='$photo',photo1='$photo1',photo2='$photo2',photo3='$photo3',photo4='$photo4',photo5='$photo5',price=$price,discount=$discount,category_id=$category_id");
		}
		//xoa ban ghi
		public function modelDelete($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//---
			//lay anh cu
			$queryOldPhoto = $conn->query("select photo from products where id=$id");
			//lay mot ban ghi
			$oldPhoto = $queryOldPhoto->fetch();
			if($oldPhoto->photo != "" && file_exists("../assets/upload/products/".$oldPhoto->photo))
				unlink("../assets/upload/products/".$oldPhoto->photo);
			//---
			//---
			//lay anh cu
			$queryOldPhoto = $conn->query("select photo1 from products where id=$id");
			//lay mot ban ghi
			$oldPhoto = $queryOldPhoto->fetch();
			if($oldPhoto->photo1 != "" && file_exists("../assets/upload/products/".$oldPhoto->photo1))
				unlink("../assets/upload/products/".$oldPhoto->photo1);
			//---
			//---
			//lay anh cu
			$queryOldPhoto = $conn->query("select photo2 from products where id=$id");
			//lay mot ban ghi
			$oldPhoto = $queryOldPhoto->fetch();
			if($oldPhoto->photo2 != "" && file_exists("../assets/upload/products/".$oldPhoto->photo2))
				unlink("../assets/upload/products/".$oldPhoto->photo2);
			//---
			//---
			//lay anh cu
			$queryOldPhoto = $conn->query("select photo3 from products where id=$id");
			//lay mot ban ghi
			$oldPhoto = $queryOldPhoto->fetch();
			if($oldPhoto->photo3 != "" && file_exists("../assets/upload/products/".$oldPhoto->photo3))
				unlink("../assets/upload/products/".$oldPhoto->photo3);
			//---
			//---
			//lay anh cu
			$queryOldPhoto = $conn->query("select photo4 from products where id=$id");
			//lay mot ban ghi
			$oldPhoto = $queryOldPhoto->fetch();
			if($oldPhoto->photo4 != "" && file_exists("../assets/upload/products/".$oldPhoto->photo4))
				unlink("../assets/upload/products/".$oldPhoto->photo4);
			//---
			//---
			//lay anh cu
			$queryOldPhoto = $conn->query("select photo5 from products where id=$id");
			//lay mot ban ghi
			$oldPhoto = $queryOldPhoto->fetch();
			if($oldPhoto->photo5 != "" && file_exists("../assets/upload/products/".$oldPhoto->photo5))
				unlink("../assets/upload/products/".$oldPhoto->photo5);
			//---
			$conn->query("delete from products where id=$id");
		}	
		//lay ten danh muc san pham
		public function modelGetCategory($category_id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select name from categories where id=$category_id");
			$result = $query->fetch();
			return isset($result->name) ? $result->name : "";
		}	
		//lay danh sach danh muc san pham
		public function modelListCategory(){
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select * from categories where parent_id = 0 order by id desc");
			$result = $query->fetchAll();
			return $result;
		}
		//lay danh muc con
		public function modelListCategorySub($category_id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select * from categories where parent_id = $category_id order by id desc");
			$result = $query->fetchAll();
			return $result;
		}
	}
 ?>