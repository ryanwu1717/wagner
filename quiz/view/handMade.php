<?php
  include('partial/header.php');
?>
<div class="container">
	<div class="card o-hidden shadow-lg ">
		<div class="card-body">
			
			<div class="tab-content" id="myTabContent">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a aria-controls="firstPage" aria-selected="true" class="nav-link active" data-toggle="tab" href="#firstPage" id="firstPage-tab" role="tab">建立試卷</a>
					</li>
					<li class="nav-item">
						<a aria-controls="secondPage" aria-selected="false" class="nav-link" data-toggle="tab" href="#secondPage" id="secondPage-tab" role="tab">題目挑選</a>
					</li>
					<li class="nav-item">
						<a aria-controls="thirdPage" aria-selected="false" class="nav-link disabled" data-toggle="tab" href="#thirdPage" id="thirdPage-tab" role="tab">試題挑選</a>
					</li>
				</ul>
				<div aria-labelledby="firstPage-tab" class="tab-pane fade show active" id="firstPage" role="tabpanel">

					<div class="card-body">
						<form id="firstForm">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group row">
										<label class="col-form-label col-md-4">學校名稱</label>
										<div class="col-md-8">
											<input class="form-control form-control-user" data-type= "schoolName" name="firstPageInput" placeholder="ex.國立高雄師範大學" required type="text">
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
											<button type="button" class="btn btn-primary" data-id="A10000" data-toggle="modal" data-target="#exampleModal" data-type="showUnit"><i class="far fa-eye"></i></button>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-md-4">試卷尺寸</label>
										<div class="col-md-8">
											<select class="custom-select" data-type= "testSize" name="firstPageInput"required>
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
											<input class="form-control form-control-user" name="firstPageInput" data-type= "DepartmentName" placeholder="ex.軟體工程與管理學系" required type="text">
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
										<button  class="btn btn-primary btn-lg btn-block m-3" type="submit" id="toSecondPage" >下一步</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div aria-labelledby="secondPage-tab" class="tab-pane fade" id="secondPage" role="tabpanel">
					<div class="card-body">
						<form id="secondForm">
							<div class="row">
								<div class="col-md-5">
									<div class="col-md-12">
										<div class="text-center">
											<h3 class="font-weight-bold">題型內容</h3>
										</div>
									</div>
									<div class="form-group row">
										<div class="form-check">
											<input class="form-check-input" required="" id="radiogeneral" name="exampleRadios" type="radio" value="general"> 
											<label class="form-check-label" for="radiogeneral">&nbsp;一般試題</label>
										</div>
									</div>
									<div class="form-group row">
										<div class="form-check">
											<input class="form-check-input" required="" id="radioprevious" name="exampleRadios" type="radio" value="previous"> <label class="form-check-label" for="radioprevious">&nbsp;歷屆試題</label>
										</div>
									</div>
									<div class="form-group row">
										<div class="form-check">
											<input class="form-check-input" required="" id="radioboth" name="exampleRadios" type="radio" value="both"> <label class="form-check-label" for="radioboth">&nbsp;一般試題＋&nbsp;歷屆試題</label>
										</div>
									</div>
								</div>
								<div class="col-md-7">
									<div class="col-md-12">
										<div class="text-center">
											<h3 class="font-weight-bold">題型挑選</h3>
										</div>
									</div>
									<div class="form-group form-row">
										<label class="col-form-label col-md-2">選擇題</label> <label class="col-form-label col-md-2">題數</label>
										<div class="col-md-2">
											<input class="form-control form-control-user" name="inputNum" placeholder="ex.10" required="" type="text" value="0" data-type="chooseNum">
										</div><label class="col-form-label col-md-2">配分</label>
										<div class="col-md-2">
											<input class="form-control form-control-user" name="inputScore" placeholder="ex.10" required="" type="text" value="0" data-type="chooseScore">
										</div>
									</div>
									<div class="form-group form-row">
										<label class="col-form-label col-md-2">填充題</label> <label class="col-form-label col-md-2">題數</label>
										<div class="col-md-2">
											<input class="form-control form-control-user" name="inputNum" placeholder="ex.10" required="" type="text" value="0"  data-type="fillNum">
										</div><label class="col-form-label col-md-2">配分</label>
										<div class="col-md-2">
											<input class="form-control form-control-user" name="inputScore" placeholder="ex.10" required="" type="text" value="0" data-type="fillScore">
										</div>
									</div>
									<div class="form-group form-row">
										<label class="col-form-label col-md-2">問答題</label> <label class="col-form-label col-md-2">題數</label>
										<div class="col-md-2">
											<input class="form-control form-control-user" name="inputNum" placeholder="ex.10" required="" type="text" value="0" data-type="askNum">
										</div><label class="col-form-label col-md-2">配分</label>
										<div class="col-md-2">
											<input class="form-control form-control-user" name="inputScore" placeholder="ex.10" required="" type="text" value="0" data-type="askScore">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="d-flex justify-content-around">
										<button class="btn btn-primary btn-lg btn-block m-3" name="btnUpPageSecond"  type="button">上一步</button> 
										<button class="btn btn-primary btn-lg btn-block m-3" id="btnNextPageSecond" type="submit" data-toggle="modal" data-target="#exampleModal" data-type="checkSecondPage">選題</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>

				<div aria-labelledby="thirdPage-tab" class="tab-pane fade" id="thirdPage" role="tabpanel">
					<div class="card-body">
						<!-- <form> -->
							<div class="row">
								<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
									<li class="nav-item">
										<a aria-controls="pills-home" aria-selected="true" class="nav-link active" data-toggle="pill" href="#thirdPageChoose" id="pills-home-tab" role="tab">
											選擇題
											<div class="progress">
											  <div class="progress-bar progress-bar-striped bg-warning" id="progressChoose" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
											</div>
										</a>
										
									</li>
									<li class="nav-item">
										<a aria-controls="pills-profile" aria-selected="false" class="nav-link" data-toggle="pill" href="#thirdPageFill" id="pills-profile-tab" role="tab">
											填充題
											<div class="progress">
											  <div class="progress-bar progress-bar-striped bg-warning" id="progressFill" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
											</div>
										</a>
									</li>
									<li class="nav-item">
										<a aria-controls="pills-contact" aria-selected="false" class="nav-link" data-toggle="pill" href="#thirdPageAsk" id="pills-contact-tab" role="tab">
											問答題
											<div class="progress">
											  <div class="progress-bar progress-bar-striped bg-warning" id="progressAsk" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="tab-content" id="pills-tabContent">
								<div aria-labelledby="pills-home-tab" class="tab-pane fade show active" id="thirdPageChoose" role="tabpanel">
									選擇題
									<div class="overflow-auto" style="max-width: 800px; max-height: 300px;" id="chooseGroup">
										<ul class="list-group list-group-flush" id="chooseGroup">
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
									<!-- <button class="btn btn-primary btn-lg btn-block m-3" name="btnUpPage" onclick="location.href='function'" type="submit">未完成儲存</button>  -->
									<button class="btn btn-primary btn-lg btn-block m-3" id="btnCheckQuestion"  type="" data-toggle="modal" data-target="#exampleModal" data-type="checkQuestion">已完成儲存</button>
								</div>
							</div>
						<!-- </form> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<!-- second model -->
