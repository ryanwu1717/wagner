<?php
  include('partial/header.php');
?>
<div class="container">
  <div class="card h-100 shadow"  style="height:65vh">
    <div class="card-header" style="text-align: center">
      <h2>請選擇操作項目</h2>
    </div>
    <div class="card-body h-100">
      <div class="d-flex justify-content-around">
        <button type="button"  onclick="location.href='handMade'" id='btnHandMade' class="btn btn-primary btn-lg btn-block m-3" >
          手動命題
        </button>
        <button type="button" onclick="location.href='autoMade'" class="btn btn-primary btn-lg btn-block m-3" >
          自動命題
        </button>
      </div>
      <div class="d-flex justify-content-around">
        <button type="button" onclick="location.href='testPaperManage'" class="btn btn-primary btn-lg btn-block m-3" >
          試卷管理
        </button>
        <button type="button" class="btn btn-primary btn-lg btn-block m-3" >
          使用說明
        </button>
      </div>
    </div>
  </div>
</div> 
<?php
  include('partial/footer.php');
?>

<!-- <script type='text/javascript'>
$(function(){
  $.ajax({
    url:'/user/function',
    type:'get',
    data:{data:JSON.stringify({
       
    })},
    success:function(response){
      $('#navbarFunction').empty();
      $('#navbarFunction').append('功能');
      $(response).each(function(){
        console.log(this.name);
        $('#navbarFunction').append(`
          <li class="nav-item active">
            <a class="nav-link" href="index.html">
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
</script> -->