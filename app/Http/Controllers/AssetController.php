<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Assets;

class AssetController extends Controller
{
    private $assets;

    public function __construct(Request $request, Assets $assets)
    {
        $this->assets = $assets;
    }

    public function index()
    {
        $assets = $this->assets->all();
        return view('assets.index')->with('assets', $assets);
    }

    public function create()
    {
        return view('assets.create');
    }

    public function store(Request $request)
    {
        $asset = new Assets;
        $asset->fill($request->all());
        $file = $request->file('filecontent');
        if (!empty($file)) {
            $asset->ClientOriginalName = $file->getClientOriginalName();
            $asset->ClientOriginalExtension = $file->getClientOriginalExtension();
            $asset->Size = $file->getSize();
            $asset->MimeType = $file->getMimeType();
            $asset->save();
            //Move Uploaded File
            $destinationPath = 'uploads';
            $file->move($destinationPath, $file->getClientOriginalName());
        }
        return redirect(route('myassets.index'));
    }

    public function edit($id)
    {
        $asset = $this->assets->find($id);
        return view('assets.edit')->with('asset', $asset);
    }

    public function update($id, Request $request)
    {
        $asset = $this->assets->find($id);

        $asset->fill($request->all());
        $file = $request->file('filecontent');
        if (!empty($file)) {
            $asset->ClientOriginalName = $file->getClientOriginalName();
            $asset->ClientOriginalExtension = $file->getClientOriginalExtension();
            $asset->Size = $file->getSize();
            $asset->MimeType = $file->getMimeType();
            $asset->save();
            $file->store('uploads', $file->getClientOriginalName());
        }

        return view('assets.show')->with('asset', $asset);
    }
    public function destroy($id)
    {
        $asset = $this->assets->find($id);
        if (!empty($asset)) {
            $asset->delete($id);
        }

        return redirect (route('myassets.index'));
    }

}
