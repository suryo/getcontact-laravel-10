<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Method untuk mendapatkan semua kontak
    public function index()
    {
        $contacts = Contact::all(); // Mengambil semua kontak
        return response()->json($contacts); // Mengembalikan data dalam format JSON
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'phone' => 'required|string|max:255',
            'label' => 'nullable|string|max:255',
            'emails' => 'nullable|string|max:255',
            'display_name' => 'nullable|string|max:255',
            'given_name' => 'nullable|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'family_name' => 'nullable|string|max:255',
            'organization' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
        ]);

        // Mencari kontak berdasarkan phone dan display_name
        $finddata = Contact::where('phone', $request->phone)
            ->Where('display_name', $request->display_name)
            ->first();

        // Jika kontak sudah ada, kembalikan respons
        if ($finddata) {
            return response()->json([
                'message' => 'Kontak sudah ada.',
                'data' => $finddata
            ], 409); // 409 Conflict
        }

        // Jika tidak ada, buat kontak baru
        $contact = Contact::create([
            'phone' => $request->phone,
            'label' => $request->label,
            'emails' => $request->emails,
            'display_name' => $request->display_name,
            'given_name' => $request->given_name,
            'middle_name' => $request->middle_name,
            'family_name' => $request->family_name,
            'organization' => $request->organization,
            'status' => $request->status,
        ]);

        // Kembalikan respons sukses
        return response()->json([
            'message' => 'Kontak berhasil ditambahkan.',
            'data' => $contact
        ], 201); // 201 Created
    }
}
