<?php

namespace App\Http\Controllers;

use App\Services\CommentService;

class BaliController extends Controller
{
    public function index(CommentService $service)
    {
        $comments = $service->getForDestination('bali');
        $summary = $service->getSummary('bali');
        return view('bali', ['comments' => $comments, 'destination' => 'bali', 'commentSummary' => $summary]);
    }
}
