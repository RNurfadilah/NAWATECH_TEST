<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function transformData()
    {
        $json1 = json_decode(Storage::get('json_data/json_1.json'), true);
        $json2 = json_decode(Storage::get('json_data/json_2.json'), true);

        $transformedData = collect($json1['data'])->map(function ($item) use ($json2) {
            $workshop = collect($json2['data'])->firstWhere('code', $item['booking']['workshop']['code']);
            return [
                'name' => $item['name'],
                'email' => $item['email'],
                'booking_number' => $item['booking']['booking_number'],
                'book_date' => $item['booking']['book_date'],
                'ahass_code' => $item['booking']['workshop']['code'],
                'ahass_name' => $item['booking']['workshop']['name'],
                'ahass_address' => $workshop['address'] ?? '',
                'ahass_contact' => $workshop['phone_number'] ?? '',
                'ahass_distance' => $workshop['distance'] ?? 0,
                'motorcycle_ut_code' => $item['booking']['motorcycle']['ut_code'],
                'motorcycle' => $item['booking']['motorcycle']['name'],
            ];
        })->sortBy('ahass_distance')->values()->all();

        return response()->json([
            'status' => 1,
            'message' => 'Data Successfully Retrieved.',
            'data' => $transformedData
        ]);
    }
}
