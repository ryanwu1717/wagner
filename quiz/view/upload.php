<?php
  include('partial/header.php');
?>

<div class="container">
  <div class="card o-hidden shadow-lg">
    <div class="card-header py-3">
      匯入題目
    </div>
    <form id="uploadForm">
      <div class="card-body py-3">
        <h6 class="m-0 font-weight-bold text-primary"></h6>
        <div class="col-md-12">
          <div class="d-flex justify-content-around">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">選擇書本</label>
              </div><select class="custom-select" id="selectBook" required>
                <option selected disabled value="">請選擇書本</option>
               
              </select>
            </div>
          </div>
        </div>
         <div class="col-md-12">
          <div class="d-flex justify-content-around">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">選擇章節</label>
              </div>
              <select class="custom-select" id="selectChapter" required>
                <option selected disabled value="">請選擇章節</option>
               
              </select>
            </div>
          </div>
        </div>
         <div class="col-md-12">
          <div class="d-flex justify-content-around">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">選擇單元</label>
              </div><select class="custom-select" id="selectUnit" required>
                <option selected disabled value="">請選擇單元</option>
               
              </select>
            </div>
          </div>
        </div>
       
        <div class="col-md-12">
          <div class="d-flex justify-content-around">
            <div class="input-group mb-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <a class="btn btn-primary" type=""  href="/file/example"  >下載範本</a>
                </div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="inputFile">
                  <label class="custom-file-label" for="inputGroupFile04" >選擇檔案</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            新增題目
          </button>
          <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal" data-type="addchoose" data-target="#basicModal">新增選擇題</button>
            <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal" data-type="addfill" data-target="#basicModal">新增填充題</button>
            <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal" data-type="addask" data-target="#basicModal">新增問答題</button>
          </div>

          <div  class="float-right">
            <button type="button" class="btn btn-primary"  name="nextBtn1" style="display:">下一頁</button>
            <button type="button" class="btn btn-primary"  name="nextBtn2" style="display:none">下一頁</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-type="upload" data-target="#basicModal" name="btnUpload" style="display:none">上傳</button>
            <button type="submit" class="btn btn-primary" name="submitUpload" style="display:none">上傳</button>
          </div>
        </div>
      </form>
     
        
      <div class="col-md-12">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-select-tab" data-toggle="tab" href="#nav-select" role="tab" aria-controls="nav-select" aria-selected="true">選擇題</a>
            <a class="nav-item nav-link" id="nav-fill-tab" data-toggle="tab" href="#nav-fill" role="tab" aria-controls="nav-fill" aria-selected="false">填空題</a>
            <a class="nav-item nav-link" id="nav-ask-tab" data-toggle="tab" href="#nav-ask" role="tab" aria-controls="nav-ask" aria-selected="false">問答題</a>
          </div>

        </nav>

      </div>

      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-select" role="tabpanel" aria-labelledby="nav-select-tab">
           <table class="table table-bordered" id="chooseTable" >
            <thead>
              <tr>
                <th>題目</th>
                <th>難易度</th>
                <th>試題類型</th>
                <th>答案</th>
                <th>選項</th>
                <th>選項</th>
                <th>選項</th>
                <th>功能</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>題目</th>
                <th>難易度</th>
                <th>試題類型</th>
                <th>答案</th>
                <th>選項</th>
                <th>選項</th>
                <th>選項</th>
                <th>功能</th>
              </tr>
            </tfoot>
            <tbody>
              
            </tbody>
          </table>
        </div>
        <div class="tab-pane fade" id="nav-fill" role="tabpanel" aria-labelledby="nav-fill-tab">
           <table class="table table-bordered" id="fillTable" >
            <thead>
              <tr>
                <th>題目</th>
                <th>難易度</th>
                <th>試題類型</th>
                <th>答案</th>
                <th>功能</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>題目</th>
                <th>難易度</th>
                <th>試題類型</th>
                <th>答案</th>
                <th>功能</th>
              </tr>
            </tfoot>
            <tbody>
            </tbody>
          </table>
        </div>
        <div class="tab-pane fade" id="nav-ask" role="tabpanel" aria-labelledby="nav-ask-tab">
           <table class="table table-bordered" id="askTable" >
            <thead>
              <tr>
                <th>題目</th>
                <th>難易度</th>
                <th>試題類型</th>
                <th>功能</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>題目</th>
                <th>難易度</th>
                <th>試題類型</th>
                <th>功能</th>
              </tr>
            </tfoot>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- Basic Modal-->
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">關閉</button>
      </div>
    </div>
  </div>
