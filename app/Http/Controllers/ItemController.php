<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Category;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        // foreach ($items as $item) {
        //     $item->image = json_decode($item->image, true);
        // }
        // return $items;
        return view('item.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('item.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        //single image upload
        if ($request->image) {
            $file = $request->image;
            $newFile = "item_image" . uniqid() . "." . $file->getClientOriginalExtension();
            // $file->move(public_path('itemImages'), $newFile);
            $file->storeAs('public/itemImages', $newFile);
        }
        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->category_id = $request->category_id;
        $item->status = $request->status;
        $item->description = $request->description;
        $item->image = $newFile;
        $item->save();
        return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('item.detail', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('item.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->status = $request->status;
        $item->category_id = $request->category_id;
        $item->description = $request->description;

        //single image upload
        if ($request->image) {
            $file = $request->image;
            $newFile = "item_image" . uniqid() . "." . $file->getClientOriginalExtension();
            // $file->move(public_path('itemImages'), $newFile);
            $file->storeAs('public/itemImages', $newFile);
            $item->image = $newFile;
        }
        $item->update();
        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return back();
    }
}
