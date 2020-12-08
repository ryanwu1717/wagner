<?php
  include('partial/header.php');
?>

<div class="container">
  <div class="card o-hidden shadow-lg ">
    <div class="card-body">
      <table class="table table-hover" id="dataTable">
        <thead>
          <tr>
            <th scope="col">試題編號</th>
            <th scope="col">學校名稱</th>
            <th scope="col">科系名稱</th>
            <th scope="col">試題名稱</th>
            <th scope="col">考卷進度</th>
            <th scope="col">功能</th>
          </tr>
        </thead>
        <tbody>
         <!--  <tr>
            <th scope="row">A10010</th>
            <td>第一次期中考</td>
            <td>108年度第一學期</td>
            <td>題目卷</td>
          </tr>
          <tr>
            <th scope="row">A10010</th>
            <td>第一次期中考</td>
            <td>108年度第一學期</td>
            <td>題目卷</td>
          </tr> -->
          
        </tbody>
        <tfoot>
          <tr>
            <th scope="col">試題編號</th>
            <th scope="col">學校名稱</th>
            <th scope="col">科系名稱</th>
            <th scope="col">試題名稱</th>
            <th scope="col">考卷進度</th>
            <th scope="col">功能</th>

          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="secondModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="secondModalLabel">選擇考試範圍</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">下一步</button>
        <button type="button" class="btn btn-primary">確定</button>
      </div>
    </div>
  </div>
</div>

<?php
  include('partial/footer.php');
?>

<script type='text/javascript'>
$(function() {
  $.ajax({
    url: `/test`,
    type: 'get',
    data: {},
    dataType: 'json',
    success: function(response) {
      // console.log(response);
      // console.log($('#dataTable .thead'));

      $.each( response, function( key, value ) {
        $('#dataTable tbody').append(`
          <tr>
            <th scope="row">${value.id}</th>
            <td>${value.school}</td>
            <td>${value.department}</td>
            <td>${value.name}</td>
            <td>${value.finish==1?'完成':'未完成'}</td>
            <td>
              <div class="btn-group" role="group">
               <button type="button" class="btn btn-success" data-id="${value.id}" data-toggle="modal" data-type="modify" data-target="#exampleModal">
                  <i class="fas fa-edit" name="updateButton"></i>
                </button>
                ${value.finish==1?` <button type="button" class="btn btn-primary" data-id="${value.id}" data-toggle="modal" data-type="makeTest" data-target="#exampleModal">
                  <i class="fas fa-file-pdf"  aria-hidden="true" name="updateButton"></i>
                </button>`:''}
              </div>
            </td>
          </tr>
          `);

      });


    }
  });


});
$('#exampleModal').on('show.bs.modal', function(e) {
  $('#exampleModal .modal-footer').html(`<button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>`);
  // $("#exampleModal .modal-dialog ").attr("class","modal-dialog");

  // $('#exampleModal .modal-footer').html(basicModalFooter);
  var type = $(e.relatedTarget).data('type');
  // console.log(type);

  if (type == 'modify') {
    var tmpID = $(e.relatedTarget).data('id');

    modify(tmpID);
  }else if (type == 'makeTest') {
    var tmpID = $(e.relatedTarget).data('id');

    makeTest(tmpID);
  }
});

function modify (tmpID){

  $('#exampleModal .modal-header').html(`修改試題`);
  $('#exampleModal .modal-body').html(`確認修該試題？`);
  $('#exampleModal .modal-footer').append(`<button type="button" class="btn btn-primary" id="btnModify"  onclick='window.location.href="/handMade?id="${tmpID}"'>確認</button>`);
  // $('#btnModify').unbind().on('click',function(){
  //   // console.log(tmpID);
  //   window.location.href = `/handMade?id = ${tmpID}`;
  // });


}

function makeTest(tmpID){

}

</script>
