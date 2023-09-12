<?php

namespace Modules\Petcare\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validate_time_periods extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules($days)
    {

        foreach($days as $day){
            $count=count($request->day[$day]);
            for ($i=0; $i <$count ; $i++) { 
          day[$day][$i]["'from'"];
          day[$day][$i]["'to'"];
            }
          }
        return [
                'day.*.*.from' => 'required|date_format:H:i',
                'day.*.*.to' => 'required|date_format:H:i',
                'day' => 'validate_time_periods:' . $this->day,
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
