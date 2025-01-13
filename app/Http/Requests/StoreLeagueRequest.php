<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoreLeagueRequest extends FormRequest
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
        // The leagueId is used to ignore the current league when updating it, if not it will always return a unique error.
        $leagueId = $this->route('league') ? $this->route('league')->id : null;

        return [
            // The name must be unique in the leagues table, but we need to ignore the current league when updating it.
            'name' => ['required', Rule::unique('leagues')->ignore($leagueId)],
            'country' => 'required|string', // Maybe later i could use a selector.
            'level' => 'required|integer|min:1|max:10',
            'teams_number' => 'required|integer|min:2|max:40',
        ];
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
            
        ];
    }
}
