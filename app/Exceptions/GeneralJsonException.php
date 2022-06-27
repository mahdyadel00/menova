<?php

namespace App\Exceptions;

use Exception;

class GeneralJsonException extends Exception
{
    /**
     * Api response exception status code.
     *
     * @var integer
     */
    protected $code = 422;

    /**
     * Report the exception.
     *
     * @return bool|null
     */
    public function report()
    {
        //
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response()->json(['errors' => true, 'message' => $this->getMessage()], $this->code);
    }
}