<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorefrontValidate extends FormRequest
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
         return [
            'product_features_1_icon' => 'required|string|max:255',
            'product_features_1_title' => 'required|string|max:255',
            'product_features_1_subtitle' => 'required|string|max:255',
            'product_features_2_icon' => 'required|string|max:255',
            'product_features_2_title' => 'required|string|max:255',
            'product_features_2_subtitle' => 'required|string|max:255',
            'product_features_3_icon' => 'required|string|max:255',
            'product_features_3_title' => 'required|string|max:255',
            'product_features_3_subtitle' => 'required|string|max:255',
            'featured_product_title' => 'nullable|required_with:featured_product_enable',
            'featured_product_subtitle' => 'nullable|required_with:featured_product_enable',
            'featured_product_cta_text' => 'nullable|required_with:featured_product_enable',
            'featured_product_cta_url' => 'nullable|required_with:featured_product_enable',
            'product_carousel_1_title' => 'nullable|required_with:product_carousel_1_enable',
            'product_carousel_2_title' => 'nullable|required_with:product_carousel_2_enable',
            'product_carousel_3_title' => 'nullable|required_with:product_carousel_3_enable',
            'featured_products_title' => 'nullable|required_with:featured_product_enable',
            'recent_products_title' => 'nullable|required_with:enable_recent_products',
            'recent_total_products' => 'nullable|required_with:enable_recent_products',
            'product_tab_1_title' => 'nullable|required_with:enable_products_tabs',
            'banner_section_1_cta_1_url' => 'nullable|required_with:banner_section_1_image_1',
            'banner_section_1_cta_2_url' => 'nullable|required_with:banner_section_1_image_2',
            'banner_section_1_cta_3_url' => 'nullable|required_with:banner_section_1_image_3',
            'banner_section_1_cta_4_url' => 'nullable|required_with:banner_section_1_image_4',
            'banner_section_2_cta_1_url' => 'nullable|required_with:banner_section_2_image_1',
            'banner_section_2_cta_2_url' => 'nullable|required_with:banner_section_2_image_2',
            'banner_section_2_cta_3_url' => 'nullable|required_with:banner_section_2_image_3',
            'banner_section_2_cta_4_url' => 'nullable|required_with:banner_section_2_image_4',
        ];
    }
}
