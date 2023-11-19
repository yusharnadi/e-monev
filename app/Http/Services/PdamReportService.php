<?php

namespace App\Http\Services;

use App\Models\PdamReport;
use Illuminate\Support\Facades\Log;

class PdamReportService implements PdamReportServiceInterface
{
    public function __construct(private PdamReport $model)
    {
    }

    public function getAll()
    {
        return $this->model
            ->orderBy('year', 'desc')
            ->orderBy('id', 'desc')
            ->get();
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($attributes)
    {
        try {
            $attributes['filename'] = uploadFile($attributes['filename']);
            return $this->model->create($attributes);
        } catch (\Exception $e) {
            Log::error('Error occured ', ['error' => $e->getMessage()]);
            deleteFile($attributes['filename']);
        }
    }

    public function update($id, $attributes)
    {
        try {
            $report = $this->model->findOrFail($id);
            $oldFile = $report->filename;

            if (array_key_exists('filename', $attributes)) {
                $attributes['filename'] = uploadFile($attributes['filename']);
                deleteFile($oldFile);
            }

            return $report->update($attributes);
        } catch (\Exception $e) {
            Log::error('Error occured ', ['error' => $e->getMessage()]);
            deleteFile($attributes['filename']);
        }
    }

    public function delete($id)
    {
        try {
            $report = $this->model->findOrFail($id);
            deleteFile($report->filename);
            return $report->delete();
        } catch (\Throwable $th) {
            Log::error('ReportService@delete Error', ['Message' => $th->getMessage()]);
        }
    }
}
