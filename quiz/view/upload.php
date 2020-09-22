<?php
  include('partial/header.php');
?>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    匯入題目
  </div>
  <div class="card-body py-3">
    <h6 class="m-0 font-weight-bold text-primary"></h6>
    <div class="col-md-12">
      <div class="d-flex justify-content-around">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">選擇書本</label>
          </div><select class="custom-select" id="inputGroupSelect01">
            <option selected>
              Choose...
            </option>
            <option value="1">
              One
            </option>
           
          </select>
        </div>
      </div>
    </div>
     <div class="col-md-12">
      <div class="d-flex justify-content-around">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">選擇章節</label>
          </div><select class="custom-select" id="inputGroupSelect01">
            <option selected>
              Choose...
            </option>
            <option value="1">
              One
            </option>
           
          </select>
        </div>
      </div>
    </div>
     <div class="col-md-12">
      <div class="d-flex justify-content-around">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">選擇單元</label>
          </div><select class="custom-select" id="inputGroupSelect01">
            <option selected>
              Choose...
            </option>
            <option value="1">
              One
            </option>
           
          </select>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="input-group mb-3">

        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
          <label class="custom-control-label" for="customRadioInline1">單一題目</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
          <label class="custom-control-label" for="customRadioInline2">匯入檔案</label>
        </div>
      </div>

    </div>
    <div class="col-md-12">
      <div class="input-group">
        <div class="input-group-prepend">
          <a class="btn btn-primary" type=""  href="/file/example"  >下載範本</a>
        </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="inputGroupFile04">
          <label class="custom-file-label" for="inputGroupFile04">選擇檔案</label>
        </div>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table cellspacing="0" class="table table-bordered" id="dataTable" width="100%">
        <thead>
          <tr>
            <th>題目</th>
            <th>答案</th><!-- <th>職稱</th> -->
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>題目</th>
            <th>答案</th><!-- <th>職稱</th> -->
          </tr>
        </tfoot>
        <tbody></tbody>
      </table>
    </div>
  </div>
</div>

<?php
  include('partial/footer.php');
  
?>



