@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
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
        <div class="card-body">

						<a class="btn ripple btn-primary" data-target="#exampleModal" data-toggle="modal" href=""> إضافة الطالب</a>
				</div>

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
												<th class="border-bottom-0">العمليات</th>
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
											<td>

                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                data-id="{{ $x->id }}" data-student_name="{{ $x->student_name }}"
                                                data-student_nameen="{{ $x->student_nameen }}" data-student_idno="{{ $x->student_idno }}"
                                                data-school_name="{{ $x->school_name }}" data-edu_level="{{ $x->edu_level }}"
                                                data-Semester="{{ $x->Semester }}" data-rfid="{{ $x->rfid }}" data-student_img_path="{{ $x->student_img_path }}"
                                                data-description="{{ $x->description }}" data-toggle="modal"
                                                href="#exampleModal2" title="تعديل"><i class="las la-pen"></i></a>



                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-id="{{ $x->id }}" data-student_name="{{ $x->student_name }}"
                                                data-toggle="modal" href="#modaldemo9" title="حذف"><i
                                                    class="las la-trash"></i></a>

                                    </td>
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
<!-- add -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> إضافة الطالب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form action="{{ route('student.store')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">اسم الطالب</label>
                        <input type="text" class="form-control" id="student_name" name="student_name" required  >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Student Nmae En</label>
                        <input type="text" class="form-control" id="student_nameen" name="student_nameen" required  >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">الرقم الشخصي</label>
                        <input type="text" class="form-control" id="student_idno" name="student_idno" required  >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> المدرسة</label>

                        <input class="form-control" value="{{$school}}" placeholder="{{$school}}" readonly type="text" id="school_name" name="school_name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> المرحلة التعليمية</label>
                        <input class="form-control" value="{{$recipient}}" placeholder="{{$recipient}}" readonly type="text" readonly type="text" id="edu_level" name="edu_level">
                    </div>
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">الصف</label>
                    <select name="Semester" id="Semester" class="form-control" required>
                        <option value="" selected disabled>--إختر الصف --</option>
                        @foreach ($map_size as $y)
                            <option value="{{ $y->mapsizes_name}}">{{ $y->mapsizes_name}}</option>
                        @endforeach
                    </select>
                    <div class="form-group">
                        <label for="exampleInputEmail1">RFID CARD</label>
                        <input type="text" class="form-control" id="rfid" name="rfid" required  >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> صورة الطالب </label>
                        <input type="text" class="form-control" id="student_img_path" name="student_img_path" required  >
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">ملاحظات</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">تاكيد</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end add -->
<!--End Add Form-->
<!--Start Edit Form-->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل أسم المدرسة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="school.update" method="post" autocomplete="off">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">اسم الطالب</label>
                            <input type="text" class="form-control" id="student_name" name="student_name" required  >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Student Nmae En</label>
                            <input type="text" class="form-control" id="student_nameen" name="student_nameen" required  >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">الرقم الشخصي</label>
                            <input type="text" class="form-control" id="student_idno" name="student_idno" required  >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> المدرسة</label>
                            <input class="form-control" placeholder="{{$school}}" readonly type="text" id="school_name" name="school_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> المرحلة التعليمية</label>
                            <input class="form-control" placeholder="{{$recipient}}"  readonly type="text" id="edu_level" name="edu_level">
                        </div>
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">الصف</label>
                        <select name="Semester" id="Semester" class="form-control" required>
                            <option value="" selected disabled>--إختر الصف --</option>
                            @foreach ($map_size as $y)
                                <option value="{{ $y->id }}">{{ $y->mapsizes_name}}</option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> صورة الطالب </label>
                            <input type="text" class="form-control" id="student_img_path" name="student_img_path" required  >
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">ملاحظات</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">تاكيد</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<!--End edit Form-->
<!--Start Delete Form-->
<div class="modal" id="modaldemo9">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف  الصف</h6><button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="school/destroy" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="student_nameen" id="student_nameen" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
            </div>
            </form>
        </div>
    </div>

<!--End Delete Form-->
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
<script src="{{ mix('js/app.js') }}"></script>

@endsection
