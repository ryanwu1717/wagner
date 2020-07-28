<?php
  include('partial/header.php');
?>
	<div class="card o-hidden shadow-lg py-5">
		<div class="card-head">
			<!-- <div class="col-md-12">
				<div class="text-center">
					<h1 class="font-weight-bold">手動命題</h1>
				</div>
			</div><br> -->
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a aria-controls="firstPage" aria-selected="true" class="nav-link active" data-toggle="tab" href="#firstPage" id="firstPage-tab" role="tab">建立試卷</a>
				</li>
				<li class="nav-item">
					<a aria-controls="secondPage" aria-selected="false" class="nav-link" data-toggle="tab" href="#secondPage" id="secondPage-tab" role="tab">題目挑選</a>
				</li>
				<li class="nav-item">
					<a aria-controls="thirdPage" aria-selected="false" class="nav-link" data-toggle="tab" href="#thirdPage" id="thirdPage-tab" role="tab">試題挑選</a>
				</li>
			</ul>
		</div>
		<div class="tab-content" id="myTabContent">
			<div aria-labelledby="firstPage-tab" class="tab-pane fade show active" id="firstPage" role="tabpanel">
				<div class="card-body">
					<form>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label class="col-form-label col-md-4">學校名稱</label>
									<div class="col-md-8">
										<input class="form-control form-control-user" data-type= "schoolName" name="firstPageInput" placeholder="ex.國立高雄師範大學" required="" type="text">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-md-4">考試科目</label>
									<div class="col-md-8">
										<div class="row">
											<div class="col-md-6">
												<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-type="chooseBook">
												  請選擇
												</button>
											</div>
											<div class="col-md-6">
												<!-- <input class="form-control form-control-user" name="schoolName" placeholder="ex.計算機概論" required="" type="text"> -->
												<label class="col-form-label" id="labelChooseBook">選擇科目</label>
											</div>
										</div>
										
									</div>
								</div>
								<div class="form-group row" id = "divTestRange">
									<label class="col-form-label col-md-4">考試範圍</label>
									<div class="col-md-6">
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-type="chooseChapter">
										  請選擇
										</button>
									</div>
									<div class="col-md-2">
										<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal" data-type="seeChoose"><i class="far fa-eye"></i></button>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-md-4">試卷尺寸</label>
									<div class="col-md-8">
										<select class="custom-select" data-type= "testSize" name="firstPageInput"required="">
											<option disabled selected value="">
												請選擇
											</option>
											<option   value="A3">
												A3
											</option>
											<option   value="A4">
												A4
											</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<label class="col-form-label col-md-4">科系名稱</label>
									<div class="col-md-8">
										<input class="form-control form-control-user" name="firstPageInput" data-type= "DepartmentName" placeholder="ex.軟體工程與管理學系" required="" type="text">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-md-4">考試名稱</label>
									<div class="col-md-8">
										<input class="form-control form-control-user" name="firstPageInput" data-type= "testName" placeholder="ex.第一次期末考" required="" type="text">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-md-4">檔案名稱</label>
									<div class="col-md-8">
										<input class="form-control form-control-user" name="firstPageInput" data-type= "fileName" placeholder="ex.ＸＸＸ" required="" type="text">
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="d-flex justify-content-around">
									<!-- <button class="btn btn-primary btn-lg btn-block m-3" name="btnUpPage" onclick="location.href='function'" type="submit">上一頁</button>  -->
									<button  class="btn btn-primary btn-lg btn-block m-3" id="toSecondPage" >下一步</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div aria-labelledby="secondPage-tab" class="tab-pane fade" id="secondPage" role="tabpanel">
				<div class="card-body">
					<form>
						<div class="row">
							<div class="col-md-5">
								<div class="col-md-12">
									<div class="text-center">
										<h3 class="font-weight-bold">題型內容</h3>
									</div>
								</div>
								<div class="form-group row">
									<div class="form-check">
										<input class="form-check-input" id="exampleRadios1" name="exampleRadios" type="radio" value="&nbsp;一般試題"> <label class="form-check-label" for="defaultCheck1">&nbsp;一般試題</label>
									</div>
								</div>
								<div class="form-group row">
									<div class="form-check">
										<input class="form-check-input" id="exampleRadios1" name="exampleRadios" type="radio" value="&nbsp;歷屆試題"> <label class="form-check-label" for="defaultCheck1">&nbsp;歷屆試題</label>
									</div>
								</div>
								<div class="form-group row">
									<div class="form-check">
										<input class="form-check-input" id="exampleRadios1" name="exampleRadios" type="radio" value="一般試題＋&nbsp;歷屆試題"> <label class="form-check-label" for="defaultCheck1">&nbsp;一般試題＋&nbsp;歷屆試題</label>
									</div>
								</div>
							</div>
							<div class="col-md-7">
								<div class="col-md-12">
									<div class="text-center">
										<h3 class="font-weight-bold">題型挑選</h3>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-md-2">選擇題</label> <label class="col-form-label col-md-2">題數</label>
									<div class="col-md-2">
										<input class="form-control form-control-user" name="schoolName" placeholder="ex.10" required="" type="text" value="0">
									</div><label class="col-form-label col-md-2">配分</label>
									<div class="col-md-2">
										<input class="form-control form-control-user" name="schoolName" placeholder="ex.10" required="" type="text" value="0">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-md-2">填充題</label> <label class="col-form-label col-md-2">題數</label>
									<div class="col-md-2">
										<input class="form-control form-control-user" name="schoolName" placeholder="ex.10" required="" type="text" value="0">
									</div><label class="col-form-label col-md-2">配分</label>
									<div class="col-md-2">
										<input class="form-control form-control-user" name="schoolName" placeholder="ex.10" required="" type="text" value="0">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-md-2">問答題</label> <label class="col-form-label col-md-2">題數</label>
									<div class="col-md-2">
										<input class="form-control form-control-user" name="schoolName" placeholder="ex.10" required="" type="text" value="0">
									</div><label class="col-form-label col-md-2">配分</label>
									<div class="col-md-2">
										<input class="form-control form-control-user" name="schoolName" placeholder="ex.10" required="" type="text" value="0">
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="d-flex justify-content-around">
									<button class="btn btn-primary btn-lg btn-block m-3" name="btnUpPage" onclick="location.href='function'" type="submit">上一步</button> 
									<button class="btn btn-primary btn-lg btn-block m-3" name="btnNextPage" type="submit">下一步</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div aria-labelledby="thirdPage-tab" class="tab-pane fade" id="thirdPage" role="tabpanel">
				<div class="card-body">
					<form>
						<div class="row">
							<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
								<li class="nav-item">
									<a aria-controls="pills-home" aria-selected="true" class="nav-link active" data-toggle="pill" href="#thirdPageChoose" id="pills-home-tab" role="tab">選擇題</a>
								</li>
								<li class="nav-item">
									<a aria-controls="pills-profile" aria-selected="false" class="nav-link" data-toggle="pill" href="#thirdPageFill" id="pills-profile-tab" role="tab">填充題</a>
								</li>
								<li class="nav-item">
									<a aria-controls="pills-contact" aria-selected="false" class="nav-link" data-toggle="pill" href="#thirdPageAsk" id="pills-contact-tab" role="tab">問答題</a>
								</li>
							</ul>
						</div>
						<div class="tab-content" id="pills-tabContent">
							<div aria-labelledby="pills-home-tab" class="tab-pane fade show active" id="thirdPageChoose" role="tabpanel">
								選擇題
								<div class="overflow-auto" style="max-width: 800px; max-height: 300px;">
									<ul class="list-group list-group-flush">
										<li class="list-group-item"><input class="form-check-input" id="defaultCheck1" type="checkbox" value=""> Cras justo odio</li>
										<li class="list-group-item"><input class="form-check-input" id="defaultCheck1" type="checkbox" value=""> Cras justo odio</li>
										<li class="list-group-item"><input class="form-check-input" id="defaultCheck1" type="checkbox" value=""> Cras justo odio</li>
										<li class="list-group-item"><input class="form-check-input" id="defaultCheck1" type="checkbox" value=""> Cras justo odio</li>
										<li class="list-group-item"><input class="form-check-input" id="defaultCheck1" type="checkbox" value=""> Cras justo odio</li>
										<li class="list-group-item"><input class="form-check-input" id="defaultCheck1" type="checkbox" value=""> Dapibus ac facilisis in</li>
										<li class="list-group-item"><input class="form-check-input" id="defaultCheck1" type="checkbox" value="">Morbi leo risus</li>
									</ul>
								</div>
							</div>
							<div aria-labelledby="pills-profile-tab" class="tab-pane fade" id="thirdPageFill" role="tabpanel">
								填充題
								<div class="overflow-auto" style="max-width: 800px; max-height: 300px;">
									<ul class="list-group list-group-flush overflow-auto">
										<li class="list-group-item"><input class="form-check-input" id="defaultCheck1" type="checkbox" value=""> Cras justo odio</li>
										<li class="list-group-item"><input class="form-check-input" id="defaultCheck1" type="checkbox" value=""> Dapibus ac facilisis in</li>
										<li class="list-group-item"><input class="form-check-input" id="defaultCheck1" type="checkbox" value="">Morbi leo risus</li>
									</ul>
								</div>
							</div>
							<div aria-labelledby="pills-contact-tab" class="tab-pane fade" id="thirdPageAsk" role="tabpanel">
								問答題
								<div class="overflow-auto" style="max-width: 800px; max-height: 300px;">
									<ul class="list-group list-group-flush overflow-auto">
										<li class="list-group-item"><input class="form-check-input" id="defaultCheck1" type="checkbox" value=""> Cras justo odio</li>
										<li class="list-group-item"><input class="form-check-input" id="defaultCheck1" type="checkbox" value=""> Dapibus ac facilisis in</li>
										<li class="list-group-item"><input class="form-check-input" id="defaultCheck1" type="checkbox" value="">Morbi leo risus</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="d-flex justify-content-around">
								<button class="btn btn-primary btn-lg btn-block m-3" name="btnUpPage" onclick="location.href='function'" type="submit">未完成儲存</button> <button class="btn btn-primary btn-lg btn-block m-3" name="" onclick="location.href='makeTest'" type="">已完成儲存</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">選擇考試範圍</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<!-- <div class="row"> -->
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
var chooseBookID;
var chooseUnitID = new Array();
var data = new Object();
data['unit'] = [];
$('#divTestRange').hide();
$(function(){
	// $('#toSecondPage').submit(function(e){
		// e.preventDefault();
	$('#toSecondPage').unbind().on('click',function(){
		$('#secondPage-tab').click();
		 $('[name="firstPageInput"]').each(function(){
      data[$(this).data('type')] = $(this).val();
      console.log($(this).val());
    });
		 console.log(data);
		 return false;
	});
	// 	$('#secondPage-tab').click();
	// 	return false;
	// });
	
});
	

