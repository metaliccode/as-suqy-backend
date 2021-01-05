<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Models\ProductGallery;

use Illuminate\Http\Request;
use Illuminate\Support\Str;



class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // nampilin semua product dalam table (view)
        $items = Product::all();

        return view('pages.products.index')->with([
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //redairect tombol submit 
        return view('pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //membuat requst ketentuan yang ada di Request
        $data = $request->all();
        //untuk url-bla-bla
        $data['slug'] = Str::slug($request->name);
        //insert data ke table
        Product::create($data);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //edit-> mengambil data dengan kondisi $id
        $item = Product::findOrFail($id);

        return view('pages.products.edit')->with([
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        // cek data request
        $data = $request->all();
        $data['slug'] = str::slug($request->name);

        // insert --> update data lama
        $item = Product::findOrFail($id);
        $item->update($data);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //select delete -> $id -> kondisi 
        $item = Product::findOrFail($id);
        $item->delete();

        //Kondisi -> delete cascade if product was deleted than products_galleries are deleted
        ProductGallery::where('products_id', $id)->delete();

        return redirect()->route('products.index');
    }

    // fungsi untuk menampilkan foto detail
    public function gallery(Request $request, $id)
    {
        // untuk cek apakah data ada ?
        $product = Product::findOrFail($id);
        $items = ProductGallery::with('product')
            ->where('products_id', $id)
            ->get();

        return view('pages.products.gallery')->with([
            'product' => $product,
            'items' => $items
        ]);
    }
}