</div>
<?php
  include('partial/footer.php');
  
?>
<link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script type='text/javascript'>
var table;
var optionNum = 3;
var optionArr = ['題目','難易度','試題類型','答案','選項','選項','選項'];
// var dataArr = ['question','答案','選項','選項','選項','選項'];https://medium.com/@a663321765/php-%E5%AD%B8%E7%BF%92%E7%AD%86%E8%A8%98-%E5%9F%BA%E6%9C%AC%E7%9A%84%E8%AE%8A%E6%95%B8%E5%9E%8B%E6%85%8B-17979ff7dc34
var placeHold = {'題目':'ex.請問1+1等於多少？',
                '難易度':'ex.難/中/易',
                '試題類型':'ex.一般試題/歷屆試題',
                '答案':'ex.A(為選項之一)',
                '選項':'ex.1'}
var tmpAllQuestion={'ask':[],'choose':[],'fill':[]};
var chooseTable;
var fillTable;
var askTable;
$('#basicModal').on('show.bs.modal',function(e){
  // $('#exampleModal .modal-footer').html(basicModalFooter);
  var type = $(e.relatedTarget).data('type');
  // console.log(e.relatedTarget);
  if(type=='delete'){
    deleteQuestion(e.relatedTarget);
    // deleteUser( $(e.relatedTarget).data('id'));
  }else if(type=='modify'){
    modifyQuestion(e.relatedTarget);
    // checkUser( $(e.relatedTarget).data('id'));
  }else if(type=='addchoose'){
    addQuestion(e.relatedTarget);
    // checkUser( $(e.relatedTarget).data('id'));
  }else if(type=='addfill'){
    addfillQuestion(e.relatedTarget);
    // checkUser( $(e.relatedTarget).data('id'));
  }else if(type=='addask'){
    addaskQuestion(e.relatedTarget);
    // checkUser( $(e.relatedTarget).data('id'));
  }else if(type=='upload'){
     $("#basicModal .modal-dialog ").attr("class","modal-dialog modal-lg");

    uploadModal(e.relatedTarget);
    // checkUser( $(e.relatedTarget).data('id'));
  }


});
$(function() {
  getBook();
  reTable('choose');
  reTable('fill');
  reTable('ask');
  $("#inputFile").unbind().on('change',function(e){
   var file_data = $(this).prop('files')[0];
    var form_data = new FormData();
    form_data.append('inputFile', file_data);
    $.ajax({
      url: '/file/question',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,//data只能指定單一物件 
      type: 'post',
      success: function(response){
        // console.log(response.question.highestChoose);
        tmpAllQuestion = response.question;
        chooseTable.destroy();
        fillTable.destroy();
        askTable.destroy();
        clearTable('fill');
        clearTable('ask');
        
        if(response.question.highestChoose > optionNum){
          optionNum = response.question.highestChoose;
          optionArr = ['題目','難易度','試題類型','答案'];
          for (i = 0; i < optionNum; i++){
            optionArr.push('選項');
          }
          console.log(optionArr);
        }
        clearTable('choose');

        $.each(response.question.choose,function(key,value){
          addSelectTable(value,optionNum);
        });
        $.each(response.question.fill,function(key,value){
          addFillTable(value);
        });
         $.each(response.question.ask,function(key,value){
          addAskTable(value);
        });
        reTable('choose');
        reTable('fill');
        reTable('ask');

      }
    });
     
  });

  $('#uploadForm').unbind().on('submit',function(){
    event.preventDefault();
    $('[name=btnUpload]').click();
    console.log('in');
  });

  clickPage();

});

function clickPage(){
  $('[name = nextBtn1]').on('click',function(){
    $('[name = nextBtn1]').hide();
    $('[name = nextBtn2]').show();
    $('[name = submitUpload]').hide();
    $('#nav-fill-tab').click();
    // btnUpload
  });
  $('[name = nextBtn2]').on('click',function(){
    $('[name = nextBtn1]').hide();
    $('[name = nextBtn2]').hide();
    $('[name = submitUpload]').show();
    $('#nav-ask-tab').click();

    // btnUpload
  });

  $('#nav-ask-tab').on('click',function(){
    $('[name = nextBtn1]').hide();
    $('[name = nextBtn2]').hide();
    $('[name = submitUpload]').show();
  });
  $('#nav-fill-tab').on('click',function(){
    $('[name = nextBtn1]').hide();
    $('[name = nextBtn2]').show();
    $('[name = submitUpload]').hide();
  });
  $('#nav-select-tab').on('click',function(){
    $('[name = nextBtn1]').show();
    $('[name = nextBtn2]').hide();
    $('[name = submitUpload]').hide();
  });
}

