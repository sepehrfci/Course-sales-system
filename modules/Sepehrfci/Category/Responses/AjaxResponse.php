<?php

namespace Sepehrfci\Category\Responses;

use Illuminate\Http\Response;

class AjaxResponse
{
    public static function success($message)
    {
        return response()->json(['message'=>$message],Response::HTTP_OK);
    }
}
