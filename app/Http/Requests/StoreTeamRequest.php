<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoreTeamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Here we can specify who is authorized to make this request, for example, only authenticated users.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // The teamId is used to ignore the current team when updating it, if not it will always return a unique error.
        $teamId = $this->route('team') ? $this->route('team')->id : null;

        $rules = [
            // The league_id must exist in the leagues table.
            'league_id' => 'nullable|exists:leagues,id',
            // The name must be unique in the teams table, but we need to ignore the current team when updating it.
            'name' => ['required', Rule::unique('teams')->ignore($teamId)],
            'city' => 'required|string', // Maybe later I could use a selector.
            'country' => 'required|string',
            'founded' => 'nullable|integer|between:1800,' . date('Y'),
            'stadium_name' => 'nullable|string',
            'stadium_capacity' => 'nullable|integer|min:500',
        ];

        if ($this->isMethod('post')) {
            $rules['logo'] = 'required|image|max:500|mimes:jpeg,png,jpg,svg';
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        // Add custom error messages for the rules defined in the rules() method.
        return [
            'name.unique' => 'The team name is already taken.',
            'founded.integer' => 'The year founded must be an integer.',
            'founded.between' => 'The year founded must be between 1800 and the current year.',
            'stadium_capacity.integer' => 'The stadium capacity must be an integer.',
            'stadium_capacity.min' => 'The stadium capacity must be at least 500.',
            'logo.required' => 'A logo is required.',
            'logo.image' => 'The logo must be an image.',
            'logo.max' => 'The size of the logo is too big. Please upload a file less than 500KB.',
        ];
    }
}