function chooseChapter(){
	$('#exampleModal .modal-body').empty();
	$('#exampleModal .modal-title').html('選擇範圍');
	$.ajax({
    url:'/test/chapter/'+chooseBookID,
    type:'get',
    data:{data:JSON.stringify({
       
    })},
    success:function(response){
    	$('#exampleModal .modal-body').append(`
    		<div class="card" id="cardChapter">
    			<div class="card-header">
    				章
    			</div>
				  <div class="card-body overflow-auto" style="max-width: 464px; max-height: 100px;" >
				  	<button type="button" class="btn btn-primary btn-sm" id="chooseAllChapter" onclick="chooseAllChapterOnclick();">全選</button>
				  </div>
				  <div class="card-footer text-right">
    				<button type="button" class="btn btn-primary btn-sm" id="beChooseChapter" >確定</button>
    			</div>
				</div>
				<div class="card" id="cardUnit">
   				<div class="card-header">
    				節
    			</div>
					<div class="card-body overflow-auto" style="max-width: 464px; max-height: 150px;" id="cardBodyUnitAll">
					</div>
					<div class="card-footer text-right">
    				<button type="button" class="btn btn-primary btn-sm" id="beChooseUnit" >確定</button>
    			</div>
				</div>`);
    
    	$(response.chapter).each(function(){
    		$('#cardChapter').find(".card-body").append(
    			`<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="${this.id}" id="chapterCheckBox${this.id}" name="chapterCheckBox">
					  <label class="form-check-label" for="defaultCheck1">
					   ${this.num} ${this.name}
					  </label>
					</div>`);
    		$('#cardBodyUnitAll').append(
    			`<div class="card" name="cartUnit" id='cartUnit${this.id}' style="display:none;">
				    <div class="card-header" id="heading${this.id}" >
				      <h5 class="mb-0">
				        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse${this.id}" aria-expanded="true" aria-controls="collapse${this.id}">
				            ${this.num}
				        </button>
				      </h5>
				    </div>
				    <div id="collapse${this.id}" class="collapse show" aria-labelledby="heading${this.id}" data-parent="#cardUnit" >
				    	<div class="card-body" id="cardBodyUnit${this.id}">
				    		<div class="card-body overflow-auto" style="max-width: 464px; max-height: 100px;" >
							  	<button type="button" class="btn btn-primary btn-sm" id="chooseAllChapter" onclick="chooseAllUnitOnclick('${this.id}');">全選</button>
							  </div>
				    	</div>
				    </div>
				   </div>`);

    		
    	});
    	$(response.unit).each(function(){
    		// console.log(this);
    		$(`#cardBodyUnit${this.chapterID}`).append(`
			      	<div class="form-check">
							  <input class="form-check-input" type="checkbox" value="${this.id}" name="unitCheckBox">
							  <label class="form-check-label" for="defaultCheck1">
							    ${this.num} ${this.name}
							  </label>
							</div>
    			`);
    	});
    	$("#cardUnit").hide();
    	$('#beChooseChapter').unbind().on('click',function(){
    		$("#cardUnit").show();
    		$('[ name="cartUnit" ]').hide();
    		var choose= $("input[name=chapterCheckBox]:checked").map(function() { return $(this).val(); }).get();
    		$( choose ).each(function( i ) {
				  var tmpChapter = parseInt(this);
				  // console.log(tmpChapter);
				  $(`#cartUnit${tmpChapter}`).show();
				});
    	});
    	$('#beChooseUnit').unbind().on('click',function(){
    		chooseUnitID = [];
    		var choose= $("input[name=unitCheckBox]:checked").map(function() { return $(this).val(); }).get();
    		$( choose ).each(function( i ) {
				  var tmpChapter = parseInt(this);
				  chooseUnitID.push(tmpChapter);
				  
				});
				data['unit'] = chooseUnitID;
  			$('#exampleModal').modal('hide');

				// console.log(chooseUnitID);
    	});
    }
  });
}
function chooseAllChapterOnclick(){
	// console.log($('[name=chapterCheckBox]'));
	if($('[name=chapterCheckBox]').prop('checked')){
   $('[name=chapterCheckBox]').attr("checked", false) ;
	}else{
   $('[name=chapterCheckBox]').attr("checked", true) ;
	}
}

