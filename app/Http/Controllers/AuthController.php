<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $user = auth()->user();
        $rol = auth()->payload()->get('rol');

        return response()->json(['user' => $user, 'rol' => $rol]);
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
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
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

    public function register(UserRequest $request)
    {

        $user = User::create([
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'domicilio' => $request->domicilio,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => $request->rol,
            'id_sucursal' => $request->id_sucursal
        ]);

        if(!$request->rol){
            $this->assignDefaultRole($user);
        }else{
            $user->assignRole($request->rol);
        }
        return response()->json(['usuario' => $user], 200);
    }

    private function assignDefaultRole(User $user)
    {
        $user->assignRole('mesero');
    }

    public function index(){
        $data = User::all();

        return response()->json(["data" => $data]);
    }
}
