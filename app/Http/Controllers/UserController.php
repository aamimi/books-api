<?php

namespace App\Http\Controllers;

use App\Http\Resources\MyBookResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\UsersResource;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of user.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return UsersResource::collection(User::paginate());
    }

    /**
     * Store a newly created user in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $article = User::create($request->all());

        return response()->json($article, 201);
    }

    /**
     * Display the specified user.
     *
     * @param User $user
     *
     * @return UserResource
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified user in storage.
     *
     * @param Request $request
     * @param User $user
     *
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return response()->json($user, 200);
    }

    /**
     * Remove the specified user from storage.
     *
     * @param User $user
     *
     * @return Response
     * @throws Exception
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }

    /**
     * Display a listing of user books.
     *
     * @param User $user
     *
     * @return AnonymousResourceCollection
     */
    public function books(User $user)
    {
        return MyBookResource::collection($user->books);
    }
}
