<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Services\AuthService;
class AuthController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService=$authService;
    }

    public function login(AuthRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $token = $this->authService->login($credentials ,$request->guard);
        if (!$token) {
            return response()->json(['error' => 'البريد الألكتروني او كلمه المرور غير صحيحه'],401);
        }
        return response()->json(['success' => 'تم تسجيل الدخول بنجاح'],200);
    }

    public function AdminLogout()
    {
        $this->authService->logout('admin');
        return redirect('dashboard/login');
    }
    public function TeacherLogout()
    {
        $this->authService->logout('teacher');
        return redirect('teachers/login');
    }
    public function UserLogout()
    {
        $this->authService->logout('web');
        return redirect('/login');
    }

    public function getProfile()
    {
        $user = auth(App::API_GUARD)->user();
        return $this->returnDate('user', new UserResource($user), 'User data send successfully');
    }
    public function showLoginFormAdmin()
    {
        return view('login');
    }
    public function showLoginFormTeacher()
    {
        return view('teacher.login');
    }
    public function showLoginFormUser()
    {
        return view('users.login');
    }
}
