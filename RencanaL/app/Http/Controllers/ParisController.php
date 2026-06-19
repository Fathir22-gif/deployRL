<?php

namespace App\Http\Controllers;

class ParisController extends Controller
{
    public function index(\App\Services\CommentService $service)
    {
        $comments = $service->getForDestination('paris');
        $summary = $service->getSummary('paris');
        return view('paris', ['comments' => $comments, 'destination' => 'paris', 'commentSummary' => $summary]);
    }
}
