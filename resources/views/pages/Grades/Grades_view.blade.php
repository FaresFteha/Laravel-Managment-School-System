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
                <h4 class="mb-0"> {{ trans('hedartitlepage.headertitlegrade') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_siadebar_trans.Home') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('hedartitlepage.tograde') }}</li>
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
                @can('اضافة مرحلة')
                <button type="button" class="button x-small" data-toggle="modal" data-target="#InsertModal">
                    {{ trans('grades_trans.add_Grade') }}
                </button>    
                @elsecan('Add Grade')
                <button type="button" class="button x-small" data-toggle="modal" data-target="#InsertModal">
                    {{ trans('grades_trans.add_Grade') }}
                </button>  
                @endcan

                <br><br>
                @include('pages.Grades.Filters.filtre')

                <div class="table-responsive">
                    <table  class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('grades_trans.Name') }}</th>
                                <th>{{ trans('grades_trans.Notes') }}</th>
                                <th>{{ trans('grades_trans.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($Grade as $Gradeitem)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $Gradeitem->name }}</td>
                                <td>{{ $Gradeitem->notes }}</td>
                                <td>
                                    @can('تعديل مرحلة')
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#EditeModal{{ $Gradeitem->id }}"
                                    title="{{ trans('grades_trans.Edit') }}"><i class="fa fa-edit"></i></button>    
                                    @elsecan('Edit Grade')  
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#EditeModal{{ $Gradeitem->id }}"
                                    title="{{ trans('grades_trans.Edit') }}"><i class="fa fa-edit"></i></button> 
                                    @endcan
                                  
                                    @can('حذف مرحلة')
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#deleteModal{{ $Gradeitem->id }}"
                                    title="{{ trans('grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                                    @elsecan('Delete Grade')
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#deleteModal{{ $Gradeitem->id }}"
                                    title="{{ trans('grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                                    @endcan

                                </td>

                            </tr>
                            <!-- Edite_modal_Grade -->
                            <div class="modal fade" id="EditeModal{{ $Gradeitem->id }}" tabindex="-1" role="dialog"
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
                                                <div class="row">
                                                    <div class="col">
                                                        <input id="id" name="id" type="hidden"
                                                            value="{{ $Gradeitem->id }}">
                                                        <label for="Name"
                                                            class="mr-sm-2">{{ trans('grades_trans.stage_name_ar') }}
                                                            :</label>
                                                        <input id="name" type="text" name="name"
                                                            class="form-control"
                                                            value="{{ $Gradeitem->getTranslation('name', 'ar') }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="name_en"
                                                            class="mr-sm-2">{{ trans('grades_trans.stage_name_en') }}
                                                            :</label>
                                                        <input type="text" class="form-control" name="name_en"
                                                            value="{{ $Gradeitem->getTranslation('name', 'en') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        for="exampleFormControlTextarea1">{{ trans('grades_trans.Notes_ar') }}
                                                        :</label>
                                                    <textarea class="form-control" name="notes" id="exampleFormControlTextarea1" rows="3">{{  $Gradeitem->getTranslation('notes', 'ar') }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        for="exampleFormControlTextarea1">{{ trans('grades_trans.Notes_en') }}
                                                        :</label>
                                                    <textarea class="form-control" name="notes_en" id="exampleFormControlTextarea1" rows="3">{{ $Gradeitem->getTranslation('notes', 'en') }}</textarea>
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
                            <div class="modal fade" id="deleteModal{{ $Gradeitem->id }}" tabindex="-1" role="dialog"
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
                                            <form method="POST" action="{{ route('Grades.destroy') }}">
                                                @csrf
                                                {{ trans('Grades_trans.Warning_Grade') }}
                                                <br>
                                                <input id="id" type="hidden" name="id"
                                                    class="form-control" value="{{ $Gradeitem->id }}">
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
                                <td class="alert-danger text-center" colspan="4">{{ trans('students_trans.NotData') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                    <div >
                        <tfoot>
                            <tr>
                                <td colspan="4">
                                    <div class="float-right">
                                        {!! $Grade->appends(request()->all())->links() !!}
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
                        <form method="POST" action="{{ route('Grades.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="Name" class="mr-sm-2">{{ trans('grades_trans.stage_name_ar') }}
                                        :</label>
                                    <input id="name" type="text" name="name" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="name_en" class="mr-sm-2">{{ trans('grades_trans.stage_name_en') }}
                                        :</label>
                                    <input type="text" class="form-control" name="name_en">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{ trans('grades_trans.Notes_ar') }}
                                    :</label>
                                <textarea class="form-control" name="notes" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label
                                    for="exampleFormControlTextarea1">{{ trans('grades_trans.Notes_en') }}
                                    :</label>
                                <textarea class="form-control" name="notes_en" id="exampleFormControlTextarea1" rows="3"
                                   ></textarea>
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
@endsection
