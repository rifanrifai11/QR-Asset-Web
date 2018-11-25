<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\CreateVendorRequest;
use App\Http\Requests\UpdateVendorRequest;
use App\Models\Vendor;
use App\Repositories\VendorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class VendorController extends AppBaseController
{

    public function getVendor(Request $request){
        $nama=$request->only('name');
        $data=Vendor::where('nama',$nama)->first();
        return response()->json($data);
    }
}
