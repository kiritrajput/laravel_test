<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserMail;

class UserController extends Controller
{

    public function getUserSaveEmailData()
    {
        return view('main');
    }

    public function upload(Request $request){
        if($request->hasFile('upload')){
            $originName = $request->file('upload')->getClientOriginalExtension();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $request->file('upload')->move(public_path('images/files/'), $fileName);

            $url = asset('images/files/' . $fileName);
            return response()->json(['fileName'=>$fileName, 'uploaded'=>1, 'url'=>$url]);
        }
    }

    public function saveEmailData(Request $request){
        $userMail = new UserMail();
        $userMail->subject = $request->subject;
        $userMail->message = $request->message;
        $userMail->save();

        return redirect()->route('show-data');
    }

    public function fetchData()
    {
        $user_data = UserMail::select('id', 'subject','message')->get();

        if($user_data->isNotEmpty()){
            return response()->json([
                'message'=>'data found',
                'data'=>$user_data,
                'status'=>200
            ]);
        } else {
            return response()->json([
                'message' => 'No data found',
                'status' => 404
            ]);
        }
    }

    public function showData(){
        return view('show');
    }
}
