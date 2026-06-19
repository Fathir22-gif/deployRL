<?php

namespace App\Http\Controllers;

class RajaAmpatController extends Controller
{
    public function index(\App\Services\CommentService $service)
    {
        $comments = $service->getForDestination('raja-ampat');
        $summary = $service->getSummary('raja-ampat');
        return view('raja-ampat', ['comments' => $comments, 'destination' => 'raja-ampat', 'commentSummary' => $summary]);
    }
}
