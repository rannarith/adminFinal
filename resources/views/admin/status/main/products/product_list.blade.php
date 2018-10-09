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
            <h5 class="card-title m-b-0">Product List</h5>
        
            <form action=" {{ route('search') }}" method="get">
                <a href="{{ route('create') }}" class="btn btn-default">ADD NEW</a>
                <input type="text" class="form-control" placeholder="Search for Product" name="txtSearch">
                <span class="input-group-btn">
                    <button class="btn btn-search" type="submit"><i class="fa fa-search fa-fw"></i> Search</button>
                </span>
            </form>
            
        </div>
    
        <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Descrition</th>
                    <th scope="col">Create By</th>
                    <th scope="col">Create Date</th>
                    <th scope="col">Update Date</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pros as $pro)
                <tr>
                    <th scope="row">{{ $pro->ProductID }}</th>
                    <td>{{ $pro->ProductName }}</td>
                    <td>{{ $pro->Pro_Description }}</td>
                    <td>{{ $pro->userName }}</td>
                    <td>{{ $pro->created_at }}</td>
                    <td>{{ $pro->updated_at }}</td>
                    <td colspan="6">
                        <a href="{{ route('edit',$pro->ProductID) }}"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('detail',$pro->ProductID) }}"><i class=" fas fa-eye"></i></a>
                        <a href="{{ route('delete', $pro->ProductID) }}"><i class="m-r-10 mdi mdi-delete-circle"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
        </table>
        <div class="text-center" id="pagination">
				 {{ $pros->appends(['txtSearch'=> Request::get('txtSearch')])->links() }}
			</div>
    </div>
</section>        

        
       
       
    
@endsection

@section('script')

@endsection