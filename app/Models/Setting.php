<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = ['id'];

    /**
     * Mengambil nilai setting berdasarkan key
     */
    public static function getValue(string $key, $default = null)
    {
        return optional(static::where('key', $key)->first())->value ?? $default;
    }

    /**
     * Set atau update nilai setting berdasarkan key
     */
    public static function setValue(string $key, $value)
    {
        return static::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }
}
