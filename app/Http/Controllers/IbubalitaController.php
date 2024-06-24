<?php

namespace App\Http\Controllers;

use App\Charts\DetailChart;
use App\Charts\DetailChart2;
use App\Charts\DetailChart3;
use App\Charts\DetailChart4;
use App\Models\Danak;
use App\Models\Dbulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IbubalitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dbulans = Dbulan::all();
        return view('ibubalita.ekms', compact('dbulans'));
    }

    public function getData(Request $request)
    {
        $nik_anak = $request->input('nik_anak');

        // Subquery to get the first record per danaks_id
        $subquery = DB::table('dbulans')
            ->select('dbulans.*')
            ->whereIn('id', function ($query) {
                $query->select(DB::raw('MIN(id)'))
                    ->from('dbulans')
                    ->groupBy('danaks_id');
            });

        // Main query to get data with relations
        $dbulanans = Dbulan::fromSub($subquery, 'dbulans')
            ->with('danaks')
            ->whereHas('danaks', function ($query) use ($nik_anak) {
                $query->where('nik_anak', $nik_anak);
            });

        if ($request->ajax()) {
            return datatables()->of($dbulanans)
                ->addIndexColumn()
                ->addColumn('actionsekms', function ($dbulanan) {
                    return view('actions.actionekms', compact('dbulanan'));
                })
                ->toJson();
        }
    }


    // app/Http/Controllers/IbubalitaController.php

    public function validateAnak(Request $request)
    {
        $nik_anak = $request->input('nik_anak');
        $hp_ortu = $request->input('hp_ortu');

        // Validate the inputs
        $danak = Danak::where('nik_anak', $nik_anak)->where('hp_ortu', $hp_ortu)->first();

        if ($danak) {
            return response()->json(['valid' => true]);
        } else {
            return response()->json(['valid' => false]);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(
        string $danaks_id,
        DetailChart $chart,
        DetailChart2 $chart2,
        DetailChart3 $chart3,
        DetailChart4 $chart4,
    ) {
        // ELOQUENT
        $title = "E-KMS Anak";
        $danak = Danak::findOrFail($danaks_id);

        $dbulanans = Dbulan::where('danaks_id', $danaks_id)->orderBy('created_at', 'asc')->get();
        $danaks = Danak::all();

        // Extract umur_tahun and umur_bulan values from dbulans
        $umur_tahun = $dbulanans->pluck('umur_tahun')->toArray();
        $umur_bulan = $dbulanans->pluck('umur_bulan')->toArray();
        $bb_anak = $dbulanans->pluck('bb_anak')->toArray();
        $tb_anak = $dbulanans->pluck('tb_anak')->toArray();
        $lk_anak = $dbulanans->pluck('lk_anak')->toArray();

        return view(
            'actions.detailekms',
            compact('dbulanans', 'title', 'danaks'),
            [
                'chart' => $chart->build($danak->jk, $umur_tahun, $umur_bulan, $bb_anak),
                'chart2' => $chart2->build($danak->jk, $umur_tahun, $umur_bulan, $tb_anak),
                'chart3' => $chart3->build($danak->jk, $tb_anak, $bb_anak),
                'chart4' => $chart4->build($danak->jk, $umur_tahun, $umur_bulan, $lk_anak),
            ]
            // ['chart2' => $chart2->build()]
        );
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
