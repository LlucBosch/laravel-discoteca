@extends('admin.layout.master')

@section('content')

    <div class="panel">
        <div class="desktop-two-columns-aside-panel">
            <div class="column-aside">
                <div class="form">
                    @yield('form')
                </div>
            </div>

            <div class="column-main">
                <div class="table">
                    @yield('table')
                </div>
            </div>
        </div>
    </div>
@endsection