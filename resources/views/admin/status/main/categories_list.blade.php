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
            <h5 class="card-title m-b-0">Categories List</h5>
            
            <form action=" {{ route('search') }}" method="get">
                <a href="{{ route('create') }}" class="btn btn-default">ADD NEW</a>
                <input type="text" class="form-control" placeholder="Search for Category" name="txtSearch">
                <span class="input-group-btn">
                    <button class="btn btn-search" type="submit"><i class="fa fa-search fa-fw"></i> Search</button>
                </span>
            </form>
            
        </div>
    
        <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Descrition</th>
                    <th scope="col">Create By</th>
                    <th scope="col">Create Date</th>
                    <th scope="col">Update Date</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cats as $cat)
                <tr>
                    <th scope="row">{{ $cat->CategoryID }}</th>
                    <td>{{ $cat->CategoryName }}</td>
                    <td>{{ $cat->Description }}</td>
                    <td>{{ $cat->UserName }}</td>
                    <td>{{ $cat->created_at }}</td>
                    <td>{{ $cat->updated_at }}</td>
                    <td colspan="6">
                        <a href="{{ route('edit',$cat->CategoryID) }}"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('detail',$cat->CategoryID) }}"><i class=" fas fa-eye"></i></a>
                        <a href="{{ route('delete', $cat->CategoryID) }}"><i class="m-r-10 mdi mdi-delete-circle"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
        </table>
        <div class="text-center" id="pagination">
				 {{ $cats->appends(['txtSearch'=> Request::get('txtSearch')])->links() }}
			</div>
    </div>
</section>        

        
       
       
    
@endsection

@section('script')

@endsection