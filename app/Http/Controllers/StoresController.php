<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Store;
use App\User;

class StoresController extends Controller
{
    public function getStore()
    {
        return view('store.create');
    }

    public function postStore(Request $request)
    {
        $this->validate($request, [
            'store' => 'required|max:20',
            'description' => 'required|min:20'
        ]);

        Store::create([
            'name' => $request->input('store'),
            'description' => $request->input('description'),
            'user_id' => auth()->user()->id,
        ]);
    }
}
