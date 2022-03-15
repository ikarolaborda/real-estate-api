<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RealEstate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RealEstateController extends Controller
{

    private $realEstate;

    public function __construct(RealEstate $realEstate)
    {
        $this->realEstate = $realEstate;
    }

    public function index():JsonResponse
    {
        $realEstate = $this->realEstate->paginate(10);
        return response()->json($realEstate, 200);
    }

    public function create(Request $request):JsonResponse
    {
        $success = false;
        $data = $request->all();
        try {
            if($realEstate = $this->realEstate->create($data)) {
                $success = $realEstate;
            }
        }catch(\Exception $e) { return response()->json([
           'error' => $e->getMessage()
        ],404);}
        return response()->json(['success' => $success, 'message' => 'Propriedade cadastrada com sucesso!'],200);
    }
}
