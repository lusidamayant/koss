<?php

namespace App\Http\Controllers\Admin;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();  // Mengambil semua data customer
        return view('admin.customer.index', compact('customers'));  // Mengirim data ke view
    }

    // Menampilkan form untuk menambah customer
    public function create()
    {
        return view('admin.customer.create');  // Menampilkan form tambah customer
    }

    // Menyimpan data customer baru
    public function store(Request $request)
{
    // Validasi untuk memastikan 'name' tidak kosong dan memenuhi aturan lainnya
    $request->validate([
        'name' => 'required|string|max:255', // Pastikan 'name' tidak kosong
        'email' => 'required|string|email|max:255|unique:customers,email',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Simpan data ke database
    Customer::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    return redirect()->route('admin.customer.index')->with('success', 'Customer berhasil dibuat.');
}

    // Menampilkan detail customer berdasarkan ID
    public function show($id)
    {
        $customer = Customer::findOrFail($id);  // Mengambil data customer berdasarkan ID
        return view('admin.customer.show', compact('customer'));  // Menampilkan detail customer
    }

    // Menampilkan form untuk mengedit customer
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);  // Mengambil data customer berdasarkan ID
        return view('admin.customer.edit', compact('customer'));  // Menampilkan form edit customer
    }

    // Memperbarui data customer
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $id,  // Validasi unik email, kecuali yang sama dengan customer ini
        ]);

        $customer = Customer::findOrFail($id);  // Mengambil data customer berdasarkan ID
        $customer->update([
            'name' => $request->nama_customer,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.customer.index')->with('success', 'Customer berhasil diperbarui');
    }

    // Menghapus data customer
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);  // Mengambil data customer berdasarkan ID
        $customer->delete();  // Menghapus customer

        return redirect()->route('admin.customer.index')->with('success', 'Customer berhasil dihapus');
    }
}