<div class="modal fade" id="secondModal" tabindex="-1" role="dialog" aria-labelledby="secondModalLabel" aria-hidden="true">
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
var chooseBookID;
var chooseUnitID = new Array();
var data = new Object();
var chooseChapterID = new Array();

// data['unit'] = [1,2,3];
// chooseUnitID = [1,2,3];
$('#divTestRange').hide();
$(function() {
	$('[name="btnUpPageSecond"]').unbind().on('click', function() {
		$('#firstPage-tab').click();
	});
	$('#secondForm').on('submit', function(e) {
		// $('#thirdPage-tab').click();
		e.preventDefault();
	});
	$('#firstForm').on('submit', function(e) {
		// validation code here
		$('#secondPage-tab').click();
		// $('[name="firstPageInput"]').each(function() {
		// 	data[$(this).data('type')] = $(this).val();
		// });
		e.preventDefault();
	});

	// $('#firstPage-tab').on('shown.bs.tab', function (e) {
	// 		console.log("in");
	  
	// });
	$('input').on('change', function (e) {
			console.log("in");
			$( "#thirdPage-tab" ).attr( "class", "nav-link disabled" );
	  
	});
	$('[name="firstPageInput"]').on('change', function (e) {
			$( "#thirdPage-tab" ).attr( "class", "nav-link disabled" );

	  
	});

});
$('#exampleModal').on('show.bs.modal', function(e) {
	$('#exampleModal .modal-footer').html(`<button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>`);
	$("#exampleModal .modal-dialog ").attr("class","modal-dialog");

	// $('#exampleModal .modal-footer').html(basicModalFooter);
	var type = $(e.relatedTarget).data('type');
	// console.log(type);

	if (type == 'chooseBook') {
		chooseBook();
	} else if (type == 'chooseChapter') {
		chooseChapter();
		 $("#exampleModal .modal-dialog ").attr("class","modal-dialog modal-lg");
	} else if (type == 'showUnit') {
		showUnit();
	} else if (type == 'checkSecondPage') {
		$('#firstForm').submit();
		checkSecondPage();
	} else if(type == 'checkQuestion') {
		checkQuestion();
	} 
});
$('#secondModal').on('show.bs.modal', function(e) {
	$('#secondModal .modal-footer').html(`<button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>`);
	// $('#exampleModal .modal-footer').html(basicModalFooter);
	var type = $(e.relatedTarget).data('type');
	// console.log(type);
	if (type == 'deleteUnit') {
		deleteUnit($(e.relatedTarget).data('id'));
	}
});

