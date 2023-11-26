<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuCategory;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menu', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menuCategories = MenuCategory::all();
        return view('admin.menuAdd', compact ('menuCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuRequest $request)
    {
        $validatedData = $request->validated();


        $imagePath = $request->file('image')->store('menu', 'public');
    
        $menu = new Menu();
        $menu->fill([
            'menuName' => $validatedData['menuName'],
            'menu_categories_id' => $validatedData['menu_categories_id'],
            'price' => $validatedData['price'],
            'menuStatus' => $validatedData['menuStatus'],
            'image' => $imagePath,
        ]);
    

        $menu->save();
    
        alert()->success('success','Menu has been added');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
