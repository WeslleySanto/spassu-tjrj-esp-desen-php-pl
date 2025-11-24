<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiRequest extends FormRequest
{
    /**
     * The authorization logic for the request.
     *
     * @return boolean
     * 
     * @todo @covers tests/Unit/App/Http/Requests/ApiRequestTest::testAuthorizeMethod
     */
    public function authorize(): bool
    {
        return true;
    }
}
