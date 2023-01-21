<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/posts",
     *      operationId="post",
     *      tags={"Post"},
     *      summary="Get list of post",
     *      description="Returns list of post",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/PostResource")
     *       ),
     * )
     */
    public function index()
    {
        $posts = Post::all();

        return new PostResource($posts);
    }
   

    /**
     * @OA\Post(
     *     path="/api/posts",
     *     tags={"Post"},
     *     summary="Adds a new post - with oneOf examples",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="title",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="description",
     *                     oneOf={
     *                     	   @OA\Schema(type="string"),
     *                     	   @OA\Schema(type="integer"),
     *                     }
     *                 ),
     *                 example={"id": "a3fb6", "title": "Jessica Smith", "description": 12345678}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             oneOf={
     *                 @OA\Schema(ref="#/components/schemas/Post"),
     *                 @OA\Schema(type="boolean")
     *             },
     *             @OA\Examples(example="result", value={"success": true}, summary="An result object."),
     *             @OA\Examples(example="bool", value=false, summary="A boolean value."),
     *         )
     *     )
     * )
     */
    public function store(StorePostRequest $request)
    {
        try {
            
            $posts = Post::create($request->validated());

            return new PostResource($posts);

        } catch (\Throwable $th) {

            return response()->json(["msg"=>$th->getMessage()], 400); //bad request
        }

    }

    /**
     * @OA\Get(
     *      path="/api/posts/{id}}",
     *      operationId="getPostById",
     *      tags={"Post"},
     *      summary="Get post information",
     *      description="Returns post data",
     *      @OA\Parameter(
     *          name="id",
     *          description="post id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),  
*            @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Post")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     * )
     */
    public function show($id)
    {
        try {

            $posts = Post::findOrFail($id);

            return new PostResource($posts);

        } catch (\Throwable $th) {
            
            return response()->json(["msg"=> 'No Data found'], 404); //not found
        }
    }

    /**
     * @OA\Put(
     *     path="/api/posts/{id}",
     *     tags={"Post"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdatePostRequest")
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *      )
     * )
     */
    public function update(UpdatePostRequest $request, $id)
    { 
        try {
            $posts = Post::find($id);
       
            $posts->update($request->validated());

            return new PostResource($posts);

        } catch (\Throwable $th) {
            
            return response()->json(["msg"=>$th->getMessage()], 404); //not found
        }

        
    }

    /**
     * @OA\Delete(
     *      path="/api/posts/{id}",
     *      operationId="deletePost",
     *      tags={"Post"},
     *      summary="Delete existing post",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Post id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
        *      ),
        *       @OA\Response(
        *          response=200,
        *          description="Successful operation",
        *          @OA\JsonContent(ref="#/components/schemas/Post")
        *       ),
        *      @OA\Response(
        *          response=400,
        *          description="Bad Request"
        *      ),
     
     * )
     */
    public function destroy($id)
    {
        try {
            $post = Post::find($id);
            $post->delete();

            return response()->json(["msg"=>"Post deleted successfully!"]);

        } catch (\Throwable $th) {

            return response()->json(["msg"=>$th->getMessage()], 404); //bad request
        }
    }
}
