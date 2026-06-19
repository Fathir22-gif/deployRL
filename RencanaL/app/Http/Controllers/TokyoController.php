<?php

namespace App\Http\Controllers;

class TokyoController extends Controller
{
    public function index(\App\Services\CommentService $service)
    {
        $comments = $service->getForDestination('tokyo');
        $summary = $service->getSummary('tokyo');
        return view('tokyo', ['comments' => $comments, 'destination' => 'tokyo', 'commentSummary' => $summary]);
    }
}
