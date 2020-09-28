<?php

namespace App\Http\Controllers;

use App\Iklan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class IklanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Iklan::all();
        if(request()->ajax()) {
            return datatables()->of($data)
            ->editColumn('gambar', function($data){
                return '<img src="' . asset($data->gambar) .'" height="200" alt="gambar" />';
            })
            ->addColumn('action', function($data){
                $urlDelete = route('iklan.destroy', $data->id);
                return view('dashboard.iklan.action', compact('urlDelete'));
            })
            // ->addColumn('status', function($data){
            //     if($data->isActive){
            //         return '<button class="btn btn-sm btn-primary">Aktif</button>';
            //     }{
            //         return '<button class="btn btn-sm btn-danger">Nonaktif</button>';
            //     }
            // })
            ->addIndexColumn()
            ->rawColumns([
                'gambar',
             'action',
            //  'status'
             ])
            ->make(true);
        }
        $menu = 'Iklan';
        $submenu = 'index';
        $pagename = 'Iklan';
        return view('dashboard.iklan.index', compact('menu', 'submenu', 'pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type ='add';
        $menu = 'Iklan';
        $submenu = 'index';
        $pagename = 'Iklan';
        return view('dashboard.iklan.form', compact('menu', 'submenu', 'pagename', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if(!$validate){
            return redirect()->back()->withInput($request->all());
        }

        if ($files = $request->file('file')) {
            $destinationPath = public_path('/img/uploads/');
            $Image = date('YmdHis') . Str::random(5) . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $Image);
            $request['gambar'] = '/img/uploads' . '/' . $Image;
         }
         $request['status'] = 1;
         Iklan::create($request->all());
         return redirect()->route('iklan.index')->with('success', 'Iklan berhasil disimpan!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $iklan = Iklan::findOrfail($id);
        $iklan->delete();
        return redirect()->route('iklan.index')->with('success', 'Iklan berhasil dihapus!');
    }
}