function clearTable(clearType){
  if(clearType == 'choose'){
    $('#chooseTable thead tr').html(`
      <th>題目</th>
      <th>難易度</th>
      <th>試題類型</th>
      <th>答案</th>`);
    $('#chooseTable tfoot tr').html(`
      <th>題目</th>
      <th>難易度</th>
      <th>試題類型</th>
      <th>答案</th>`);
    for (i = 0; i < optionNum; i++){
      $('#chooseTable thead tr').append(`<th>選項</th>`);
      $('#chooseTable tfoot tr').append(`<th>選項</th>`);
    }
    $('#chooseTable thead tr').append(`<th>功能</th>`);
    $('#chooseTable tfoot tr').append(`<th>功能</th>`);
    $('#chooseTable tbody ').html(``);
  }else if(clearType == 'fill'){
     $('#fillTable thead tr').html(`
      <th>題目</th>
      <th>難易度</th>
      <th>試題類型</th>
      <th>答案</th>
      <th>功能</th>`);
    $('#fillTable tfoot tr').html(`
      <th>題目</th>
      <th>難易度</th>
      <th>試題類型</th>
      <th>答案</th>
      <th>功能</th>`);
    $('#fillTable tbody ').html(``);
  }else if(clearType == 'ask'){
     $('#askTable thead tr').html(`
      <th>題目</th>
      <th>難易度</th>
      <th>試題類型</th>
      <th>功能</th>`);
    $('#askTable tfoot tr').html(`
      <th>題目</th>
      <th>難易度</th>
      <th>試題類型</th>
      <th>功能</th>`);
    $('#askTable tbody ').html(``);
  }
   


}

function reTable(reType){
  // return false
  if(reType == 'choose'){
    chooseTable = $('#chooseTable').DataTable({  
      "language": {
        "emptyTable": "無資料...",
        "processing": "處理中...",
        "loadingRecords": "載入中...",
        "lengthMenu": "顯示 _MENU_ 項結果",
        "zeroRecords": "沒有符合的結果",
        "info": "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
        "infoEmpty": "顯示第 0 至 0 項結果，共 0 項",
        "infoFiltered": "(從 _MAX_ 項結果中過濾)",
        "infoPostFix": "",
        "search": "搜尋:",
        "paginate": {
          "first": "第一頁",
          "previous": "上一頁",
          "next": "下一頁",
          "last": "最後一頁"
        },
        "aria": {
          "sortAscending": ": 升冪排列",
          "sortDescending": ": 降冪排列"
        }
      }
    });
  }else if(reType == 'fill'){
    fillTable = $('#fillTable').DataTable({  
      "language": {
        "emptyTable": "無資料...",
        "processing": "處理中...",
        "loadingRecords": "載入中...",
        "lengthMenu": "顯示 _MENU_ 項結果",
        "zeroRecords": "沒有符合的結果",
        "info": "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
        "infoEmpty": "顯示第 0 至 0 項結果，共 0 項",
        "infoFiltered": "(從 _MAX_ 項結果中過濾)",
        "infoPostFix": "",
        "search": "搜尋:",
        "paginate": {
          "first": "第一頁",
          "previous": "上一頁",
          "next": "下一頁",
          "last": "最後一頁"
        },
        "aria": {
          "sortAscending": ": 升冪排列",
          "sortDescending": ": 降冪排列"
        }
      }
    });
  }else if(reType == 'ask'){
    askTable = $('#askTable').DataTable({  
    "language": {
      "emptyTable": "無資料...",
      "processing": "處理中...",
      "loadingRecords": "載入中...",
      "lengthMenu": "顯示 _MENU_ 項結果",
      "zeroRecords": "沒有符合的結果",
      "info": "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
      "infoEmpty": "顯示第 0 至 0 項結果，共 0 項",
      "infoFiltered": "(從 _MAX_ 項結果中過濾)",
      "infoPostFix": "",
      "search": "搜尋:",
      "paginate": {
        "first": "第一頁",
        "previous": "上一頁",
        "next": "下一頁",
        "last": "最後一頁"
      },
      "aria": {
        "sortAscending": ": 升冪排列",
        "sortDescending": ": 降冪排列"
      }
    }
  });
  }
    
    
  
}

