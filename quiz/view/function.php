<?php
  include('partial/header.php');
?>
<div class="container">
  <div class="card h-100"  style="height:65vh">
    <div class="card-head" style="text-align: center">
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
<script type='text/javascript'>
  
</script>