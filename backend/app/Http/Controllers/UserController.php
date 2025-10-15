<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hashids\Hashids;

class UserController extends Controller
{
    public function show($hash)
    {
        $hashids = new Hashids(env('HASHIDS_SALT', 'hatdogeveryday'), 10);
        $decoded = $hashids->decode($hash);

        if (count($decoded) === 0) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $userId = $decoded[0];
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($user);
    }
}
