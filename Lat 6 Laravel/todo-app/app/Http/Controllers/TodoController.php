<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // Tampilkan Jendela Home (a)
    public function index()
    {
        $todos = Todo::latest()->get();
        return view('todos.index', compact('todos'));
    }

    // Simpan Tugas Baru dari Jendela Tambah (b & c)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $isCompleted = $request->has('is_completed');

        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => $isCompleted,
            // Jika saat dibuat langsung dicentang selesai, catat tanggal sekarang (c)
            'completed_at' => $isCompleted ? now() : null, 
        ]);

        return redirect()->route('todos.index')->with('success', 'Todo berhasil dibuat!');
    }

    // Mengubah status via checkbox dari Jendela Home
    public function updateStatus(Todo $todo)
    {
        $newStatus = !$todo->is_completed;
        
        $todo->update([
            'is_completed' => $newStatus,
            'completed_at' => $newStatus ? now() : null // Mengisi/menghapus tanggal penyelesaian (c)
        ]);

        return redirect()->back();
    }

    // Hapus tugas
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->back()->with('success', 'Todo berhasil dihapus!');
    }
}
