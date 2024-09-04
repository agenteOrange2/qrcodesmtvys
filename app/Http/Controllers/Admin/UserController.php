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

        $user = User::create($validatedData);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storeAs(
                'fotos_perfil/' . $user->id,
                'profile_photo.' . $request->file('image')->getClientOriginalExtension(),
                'public'
            );
            $user->profile_photo_path = $imagePath;
            $user->save();
        }

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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,            
            'image' => 'nullable|image',
            'website' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
        ]);

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe
            if ($user->profile_photo_path && Storage::disk('public')->exists($user->profile_photo_path)) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            $imagePath = $request->file('image')->storeAs(
                'fotos_perfil/' . $user->id,
                'profile_photo.' . $request->file('image')->getClientOriginalExtension(),
                'public'
            );
            $user->profile_photo_path = $imagePath;
        }

        $user->update($validatedData);

        // Flash message
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Usuario Actualizado!',
            'text' => 'Se ha actualizado el usuario con éxito.',
        ]);

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        // Eliminar la carpeta de fotos de perfil si existe
        if (Storage::disk('public')->exists('fotos_perfil/' . $user->id)) {
            Storage::disk('public')->deleteDirectory('fotos_perfil/' . $user->id);
        }

        $user->delete();

        // Flash message
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Usuario Eliminado!',
            'text' => 'Se ha eliminado el usuario con éxito.',
        ]);

        return redirect()->route('admin.users.index');        
    }
}
