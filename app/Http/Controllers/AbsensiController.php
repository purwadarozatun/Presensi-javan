<?php

namespace absensi_javan\Http\Controllers;

use Illuminate\Http\Request;

use absensi_javan\Http\Requests;
use absensi_javan\Http\Controllers\Controller;
use Carbon\Carbon;
use absensi_javan\Absensi_Raw;
use absensi_javan\Absensi_Rekap;
use DB;
use DateTime;
use App\Model\Game;

class AbsensiController extends Controller
{
    public function index(){
        $untuk_row = DB::table('absensi_users')->count();

    	$tahun = Carbon::now()->format('Y');
    	$bulan = Carbon::now()->format('m');
    	$hari = Carbon::now()->format('d');
      $show = DB::table('absensi_rekap')
       ->join('absensi_users', function ($join) {
           $join->on('absensi_rekap.absensi_pin', '=', 'absensi_users.absensi_pin');
       })->select('absensi_rekap.*', 'absensi_users.absensi_nama_lengkap', 'absensi_users.id')
       ->orderBy('absensi_rekap.absensi_masuk', 'asc')
       ->whereNotNull('absensi_rekap.absensi_masuk')
       ->where(  DB::raw('YEAR(absensi_rekap.absensi_tanggal)'), '=', date($tahun) )
           ->where( DB::raw('MONTH(absensi_rekap.absensi_tanggal)'), '=', date($bulan) )
               ->where( DB::raw('DAY(absensi_rekap.absensi_tanggal)'), '=', date($hari) )
                      ->where('absensi_rekap.absensi_masuk', '<=', '8')
       ->get();
    	return view('Absen', compact('show','untuk_row'));
    }

    public function indexjammasukterlambat(){
      $untuk_row = DB::table('absensi_users')->count();

      $tahun = Carbon::now()->format('Y');
      $bulan = Carbon::now()->format('m');
      $hari = Carbon::now()->format('d');
      $show = DB::table('absensi_rekap')
       ->join('absensi_users', function ($join) {
           $join->on('absensi_rekap.absensi_pin', '=', 'absensi_users.absensi_pin');
       })->select('absensi_rekap.*', 'absensi_users.absensi_nama_lengkap', 'absensi_users.id')
       ->orderBy('absensi_rekap.absensi_masuk', 'desc')
       ->whereNotNull('absensi_rekap.absensi_masuk')
       ->where(  DB::raw('YEAR(absensi_rekap.absensi_tanggal)'), '=', date($tahun) )
           ->where( DB::raw('MONTH(absensi_rekap.absensi_tanggal)'), '=', date($bulan) )
               ->where( DB::raw('DAY(absensi_rekap.absensi_tanggal)'), '=', date($hari) )
       ->get();
     
      
      return view('Absen', compact('show','untuk_row'));
    }

    public function indexjamkeluar(){
      $untuk_row = DB::table('absensi_users')->count();

      $tahun = Carbon::now()->format('Y');
      $bulan = Carbon::now()->format('m');
      $hari = Carbon::now()->format('d');
      $show = DB::table('absensi_rekap')
       ->join('absensi_users', function ($join) {
           $join->on('absensi_rekap.absensi_pin', '=', 'absensi_users.absensi_pin');
       })->select('absensi_rekap.*', 'absensi_users.absensi_nama_lengkap', 'absensi_users.id')
       ->orderBy('absensi_rekap.absensi_keluar', 'asc')
       ->whereNotNull('absensi_rekap.absensi_masuk')
       ->where(  DB::raw('YEAR(absensi_rekap.absensi_tanggal)'), '=', date($tahun) )
           ->where( DB::raw('MONTH(absensi_rekap.absensi_tanggal)'), '=', date($bulan) )
               ->where( DB::raw('DAY(absensi_rekap.absensi_tanggal)'), '=', date($hari) )
       ->get();
      return view('Absen', compact('show','untuk_row'));
    }

    public function indexnama(){
      $untuk_row = DB::table('absensi_users')->count();

      $tahun = Carbon::now()->format('Y');
      $bulan = Carbon::now()->format('m');
      $hari = Carbon::now()->format('d');
      $show = DB::table('absensi_rekap')
       ->join('absensi_users', function ($join) {
           $join->on('absensi_rekap.absensi_pin', '=', 'absensi_users.absensi_pin');
       })->select('absensi_rekap.*', 'absensi_users.absensi_nama_lengkap', 'absensi_users.id')
       ->orderBy('absensi_users.absensi_nama_lengkap', 'asc')
       ->whereNotNull('absensi_rekap.absensi_masuk')
       ->where(  DB::raw('YEAR(absensi_rekap.absensi_tanggal)'), '=', date($tahun) )
           ->where( DB::raw('MONTH(absensi_rekap.absensi_tanggal)'), '=', date($bulan) )
               ->where( DB::raw('DAY(absensi_rekap.absensi_tanggal)'), '=', date($hari) )
       ->get();
      return view('Absen', compact('show','untuk_row'));
    }

