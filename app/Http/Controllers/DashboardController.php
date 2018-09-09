<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
    	return view('dashboard.dashboard');
    }

    public function cariWilayah(Request $request)
    {
    	
		$q = $request->input('term');
		$wilayah = \DB::table('villages')
            ->join('districts', 'districts.id', '=', 'villages.district_id')
            ->join('regencies', 'regencies.id', '=', 'districts.regency_id')
            ->join('provinces', 'provinces.id', '=', 'regencies.province_id')
            ->select('villages.id', 'villages.name as kelurahan','districts.name as kecamatan','regencies.name as kabupaten','provinces.name as provinsi')
            ->where('villages.name','LIKE','%'.$q.'%')
            ->orWhere('districts.name','LIKE','%'.$q.'%')
            ->orWhere('regencies.name','LIKE','%'.$q.'%')
            ->orWhere('provinces.name','LIKE','%'.$q.'%')
            ->get();

        $data = [];

        foreach ($wilayah as $key => $value) {
        	$full = $value->kelurahan.', '.$value->kecamatan.', '.$value->kabupaten.', '.$value->provinsi;
        	$data[$key] = array('id' => $value->id, 'value'=>$full);
        	
        }
        return response()->json($data);			
    }

    public function pagebuilder()
    {
        return view('dashboard.pagebuilder');
    }
}