function addTest() {
	$.ajax({
		url: '/test',
		type: 'POST',
		data: {
			data: JSON.stringify(data)
		},
		dataType: 'json',
		success: function(response) {
			window.location.href=`/makeTest?id=${response.id}`;
		}
	});
}

function checkQuestion(){
	console.log("11");
	// checkSecondPage();

	data['checkChoose'] = $('[name=question][data-type="choose"]:checked').length;
	data['checkFill'] = $('[name=question][data-type="fill"]:checked').length;
	data['checkAsk'] = $('[name=question][data-type="ask"]:checked').length;

	$('#exampleModal .modal-title').html(`製作試卷`);
	$('#exampleModal .modal-body').html(`確定新增此試卷</br>`);
	$.ajax({
		url: '/test/checkQuestion',
		type: 'POST',
		data: {
			data: JSON.stringify(data)
		},
		dataType: 'json',
		success: function(response) {
			$('#exampleModal .modal-footer').html(`
				<button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
				<button type="button" class="btn btn-primary" id="btnAddTest">確定</button>`);
			$.each( response, function( key, value ) {
				// console.log(key,value);
				
				if(value != 'success'){
					$('#exampleModal .modal-body').append(`${key+value}</br>`);
					$('#btnAddTest').hide();
				}
			});
			$('#btnAddTest').unbind().on('click', function() {
				data['question'] = new Array;
				$('[name=question]:checked').each(function () {
					data['question'].push($(this).data('id'));
				});
				console.log(data['question']);

				addTest();
			});
		}
	});

}

