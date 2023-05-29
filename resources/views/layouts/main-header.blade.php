{{-- Admin-Main-Sidebar --}}
@if (auth('web')->check())
    @include('layouts.main-header.main-header')
@endif

@if (auth('student')->check())
    @include('layouts.main-header.student-header')
@endif

@if (auth('teacher')->check())
    @include('layouts.main-header.teacher-header')
@endif

@if (auth('parent')->check())
    @include('layouts.main-header.parent-header')
@endif
