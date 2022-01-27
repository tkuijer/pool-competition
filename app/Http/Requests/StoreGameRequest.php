<?php

namespace App\Http\Requests;

use App\Models\Game;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreGameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'winner_id' => 'integer|required|exists:players,id',
            'opponent_id' => 'integer|required|exists:players,id|different:winner_id',
            'winner_color' => ['string', 'required', Rule::in(Game::getColors())],
            'win_method' => ['string', 'required', Rule::in(Game::getWinningMethods())],
            'winner_cue' => 'integer|required',
            'opponent_cue' => 'integer|required',
        ];
    }
}
