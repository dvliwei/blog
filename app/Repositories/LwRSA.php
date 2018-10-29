<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2018/6/13
 * Time: 上午10:01
 */
namespace App\Repositories;

class LwRSA {
    const PRIVATE_KEY = "LS0tLS1CRUdJTiBQUklWQVRFIEtFWS0tLS0tCk1JSUJWUUlCQURBTkJna3Foa2lHOXcwQkFRRUZBQVNDQVQ4d2dnRTdBZ0VBQWtFQXVSaGZFb3J2c1hvR3dDOWwKYzMzT2lMa1NVN0dDR3dWRy9RTGZtdjlBU0JHYys2a3lsOU1MR2Fla3c5eVJ1VzhLMEdBQmhXUU41RGtSL2RoZQpULzZjM1FJREFRQUJBa0FKNUxxWU5DTHh1cE1Iek1EQWRwWUdpdFhtOFZNQi9MczVwT0NzMlQzblhDcGhqdSszCk5xRU1IaTNmMWJkSmhNaDY0NHNza1JHdnFDeHR2Q2htbFZMQkFpRUEydVQvRXhyeDU3eGZwUkpHN1BUazNMZHkKeWNleEdXcVRJTmpzZno0czVLMENJUURZZUtSVVl3NlRNaE1FSm9yM0NmWDVOaFY2OTN6YmJiOFRSNFMreVgxdQo4UUlnTC9qOStoYnVxMFg2aERma09XeFdlQlR3WUU2V2ZxWi94alFrYUtLY3ZpVUNJUUNaWlh4RmxHQmFyR3hQClQ2VEFCSjM2ZUhubVJvU0MxaFZGNnpORkkzRXdjUUloQUtORGlUZExEZXp6am82Mkl3QjNvaS9FRis3SE5zTHYKQmdkMkNDUThDT2VrCi0tLS0tRU5EIFBSSVZBVEUgS0VZLS0tLS0K";
    const PUBLIC_KEY = "LS0tLS1CRUdJTiBQVUJMSUMgS0VZLS0tLS0KTUZ3d0RRWUpLb1pJaHZjTkFRRUJCUUFEU3dBd1NBSkJBTGtZWHhLSzc3RjZCc0F2WlhOOXpvaTVFbE94Z2hzRgpSdjBDMzVyL1FFZ1JuUHVwTXBmVEN4bW5wTVBja2JsdkN0QmdBWVZrRGVRNUVmM1lYay8rbk4wQ0F3RUFBUT09Ci0tLS0tRU5EIFBVQkxJQyBLRVktLS0tLQo";
    private static $private_key;
    private static $public_key;


    /**
     * 解密
     * @param $str
     * @return string
     */
    public static function private_decrypt($str){
        self::setup_key();
        $result = "";
        $strlength = strlen($str);
        $maxlength = 128;
        for($i=0; $i<$strlength; $i+=$maxlength){
            $input = substr($str, $i, $maxlength);
            openssl_private_decrypt($input, $decrypted, self::$private_key);
            $result .= $decrypted;
        }
        echo $result;
        return $result;
    }

    /**
     * 加密
     * @param $str
     * @return string
     */
    public static function public_encrypt($str){
        self::setup_key();
        $result = "";
        $strlength = strlen($str);
        $maxlength = 117;
        for($i=0; $i<$strlength; $i+=$maxlength){
            $input = substr($str, $i, $maxlength);
            openssl_public_encrypt($input, $encrypted, self::$public_key);
            $result .= $encrypted;
        }
        return $result;
    }




    private static function setup_key(){
        if (!self::$private_key)
            self::$private_key = openssl_pkey_get_private(base64_decode(self::PRIVATE_KEY));
        if (!self::$public_key)
            self::$public_key = openssl_pkey_get_public(base64_decode(self::PUBLIC_KEY));
    }


    /**
     * 创建新的私钥和公钥
     */
    public static function createKey(){
        $config = array(
            "private_key_bits" => 512,                     //字节数    512 1024  2048   4096 等
            "private_key_type" => OPENSSL_KEYTYPE_RSA,     //加密类型
        );
        $r = openssl_pkey_new($config);
        openssl_pkey_export($r, $privKey);
        $rp = openssl_pkey_get_details($r);
        $pubKey = $rp['key'];
        echo "pri: ", base64_encode($privKey), "\n\n";
        echo "pub: ", base64_encode($pubKey), "\n\n";
    }
}