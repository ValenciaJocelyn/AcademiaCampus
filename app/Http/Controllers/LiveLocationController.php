<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShuttleStatus;
use App\Models\ShuttleBus;

class LiveLocationController extends Controller
{
    public function index()
    {
        $statuses = ShuttleStatus::with(['shuttle'])->latest()->get()->groupBy(fn($item) => $item->shuttle->route ?? 'Unknown');
        return view('livelocation.index', compact('statuses'));
    }
}
