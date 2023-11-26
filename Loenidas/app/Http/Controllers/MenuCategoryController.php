<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use App\Http\Requests\StoreMenuCategoryRequest;
use App\Http\Requests\UpdateMenuCategoryRequest;

class MenuCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menuCategories = MenuCategory::all();
        return view('admin.menuCategory', compact('menuCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.menuCategoryAdd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuCategoryRequest $request)
    {
        $validatedData = $request->validated();
    
        $MenuCategory = new MenuCategory();
        $MenuCategory->fill([
            'menuCategoryName' => $validatedData['menuCategoryName']
        ]);

        $MenuCategory->save();

        alert()->success('success','Menu Category has been added');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuCategory $menuCategory)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuCategory $menuCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuCategoryRequest $request, MenuCategory $menuCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuCategory $menuCategory)
    {
        //
    }
}
