<?php

namespace App\Http\Requests;

class BonusCardUpdateStatusRequest extends Request
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
            'status' => 'required|boolean',
        ];
    }
    
}
