<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductValidate extends FormRequest
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
     * @return array
     */
    public function rules()
    {

        switch($this->method())
        {
            case 'POST':
            {
                 return [
                    'name' => 'required|string|max:255',
                    'description' => 'required|string',
                    'price' => 'required|numeric',
                    'special_price' => 'nullable|numeric|required_with:special_price_start',
                    'special_price_start' => 'nullable|required_with:special_price,special_price_end|date',
                    'special_price_end' => 'nullable|required_with:special_price_start|date|after:special_price_start',
                    'sku' => 'nullable|string|max:255',
                    'qty' => 'required_if:manage_stock,1',
                    'meta_title' => 'nullable|string|max:255',
                    'meta_keywords' => 'nullable|string|max:255',
                    'meta_description' => 'nullable|string',
                    'short_description' => 'nullable|string',
                    'new_from' => 'nullable|date',
                    'new_to' => 'nullable|required_with:new_from|date|after:new_from',
                    'attribute.*.attribute_value_id' => 'nullable|required_with:attribute.*.attribute_id',
                    'options.*.type' => 'nullable|required_with:options.*.name',
                    'options.*.is_required' => 'nullable|required_with:options.*.name',
                    'options.*.values.*.label' => 'nullable|required_with:options.*.name',
                    'options.*.values.*.price_type' => 'nullable|required_with:options.*.values.*.price',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                 return [
                    'name' => 'required|string|max:255',
                    'url' => 'required|string|max:255|unique:products,slug,'.$this->product->id,
                    'description' => 'required|string',
                    'price' => 'required|numeric',
                    'special_price' => 'nullable|numeric',
                    'special_price_start' => 'nullable|required_with:special_price|date',
                    'special_price_end' => 'nullable|required_with:special_price_start|date|after:special_price_start',
                    'sku' => 'nullable|string|max:255',
                    'qty' => 'required_if:manage_stock,1',
                    'meta_title' => 'nullable|string|max:255',
                    'meta_keywords' => 'nullable|string|max:255',
                    'meta_description' => 'nullable|string',
                    'short_description' => 'nullable|string',
                    'new_from' => 'nullable|date',
                    'new_to' => 'nullable|required_with:new_from|date|after:new_from',
                     'attribute.*.attribute_value_id' => 'nullable|required_with:attribute.*.attribute_id',
                    'options.*.type' => 'nullable|required_with:options.*.name',
                    'options.*.is_required' => 'nullable|required_with:options.*.name',
                    'options.*.values.*.label' => 'nullable|required_with:options.*.name',
                    'options.*.values.*.price_type' => 'nullable|required_with:options.*.values.*.price',
                ];
            }
            default:break;
        }
    }
}
