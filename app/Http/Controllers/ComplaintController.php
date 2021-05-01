<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\complaint;

class ComplaintController extends Controller
{

    /**
     * listing complaints
    */
    public function listing(Request $request)
    {
        if(auth()->user()['role'] !== "customer"){
            return complaint::all();
        }else{
            $id = auth()->user()->id;

            return complaint::where('userID', $id)->get();
        }

    }



    /**
     * listing complaints
    */
    public function getComplaint($id)
    {
        return complaint::where('id', $id)->get();
    }

     /**
     * register new complaint
    */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'complaint' =>'required',
            'status' => 'required'

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $id = auth()->user()->id;
        return  complaint::create($request->all()+ ['userID' => $id] + ['status' => 'pending']);
    }


    /**
     * update complaints
    */
    /**
     * TODO: validate status if logged in user an admin
     */
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'complaint' =>'required',
            'status' => 'required'
        ]);


        if ($validator->fails()) {
            return response()->json($request->errors(), 422);
        }

        if(auth()->user()['role'] === "admin"){

            $id = auth()->user()->id;
            return complaint::where('id', $id)->update($request->all() + ['checkedByID' => $id]);
        }

    }

}
