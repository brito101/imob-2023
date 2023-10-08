<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CheckPermission;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\ClientFunnel;
use App\Models\Step;
use App\Models\Views\Client as ViewsClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientFunnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        CheckPermission::checkAuth('Listar Clientes');

        if (Auth::user()->hasRole('Programador|Administrador')) {
            $clients = ViewsClient::all();
        } else {
            $clients = ViewsClient::whereIn('agency_id', Auth::user()->brokers->pluck('agency_id'))->get();
        }

        $steps = Step::all();

        return view('admin.clients.funnel.index', \compact('steps', 'clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
