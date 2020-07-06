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
										<input class="form-control form-control-user" name="schoolName" placeholder="ex.國立高雄師範大學" required="" type="text">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-md-4">考試科目</label>
									<div class="col-md-8">
										<input class="form-control form-control-user" name="schoolName" placeholder="ex.計算機概論" required="" type="text">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-md-4">考試範圍</label>
									<div class="col-md-6">
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
										  請選擇
										</button>
									</div>
									<div class="col-md-2">
										<button type="button" class="btn btn-primary" data-id="A10000" data-toggle="modal" data-target="#basicModal"><i class="far fa-eye"></i></button>
									</div>
								</div>
								<!-- <div class="form-group row">
									<label class="col-form-label col-md-4">到 章</label>
									<div class="col-md-8">
										<select class="custom-select" name="selectEndUnit" required="">
											<option disabled selected value="">
												請選擇
											</option>
										</select>
									</div>
								</div> -->
								<div class="form-group row">
									<label class="col-form-label col-md-4">試卷尺寸</label>
									<div class="col-md-8">
										<select class="custom-select" name="selectSize" required="">
											<option disabled selected value="">
												請選擇
											</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<label class="col-form-label col-md-4">科系名稱</label>
									<div class="col-md-8">
										<input class="form-control form-control-user" name="schoolName" placeholder="ex.軟體工程與管理學系" required="" type="text">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-md-4">考試名稱</label>
									<div class="col-md-8">
										<input class="form-control form-control-user" name="schoolName" placeholder="ex.第一次期末考" required="" type="text">
									</div>
								</div>
								<!-- <div class="form-group row">
									<label class="col-form-label col-md-4">節</label>
									<div class="col-md-8">
										<select class="custom-select" name="selectStartChapter" required="">
											<option disabled selected value="">
												請選擇
											</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-md-4">節</label>
									<div class="col-md-8">
										<select class="custom-select" name="selectEndChapter" required="">
											<option disabled selected value="">
												請選擇
											</option>
										</select>
									</div>
								</div> -->
								<div class="form-group row">
									<label class="col-form-label col-md-4">檔案名稱</label>
									<div class="col-md-8">
										<input class="form-control form-control-user" name="profileName" placeholder="ex.ＸＸＸ" required="" type="text">
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="d-flex justify-content-around">
									<!-- <button class="btn btn-primary btn-lg btn-block m-3" name="btnUpPage" onclick="location.href='function'" type="submit">上一頁</button>  -->
									<button class="btn btn-primary btn-lg btn-block m-3" name="btnNextPage" type="submit">下一步</button>
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
	      		<div class="card" >
						  <div class="card-body overflow-auto" style="max-width: 221px; max-height: 300px;">
						    <h5 class="card-title">章</h5>
						    <div class="form-check">
								  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								  <label class="form-check-label" for="defaultCheck1">
								    第一章 ＸＸＸＸＸＸＸＸＸＸ
								  </label>
								</div>	
								<div class="form-check">
								  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								  <label class="form-check-label" for="defaultCheck1">
								    第二章 ＸＸＸ
								  </label>
								</div>
								<div class="form-check">
								  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								  <label class="form-check-label" for="defaultCheck1">
								    第三章 ＸＸＸ
								  </label>
								</div>
						  </div>
	      	</div>
	      		<div class="card" >
						  <div class="card-body">
						    <h5 class="card-title">節</h5>
						    <div id="accordion">
								  <div class="card">
								    <div class="card-header" id="headingOne">
								      <h5 class="mb-0">
								        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								           第一章
								        </button>
								      </h5>
								    </div>

								    <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
								      <div class="card-body">
								      	<div class="form-check">
												  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
												  <label class="form-check-label" for="defaultCheck1">
												    1.XXX
												  </label>
												</div>
								      </div>
								    </div>
								    <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
								     <div class="card-body">
								      	<div class="form-check">
												  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
												  <label class="form-check-label" for="defaultCheck1">
												    2.XXX
												  </label>
												</div>
								      </div>
								  </div>
								  <div class="card">
								    <div class="card-header" id="headingTwo">
								      <h5 class="mb-0">
								        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								          第二章
								        </button>
								      </h5>
								    </div>
								    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								      <div class="card-body">
								        第一節
								      </div>
								    </div>
								  </div>
								  <div class="card">
								    <div class="card-header" id="headingThree">
								      <h5 class="mb-0">
								        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								          第三章
								        </button>
								      </h5>
								    </div>
								    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								      <div class="card-body">
								        第一節
								      </div>
								    </div>
								  </div>
								</div>
						  </div>
						</div>
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
   
</script>