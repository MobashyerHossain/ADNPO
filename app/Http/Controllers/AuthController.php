<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Role;

class AuthController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'role' => 'required|integer',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);

        if ($validator->fails()) {
            $response['response'] = $validator->messages();

            return response($response, 401);
        }else{
            $validated = $validator->validated();

            $user = User::create([
                'name' => $validated['name'],
                'role_id' => $validated['role'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
            ]);
    
            $token = $user->createToken('myapptoken')->plainTextToken;
    
            $response = [
                'user' => $user,
                'token' => $token,
            ];

            return response($response, 201);
        }
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            $response['response'] = $validator->messages();

            return response($response, 401);
        }else{
            $validated = $validator->validated();
            $user = User::where('email', $validated['email'])->first();

            if(!$user || !Hash::check($validated['password'], $user->password)){
                $response = [
                    'message' => 'Bad Credentials',
                    'response' => $validator->messages(),
                ];

                return response($response, 401);
            }
    
            $token = $user->createToken('myapptoken')->plainTextToken;
    
            $response = [
                'user' => $user,
                'role' => $user->Role,
                'token' => $token,
            ];

            return response($response, 201);
        }
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required|string',
            'phone' => 'required|string',
            'password' => 'required|string|confirmed',
            'image_path' => 'string',
            'gender' => 'required|string',

        ]);

        if ($validator->fails()) {
            $response['response'] = $validator->messages();

            return response($response, 401);
        }else{
            $validated = $validator->validated();
            
            $user = User::find($validated['id']);
            
            $user->name = $validated['name'];
            $user->phone = $validated['phone'];
            $user->password = $validated['password'];
            $user->image_path = $validated['image_path'];
            $user->gender = $validated['gender'];
            $user->save();

            $response = [
                'user' => $user,
            ];

            return response($response, 201);
        }
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        $response = [
            'message' => 'Logged out',
        ];

        return response($response, 201);
    }

    public function destroy(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string',
            'user_access_to_be_revocked' => 'required|string'
        ]);

        if ($validator->fails()) {
            $response['response'] = $validator->messages();

            return response($response, 401);
        }else{
            $validated = $validator->validated();
            $user = User::where('email', $validated['email'])->first();

            if(!$user || !Hash::check($validated['password'], $user->password)){
                $response = [
                    'message' => 'Bad Credentials',
                    'response' => $validator->messages(),
                ];

                return response($response, 401);
            }
    
            $user_access_to_be_revocked = User::where('email', $validated['user_access_to_be_revocked'])->first();
            
            if($user_access_to_be_revocked){
                $user_access_to_be_revocked->delete();

                $response = [
                    'message' => 'Access for User '.$user_access_to_be_revocked->name.' has been Revocked!',
                ];
            }
            else{
                $response = [
                    'message' => 'User Not Found!',
                ];
            }            

            

            return response($response, 201);
        }
    }
}
