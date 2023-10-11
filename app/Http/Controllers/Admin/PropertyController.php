<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CheckPermission;
use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Property;
use App\Models\Views\Property as ViewsProperty;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        CheckPermission::checkAuth('Listar Propriedades');

        $properties = ViewsProperty::all();

        if ($request->ajax()) {
            $token = csrf_token();

            return Datatables::of($properties)
                ->addIndexColumn()
                ->addColumn('action', function ($row) use ($token) {
                    $btn = '<a class="btn btn-xs btn-success mx-1 shadow" title="Visualizar" target="_blank" href="' .
                        // route('site.blog.post', ['uri' => $row->uri])  .
                        '"><i class="fa fa-lg fa-fw fa-eye"></i></a>' . '<a class="btn btn-xs btn-primary mx-1 shadow" title="Editar" href="properties/' . $row->id . '/edit"><i class="fa fa-lg fa-fw fa-pen"></i></a>' . '<form method="POST" action="properties/' . $row->id . '" class="btn btn-xs px-0"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="' . $token . '"><button class="btn btn-xs btn-danger mx-1 shadow" title="Excluir" onclick="return confirm(\'Confirma a exclusão desta propriedade?\')"><i class="fa fa-lg fa-fw fa-trash"></i></button></form>';
                    return $btn;
                })
                ->addColumn('cover', function ($row) {
                    return '<div class="d-flex justify-content-center align-items-center"><img src=' . url('storage/properties/min/' . $row->cover) .  ' class="img-thumbnail d-block" width="360" height="207" alt="' . $row->title . '" title="' . $row->title . '"/></div>';
                })
                ->rawColumns(['action', 'cover'])
                ->make(true);
        }

        return view('admin.properties.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        CheckPermission::checkAuth('Criar Propriedades');

        if (Auth::user()->hasRole('Programador|Administrador')) {
            $agencies = Agency::all();
        } else {
            $agencies = Agency::whereIn('id', Auth::user()->brokers->pluck('agency_id'))->get();
        }

        return view('admin.properties.create', compact('agencies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        CheckPermission::checkAuth('Criar Propriedades');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        CheckPermission::checkAuth('Editar Propriedades');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        CheckPermission::checkAuth('Editar Propriedades');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CheckPermission::checkAuth('Excluir Propriedades');
    }
}
