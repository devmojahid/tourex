<?php

declare(strict_types=1);

namespace Modules\TourBooking\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServiceRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string|max:500',
            'location' => 'nullable|string|max:255',
            'latitude' => 'nullable|string|max:30',
            'longitude' => 'nullable|string|max:30',
            'service_type_id' => 'required|exists:service_types,id',
            'price_per_person' => 'nullable|numeric|min:0',
            'full_price' => 'nullable|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'child_price' => 'nullable|numeric|min:0',
            'infant_price' => 'nullable|numeric|min:0',
            'security_deposit' => 'nullable|numeric|min:0',
            'deposit_required' => 'nullable|boolean',
            'deposit_percentage' => 'nullable|integer|min:0|max:100',
            'included' => 'nullable|array',
            'excluded' => 'nullable|array',
            'duration' => 'nullable|string|max:100',
            'group_size' => 'nullable|string|max:100',
            'languages' => 'nullable|array',
            'check_in_time' => 'nullable|string|max:50',
            'check_out_time' => 'nullable|string|max:50',
            'ticket' => 'nullable|string|max:255',
            'amenities' => 'nullable|array',
            'facilities' => 'nullable|array',
            'rules' => 'nullable|array',
            'safety' => 'nullable|array',
            'cancellation_policy' => 'nullable|array',
            'is_featured' => 'nullable|boolean',
            'is_popular' => 'nullable|boolean',
            'show_on_homepage' => 'nullable|boolean',
            'status' => 'nullable|boolean',
            'video_url' => 'nullable|url|max:255',
            'address' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'website' => 'nullable|url|max:255',
            'social_links' => 'nullable|array',
            'user_id' => 'nullable|exists:users,id',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:500',
            'seo_keywords' => 'nullable|string|max:255',
            'lang_code' => 'nullable|string|exists:languages,lang_code',
        ];

        if ($this->isMethod('POST')) {
            $rules['slug'] = 'nullable|string|unique:services,slug|max:255';
        } else {
            $rules['slug'] = [
                'nullable',
                'string',
                'max:255',
                Rule::unique('services', 'slug')->ignore($this->route('service')),
            ];
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
        return [
            'title.required' => trans('translate.Title is required'),
            'service_type_id.required' => trans('translate.Service type is required'),
            'service_type_id.exists' => trans('translate.Invalid service type'),
            'slug.unique' => trans('translate.Slug already exists'),
            'price_per_person.numeric' => trans('translate.Price must be a valid number'),
            'full_price.numeric' => trans('translate.Price must be a valid number'),
            'discount_price.numeric' => trans('translate.Price must be a valid number'),
            'email.email' => trans('translate.Invalid email format'),
            'video_url.url' => trans('translate.Invalid URL format'),
            'website.url' => trans('translate.Invalid URL format'),
        ];
    }
} 