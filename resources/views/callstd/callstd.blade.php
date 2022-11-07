@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--- Internal Sweet-Alert css-->
    <link href="{{URL::asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
@endsection
@section('title')
إدارة الطلاب
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الإعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إدارة الطلاب  </span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session()->has('Add'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('Add') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session()->has('delete'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('delete') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session()->has('edit'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('edit') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
				<!-- row -->
<div class="row">
	<div class="col-xl-12">
		<div class="card mg-b-20">

			<div class="card-header pb-0">
				<div class="d-flex justify-content-between">
					<div class="d-flex justify-content-between">
						@can('إدارة الطلاب')
						<a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
						data-toggle="modal" href="#modaldemo8"> </a>
						@endcan
                	</div>
				</div>
        <div class="card-body center" >
          @foreach ($student as $x)
          <div class="main-img-user avatar-xxl d-none d-sm-block"><img alt="avatar" class="rounded-circle" src="user_id/school-student-icon-18.png"></div>
            <p><h4 class="content-title mb-0 my-auto"><p>{{ $x->student_name }}</p></h4>
            <p><h4 class="content-title mb-0 my-auto">{{ $x->student_nameen }}</h4></p>
            <p><h4 class="content-title mb-0 my-auto">{{ $x->Semester }}</h4></p>
          </div>
         @endforeach


					<div class="table-responsive">
						<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">#</th>
                        <th class="wd-10p border-bottom-0">إسم الطالب</th>
                        <th class="wd-10p border-bottom-0">Student Name</th>
                        <th class="wd-10p border-bottom-0"> الرقم الشخصي</th>
												<th class="wd-10p border-bottom-0">إسم المدرسة</th>
                        <th class="wd-25p border-bottom-0">المرحلة التعليمية </th>
                        <th class="wd-25p border-bottom-0">صورة الطالب</th>
                        <th class="wd-25p border-bottom-0">الملاحظات </th>

											</tr>
										</thead>
										<tbody>
										<?php $i = 0; ?>
                    @foreach ($student as $x)
                               			 <?php $i++; ?>
											<tr>
											<td>{{ $i }}</td>
                      <td>{{ $x->student_name }}</td>
                      <td>{{ $x->student_nameen }}</td>
                      <td>{{ $x->student_idno}}</td>
                      <td>{{ $x->school_name}}</td>
                      <td>{{ $x->edu_level }}</td>
                      <td>{{ $x->Semester }}</td>
                      <td>{{ $x->student_img_path }}</td>
                      <td>{{ $x->description }}</td>
											</tr>
                      @endforeach
										</tbody>
								</table>

								</div>
							</div>
						</div>
					</div>
				</div>
</div>
</div>

<!-- Start Add Form -->

@endsection

@section('js')
<!-- Internal Data tables -->
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>
<!--Internal  Sweet-Alert js-->
<script src="{{URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/sweet-alert/jquery.sweet-alert.js')}}"></script>
<!-- Sweet-alert js  -->
<script src="{{URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{URL::asset('assets/js/sweet-alert.js')}}"></script>

<script>
    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var student_namee = button.data('student_name')
        var student_nameen = button.data('student_nameen')
        var school_phone = button.data('school_phone')
        var school_name  = button.data('school_name')
        var description = button.data('description')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #school_name').val(school_name);
        modal.find('.modal-body #student_nameen').val(student_nameen);
        modal.find('.modal-body #school_phone').val(school_phone);
        modal.find('.modal-body #school_name').val(school_name);
        modal.find('.modal-body #description').val(description);
    })

</script>

<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var student_name = button.data('student_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #student_name').val(student_name);
    })

</script>

@endsection
