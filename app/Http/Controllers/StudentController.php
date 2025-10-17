<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\User;


use Illuminate\Http\Request;

class StudentController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
    'first_name' => 'required|string|max:255',  
    'last_name' => 'required|string|max:255',
    'email' => 'required|email|max:255|unique:students,email',
    'password' => 'required|string|min:8',  // ✅ use string + min length
]);

// ✅ Merge additional fields safely
$validated['profile_photo_path'] = $request->image ?? null;
$validated['address'] = $request->address ?? null;
$validated['role'] = $request->role;

// ✅ Hash password before saving
$validated['password'] = bcrypt($validated['password']);
$student =null ;
// ✅ Now create student
if($request->role === 'student'){
$student = Student::create($validated);
}
    $validated['name'] =$request->first_name ?? null;
    User::create($validated);


return response()->json(['data',$student], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
