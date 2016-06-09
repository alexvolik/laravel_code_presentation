<?php

namespace App\Http\Requests;

class BonusCardCreateRequest extends Request
{
    /**
     * @inheritdoc
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'series' => 'required|size:3',
            'expiration' => 'required|in:1,6,12',
            'number' => 'required|integer|min:100000|max:999999',
        ];
    }
    
}
