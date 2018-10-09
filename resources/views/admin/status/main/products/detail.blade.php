@extends('admin.templates.adminmaster')

@section('title')
    <title>Status</title>
@endsection

@section('style')

@endsection

@section('container')
<section class="box">        
    <div class="card">
        <div class="card-body">
            <h5 class="card-title m-b-0">Product Detail</h5>
            <p>ProductID: <b>{{ $pro->ProductID }}</b></p>
            <p>ProductyName: <b>{{ $pro->ProductName }}</b></p>
            <p>Description: <b>{{ $pro->Description }}</b></p>
            <p>UserID: <b>{{ $pro->UserID }}</b></p>
            <p>Create By: <b>{{ $pro->userName }}</b></p>
            <p>Created Date: <b>{{ $pro->created_at }}</b></p>
            <p>Updated Date: <b>{{ $pro->updated_at }}</b></p>
        </div>
        <a href="{{ route('list') }}" class="btn btn-default">Back</a>
    </div>
</section>        

        
       
       
    
@endsection

@section('script')

@endsection