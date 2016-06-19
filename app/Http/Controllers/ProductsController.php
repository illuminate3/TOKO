<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use File;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

use App\Product;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    /**
     * Method delete file image
     * @param   $id 
     * @return action
     */
    public function deleteFile($id)
    {
        $product = Product::find($id);
        // hapus image lama, jika ada
        if ($product->image) {
            $old_cover = $product->image;
            $filepath = public_path() . DIRECTORY_SEPARATOR . 'img'
            . DIRECTORY_SEPARATOR . $product->image;
            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) {
                // File sudah dihapus/tidak ada
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('id','desc')->paginate(4);
        return view('products.index')->with(compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->except('image'));

        // isi field image jika ada image yang diupload
        if ($request->hasFile('image')) {

            // Mengambil file yang diupload
            $uploaded_image = $request->file('image');

            // mengambil extension file
            $extension = $uploaded_image->getClientOriginalExtension();

            // membuat nama file random berikut extension
            $filename = md5(time()) . '.' . $extension;

            // menyimpan image ke folder public/img
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
            $uploaded_image->move($destinationPath, $filename);

            // mengisi field image di product dengan filename yang baru dibuat
            $product->image = $filename;
            $product->save();
        }

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $product->name"
            ]);
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit')->with(compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->except('image'));

        if ($request->hasFile('image')) {
            // menambil image yang diupload berikut ekstensinya
            $filename = null;
            $uploaded_image = $request->file('image');
            $extension = $uploaded_image->getClientOriginalExtension();

            // membuat nama file random dengan extension
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';

            // memindahkan file ke folder public/img
            $uploaded_image->move($destinationPath, $filename);

            $this->deleteFile($id);

            // ganti field image dengan image yang baru
            $product->image = $filename;
            $product->save();
        }

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $product->name"
            ]);
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $this->deleteFile($id);

        $product->delete();

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Produk berhasil dihapus."
        ]);

        return redirect()->route('admin.products.index');
    }
}
