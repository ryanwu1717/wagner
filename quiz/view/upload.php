<?php
  include('partial/header.php');
?>
<div class="card shadow mb-4">
<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-primary"></h6>
  <div class="col-md-12">
	<div class="d-flex justify-content-around">
  	<button class="btn btn-primary btn-lg btn-block m-3">
    	上傳檔案
  	</button>
  	<button  class="btn btn-primary btn-lg btn-block m-3" >
    	下載範本
  	</button>
		</div>
</div> 
</div>
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>題目</th>
          <th>答案</th>
          <!-- <th>職稱</th> -->
          
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>題目</th>
          <th>答案</th>
          <!-- <th>職稱</th> -->
          
        </tr>
      </tfoot>
      <tbody name="tbody_inputData">
      </tbody>
    </table>
  </div>
</div>

<?php
  include('partial/footer.php');
?>