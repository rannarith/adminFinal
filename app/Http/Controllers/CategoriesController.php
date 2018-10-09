<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Category;
use App\User;

class CategoriesController extends Controller
{
    private $limit = 4;   
    public function index()
    {
        $cats = Category::orderBy('CategoryID','DESC')
                            ->paginate($this->limit);
        return view('admin.status.main.categories_list',compact('cats'));
    }

    public function create()
    {
        return view('admin.status.main.add_category');
    }

    public function store(Request $request) 
    {   $cat = new Category;
        $cat->CategoryName = $request->input('txtName');
        $cat->Description = $request->input('Description');
        $cat->user_id = Auth::user()->id;
        $cat->UserName = Auth::user()->name;
        $cat->save();

        $request->session()->flash('message','<div class="alert alert-success">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                              <strong>Inseted!</strong>.
                                            </div>');
        return back();
    }

    public function edit($id)
    {
       $cat = Category::find($id);
       return view('admin.status.main.edit_category', compact('cat'));
    }

    public function update(Request $request, $id)
    {
        
        $cat = Category::find($id);
        $cat->CategoryName = $request->input('txtName');
        $cat->Description = $request->input('Description');
        $cat->user_id = Auth::user()->id;
        $cat->UserName = Auth::user()->name;
        
        $cat->save();

        $request->session()->flash('message','<div class="alert alert-success">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                              <strong>Update Success!</strong>.
                                            </div>');
        return back();
        
    }

    public function delete($id)
    {
       $cat = Category::find($id);
       $cat -> delete();
       return redirect('/categories_list');
    }

    public function search(Request $request)
    {
       $key = $request->input('txtSearch');
       $cats = Category::where('CategoryID',"=", $key)
                            ->orwhere('CategoryName','like','%'.$key.'%')
                            ->orwhere('Description','like','%'.$key.'%')
                            ->orderBy('CategoryID','DESC')
                            ->paginate($this->limit);
        return view('admin.status.main.categories_list',compact('cats'));
    }
    
    public function detail($id)
    {
       $cat = Category::find($id);
       return view('admin.status.main.detail', compact('cat'));
    }

}
