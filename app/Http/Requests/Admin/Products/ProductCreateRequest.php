<?php

namespace App\Http\Requests\Admin\Products;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'logo'              => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'name'              => 'required|string|min:5|max:100',
            
            'category_id'       => 'required|exists:categories,id',
            'sub_category_id'   => 'required|exists:sub_categories,id',
            'child_category_id' => 'required|exists:child_categories,id',

            'status'            => 'required|boolean',
            //'thumb_image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',

            //'vendor_id'         => 'required|exists:vendors,id',
           /////// 'brand_id'          => 'required|exists:brands,id',

            'qty'               => 'required|integer|min:1',

            'short_description' => 'required|string|max:500',
            'long_description'  => 'required|string',

            'video_link'        => 'nullable|url',

           // 'sku'               => 'required|string|max:100|unique:products,sku,' . $this->product,
            'sku'               => 'required|string|max:100',

            'price'             => 'required|numeric|min:0',
            'offer_price'       => 'nullable|numeric|min:0|lt:price', // less than price if provided

            'offer_start_date'  => 'nullable|date',
            'offer_end_date'    => 'nullable|date|after_or_equal:offer_start_date',

            'is_top'            => 'required|boolean',
            'is_best'           => 'required|boolean',
            'is_featured'       => 'required|boolean',

            'seo_title'         => 'nullable|string|max:255',
            'seo_description'   => 'nullable|string|max:500',

            //'is_approved'       => 'required|boolean',
            
        ];
    }
   
}
