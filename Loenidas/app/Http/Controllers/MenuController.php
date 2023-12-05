<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuCategory;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Http\Requests\addmenuRequest;
use App\Http\Requests\StoreMenuCategory;
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

    public function addMenuForm()
{
    $categories = MenuCategory::all();
    return view('admin.menuAdd', compact ('categories'));
}

public function addMenu(addmenuRequest $request)
{
    // dd($request->all());
    // $validated = $request->validate([
    //     'menuName' => 'required|string',
    //     // 'menu_category_id' => 'required|numeric|exists:menu_category,id',
    //     'menu_category_id' => 'required|integer',
    //     'price' => 'required|numeric|min:0.01',
    //     'menuStatus' => 'required|in:Available,Unavailable',
    //     'image' => 'required|image',
    //   ]);
    $validatedData = $request->validated();
    $imagePath = $validatedData['image']->store('menus_images', 'public');

    // dd($request->all());
        Menu::create([
        'menuName' => $validatedData['menuName'],
        'menu_category_id' => $validatedData['menu_category_id'],
        'price' => $validatedData['price'],
        'menuStatus' => $validatedData['menuStatus'],
        'image' => $imagePath
        ]);
    
      return redirect('/menu');
}

public function menuDetails($id)
{

    $menu = Menu::find($id);

    return view('admin.menuDetails', compact('menu'));
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

    public function addMenuCategory(StoreMenuCategory $request)
    {

        $validatedData = $request->validated();
        $imagePath = $validatedData['image']->store('menu_category_images', 'public');

      MenuCategory::create([
        'name' => $validatedData['name'],
        'image' => $imagePath
      ]);
      return redirect('/menu/menuCategory');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $categories = MenuCategory::all();
        // return view('admin.menuAdd', compact ('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuRequest $request)
    {
        // $validatedData = $request->validated();
        // Menu::create($validatedData);
    
        // return redirect('/menu');
    
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