function uploadModal(){
  getTmpQuestion();

 

  // console.log()
  $('#basicModal .modal-title').html('確認上傳題目?');
  $('#basicModal .modal-body').html(`<div class="row">
  <div class="col-2">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="pillChooseTab" data-toggle="pill" href="#pillChoose" role="tab" aria-controls="pillChoose" aria-selected="true">選擇題</a>
      <a class="nav-link" id="pillFillTab" data-toggle="pill" href="#pillFill" role="tab" aria-controls="pillFill" aria-selected="false">填充題</a>
      <a class="nav-link" id="pillAskTab" data-toggle="pill" href="#pillAsk" role="tab" aria-controls="pillAsk" aria-selected="false">問答題</a>
    </div>
  </div>
  <div class="col-10">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="pillChoose" role="tabpanel" aria-labelledby="pillChooseTab">
        <div class="card" id="">
          
          <div class="card-body overflow-auto" style=" max-height: 500px;">
          </div>
          
        </div>
      </div>
      <div class="tab-pane fade" id="pillFill" role="tabpanel" aria-labelledby="pillFillTab">
        <div class="card" id="">
          
          <div class="card-body overflow-auto" style=" max-height: 500px;">
          </div>
          
        </div>
      </div>
      <div class="tab-pane fade" id="pillAsk" role="tabpanel" aria-labelledby="pillAskTab">
        <div class="card" id="">
          
          <div class="card-body overflow-auto" style=" max-height: 500px;">
          </div>
          
        </div>
      </div>
      
    </div>
  </div>
</div>`);
  $('#basicModal .modal-footer').html('<button class="btn btn-secondary" type="button" data-dismiss="modal">關閉</button><button type="button" class="btn btn-primary" id="btnSureUpload" >確定上傳</button>');
  $( '#chooseTable').clone().appendTo( "#pillChoose .card-body" );
  $("#pillChoose .card-body").find("tr").each(function() {
      $(this).find(`td:eq(${optionNum+4})`).remove();
      // console.log($(this).find(`th:eq(2)`));
      $(this).find(`th:eq(${optionNum+4})`).remove();

  });
  $( '#fillTable').clone().appendTo( "#pillFill .card-body" );
  $("#pillFill .card-body").find("tr").each(function() {
      $(this).find(`td:eq(4)`).remove();
      $(this).find(`th:eq(4)`).remove();

  });
  $( '#askTable').clone().appendTo( "#pillAsk .card-body" );
  $("#pillAsk .card-body").find("tr").each(function() {
      $(this).find(`td:eq(3)`).remove();
      $(this).find(`th:eq(3)`).remove();

  });

  var chooseCheckArr = [];
  var fillCheckArr = [];
  var askCheckArr = [];
  var chooseTypeArr = [];
  var fillTypeArr = [];
  var askTypeArr = [];
  $.each(tmpAllQuestion.choose,function(key,value){
    chooseCheckArr.push(value.degree);
    chooseTypeArr.push(value.type);
  });
  $.each(tmpAllQuestion.fill,function(key,value){
    fillCheckArr.push(value.degree);
    fillTypeArr.push(value.type);

  });
  $.each(tmpAllQuestion.ask,function(key,value){
    askCheckArr.push(value.degree);
    askTypeArr.push(value.type);

  });
  $.ajax({
    url:'/question/check',
    type:'POST',
    data:{data:JSON.stringify({
        choose : chooseCheckArr,
        fill : fillCheckArr,
        ask : askCheckArr,
        chooseType : chooseTypeArr,
        fillType : fillTypeArr,
        askType : askTypeArr,


      }
      )},
    dataType:'json',
    success:function(response){
       
      console.log(response);
      if(response.degree.status == 'failed'){
        $('#btnSureUpload').hide();
        $('#basicModal .modal-body').prepend('<h5>'+response.degree.message+'</h5>');

        $(`#pill${response.degree.type}`).find(`tbody`).each(function( index ) {
          console.log($( this ).find(`tr:eq( ${response.degree.num})`));
          $( this ).find(`tr:eq( ${response.degree.num})`).find('td[data-type="degree"]').attr("class", "tr alert alert-danger");
        });
        $(`#pill${response.degree.type}Tab`).click();

        // $(`#pill${response.degree.type} .card-body`).find(`tr:eq(${response.degree.num})`);
      }
      if(response.type.status == 'failed'){
        $('#btnSureUpload').hide();
        $('#basicModal .modal-body').prepend('<h5>'+response.type.message+'</h5>');
        $(`#pill${response.type.type}`).find(`tbody`).each(function( index ) {
          console.log($( this ).find(`tr:eq( ${response.type.num})`));
          $( this ).find(`tr:eq( ${response.type.num})`).find('td[data-type="type"]').attr("class", "tr alert alert-danger");
        });
        $(`#pill${response.type.type}Tab`).click();



      }

    }

  });
    console.log(chooseCheckArr);

  // $('#pillChoose').find(`td[data-type='degree']`).each(function( index ) {
  //   // console.log('in');
  //   console.log( $(this));
  // });
  var tmpUnit = $('#selectUnit').val();
  $('#btnSureUpload').unbind().on('click',function(){
    // console.log(tmpAllQuestion);

    var uploadSuccess = true;
    $.ajax({
      url: '/question/choose',
      type: 'POST',
      data: {data:JSON.stringify({
              unit : tmpUnit,
              choose : tmpAllQuestion['choose'],
              optionNum : optionNum,
              fill : tmpAllQuestion['fill'],
              ask : tmpAllQuestion['ask']
      })},
      dataType: 'json',
      success: function(response) {
        console.log(response);

        if(response.ask.status == 'success' && response.fill.status == 'success' && response.choose.status == 'success' ){
          location.reload(true);
        }
        // if(response.status != 'success'){
        //   uploadSuccess = false;
        // }
        // if(response.degree.status == "failed"){
        //   $('#btnSureUpload').hide();
        // }
        // if(response.type.status == "failed"){
        //   $('#btnSureUpload').hide();
        // }
      }
    });
    // $.ajax({
    //   url: '/question/fill',
    //   type: 'POST',
    //   data: {data:JSON.stringify({
    //           unit : tmpUnit,
    //           question : tmpAllQuestion['fill']
    //   })},
    //   dataType: 'json',
    //   success: function(response) {
    //    if(response.status != 'success'){
    //       uploadSuccess = false;
    //     }
      
    //   }
    // });
    // $.ajax({
    //   url: '/question/ask',
    //   type: 'POST',
    //   data: {data:JSON.stringify({
    //           unit : tmpUnit,
    //           question : tmpAllQuestion['ask']
    //   })},
    //   dataType: 'json',
    //   success: function(response) {
    //     if(response.status != 'success'){
    //       uploadSuccess = false;
    //     }
      
    //   }
    // });
  });

}

