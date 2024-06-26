<?php

namespace App\Http\Controllers\User;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Auth\Access\Gate;

class UserController extends Controller
{
    public function __construct(
        protected UserService $userService,
    )
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->userService->index();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = RoleEnum::values();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $this->authorize('create-user');
        $user = $this->userService->store($request->validated());
        return view('users.show', compact('user'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = $this->userService->show($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = RoleEnum::values();
        $user = $this->userService->edit($id);
        return view('users.edit', compact(['user', 'roles']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        $this->authorize('edit-user');
        $user = $this->userService->update($request->validated(), $id);
        return view('users.show', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete-user');
        $this->userService->destroy($id);
        return $this->index();
    }
}
