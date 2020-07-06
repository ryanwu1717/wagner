<?php
  include('partial/header.php');
?>
<div class="card o-hidden shadow-lg py-5">
		<div class="card-head">
			<div class="col-md-12">
				<div class="text-center">
					<h1 class="font-weight-bold">自動命題</h1>
				</div>
			</div><br>
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a aria-controls="firstPage" aria-selected="true" class="nav-link active" data-toggle="tab" href="#firstPage" id="firstPage-tab" role="tab">建立試卷</a>
				</li>
				<li class="nav-item">
					<a aria-controls="secondPage" aria-selected="false" class="nav-link" data-toggle="tab" href="#secondPage" id="secondPage-tab" role="tab">題目挑選</a>
				</li>
				<li class="nav-item">
					<a aria-controls="contact" aria-selected="false" class="nav-link" data-toggle="tab" href="#thirdPage" id="contact-tab" role="tab">試題挑選</a>
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
									<label class="col-form-label col-md-4">測驗科目</label>
									<div class="col-md-8">
										<select class="custom-select" name="selectSubject" required="">
											<option disabled selected value="">
												請選擇
											</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-md-4">考試範圍 章</label>
									<div class="col-md-8">
										<select class="custom-select" name="selectStartUnit" required="">
											<option disabled selected value="">
												請選擇
											</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-md-4">到 章</label>
									<div class="col-md-8">
										<select class="custom-select" name="selectEndUnit" required="">
											<option disabled selected value="">
												請選擇
											</option>
										</select>
									</div>
								</div>
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
									<label class="col-form-label col-md-4">科別名稱</label>
									<div class="col-md-8">
										<select class="custom-select" name="selectDepartment" required="">
											<option disabled selected value="">
												請選擇
											</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-md-4">考試類別</label>
									<div class="col-md-8">
										<select class="custom-select" name="selectTestType" required="">
											<option disabled selected value="">
												請選擇
											</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
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
								</div>
								<div class="form-group row">
									<label class="col-form-label col-md-4">檔案名稱</label>
									<div class="col-md-8">
										<input class="form-control form-control-user" name="profileName" placeholder="ex.ＸＸＸ" required="" type="text">
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="d-flex justify-content-around">
									<button class="btn btn-primary btn-lg btn-block m-3" name="btnUpPage" onclick="location.href='function'" type="submit">上一頁</button> <button class="btn btn-primary btn-lg btn-block m-3" name="btnNextPage" type="submit">下一頁</button>
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
							<div class="col-md-6">
								<div class="col-md-12">
									<div class="text-center">
										<h3 class="font-weight-bold">題型內容</h3>
									</div>
								</div>
								<div class="form-group row">
									<div class="form-check">
										<input class="form-check-input" id="exampleRadios1" name="typeRadios" type="radio" value="&nbsp;一般試題"> <label class="form-check-label" for="defaultCheck1">&nbsp;一般試題</label>
									</div>
								</div>
								<div class="form-group row">
									<div class="form-check">
										<input class="form-check-input" id="exampleRadios1" name="typeRadios" type="radio" value="&nbsp;歷屆試題"> <label class="form-check-label" for="defaultCheck1">&nbsp;歷屆試題</label>
									</div>
								</div>
								<div class="form-group row">
									<div class="form-check">
										<input class="form-check-input" id="exampleRadios1" name="typeRadios" type="radio" value="一般試題＋&nbsp;歷屆試題"> <label class="form-check-label" for="defaultCheck1">&nbsp;一般試題＋&nbsp;歷屆試題</label>
									</div>
								</div>
								<div class="form-group row" id='isMix'>
									<label class="col-form-label col-md-3">一般試題比例</label>
									<div class="col-md-2">
										<input class="form-control form-control-user" name="schoolName" placeholder="ex.10" required="" type="text" value="0">
									</div><label class="col-form-label col-md-3">歷屆試題比例</label>
									<div class="col-md-2">
										<input class="form-control form-control-user" name="schoolName" placeholder="ex.10" required="" type="text" value="0">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="col-md-12">
									<div class="text-center">
										<h3 class="font-weight-bold">題型挑選</h3>
									</div>
								</div>
								<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
									<li class="nav-item">
										<a aria-controls="pills-choosetabContent" aria-selected="true" class="nav-link active" data-toggle="pill" href="#choosetabContent" id="" role="tab">選擇題</a>
									</li>
									<li class="nav-item">
										<a aria-controls="pills-profile" aria-selected="false" class="nav-link" data-toggle="pill" href="#filltabContent" id="pills-profile-tab" role="tab">填充題</a>
									</li>
									<li class="nav-item">
										<a aria-controls="pills-contact" aria-selected="false" class="nav-link" data-toggle="pill" href="#asktabContent" id="pills-contact-tab" role="tab">問答題</a>
									</li>
								</ul>
								<div class="tab-content" id="pills-tabContent">
									<div aria-labelledby="pills-home-tab" class="tab-pane fade show active" id="choosetabContent" role="tabpanel">
										<div class="form-group row">
											<!-- <label class="col-form-label col-md-2">選擇題</label> -->
											<label class="col-form-label col-md-2">題數</label>
											<div class="col-md-2">
												<input class="form-control form-control-user" name="schoolName" placeholder="ex.10" required="" type="text" value="0">
											</div><label class="col-form-label col-md-2">配分</label>
											<div class="col-md-2">
												<input class="form-control form-control-user" name="schoolName" placeholder="ex.10" required="" type="text" value="0">
											</div>
										</div>
										<div class="form-group row">
											<div class="col-md-1">
												<label class="col-form-label">難</label>
											</div>
											<div class="col-md-2">
												<input class="form-control form-control-user" name="schoolName" placeholder="ex.10" required="" type="text" value="0">
											</div>
											<div class="col-md-1">
												<label class="col-form-label">%</label>
											</div>
											<div class="col-md-1">
												<label class="col-form-label">中</label>
											</div>
											<div class="col-md-2">
												<input class="form-control form-control-user" name="schoolName" placeholder="ex.10" required="" type="text" value="0">
											</div>
											<div class="col-md-1">
												<label class="col-form-label">%</label>
											</div>
											<div class="col-md-1">
												<label class="col-form-label">易</label>
											</div>
											<div class="col-md-2">
												<input class="form-control form-control-user" name="schoolName" placeholder="ex.10" required="" type="text" value="0">
											</div>
											<div class="col-md-1">
												<label class="col-form-label">%</label>
											</div>
										</div>
									</div>
									<div aria-labelledby="pills-profile-tab" class="tab-pane fade" id="filltabContent" role="tabpanel">
										<div class="form-group row">
											<!-- <label class="col-form-label col-md-2">填充題</label> -->
											<label class="col-form-label col-md-2">題數</label>
											<div class="col-md-2">
												<input class="form-control form-control-user" name="schoolName" placeholder="ex.10" required="" type="text" value="0">
											</div><label class="col-form-label col-md-2">配分</label>
											<div class="col-md-2">
												<input class="form-control form-control-user" name="schoolName" placeholder="ex.10" required="" type="text" value="0">
											</div>
										</div>
										<div class="form-group row">
											<div class="col-md-1">
												<label class="col-form-label">難</label>
											</div>
											<div class="col-md-2">
												<input class="form-control form-control-user" name="schoolName" placeholder="ex.10" required="" type="text" value="0">
											</div>
											<div class="col-md-1">
												<label class="col-form-label">%</label>
											</div>
											<div class="col-md-1">
												<label class="col-form-label">中</label>
											</div>
											<div class="col-md-2">
												<input class="form-control form-control-user" name="schoolName" placeholder="ex.10" required="" type="text" value="0">
											</div>
											<div class="col-md-1">
												<label class="col-form-label">%</label>
											</div>
											<div class="col-md-1">
												<label class="col-form-label">易</label>
											</div>
											<div class="col-md-2">
												<input class="form-control form-control-user" name="schoolName" placeholder="ex.10" required="" type="text" value="0">
											</div>
											<div class="col-md-1">
												<label class="col-form-label">%</label>
											</div>
										</div>
									</div>
									<div aria-labelledby="pills-contact-tab" class="tab-pane fade" id="asktabContent" role="tabpanel">
										<div class="form-group row">
											<!-- <label class="col-form-label col-md-2">問答題</label> -->
											<label class="col-form-label col-md-2">題數</label>
											<div class="col-md-2">
												<input class="form-control form-control-user" name="schoolName" placeholder="ex.10" required="" type="text" value="0">
											</div><label class="col-form-label col-md-2">配分</label>
											<div class="col-md-2">
												<input class="form-control form-control-user" name="schoolName" placeholder="ex.10" required="" type="text" value="0">
											</div>
										</div>
										<div class="form-group row">
											<div class="col-md-1">
												<label class="col-form-label">難</label>
											</div>
											<div class="col-md-2">
												<input class="form-control form-control-user" name="schoolName" placeholder="ex.10" required="" type="text" value="0">
											</div>
											<div class="col-md-1">
												<label class="col-form-label">%</label>
											</div>
											<div class="col-md-1">
												<label class="col-form-label">中</label>
											</div>
											<div class="col-md-2">
												<input class="form-control form-control-user" name="schoolName" placeholder="ex.10" required="" type="text" value="0">
											</div>
											<div class="col-md-1">
												<label class="col-form-label">%</label>
											</div>
											<div class="col-md-1">
												<label class="col-form-label">易</label>
											</div>
											<div class="col-md-2">
												<input class="form-control form-control-user" name="schoolName" placeholder="ex.10" required="" type="text" value="0">
											</div>
											<div class="col-md-1">
												<label class="col-form-label">%</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="d-flex justify-content-around">
									<button class="btn btn-primary btn-lg btn-block m-3" name="btnUpPage" onclick="location.href='function'" type="submit">回首頁</button> <button class="btn btn-primary btn-lg btn-block m-3" name="btnNextPage" type="submit">下一頁</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div aria-labelledby="contact-tab" class="tab-pane fade" id="thirdPage" role="tabpanel">
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
										<li class="list-group-item"><!-- <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"> -->
										Cras justo odio</li>
										<li class="list-group-item"><!-- <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"> -->
										Cras justo odio</li>
										<li class="list-group-item"><!-- <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"> -->
										Cras justo odio</li>
									</ul>
								</div>
							</div>
							<div aria-labelledby="pills-profile-tab" class="tab-pane fade" id="thirdPageFill" role="tabpanel">
								填充題
								<div class="overflow-auto" style="max-width: 800px; max-height: 300px;">
									<ul class="list-group list-group-flush overflow-auto">
										<li class="list-group-item"><!-- <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"> -->
										Cras justo odio</li>
										<li class="list-group-item"><!-- <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"> -->
										Dapibus ac facilisis in</li>
										<li class="list-group-item"><!-- <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">Morbi leo risus --></li>
									</ul>
								</div>
							</div>
							<div aria-labelledby="pills-contact-tab" class="tab-pane fade" id="thirdPageAsk" role="tabpanel">
								問答題
								<div class="overflow-auto" style="max-width: 800px; max-height: 300px;">
									<ul class="list-group list-group-flush overflow-auto">
										<li class="list-group-item"><!-- <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"> -->
										Cras justo odio</li>
										<li class="list-group-item"><!-- <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"> -->
										Dapibus ac facilisis in</li>
										<li class="list-group-item"><!-- <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">Morbi leo risus --></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="d-flex justify-content-around">
								<button class="btn btn-primary btn-lg btn-block m-3" name="btnUpPage" onclick="location.href='function'" type="submit">回首頁</button> <button class="btn btn-primary btn-lg btn-block m-3" name="btnNextPage" onclick="location.href='makeTest'" type="submit">完成</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php
  include('partial/footer.php');
?>

<script type='text/javascript'>
$('#isMix').hide();

$('[name="typeRadios"]').change(function(){
    if ($(this).is(':checked') && this.value == "一般試題＋ 歷屆試題") {
        $('#isMix').show();
    }else{
    	$('#isMix').hide();
    }
 });
 
</script>


