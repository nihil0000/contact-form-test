<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'tel_area_code' => 'numeric|max:99999',
            'tel_area_code' => 'numeric|max:99999',
            'tel_subscriber' => 'numeric|max:99999',
            'address' => 'required',
            'category_id' => 'required',
            'detail' => 'required|max:120',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $data = $this->only(['tel_area_code', 'tel_city_code', 'tel_subscriber']);

            // 全て未入力の場合
            if (empty($data['tel_area_code']) && empty($data['tel_city_code']) && empty($data['tel_subscriber'])) {
                $validator->errors()->add('tel', '電話番号を入力してください');
            }

            // 未入力 or 数字以外 or 5桁を超える
            elseif (
                (empty($data['tel_area_code']) || (!ctype_digit($data['tel_area_code']) || strlen($data['tel_area_code']) > 5)) ||
                (empty($data['tel_city_code']) || (!ctype_digit($data['tel_city_code']) || strlen($data['tel_city_code']) > 5)) ||
                (empty($data['tel_subscriber']) || (!ctype_digit($data['tel_subscriber']) || strlen($data['tel_subscriber']) > 5))
            ) {
                $validator->errors()->add('tel', '電話番号は５桁までの数字で入力してください。');
            }
        });
    }

    public function messages()
    {
        return [
            'first_name.required' => '名を入力してください',
            'last_name.required' => '姓を入力してください',
            'gender.required' => '性別を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメールアドレス形式で入力してください',
            'address.required' => '住所を入力してください',
            'category_id.required' => 'お問い合わせの種類を入力してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問い合わせ内容は120文字以内で入力してください',
        ];
    }
}
