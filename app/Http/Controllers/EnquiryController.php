<?php

namespace App\Http\Controllers;

//use App\Http\Requests\EnquiryRequest;
use Request;
use Input;
use Validator;
use Redirect;
use Session;
use NoCaptcha;
class EnquiryController extends Controller
{
    public function index()
    {
        $input = Input::all();

        $rules = array(
            'g-recaptcha-response' => 'required|captcha',
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()){
            dd('error');
            return Redirect::to('/contact');
        }
        else{
            dd('ok');
        }
    }
}
