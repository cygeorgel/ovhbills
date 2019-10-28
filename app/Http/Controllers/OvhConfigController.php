<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OvhConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private $names = [

        'model' => 'App\OvhConfig',
        'singular' => 'ovhConfig',
        'plural' => 'ovhConfigs',

    ];

    private $rules = [

        'app_key' => 'required',
        'app_secret' => 'required',
        'app_conskey' => 'required',

    ];

    public function index()
    {
        $names = $this->names;

        $elements = $names['model']::paginate(100);

        return view($names['plural'] .  '.index', compact('elements', 'names'));

    }

    public function create()
    {
        $names = $this->names;

        return view($names['plural'] .  '.create', compact('names'));

    }

    public function store(Request $request)
    {
        $this->validate(request(), $this->rules);

        $data = request()->all();

        $names = $this->names;

        $names['model']::create($data);

        flash(__('app.successStore'))->success();

        return redirect($names['plural']);

    }

    public function show($id)
    {
        $names = $this->names;

        $element = $names['model']::find($id);

        return view($names['plural'] .  '.show', compact('element', 'names'));

    }

    public function edit($id)
    {
        $names = $this->names;

        $element = $names['model']::find($id);

        return view($names['plural'] .  '.edit', compact('element', 'names'));

    }

    public function update(Request $request, $id)
    {
        $this->validate(request(), $this->rules);

        $data = request()->all();

        $names = $this->names;

        $element = $names['model']::find($id);

        $element->update($data);

        flash(__('app.successUpdate'))->success();

        return redirect($names['plural']);

    }

    public function destroy($id)
    {
        $names = $this->names;

        $element = $names['model']::find($id);

        $element->delete();

        flash(__('app.successDelete'))->success();

        return back();

    }
}
