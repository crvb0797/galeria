<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $imagenes = File::where('user_id', auth()->user()->id)->paginate(20);
        return view('admin.files.index', compact('imagenes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.files.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*  $request->validate([
            'file' => 'required|image|max:2048'
        ]);

        $imagenes = $request->file('file')->store('public');
        $url = Storage::url($imagenes);

        File::create([
            'url' => $url
        ]);

        return redirect()->route('admin.file.index'); */

        $request->validate([
            'file' => 'required|image'
        ]);

        $date = Carbon::now();
        $new_date = $date->toDateString();

        $nombre = $new_date . "_" . $request->file('file')->getClientOriginalName();

        $ruta = storage_path() . "\app\public/" . $nombre;

        Image::make($request->file('file'))->save($ruta);

        File::create([
            'user_id' => auth()->user()->id,
            'url' => '/storage/' . $nombre
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($file)
    {
        return view('admin.files.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($file)
    {
        return view('admin.files.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        $file->delete();
        $url = str_replace('storage', 'public', $file->url);
        Storage::delete($url);
        return redirect()->route('admin.file.index')->with('delete', 'ok');
    }
}
