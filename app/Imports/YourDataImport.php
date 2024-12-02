<?php 
namespace App\Imports;

use App\Models\YourModel;
use Maatwebsite\Excel\Concerns\ToModel;

class YourDataImport implements ToModel
{
    public function model(array $row)
    {
        return new YourModel([
            // Map các cột trong file Excel với các trường trong cơ sở dữ liệu
            'field1' => $row[0],
            'field2' => $row[1],
            // Thêm các trường khác
        ]);
    }
}


?>