<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Travel;      //连接上刚刚创建的model


class SearchController extends Controller
{
   public function index()
   {
      return view('travels.index');
   }
   public function search(Request $request)
   {
      if ($request->ajax()) {
         $output = "";
         // $travels = Travel::where('city',$request->search)->orWhere('tag',$request->search)->get();
         $travels = Travel::where('city', 'LIKE', '%' . $request->search . "%")->orWhere('tag', 'LIKE', '%' . $request->search . "%")->get();
         
         if ($travels) {
            foreach ($travels as $key => $travel) {
               $output .= '<tr>' .
                  // '<td>' . $travel->id . '</td>' .
                  // '<td>' . $travel->title . '</td>' .
                  '<td>' . $travel->name . '</td>' .
                  '<td>' . $travel->city . '</td>' .
                  '<td>' . $travel->tag . '</td>' .
                  '<td>' . $travel->start_date . '</td>' .
                  '<td>' . $travel->end_date . '</td>' .
                  '</tr>';
            }
            return Response($output);
         }
      }
   }


   public function search2(Request $request)
   {
      if ($request->ajax()) {
         $output = "";
         $travels = Travel::where('city',$request->search)->orWhere('tag',$request->search)->get();
         // $travels = Travel::where('city', 'LIKE', '%' . $request->search . "%")->orWhere('tag', 'LIKE', '%' . $request->search . "%")->get();
         
         if ($travels) {
            foreach ($travels as $key => $travel) {
               $output .= '<tr>' .
                  // '<td>' . $travel->id . '</td>' .
                  // '<td>' . $travel->title . '</td>' .
                  '<td>' . $travel->name . '</td>' .
                  '<td>' . $travel->city . '</td>' .
                  '<td>' . $travel->tag . '</td>' .
                  '<td>' . $travel->start_date . '</td>' .
                  '<td>' . $travel->end_date . '</td>' .
                  '</tr>';
            }
            return Response($output);
         }
      }
   }
}
