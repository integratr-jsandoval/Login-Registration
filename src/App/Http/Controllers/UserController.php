<?php

namespace MicroService\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use MicroService\App\Http\Controllers\Controller;
use MicroService\App\Models\AdminProfile;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function store(Request $request)
    {

        $admin_profile = $this->payloadProfile($request);
        $admin_profile = AdminProfile::create($admin_profile);
        $admin_profile->profile()->create([
            'password' => Hash::make($admin_profile->password),
            'profile_type' => 'Admin',
            'profile_id' => $admin_profile->id
        ]);

        return array(
            "status" => "success",
            'data' => $admin_profile,
            'desc' => 'User Account Successfully Created!'
        );
    }

    public function payloadProfile(Request $request)
    {
        return $this->validate($request, [
            'username' => ['required_if:email, null', 'required_if:mobile_number, null'],
            'email' => ['nullable', 'email', 'unique:admin_profiles'],
            'mobile_number' => ['nullable'],
            'password' => ['required']
        ]);
    }
}