function getQuestion() {
	// console.log(data);
	$.each(data['unit'], function(key, value) {
		$.ajax({
			url: `/question/${value}/${data['questionType']['questionContent']}`,
			type: 'get',
			data: {},
			dataType: 'json',
			success: function(response) {
				$.each( response.choose, function( key, value ) {
					// console.log(value.question.question);
					$(`#collapseChooseQuestion${value.question.unitID} .card-body`).append(`
						<li class="list-group-item">
							<input class="form-check-input" name="question" id="chooseQuestion${value.question.id}" type="checkbox" value="" data-type="choose" data-id="${value.question.id}"> 
								<span class="badge badge-secondary">${value.question.degree}</span>
								<label class="form-check-label" for="chooseQuestion${value.question.id}">${value.question.question}</label>
</div>
								
						</li>`);
				});
				$.each( response.fill, function( key, value ) {
					// console.log(value.question.question);
					$(`#collapseFillQuestion${value.question.unitID} .card-body`).append(`
						<li class="list-group-item">
							<input class="form-check-input" name="question" id="fillQuestion${value.question.id}" type="checkbox" value="" data-type="fill" data-id="${value.question.id}"> 
								<span class="badge badge-secondary">${value.question.degree}</span>
								<label class="form-check-label" for="fillQuestion${value.question.id}">${value.question.question}</label>
						</li>`);
				});
				$.each( response.ask, function( key, value ) {
					// console.log(value.question.question);
					$(`#collapseAskQuestion${value.question.unitID} .card-body`).append(`
						<li class="list-group-item">
							<input class="form-check-input" name="question" id="askQuestion${value.question.id}" type="checkbox" value="" data-type="ask" data-id="${value.question.id}"> 
								<span class="badge badge-secondary">${value.question.degree}</span>
								<label class="form-check-label" for="askQuestion${value.question.id}">${value.question.question}</label>
						</li>`);
				});
				checkPersentage();
				
			}
		});
	});
}

function checkPersentage(){
	$(function() {
		console.log(data.questionType.chooseNum);
		// var choosePercent 
		// var fillPercent
		// var askPercent
		if(data.questionType.chooseNum ==0){
			$('#progressChoose').css("width", "100%");

		}else {
			$('#progressChoose').css("width", "0%");

		}
		if(data.questionType.fillNum ==0){
			$('#progressFill').css("width", "100%");

		}else {
			$('#progressFill').css("width", "0%");

		}
		if(data.questionType.askNum ==0){
			$('#progressAsk').css("width", "100%");
		}else {
			$('#progressAsk').css("width", "0%");

		}

		$('[name=question]').unbind().on('change', function (e) {
			console.log($('[name=question][data-type="choose"]:checked').length);
			console.log(data.questionType.chooseNum);
			console.log($('[name=question][data-type="choose"]:checked').length/data.questionType.chooseNum);

			$('#progressChoose').css("width", `${$('[name=question][data-type="choose"]:checked').length/data.questionType.chooseNum*100}%`);
			$('#progressFill').css("width", `${$('[name=question][data-type="fill"]:checked').length/data.questionType.fillNum*100}%`);
			$('#progressAsk').css("width", `${$('[name=question][data-type="ask"]:checked').length/data.questionType.askNum*100}%`);

			if(data.questionType.chooseNum ==0){
				$('#progressChoose').css("width", "100%");

			}
			if(data.questionType.fillNum ==0){
				$('#progressFill').css("width", "100%");

			}
			if(data.questionType.askNum ==0){
				$('#progressAsk').css("width", "100%");
			}


		});
	});

}

