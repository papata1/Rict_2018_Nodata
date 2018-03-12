<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.4 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- start: HEAD -->
<head>
	<title>EA DOCUMENT REPOSITORY</title>
	<!-- start: META -->
	<meta charset="utf-8" />
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- end: META -->
	<!-- start: MAIN CSS -->
	<link rel="stylesheet" href="{{ URL::asset('css/theme/plugins/bootstrap/css/bootstrap.min.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('css/theme/plugins/font-awesome/css/font-awesome.min.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('css/theme/fonts/style.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('css/theme/css/main.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('css/theme/css/main-responsive.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('css/theme/plugins/iCheck/skins/all.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('css/theme/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('css/theme/plugins/perfect-scrollbar/src/perfect-scrollbar.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('css/theme/css/theme_light.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('css/theme/css/print.css') }}" >
		<link rel="shortcut icon" href="{{ URL::asset('images/kmutnb.ico') }}" />

		<!--[if IE 7]>
		<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome-ie7.min.css">
		<![endif]-->
		<!-- end: MAIN CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body>
		<div class="page-container container">
			<div class="form-group">
				<center>{!! Html::image('images\banner.jpg') !!}</center>
			</div>
			<div style="text-align:center">
				@include('front.topnav')
			</div> 
			<!-- start: MAIN CONTAINER -->
			<div class="main-container">
				<!-- start: PAGE -->
				<!-- /.modal -->
				<!-- end: SPANEL CONFIGURATION MODAL FORM -->
				<div class="container">

					<!-- start: PAGE CONTENT -->
					<div class="row">
						<div class="col-md-12">
							<!-- start: RESPONSIVE TABLE PANEL -->
							<div class="panel panel-default">
								@foreach($model as $modell)
								<div class="panel-heading">
									<a href="<?php echo url('main/App'); ?>"> ระบบสารสนเทศ</a> > {{ $modell->alname }}
								</div>
								<div class="panel-body">
									<div class="table-responsive">
										<!-- Start: table content -->
										<table class="table table-bordered table-hover" id="sample-table-1">
											<tr><td class="col-lg-3">รหัส</td><td>{{ $modell->pfix }}{{ $modell->alid }}</td></tr>
											<tr><td>ชื่อ</td><td>{{ $modell->alname }}</td></tr>
											<tr><td>>ประเภทของระบบ</td><td>{{ $modell->category }}</td></tr>
											<tr><td>หน่วยงานที่รับผิดชอบ</td><td>
												@foreach($model9 as $modell9)
													 {{$modell9->dpname}}<br>
													@endforeach
											</td></tr>
											<tr><td>ภาษาที่ใช้พัฒนา</td>
												<td>
													@foreach($model3 as $modell3)
													- {{$modell3->laname}}<br>
													@endforeach
												</td>
											</tr>
											<tr><td>เทคโนโลยีที่เกี่ยวข้อง</td>
												<td>
												@foreach($liste2 as $row)
												<a href="<?php echo url('main/TecDetail/'. $row["serid"] ); ?>">
												- {{$row["sername"]}}</a><br>
												@endforeach
												</td>
											</tr>
											<tr><td>ฐานข้อมูล</td>
												<td>
													@foreach($model5 as $modell5)
													- {{$modell5->dbname}}<br>
													@endforeach
												</td>
											</tr>
											<tr><td>บริษัทที่พัฒนา</td>
												<!-- <td>
													@foreach($model6 as $modell6)
													- {{$modell6->cname}}<br>
													@endforeach
												</td> -->
												<td>{{ $modell->develop_company}}</td>
											</tr>
											<tr><td>ปีที่เริ่มใช้งาน</td><td>{{ $modell->getting_start_years }}</td></tr>
											<tr><td>ระบบสารสนเทศที่เกี่ยวข้อง</td><td>
												@foreach($model2 as $modell2)
												<a href="<?php echo url('main/AppDetail/'. $modell2->alid ); ?>">
													- {{ $modell2-> alname}}</a><br>
													@endforeach
												</td>
											</tr>
										
											<tr><td>ข้อมูลที่เกี่ยวข้อง</td>
												<td>
												@foreach($liste as $row)
												<a href="<?php echo url('main/DatDetail/'. $row["dlid"] ); ?>">- {{$row["dlname"]}}</a><br>
												@endforeach
												</td>
											</tr>

											<tr><td>หน่วยงานที่เกี่ยวข้อง</td>
												<td>
													@foreach($model10 as $modell10)
													- {{$modell10->dpname}}<br>
													@endforeach
												</td>
											</tr>

											<tr><td>ค่าซ่อมบำรุง</td><td>{{ $modell->ma_cost }}</td></tr>
											<tr><td>รายละเอียด</td><td>{{ $modell->alremark }}</td></tr>
											<tr><td width="200">สถานะ</td><td>{{ $modell->state }}</td></tr>

											<tr><td colspan="2">

												<a class="button btn btn-success" 

												<?php if($modell->data!=NULL){
													echo 'onclick="dload()"';
												}?>

												<?php if($modell->data==NULL){
													echo 'onclick="nothing()"';
												}?>
												>ER-Diagram</a>

												<a class="button btn btn-success" 

												<?php if($modell->dic!=NULL){
													echo 'onclick="d2load()"';
												}?>

												<?php if($modell->dic==NULL){
													echo 'onclick="nothing()"';
												}?>
												>Data Dictionary</a>

												<a class="button btn btn-success" 

												<?php if($modell->pic!=NULL){
													echo 'onclick="pic()"';
												}?>

												<?php if($modell->pic==NULL){
													echo 'onclick="nothing()"';
												}?>
												>รูปหน้าจอ</a>

											</td>
										</tr>
									</table></center>

									<!-- End: table content -->
								</div>
							</div>
						</div>
						<!-- end: RESPONSIVE TABLE PANEL -->
					</div>
				</div>
				<!-- end: PAGE CONTENT-->
			</div>
		</div>
		<!-- end: PAGE -->
		<!-- end: MAIN CONTAINER -->
	</div>
	<!-- start: MAIN JAVASCRIPTS -->
	<script src="{{ URL::asset('css/theme/plugins/jQuery-lib/2.0.3/jquery.min.js') }}"></script>
	<!--<![endif]-->
	<script src="{{ URL::asset('css/theme/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js') }}"></script>
	<script src="{{ URL::asset('css/theme/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('css/theme/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}"></script>
	<script src="{{ URL::asset('css/theme/plugins/blockUI/jquery.blockUI.js') }}"></script>
	<script src="{{ URL::asset('css/theme/plugins/iCheck/jquery.icheck.min.js') }}"></script>
	<script src="{{ URL::asset('css/theme/plugins/perfect-scrollbar/src/jquery.mousewheel.js') }}"></script>
	<script src="{{ URL::asset('css/theme/plugins/perfect-scrollbar/src/perfect-scrollbar.js') }}"></script>
	<script src="{{ URL::asset('css/theme/plugins/less/less-1.5.0.min.js') }}"></script>
	<script src="{{ URL::asset('css/theme/plugins/jquery-cookie/jquery.cookie.js') }}"></script>
	<script src="{{ URL::asset('css/theme/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js') }}"></script>
	<script src="{{ URL::asset('css/theme/js/main.js') }}"></script>

	<!-- end: MAIN JAVASCRIPTS -->
	<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<script>
		jQuery(document).ready(function() {
			Main.init();
		});

		function nothing() {
			alert("ไม่พบข้อมูล");
		}
	</script>
	<script>
		function pic() {
			Image = window.open('{{ URL::to('/') }}/images/app/{{ $modell->pic }}','Image');
		}
	</script>
	<script>
		function dload() {
			window.location="{{ asset('/downloaddat/'.$modell->data) }}";
		}
	</script>
	<script>
		function d2load() {
			window.location="{{ asset('/downloaddat/'.$modell->dic) }}";
		}
	</script>
	@endforeach
</body>
<!-- end: BODY -->
</html>
