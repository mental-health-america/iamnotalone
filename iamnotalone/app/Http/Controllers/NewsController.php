<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Newsletter;


class NewsController extends Controller
{

    /**
     * Create a newsletter
     * 
     * @param Request $request 
     * 
     * @return bool
     */
    public function createNewsletter(Request $request)
    {
        try {
            $val = $request->validate([
                'newsletter'=>'required'
            ]);
            $news = new Newsletter;
            $news->email = $request->newsletter;
            if ($news->save()) {
                notify()->success("Email subscribed successfully");
                return back();
            } else {
                notify()->info("Something went wrong, please try again", "Notice");
                return back();
            }
        }catch (\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062')
            notify()->error("Email already exist", "Error");
            return back();
        }
    }

  }
