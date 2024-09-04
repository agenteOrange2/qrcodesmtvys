<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
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
        $roles = Role::all(); // Traer todos los roles
        return view('admin.users.create', compact('roles'));
    }

    // Guardar un nuevo usuario en la base de datos
    public function store(Request $request)
    {
        // Validar los datos del request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'image' => 'nullable|image',
            'roles' => 'required|array', // Validar roles como array
            'roles.*' => 'exists:roles,id', // Asegurarse que los roles existen en la tabla de roles
            'password' => 'required|string|min:8|confirmed',
            'website' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
        ]);

        // Crear el usuario
        $user = User::create([
            'name' => $validatedData['name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), // Encriptar la contraseña
            'website' => $validatedData['website'] ?? null,
            'position' => $validatedData['position'] ?? null,
            'company' => $validatedData['company'] ?? null,
        ]);

        // Obtener los nombres de los roles desde los IDs y asignarlos
        $roles = Role::whereIn('id', $request->input('roles'))->pluck('name')->toArray();
        $user->syncRoles($roles); // Sincronizar roles usando nombres

        // Guardar la imagen de perfil si está presente
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storeAs(
                'fotos_perfil/' . $user->id,
                'profile_photo.' . $request->file('image')->getClientOriginalExtension(),
                'public'
            );
            $user->update(['profile_photo_path' => $imagePath]);
        }

        return redirect()->route('admin.users.index')->with('success', 'Usuario creado correctamente');
    }

    // Mostrar el formulario de edición
    public function edit(User $user)
    {
        $roles = Role::all(); // Traer todos los roles
        return view('admin.users.edit', compact('user', 'roles'));
    }

    // Actualizar un usuario en la base de datos
    public function update(Request $request, User $user)
    {
        // Validar los datos del request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'image' => 'nullable|image',
            'roles' => 'required|array', // Validar roles como array
            'roles.*' => 'exists:roles,id', // Asegurarse que los roles existen en la tabla de roles
            'password' => 'nullable|string|min:8|confirmed',
            'website' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
        ]);

        // Actualizar los campos del usuario
        $user->update([
            'name' => $validatedData['name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'website' => $validatedData['website'] ?? null,
            'position' => $validatedData['position'] ?? null,
            'company' => $validatedData['company'] ?? null,
        ]);

        // Si se proporciona la contraseña, actualizarla
        if ($request->filled('password')) {
            $user->update(['password' => bcrypt($request->password)]);
        }

        // Obtener los nombres de los roles desde los IDs y sincronizarlos
        $roles = Role::whereIn('id', $request->input('roles'))->pluck('name')->toArray();
        $user->syncRoles($roles); // Sincronizar roles usando nombres

        // Actualizar la imagen de perfil si está presente
        if ($request->hasFile('image')) {
            if ($user->profile_photo_path && Storage::disk('public')->exists($user->profile_photo_path)) {
                Storage::disk('public')->delete($user->profile_photo_path); // Eliminar la imagen anterior
            }

            $imagePath = $request->file('image')->storeAs(
                'fotos_perfil/' . $user->id,
                'profile_photo.' . $request->file('image')->getClientOriginalExtension(),
                'public'
            );
            $user->update(['profile_photo_path' => $imagePath]);
        }

        return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado correctamente');
    }

    // Eliminar un usuario
    public function destroy(User $user)
    {
        // Eliminar la carpeta de fotos de perfil si existe
        if (Storage::disk('public')->exists('fotos_perfil/' . $user->id)) {
            Storage::disk('public')->deleteDirectory('fotos_perfil/' . $user->id);
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Usuario eliminado correctamente');
    }
}