    public function indextidakmasuk(){
      $untuk_row = DB::table('absensi_users')->count();

      $tahun = Carbon::now()->format('Y');
      $bulan = Carbon::now()->format('m');
      $hari = Carbon::now()->format('d');
      $show = DB::table('absensi_rekap')
       ->join('absensi_users', function ($join) {
           $join->on('absensi_rekap.absensi_pin', '=', 'absensi_users.absensi_pin');
       })->select('absensi_rekap.*', 'absensi_users.absensi_nama_lengkap', 'absensi_users.id')
       ->orderBy('absensi_users.absensi_nama_lengkap', 'asc')
       ->whereNull('absensi_rekap.absensi_masuk')
       ->where(  DB::raw('YEAR(absensi_rekap.absensi_tanggal)'), '=', date($tahun) )
           ->where( DB::raw('MONTH(absensi_rekap.absensi_tanggal)'), '=', date($bulan) )
               ->where( DB::raw('DAY(absensi_rekap.absensi_tanggal)'), '=', date($hari) )
       ->get();
      return view('Absen', compact('show','untuk_row'));

    }

    public function cobaangularjs(){
      $untuk_row = DB::table('absensi_users')->count();

      $tahun = Carbon::now()->format('Y');
      $bulan = Carbon::now()->format('m');
      $hari = Carbon::now()->format('d');
      $show = DB::table('absensi_rekap')
       ->join('absensi_users', function ($join) {
           $join->on('absensi_rekap.absensi_pin', '=', 'absensi_users.absensi_pin');
       })->select('absensi_rekap.*', 'absensi_users.absensi_nama_lengkap', 'absensi_users.id')
       ->orderBy('absensi_rekap.absensi_masuk', 'asc')
       ->having('absensi_rekap.absensi_masuk', '<', '8')
       ->whereNotNull('absensi_rekap.absensi_masuk')
       ->where(  DB::raw('YEAR(absensi_rekap.absensi_tanggal)'), '=', date($tahun) )
           ->where( DB::raw('MONTH(absensi_rekap.absensi_tanggal)'), '=', date($bulan) )
               ->where( DB::raw('DAY(absensi_rekap.absensi_tanggal)'), '=', date($hari) )
       ->get();
       $json = json_encode($show);

       
      return view('Absensi_Javan.AngilarJSIndex', compact('json'));
    }

    public function cari(Requests\Tanggal $request){
      $untuk_row = DB::table('absensi_users')->count();
      $input = $request->get('cari');
      $inputan = new DateTime($input);
      $tahun = $inputan->format('Y');
      $bulan = $inputan->format('m');
      $hari = $inputan->format('d');
      $show = DB::table('absensi_rekap')
       ->join('absensi_users', function ($join) {
           $join->on('absensi_rekap.absensi_pin', '=', 'absensi_users.absensi_pin');
       })->select('absensi_rekap.*', 'absensi_users.absensi_nama_lengkap', 'absensi_users.id')
       ->orderBy('absensi_rekap.absensi_masuk', 'asc')
       ->whereNotNull('absensi_rekap.absensi_masuk')
       ->where(  DB::raw('YEAR(absensi_rekap.absensi_tanggal)'), '=', date($tahun) )
           ->where( DB::raw('MONTH(absensi_rekap.absensi_tanggal)'), '=', date($bulan) )
               ->where( DB::raw('DAY(absensi_rekap.absensi_tanggal)'), '=', date($hari) )
                      ->where('absensi_rekap.absensi_masuk', '<=', '8')
       ->get();
      return view('Absensi_Javan.AbsenTanggal', compact('show','untuk_row','input'));
    }

    public function indextanggal($input){
      $untuk_row = DB::table('absensi_users')->count();
      $show = $this->getData('absensi_masuk' , 'asc' , $input);
      return view('Absensi_Javan.AbsenTanggal', compact('show','untuk_row','input'));
    }

    public function indexjammasukterlambattanggal($input){
      $untuk_row = DB::table('absensi_users')->count();
      $show = $this->getData('absensi_masuk' , 'desc' , $input);
      return view('Absensi_Javan.AbsenTanggal', compact('show','untuk_row','input'));
    }

