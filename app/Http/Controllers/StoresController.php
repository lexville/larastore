<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Store;
use App\User;

class StoresController extends Controller
{
    public function getAllStores()
    {
        $allStores = Store::where('user_id', auth()->user()->id)->get();

        return view('store.index', ['allStores' => $allStores]);
    }
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

        $newStore = new Store;
        $newStore->name = $request->input('store');
        $newStore->description = $request->input('description');
        $request->user()->store()->save($newStore);

        return redirect('/store/create');
    }
}
