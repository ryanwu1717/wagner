</div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>etest &copy; wagners 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">登出</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">確定登出？</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">取消</button>
          <a class="btn btn-primary" href="#" id="btnLogout">登出</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

 
</body>

</html>
<script type='text/javascript'>
$('#logoutModal').on('show.bs.modal',function(e){
  // $('#exampleModal .modal-footer').html(basicModalFooter);
  var type = $(e.relatedTarget).data('type');
  console.log(type);
  if(type=='logout'){
    logout();
  }else if(type=='modifyPassword'){
    modifyPassword();
  }

});
function modifyPassword(){
  $('#logoutModal .modal-title').html('修改密碼');
  $('#logoutModal .modal-body').html(`
    <div class="form-group row">
      <label for="inputPassword" class="col-sm-4 col-form-label">原密碼</label>
      <div class="col-sm-8">
        <input type="password" class="form-control" name="inputPasswordOrg">
        <div class="invalid-feedback">
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword" class="col-sm-4 col-form-label">新密碼</label>
      <div class="col-sm-8">
        <input type="password" class="form-control" name="inputPasswordNew">
        <div class="invalid-feedback">
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword" class="col-sm-4 col-form-label">新密碼確認</label>
      <div class="col-sm-8">
        <input type="password" class="form-control" name="inputPasswordNewCheck">
        <div class="invalid-feedback">
        </div>
      </div>
    </div>
    <div class="form-group row" name="modifyPasswordReturn">

    </div>`);
  $('#logoutModal .modal-footer').html(`<button class="btn btn-secondary" type="button" data-dismiss="modal">取消</button>
          <a class="btn btn-primary" href="#" id="btnModifyPassword">確認</a>`);
  
  $(function(){
    $('#btnModifyPassword').unbind().on('click',function(){
      console.log($('[name=inputPasswordOrg]').val());
      var orgPass = $('[name=inputPasswordOrg]').val();
      var newPass = $('[name=inputPasswordNew]').val();
      var checkPass = $('[name=inputPasswordNewCheck]').val();
      $.ajax({
        url:'/user/changePassword',
        type:'post',
        data:{data:JSON.stringify({
          org : orgPass,
          new : newPass,
          check : checkPass
        }),_METHOD:'PATCH'},
        success:function(response){
          console.log(response);
          if(response.status == 'success'){
            $('#logoutModal .modal-body').html(`<p class="text-center">${response.content}</p>`);
            $('#logoutModal .modal-footer').html(`<button class="btn btn-primary" type="button" data-dismiss="modal">關閉</button>`);

          }else{
            $('[name="modifyPasswordReturn"]').html(`<p class="text-center  text-danger">${response.content}</p>`);
          }
          // window.location.href='/login'; 

        }
      });
    });
  });
    
}
function logout(){
  $('#logoutModal .modal-title').html('登出');
  $('#exampleModal .modal-body').html(`確定登出？`);
  $('#exampleModal .modal-footer').append(`<button class="btn btn-secondary" type="button" data-dismiss="modal">取消</button>
          <a class="btn btn-primary" href="#" id="btnLogout">登出</a>`);
  
  $('#btnLogout').unbind().on('click',function(){
    $.ajax({
      url:'/user/logout',
      type:'patch',
      data:{data:JSON.stringify({
        
      }),_METHOD:'PATCH'},
      success:function(response){
        // console.log(response);
        window.location.href='/login'; 
      }
    });
  });
}
$(function(){
    $.ajax({
      url:'/user/name',
      type:'get',
      data:{data:JSON.stringify({
      })},
      success:function(response){
        // $('#showUserName').html(response[0].name);  
          
      }
    });
    $.ajax({
      url:'/user/function',
      type:'get',
      data:{data:JSON.stringify({
         
      })},
      success:function(response){
        $('#navbarFunction').empty();
        $('#navbarFunction').append('功能');
        $(response).each(function(){
          // console.log(this.name);
          $('#navbarFunction').append(`
            <li class="nav-item active">
              <a class="nav-link" href="${this.href}">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>${this.name}</span></a>
            </li>`);

        });
      },
      error:function(jqXHR, textStatus, errorThrown){
        console.log("failed");
      }
    }); 
  });
function goModify(){
  $.ajax({
      url:'/user/id/my',
      type:'get',
      data:{data:JSON.stringify({
         
      })},
      success:function(response){
        console.log(response);
        window.location.href='/register?id='+response+'';
      }

  });
  // window.location.href='/login';
}
</script>
