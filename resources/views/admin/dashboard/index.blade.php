@extends('admin.templates.adminmaster')

@section('title')
    <title>Dashboard Admin</title>
@endsection

@section('style')

@endsection

@section('container')
    <section class="box">
        <header class="panel_header">
            <h2 class="title pull-left">DASHBOARD | ADMIN</h2>
        </header>
        <div class="content-body">
            @if (Auth::guest())
                <p>Guest</p>
            @else 
                <h3><b>Admin Page</b></h3>
            @endif
        </div>
    </section>
@endsection

@section('script')

@endsection