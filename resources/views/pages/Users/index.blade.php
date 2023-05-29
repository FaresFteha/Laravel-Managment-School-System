@extends('layouts.master')

@section('css')
    @toastr_css
@endsection

@section('title')
    {{ trans('users_trans.Users') }}
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('users_trans.Users') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_siadebar_trans.Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('users_trans.Users') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
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
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        @can('اضافة المستخدمين')
                        <a href="{{ route('users.create') }}" class="button x-small" role="button"
                        aria-pressed="true">{{ trans('users_trans.AddUser') }}</a>
                        @elsecan('Add Users')
                        <a href="{{ route('users.create') }}" class="button x-small" role="button"
                            aria-pressed="true">{{ trans('users_trans.AddUser') }}</a>
                        @endcan
                        
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered p-0" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ trans('users_trans.UsersName') }}</th>
                                        <th>{{ trans('users_trans.Email') }}</th>
                                     {{--<th>{{ trans('users_trans.Status') }}</th>--}} 
                                        <th>{{ trans('users_trans.TypeUser') }}</th>
                                        <th>{{ trans('Teacher_trans.Operasion') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $user)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                {{ $user->name }}
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                           {{--  <td>
                                                {{ $user->status }}
                                            </td> --}}
                                            <td>
                                                @if (!empty($user->roles_name))
                                                    @foreach ($user->roles_name as $v)
                                                        <label class="badge badge-success">{{ $v }}</label>
                                                    @endforeach
                                                @endif

                                            </td>
                                            <td>
                                                @can('تعديل المستخدمين')
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info"
                                                    role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                @elsecan('Edit Users')
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info"
                                                    role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                @endcan

                                                @can('عرض المستخدمين')
                                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning"
                                                    role="button" aria-pressed="true"><i class="fa fa-eye"></i></a>
                                                @elsecan('Show Users')
                                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning"
                                                    role="button" aria-pressed="true"><i class="fa fa-eye"></i></a>
                                                @endcan
                                               
                                                @can('حذف المستخدمين')
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#delete_Teacher{{ $user->id }}"
                                                title="{{ trans('Grades_trans.Delete') }}"><i
                                                    class="fa fa-trash"></i></button>
                                                @elsecan('Delete Users')
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#delete_Teacher{{ $user->id }}"
                                                title="{{ trans('Grades_trans.Delete') }}"><i
                                                    class="fa fa-trash"></i></button>
                                                @endcan

                                            </td>
                                        </tr>
                                        <div class="modal fade" id="delete_Teacher{{ $user->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                    @csrf
                                                    @method('Delete')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;"
                                                                class="modal-title" id="exampleModalLabel">
                                                                {{ trans('users_trans.Delete_User') }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> {{ trans('Teacher_trans.Warning_Teacher') }}</p>
                                                            <input type="hidden" name="id"
                                                                value="{{-- $Teacher->id --}}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('Teacher_trans.Close') }}</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">{{ trans('Teacher_trans.Delete') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @empty
                                    <tr>
                                        <td class="alert-danger text-center" colspan="6">
                                            {{ trans('students_trans.NotData') }}</td>
                                    </tr>
                                    @endforelse
                            </table>
                            <div >
                                <tfoot>
                                    <tr>
                                        <td colspan="6">
                                            <div class="float-right">
                                                {!! $data->appends(request()->all())->links() !!}
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection


@section('js')
    @toastr_js
    @toastr_render
@endsection
