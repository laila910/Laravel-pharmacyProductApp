<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreAndUpdatePharmacyRequest;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Phar;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $allUsers=User::all();
        // $allRecords=Record::all();
        // return view('customers.index',['customers'=>Customer::latest()->paginate(20),'allUsers'=>$allUsers,'allRecords'=>$allRecords]);
     return view('pharmacies.index',['pharmacies'=>Pharmacy::latest()->paginate(20)]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pharmacies.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAndUpdatePharmacyRequest $request)
    {

        Pharmacy::create([
          'name'=>$request->name,
          'address'=>$request->address
        ]);
        return redirect()->route('pharmacies.dashboard')->with('success','Successfully created a New Pharmacy');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pharmacy $pharmacy)
    {
       
        return view('pharmacies.show',compact('pharmacy'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pharmacy $pharmacy)
    {
        return view('pharmacies.edit',compact('pharmacy'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAndUpdatePharmacyRequest $request, Pharmacy $pharmacy)
    {
        $pharmacy->update($request->validated());
       
        return back()->with('success', 'Successfully updated Pharmacy details!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pharmacy $pharmacy)
    {
        $pharmacy->delete();

        return redirect()->route('pharmacies.dashboard')->with('success','Successfuly deleted Pharmacy And All assets related to');
    }
    // public function addRecordAction(StoreAndUpdateRecordRequest $request){
         
    //     Record::create([
    //        'status'=>$request->status,
    //        'notes'=>$request->notes,
    //        'customer_id'=>$request->customer_id
    //     ]);
    //     return redirect()->route('customers.dashboard')->with('success','Successfully created a New Record To This Customer');


    // }
}
