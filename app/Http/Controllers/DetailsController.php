<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Product;
use App\Models\Cart;
use Session;
use Illuminate\Support\Facades\DB;

class DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getInfo($tcin, $store_id)
    {
        $itemDetails = Http::withHeaders([
        'x-rapidapi-host' => 'target1.p.rapidapi.com',
        'x-rapidapi-key' => env('RAPID_API_KEY'),
        ])->get('https://target1.p.rapidapi.com/products/v3/get-details', [
            'tcin' => $tcin,
	        'store_id' => $store_id,
        ])->json()['data']['product'];

        $Recommended = Http::withHeaders([
        'x-rapidapi-host' => 'target1.p.rapidapi.com',
        'x-rapidapi-key' => env('RAPID_API_KEY'),
        ])->get('https://target1.p.rapidapi.com/products/list-recommended', [
            'tcins' => $tcin,
	        'store_id' => $store_id,  
        ])->json()['products'];   

        $Reviews = Http::withHeaders([
        'x-rapidapi-host' => 'target1.p.rapidapi.com',
        'x-rapidapi-key' => env('RAPID_API_KEY'),
        ])->get('https://target1.p.rapidapi.com/reviews/v2/list', [
            'reviewedId' => $tcin,
            'sortBy' => 'most_recent',
            'size' => '30',
            'page' => '0',
            'hasOnlyPhotos' => 'false',
            'verifiedOnly' => 'false',
        ])->json()['results'];   


        $availability = '';

        $subCategory = $itemDetails['taxonomy']['breadcrumbs']['2']['node_id'];

        return view('item',[
            'itemDetails' => $itemDetails,
            'Recommended' => $Recommended,
            'Reviews' => $Reviews,
            'availability' => $availability,
            'subCategory' => $subCategory,
        ]);
    }
}