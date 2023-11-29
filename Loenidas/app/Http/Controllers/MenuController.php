<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuCategory;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->menu();
    }

    private function menu()
    {
        $menus = Menu::all();
        return view('admin.menu', compact('menus'));
    }
    public function menuCategory()
    {
        $categories = MenuCategory::select([
            'menu_category.*',
            DB::raw('(SELECT COUNT(*) FROM menus WHERE menus.menu_category_id = menu_category.id) AS reference_count')
          ])
            ->with('menus')
            ->get();
        return view('admin.menuCategory', compact('categories'));
    }

    public function addMenuCategory(Request $request)
    {
      $validated = $request->validate([
        'name' => 'required|unique:menu_category'
      ]);
      MenuCategory::create([
        'name' => $validated['name']
      ]);
      return redirect('/menu/menuCategory');
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
