<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PDF;
class UserController extends Controller
{
    public function index()
    {
        $users=User::limit(1000)->get();
        return view('welcome',['users'=>$users]);
    }

    // this function opens the PDF in browser. If we want, we can downlod
    public function openPDF()
    {
        $users = User::orderBy('id','asc')->limit(1000)->get();
        // usersPdf is the view that includes the downloading content
        $view = \View::make('usersPdf', ['users'=>$users]);
        $html_content = $view->render();
        // Set title in the PDF
        PDF::SetTitle("List of users");
        PDF::AddPage();
        PDF::writeHTML($html_content, true, false, true, false, '');
        // userlist is the name of the PDF downloading
        PDF::Output('userlist.pdf');    
    }
    // this function directly downloads the PDF. 
    public function savePDF()
    {
        $users = User::orderBy('id','asc')->limit(1000)->get();
        $view = \View::make('usersPdf', ['users'=>$users]);
        $html_content = $view->render();
        PDF::SetTitle("List of users");
        PDF::AddPage();
        PDF::writeHTML($html_content, true, false, true, false, '');
        // D is the change of these two functions. Including D parameter will avoid 
        // loading PDF in browser and allows downloading directly
        PDF::Output('userlist.pdf', 'D');    
    }
}
