<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class ExportAttendanceList implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $subjectId;
    private $teacherId;

    public function __construct($subjectId, $teacherId)
    {
        $this->subjectId = $subjectId;
        $this->teacherId = $teacherId;
    }
    public function collection()
    {
        $studentList = DB::select("exec GetStudentList ?, ?", array($this->subjectId, $this->teacherId));
        // Thực hiện truy vấn cơ sở dữ liệu và trả về dữ liệu
        // làm s đó procedure có mã, tên, ngày đi học nếu có (status = 1) thì x, so buoi vang, cam thi 

        // làm s đó kết luận cho cột cấm thi, vắng 3 ngày => cấm
    }
    
    public function headings(): array
    {
        // Định nghĩa tiêu đề cột cho file Excel
        $lessonList = DB::select("exec GetLessonList ?, ?", array($this->subjectId, $this->teacherId));
        return [
            'Mã sinh viên',
            'Tên sinh viên'

            // Các cột ngày có x or trống
            // các cột khác bỏ liên hệ
        ];
    }
}
