<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        return response()->json(
            User::select('id', 'name', 'email', 'role', 'created_at')->orderBy('created_at')->get()
        );
    }

    public function store(Request $request)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role'     => 'sometimes|in:admin,officer',
        ]);

        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'role'     => $data['role'] ?? 'officer',
        ]);

        return response()->json(
            ['id' => $user->id, 'name' => $user->name, 'email' => $user->email, 'role' => $user->role, 'created_at' => $user->created_at],
            201
        );
    }

    public function updatePassword(Request $request, $id)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $data = $request->validate([
            'password' => 'required|string|min:8',
        ]);

        $user = User::findOrFail($id);
        $user->update(['password' => Hash::make($data['password'])]);

        return response()->json(['message' => 'Password updated']);
    }

    public function destroy(Request $request, $id)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        if ((int) $id === $request->user()->id) {
            return response()->json(['message' => 'Cannot delete your own account'], 403);
        }

        User::findOrFail($id)->delete();
        return response()->json(['message' => 'Account deleted']);
    }
}
