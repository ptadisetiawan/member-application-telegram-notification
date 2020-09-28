<?php

namespace App\Http\Controllers;

use App\Iklan;
use App\Member;
use Illuminate\Http\Request;
use App\Imports\MembersImport;
use Maatwebsite\Excel\Facades\Excel;
use Telegram\Bot\Laravel\Facades\Telegram;

class MemberController extends Controller
{
    public function index(){
        $data = Member::all();
        if(request()->ajax()) {
            return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
        }
        $menu = 'Member';
        $submenu = 'index';
        $pagename = 'member';
        return view('dashboard.member.index', compact('menu', 'submenu', 'pagename'));
    }

    public function importPage(){
        $menu = 'member-import';
        $submenu = 'import';
        $pagename = 'member';
        return view('dashboard.member.import', compact('menu', 'submenu', 'pagename'));
    }

    public function import(Request $request){
          //VALIDASI
          $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file'); //GET FILE
            Excel::import(new MembersImport, $file); //IMPORT FILE
            return redirect()->back()->with(['success' => 'Upload success']);
        }
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }

    public function masuk(Request $request){
        $request->validate([
            'telepon' => 'required',
            'pin' => 'required'
        ]);
        $iklan = Iklan::all();

        try {
            $member = Member::where(['telepon' => $request->telepon])->first();
            $telepon = $member->telepon;
            $pin = substr($telepon, -4);
            if($pin === $request->pin){
                return view('detail', compact('member', 'iklan'));
            }else{
                return redirect()->back()->withErrors('4 digit terakhir nomor telepon anda salah')->withInput($request->all());
            }
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Nomor telepon anda tidak terdaftar')->withInput($request->all());
        }


    }

    public function daftar(){
        return view('register');
    }

    public function handleDaftar(Request $request){
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'telepon' => 'required|unique:members,telepon,{$request->telepon}',
            'tgl_lahir' => 'required'
        ]);
        $model = new Member();
        $daftar = $model->getDaftarCollection($request->all());
        $member = Member::create($daftar);
        $text = "Seseorang telah mendaftar sebagai member\n"
            . "<b>Kode: </b>\n"
            . "$member->kode\n"
            . "<b>Nama: </b>\n"
            . "$member->nama\n"
            . "<b>Alamat: </b>\n"
            . "$member->alamat\n"
            . "<b>Kota: </b>\n"
            . "$member->kota\n"
            . "<b>No. Hp: </b>\n"
            . "$member->telepon\n"
            . "<b>Tanggal lahir: </b>\n"
            . "$member->tgl_lahir\n"
            . "<b> Silahkan input data tersebut pada aplikasi Jeking </b>";

        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
            'parse_mode' => 'HTML',
            'text' => $text
        ]);
        return redirect()->route('index')->with('message', 'Pendaftaran berhasil, silahkan masuk dengan nomor telepon');
    }
}
