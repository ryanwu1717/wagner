<?php
use Slim\Http\UploadedFile;
	// Class User{
	// 	var $result;
	// 	var $conn;
	// 	function __construct($db){
	// 		$this->conn = $db;
	// 	}
	// 	function login()
	// 	{
	// 		$_POST=json_decode($_POST['data'],true);
	// 	   	$loginStaffId = $_POST['loginStaffId'];
	// 		$loginPassword = $_POST['loginPassword'];
	// 		$sql ="SELECT * FROM staff.staff WHERE staff_id = :staff_id and staff_password = :staff_password and staff_delete=false and \"seniority_workStatus\" =1;";
	// 		$sth = $this->conn->prepare($sql);
	// 	   	$sth->bindParam(':staff_id',$loginStaffId);
	// 	   	$sth->bindParam(':staff_password',$loginPassword);
	// 		$sth->execute();
	// 		$row = $sth->fetchAll();
	// 		if(count($row)==1){
	// 			$_SESSION['id']=$loginStaffId;
	// 			$ack = array(
	// 				'status' => 'success',
	// 			);
	// 		}else{
	// 			$ack = array(
	// 				'status' => 'failed'
	// 			);
	// 		}
	// 		return $ack;
	// 	}

	// 	function getName(){
	// 		$staff_id = $_SESSION['id'];
	// 		$sql ="SELECT staff_name FROM staff.staff WHERE staff_id = :staff_id;";
	// 		$sth = $this->conn->prepare($sql);
	// 	   	$sth->bindParam(':staff_id',$staff_id,PDO::PARAM_STR);
	// 		$sth->execute();
	// 		$row = $sth->fetchAll();
	// 		return $row;
	// 	}
	// 	function changePassword(){
	// 		$_POST=json_decode($_POST['data'],true);
	// 		if($_POST['inputPasswordNew']!=$_POST['inputPasswordNewCheck']){
	// 			$ack = array(
	// 				'status' => 'failed',
	// 				'input' => 'inputPasswordNewCheck',
	// 				'message' => '密碼不一致'
	// 			);
	// 		}else{
	// 			$staff = new Staff($this->conn);
	// 			if($staff -> check("密碼",$_POST['inputPasswordNew'])!='success'){
	// 				$ack = array(
	// 					'status' => 'failed',
	// 					'input' => 'inputPasswordNew',
	// 					'message' => '密碼格式不符'
	// 				);
	// 			}else{
	// 				$sql ="SELECT * FROM staff.staff WHERE staff_id = :staff_id and staff_password = :staff_password and staff_delete=false;";
	// 				$sth = $this->conn->prepare($sql);
	// 			   	$sth->bindParam(':staff_id',$_SESSION['id']);
	// 			   	$sth->bindParam(':staff_password',$_POST['inputPasswordOrg']);
	// 				$sth->execute();
	// 				$row = $sth->fetchAll();
	// 				if(count($row)!=1){
	// 					$ack = array(
	// 						'status' => 'failed',
	// 						'input' => 'inputPasswordOrg',
	// 						'message' => '原密碼錯誤'
	// 					);
	// 				}else{
	// 					$sql ="UPDATE staff.staff SET staff_password = :staff_password WHERE staff_id = :staff_id;";
	// 					$sth = $this->conn->prepare($sql);
	// 				   	$sth->bindParam(':staff_id',$_SESSION['id']);
	// 				   	$sth->bindParam(':staff_password',$_POST['inputPasswordNew']);
	// 					$sth->execute();
	// 					$ack = array(
	// 						'status' => 'success'
	// 					);
	// 				}
	// 			}
	// 		}
	// 		return $ack;
	// 	}
	// }





