<?php

include(__DIR__.'/../PHPExcel-1.8/Classes/PHPExcel.php');
include(__DIR__.'/../PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
require_once(__DIR__.'/../PHPExcel-1.8/Classes/PHPExcel/IOFactory.php');
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
				// echo $name_len;
   				if(($this -> checkString($input, $standard_G_1)) == 0){
					return $field."不符合格式";
				}
   	// 			if($this -> checkString($input, $standard_A) == 1||$this -> checkString($input, $standard_D) == 1||$this -> checkString($input, $standard_E) == 1){
				// 	return "success";

				// }else{
				// 	return $field."不符合格式";
				// }
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

	 public function checkQ($field,$input){
   		if(empty($input)){
   			
   			if($input != 0 ){
   				return $field."不得為空";
   			}

   		}

   		return 'success';
   	}

   	function addTest(){
		$_POST=json_decode($_POST['data'],true);
		$tmp = $_POST['questionType'];
		$sql ='INSERT INTO `etest`.`test`(`school`,`department`,`name`,`size`,`file`,`UID`)
				VALUES(:school,:department,:name,:size,:file,:UID);';
		$sth = $this->conn->prepare($sql);
	   	$sth->bindParam(':school',$tmp['schoolName']);
	   	$sth->bindParam(':department',$tmp['DepartmentName']);
	   	$sth->bindParam(':name',$tmp['testName']);
	   	$sth->bindParam(':size',$tmp['testSize']);
	   	$sth->bindParam(':file',$tmp['fileName']);
	   	$sth->bindParam(':UID',$_SESSION['id']);
		$sth->execute();
		$tmpID = $this->conn->lastInsertId();
		foreach ($_POST['question'] as $value) {
	        $sql ='INSERT INTO `etest`.`testQuestion`(`testID`,`questionID`)
					VALUES(:testID,:questionID);';
			$sth = $this->conn->prepare($sql);
		   	$sth->bindParam(':testID',$tmpID);
		   	$sth->bindParam(':questionID',$value);
			$sth->execute();
	    }
	    $ack = array(
	    	'id' => $tmpID
	    );
   		return $ack;
   	}

	function checkQuestion(){
		$_POST=json_decode($_POST['data'],true);
		// $unit = $this -> checkQ('選擇單元',$_POST['unit']['selectUnit']);
		$DepartmentName = $this -> checkQ('科系名稱',$_POST['questionType']['DepartmentName']);
		$askNum = $this -> checkQ('問答題數',$_POST['questionType']['askNum']);
		$askScore = $this -> checkQ('問答分數',$_POST['questionType']['askScore']);
		$chooseNum = $this -> checkQ('選擇題數',$_POST['questionType']['chooseNum']);
		$chooseScore = $this -> checkQ('選擇分數',$_POST['questionType']['chooseScore']);
		$fillNum = $this -> checkQ('填充題數',$_POST['questionType']['fillNum']);
		$fillScore = $this -> checkQ('填充分數',$_POST['questionType']['fillScore']);
		$fileName = $this -> checkQ('檔案名稱',$_POST['questionType']['fileName']);
		$questionContent = $this -> checkQ('選擇題型',$_POST['questionType']['questionContent']);
		$schoolName = $this -> checkQ('學校名稱',$_POST['questionType']['schoolName']);
		$testName = $this -> checkQ('試卷名稱',$_POST['questionType']['testName']);
		$testSize = $this -> checkQ('試卷尺寸',$_POST['questionType']['testSize']);

		if($_POST['questionType']['chooseNum'] < $_POST['checkChoose']){
			$chooseNum = '多選'.($_POST['checkChoose']-$_POST['questionType']['chooseNum']).'題';
		}else if($_POST['questionType']['chooseNum'] > $_POST['checkChoose']){
			$chooseNum = '需再選'.($_POST['questionType']['chooseNum']-$_POST['checkChoose']).'題';

		}

		if($_POST['questionType']['fillNum'] < $_POST['checkFill']){
			$fillNum = '多選'.($_POST['checkFill']-$_POST['questionType']['fillNum']).'題';
		}else if($_POST['questionType']['fillNum'] > $_POST['checkFill']){
			$fillNum = '需再選'.($_POST['questionType']['fillNum']-$_POST['checkFill']).'題';

		}

		if($_POST['questionType']['askNum'] < $_POST['checkAsk']){
			$askNum = '多選'.($_POST['checkAsk']-$_POST['questionType']['askNum']).'題';
		}else if($_POST['questionType']['askNum'] > $_POST['checkAsk']){
			$askNum = '需再選'.($_POST['questionType']['askNum']-$_POST['checkAsk']).'題';

		}


		$ack = array(
			// '選擇單元' => $unit,
			'科系名稱' => $DepartmentName,
			'選擇題數' => $chooseNum,
			'選擇分數' => $chooseScore,
			'填充題數' => $fillNum,
			'填充分數' => $fillScore,
			'問答題數' => $askNum,
			'問答分數' => $askScore,
			'檔案名稱' => $fileName,
			'選擇題型' => $questionContent,
			'學校名稱' => $schoolName,
			'試卷名稱' => $testName,
			'試卷尺寸' => $testSize
		);

		return $ack;
	}



	function getselectUnit(){
		$_POST=json_decode($_POST['data'],true);
		$unit = $chapter = array();

		foreach ($_POST['unit'] as $value) {
		    $sql ='SELECT  `unit`.*,`chapter`.`name` as `chapterName`
					FROM `etest`.`unit` as `unit`
					LEFT JOIN(
						SELECT *
						FROM `etest`.`chapter`
					)AS `chapter`ON `chapter`.`id` =`unit`.`chapterID`
					WHERE  `unit`.`id` = :id
					;';
			$sth = $this->conn->prepare($sql);
		   	$sth->bindParam(':id',$value);
			$sth->execute();
			$row = $sth->fetchAll();
		
		    if(!array_key_exists($row[0]['chapterID'], $chapter)){
		    	// var_dump('in');
		    	$chapter[$row[0]['chapterID']]= $row[0]['chapterName'];
		    }
		    array_push($unit,  $row[0]);

		}
		$ack = array(
			'chapter' => $chapter,
			'unit' => $unit
		);
		return($ack);

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

	function checkSecondPage(){
		$_POST=json_decode($_POST['data'],true);
		$tmpSum = $_POST['askScore'] +  $_POST['chooseScore'] +  $_POST['fillScore'];
		$tmpSumNum = $_POST['chooseNum'] +  $_POST['fillNum'] +  $_POST['askNum'];
		if($_POST['askScore']!=0 || $_POST['askNum']!=0){
			$askAverage = $_POST['askScore'] /  $_POST['askNum'];
		}else {
			$askAverage = 0;
		}
		if($_POST['chooseScore']!=0 || $_POST['chooseNum']!=0){
			$chooseAverage = $_POST['chooseScore'] /  $_POST['chooseNum'];
		}else {
			$chooseAverage = 0;
		}
		if($_POST['fillScore']!=0 || $_POST['fillNum']!=0){
			$fillAverage = $_POST['fillScore'] /  $_POST['fillNum'];
		}else {
			$fillAverage = 0;
		}


		if(is_nan($askAverage)){
			$askAverage = 0;
		}else{
			$askAverage = number_format($askAverage, 2, '.', '');
			$askAverage = '問答題有'. $_POST['askNum'].'題 每題'.$askAverage.' 合計'.$_POST['askScore'].'分';
		}
		if(is_nan($chooseAverage)){
			$chooseAverage = 0;
		}else{
			$chooseAverage = number_format($chooseAverage, 2, '.', '');

			$chooseAverage = '選擇題有'. $_POST['chooseNum'].'題 每題'.$chooseAverage.' 合計'.$_POST['chooseScore'].'分';
		}
		if(is_nan($fillAverage)){
			$fillAverage = 0;
		}else{
			$fillAverage = number_format($fillAverage, 2, '.', '');

			$fillAverage = '填充題有'. $_POST['fillNum'].'題 每題'.$fillAverage.' 合計'.$_POST['fillScore'].'分';
		}
		$ack = array(
				'status' => 'success',
				'chooseAverage' => $chooseAverage,
				'askAverage' => $askAverage,
				'fillAverage' => $fillAverage

			);

		if($tmpSum != 100){
			$ack = array(
				'status' => 'failed',
				'content' => '分數總合不為100'
			);
		}
		if($tmpSumNum == 0 ){
			$ack = array(
				'status' => 'failed',
				'content' => '題數不得為0'
			);
		}
		// var_dump($_POST['askScore'] == 0);
		if(($_POST['askScore'] != 0 )&& ($_POST['askNum']== 0)){
			$ack = array(
				'status' => 'failed',
				'content' => '問答題題目不得為0'
			);
		}else if(($_POST['chooseScore'] != 0) &&  ($_POST['chooseNum'] == 0)){
			$ack = array(
				'status' => 'failed',
				'content' => '選擇題題目不得為0'
			);
		}else if(($_POST['fillScore'] != 0 )&& ( $_POST['fillNum'] == 0)){
			$ack = array(
				'status' => 'failed',
				'content' => '填充題題目不得為0'
			);
		}

		if(($_POST['askScore'] == 0 )&& ($_POST['askNum'] != 0)){
			$ack = array(
				'status' => 'failed',
				'content' => '問答題配分不得為0'
			);
		}else if(($_POST['chooseScore'] )== 0 &&  ($_POST['chooseNum'] != 0)){
			$ack = array(
				'status' => 'failed',
				'content' => '選擇題配分不得為0'
			);
		}else if(($_POST['fillScore'] == 0 )&&  ($_POST['fillNum'] != 0)){
			$ack = array(
				'status' => 'failed',
				'content' => '填充題配分不得為0'
			);
		}

		if(empty($_POST['questionContent'])){
			$ack = array(
				'status' => 'failed',
				'content' => '尚未選擇題型內容'
			);
		}
		if(empty($_POST['selectUnit'] )){
			$ack = array(
				'status' => 'failed',
				'content' => '尚未選擇單元'
			);
		}

		
		if(empty($_POST['fileName'] )){
			$ack = array(
				'status' => 'failed',
				'content' => '檔案名稱不得為空'
			);
		}else if(empty($_POST['testName'] )){
			$ack = array(
				'status' => 'failed',
				'content' => '考試名稱不得為空'
			);
		}else if(empty($_POST['DepartmentName'] )){
			$ack = array(
				'status' => 'failed',
				'content' => '科系名稱不得為空'
			);
		}else if(empty($_POST['testSize'] )){
			$ack = array(
				'status' => 'failed',
				'content' => '試卷尺寸不得為空'
			);
		}else if(empty($_POST['schoolName'] )){
			$ack = array(
				'status' => 'failed',
				'content' => '學校名稱不得為空'
			);
		}



		return $ack;
	}
}

Class Question{
	var $result;
	var $conn;
	function __construct($db){
		$this->conn = $db;
	}

	function getQuestion($unitID, $source){
		
		if($source == 'both'){
			$chooseG = $this ->getQandA($unitID,'general','choose');
			$chooseP= $this ->getQandA($unitID,'previous','choose');
			$fillG = $this ->getQandA($unitID,'general','fill');
			$fillP= $this ->getQandA($unitID,'previous','fill');
			$askG = $this ->getQandA($unitID,'general','ask');
			$askP= $this ->getQandA($unitID,'previous','ask');

			$choose = array_merge($chooseG, $chooseP);
			$fill = array_merge($fillG, $fillP);
			$ask = array_merge($askG, $askP);
		}else{
			$choose = $this ->getQandA($unitID,$source,'choose');
			$fill = $this ->getQandA($unitID,$source,'fill');
			$ask = $this ->getQandA($unitID,$source,'ask');
		}
		// var_dump($select);


		$ack = array(
			'choose' => $choose,
			'fill' => $fill,
			'ask' => $ask
		);
		return $ack;

	}

	function getQandA($unitID, $source,$type){
		$sql ='SELECT `question`.`id`,`question`.`question`,`question`.`degree`,`question`.`source`,`question`.`isMultiple`,`question`.`unitID`,`question`.`type` 
				FROM `etest`.`question`
				WHERE `question`.`type` = :type AND `question`.`unitID` = :unitID AND `question`.`source` = :source';
		$sth = $this->conn->prepare($sql);
	   	// $sth->bindParam(':type',$type);
	   	$sth->bindParam(':type',$type);
	   	$sth->bindParam(':unitID',$unitID);
	   	$sth->bindParam(':source',$source);
		$sth->execute();
		$row = $sth->fetchAll();
		$ack = array();
		foreach ($row as $value){
			// var_dump($value['id']);
			$sql ='SELECT `selectOption`.`id`,
					    `selectOption`.`selectID`,
					    `selectOption`.`content`,
					    `selectOption`.`isAnswer`
					FROM `etest`.`selectOption`
					WHERE `selectOption`.`selectID` = :selectID;';
			$sth = $this->conn->prepare($sql);
		   	$sth->bindParam(':selectID',$value['id']);
			$sth->execute();
			$ansRow = $sth->fetchAll();
			// var_dump($ansRow);
			$tmp= array(
				'question' => $value,
				'answer' => $ansRow
			);
			array_push($ack, $tmp);

			// var_dump($ack);

		}
		return $ack;

	}

	

}
Class File{
	var $result;
	var $conn;
	function __construct($db){
		$this->conn = $db;
	}
	private function moveUploadedFile($directory, UploadedFile $uploadedFile){
	    $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
	    $basename = bin2hex(random_bytes(8)); // see http://php.net/manual/en/function.random-bytes.php
	    $filename = sprintf('%s.%0.8s', $basename, $extension);
	    $uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $filename);
	    return $filename;
	}
	function uploadQuestion($directory,$uploadedFiles){
		$uploadedFile = $uploadedFiles['inputFile'];
		if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
	        $filename = $this->moveUploadedFile($directory, $uploadedFile);
	  //       $UID = $_SESSION['id'];
			$sql = 'INSERT INTO `file` (`UID`, `fileName`, `fileNameClient`) VALUES ( :UID,:fileName,:fileNameClient)';
			$sth = $this->conn->prepare($sql);
			$sth->bindParam(':fileName',$filename,PDO::PARAM_STR);
			$sth->bindParam(':fileNameClient',$uploadedFile->getClientFilename(),PDO::PARAM_STR);
			$sth->bindParam(':UID',$_SESSION['id'],PDO::PARAM_STR);
			$sth->execute();

			$returnQuestion = $this->excel_read($directory, $filename);
		    $result = array(
		    	'status' => 'success',
		    	'question' => $returnQuestion,
	    		'extension' => exif_imagetype($uploadedFile->getClientFilename())
		    );
	    }else{
		    $result = array(
		    	'status' => 'failed',
		    );
	    }

		;
	    return $result;
	}

	function excel_read($directory, $filename){
	  	$reader = PHPExcel_IOFactory::createReader('Excel2007'); // 讀取2007 excel 檔案
		$PHPExcel = $reader->load($directory.'/'.$filename); // 檔案名稱 需已經上傳到主機上
		$sheet = $PHPExcel->getSheet(0); // 讀取第一個工作表(編號從 0 開始)
		$highestRow = $sheet->getHighestRow(); // 取得總列數
		$highestcolumn = $sheet->getHighestColumn();
		$highestcolumn = PHPExcel_Cell::columnIndexFromString($highestcolumn);
		$highestChoose = $highestcolumn-2;
		// echo '總共 '.$highestRow.' 列';
		// echo '總共 '.$highestcolumn.' 欄';

		$column_name[0]="question";
		$column_name[1]="answer";
		$count = 1;
		for ($row = 2; $row <= $highestcolumn; $row++) {
			// var_dump($row);
			$column_name[$row]=$count;
			$count+=1;
		}

		

		$choose = array();
		$excel_row_array=array();

		// $val = $sheet->getCellByColumnAndRow(0, 1)->getValue();//此為第一格
		//var_dump($val);
		//一次讀取一列
		for ($row = 2; $row <= $highestRow; $row++) {
		  for ($column = 0; $column < $highestcolumn; $column++) {//看你有幾個欄位 此範例為 13 個位
		     
		      // $val = $sheet->getCellByColumnAndRow($column, $row)->getValue();
		      $excel_row_array[$column_name[$column]]=$sheet->getCellByColumnAndRow($column, $row)->getValue();
		      // echo $val.' ';
		  }
		  // echo "<br />";
		  array_push($choose,$excel_row_array);
		}

		$sheet = $PHPExcel->getSheet(1); // 讀取第一個工作表(編號從 0 開始)
		$highestRow = $sheet->getHighestRow(); // 取得總列數
		$highestcolumn = $sheet->getHighestColumn();
		$highestcolumn = PHPExcel_Cell::columnIndexFromString($highestcolumn);
		$column_name[0]="question";
		$column_name[1]="answer";
		$fill = array();
		$excel_row_array=array();
		for ($row = 2; $row <= $highestRow; $row++) {
		  for ($column = 0; $column < $highestcolumn; $column++) {
		      $excel_row_array[$column_name[$column]]=$sheet->getCellByColumnAndRow($column, $row)->getValue();
		  }
		  array_push($fill,$excel_row_array);
		}

		$sheet = $PHPExcel->getSheet(2); // 讀取第一個工作表(編號從 0 開始)
		$highestRow = $sheet->getHighestRow(); // 取得總列數
		$highestcolumn = $sheet->getHighestColumn();
		$highestcolumn = PHPExcel_Cell::columnIndexFromString($highestcolumn);
		$column_name[0]="question";
		$ask = array();
		$excel_row_array=array();
		for ($row = 2; $row <= $highestRow; $row++) {
		  for ($column = 0; $column < $highestcolumn; $column++) {
		      $excel_row_array[$column_name[$column]]=$sheet->getCellByColumnAndRow($column, $row)->getValue();
		  }
		  array_push($ask,$excel_row_array);
		}

		// $result = array();
		// $array[1]="a";
		// $array[2]="b";
		// array_push($result,$array);
		$result=array(
			'choose' => $choose,
			'fill' => $fill,
			'ask' => $ask,
			'highestChoose' => $highestChoose
		);
		return $result;
		// var_dump($result);
		// echo "<br />";

		// $json_encode=json_encode($result);
		// print_r($json_encode);
	 }
		
}
Class Permission{
	var $result;
	var $conn;
	function __construct($db){
		$this->conn = $db;
	}
	function getPermission(){
		$sql ='SELECT * FROM `permission`;';
		$sth = $this->conn->prepare($sql);
		$sth->execute();
		$row = $sth->fetchAll();
		return $row;
	}
}
?>