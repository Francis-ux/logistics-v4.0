<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShipmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
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
            // Sender
            'sender_name'        => ['required', 'string', 'max:255'],
            'sender_address'     => ['required', 'string', 'max:500'],
            'sender_phone'       => ['required', 'string', 'max:20'],
            'sender_email'       => ['required', 'email', 'max:255'],

            // Client (receiver)
            'client_name'        => ['required', 'string', 'max:255'],
            'client_address'     => ['required', 'string', 'max:500'],
            'client_phone'       => ['required', 'string', 'max:20'],
            'client_email'       => ['required', 'email', 'max:255'],

            // Shipment route
            'shipped_from'       => ['required', 'string', 'max:255'],
            'shipped_to'         => ['required', 'string', 'max:255'],

            // Dates & times
            'departure_date'     => ['required', 'date'],
            'arrival_date'       => ['required', 'date', 'after_or_equal:departure_date'],
            'departure_time'     => ['required', 'date_format:H:i'],
            'arrival_time'       => ['required', 'date_format:H:i'],

            // Dimensions & quantity
            'weight'             => ['required', 'numeric', 'min:0.1'],
            'quantity'           => ['required', 'integer', 'min:1'],
            'length'             => ['nullable', 'numeric', 'min:0'],
            'width'              => ['nullable', 'numeric', 'min:0'],
            'height'             => ['nullable', 'numeric', 'min:0'],

            // Shipment details
            'description'        => ['nullable', 'string', 'max:1000'],
            'comment'            => ['nullable', 'string', 'max:1000'],
            'product'            => ['required', 'string', 'max:255'],
            'carrier_reference_no' => ['nullable', 'string', 'max:100'],
            'carrier'            => ['nullable', 'string', 'max:255'],

            // Payment & amounts
            'amount'             => ['required', 'numeric', 'min:0'],
            'currency'           => ['required', 'string'],
            'payment_mode'       => ['required'],
            'total_freight'      => ['nullable', 'numeric', 'min:0'],

            // Type & mode
            'type'               => ['required'],
            'mode'               => ['required'],

            // Status & tracking
            'status'             => ['required', 'in:Picked Up,On Hold,Out For Delivery,In Transit,En Route,Cancelled,Delivered,Returned,Arrived'],
            'current_location'   => ['nullable', 'string', 'max:255'],

            // File upload
            'image'              => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
        ];
    }
}
