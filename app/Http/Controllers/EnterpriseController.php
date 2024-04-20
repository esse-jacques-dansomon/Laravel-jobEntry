<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnterpriseRequest;
use App\Http\Requests\UpdateEnterpriseRequest;
use App\Models\Enterprise;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EnterpriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Inertia\Response|\Inertia\ResponseFactory
    {
        return inertia('auth/RegisterEnterprise');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnterpriseRequest $request): \Illuminate\Http\RedirectResponse
    {
        //create user and enterprise
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'enterprise'
        ]);

        $slug = $request->name . '-' . $user->id;
        $enterprise = Enterprise::create([
            'user_id' => $user->id,
            'logo' => $request->logo->store('logo'),
            'description' => $request->description,
            'website' => $request->website,
            'slug' => $slug
//            'location' => $request->location,
//            'phone' => $request->phone
        ]);

        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     */
    public function show(Enterprise $enterprise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enterprise $enterprise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnterpriseRequest $request, Enterprise $enterprise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enterprise $enterprise)
    {
        //
    }
}
