@extends('layouts.master')

@section('css')
    @toastr_css
@endsection

@section('title')
    {{ trans('hedartitlepage.Tablepage') }}
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ trans('exams_trans.academic_year') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_siadebar_trans.Home') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('exams_trans.academic_year') }}</li>
                </ol>
            </div>

        </div>
    </div>
    <!-- breadcrumb -->
@endsection



@section('content')
    <div class="col-xl-12 mb-30">
        {{-- Insert Button --}}

        <div class="card card-statistics h-100">
            <div class="card-body">
                <!-- Error body -->

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Error body -->
                @can('اضافة سنة اكاديمية')
                <button type="button" class="button x-small" data-toggle="modal" data-target="#InsertModal">
                    {{ trans('exams_trans.academic_year') }}
                </button>
                @elsecan('Add Academic Year')
                <button type="button" class="button x-small" data-toggle="modal" data-target="#InsertModal">
                    {{ trans('exams_trans.academic_year') }}
                </button>
                @endcan
                <br><br>
                <div class="table-responsive">
                    <div class="table-responsive">
                        <div class="widget-search ml-0 clearfix">
                            <i class="fa fa-search"></i>
                            <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"
                                placeholder="{{ trans('extra_trans.Search_here') }}">
                        </div>
                        <br>
                    <table class="table table-hover table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('exams_trans.academic_year') }}</th>
                                <th>{{ trans('grades_trans.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @forelse ($academicyears as $academicyear)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $academicyear->academicyear }}</td>
                                    <td>
                                        @can('تعديل سنة اكاديمية')
                                        <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#EditeModal{{ $academicyear->id }}"
                                        title="{{ trans('grades_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                                        @elsecan('Edit Academic Year')
                                        <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#EditeModal{{ $academicyear->id }}"
                                        title="{{ trans('grades_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                                        @endcan

                                        @can('حذف سنة اكاديمية')
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#deleteModal{{ $academicyear->id }}"
                                        title="{{ trans('grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                                        @elsecan('Delete Academic Year')
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#deleteModal{{ $academicyear->id }}"
                                        title="{{ trans('grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                                        @endcan


                                    </td>

                                </tr>
                                <!-- Edite_modal_Grade -->
                                <div class="modal fade" id="EditeModal{{ $academicyear->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('grades_trans.edit_Grade') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form method="POST" action="{{ route('Academicyear.update' ,  $academicyear->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="row">
                                                        <div class="col">
                                                            <input id="id" name="id" type="hidden"
                                                                value="{{ $academicyear->id }}">
                                                            <label for="Name" class="mr-sm-2">{{ trans('grades_trans.stage_name_ar') }} : </label>
                                                            <input id="name" type="text" name="academicyear" class="form-control" value="{{$academicyear->academicyear}}" required> 
                                                        </div>
                                                    
                                                    </div>
                                                 
                                                    <br><br>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ trans('grades_trans.Close') }}</button>
                                                <button type="submit"
                                                    class="btn btn-success">{{ trans('grades_trans.submit') }}</button>
                                            </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="deleteModal{{ $academicyear->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('Grades_trans.delete_Grade') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('Academicyear.destroy' ,  $academicyear->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    {{ trans('Grades_trans.Warning_Grade') }}
                                                    <br>
                                                    <input id="id" type="hidden" name="id"
                                                        class="form-control" value="{{ $academicyear->id }}" >
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-danger">{{ trans('Grades_trans.Delete') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td class="alert-danger text-center" colspan="3">
                                        {{ trans('students_trans.NotData') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        <tfoot>
                            <tr>
                                <td colspan="3">
                                    <div class="float-right">
                                        {!! $academicyears->appends(request()->all())->links() !!}
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </div>
                </div>
            </div>
        </div>
        <!-- add_modal_Grade -->
        <div class="modal fade" id="InsertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                            {{ trans('grades_trans.add_Grade') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form method="POST" action="{{ route('Academicyear.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="Name" class="mr-sm-2">{{ trans('exams_trans.academic_year') }}
                                        :</label>
                                    <input id="name" type="text" name="academicyear" class="form-control" required>
                                </div>
                            <br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('grades_trans.Close') }}</button>
                        <button type="submit" class="btn btn-success">{{ trans('grades_trans.submit') }}</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')
    @toastr_js
    @toastr_render
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection
