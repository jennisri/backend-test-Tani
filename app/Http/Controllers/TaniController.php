<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaniResource;
use App\Models\Tani;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tani = Tani::latest()->get();

        return new TaniResource('OK', $tani, $tani->count());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'berat_basah' => 'required',
            'drc' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $berat_kering = $request->berat_basah * $request->drc / 100;

        $tani = Tani::create([
            'berat_basah' => $request->berat_basah,
            'drc' => $request->drc,
            'berat_kering' => $berat_kering
        ]);

        if ($tani) {
            // return success with api resource
            return new TaniResource('Data Berhasil Disimpan', $tani, []);
        }

        return new TaniResource('Data Gagal Disimpan', null, []);
    }

    public function update(Request $request, Tani $tani)
    {
        $validator = Validator::make($request->all(), [
            'berat_basah' => 'required',
            'drc' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $berat_kering = $request->berat_basah * $request->drc / 100;

        $tani->update([
            'berat_basah' => $request->berat_basah,
            'drc' => $request->drc,
            'berat_kering' => $berat_kering
        ]);

        if ($tani) {
            // return success with api resource
            return new TaniResource('Data Berhasil Diupdate', $tani, []);
        }

        return new TaniResource('Data Gagal Diupdate', null, []);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tani $tani)
    {
        //
    }
}
