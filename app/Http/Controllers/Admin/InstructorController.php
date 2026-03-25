<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class InstructorController extends Controller
{
    /**
     * Show the grid of instructors.
     */
    public function index()
    {
        $instructors = User::whereHas('roles', function($q) {
            $q->where('name', 'instructor');
        })->with(['attributions', 'preferredHub'])->latest()->paginate(12);

        return view('admin.instructors-grid', compact('instructors'));
    }

    /**
     * Show the form for creating a new instructor.
     */
    public function create()
    {
        $countries = \App\Models\Country::orderBy('name')->get();
        $attributions = \App\Models\Attribution::orderBy('name')->get();
        return view('admin.add-instructor', compact('countries', 'attributions'));
    }

    /**
     * Store a newly created instructor in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'callsign' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,id',
            'attributions' => 'nullable|array',
            'attributions.*' => 'exists:attributions,id',
            'license_number' => 'nullable|string|max:255',
            'preferred_hub_id' => 'nullable|exists:branches,id',
            'gender' => 'nullable|string',
            'phone' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'post_code' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'country_id' => 'nullable|exists:countries,id',
            'date_of_birth' => 'nullable|date',
            'place_of_birth' => 'nullable|string|max:255',
        ]);

        // Create the user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'license_number' => $validated['license_number'] ?? null,
            'preferred_hub_id' => $validated['preferred_hub_id'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'gender' => $validated['gender'] ?? null,
            'callsign' => $validated['callsign'] ?? null,
            'address' => $validated['address'] ?? null,
            'post_code' => $validated['post_code'] ?? null,
            'city' => $validated['city'] ?? null,
            'country_id' => $validated['country_id'] ?? null,
            'date_of_birth' => $validated['date_of_birth'] ?? null,
            'place_of_birth' => $validated['place_of_birth'] ?? null,
        ]);

        $roles = $validated['roles'] ?? [];
        $instructorRole = Role::where('name', 'instructor')->first();
        if ($instructorRole && !in_array($instructorRole->id, $roles)) {
            $roles[] = $instructorRole->id;
        }

        $user->roles()->sync($roles);

        if (!empty($validated['attributions'])) { $user->attributions()->sync($validated['attributions']); }

        return redirect()->route('instructors.index')->with('success', 'Instructor created successfully!');
    }

    /**
     * Show the form for editing the specified instructor.
     */
    public function edit($id)
    {
        $instructor = User::findOrFail($id);
        $countries = \App\Models\Country::orderBy('name')->get();
        $attributions = \App\Models\Attribution::orderBy('name')->get();
        return view('admin.add-instructor', compact('instructor', 'countries', 'attributions'));
    }

    /**
     * Update the specified instructor in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'callsign' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,id',
            'attributions' => 'nullable|array',
            'attributions.*' => 'exists:attributions,id',
            'license_number' => 'nullable|string|max:255',
            'preferred_hub_id' => 'nullable|exists:branches,id',
            'gender' => 'nullable|string',
            'phone' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'post_code' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'country_id' => 'nullable|exists:countries,id',
            'date_of_birth' => 'nullable|date',
            'place_of_birth' => 'nullable|string|max:255',
        ]);

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'license_number' => $validated['license_number'] ?? null,
            'preferred_hub_id' => $validated['preferred_hub_id'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'gender' => $validated['gender'] ?? null,
            'callsign' => $validated['callsign'] ?? null,
            'address' => $validated['address'] ?? null,
            'post_code' => $validated['post_code'] ?? null,
            'city' => $validated['city'] ?? null,
            'country_id' => $validated['country_id'] ?? null,
            'date_of_birth' => $validated['date_of_birth'] ?? null,
            'place_of_birth' => $validated['place_of_birth'] ?? null,
        ];

        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        $user->update($data);

        $roles = $validated['roles'] ?? [];
        $instructorRole = Role::where('name', 'instructor')->first();
        if ($instructorRole && !in_array($instructorRole->id, $roles)) {
            $roles[] = $instructorRole->id;
        }

        $user->roles()->sync($roles);

        $user->attributions()->sync($validated['attributions'] ?? []);

        return redirect()->route('instructors.edit', $user->id)->with('success', 'Instructor updated successfully!');
    }


}
