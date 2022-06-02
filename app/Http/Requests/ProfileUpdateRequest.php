<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class ProfileUpdateRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company' => 'nullable|max:255',
            'bio' => 'nullable|max:255',
            'profile_picture' => 'nullable|mimes:jpeg,bmp,png',
        ];
    }

    public function handleRequest()
    {
        $profileData = $this->validated();
        $profile = $this->user();

        if ($this->hasFile('profile_picture')) {
            $picture = $this->profile_picture;
            $fileName = "profile-picture-{$profile->id}." . $picture->getClientOriginalExtension();

            $fileName = $picture->storeAs('uploads', $fileName);

            $profileData['profile_picture'] = $fileName;
        }

        return $profileData;
    }
}
