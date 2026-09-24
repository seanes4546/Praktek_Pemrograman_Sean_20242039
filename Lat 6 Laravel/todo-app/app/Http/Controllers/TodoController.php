<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller {
    public function index() {
        
        $todos = [
            ['judul' => 'Belajar Laravel', 'status' => 'Belum selesai'],
            ['judul' => 'Kerjakan tugas', 'status' => 'Selesai'],
        ];
        return view('todo.index', compact('todos'));
        
    }
    
    public function create() {
        return "Tambah Todo";
    }
    
    public function store() {
        return "Simpan Todo";
    }

    
       
       
}
