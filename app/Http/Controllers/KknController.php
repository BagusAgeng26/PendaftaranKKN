<?php

namespace App\Http\Controllers;

use App\Models\KknRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KknController extends Controller
{
    // Menampilkan form pendaftaran KKN
    public function showKknForm()
    {
        return view('mahasiswa.kkn');
    }
    // Menampilkan form pengumuman
    public function showPengumumanForm()
    {
        $kknRegistrations = KknRegistration::with('user')->where('status', 'approved')->get();
        return view('mahasiswa.pengumuman', compact('kknRegistrations'));
    }

    // Proses pendaftaran KKN
    public function registerKkn(Request $request)
    {
        // Validasi input form
        $request->validate([
            'program_studi' => 'required|string|max:255',
            'jenis_kkn' => 'required|string',
            'email' => 'nullable|email|max:255', // Menambahkan validasi untuk email
            'pas_foto' => 'nullable|string|max:255', // Validasi opsional untuk pas foto
            'fakultas' => 'nullable|string|max:255',
            'alamat_domisili' => 'nullable|string|max:255',
            'tempat_tanggal_lahir' => 'nullable|string|max:255',
            'jenis_kelamin' => 'nullable|string|max:255',
            'nomor_handphone' => 'nullable|string|max:20',
            'ipk' => 'nullable|numeric|between:0,4', // Validasi IPK antara 0 dan 4
        ]);

        // Membuat pendaftaran KKN
        KknRegistration::create([
            'user_id' => Auth::id(),
            'nama' => Auth::user()->nama, // Diambil dari user yang sedang login
            'nim' => Auth::user()->nim, // Diambil dari user yang sedang login
            'email' => $request->input('email'), // Mengambil email dari input form
            'pas_foto' => $request->input('pas_foto'),
            'program_studi' => $request->input('program_studi'),
            'fakultas' => $request->input('fakultas'),
            'jenis_kkn' => $request->input('jenis_kkn'),
            'alamat_domisili' => $request->input('alamat_domisili'),
            'tempat_tanggal_lahir' => $request->input('tempat_tanggal_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'nomor_handphone' => $request->input('nomor_handphone'),
            'ipk' => $request->input('ipk'),
            'status' => 'pending', // Set status awal sebagai pending
        ]);

        // Ambil nama pengguna untuk pesan sukses
        $name = Auth::user()->nama;

        // Redirect berdasarkan jenis KKN dengan pesan sukses dan link WhatsApp
        switch ($request->jenis_kkn) {
            case 'KKN Regional':
                return redirect()->route('mahasiswa.kkn')->with('success', "Selamat! <strong>$name</strong> telah mendaftar KKN Regional. Tunggu info selanjutnya dari admin.");
            case 'KKN Nasional':
                return redirect()->route('mahasiswa.kkn')->with('success', "Selamat! <strong>$name</strong> telah mendaftar KKN Nasional. Tunggu info selanjutnya dari admin.");
            case 'KKN Internasional':
                return redirect()->route('mahasiswa.kkn')->with('success', "Selamat! <strong>$name</strong> telah mendaftar KKN Internasional. Tunggu info selanjutnya dari admin.");
            default:
                return redirect()->route('mahasiswa.kkn')->with('success', 'Pendaftaran KKN berhasil.');
        }
    }

    // Menampilkan dashboard admin
    public function showAdminDashboard()
    {
        // Mengambil data pendaftaran KKN yang statusnya pending
        $kknRegistrations = KknRegistration::with('user')->where('status', 'pending')->get();
        return view('admin.dashboard', compact('kknRegistrations'));
    }

    // Proses approval KKN oleh admin
    public function approveKkn(Request $request, $id)
    {
        // Mencari pendaftaran berdasarkan ID
        $registration = KknRegistration::findOrFail($id);
        // Set status menjadi approved
        $registration->status = 'approved';
        $registration->save();

        return redirect()->back()->with('success', 'Pendaftaran KKN telah disetujui.');
    }
}
