<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;

class CategoryController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $categories = Category::where('parent_id', 0)->get();

        $allCategories = Category::all();

        return view('category.index',compact('categories','allCategories'));
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $data = $request->all();
        $data['parent_id'] = empty($request->parent_id) ? 0 : $request->parent_id;

        Category::create($data);
        return back()->withSuccess('New Category added successfully.');

    }

    /** 
     * Fetch Catefories with child id
     */
    public function getCategories($id)
    {
        $childs = Category::where('parent_id', $id)->get();

        return view('category.tree', compact('childs'));
    }
}
