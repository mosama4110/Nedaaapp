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
إدارة المدارس
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الإعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/إدارة المدارس  </span>
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
						@can('إدارة المدارس')
						<a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
						data-toggle="modal" href="#modaldemo8">إدارة المدارس</a>
						@endcan
                	</div>
				</div>
        <div class="card-body">

						<a class="btn ripple btn-primary" data-target="#exampleModal" data-toggle="modal" href="">إضافة المدارس</a>
				</div>

					<div class="table-responsive">
						<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">#</th>
												<th class="wd-10p border-bottom-0">إسم المدرسة</th>
                        <th class="wd-25p border-bottom-0">المرحلة التعليمية </th>
                        <th class="wd-15p border-bottom-0">نوع المدرسة</th>
												<th class="wd-10p border-bottom-0">رقم الهاتف</th>
                        <th class="wd-25p border-bottom-0">العنوان</th>
                        <th class="wd-25p border-bottom-0">الشعار</th>
                        <th class="wd-25p border-bottom-0">الملاحظات </th>
												<th class="border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody>
										<?php $i = 0; ?>
                      @foreach ($school as $x)
                               			 <?php $i++; ?>
											<tr>
											<td>{{ $i }}</td>
                      <td>{{ $x->school_name }}</td>
                      <td>{{ $x->school->recipient_name}}</td>
                      <td>{{ $x->school_type }}</td>
                      <td>{{ $x->school_phone }}</td>
                      <td>{{ $x->school_add }}</td>
                      <td>{{ $x->profile_logo_path}}</td>
                      <td>{{ $x->description }}</td>
											<td>

                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                data-id="{{ $x->id }}" data-school_name="{{ $x->school_name }}"
                                                data-school_type="{{ $x->school_type }}" data-school_phone="{{ $x->school_phone }}"
                                                data-school_add="{{ $x->school_add }}" data-description="{{ $x->description }}" data-toggle="modal"
                                                href="#exampleModal2" title="تعديل"><i class="las la-pen"></i></a>



                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-id="{{ $x->id }}" data-school_name="{{ $x->school_name }}"
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
                <h5 class="modal-title" id="exampleModalLabel"> إضافة المدارس</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form action="{{ route('school.store')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">إسم المدارس</label>
                        <input type="text" class="form-control" id="school_name" name="school_name" required  >
                    </div>

                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">المرحلة التعليمية</label>
                    <select name="section_id" id="section_id" class="form-control" required>
                        <option value="" selected disabled>--إختر المرحلة التعليمية--</option>
                        @foreach ($recipient as $y)
                            <option value="{{ $y->id }}">{{ $y->recipient_name }}</option>
                        @endforeach
                    </select>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> نوع المدرسة</label>
                        <input type="text" class="form-control" id="school_type" name="school_type" required  >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">رقم الهاتف</label>
                        <input type="text" class="form-control" id="school_phone" name="school_phone" required  >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> عنوان المدرسة </label>
                        <input type="text" class="form-control" id="school_add" name="school_add" required  >
                    </div>
                    <div class="form-group">
                      <div class="form-group">
                          <label for="exampleInputEmail1"> شعار المدرسة </label>
                          <input type="text" class="form-control" id="profile_logo_path" name="profile_logo_path" required  >
                      </div>
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

                    <form action="school/update" method="post" autocomplete="off">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="">
                            <label for="school_name" class="col-form-label">اسم المدرسة:</label>
                            <input class="form-control" name="school_name" id="school_name" type="text">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="">
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">المرحلة التعليمية</label>
                            <select name="section_id" id="section_id" class="form-control" required>
                                <option value="" selected disabled>--إختر المرحلة التعليمية--</option>
                                @foreach ($recipient as $y)
                                    <option value="{{ $y->id }}">{{ $y->recipient_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">نوع المدرسة:</label>
                            <input class="form-control" name="school_type" id="school_type" type="text">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">رقم الهاتف :</label>
                            <input class="form-control" name="school_phone" id="school_phone" type="text">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">عنوان المدرسة:</label>
                            <input class="form-control" name="school_add" id="school_add" type="text">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">شعار المدرسة:</label>
                            <input class="form-control" name="profile_logo_path" id="profile_logo_path" type="text">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">ملاحظات:</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
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
                        <input class="form-control" name="school_name" id="school_name" type="text" readonly>
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
        var school_name = button.data('school_name')
        var school_type = button.data('school_type')
        var school_phone = button.data('school_phone')
        var school_add  = button.data('school_add')
        var description = button.data('description')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #school_name').val(school_name);
        modal.find('.modal-body #school_type').val(school_type);
        modal.find('.modal-body #school_phone').val(school_phone);
        modal.find('.modal-body #school_add').val(school_add);
        modal.find('.modal-body #description').val(description);
    })

</script>

<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var school_name = button.data('school_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #school_name').val(school_name);
    })

</script>

@endsection
