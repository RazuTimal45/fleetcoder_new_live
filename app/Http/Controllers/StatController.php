<?php

namespace App\Http\Controllers;

use App\Models\Stat;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function index()
    {
        $stats = Stat::orderBy('order')->get();
        return view('dashboard.stats', compact('stats'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'number' => 'required|string|max:255',
            'label' => 'required|string|max:255',
        ]);

        Stat::create($data);

        return back()->with('status', 'stat-created');
    }

    public function update(Request $request, Stat $stat)
    {
        $data = $request->validate([
            'number' => 'required|string|max:255',
            'label' => 'required|string|max:255',
        ]);

        $stat->update($data);

        return back()->with('status', 'stat-updated');
    }

    public function destroy(Stat $stat)
    {
        $stat->delete();
        return back()->with('status', 'stat-deleted');
    }
}
