<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail',
    ];

    /**
     * カテゴリとのリレーション
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Scope to search by name or email based on keyword
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string|null $keyword Search keyword
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearchByNameOrEmail($query, $keyword)
    {
        if (!empty($keyword)) {
            return $query->where(function ($q) use ($keyword) {
                $q->where('last_name', 'like', "%$keyword%")
                    ->orWhere('first_name', 'like', "%$keyword%")
                    ->orWhere('email', 'like', "%$keyword%");
            });
        }
        return $query;
    }

    /**
     * 性別検索スコープ
     */
    public function scopeFilterByGender($query, $gender)
    {
        if (!empty($gender)) {
            return $query->where('gender', $gender);
        }
        return $query;
    }

    /**
     * お問い合わせの種類検索スコープ
     */
    public function scopeFilterByCategory($query, $categoryId)
    {
        if (!empty($categoryId)) {
            return $query->where('category_id', $categoryId);
        }
        return $query;
    }

    /**
     * お問い合わせ日検索スコープ
     */
    public function scopeFilterByDate($query, $date)
    {
        if (!empty($date)) {
            return $query->whereDate('created_at', $date);
        }
        return $query;
    }
}
