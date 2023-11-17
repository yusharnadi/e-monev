<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Services\UserServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct(private UserServiceInterface $userService)
    {
    }
    public function index()
    {
        if (!Auth::user()->can('read user')) abort(403);

        $users = $this->userService->getAll();

        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('create user')) abort(403);

        $roles = Role::pluck('name')->all();

        return view('user.create', ['roles' => $roles,]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        if (!Auth::user()->can('create user')) abort(403);

        $validated_request = $request->safe()->except(['_token']);
        $validated_request['password'] = Hash::make($validated_request['password']);

        try {
            $this->userService->create($validated_request);
            return redirect()->route('users.index')->with('message', "User berhasil dibuat.");
        } catch (\Exception $th) {
            Log::error($th->getMessage(), ['request' => $validated_request]);
            return redirect()->route('users.index')->with('error', "User gagal dibuat.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        if (!Auth::user()->can('update user')) abort(403);

        $user = $this->userService->getById($id);

        $roles = Role::pluck('name')->all();

        $role = $user->getRoleNames();

        return view('user.edit', ['user' => $user, 'roles' => $roles, 'role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        if (!Auth::user()->can('update user')) abort(403);

        $validated_request = $request->safe()->except(['_token', 'role']);

        if ($request->has('password') && $request->password != '') {
            $validated_request['password'] = Hash::make($validated_request['password']);
        }

        // dd($validated_request);

        try {
            $this->userService->update($id, $validated_request, $request->role);
            return redirect()->route('users.index')->with('message', "User berhasil diubah.");
        } catch (\Exception $th) {
            Log::error($th->getMessage(), ['request' => $validated_request]);
            return redirect()->route('users.index')->with('error', "User gagal diubah.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('delete user')) abort(403);

        try {
            $this->userService->delete($id);
            return redirect()->route('users.index')->with('message', "User berhasil dihapus.");
        } catch (\Exception $th) {
            Log::error($th->getMessage(), ['user_id' => $id]);
            return redirect()->route('users.index')->with('error', "User gagal dihapus.");
        }
    }
}
