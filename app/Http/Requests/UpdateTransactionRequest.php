<?php

namespace App\Http\Requests;

use App\PaymentMethod;
use App\PaymentStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user' => 'required|exists:users,id',
            'product'=> 'required|exists:products,id',
            'payment_method'=> ['required', Rule::enum(PaymentMethod::class)],
            'status'=> ['required', Rule::enum(PaymentStatus::class)],
        ];
    }
}
