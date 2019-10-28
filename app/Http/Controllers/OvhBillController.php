<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class OvhBillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private $names = [

        'model' => 'App\OvhBill',
        'singular' => 'ovhBill',
        'plural' => 'ovhBills',

    ];

    public function index(Request $request)
    {
        if (isset ($request->month)) {

            $month = \Carbon\Carbon::createFromFormat('Y-m', $request->month);

        } else {

            $month = now()->startOfMonth()->subMonths(1);

        }

        $names = $this->names;

        $summary = [];
        $summary['count'] = $names['model']::where('documentDate', 'like', $month->format('Y-m') . '%')->count();
        $summary['totalWithoutTax'] = $names['model']::where('documentDate', 'like', $month->format('Y-m') . '%')->sum('priceWithoutTax');
        $summary['tax'] = $names['model']::where('documentDate', 'like', $month->format('Y-m') . '%')->sum('tax');
        $summary['totalWithTax'] = $names['model']::where('documentDate', 'like', $month->format('Y-m') . '%')->sum('priceWithTax');
        $summary['outConsumption'] = $names['model']::where('documentDate', 'like', $month->format('Y-m') . '%')->sum('outConsumption');
        $summary['deposit'] = $names['model']::where('documentDate', 'like', $month->format('Y-m') . '%')->sum('deposit');

        $elements = $names['model']::where('documentDate', 'like', $month->format('Y-m') . '%')->paginate(100);

        return view($names['plural'] .  '.index', compact('elements', 'names', 'summary', 'month'));

    }

    public function show($id)
    {
        $names = $this->names;

        $element = $names['model']::find($id);

        return view($names['plural'] .  '.show', compact('element', 'names'));

    }

    public function document($id)
    {
        $names = $this->names;

        $element = $names['model']::find($id);

        $batch = $element->documentDate->format('Ym');

        $filename = $element->billId . '.pdf';

        $document = Storage::disk('local')->get('ovhBills/' . $batch . '/' . $filename);

        return Response::make($document, 200, [

            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; ' . $filename,

        ]);

    }
}