function chooseAllUnitOnclick (tmpId){
	console.log($(`#cardBodyUnit${tmpId}`).find("[name=unitCheckBox]").length);
	console.log($(`#cardBodyUnit${tmpId}`).find("[name=unitCheckBox]").prop('checked'));
	if($(`#cardBodyUnit${tmpId}`).find("[name=unitCheckBox]").prop('checked')){
		$(`#cardBodyUnit${tmpId}`).find("[name=unitCheckBox]").attr("checked", false) ;
	}else{
		$(`#cardBodyUnit${tmpId}`).find("[name=unitCheckBox]").attr("checked", true) ;

	}
	// console.log($(`#cardBodyUnit${tmpId}`).find("[name=unitCheckBox]").prop('checked'));


}
function chooseBook(){
	$('#exampleModal .modal-body').empty();
	$('#exampleModal .modal-title').html('選擇書本');
	$('#exampleModal .modal-footer').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>');

	$.ajax({
    url:'/test/book',
    type:'get',
    data:{data:JSON.stringify({
       
    })},
    success:function(response){
      $('#exampleModal .modal-body').append(`
					<div class="input-group mb-3">
				    <div class="input-group-prepend">
				      <span class="input-group-text"><i class="fa fa-search" aria-hidden="true"></i></span>
				    </div>
				    <input type="text" id="searchBookInput" class="form-control">
				  </div>
				  <div class="card">
				  	<div class="card-body"  id="groupBookName">
				  	</div>
				  </div>`
				 );
      $(response).each(function(){
      	$('#groupBookName').append(`<button type="button" class="btn btn-primary btn-lg btn-block" data-bookid=${this.id} data-name="${this.name}" name="btnBook" onclick="chooseBookOnclick(this);">${this.name}</button>`);
      });
      
      var searchBook;
      $('#searchBookInput').unbind().on('keyup',function(){
			  clearTimeout(searchBook);
			  searchBook = setTimeout(function(){
			    $('[name=btnBook]').each(function(){
			    	// console.log($(this).val());
			    	// console.log($('#searchBookInput').val());
			      if($(this).data('name').indexOf($('#searchBookInput').val())>-1){
			        $(this).show();
			      }else{
			        $(this).hide();
			      }
			    });
			  },300);
			});

    },
    error:function(jqXHR, textStatus, errorThrown){
      console.log("failed");
    }
  }); 
}

function seeChoose(){
	$('#exampleModal .modal-title').html('檢視');
		console.log(data.length );
	if(data['unit'].length == 0){
		$('#exampleModal .modal-body').html('尚未選擇');
	}else{
		$('#exampleModal .modal-body').empty();
		$.each(data['unit'], function( index, value ) {
			console.log( index + ": " + value );
			$.ajax({
			  url:'/unitName/'+value,
			  type:'get',
			  data:{data:JSON.stringify({
			     
			  })},
			  success:function(response){
			  	
					$('#exampleModal .modal-body').(`<p>${response}</p>`);
			  }
			});
		});

	}

}

$('#exampleModal').on('show.bs.modal',function(e){
  var type = $(e.relatedTarget).data('type');
	$('#exampleModal .modal-footer').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>');

  console.log(type);
  if(type=='chooseBook'){
    chooseBook();
  }else if(type=='chooseChapter'){
    chooseChapter();
  }else if(type=='seeChoose'){
    seeChoose();
  }

});
function chooseBookOnclick(button){
  $('#exampleModal').modal('hide');
  $('#divTestRange').show();
	chooseBookID = $(button).data('bookid');
	$('#labelChooseBook').html($(button).data('name'));	
}

</script>