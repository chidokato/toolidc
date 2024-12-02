<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\YourDataImport; // Import tương ứng của bạn
use App\Models\YourModel;

class ExcelImportController extends Controller
{
    public function importExcel(Request $request)
    {
        // Xác thực file tải lên
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls'
        ]);

        // Lấy file Excel
        $file = $request->file('excel_file');

        // Đọc file Excel và xử lý từng hàng
        Excel::load($file, function($reader) {
            $rows = $reader->get();

            foreach ($rows as $row) {
                // Lưu dữ liệu vào database
                YourModel::create([
                    'field1' => $row[0],
                    'field2' => $row[1],
                    // Thêm các trường khác tùy theo cấu trúc file Excel
                ]);
            }
        });

        return back()->with('success', 'Data Imported Successfully');
    }
}
