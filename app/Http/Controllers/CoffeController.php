<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CoffeController extends Controller
{
    public function index()
    {
        try {
            // Mengirim permintaan ke API
            $response = Http::get('https://api.sampleapis.com/coffee/hot');

            // Memeriksa apakah permintaan berhasil
            if ($response->successful()) {
                // Mendapatkan data dari respons
                $data = $response->json();
                // Mengambil hanya 4 item pertama
                $indexes = [0, 2, 4, 7];
                $selectedData = [];

                foreach ($indexes as $index) {
                    if (isset($data[$index])) {
                        $selectedData[] = $data[$index];
                    }
                }

                // Menampilkan data atau melakukan sesuatu dengan data
                return view('frontend.index', ['data' => $selectedData]);
            } else {
                // Menangani kesalahan jika permintaan tidak berhasil
                return view('frontend.error', ['message' => 'Gagal mendapatkan data dari API']);
            }
        } catch (\Exception $e) {
            // Menangani kesalahan umum
            return view('frontend.error', ['message' => $e->getMessage()]);
        }
    }
}