    public function indexjamkeluartanggal($input){
      $untuk_row = DB::table('absensi_users')->count();
      $inputan = new DateTime($input);
      $tahun = $inputan->format('Y');
      $bulan = $inputan->format('m');
      $hari = $inputan->format('d');
      $show = DB::table('absensi_rekap')
       ->join('absensi_users', function ($join) {
           $join->on('absensi_rekap.absensi_pin', '=', 'absensi_users.absensi_pin');
       })->select('absensi_rekap.*', 'absensi_users.absensi_nama_lengkap', 'absensi_users.id')
       ->orderBy('absensi_rekap.absensi_keluar', 'asc')
       ->whereNotNull('absensi_rekap.absensi_masuk')
       ->where(  DB::raw('YEAR(absensi_rekap.absensi_tanggal)'), '=', date($tahun) )
           ->where( DB::raw('MONTH(absensi_rekap.absensi_tanggal)'), '=', date($bulan) )
               ->where( DB::raw('DAY(absensi_rekap.absensi_tanggal)'), '=', date($hari) )
       ->get();
      return view('Absensi_Javan.AbsenTanggal', compact('show','untuk_row','input'));
    }

    public function indexnamatanggal($input){
      $untuk_row = DB::table('absensi_users')->count();
      $inputan = new DateTime($input);
      $tahun = $inputan->format('Y');
      $bulan = $inputan->format('m');
      $hari = $inputan->format('d');
      $show = DB::table('absensi_rekap')
       ->join('absensi_users', function ($join) {
           $join->on('absensi_rekap.absensi_pin', '=', 'absensi_users.absensi_pin');
       })->select('absensi_rekap.*', 'absensi_users.absensi_nama_lengkap', 'absensi_users.id')
       ->orderBy('absensi_users.absensi_nama_lengkap', 'asc')
       ->whereNotNull('absensi_rekap.absensi_masuk')
       ->where(  DB::raw('YEAR(absensi_rekap.absensi_tanggal)'), '=', date($tahun) )
           ->where( DB::raw('MONTH(absensi_rekap.absensi_tanggal)'), '=', date($bulan) )
               ->where( DB::raw('DAY(absensi_rekap.absensi_tanggal)'), '=', date($hari) )
       ->get();
      return view('Absensi_Javan.AbsenTanggal', compact('show','untuk_row','input'));
    }

    public function indextidakmasuktanggal($input){
      $untuk_row = DB::table('absensi_users')->count();
      $inputan = new DateTime($input);
      $tahun = $inputan->format('Y');
      $bulan = $inputan->format('m');
      $hari = $inputan->format('d');
      $show = DB::table('absensi_rekap')
       ->join('absensi_users', function ($join) {
           $join->on('absensi_rekap.absensi_pin', '=', 'absensi_users.absensi_pin');
       })->select('absensi_rekap.*', 'absensi_users.absensi_nama_lengkap', 'absensi_users.id')
       ->orderBy('absensi_users.absensi_nama_lengkap', 'asc')
       ->whereNull('absensi_rekap.absensi_masuk')
       ->where(  DB::raw('YEAR(absensi_rekap.absensi_tanggal)'), '=', date($tahun) )
           ->where( DB::raw('MONTH(absensi_rekap.absensi_tanggal)'), '=', date($bulan) )
               ->where( DB::raw('DAY(absensi_rekap.absensi_tanggal)'), '=', date($hari) )
       ->get();
      return view('Absensi_Javan.AbsenTanggal', compact('show','untuk_row','input'));

    }

    private function getData($orderBy ,$order ,$input){
      $tahun = Carbon::now()->format('Y');
      $bulan = Carbon::now()->format('m');
      $hari = Carbon::now()->format('d');
      $show = DB::table('absensi_rekap')
       ->join('absensi_users', function ($join) {
           $join->on('absensi_rekap.absensi_pin', '=', 'absensi_users.absensi_pin');
       })->select('absensi_rekap.*', 'absensi_users.absensi_nama_lengkap', 'absensi_users.id')
       ->orderBy('absensi_rekap.' . $orderBy, $order)
       ->whereNotNull('absensi_rekap.absensi_masuk')
       ->where(  DB::raw('YEAR(absensi_rekap.absensi_tanggal)'), '=', date($tahun) )
           ->where( DB::raw('MONTH(absensi_rekap.absensi_tanggal)'), '=', date($bulan) )
               ->where( DB::raw('DAY(absensi_rekap.absensi_tanggal)'), '=', date($hari) )
       ->get();
       return $show;
    }



}
