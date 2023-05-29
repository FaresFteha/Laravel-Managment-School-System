@extends('layouts.master')
@section('css')
    @toastr_css
    {{--
    <link rel="stylesheet" href="{{ asset('assets/select2/css/select2.min.css') }}">
    --}}
@endsection
@section('title')
    {{ trans('Sections_trans.title_page') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ trans('Sections_trans.title_page') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_siadebar_trans.Home') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Sections_trans.title_page') }}</li>
                </ol>
            </div>

        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                @can('اضافة الاقسام')
                    <div class="card-body">
                        <a class="button x-small" href="#" data-toggle="modal" data-target="#exampleModal">
                            {{ trans('Sections_trans.add_section') }}</a>
                    </div>
                @elsecan('Add Sections')
                    <div class="card-body">
                        <a class="button x-small" href="#" data-toggle="modal" data-target="#exampleModal">
                            {{ trans('Sections_trans.add_section') }}</a>
                    </div>
                @endcan


                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="accordion gray plus-icon round">

                            @foreach ($Grades as $Grade)
                                <div class="acd-group">
                                    <a href="#" class="acd-heading">{{ $Grade->name }}</a>
                                    <div class="acd-des">

                                        <div class="row">
                                            <div class="col-xl-12 mb-30">
                                                <div class="card card-statistics h-100">
                                                    <div class="card-body">
                                                        <div class="d-block d-md-flex justify-content-between">
                                                            <div class="d-block">
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive mt-15">
                                                            <table class="table center-aligned-table mb-0">
                                                                <thead>
                                                                    <tr class="text-dark">
                                                                        <th>#</th>
                                                                        <th>{{ trans('Sections_trans.Name_Section') }}
                                                                        </th>
                                                                        <th>{{ trans('Sections_trans.Name_Class') }}</th>
                                                                        <th>{{ trans('Sections_trans.Status') }}</th>
                                                                        <th>{{ trans('Sections_trans.Processes') }}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    @foreach ($Grade->Sections as $list_Sections)
                                                                        <tr>
                                                                            <td>{{ $loop->index + 1 }}</td>
                                                                            <td>{{ $list_Sections->name_sections }}</td>
                                                                            <td>{{ $list_Sections->Classrooms->name_class }}
                                                                            </td>
                                                                            <td>
                                                                                @if ($list_Sections->status === 1)
                                                                                    <label
                                                                                        class="badge badge-success">{{ trans('Sections_trans.Status_Section_AC') }}</label>
                                                                                @else
                                                                                    <label
                                                                                        class="badge badge-danger">{{ trans('Sections_trans.Status_Section_No') }}</label>
                                                                                @endif
                                                                            </td>
                                                                            <td>
                                                                                @can('تعديل الاقسام')
                                                                                    <a href="#"
                                                                                        class="btn btn-outline-info btn-sm"
                                                                                        data-toggle="modal"
                                                                                        data-target="#edit{{ $list_Sections->id }}">{{ trans('Sections_trans.Edit') }}</a>
                                                                                @elsecan('Edit Sections')
                                                                                    <a href="#"
                                                                                        class="btn btn-outline-info btn-sm"
                                                                                        data-toggle="modal"
                                                                                        data-target="#edit{{ $list_Sections->id }}">{{ trans('Sections_trans.Edit') }}</a>
                                                                                @endcan

                                                                                @can('حذف الاقسام')
                                                                                    <a href="#"
                                                                                        class="btn btn-outline-danger btn-sm"
                                                                                        data-toggle="modal"
                                                                                        data-target="#delete{{ $list_Sections->id }}">{{ trans('Sections_trans.Delete') }}</a>
                                                                                @elsecan('Delete Sections')
                                                                                    <a href="#"
                                                                                        class="btn btn-outline-danger btn-sm"
                                                                                        data-toggle="modal"
                                                                                        data-target="#delete{{ $list_Sections->id }}">{{ trans('Sections_trans.Delete') }}</a>
                                                                                @endcan

                                                                            </td>
                                                                        </tr>
                                                                        <!--تعديل قسم جديد -->
                                                                        <div class="modal fade"
                                                                            id="edit{{ $list_Sections->id }}"
                                                                            tabindex="-1" role="dialog"
                                                                            aria-labelledby="exampleModalLabel"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title"
                                                                                            style="font-family: 'Cairo', sans-serif;"
                                                                                            id="exampleModalLabel">
                                                                                            {{ trans('Sections_trans.edit_Section') }}
                                                                                        </h5>
                                                                                        <button type="button"
                                                                                            class="close"
                                                                                            data-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                            <span
                                                                                                aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">

                                                                                        <form
                                                                                            action="{{ route('Sections.update') }}"
                                                                                            method="POST">
                                                                                            @csrf
                                                                                            <div class="row">
                                                                                                <div class="col">
                                                                                                    <input type="text"
                                                                                                        name="name_sections"
                                                                                                        class="form-control"
                                                                                                        value="{{ $list_Sections->getTranslation('name_sections', 'ar') }}">
                                                                                                </div>

                                                                                                <div class="col">
                                                                                                    <input type="text"
                                                                                                        name="name_sections_En"
                                                                                                        class="form-control"
                                                                                                        value="{{ $list_Sections->getTranslation('name_sections', 'en') }}">
                                                                                                    <input id="id"
                                                                                                        type="hidden"
                                                                                                        name="id"
                                                                                                        class="form-control"
                                                                                                        value="{{ $list_Sections->id }}">
                                                                                                </div>

                                                                                            </div>
                                                                                            <br>


                                                                                            <div class="col">
                                                                                                <label for="inputName"
                                                                                                    class="control-label">{{ trans('Sections_trans.Name_Grade') }}</label>
                                                                                                <select id="Grades_id"
                                                                                                    name="Grades_id"
                                                                                                    class="custom-select"
                                                                                                    onclick="console.log($(this).val())">
                                                                                                    <!--placeholder-->
                                                                                                    <option
                                                                                                        value="{{ $Grade->id }}">
                                                                                                        {{ $Grade->name }}
                                                                                                    </option>
                                                                                                    @foreach ($list_Grades as $list_Grade)
                                                                                                        <option
                                                                                                            value="{{ $list_Grade->id }}">
                                                                                                            {{ $list_Grade->name }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                            <br>

                                                                                            <div class="col">
                                                                                                <label for="inputName"
                                                                                                    class="control-label">{{ trans('Sections_trans.Name_Class') }}</label>
                                                                                                <select id="classrooms_id"
                                                                                                    name="classrooms_id"
                                                                                                    class="custom-select">
                                                                                                    <option
                                                                                                        value="{{ $list_Sections->Classrooms->id }}">
                                                                                                        {{ $list_Sections->Classrooms->name_class }}
                                                                                                    </option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <br>

                                                                                            <div class="col">
                                                                                                <div class="form-check">

                                                                                                    @if ($list_Sections->status === 1)
                                                                                                        <input
                                                                                                            type="checkbox"
                                                                                                            checked
                                                                                                            class="form-check-input"
                                                                                                            name="status"
                                                                                                            id="exampleCheck1">
                                                                                                    @else
                                                                                                        <input
                                                                                                            type="checkbox"
                                                                                                            class="form-check-input"
                                                                                                            name="status"
                                                                                                            id="exampleCheck1">
                                                                                                    @endif
                                                                                                    <label
                                                                                                        class="form-check-label"
                                                                                                        for="exampleCheck1">{{ trans('Sections_trans.Status') }}</label>
                                                                                                </div>
                                                                                            </div>


                                                                                            <br>
                                                                                            <div class="col">
                                                                                                <label for="inputName"
                                                                                                    class="control-label">{{ trans('Sections_trans.Name_Teacher') }}</label>
                                                                                                <select multiple
                                                                                                    name="teacher_id[]"
                                                                                                    class="custom-select"
                                                                                                    id="exampleFormControlSelect2">
                                                                                                    <option disabled>
                                                                                                        {{ trans('extra_trans.Selected') }}
                                                                                                    </option>
                                                                                                    @foreach ($list_Sections->Teachers as $teacher)
                                                                                                        <option selected
                                                                                                            value="{{ $teacher['id'] }}">
                                                                                                            {{ $teacher['Name'] }}
                                                                                                        </option>
                                                                                                    @endforeach

                                                                                                    @foreach ($Teachers as $teacher)
                                                                                                        <option
                                                                                                            value="{{ $teacher->id }}">
                                                                                                            {{ $teacher->Name }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                            class="btn btn-secondary"
                                                                                            data-dismiss="modal">{{ trans('Sections_trans.Close') }}</button>
                                                                                        <button type="submit"
                                                                                            class="btn btn-success">{{ trans('Sections_trans.submit') }}</button>
                                                                                    </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- delete_modal_Grade -->
                                                                        <div class="modal fade"
                                                                            id="delete{{ $list_Sections->id }}"
                                                                            tabindex="-1" role="dialog"
                                                                            aria-labelledby="exampleModalLabel"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 style="font-family: 'Cairo', sans-serif;"
                                                                                            class="modal-title"
                                                                                            id="exampleModalLabel">
                                                                                            {{ trans('Sections_trans.delete_Section') }}
                                                                                        </h5>
                                                                                        <button type="button"
                                                                                            class="close"
                                                                                            data-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                            <span
                                                                                                aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <form
                                                                                            action="{{ route('Sections.destroy') }}"
                                                                                            method="post">

                                                                                            @csrf
                                                                                            {{ trans('Sections_trans.Warning_Section') }}
                                                                                            <input id="id"
                                                                                                type="hidden"
                                                                                                name="id"
                                                                                                class="form-control"
                                                                                                value="{{ $list_Sections->id }}">
                                                                                            <div class="modal-footer">
                                                                                                <button type="button"
                                                                                                    class="btn btn-secondary"
                                                                                                    data-dismiss="modal">{{ trans('Sections_trans.Close') }}</button>
                                                                                                <button type="submit"
                                                                                                    class="btn btn-danger">{{ trans('Sections_trans.submit') }}</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!--اضافة قسم جديد -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">
                                    {{ trans('Sections_trans.add_section') }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form action="{{ route('Sections.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="name_sections" class="form-control"
                                                placeholder="{{ trans('Sections_trans.Section_name_ar') }}">
                                        </div>

                                        <div class="col">
                                            <input type="text" name="name_sections_En" class="form-control"
                                                placeholder="{{ trans('Sections_trans.Section_name_en') }}">
                                        </div>

                                    </div>
                                    <br>


                                    <div class="col">
                                        <label for="inputName"
                                            class="control-label">{{ trans('Sections_trans.Name_Grade') }}</label>
                                        <select id="Grade_id" name="Grade_id" class="custom-select"
                                            onchange="console.log($(this).val())">
                                            <!--placeholder-->
                                            <option value="" selected disabled>
                                                {{ trans('Sections_trans.Select_Grade') }}
                                            </option>
                                            @foreach ($list_Grades as $list_Grade)
                                                <option value="{{ $list_Grade->id }}"> {{ $list_Grade->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>

                                    <div class="col">
                                        <label for="inputName"
                                            class="control-label">{{ trans('Sections_trans.Name_Class') }}</label>
                                        <select id="Classroom_id" name="Classroom_id" class="custom-select">

                                        </select>
                                    </div>
                                    <br>

                                    <div class="col">
                                        <label for="inputName"
                                            class="control-label">{{ trans('Sections_trans.Name_Teacher') }}</label>
                                        {{-- multiple name="teacher_id[]" -> هياخد البيانات الي هختارها على شكل اراي --}}
                                        <select multiple name="teacher_id[]" class="custom-select"
                                            id="exampleFormControlSelect2">
                                            <option disabled>{{ trans('extra_trans.Selected') }}</option>
                                            @foreach ($Teachers as $teacher)
                                                <option value="{{ $teacher->id }}">{{ $teacher->Name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('Sections_trans.Close') }}</button>
                                <button type="submit"
                                    class="btn btn-success">{{ trans('Sections_trans.submit') }}</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
    {{--
<script src="{{ asset('assets/select2/js/select2.full.min.js') }}" ></script>
<script>
    $(function() {
        function matchStart(params, data) {
            // If there are no search terms, return all of the data
            if ($.trim(params.term) === '') {
                return data;
            }

            // Skip if there is no 'children' property
            if (typeof data.children === 'undefined') {
                return null;
            }

            // `data.children` contains the actual options that we are matching against
            var filteredChildren = [];
            $.each(data.children, function(idx, child) {
                if (child.text.toUpperCase().indexOf(params.term.toUpperCase()) == 0) {
                    filteredChildren.push(child);
                }
            });

            // If we matched any of the timezone group's children, then set the matched children on the group
            // and return the group object
            if (filteredChildren.length) {
                var modifiedData = $.extend({}, data, true);
                modifiedData.children = filteredChildren;

                // You can return modified objects from here
                // This includes matching the `children` how you want in nested data sets
                return modifiedData;
            }

            // Return `null` if the term should not be displayed
            return null;
        }

        $(".select2").select2({
            tags: true,
            closeOnSelect: false,
            minimumResultsForSearch: Infinity,
            matcher: matchStart
        });
    });
</script>
  --}}
@endsection
