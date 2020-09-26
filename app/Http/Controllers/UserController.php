<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use App\Models\Permission;

use App\Http\Requests\StoreUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewany', User::class);
        
        return view('users.index', [
            'title' => 'Pracownicy',
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);
        
        return view('users.create', [
            'title' => 'Nowy pracownik',
            'description' => 'Uzupełnij dane pracownika i kliknij Zapisz',
            'departments' => Department::all(),
            'permissions' => Permission::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUser  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $this->authorize('create', User::class);

        $user = User::create([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'company' => $request->company,
            'location' => $request->location,
            'position' => $request->position,
            'description' => $request->description,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if ($request->hasFile('avatar')) {
            $path = $request->avatar->store('avatars');
            $user->avatar_path = $path;
        }
        $user->department()->associate(Department::find($request->department_id));
        $user->save();
        $user->permissions()->attach($request->permission_id);

        return redirect()->route('users.show', $user->id)->with('notify_success', 'Nowy pracownik został dodany!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', [
            'title' => 'Szczegóły',
            'description' => $user->first_name . ' ' . $user->last_name,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        return view('users.edit', [
            'title' => 'Edycja pracownika',
            'description' => 'Zaktualizuj dane pracownika i kliknij Zapisz',
            'user' => $user,
            'departments' => Department::all(),
            'permissions' => Permission::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUser  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUser $request, User $user)
    {
        $this->authorize('update', $user);

        $user->update($request->all());

        if ($request->hasFile('avatar')) {
            $path = $request->avatar->store('avatars');
            $user->avatar_path = $path;
        }
        $user->department()->associate(Department::find($request->department_id));
        $user->save();

        if(isset($request->permission_id)) {
            $user->permissions()->sync($request->permission_id);
        }
        
        return redirect()->route('users.edit', $user->id)->with('notify_success', 'Dane pracownika zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        return redirect()->route('users.index')->with('notify_danger', 'Pracownik został usunięty!');
    }
}