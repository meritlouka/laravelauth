<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
//use JWTAuth;
use Tymon\JWTAuthExceptions\JWTException;
use App\Http\Requests;
use App\Note;
use App\tag;

class NoteController extends Controller
{
    //
//     public function create()
// {
//     $categories = Category::all();

//     return view('tickets.create', compact('categories'));
// }
 public function __construct()
   {
       // Apply the jwt.auth middleware to all methods in this controller
       // except for the authenticate method. We don't want to prevent
       // the user from retrieving their token if they don't already have it
       $this->middleware('jwt.auth');
   }
  	public function index()
      {
  	    //$notes = Notes::where('user_id', Auth::user()->id)->paginate(10);
  	    

  	    // return view('notes.notes', compact('notes', 'tags'));

  	     try {

              if (! $user = JWTAuth::parseToken()->authenticate()) {
                  return response()->json(['user_not_found'], 404);
              }

          } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

              return response()->json(['token_expired'], $e->getStatusCode());

          } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

              return response()->json(['token_invalid'], $e->getStatusCode());

          } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

              return response()->json(['token_absent'], $e->getStatusCode());

          }
  		    $notes = Note::all(); 
  	      $tags = Tag::all();
  		        // the token is valid and we have found the user via the sub claim
  		       //return view('notes.notes', compact('notes', 'tags'));    
          return $notes;
      }
     /**
     * Store a new note.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
       // var_dump($request->all());exit;
       $params = json_decode(file_get_contents('php://input'),true);
      
        // store
        $note = new Note;
  
        $note->content      = $params['content'];
        $note->user_id = $params['userId'];
        $note->tag_id = $params['tagId'];
        $note->category_id = $params['categoryId'];
        $note->save();
        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // delete
        $note = Note::find($id);
        $note->delete();
        return 'Success';
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // get the nerd
        $note = Note::find($id);
        return $note;
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {   
            $note = Note::find($id);
            $note->content      = $request->input('content');
            $note->user_id = $request->input('userId');
            $note->tag_id = $request->input('tagId');
            $note->category_id = $request->input('categoryId');
            $note->save();
            return 'success';
    }







}
