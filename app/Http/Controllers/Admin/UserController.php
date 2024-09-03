<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // Mostrar la lista de usuarios
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Mostrar el formulario de creación
    public function create()
    {
        return view('admin.users.create');
    }

    // Guardar un nuevo usuario en la base de datos
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'image' => 'nullable|image',
            'password' => 'required|string|min:8|confirmed',
            'website' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile-photos', 'public');
            $data['profile_photo_path'] = $imagePath;
        }

        User::create($validatedData);

        // Flash message
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Usuario Creado!',
            'text' => 'Se ha creado el usuario con éxito.',
        ]);

        return redirect()->route('admin.users.index');
    }

    // Mostrar el formulario de edición
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Actualizar un usuario en la base de datos
    public function update(Request $request, User $user)
    {
        // dd($request->all());
        $request->validate([            
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',            
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'required|string|min:8|confirmed',
            'image' => 'nullable|image',
            'website' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
        ]);

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('image')) {
            if ($user->profile_photo_path && Storage::disk('public')->exists($user->profile_photo_path)) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }
            $imagePath = $request->file('image')->store('profile-photos', 'public');
            $user->profile_photo_path = $imagePath;
        }

        $user->save();

        // Flash message
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Usuario Actualizado!',
            'text' => 'Se ha creado el usuario con éxito.',
        ]);

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
