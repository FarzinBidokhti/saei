<?php

namespace App\Http\Controllers\Import;

use App\Models\Defect;
use App\Models\Process;
use App\Models\Section;
use App\Models\SubDefect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Mime\Header\Headers;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

class ImportController extends Controller
{
    public function importCsv()
    {
        $path = storage_path('app/sanad.xlsm');

        if (!file_exists($path)) {
            dump('File not found!');
            return;
        }

        $spreadsheet = IOFactory::load($path);
        $sheet = $spreadsheet->getActiveSheet();

        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $highestColumnIndex = Coordinate::columnIndexFromString($highestColumn);

        $mergeCells = $sheet->getMergeCells();

        $headers = [];
        for ($col = 1; $col <= $highestColumnIndex; $col++) {
            $headers[$col] = $this->getMergedCellValue($sheet, $mergeCells, $col, 1);
        }

        DB::transaction(function () use ($sheet, $mergeCells, $headers, $highestRow) {

            for ($row = 3; $row <= $highestRow; $row++) {

                $defectCode    = $this->getMergedCellValue($sheet, $mergeCells, 1, $row);
                $defectName    = $this->getMergedCellValue($sheet, $mergeCells, 2, $row);
                $subDefectCode = $this->getMergedCellValue($sheet, $mergeCells, 3, $row);
                $subDefectName = $this->getMergedCellValue($sheet, $mergeCells, 4, $row);

                $defectCode    = $this->normalizeCellValue($defectCode);
                $defectName    = $this->normalizeCellValue($defectName);
                $subDefectCode = $this->normalizeCellValue($subDefectCode);
                $subDefectName = $this->normalizeCellValue($subDefectName);

                if ($defectCode === null && $defectName === null && $subDefectCode === null && $subDefectName === null) {
                    continue;
                }

                $defect = null;
                if ($defectCode !== null) {
                    $defect = Defect::firstOrCreate(
                        ['code' => $defectCode],
                        [
                            'title'   => $defectName,
                            'is_show' => 1
                        ]
                    );
                } else {
                    continue;
                }

                $subDefect = SubDefect::firstOrCreate(
                    [
                        'defect_id' => $defect->id,
                        'code'      => $subDefectCode,
                    ],
                    [
                        'title'   => $subDefectName,
                        'is_show' => 1
                    ]
                );

                for ($col = 5; $col <= 143; $col += 4) {
                    $sectionTitle = trim((string)($headers[$col] ?? ''));
                    $sectionModel = Section::where('title', $sectionTitle)->first();

                    if (!$sectionModel) {
                        continue;
                    }

                    $equipment = $this->normalizeCellValue($sheet->getCell(Coordinate::stringFromColumnIndex($col)     . $row)->getValue());
                    $reason    = $this->normalizeCellValue($sheet->getCell(Coordinate::stringFromColumnIndex($col + 1) . $row)->getValue());
                    $percent   = $this->normalizeCellValue($sheet->getCell(Coordinate::stringFromColumnIndex($col + 2) . $row)->getValue());
                    $sensorRaw = $this->normalizeCellValue($sheet->getCell(Coordinate::stringFromColumnIndex($col + 3) . $row)->getValue());

                    if ($equipment === null && $reason === null && $percent === null && $sensorRaw === null) {
                        continue;
                    }

                    $sensor = null;
                    if ($sensorRaw !== null) {
                        $sensor = (int)$sensorRaw === 1;
                    }

                    Process::create([
                        'sub_defect_id' => $subDefect->id,
                        'equipment'     => $equipment,
                        'reason'        => $reason,
                        'percent'       => $percent,
                        'is_sensor'     => $sensor,
                        'section_id'    => $sectionModel->id,
                    ]);
                }
            }
        });

        dump('FINISHED ✔');
    }

    private function getMergedCellValue($sheet, $mergeCells, $col, $row)
    {
        $cellAddress = Coordinate::stringFromColumnIndex($col) . $row;

        foreach ($mergeCells as $mergedRange) {
            [$startCell, $endCell] = explode(':', $mergedRange);

            [$startCol, $startRow] = Coordinate::coordinateFromString($startCell);
            [$endCol, $endRow]     = Coordinate::coordinateFromString($endCell);

            $startColIndex = Coordinate::columnIndexFromString($startCol);
            $endColIndex   = Coordinate::columnIndexFromString($endCol);

            if (
                $col >= $startColIndex && $col <= $endColIndex &&
                $row >= $startRow && $row <= $endRow
            ) {
                return $sheet->getCell($startCell)->getValue();
            }
        }

        return $sheet->getCell($cellAddress)->getValue();
    }

    private function normalizeCellValue($value)
    {
        if ($value === null) {
            return null;
        }

        $value = trim((string)$value);

        return $value === '' ? null : $value;
    }
}