function AddChooseUnit(){
	$.ajax({
		url: '/test/selectunit',
		type: 'post',
		data: {
			data: JSON.stringify({
				unit: chooseUnitID
			}),
			_METHOD: 'PATCH'
		},
		success: function(response) {
			$('#thirdPageChoose .overflow-auto').empty();
			$('#thirdPageFill .overflow-auto').empty();
			$('#thirdPageAsk .overflow-auto').empty();

			$(response.unit).each(function() {
				$('#thirdPageChoose .overflow-auto').append(`
					<div class="card">
				    <div class="card-header" id="headingChooseQuestion${this.id}">
				      <h5 class="mb-0">
				        <button type="" class="btn btn-link"  data-toggle="collapse" data-target="#collapseChooseQuestion${this.id}" aria-expanded="true" aria-controls="collapseChooseQuestion${this.id}">
				          ${this.num +' ' +this.name}
				        </button>
				      </h5>
				    </div>
				    <div id="collapseChooseQuestion${this.id}" class="collapse " aria-labelledby="headingChooseQuestion${this.id}" data-parent="#chooseGroup">
				      <div class="card-body">
				       
				      </div>
				    </div>
				   </div>`);

					$('#thirdPageFill .overflow-auto').append(`
						<div class="card">
					    <div class="card-header" id="headingFillQuestion${this.id}">
					      <h5 class="mb-0">
					        <button type="" class="btn btn-link"  data-toggle="collapse" data-target="#collapseFillQuestion${this.id}" aria-expanded="true" aria-controls="collapseFillQuestion${this.id}">
					          ${this.num +' ' +this.name}
					        </button>
					      </h5>
					    </div>
					    <div id="collapseFillQuestion${this.id}" class="collapse " aria-labelledby="headingFillQuestion${this.id}" data-parent="#chooseGroup">
					      <div class="card-body">
					       
					      </div>
					    </div>
					   </div>`);

					$('#thirdPageAsk .overflow-auto').append(`
						<div class="card">
					    <div class="card-header" id="headingAskQuestion${this.id}">
					      <h5 class="mb-0">
					        <button type="" class="btn btn-link"  data-toggle="collapse" data-target="#collapseAskQuestion${this.id}" aria-expanded="true" aria-controls="collapseAskQuestion${this.id}">
					          ${this.num +' ' +this.name}
					        </button>
					      </h5>
					    </div>
					    <div id="collapseAskQuestion${this.id}" class="collapse " aria-labelledby="headingAskQuestion${this.id}" data-parent="#chooseGroup">
					      <div class="card-body">
					       
					      </div>
					    </div>
					   </div>`);



			});	
			getQuestion();
		}
	});

}

function checkSecondPage() {
	// var tmpSum = 0;
	$('#exampleModal .modal-title').html(`確認選題`);
	var question = new Object();
	// question['questionContent']  = '';
	$('[name="inputNum"]').each(function(eachid, eachdata) {
		question[$(eachdata).data('type')] = parseInt($(eachdata).val());
	});
	$('[name="inputScore"]').each(function(eachid, eachdata) {
		question[$(eachdata).data('type')] = parseInt($(eachdata).val());
	});
	if (!$('[name="exampleRadios"]').is(':checked')) {
		question['questionContent'] = '3';
	} else {
		question['questionContent'] = $('[name=exampleRadios]:checked').val();
	}

	
	$('[name="firstPageInput"]').each(function(eachid,eachdata){
		if(eachdata.name == 'firstPageInput'){
			question[$(eachdata).data('type')] = $(eachdata).val();
		}
		
	});
	question['selectUnit'] = data['unit'];
	$.ajax({
		url: '/test/checkSecondPage',
		type: 'POST',
		data: {
			data: JSON.stringify(question)
		},
		dataType: 'json',
		success: function(response) {
			if (response.status == 'success') {
				$('#exampleModal .modal-body').html(`
					${response.chooseAverage ==0?'':response.chooseAverage+'</br>'}
					${response.fillAverage ==0?'':response.fillAverage+'</br>'}
					${response.askAverage ==0?'':response.askAverage+'</br>'}`);
				$('#exampleModal .modal-footer').append(`<button type="button" class="btn btn-primary" id="tothirdPage">確定</button>`);
			} else if (response.status == 'failed') {
				$('#exampleModal .modal-body').html(response.content);
			}
			$('#tothirdPage').unbind().on('click', function() {
				$('#exampleModal').modal('hide');
				$( "#thirdPage-tab" ).attr( "class", "nav-link" );
				$('#thirdPage-tab').click();
				$('#formfield').submit();
				// data['questionContent'] = $('[name="exampleRadios"]:checked').val();
				data['questionType'] = question;
				console.log(data);
				AddChooseUnit();
				// getQuestion();
				

			});
		}
	});
}

