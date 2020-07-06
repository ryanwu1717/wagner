<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
  <meta content="" name="description">
  <meta content="" name="author">
  <title>SB Admin 2 - Register</title><!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"><!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">註冊帳號</h1>
              </div>
              <form class="user">
                <!-- <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name">
                  </div>
                </div> -->
                <div class="form-group row">
                  <label class="col-form-label col-md-2">中文姓名</label>
                  <div class="col-md-8">
                    <input class="form-control form-control-user" required="" name="inputChineseName" placeholder="ex.王小美" type="text">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-md-2">帳號</label>
                  <div class="col-md-8">
                    <input class="form-control form-control-user" required="" name="inputAccount" placeholder="ex.wangshaomay@gmail.com" type="email">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-md-2">密碼</label>
                  <div class="col-md-8">
                    <input class="form-control form-control-user" required="" name="inputPassword" placeholder="ex.20201314wang" type="password">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-md-2">手機</label>
                  <div class="col-md-8">
                    <input class="form-control form-control-user" required="" name="inputPhone" placeholder="ex.0900000000" type="text">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-md-2">服務學校</label>
                  <div class="col-md-8">
                    <input class="form-control form-control-user" required="" name="inputSchool" placeholder="ex.旗山農工" type="text">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-md-2">科系</label>
                  <div class="col-md-8">
                    <input class="form-control form-control-user" required="" name="inputDepartment" placeholder="ex.食品加工科" type="text">
                  </div>
                </div>
                 <button type="button"  class="btn btn-primary btn-user btn-block" id="btnCheckRegister">註冊</button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">忘記帳號?</a>
              </div>
              <div class="text-center">
                <a class="small" href="/login">已經有帳號? 登入!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal" role="dialog" tabindex="-1" id="modalRegister">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="button" id='btnRegister'>確定</button> <button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
        </div>
      </div>
    </div>
  </div><!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js">
  </script> 
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js">
  </script> <!-- Core plugin JavaScript-->
   
  <script src="vendor/jquery-easing/jquery.easing.min.js">
  </script> <!-- Custom scripts for all pages-->
   
  <script src="js/sb-admin-2.min.js">
  </script>
</body>
</html>
<script type='text/javascript'>
$('#btnCheckRegister').on('click',function(){
  check();
}); 
$('#btnRegister').on('click',function(){
  regis();
 
}); 
function regis(){
   var data = new Object();
  $('input').each(function(eachid,eachdata){
    data[eachdata.name] = $(eachdata).val();
  });
   $.ajax({
    url:'/user/register',
    type:'POST',
    
    data:{data:JSON.stringify(data)},
    
    dataType:'json',
    success:function(response){
       
       console.log(response.status);
       if(response.status == 'success'){
        window.location.replace("/login");
       }else{
        $('#modalRegister .modal-body').empty();
        $('#modalRegister .modal-body').append('註冊失敗');
       }

    }

  });
}

function check(){
  $('#modalRegister .modal-title').text('確認註冊');
  var data = new Object();
  $('input').each(function(eachid,eachdata){
    data[eachdata.name] = $(eachdata).val();
  });
  $.ajax({
    url:'/user/register/check',
    type:'POST',
    
    data:{data:JSON.stringify(data)},
    
    dataType:'json',
    success:function(response){
       
       $('#modalRegister .modal-body').empty();
       $('#btnRegister').show();
      $.each(response,function(key,value){
        if(value!='success'){
          $('#btnRegister').hide();
          $('#modalRegister .modal-body').append(`${value}</br>`);
        }
        if( $('#modalRegister .modal-body').is(':empty') ) {
          $('#modalRegister .modal-body').append('確定註冊此帳號？');
        }
      });
    }

  });
  $('#modalRegister').modal('show'); 

}

</script>