@extends('layouts.master')
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('title')
إضافة الصادر
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الصادر والوارد</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إضافة الصادر</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
	<!-- Start Content -->
						<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
								</div>
								<div id="wizard1">
									<h3>إضافة البيانات الأساسية</h3>
									<section>
										<div class="control-group form-group">
											<label class="form-label">الباركود</label>
											<input type="text" class="form-control required" placeholder="الباركود">
										</div>
										<div class="control-group form-group">
											<label class="form-label">التاريخ</label>
											<input type="date" class="form-control required" placeholder="إختر التاريخ">
										</div>
										<div class="control-group form-group">
											<label class="form-label">العنوان</label>
											<input type="text" class="form-control required" placeholder="العنوان">
										</div>
										<!--test-->
										<div class="control-group form-group">
										<label class="form-label">إختر الجهة المستلمة</label>
										<select class="form-control select2">
											<option label="إختر الجهة">
											</option>
											<option value="Firefox">
												Firefox
											</option>
											<option value="Chrome">
												Chrome
											</option>
											<option value="Safari">
												Safari
											</option>
											<option value="Opera">
												Opera
											</option>
											<option value="Internet Explorer">
												Internet Explorer
											</option>
										</select>
									</div><!-- col-4 -->
										<!--ent test-->
										<div class="control-group form-group">
											<label class="form-label">إضافة المستندات</label>
											<div class="custom-file">
												<input class="custom-file-input" id="customFile" type="file"> <label class="custom-file-label" for="customFile">إختر المستندات</label>
											</div>
										</div>
										<div class="control-group form-group">
											<label class="form-label">عدد الخرط</label>
											<input type="number" class="form-control required" placeholder="عدد الخرط">
										</div>
										<div class="control-group form-group">
											<label class="form-label">الملاحظات</label>
											<textarea class="form-control" placeholder="الملاحظات" rows="3"></textarea>
									</div>
									</section>
									<h3>إضافة بيانات الخرط</h3>
									<section>
										<div class="table-responsive mg-t-20">
											<div class="control-group form-group">
											<form action="" method="post">
											{{ csrf_field() }}
                          					<div class="table-responsive">  
												<table class="table table-bordered" id="dynamic_field">  
												<tr>  
												<td><label class="form-label">إختر حجم الخريطة</label></td>  
												<td>
												<label class="form-label">إضافة الخريمة</label>
												</td>
												<td><label class="form-label">إضافة / حذف</label></td> 
												</tr>  
												<tr>  
												<td><select class="form-control select2">
													<option label="إختر حجم الخريطة">
													</option>
													<option value="Firefox">
														Firefox
													</option>
													<option value="Chrome">
														Chrome
													</option>
													<option value="Safari">
														Safari
													</option>
													<option value="Opera">
														Opera
													</option>
													<option value="Internet Explorer">
														Internet Explorer
													</option>
													</select>
												</td>  
												<td>
												<div class="custom-file">
												<input class="custom-file-input" id="customFile" type="file"> <label class="custom-file-label" for="customFile">إختر الخريطة</label>
											</div>
												</td>
												<td><button type="button" name="add" id="add" class="btn btn-success">+</button></td>
												</tr>  
												</table>  
												<input type="submit" name="submit" id="submit" class="btn btn-info" value="حفظ" />  
                          					</div>  
                    					</form> 
									</section>
								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- /row -->
	<!-- End Content  -->
@endsection
@section('js')
<!--Internal  Select2 js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Jquery.steps js -->
<script src="{{URL::asset('assets/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!--Internal  Form-wizard js -->
<script src="{{URL::asset('assets/js/form-wizard.js')}}"></script>
<script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><select class="form-control select2"><option label="إختر الجهة"></option><option value="Firefox">Firefox</option><option value="Chrome">Chrome</option></select></td><td><div class="custom-file"><input class="custom-file-input" id="customFile" type="file"> <label class="custom-file-label" for="customFile">إختر المستندات</label></div></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      
 });  
 </script>
@endsection