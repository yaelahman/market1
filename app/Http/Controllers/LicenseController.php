<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\License;
use App\LogRequestLicense;
use Illuminate\Support\Facades\DB;

class LicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $license = License::orderBy('id', 'desc')->get();
        foreach ($license as $row) {
            $update = License::find($row->id);
            if (strtotime(date('Y-m-d', strtotime($row->duration))) < strtotime(date('Y-m-d'))) {
                $update->status = 0;
                $update->save();
            }
        }
        $license = License::orderBy('id', 'desc')->get();

        $data = [
            'license' => $license
        ];

        return view('license.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('license.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $license = new License();
            $license->name = $request->name;
            $license->address = $request->address;
            $license->duration = $request->duration;
            $status = strtotime(date('Y-m-d', strtotime($license->duration))) >= strtotime(date('Y-m-d')) ? 1 : 0;
            $license->status = $status;

            if ($license->save()) {
                $request->session()->flash('alert', 'success');
                $request->session()->flash('message', 'License created successfully');

                DB::commit();
                return redirect()->to(route('license.index'));
            }
        } catch (\Exception $e) {
            throw $e;
            return redirect()->to(route('license.index'));
        }
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
        $license = License::find($id);

        $data = [
            'license' => $license
        ];

        return view('license.edit', $data);
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
        DB::beginTransaction();
        try {
            $license = License::find($id);
            $license->name = $request->name;
            $license->address = $request->address;
            $license->duration = $request->duration;
            $status = strtotime(date('Y-m-d', strtotime($license->duration))) >= strtotime(date('Y-m-d')) ? 1 : 0;
            $license->status = $status;

            if ($license->save()) {
                $request->session()->flash('alert', 'success');
                $request->session()->flash('message', 'License updated successfully');

                DB::commit();
                return redirect()->to(route('license.index'));
            }
        } catch (\Exception $e) {
            throw $e;
            return redirect()->to(route('license.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $license = License::find($id);

        LogRequestLicense::where('id_license', $id)->delete();

        if ($license->delete()) {
            $request->session()->flash('alert', 'success');
            $request->session()->flash('message', 'License deleted successfully');
            return redirect()->to(route('license.index'));
        }
    }

    public function checkAddress(Request $request)
    {
        $license = License::where('address', $request->address)->first();

        if ($license != null) {
            if (strtotime(date('Y-m-d', strtotime($license->duration))) < strtotime(date('Y-m-d'))) {

                return response()->json([
                    'status' => 200,
                    'message' => 'Address not whitelisted'
                ]);
            }

            $log = new LogRequestLicense();
            $log->id_license = $license->id;
            $log->save();

            $date1 = date_create_from_format('Y-m-d', date('Y-m-d', strtotime($license->duration)));
            $date2 = date_create_from_format('Y-m-d', date('Y-m-d'));

            //Create a comparison of the two dates and store it in an array:
            $sisa = (array) date_diff($date1, $date2);
            $sisa = $sisa['d'];

            return response()->json([
                'status' => 200,
                'message' => "Address is whitelisted ( $sisa Hari )",
                'data' => $license
            ]);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Address not whitelisted'
        ]);
    }
}
