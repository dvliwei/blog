<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use Redirect;
class EnquiryController extends Controller
{
    public function index()
    {
        $data = Input::all();
        $rules = array(
            'g-recaptcha-response' => 'required|captcha',
            'msg' => 'required',
        );
        $validator = Validator::make($data, $rules);
        if ($validator->fails()){
            return ['status'=>'success'];
        }else{
            return ['status'=>'error'];
        }
    }
}
