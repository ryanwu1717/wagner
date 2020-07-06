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
		function register(){
			try{
				$_POST=json_decode($_POST['data'],true);
				$sql ='INSERT INTO `user` ( `name`, `account`, `password`, `phone`, `school`, `department`, `authority`) VALUES (:name, :account, :password, :phone, :school, :department, \'1\');';
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
       				// $name_len = mb_strlen($input);
       				// echo $name_len;
       				if(($this -> checkString($input,  $standard_G_2)) == 0){
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
?>