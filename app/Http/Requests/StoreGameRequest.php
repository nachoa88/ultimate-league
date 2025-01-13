<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoreGameRequest extends FormRequest
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
        return [
            // The league_id must exist in the leagues table.
            'league_id' => 'exists:leagues,id',
            // The home_team_id and away_team_id must be different. Also, they must exist in the teams table.
            'home_team_id' => ['required', 'exists:teams,id', Rule::notIn([$this->away_team_id])],
            'away_team_id' => ['required', 'exists:teams,id', Rule::notIn([$this->home_team_id])],
            'date' => 'required|date|before_or_equal:today',
            // I think it's not necessary because form html already has the type="number" attribute and "required" camp.
            'home_team_goals' => 'required|integer',
            'away_team_goals' => 'required|integer',
            'matchweek' => 'integer|min:1',
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
            'league_id' => 'The selected league cannot be found.',
            'home_team_id.required' => 'The home team is required.',
            'home_team_id.not_in' => 'The home team cannot be the same as the away team.',
            'away_team_id.required' => 'The away team is required.',
            'date.required' => 'The date is required.',
            'date.before_or_equal' => 'The date of the match cannot be in the future.',
            'home_team_goals.required' => 'The home team goals are required.',
            'away_team_goals.required' => 'The away team goals are required.',
            'matchweek.integer' => 'The matchweek must be an integer.',
        ];
    }
}
