<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlightRequest extends FormRequest
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
            'airline_iata'=> 'string|max:3|min:2',
            'flight_number'=>'numeric|min:1|max:9999',
            'from_code'=> 'string|max:3|min:3',
            'to_code'=>'string|max:3|min:3',
            'departure_date_utc'=> 'date_format:Y-m-d H:i:s',
        ];
    }

    public function messages()
    {
        return [
            'airline_iata.max' => 'IATA Should contain 2 symbols.',
            'airline_iata.min' => 'IATA Should contain 2 symbols.',
            'flight_number.min' => 'Flight number should be at range 1 to 9999.',
            'flight_number.max' => 'Flight number should be at range 1 to 9999.',
            'from_code.max' => 'Code From Should contain 2 symbols.',
            'from_code.min' => 'Code From Should contain 2 symbols.',
            'to_code.min' => 'Code To Should contain 2 symbols.',
            'to_code.max' => 'Code To Should contain 2 symbols.',
            'departure_date_utc.date_format' => 'Please fill the date at the Y-m-d H:i:s format.',
        ];
    }
}
