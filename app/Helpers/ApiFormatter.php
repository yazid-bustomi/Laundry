<?php 
namespace App\Helpers;

class ApiFormatter
{
    protected static $response = [
        'code' => null,
        'message' => null,
        'data' => null,
    ];

    // parsing datanya lalu di masukkan ke response di atas
    public static function CreateApi($code = null, $message = null, $data = null){
        self::$response['code'] = $code;
        self::$response['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['code']);
    }
}

?>