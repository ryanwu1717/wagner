<?php
  include('partial/header.php');
?>
<div class="card shadow mb-4">
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
      <!-- <div class="col-md-12">
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

      </div> -->
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
          <button type="button" class="btn btn-primary" data-toggle="modal" data-type="upload" data-target="#basicModal">上傳</button>
          <button type="submit" class="btn btn-primary" >上傳</button>
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
              <th>答案</th>
              <th>選項</th>
              <th>選項</th>
              <th>選項</th>
              <th>選項</th>
              <th>功能</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>題目</th>
              <th>答案</th>
              <th>選項</th>
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
              <th>答案</th>
              <th>功能</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>題目</th>
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
              <th>功能</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>題目</th>
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
var optionNum = 4;
var optionArr = ['題目','答案','選項','選項','選項','選項'];
// var dataArr = ['question','答案','選項','選項','選項','選項'];
var placeHold = {'題目':'ex.f請問1+1等於多少？',
                '答案':'ex.A',
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
          optionArr = ['題目','答案'];
          for (i = 0; i < optionNum; i++){
            optionArr.push('選項');
          }
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
    console.log('in');
  });

});

function clearTable(clearType){
  if(clearType == 'choose'){
    $('#chooseTable thead tr').html(`
      <th>題目</th>
      <th>答案</th>`);
    $('#chooseTable tfoot tr').html(`
      <th>題目</th>
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
      <th>答案</th>
      <th>功能</th>`);
    $('#fillTable tfoot tr').html(`
      <th>題目</th>
      <th>答案</th>
      <th>功能</th>`);
    $('#fillTable tbody ').html(``);
  }else if(clearType == 'ask'){
     $('#askTable thead tr').html(`
      <th>題目</th>
      <th>功能</th>`);
    $('#askTable tfoot tr').html(`
      <th>題目</th>
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


function addAskTable(questionjson){
   askQuestion = `<tr><td>${questionjson.question}</td><td>
      <div class="btn-group" role="group" >
        
        <button type="button" class="btn btn-success"data-toggle="modal" data-type="modify" data-target="#basicModal"><i class="fas fa-edit" name="updateButton" ></i></button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-type="delete" data-target="#basicModal"><i class="far fa-trash-alt"></i></button>  
      </div>
    </td></tr>`;
  $('#askTable tbody').append(askQuestion);
}
function addFillTable(questionjson){
  fillQuestion = `<tr><td>${questionjson.question}</td><td>${questionjson.answer}</td><td>
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
  chooseQuestion = `<tr><td>${questionjson.question}</td><td>${questionjson.answer}</td>`;
  // $('#chooseTable tbody').append(`<tr>
  for (i = 1; i <= tmpOptionNum; i++){
    chooseQuestion = chooseQuestion+`${questionjson[i] == null?'<td></td>':'<td>'+questionjson[i]+'</td>'}`
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

        
        <label  class="col-sm-2 col-form-label" >${value}</label>
        <div class="col-sm-8">
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
  var countAddVal;
  var tmpAdd;
  var tmpStr;
  $('#btnAddSure').unbind().on('click',function(){
    tmpAdd = {};
    countAddVal = 0;
    $( "[name=addDiv]" ).each(function(  ) {
      if($(this).find('input').val()){
        countAddVal+=1;
        if(countAddVal == 1){
          tmpStr = 'question';
        }else if(countAddVal == 2){
          tmpStr = 'answer';
        }else{
          tmpStr = countAddVal-2;
        }
        tmpAdd[tmpStr] = $(this).find('input').val();
        // var tmpAddTitle = $(this).find('label').text();
        // var tmpAddValue =  $(this).find('input').val();
        // console.log(tmpAddTitle,tmpAddValue);
        // tmpAdd.push({
        //   tmpAddTitle : tmpAddValue 
        // });
      }


    });
    $('#hideAddSure').click();
    $('#nav-choose-tab').click();
    $('#basicModal').modal('hide');
  
     
  });
   $( "#addQuestionFrom" ).unbind().on( "submit", function( event ) {
    event.preventDefault();
    // console.log(countAddVal,optionNum);
    // console.log(tmpAdd);
    // console.log(tmpAllQuestion);

    if(countAddVal-2 <= optionNum){
      // console.log('small');
      for(var i=(countAddVal-1);i<=(optionNum);i++){
        tmpAdd[i] = null;
      }
      tmpAllQuestion['choose'].push(
       tmpAdd
      );
      chooseTable.destroy();
      addSelectTable(tmpAdd,optionNum);
      reTable('choose');
    }else{
      // console.log('big')
      chooseTable.destroy();
      optionNum=countAddVal-2;
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
        <label  class="col-sm-2 col-form-label" >題目</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" value = ""   placeHolder="ex.今年是＿＿？" required>
        </div>
      </div>
      <div class="form-group row"  name="addDiv">
        <label  class="col-sm-2 col-form-label" >答案</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" value = ""   placeHolder="ex.2020" required>
        </div>
        
      </div>
    </form>`);
  $('#addQuestionFrom').append(`
    <button type="submit" class="btn btn-primary" id="hideAddSure" >確定</button>`);
  $('#basicModal .modal-footer').html('<button class="btn btn-secondary" type="button" data-dismiss="modal">關閉</button><button type="button" class="btn btn-primary" id="btnAddSure" >確定</button>');
  $('#hideAddSure').hide();
  
  var tmpAdd;

  $('#btnAddSure').unbind().on('click',function(){
    var countAddVal=0;
    tmpAdd = {};
    $( "[name=addDiv]" ).each(function(  ) {
      if($(this).find('input').val()){
        countAddVal+=1;
        if(countAddVal == 1){
          tmpStr = 'question';
        }else if(countAddVal == 2){
          tmpStr = 'answer';
        }
        tmpAdd[tmpStr] = $(this).find('input').val();
      }
    });
    $('#hideAddSure').click();
    $('#nav-fill-tab').click();
    $('#basicModal').modal('hide');

  });
  $('#addQuestionFrom').unbind().on('submit',function(){
    event.preventDefault();
    console.log(tmpAdd);
    tmpAllQuestion['fill'].push(tmpAdd);
    fillTable.destroy();
    addFillTable(tmpAdd,optionNum);
    reTable('fill');

  });

}

function addaskQuestion(){
  $('#basicModal .modal-title').html('新增題目');
  $('#basicModal .modal-body').html(`<form id="addQuestionFrom">
      <div class="form-group row"  name="addDiv">
        <label  class="col-sm-2 col-form-label" >題目</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" value = ""   placeHolder="ex.間單介紹卡爾曼濾波？" required>
        </div>
      </div>
    </form>`);
  $('#addQuestionFrom').append(`
    <button type="submit" class="btn btn-primary" id="hideAddSure" >確定</button>`);
  $('#basicModal .modal-footer').html('<button class="btn btn-secondary" type="button" data-dismiss="modal">關閉</button><button type="button" class="btn btn-primary" id="btnAddSure" >確定</button>');
  $('#hideAddSure').hide();
  
  var tmpAdd;

  $('#btnAddSure').unbind().on('click',function(){
    var countAddVal=0;
    tmpAdd = {};
    $( "[name=addDiv]" ).each(function(  ) {
      tmpAdd['question'] = $(this).find('input').val();

    });
    $('#hideAddSure').click();
    $('#nav-ask-tab').click();
    $('#basicModal').modal('hide');
    
  });
  $('#addQuestionFrom').unbind().on('submit',function(){
    event.preventDefault();
    console.log(tmpAdd);
    tmpAllQuestion['ask'].push(tmpAdd);
    askTable.destroy();
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



