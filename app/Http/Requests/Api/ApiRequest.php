<?php

namespace App\Http\Requests\Api;

use App\Exceptions\Api\ApiException;
use Illuminate\Contracts\Validation\ValidatesWhenResolved;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ApiRequest extends FormRequest
{
    //Вызов исключения при провале аутентификации/авторизации
    public function FailedAuthorization(){
        throw new ApiException("Unauthorized", 401);
    }
    //Вызов исключения при провале валидации данных
    public function FailedValidation(Validator $validator){
        throw new ApiException("Unprocessable Entity", 422, $validator->errors());
    }
}
