@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/select2/css/select2.min.css') }}">
@endsection

@section('title')
    {{ trans('users_trans.Users') }}
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('users_trans.UpdateUser') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_siadebar_trans.Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('users_trans.UpdateUser') }}</li>
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
                <div class="card-body">

                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{ route('users.update', $user->id) }}" method="post">
                                @csrf
                                @method('PATCH')
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>{{ trans('users_trans.UsersName') }}:</strong>
                                            <input type="text" name="name_ar" value="{{ $user->getTranslation('name', 'ar') }}" class="form-control" autocomplete="off">
                                            @error('name_ar')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                          @enderror
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>{{ trans('users_trans.UsersName') }}:</strong>
                                            <input type="text" name="name_en" value="{{ $user->getTranslation('name', 'en') }}" class="form-control" autocomplete="off">
                                            @error('name_en')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                      
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>{{ trans('users_trans.Email') }}:</strong>
                                            {!! Form::text('email', $user->email, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                                        </div>
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>{{ trans('Teacher_trans.Password') }}:</strong>
                                            <input type="password" id="password" name="password" class="form-control" autocomplete="off">
                                            <div class="col-sm-9">
                                                <input type="checkbox" class="form-check-input" onclick="myFunction()"
                                                    id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">{{ trans('Students_trans.Showpassword') }}</label>
                                            </div>
                                        </div>
                                        @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                     {{--  
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>{{ trans('users_trans.Status') }}:</strong>
                                        <select name="status" id="select-beast" class="custom-select" required>
                                            <option disabled value="مفعل">{{ $user->status }}</option>
                                            <option value="مفعل">مفعل</option>
                                            <option value="غير مفعل">غير مفعل</option>
                                        </select>
                                      
                                    </div>
                                    --}}
                                <br>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>{{ trans('users_trans.TypeUser') }}:</strong>
                                            {!! Form::select('roles_name[]' , $roles, $userRole, ['class' => 'form-control select2', 'multiple']) !!}
                                        </div>
                                    </div>

                                    <button class="btn btn-success nextBtn btn-lg pull-left"
                                    type="submit">{{ trans('Teacher_trans.Submit') }}</button>
                                </div>
                                  
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

<script src="{{ asset('assets/select2/js/select2.full.min.js') }}"></script>
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
@endsection
