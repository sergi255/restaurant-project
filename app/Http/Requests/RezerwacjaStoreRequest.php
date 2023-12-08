<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;

class RezerwacjaStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'imie' => ['required'],
            'nazwisko' => ['required'],
            'email' => ['required', 'email'],
            'numer_telefonu' => ['required'],
            'data_rezerwacji' => ['required', 'date', new DateBetween],
            'godzina_rezerwacji' => ['required', new TimeBetween],
            'liczba_osob' => ['required'],
            'stolik_id' => ['required']
        ];
    }
}