function showUnit() {
	$('#exampleModal .modal-body').empty();
	$('#exampleModal .modal-title').html('選擇單元');
	$.ajax({
		url: '/test/selectunit',
		type: 'post',
		data: {
			data: JSON.stringify({
				unit: data['unit']
			}),
			_METHOD: 'PATCH'
		},
		success: function(response) {
			$('#exampleModal .modal-body').append(`
    		
				<div class="card" id="cardSelectUnit">
   				
					<div class="card-body overflow-auto" style="max-width: 464px; max-height: 65vh;" id="cardBodySelectChapter">
					</div>
					
				</div>`);
			//  	$.each( response.chapter, function( key, value ) {
			//   console.log(key,value);
			// });
			$.each(response.chapter, function(key, value) {
				console.log(this);
				$('#cardBodySelectChapter').append(`<div class="card" name="cardSelecttUnit" id='cartSelectUnit${key}' style="">
				    <div class="card-header" id="headingSelect${key}" >
				      <h5 class="mb-0">
				        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseSelect${key}" aria-expanded="true" aria-controls="collapseSelect${key}">
				            ${value}
				        </button>
				      </h5>
				    </div>
				    <div id="collapseSelect${key}" class="collapse show" aria-labelledby="headingSelect${key}" data-parent="#cardSelectUnit" >
				    	<div class="card-body" id="cardBodySelectUnit${key}">
				    		
				    	</div>
				    </div>
				   </div>`);
			});
			$(response.unit).each(function() {
				// console.log(this);
				$(`#cardBodySelectUnit${this.chapterID}`).append(`
    					${this.num} ${this.name}</br>
    			`);
			});
		}
	});
}

function deleteUnit(unitID) {
	$('#secondModal .modal-footer').append(`<button type="button" id="btnDeleteUnit" class="btn btn-primary" >確定</button>`);
	$('#secondModal .modal-body').append(`刪除此選項`);
	var unitIndex = chooseUnitID.indexOf(unitID);
	$('#btnDeleteUnit').unbind().on('click', function() {
		if (unitIndex > -1) {
			chooseUnitID.splice(unitIndex, 1);
			console.log($(`#cardBodySelectUnit${unitID}`));
			showUnit();
			$(`#cardBodySelectUnit${unitID}`).remove();
		}
		$('#secondModal').modal('hide');
	});
}

function chooseChapter() {
	$('#exampleModal .modal-body').empty();
	$('#exampleModal .modal-title').html('選擇範圍');
	$.ajax({
		url: '/test/chapter/' + chooseBookID,
		type: 'get',
		data: {
			data: JSON.stringify({})
		},
		success: function(response) {
			$('#exampleModal .modal-body').append(`
    		<div class="card" id="cardChapter">
    			<div class="card-header">
    				章
    			</div>
				  <div class="card-body overflow-auto" style=" max-height: 100px;" >
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
					<div class="card-body overflow-auto" style=" max-height: 150px;" id="cardBodyUnitAll">
					</div>
					<div class="card-footer text-right">
    				<button type="button" class="btn btn-primary btn-sm" id="beChooseUnit" >確定</button>
    			</div>
				</div>`);
			$(response.chapter).each(function() {
				$('#cardChapter').find(".card-body").append(`<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="${this.id}" id="chapterCheckBox${this.id}" name="chapterCheckBox">
					  <label class="form-check-label" for="chapterCheckBox${this.id}">
					   ${this.num} ${this.name}
					  </label>
					</div>`);
				$('#cardBodyUnitAll').append(`<div class="card" name="cartUnit" id='cartUnit${this.id}' style="display:none;">
				    <div class="card-header" id="heading${this.id}" >
				      <h5 class="mb-0">
				        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse${this.id}" aria-expanded="true" aria-controls="collapse${this.id}">
				            ${this.num} ${this.name}
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
			$(response.unit).each(function() {
				// console.log(this);
				$(`#cardBodyUnit${this.chapterID}`).append(`
			      	<div class="form-check">
							  <input class="form-check-input" type="checkbox" value="${this.id}" name="unitCheckBox" id="unitCheckBox${this.id}">
							  <label class="form-check-label" for="unitCheckBox${this.id}">
							    ${this.num} ${this.name}
							  </label>
							</div>
    			`);
			});
			$("#cardUnit").hide();

			$('#beChooseChapter').unbind().on('click', function() {
				$("#cardUnit").show();
				$('[ name="cartUnit" ]').hide();
				var choose = $("input[name=chapterCheckBox]:checked").map(function() {
					return $(this).val();
				}).get();
				$(choose).each(function(i) {
					var tmpChapter = parseInt(this);
					// console.log(tmpChapter);
					$(`#cartUnit${tmpChapter}`).show();
				});
				$(chooseUnitID).each(function() {
					// console.log($(`[name=unitCheckBox][value=${this.toString()}]`));
					// console.log(this.toString());
					$(`[name = unitCheckBox][value=${this.toString()}]`).attr('checked', 'checked');
				});

				var chooseChp = $("input[name=chapterCheckBox]:checked").map(function() {
					return $(this).val();
				}).get();
				chooseChapterID = [];
				$(chooseChp).each(function(i) {
					var tmpChapter = parseInt(this);
					chooseChapterID.push(tmpChapter);
				});
				console.log(chooseChapterID);
			});
			$('#beChooseUnit').unbind().on('click', function() {
				$('#exampleModal').modal('hide');
				$( "#thirdPage-tab" ).attr( "class", "nav-link disabled" );
				chooseUnitID = [];
				var choose = $("input[name=unitCheckBox]:checked").map(function() {
					return $(this).val();
				}).get();
				$(choose).each(function(i) {
					var tmpUnit = parseInt(this);
					chooseUnitID.push(tmpUnit);
				});
				data['unit'] = chooseUnitID;
				console.log(chooseUnitID);
			});
			if(chooseChapterID.length != 0){
				console.log(chooseChapterID);
				$(chooseChapterID).each(function() {
					console.log(this);
					
					$(`[name = chapterCheckBox][value=${this.toString()}]`).attr('checked', 'checked');
				});
				$('#beChooseChapter').click();
			}
		}
	});
}



