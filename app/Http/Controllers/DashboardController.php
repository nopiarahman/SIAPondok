<?php

namespace App\Http\Controllers;
use App\santriwustha;
use App\nilai;
use App\periode;
use App\jadwalbelajar;
use App\pelanggaran;
use App\mapel;
use App\kelas;
use App\waliKelas;
use App\gurutahfidz;
use App\asatidzah;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Charts\ChartJenjang ;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $cekuser = auth()->user();
        $santriwustha=santriwustha::where('jenjang',jenjang())->get();
        $asatidzah=asatidzah::where('jenjang',jenjang())->get();
        $mapel=mapel::where('jenjang',jenjang())->get();
        $periode=periode::where('status','Aktif')->first();
        $waktu=carbon::now();
        $hari=$waktu->isoFormat('dddd');
        $jenjang =jenjang();
        if(auth()->user()->role=='waliSantri')
        {
            $santriwustha=santriwustha::where('emailWali','=',$cekuser->email)->first();
            // dd($santriwustha->kelas);
            $cekaktif=['santriwustha_id'=> $santriwustha->id,'periode_id'=>$periode->id];
            $nilaiaktif=nilai::where($cekaktif)->orderBy('mapel_id')->get();
            // dd($nilaiaktif);
            $jadwalbelajar = jadwalbelajar::where('kelas_id',$santriwustha->kelas_id)->get();
            return view ('dashboard/index',compact('cekuser','santriwustha','periode'));
        }
        elseif(auth()->user()->role=='asatidzah')
        {
            $cekasatidzah=asatidzah::where('user_id','=',$cekuser->id)->first();
            // dd($cekuser);
            $cekjadwalaktif=['asatidzah_id'=> $cekasatidzah->id,'periode_id'=>$periode->id,'jenjang'=>jenjang()];
            $cekjadwal=jadwalbelajar::where($cekjadwalaktif)->get();
            if($hari=='Minggu'){
                $jadwalHariIni=jadwalbelajar::where('hari','Ahad')
                                            ->where($cekjadwalaktif)
                                            ->get();
                // dd($jadwalHariIni);
            }else{
                $jadwalHariIni=jadwalbelajar::where('hari',$hari)
                                            ->where($cekjadwalaktif)
                                            ->get();
            }
            $cekwaliKelas=waliKelas::where('user_id',$cekuser->id)->first();
            $cekguruTahfidz=gurutahfidz::where('user_id',$cekuser->id)->first();
            // dd($cekguruTahfidz);
            return view ('dashboard/index',compact('cekuser','santriwustha','periode','cekjadwal','asatidzah','mapel','jadwalHariIni','cekwaliKelas'));
        }
        elseif(auth()->user()->role=='kepalaYayasan')
        {
            $santriwustha = santriwustha::all();
            $angkatanSmpPutra = $santriwustha->where('jenjang','smpPutra')->groupBy('angkatan')
                                ->map(function ($item){
                                    return count($item);
                                });
            $angkatanSd = $santriwustha->where('jenjang','sd')->groupBy('angkatan')
                                ->map(function ($item){
                                    return count($item);
                                });
            $angkatanSmaPutra = $santriwustha->where('jenjang','smaPutra')->groupBy('angkatan')
                                ->map(function ($item){
                                    return count($item);
                                });
            $angkatanSmpPutri = $santriwustha->where('jenjang','smpPutri')->groupBy('angkatan')
                                ->map(function ($item){
                                    return count($item);
                                });
            // dd($angkatanSmpPutra);

            /* Menggunakan  package Laravel-Chart lihat dokumentasi di https://v6.charts.erik.cat/*/
            $chartJenjang = new ChartJenjang;
            $chartJenjang->labels($angkatanSmpPutra->keys());
            // $chartJenjang->loaderColor('#1f81d1');
            /* Option chart untuk kostumisasi lihat di Library -> ChartJS https://www.chartjs.org/docs/latest/charts/line.html#line-styling */
            $chartJenjang->dataset('Salafiyah Wustha','line',$angkatanSmpPutra->values())
                            ->options(['borderColor' => '#4CAF50',
                                        'fill'=>false,       
                                        'backgroundColor'=>'transparent',
                                        'tension'=>0.3, 
                            ]);
            $chartJenjang->dataset('Salafiyah Uulaa','line',$angkatanSd->values())
                            ->options(['borderColor'=>'#FF5722',
                                        'fill'=>false,       
                                        'backgroundColor'=>'transparent',
                                        'tension'=>0.3,    
                            ]);
            $chartJenjang->dataset('Tahfidz Banaat','line',$angkatanSmpPutri->values())
                            ->options(['borderColor'=>'#9C27B0',
                                        'fill'=>false,       
                                        'backgroundColor'=>'transparent',
                                        'tension'=>0.3,    
                            ]);
            $chartJenjang->dataset('Salafiyah Ulyaa','line',$angkatanSmaPutra->values())
                            ->options(['borderColor'=>'dodgerblue',
                                        'fill'=>false,       
                                        'backgroundColor'=>'transparent',
                                        'tension'=>0.3,    
                            ]);
                                
            $chartGuru = new ChartJenjang;
            $asatidzah = asatidzah::all();
            $jenjang = $asatidzah->groupBy('jenjang')->map(function ($item){
                return count($item);
            });
            $updateNama=[];
            foreach($jenjang->keys() as $jk){
                $updateNama[]=tulisJenjang($jk);
            }
            // dd($updateNama);
            $chartGuru->labels($updateNama);
            $chartGuru->dataset('Jumlah Guru','bar',$jenjang->values())
            ->options([
                'backgroundColor'=>'#4CAF50',
            ]);
            
            /* Data Pondok */
            $jumlahUulaa = santriwustha::where('jenjang','sd')->where('status','aktif')->count();
            $jumlahWustha = santriwustha::where('jenjang','smpPutra')->where('status','aktif')->count();
            $jumlahBanaat = santriwustha::where('jenjang','smpPutri')->where('status','aktif')->count();
            $jumlahUlyaa = santriwustha::where('jenjang','smaPutra')->where('status','aktif')->count();
            
            $guruUulaa = asatidzah::where('jenjang','sd')->count();
            $guruWustha = asatidzah::where('jenjang','smpPutra')->count();
            $guruBanaat = asatidzah::where('jenjang','smpPutri')->count();
            $guruUlyaa = asatidzah::where('jenjang','smaPutra')->count();

            // dd($santriaktif);
            return view ('dashboard/index',compact('cekuser','chartJenjang','chartGuru','jumlahUulaa','jumlahWustha','jumlahBanaat','jumlahUlyaa','guruUulaa','guruWustha','guruBanaat','guruUlyaa'));
        }
        $kelas=kelas::where('jenjang',jenjang())->orderBy('namaKelas')->get();
            $namaKelas=[];
            $data=[];
            foreach($kelas as $ks)
            {
                $namaKelas[]=$ks->namaKelas;
                $data[]=santriwustha::where('kelas_id',$ks->id)
                                    ->where('jenjang',jenjang())  
                                    ->count();
            }
            // dd($namaKelas);
        /* return view untuk Admin */
        return view ('dashboard/index',compact('cekuser','santriwustha','periode','asatidzah','mapel','namaKelas','data','jenjang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
