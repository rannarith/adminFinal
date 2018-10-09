@extends('admin.templates.adminmaster')

@section('title')
    <title>Products</title>
@endsection

@section('style')

@endsection

@section('container')
<section class="box">
    <div class="card-body">
    
    <form class="form-horizontal" action="{{ route('update', $pro->ProductID) }}" method="POST">
        <div class="card-body">
            <h4 class="card-title">Product Info</h4>
            <p class="text-center">{!! session('message') !!}</p>
            <div class="form-group row">
                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Product Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="fname" name="txtName" value="{{ $pro->ProductName }}">
                    <input type="hidden" name="txtId" value="{{ $pro->ProductID }}">
                    <input type="hidden" class="form-control" name="_token" value="{{ csrf_token() }}">
                    <p class="text-danger">{{ $errors->first('txtName') }}</p>
                </div>
            </div>
           
            <div class="form-group row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Description</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="Description">{{ $pro->Pro_Description }}</textarea>
                    <p class="text-danger">{{ $errors->first('Description') }}</p>
                </div>
            </div>
        </div>
        <div class="border-top">
            <div class="card-body">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('list') }}" class="btn btn-default">Back</a>
            </div>
            @csrf
        </div>
    
    </form>
       
    </div>
</section>
@endsection

@section('script')

@endsection