function getTmpQuestion(){
   tmpAllQuestion={'ask':[],'choose':[],'fill':[]};
  $('#chooseTable').find('tbody').find('tr').each(function() {
     var tmpArr = {};
     $(this).find('td').each(function() {
      // console.log(typeof($(this).data('type')]));

      if(!($(this).data('type') == undefined)){
        tmpArr[$(this).data('type')] = $(this).text();
      }
     });
     // console.log(tmpArr);
     tmpAllQuestion['choose'].push(tmpArr);
  });
  $('#fillTable').find('tbody').find('tr').each(function() {
     var tmpArr = {};
     $(this).find('td').each(function() {
      if(!($(this).data('type')== undefined)){
        tmpArr[$(this).data('type')] = $(this).text();
      }
     });
     // console.log(tmpArr);
     tmpAllQuestion['fill'].push(tmpArr);
  });
  $('#askTable').find('tbody').find('tr').each(function() {
     var tmpArr = {};
     $(this).find('td').each(function() {
      if(!($(this).data('type') == undefined)){
        tmpArr[$(this).data('type')] = $(this).text();
      }
     });
     // console.log(tmpArr);
     tmpAllQuestion['ask'].push(tmpArr);
  });
  console.log(tmpAllQuestion);
}



function addAskTable(questionjson){
   askQuestion = `<tr><td data-type="question">${questionjson.question}</td><td data-type="degree">${questionjson.degree}</td><td data-type="type">${questionjson.type}</td><td>
      <div class="btn-group" role="group" >
        
        <button type="button" class="btn btn-success"data-toggle="modal" data-type="modify" data-target="#basicModal"><i class="fas fa-edit" name="updateButton" ></i></button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-type="delete" data-target="#basicModal"><i class="far fa-trash-alt"></i></button>  
      </div>
    </td></tr>`;
  $('#askTable tbody').append(askQuestion);
}
function addFillTable(questionjson){
  console.log(questionjson);
  fillQuestion = `<tr><td data-type="question">${questionjson.question}</td><td data-type="degree">${questionjson.degree}</td><td data-type="type">${questionjson.type}</td><td data-type="answer">${questionjson.answer}</td><td>
      <div class="btn-group" role="group" >
        
        <button type="button" class="btn btn-success"data-toggle="modal" data-type="modify" data-target="#basicModal"><i class="fas fa-edit" name="updateButton" ></i></button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-type="delete" data-target="#basicModal"><i class="far fa-trash-alt"></i></button>  
      </div>
    </td></tr>`;
  $('#fillTable tbody').append(fillQuestion);


}
function addSelectTable(questionjson,tmpOptionNum){
    console.log(questionjson);

  // var tmpOptionArr = 
  var chooseQuestion = '';
  chooseQuestion = `<tr><td data-type="question">${questionjson.question}</td><td data-type="degree">${questionjson.degree}</td><td data-type="type">${questionjson.type}</td><td data-type="answer">${questionjson.answer}</td>`;
  // $('#chooseTable tbody').append(`<tr>
  for (i = 1; i <= tmpOptionNum; i++){
    chooseQuestion = chooseQuestion+`${questionjson[i] == null?'<td></td>':`<td data-type="${i}">`+questionjson[i]+'</td>'}`
  }
  chooseQuestion = chooseQuestion+`<td>
      <div class="btn-group" role="group" >
        
        <button type="button" class="btn btn-success"data-toggle="modal" data-type="modify" data-target="#basicModal"><i class="fas fa-edit" name="updateButton" ></i></button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-type="delete" data-target="#basicModal"><i class="far fa-trash-alt"></i></button>  
      </div>
    </td></tr>`
  $('#chooseTable tbody').append(chooseQuestion);
}



