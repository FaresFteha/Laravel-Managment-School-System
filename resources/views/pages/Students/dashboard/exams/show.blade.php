@extends('layouts.master')
@section('css')
    @toastr_css
    @livewireStyles
   
@endsection
@section('title')
إجراء اختبار
@endsection

@section('page-header')
    <!-- breadcrumb -->
   <h2> إجراء اختبار</h2>
   <br>
    <!-- breadcrumb -->
@endsection
@section('content')

@livewire('show-question', ['quizze_id' => $quizze_id, 'student_id' => $student_id])

@endsection
@section('js')
    @toastr_js
    @toastr_render
    @livewireScripts
@endsection
