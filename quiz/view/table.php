<?php
  include('partial/header.php');
?>
 <div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">使用者資料</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table cellspacing="0" class="table table-bordered display"  id="dataTable" width="100%" >
				<thead>
					<tr>
						<th>ID</th>
						<th>中文姓名</th>
						<th>學校</th>
						<th>科系</th>
						<th>手機</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>ID</th>
						<th>中文姓名</th>
						<th>學校</th>
						<th>科系</th>
						<th>手機</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody id="tbody_inputData">
                    
        </tbody>
			</table>
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
<!-- Page level plugins -->
  <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script type='text/javascript'>
$(function(){
  $.ajax({
    url:'/user/getTable',
    type:'get',
    dataType:'json',
    success:function(response){
      $(response).each(function(){
      	// console.log(this);
      	$('#tbody_inputData').append(`
      		<tr> <td>${this.id}</td> 
      			<td>${this.name}</td> 
      			<td>${this.school}</td>
      			<td>${this.department}</td> 
      			<td>${this.phone}</td> 
      			<td>
      				<div class="btn-group" role="group" >
      					<button type="button" class="btn btn-primary" data-id="${this.id}" data-toggle="modal" data-type="see" data-target="#basicModal"><i class="far fa-eye"></i></button>
			          <button type="button" class="btn btn-success" onclick='window.location.href="/register?id=${this.id}"'><i class="fas fa-edit" name="updateButton" ></i></button>
			          <button type="button" class="btn btn-danger" data-id="${this.id}" data-toggle="modal" data-type="delete" data-target="#basicModal"><i class="far fa-trash-alt"></i></button>  
      				</div>
		          </td> 
         </tr>`);
      });

      $('#dataTable').DataTable({  
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
  });
});
function deleteUser(tmpID){
	$('#basicModal .modal-body').html(`確定刪除此用戶？`);
	$('#basicModal .modal-title').html('刪除用戶');
	$('#basicModal .modal-footer').html(`
    <button class="btn btn-secondary" type="button" data-dismiss="modal">關閉</button>
		<button type="button" class="btn btn-primary" id="deleteBtn">確定</button>`);
	$('#deleteBtn').unbind().on('click',function(){
		$.ajax({
      url:'/user/'+tmpID,
      type:'POST',
      data:{_METHOD:'delete'},
      dataType:'json',
      success:function(response){
        if(response == 'success'){
        	window.location.href="/table";
        }
      } 
    });
	});

}

function checkUser(tmpID){
	$('#basicModal .modal-body').empty();
	$('#basicModal .modal-title').html('檢視用戶');
	 $.ajax({
    url:'/user/profile/'+tmpID,
    type:'get',
    dataType:'json',
    success:function(response){
    	console.log(response);
     $.each(response,function(key,value){

        $('#basicModal .modal-body').append('<div class="row"><label class="col-sm-4">'+key+'</label><div class="col-sm-8">'+value+'</div></div>')
      });
    }
  });
}

$('#basicModal').on('show.bs.modal',function(e){
  // $('#exampleModal .modal-footer').html(basicModalFooter);
  var type = $(e.relatedTarget).data('type');
  console.log(type);
  if(type=='delete'){
    deleteUser( $(e.relatedTarget).data('id'));
  }else if(type=='see'){
    checkUser( $(e.relatedTarget).data('id'));
  }

});
	
</script>