function chooseAllChapterOnclick() {
	// console.log($('[name=chapterCheckBox]'));
	if ($('[name=chapterCheckBox]').prop('checked')) {
		$('[name=chapterCheckBox]').attr("checked", false);
	} else {
		$('[name=chapterCheckBox]').attr("checked", true);
	}
}

function chooseAllUnitOnclick(tmpId) {
	console.log($(`#cardBodyUnit${tmpId}`).find("[name=unitCheckBox]").length);
	console.log($(`#cardBodyUnit${tmpId}`).find("[name=unitCheckBox]").prop('checked'));
	if ($(`#cardBodyUnit${tmpId}`).find("[name=unitCheckBox]").prop('checked')) {
		$(`#cardBodyUnit${tmpId}`).find("[name=unitCheckBox]").attr("checked", false);
	} else {
		$(`#cardBodyUnit${tmpId}`).find("[name=unitCheckBox]").attr("checked", true);
	}
	console.log($(`#cardBodyUnit${tmpId}`).find("[name=unitCheckBox]").prop('checked'));
}

function chooseBook() {
	$('#exampleModal .modal-body').empty();
	$('#exampleModal .modal-title').html('選擇書本');
	$.ajax({
		url: '/test/book',
		type: 'get',
		data: {
			data: JSON.stringify({})
		},
		success: function(response) {
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
				  </div>`);
			$(response).each(function() {
				$('#groupBookName').append(`<button type="button" class="btn btn-primary btn-lg btn-block" data-bookid=${this.id} data-name="${this.name}" name="btnBook" onclick="chooseBookOnclick(this);">${this.name}</button>`);
			});
			var searchBook;
			$('#searchBookInput').unbind().on('keyup', function() {
				clearTimeout(searchBook);
				searchBook = setTimeout(function() {
					$('[name=btnBook]').each(function() {
						// console.log($(this).val());
						// console.log($('#searchBookInput').val());
						if ($(this).data('name').indexOf($('#searchBookInput').val()) > -1) {
							$(this).show();
						} else {
							$(this).hide();
						}
					});
				}, 300);
			});
		},
		error: function(jqXHR, textStatus, errorThrown) {
			console.log("failed");
		}
	});
}

function chooseBookOnclick(button) {
	$('#exampleModal').modal('hide');
	$( "#thirdPage-tab" ).attr( "class", "nav-link disabled" );
	$('#divTestRange').show();
	chooseBookID = $(button).data('bookid');
	$('#labelChooseBook').html($(button).data('name'));
}

</script>