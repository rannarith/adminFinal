<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Category;
use App\User;
use App\Product;

class ProductController extends Controller
{
    // Proucts Controler 
    public function index() 
    {   $pros = Product::orderBy('ProductID', 'DESC')->paginate(2);
        $cats = Category::all();
        return view('admin.status.main.products.product_list', compact('pros'));
    }

    public function create()
    {
        return view('admin.status.main.products.add_product');
    }

    public function store(Request $request)
    {
        $pro = new Product;
        $pro->ProductName       = $request->input('txtName');
        $pro->Pro_Description   = $request->input('Description');
        $pro->UserID            = Auth::user()->id;
        $pro->userName          = Auth::user()->name;
        $pro->save();

        $request->session()->flash('message','<div class="alert alert-success">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                              <strong>Inseted!</strong>.
                                            </div>');

        return back();
    }

    public function edit($id)
    {
        $pro = Product::find($id);
        return view('admin.status.main.products.edit_product', compact('pro'));
    }

    public function update(Request $request,$id)
    {
        $pro = Product::find($id);
        $pro->ProductName       = $request->input('txtName');
        $pro->Pro_Description   = $request->input('Description');
        $pro->UserID            = Auth::user()->id;
        $pro->userName          = Auth::user()->name;
        $pro->save();

        $request->session()->flash('message','<div class="alert alert-success">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                              <strong>Update Succes</strong>.
                                            </div>');

        return back();
    }

    public function delete($id)
    {
        $pro = Product::find($id);
        $pro->delete();
        
        return back();
    }

    public function detail($id)
    {
        $pro = Product::find($id);
        
        return view('admin.status.main.products.detail', compact('pro'));

    }

    public function search(Request $request)
    {
        $key = $request->get('txtSearch');
        // $key = $request->input('txtSearch');
       $pros = Product::where('ProductID',"=", $key)
                            ->orwhere('ProductName','like','%'.$key.'%')
                            ->orwhere('Pro_Description','like','%'.$key.'%')
                            ->orderBy('ProductID','DESC')
                            ->paginate(2);
        return view('admin.status.main.products.product_list',compact('pros'));
    }
}
