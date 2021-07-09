<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

//class UsersExport implements FromCollection, WithHeadings, WithMapping
class UsersExport implements FromQuery, WithHeadings, WithMapping, WithColumnFormatting
{

    protected $id;

    function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
//    public function collection()
//    {
//        return User::all();
//    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Created At',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'D' => 'yyyy-mm-dd',
//            'D' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    public function query()
    {
//        return User::query();
        return User::query()->whereRaw('id>=' . $this->id);
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            Date::dateTimeToExcel($user->created_at),
        ];
    }
}