function addQuestion(){
  // console.log(placeHold);
  var countRequire=0;
  $('#basicModal .modal-title').html('新增題目');

  $('#basicModal .modal-body').html(`<form id="addQuestionFrom"></form>`);
  console.log();
  $.each(optionArr, function( index, value ) {
    console.log(value);
    $('#addQuestionFrom').append(`

      <div class="form-group row"  name="addDiv">

        
        <label  class="col-sm-3 col-form-label" >${value}</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" value = ""   placeHolder="${placeHold[value]}" required>
        </div>
        <div class="col-sm-1 ">
          ${value == '選項'?'<button type="button" class="btn  btn-xs pull-right"  name="deleteOptionBtn"><i class="fas fa-trash"></i></button>':''}
          
        </div>
      </div>`);
    countRequire+=1;
  });  
  $('#addQuestionFrom').append(`<button type="button" class="btn btn-primary" id="btnAddOption">新增選項</button>
    <button type="submit" class="btn btn-primary" id="hideAddSure" >確定</button>`);
  $('#basicModal .modal-footer').html('<button class="btn btn-secondary" type="button" data-dismiss="modal">關閉</button><button type="button" class="btn btn-primary" id="btnAddSure" >確定</button>');
  $('#hideAddSure').hide();
  
  $('[name = deleteOptionBtn]').unbind().on('click',function(){
    // console.log( $(this).closest("[name=addDiv]"));
     $(this).closest("[name=addDiv]").remove();
    // $(this).closest("form-group row").css("background", "yellow");

  });
  $('#btnAddOption').unbind().on('click',function(){
    
    $( `<div class="form-group row" name="addDiv">
       
        <label  class="col-sm-2 col-form-label">選項</label>
        <div class="col-sm-8">
          <input type="text" class="form-control"  value = "" placeHolder="${placeHold['選項']} " required>
        </div>
        <div class="col-sm-1 ">
          <button type="button" class="btn  btn-xs pull-right"  name="deleteOptionBtn"><i class="fas fa-trash"></i></button>
        </div>
      </div>`).insertBefore( "#btnAddOption" );
    $('[name = deleteOptionBtn]').unbind().on('click',function(){
      // console.log( $(this).closest("[name=addDiv]"));
       $(this).closest("[name=addDiv]").remove();
      // $(this).closest("form-group row").css("background", "yellow");

    });
    
  });
  
  $('#btnAddSure').unbind().on('click',function(){
    
    $('#hideAddSure').click();
    
  
     
  });
  var countAddVal;
  var tmpAdd;
  var tmpStr;
  $( "#addQuestionFrom" ).unbind().on( "submit", function( event ) {
    event.preventDefault();
    chooseTable.destroy();
    $('#nav-choose-tab').click();
    $('#basicModal').modal('hide');
    tmpAdd = {};
    countAddVal = 0;
    $( "[name=addDiv]" ).each(function(  ) {
      if($(this).find('input').val()){
        countAddVal+=1;
        if(countAddVal == 1){
          tmpStr = 'question';
        }else if(countAddVal == 2){
          tmpStr = 'degree';
        }else if(countAddVal == 3){
          tmpStr = 'type';
        }else if(countAddVal == 4){
          tmpStr = 'answer';
        }else{
          tmpStr = countAddVal-4;
        }
        tmpAdd[tmpStr] = $(this).find('input').val();
      }
    });
    console.log(tmpAdd);
    if(countAddVal-4 <= optionNum){
      // console.log('small');
      for(var i=(countAddVal-3);i<=(optionNum);i++){
        tmpAdd[i] = null;
      }
      tmpAllQuestion['choose'].push(
       tmpAdd
      );
      addSelectTable(tmpAdd,optionNum);
      reTable('choose');
    }else{
      // console.log('big')
      chooseTable.destroy();
      optionNum=countAddVal-4;
      clearTable('choose');
      tmpAllQuestion['choose'].push(tmpAdd);
      $.each(tmpAllQuestion.choose,function(key,value){
        addSelectTable(value,optionNum);

      });
      reTable('choose');


    }

  });

  
}



