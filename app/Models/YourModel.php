<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YourModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'field1',
        'field2',
        // Thêm các trường khác mà bạn muốn cho phép nhập
    ];
}
