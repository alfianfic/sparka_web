<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User; 
use App\Models\Fingerprint; 

class FingerprintController extends Controller
{
    public function getFingerprintByUserId($Id)
    {
        // Cari fingerprint berdasarkan user_id
        $finger = Fingerprint::where('id_fingerprint', $Id)->with('user')->first();

        // Jika fingerprint ditemukan
        if ($finger) {
            return response()->json([
                'id_user' => $finger->user_id,
                'data_user_nama' => $finger->user->name,
            ]);
        } else {
            return response()->json([
                'message' => 'Fingerprint tidak ditemukan untuk user tersebut.'
            ], 404);
        }
    }
}
