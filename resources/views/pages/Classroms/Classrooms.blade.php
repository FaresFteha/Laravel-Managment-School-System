@extends('layouts.master')
@section('css')
    @toastr_css

@section('title')
    {{ trans('classrooms_trans.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->

@section('page-header')
    <!-- breadcrumb -->
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ trans('classrooms_trans.List_classes') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_siadebar_trans.Home') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('classrooms_trans.title_page') }}</li>
                </ol>
            </div>

        </div>
    </div>
    <!-- breadcrumb -->
@endsection
<!-- breadcrumb -->
@endsection



@section('content')
<!-- row -->
<div class="row">

    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <!-- any ereror bt toast -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Button Add --}}
                @can('اضافة الصفوف')
                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('classrooms_trans.add_class') }}
                    </button>
                @elsecan('Add Classrooms')
                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('classrooms_trans.add_class') }}
                    </button>
                @endcan

                {{-- Button Delete all --}}
                @can('حذف الصفوف المختارة')
                    <button type="button" class="button x-small" id="btn_delete_all">
                        {{ trans('classrooms_trans.delete_checkbox') }}
                    </button>
                @elsecan('Delete Chooese Classrooms')
                    <button type="button" class="button x-small" id="btn_delete_all">
                        {{ trans('classrooms_trans.delete_checkbox') }}
                    </button>
                @endcan



                <br>
                <br>

                {{-- Form serche by combobox --}}

                <form action="{{ route('FilterClasses') }}" method="POST">
                    @csrf
                    <select class="fancyselect float-left" name="Grade_id" required onchange="this.form.submit()">
                        <option title="Combo 1" value="" selected disabled>
                            {{ trans('classrooms_trans.Search_By_Grade') }}
                        </option>
                        @foreach ($Grade as $Gradeitems)
                            <option title="Combo 1" value="{{ $Gradeitems->id }}">{{ $Gradeitems->name }}
                            </option>
                        @endforeach
                    </select>
                </form>
                <br>
                <br>
                <br>
                @include('pages.Classroms.Filters.filtre')

                <div class="table-responsive">
                    <table id="DeleteCheck" class="table table-striped table-bordered p-0" style="text-align: center">
                        <thead>
                            <tr>
                                <th>
                                    <input name="select_all" id="example-select-all" type="checkbox"
                                        onclick="CheckAll('box1', this)" />
                                </th>
                                <th>#</th>
                                <th>{{ trans('classrooms_trans.Name_class') }}</th>
                                <th>{{ trans('classrooms_trans.Name_Grade') }}</th>
                                <th>{{ trans('classrooms_trans.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($details))
                                <?php $List_Classes = $details; ?>
                            @else
                                <?php $List_Classes = $Classrooms; ?>
                            @endif
                            
                            @foreach ($List_Classes as $Classroomsitem)
                                <tr>
                                    <td>
                                        <input type="checkbox" value="{{ $Classroomsitem->id }}" class="box1">
                                    </td>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $Classroomsitem->name_class }}</td>
                                    <td>{{ $Classroomsitem->Grades->name }}</td>
                                    <td>
                                        @can('تعديل الصفوف')
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#editmodal{{ $Classroomsitem->id }}"
                                                title="{{ trans('Grades_trans.Edit') }}"><i
                                                    class="fa fa-edit"></i></button>
                                        @elsecan('Edit Classrooms')
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#editmodal{{ $Classroomsitem->id }}"
                                                title="{{ trans('Grades_trans.Edit') }}"><i
                                                    class="fa fa-edit"></i></button>
                                        @endcan

                                        @can('حذف الصفوف')
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $Classroomsitem->id }}"
                                                title="{{ trans('Grades_trans.Delete') }}"><i
                                                    class="fa fa-trash"></i></button>
                                        @elsecan('Delete Classrooms')
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $Classroomsitem->id }}"
                                                title="{{ trans('Grades_trans.Delete') }}"><i
                                                    class="fa fa-trash"></i></button>
                                        @endcan


                                    </td>
                                </tr>


                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete{{ $Classroomsitem->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('classrooms_trans.delete_class') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('Classrooms.destroy') }}" method="post">

                                                    @csrf
                                                    {{ trans('classrooms_trans.Warning_class') }}
                                                    <input id="id" type="hidden" name="id"
                                                        class="form-control" value="{{ $Classroomsitem->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('classrooms_trans.Close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-danger">{{ trans('classrooms_trans.Delete') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="editmodal{{ $Classroomsitem->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('classrooms_trans.edit_class') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- edit_form -->
                                                <form action="Classrooms.update" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name"
                                                                class="mr-sm-2">{{ trans('classrooms_trans.Name_class') }}
                                                                :</label>
                                                            <input id="name_class" type="text" name="name_class"
                                                                class="form-control"
                                                                value="{{ $Classroomsitem->getTranslation('name_class', 'ar') }}"
                                                                required>
                                                            <input id="id" type="hidden" name="id"
                                                                class="form-control"
                                                                value="{{ $Classroomsitem->id }}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en"
                                                                class="mr-sm-2">{{ trans('classrooms_trans.Name_class_en') }}
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $Classroomsitem->getTranslation('name_class', 'en') }}"
                                                                name="name_class_en" required>
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ trans('classrooms_trans.Name_Grade') }}
                                                            :</label>
                                                        <select class="form-control form-control-lg"
                                                            id="exampleFormControlSelect1" name="Grade_id">
                                                            <option value="{{ $Classroomsitem->Grades->id }}">
                                                                {{ $Classroomsitem->Grades->name }}
                                                            </option>
                                                            @foreach ($Grade as $Classroomsitem)
                                                                <option value="{{ $Classroomsitem->id }}">
                                                                    {{ $Classroomsitem->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('classrooms_trans.Close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-success">{{ trans('classrooms_trans.submit') }}</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                    </table>
                    <div>
                        <tfoot>
                            <tr>
                                <td colspan="4">
                                    <div class="float-right">
                                        {!! $List_Classes->appends(request()->all())->links() !!}
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- add_modal_class -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('classrooms_trans.add_class') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="row mb-30" method="POST" action="{{ route('Classrooms.store') }}">
                        @csrf

                        <div class="card-body">
                            <div class="repeater">
                                <div data-repeater-list="List_Classes">{{-- List_Class انا هين قايلو خحود بالك عندي متعير في فورم الريبيتر اسمو --}}
                                    <div data-repeater-item>

                                        <div class="row">

                                            <div class="col">
                                                <label for="Name"
                                                    class="mr-sm-2">{{ trans('classrooms_trans.Name_class') }}
                                                    :</label>
                                                <input class="form-control" type="text" name="name_class" />
                                            </div>


                                            <div class="col">
                                                <label for="Name"
                                                    class="mr-sm-2">{{ trans('classrooms_trans.Name_class_en') }}
                                                    :</label>
                                                <input class="form-control" type="text" name="name_class_en" />
                                            </div>


                                            <div class="col">
                                                <label for="Name_en"
                                                    class="mr-sm-2">{{ trans('classrooms_trans.Name_Grade') }}
                                                    :</label>

                                                <div class="box">
                                                    <select class="fancyselect" name="Grade_id">
                                                        @foreach ($Grade as $Gradeitem)
                                                            <option value="{{ $Gradeitem->id }}">
                                                                {{ $Gradeitem->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col">
                                                <label for="Name_en"
                                                    class="mr-sm-2">{{ trans('classrooms_trans.Processes') }}
                                                    :</label>
                                                <input class="btn btn-danger btn-block" data-repeater-delete
                                                    type="button"
                                                    value="{{ trans('classrooms_trans.delete_row') }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-12">
                                        <input class="button" data-repeater-create type="button"
                                            value="{{ trans('classrooms_trans.add_row') }}" />
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                    <button type="submit"
                                        class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                                </div>


                            </div>
                        </div>
                    </form>
                </div>


            </div>

        </div>

    </div>


    <!-- حذف مجموعة صفوف -->
    <div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('classrooms_trans.delete_class') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('delete_all') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        {{ trans('classrooms_trans.Warning_class') }}
                        <input class="text" type="hidden" id="delete_all_id" name="delete_all_id"
                            value=''>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('classrooms_trans.Close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ trans('classrooms_trans.Delete') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render


@endsection
