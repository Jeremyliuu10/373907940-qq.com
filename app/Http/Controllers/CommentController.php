<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Auth\Access\Response;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $comments=Comment::all();
        // return view('travels.show', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //echo("<script>console.log('testing: enter store function')</script>");
        $request->validate([
            'reviewer'=>'required',
            'reviewee'=>'required',
            'comment'=>'required|max:255',
            'travel_post_id'=>'required'
        ]);
        $comment=new Comment([
            'reviewer'=>$request->get('reviewer'),
            'reviewee'=>$request->get('reviewee'),
            'comment'=>$request->get('comment'),
            'travel_post_id'=>$request->get('travel_post_id')
        ]);
        $comment->save();
        echo("<script>console.log('testing: after save()')</script>");
        $output="";
        if ($request->ajax()){
            //echo("<script>console.log('testing: enter resuest->ajax()')</script>");
            $new_comments=Comment::where('travel_post_id',$request->get('travel_post_id'))
            ->orderBy('created_at','DESC')
            ->get();
            if($new_comments){
                foreach($new_comments as $key=>$new_comment){
                    $output.='<tr><td>'.$new_comment->reviewer.': '.$new_comment->comment.'</td></tr>';
                }
            }
            return Response($output);
        }
       //TODO:输出到show.blade.php里的comments表格中，不要用redirect返回
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $output="";
        if ($request->ajax()){
            //echo("<script>console.log('testing: enter show() resuest->ajax()')</script>");
            $new_comments=Comment::where('travel_post_id',$request->get('travel_post_id'))
            ->orderBy('created_at','DESC')
            ->get();
            if($new_comments){
                foreach($new_comments as $key=>$new_comment){
                    $output.='<tr><td>'.$new_comment->reviewer.': '.$new_comment->comment.'</td></tr>';
                }
            }
            return Response($output);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
