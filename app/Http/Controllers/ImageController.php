<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function generateImage(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
        ]);

        $username = $request->input('username');

        // Tải ảnh gốc
        $baseImagePath = public_path('images/base_image.png'); // Đảm bảo ảnh tồn tại
        $image = Image::make($baseImagePath);

        // Cấu hình font, kích thước và màu chữ
        $fontPath = public_path('fonts/arial.ttf'); // Thêm font vào thư mục public/fonts
        $image->text($username, 100, 100, function ($font) use ($fontPath) {
            $font->file($fontPath);
            $font->size(40);
            $font->color('#FFFFFF');
            $font->align('center');
            $font->valign('middle');
        });

        // Lưu ảnh tạm thời vào bộ nhớ
        $filePath = storage_path('app/public/generated_image.png');
        $image->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend();
    }
}


?>