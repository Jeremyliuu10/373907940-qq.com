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
         $travels = DB::table('travels')->where('city', 'LIKE', '%' . $request->search . "%")->get();
         if ($travels) {
            foreach ($travels as $key => $travel) {
               $output .= '<tr>' .
                  '<td>' . $travel->id . '</td>' .
                  '<td>' . $travel->title . '</td>' .
                  '<td>' . $travel->name . '</td>' .
                  '<td>' . $travel->city . '</td>' .
                  '<td>' . $travel->description . '</td>' .
                  '<td>' . $travel->start_date . '</td>' .
                  '<td>' . $travel->end_date . '</td>' .
                  '</tr>';
            }
            return Response($output);
         }
      }
   }
}
