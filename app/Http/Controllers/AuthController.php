<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @bodyParam email string required
     * @bodyParam password string required
     * @response {
     *      "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjUxNzMvYXBpL2xvZ2luIiwiaWF0IjoxNzE0ODM5ODA1LCJleHAiOjE3MTQ4NDM0MDUsIm5iZiI6MTcxNDgzOTgwNSwianRpIjoiTEhjNkQ3dXNGQWx6R3RVciIsInN1YiI6IjEiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.Aej-tCWQBbsfyzgp7_kbCRT41y8ODUDw9sV8epR9VnY",
     *      "token_type": "bearer",
     *      "expires_in": 3600
     * }
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request()->only(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @authenticated
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     * @authenticated
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Creates a new basic user in the application
     *
     * @bodyParam name string required
     * @bodyParam email string required
     * @bodyParam password string required
     *
     * @response {
     *      "status": "success",
     *      "message": "User created successfully",
     *      "user": {
     *          "name": "juan lopez",
     *          "email": "miguelangeltovar46@gmail.com",
     *          "updated_at": "2024-05-04T18:21:27.000000Z",
     *          "created_at": "2024-05-04T18:21:27.000000Z",
     *          "id": 4
     *      }
     * }
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request): JsonResponse{
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user
        ]);
    }


    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