function addfillQuestion(){
  $('#basicModal .modal-title').html('新增題目');
  $('#basicModal .modal-body').html(`<form id="addQuestionFrom">
      <div class="form-group row"  name="addDiv">
        <label  class="col-sm-3 col-form-label" >題目</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" value = ""   placeHolder="ex.今年是＿＿？" required>
        </div>
      </div>
      <div class="form-group row"  name="addDiv">
        <label  class="col-sm-3 col-form-label" >難易度</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" value = ""   placeHolder="${placeHold['難易度']}" required>
        </div>
      </div>
      <div class="form-group row"  name="addDiv">
        <label  class="col-sm-3 col-form-label" >試題類型</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" value = ""   placeHolder="${placeHold['試題類型']}" required>
        </div>
      </div>
      <div class="form-group row"  name="addDiv">
        <label  class="col-sm-3 col-form-label" >答案</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" value = ""   placeHolder="ex.2020" required>
        </div>
        
      </div>
    </form>`);
  $('#addQuestionFrom').append(`
    <button type="submit" class="btn btn-primary" id="hideAddSure" >確定</button>`);
  $('#basicModal .modal-footer').html('<button class="btn btn-secondary" type="button" data-dismiss="modal">關閉</button><button type="button" class="btn btn-primary" id="btnAddSure" >確定</button>');
  $('#hideAddSure').hide();
  
  $('#btnAddSure').unbind().on('click',function(){
    $('#hideAddSure').click();
  });

  var tmpAdd;
  $('#addQuestionFrom').unbind().on('submit',function(){
    $('#nav-fill-tab').click();
    $('#basicModal').modal('hide');
    fillTable.destroy();
    var countAddVal=0;
    tmpAdd = {};
    $( "[name=addDiv]" ).each(function(  ) {
      if($(this).find('input').val()){
        countAddVal+=1;
        if(countAddVal == 1){
          tmpStr = 'question';
        }else if(countAddVal == 2){
          tmpStr = 'degree';
        }else if(countAddVal == 3){
          tmpStr = 'type';
        }else if(countAddVal == 4){
          tmpStr = 'answer';
        }
        tmpAdd[tmpStr] = $(this).find('input').val();
      }
    });
    event.preventDefault();
    // console.log(tmpAdd);
    tmpAllQuestion['fill'].push(tmpAdd);
    addFillTable(tmpAdd,optionNum);
    reTable('fill');

  });

}

function addaskQuestion(){
  $('#basicModal .modal-title').html('新增題目');
  $('#basicModal .modal-body').html(`<form id="addQuestionFrom">
      <div class="form-group row"  name="addDiv">
        <label  class="col-sm-3 col-form-label" >題目</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" value = ""   placeHolder="ex.間單介紹卡爾曼濾波？" required>
        </div>
      </div>
      <div class="form-group row"  name="addDiv">
        <label  class="col-sm-3 col-form-label" >難易度</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" value = ""   placeHolder="${placeHold['難易度']}" required>
        </div>
      </div>
      <div class="form-group row"  name="addDiv">
        <label  class="col-sm-3 col-form-label" >試題類型</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" value = ""   placeHolder="${placeHold['試題類型']}" required>
        </div>
      </div>
    </form>`);
  $('#addQuestionFrom').append(`
    <button type="submit" class="btn btn-primary" id="hideAddSure" >確定</button>`);
  $('#basicModal .modal-footer').html('<button class="btn btn-secondary" type="button" data-dismiss="modal">關閉</button><button type="button" class="btn btn-primary" id="btnAddSure" >確定</button>');
  $('#hideAddSure').hide();
  
  var tmpAdd;

  $('#btnAddSure').unbind().on('click',function(){
   
    $('#hideAddSure').click();
    
    
  });
  $('#addQuestionFrom').unbind().on('submit',function(){
    askTable.destroy();
    $('#nav-ask-tab').click();
    $('#basicModal').modal('hide');
    var countAddVal=0;
    tmpAdd = {};
    $( "[name=addDiv]" ).each(function(  ) {
      if($(this).find('input').val()){
        countAddVal+=1;
        if(countAddVal == 1){
          tmpStr = 'question';
        }else if(countAddVal == 2){
          tmpStr = 'degree';
        }else if(countAddVal == 3){
          tmpStr = 'type';
        }
        tmpAdd[tmpStr] = $(this).find('input').val();
      }

    });
    event.preventDefault();
    console.log(tmpAdd);
    tmpAllQuestion['ask'].push(tmpAdd);
    addAskTable(tmpAdd,optionNum);
    reTable('ask');
    
  });
}



