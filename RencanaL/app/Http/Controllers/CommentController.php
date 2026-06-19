<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected CommentService $service;

    public function __construct(CommentService $service)
    {
        $this->service = $service;
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'destination' => 'required|string|max:255',
            'name' => 'nullable|string|max:255',
            'rating' => 'nullable|integer|between:1,5',
            'comment' => 'required|string',
        ]);

        $this->service->create($data, $request->user());

        return back()->with('success', 'Komentar berhasil dikirim.');
    }
}
