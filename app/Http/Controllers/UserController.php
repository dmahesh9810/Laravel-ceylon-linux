<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.adduser');
    }
    public function store(AddUserRequest $addUserRequest)
    {
        $distributor = new User();
        $distributor->name = $addUserRequest->get('name');
        $distributor->nic  = $addUserRequest->get('nic');
        $distributor->address = $addUserRequest->get('address');
        $distributor->mobile = $addUserRequest->get('mobile');
        $distributor->email = $addUserRequest->get('email');
        $distributor->gender = $addUserRequest->get('gender');
        $distributor->territory_id = $addUserRequest->get('territorie_id');
        $distributor->user_name = $addUserRequest->get('user_name');
        $distributor->password = Hash::make($addUserRequest->get('password'));
        $distributor->assignRole(Role::ROLE_DISTRIBUTOR);
        $distributor->save();

        return redirect()
            ->route('addusers.index')
            ->with('success', 'New user has been created');
    }
}