function modifyQuestion(modifyTarget){
  $('#basicModal .modal-title').html('修改題目');

  $('#basicModal .modal-body').html(``);
  $('#basicModal .modal-footer').html(`
    <button class="btn btn-secondary" type="button" data-dismiss="modal">關閉</button>
    <button type="button" class="btn btn-primary" id="modifyBtn">確定</button>`);
  modifyTarget = $(modifyTarget).closest('tr');
  // optionNum = $(modifyTarget).find('td').length-3;
  var optionCount = 0;
  $(modifyTarget).find('td').each(function(){
    $('#basicModal .modal-body').append(`
      <div class="form-group row">
        <label  class="col-sm-2 col-form-label">${optionArr[optionCount]}</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="modifyInput" value = "${$(this).text()}">
        </div>
      </div>`);

    optionCount+=1;
    if(optionCount == $(modifyTarget).find('td').length-1){
      return false;
      console.log(this);

    }
  });

  var modifyArr=[]

  $('#modifyBtn').unbind().on('click',function(){
    optionCount = 0;
    $("[name=modifyInput]").each(function(){
      modifyArr.push($(this).val());

    });

    $(modifyTarget).find('td').each(function(){
      $(this).text(modifyArr[optionCount]);
      optionCount+=1;
      if(optionCount == $(modifyTarget).find('td').length-1){
        return false;
      }
    });
    $('#basicModal').modal('hide');
  });
}

function deleteQuestion(deleteTarget){
  $('#basicModal .modal-title').html('刪除題目');

  $('#basicModal .modal-body').html(`確認刪除此項目?`);
  $('#basicModal .modal-footer').html(`
    <button class="btn btn-secondary" type="button" data-dismiss="modal">關閉</button>
    <button type="button" class="btn btn-primary" id="deleteBtn">確定</button>`);

  $('#deleteBtn').unbind().on('click',function(){
    console.log($(deleteTarget).closest('tr'));
    $(deleteTarget).closest('tr').remove();
    $('#basicModal').modal('hide');
  });
}


function getUnit(chapterID){
  $.ajax({
    url: `/test/unit/${chapterID}`,
    type: 'GET',
    data: {
     
    },
    dataType: 'json',
    success: function(response) {
         console.log(response);
      $('#selectUnit').html(' <option selected disabled value="">請選擇單元</option>');
      $(response).each(function() {
        $('#selectUnit').append(`
             <option value="${this.id}">
              ${this.num +' '+this.name}
            </option>`);
      })
     
    }
  });
}
function getChap(bookID){
  $.ajax({
    url: `/test/chapter/${bookID}`,
    type: 'GET',
    data: {
     
    },
    dataType: 'json',
    success: function(response) {
      $('#selectChapter').html(' <option selected disabled value="">請選擇章節</option>');
      $(response.chapter).each(function() {
        $('#selectChapter').append(`
             <option value="${this.id}">
              ${this.num +' '+this.name}
            </option>`);
      })
      $('#selectChapter').unbind().on('change',function(){
        console.log(this.value);
        getUnit(this.value);
      });

    }
  });
}
function getBook(){
  $.ajax({
    url: '/test/book',
    type: 'GET',
    data: {
     
    },
    dataType: 'json',
    success: function(response) {
      
      $('#selectBook').html(' <option selected disabled value="">請選擇書本</option>');
      $(response).each(function() {
         $('#selectBook').append(`
            <option value="${this.id}">
              ${this.name}
            </option>`);
      });

      $('#selectBook').unbind().on('change',function(){
        console.log(this.value);
        getChap(this.value);
      });
    }
  });
}
</script>



