<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\POStatus;
use App\Origin;
use App\Manufacturer;
use App\Order;
use App\Supplier;
use App\POD;
use App\Incoterm;
use App\ContainerSize;
use App\CertificateOfOrigin;
use App\PaymentTerm;
use App\TypeOfShipmentDetail;
use App\Product;
use App\WeightUnit, App\Packing, App\Binding, App\OrderDetail;
class CatalogController extends Controller
{
    public function catalog()
    {
    	$poStatuses = Cache::remember('po-status', 60, function () {
            return POStatus::all();
        });
        $origins = Cache::remember('origin', 60, function () {
            return Origin::all();
        });
        $manufacturers = Cache::remember('manufacturers', 60, function () {
            return Manufacturer::all();
        });
        $suppliers = Cache::remember('suppliers', 60, function () {
            return Supplier::all();
        });
        $pods = Cache::remember('pods', 60, function () {
            return POD::all();
        });
        $incoterms = Cache::remember('incoterms', 60, function () {
            return Incoterm::all();
        });
        $containerSizes = Cache::remember('containerSizes', 60, function () {
            return ContainerSize::all();
        });
        $cos = Cache::remember('cos', 60, function () {
            return CertificateOfOrigin::all();
        });
        $paymentTerms = Cache::remember('paymentTerms', 60, function () {
            return PaymentTerm::all();
        });
        
        $products = Cache::remember('products', 60, function () {
            return Product::all();
        });
        
        $weightUnits = Cache::remember('weightUnits', 60, function () {
            return WeightUnit::all();
        });
        
        $packings = Cache::remember('packings', 60, function () {
            return Packing::all();
        });
        
        $bindings = Cache::remember('bindings', 60, function () {
            return Binding::all();
        });
        $catalogs = ['weight-unit' => $weightUnits, 'packing' => $packings, 'binding' => $bindings, 'po-status' => $poStatuses, 'origin' => $origins, 'manufacturer' => $manufacturers, 'supplier' => $suppliers, 'POD' => $pods, 'incoterm' => $incoterms, 'container-size' => $containerSizes, 'CO' => $cos, 'payment-term' => $paymentTerms, 'product' => $products,];
       	
       	try {
	       	return response()->json($catalogs);

       	} 
       	catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
       		return response()->json(['error' => $e->getMessage()]);
       	}
    }
}
