@extends('layouts.master')

@section('css')
@toastr_css
@endsection

@section('title')
{{ trans('users_trans.UsersPermissions') }}
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('users_trans.UsersPermissions') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_siadebar_trans.Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('users_trans.UsersPermissions') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        @can('اضافة صلاحيات')
                        <a href="{{ route('roles.create') }}" class="button x-small" role="button"
                            aria-pressed="true">{{ trans('users_trans.CreatePermissions') }}</a>
                        @elsecan('Add Permissions')
                        <a href="{{ route('roles.create') }}" class="button x-small" role="button"
                        aria-pressed="true">{{ trans('users_trans.CreatePermissions') }}</a>
                        @endcan

                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered p-0" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ trans('users_trans.Role_name') }}</th>
                                        <th>{{ trans('Teacher_trans.Operasion') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($roles as $role)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $role->name }}</td>

                                            <td>
                                                @can('تعديل صلاحيات')
                                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info"
                                                    role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                @elsecan('Edit Permissions')
                                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info"
                                                    role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                @endcan

                                                @can('عرض صلاحيات')
                                                <a href="{{ route('roles.show' , $role->id ) }}" class="btn btn-warning"
                                                    role="button" aria-pressed="true"><i class="fa fa-eye"></i></a>
                                                @elsecan('Show Permissions')
                                                <a href="{{ route('roles.show' , $role->id ) }}" class="btn btn-warning"
                                                    role="button" aria-pressed="true"><i class="fa fa-eye"></i></a>
                                                @endcan
                                                  
                                                    @can('حذف صلاحيات')
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#delete_Teacher{{ $role->id}}"
                                                    title="{{ trans('Grades_trans.Delete') }}"><i
                                                        class="fa fa-trash"></i></button>
                                                    @elsecan('Delete Permissions')
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#delete_Teacher{{ $role->id}}"
                                                    title="{{ trans('Grades_trans.Delete') }}"><i
                                                        class="fa fa-trash"></i></button>
                                                    @endcan

                                            </td>
                                        </tr>

                                        <div class="modal fade" id="delete_Teacher{{$role->id}}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;"
                                                                class="modal-title" id="exampleModalLabel">
                                                                {{ trans('users_trans.Delete_role') }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> {{ trans('Teacher_trans.Warning_Teacher') }} <label type="text" style="color: red">{{$role->name}}</label></p>
                                                       
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
                                    @endforelse




                            </table>
                            <div>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">
                                            <div class="float-right">
                                                {{--   {!! $Teachers->appends(request()->all())->links() !!} --}}
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
