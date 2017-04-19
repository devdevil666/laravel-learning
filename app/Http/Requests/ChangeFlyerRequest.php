<?php

namespace App\Http\Requests;

use App\Flyer;
use Illuminate\Foundation\Http\FormRequest;
//use Illuminate\Support\Facades\Auth;

/**
 * @property string zip
 * @property string street
 */
class ChangeFlyerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Flyer::locatedAt($this->zip, $this->street)->where([
            'user_id' => auth()->user()->id,
        ])->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'file' => 'required|mimes:jpg,jpeg,png'
        ];
    }
}