Class User{
	var $result;
	var $conn;
	function __construct($db){
		$this->conn = $db;
	}
	function login()
	{
		$_POST=json_decode($_POST['data'],true);
		if($_POST['verification'] != $_SESSION['verification']){
			$ack = array(
					'status' => 'failed',
					'text' => '請輸入正確驗證碼',
					// 'correct' => $_SESSION['verification']
				);
			return $ack;
		}

		// var_dump($_POST['account'],$_POST['password']);
		$sql ='SELECT * FROM `user` WHERE account = :account and password = :password and `delete` = false ;';
		$sth = $this->conn->prepare($sql);
	   	$sth->bindParam(':account',$_POST['account']);
	   	$sth->bindParam(':password',$_POST['password']);
		$sth->execute();
		$row = $sth->fetchAll();
		if(count($row)==1){
			$_SESSION['id']=$row[0]['id'];
			$ack = array(
				'status' => 'success',
			);
		}else{
			$ack = array(
				'status' => 'failed',
				'text' => '帳號或密碼錯誤'

			);
		}
		return $ack;
	}
	function getInfo($id=null){
		if(is_null($id)){
			$sql ='SELECT * FROM `etest`.`user` WHERE `delete` = false ;';
			$sth = $this->conn->prepare($sql);
			$sth->execute();
			$row = $sth->fetchAll();
			return $row;
		}else {
			$sql ='SELECT * FROM `etest`.`user` WHERE id = :id ;';
			$sth = $this->conn->prepare($sql);
		   	$sth->bindParam(':id',$id);
			$sth->execute();
			$row = $sth->fetchAll();
			return $row;
		}
	}
	function getProfile($id){
		$profile = $this->getInfo($id);
		$data = array();
		foreach ($profile[0] as $key => $value) {
			if($key=='id') $data['用戶編號']=$value;
			else if($key=='name') $data['中文姓名']=$value;
			else if($key=='account') $data['帳號']=$value;
			else if($key=='password') $data['密碼']=$value;
			else if($key=='school') $data['服務單位']=$value;
			else if($key=='department') $data['職員編號']=$value;
			else if($key=='phone') $data['行動電話']=$value;

		}
		return $data;
	}
	

	function getID($type=null){
		if(is_null($type)){
			return 'null';
		}else if($type == 'my'){
			return $_SESSION['id'];
		}
	}
	function getName(){
		$sql ='SELECT name FROM `user` WHERE id = :id ;';
		$sth = $this->conn->prepare($sql);
	   	$sth->bindParam(':id',$_SESSION['id']);
		$sth->execute();
		$row = $sth->fetchAll();
		return $row;
	}

	function deleteUser($id){
		$sql ='UPDATE `user` SET `delete`= true  WHERE `id`=:id';
		$sth = $this->conn->prepare($sql);
	   	$sth->bindParam(':id',$id);
		$sth->execute();
		// $row = $sth->fetchAll();
		return 'success';
	}

	function getVerificationPic(){
		 // Header("Content-type: image/PNG");
	    //準備好隨機數發生器種子 
	    srand((double)microtime()*1000000);
	    //準備圖片的相關參數  
	    $im = imagecreate(62,20);
	    $black = ImageColorAllocate($im, 0,0,0);  //RGB黑色標識符
	    $white = ImageColorAllocate($im, 255,255,255); //RGB白色標識符
	    $gray = ImageColorAllocate($im, 200,200,200); //RGB灰色標識符
	    //開始作圖    
	    imagefill($im,0,0,$gray);
	    while(($randval=rand()%100000)<10000);{
	        $_SESSION["login_check_num"] = $randval;
	        //將四位整數驗證碼繪入圖片 
	        imagestring($im, 5, 10, 3, $randval, $black);
	    }
	    //加入干擾象素   
	    for($i=0;$i<200;$i++){
	        $randcolor = ImageColorallocate($im,rand(0,255),rand(0,255),rand(0,255));
	        imagesetpixel($im, rand()%70 , rand()%30 , $randcolor);
	    }
	    //輸出驗證圖片
	    imagepng($im);
	    return($im);
	}

	function changePassword(){
		// var_dump($_POST);
		
		$_POST=json_decode($_POST['data'],true);
		$checkPassword= $this -> check('密碼',$_POST['new']);
		if($checkPassword != 'success'){
			$ack = array(
				'status' => 'failed',
				'content'=> $checkPassword
			);
			return $ack;
		}
		if($_POST["new"] != $_POST["check"]){
			$ack = array(
				'status' => 'failed',
				'content'=> '請確認新密碼'
			);
		}else{
			$sql ='SELECT password FROM `user` WHERE id = :id ;';
			$sth = $this->conn->prepare($sql);
		   	$sth->bindParam(':id',$_SESSION['id']);
			$sth->execute();
			$row = $sth->fetchAll();
			if($row[0]['password']==$_POST["org"]){

				$sql ='UPDATE `etest`.`user`
						SET `password` = :password
						WHERE `id` = :id;
						';
				$sth = $this->conn->prepare($sql);
			   	$sth->bindParam(':id',$_SESSION['id']);
				$sth->bindParam(':password',$_POST['new'],PDO::PARAM_STR);
				$sth->execute();
				$ack = array(
					'status' => 'success',
					'content'=> '修改密碼成功'
				);
			}else{
				$ack = array(
					'status' => 'failed',
					'content'=> '請輸入正確原密碼'
				);
			}
		}
		// var_dump($_POST["new"]);
		return $ack;

	}
	function getFunction(){
		try{
			$sql ='SELECT `tmpPermission`.role,`tmpPermission`.name,`tmpPermission`.href
					FROM `etest`.`user` as `user`
					LEFT JOIN (
						SELECT * 
						FROM `etest`.`authority` as `authority`
						LEFT JOIN (
							SELECT *
							FROM `etest`.`permission`
							
						) as `permission` ON `permission`.id = `authority`.permissionID
					)as `tmpPermission` on `tmpPermission`.role = `user`.authority
					WHERE `user`.id = :id;';
			$sth = $this->conn->prepare($sql);
			$sth->bindParam(':id',$_SESSION['id']);

			$sth->execute();
			$row = $sth->fetchAll();
			return $row;
		}catch(PDOException $e){
			$ack = array(
				'status' => 'failed',
				'message'=>$e
			);
		}

		return $ack;
	}
	function modify(){
		try{
			$_POST=json_decode($_POST['data'],true);
			$sql ='
				UPDATE `user` 
				SET `name`=:name ,`account`=:account, `phone`=:phone ,`school`=:school,`department`=:department
				WHERE `id`=:id';
			$statement = $this->conn->prepare($sql);
			$statement->bindParam(':name',$_POST['inputChineseName'],PDO::PARAM_STR);
			$statement->bindParam(':account',$_POST['inputAccount'],PDO::PARAM_STR);
			$statement->bindParam(':phone',$_POST['inputPhone'],PDO::PARAM_STR);
			$statement->bindParam(':school',$_POST['inputSchool'],PDO::PARAM_STR);
			$statement->bindParam(':department',$_POST['inputDepartment'],PDO::PARAM_STR);
			$statement->bindParam(':id',$_POST['id'],PDO::PARAM_INT);

			$statement->execute();
			// $row = $statement->fetchAll();
			$ack = array(
				'status'=>'success',
				'message'=> $_POST['id']

			);
		}catch(PDOException $e){
			$ack = array(
				'status' => 'failed',
				'message'=>$e
			);
		}

		return $ack;
	}
	function register(){
		try{
			$_POST=json_decode($_POST['data'],true);
			$sql ='INSERT INTO `user` ( `name`, `account`, `password`, `phone`, `school`, `department`, `authority`) VALUES (:name, :account, :password, :phone, :school, :department, \'2\');';
			$statement = $this->conn->prepare($sql);
			$statement->bindParam(':name',$_POST['inputChineseName'],PDO::PARAM_STR);
			$statement->bindParam(':account',$_POST['inputAccount'],PDO::PARAM_STR);
			$statement->bindParam(':password',$_POST['inputPassword'],PDO::PARAM_STR);
			$statement->bindParam(':phone',$_POST['inputPhone'],PDO::PARAM_STR);
			$statement->bindParam(':school',$_POST['inputSchool'],PDO::PARAM_STR);
			$statement->bindParam(':department',$_POST['inputDepartment'],PDO::PARAM_STR);
			$statement->execute();
			// $row = $statement->fetchAll();
			$ack = array(
				'status'=>'success'

			);
		}catch(PDOException $e){
			$ack = array(
				'status' => 'failed',
				'message'=>$e
			);
		}

		return $ack;

	}
	function checkString($strings, $standard){
   		// echo "inCheck";
       if(preg_match($standard, $strings, $hereArray)) {
        	return 1;
       } else {
       		return 0;
       }
   	}
   public function check($field,$input){
   		if(empty($input)){
   			return $field."不得為空";
   		}
   		$inputLen = strlen($input);

   		//A. 檢查是不是數字
        $standard_A = "/^([0-9]+)$/";
   		//A. 檢查是不是分機符號
        $standard_A_1 = "/^([0-9]+)*(#([0-9]+))?$/";
   		//A. 檢查是不是就學期間
        $standard_A_2 = "/^([0-9]{2,3}-[0-9]{2,3})$/";
        //B. 檢查是不是小寫英文
        $standard_B = "/^([a-z]+)$/";
        //C. 檢查是不是大寫英文
        $standard_C = "/^([A-Z]+)$/";
        //D. 檢查是不是全為英文字串
        $standard_D = "/^([A-Za-z]+)$/";
        //E. 檢查是不是英數混和字串
        $standard_E = "/^(?=.*\d)(?=.*[a-zA-Z]).{8,30}$/";
        //F. 檢查是不是中文
        $standard_F = "/^([\x7f-\xff]+)$/";
        //G. 檢查是不是電子信箱格式
        //$standard_G_1 這組正則允許 "stanley.543-ok@myweb.com"
        //但 $standard_G_2 僅允許 "stanley543ok@myweb.com" ，字串內不包含 .(點)和 -(中線)
        $standard_G_1 = "/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/";
        $standard_G_2 = "/^[\w]*@[\w-]+(\.[\w-]+)+$/" ;
        //下面則是個簡單的範例，大家可以嘗試看看
        $standard_G_1 = "/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/";

        $standard_G_2 = "/^[\w]*@[\w-]+(\.[\w-]+)+$/" ;
        //echo ($this -> checkString($input, $standard_F));
   		switch ($field) {
   			case '中文名字':
   				$name_len = mb_strlen($input);
   				// echo $name_len;
   				if(($this -> checkString($input, $standard_F)) == 0){
					return $field."不符合格式";

				}
				if (($name_len > 4) or ($name_len < 2 )){
					return  $field."請輸入2~4字元";
				}
   				return "success";
   			case '帳號':
				$sql ='SELECT * FROM `user` WHERE account = :account and `delete` = false ;';
				$sth = $this->conn->prepare($sql);
			   	$sth->bindParam(':account',$input);
				$sth->execute();
				$row = $sth->fetchAll();
				if(count($row)>0){
					return $field."已被使用";
				}
   				if($this -> checkString($input, $standard_A) == 1||$this -> checkString($input, $standard_D) == 1||$this -> checkString($input, $standard_E) == 1){
					return "success";

				}else{
					return $field."不符合格式";
				}
   				return "success";
   			
			case '電話':
   				if($this -> checkString($input, $standard_A) == 0){
					return $field."不符合格式";
				}
				return "success";
				break;
			case '學校':
   				if($inputLen > 20){
					return $field."不符合格式";
				}
				return "success";
				break;
			case '科系':
   				if($inputLen > 20){
					return $field."不符合格式";
				}
				return "success";
				break;
			case '密碼':
   				if(($this -> checkString($input, $standard_E)) == 0){
					return $field."至少8個英數混合";
				}else if($inputLen < 8){
					return $field."至少8個英數混合";
				}
				return "success";
				break;
   			default:
   				return "success";
   				break;
   		}
   	}

	function testcheckRegister(){
		$_POST=json_decode($_POST['data'],true);
		// $check = array();
		if($_POST['inputVerification'] != $_SESSION['verification']){
			$ack = array(
					'verificationame' => '請輸入正確驗證碼',
				);
			return $ack;
		}

		$checkChineseName = $this -> check('中文姓名',$_POST['inputChineseName']);
		$checkAccount = $this -> check('帳號',$_POST['inputAccount']);
		$checkPassword= $this -> check('密碼',$_POST['inputPassword']);
		$checkPhone = $this -> check('電話',$_POST['inputPhone']);
		$checkSchool = $this -> check('學校',$_POST['inputSchool']);
		$checkDepartment = $this -> check('科系',$_POST['inputDepartment']);
		$ack = array(
					'chineseName' => $checkChineseName,
					'account' => $checkAccount,
					'password' => $checkPassword,
					'phone'=> $checkPhone,
					'school' => $checkSchool,
					'department' => $checkDepartment
				);
		return $ack;
	}
	
	

	

}
Class Test{
	var $result;
	var $conn;
	function __construct($db){
		$this->conn = $db;
	}
	function getChapter($bookID){
		$sql ='SELECT * FROM etest.chapter WHERE bookID=:bookID;';
		$sth = $this->conn->prepare($sql);
	   	$sth->bindParam(':bookID',$bookID);
		$sth->execute();
		$row = $sth->fetchAll();

		$sql ='SELECT * 
				FROM etest.chapter 
				LEFT JOIN (
					select * 
				    from etest.unit
				)as unit on unit.chapterID = chapter.id
				WHERE bookID= :bookID';
		$sth = $this->conn->prepare($sql);
	   	$sth->bindParam(':bookID',$bookID);
		$sth->execute();
		$tmprow = $sth->fetchAll();

		$ack = array(
			'chapter' =>  $row,
			'unit' =>  $tmprow
		);
		return $ack;
	}
	function getUnit($chapterID){
		$sql ='SELECT * FROM `unit` WHERE `chapterID` = :chapterID';
		$sth = $this->conn->prepare($sql);
	   	$sth->bindParam(':chapterID',$chapterID);
		$sth->execute();
		$row = $sth->fetchAll();
		return $row;
	}

	function getBook()
	{
		$sql ='SELECT `user`.id,`allBook`.id,`allBook`.name
				FROM etest.`user` as `user`
				LEFT JOIN (
					SELECT * 
					FROM `etest`.`buyBook` as `buyBook`
					LEFT JOIN (
						SELECT * 
						FROM `etest`.book
					) AS book ON `book`.id = `buyBook`.bookID
				)AS allBook ON `allBook`.UID = `user`.id
				WHERE `user`.id = :id;';
		$sth = $this->conn->prepare($sql);
	   	$sth->bindParam(':id',$_SESSION['id']);
		$sth->execute();
		$row = $sth->fetchAll();
		// var_dump($_SESSION['id']);
		return $row;
	}
}
?>