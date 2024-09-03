<?php

namespace App\Http\Controllers\Admin;

use App\Models\Expo;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpoController extends Controller
{
    public function index()
    {
        $expos = Expo::all();
        return view('admin.expos.index', compact('expos'));
    }

    public function create()
    {
        $users = User::all();
        return view('expos.create', compact('users'));
    }

    public function store(Request $request)
    {
        $expo = Expo::create($request->all());
        $expo->users()->sync($request->user_ids);
        return redirect()->route('expos.index');
    }

    public function edit(Expo $expo)
    {
        $users = User::all();
        return view('expos.edit', compact('expo', 'users'));
    }

    public function update(Request $request, Expo $expo)
    {
        $expo->update($request->all());
        $expo->users()->sync($request->user_ids);
        return redirect()->route('expos.index');
    }

    public function destroy(Expo $expo)
    {
        $expo->delete();
        return redirect()->route('expos.index');
    }
}
