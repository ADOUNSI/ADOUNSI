<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Trajet;

class TrajetController extends Controller
{
    use \Illuminate\Foundation\Auth\Access\AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trajets = Trajet::latest()->get();
        return view('trajets.index', compact('trajets'));
    }
public function create()
{
    return view('trajets.create');
}

}
