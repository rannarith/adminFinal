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
            <h5 class="card-title m-b-0">Categories Detail</h5>
            <p>CategorID: <b>{{ $cat->CategoryID }}</b></p>
            <p>CategoryName: <b>{{ $cat->CategoryName }}</b></p>
            <p>Description: <b>{{ $cat->Description }}</b></p>
            <p>UserID: <b>{{ $cat->user_id }}</b></p>
            <p>Create By: <b>{{ $cat->UserName }}</b></p>
            <p>Created Date: <b>{{ $cat->created_at }}</b></p>
            <p>Updated Date: <b>{{ $cat->updated_at }}</b></p>
        </div>
        <a href="{{ route('categories_list') }}" class="btn btn-default">Back</a>
    </div>
</section>        

        
       
       
    
@endsection

@section('script')

@endsection