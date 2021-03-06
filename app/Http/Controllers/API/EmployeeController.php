<?php

namespace App\Http\Controllers\API;

use App\Models\Bancassurance;
use App\Models\Employee;
use App\Models\File;
use App\Models\FileCategory;

use App\Traits\HasDatatables;
use Illuminate\Support\Facades\Cache;
use ZipArchive;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class EmployeeController extends Controller
{
    use HasDatatables;

    /**
     * Display a listing of the resource for datatables.net plugin.
     *
     * @param Request $request
     * @return array
     */
    public function datatables(Request $request): array
    {
        return $this->getJsonData($request, 'App\Models\Employee');
    }

    /**
     * Generate zip archive 
     * 
     * @param App\Employee $id
     * @param array $extensions
     * 
     * @return redirect App\Http\Controllers\API\FilesController@zipFiles
     */
    public function zip_files($id)
    {
        $employee = Employee::findOrFail($id);
        $files = $employee->files->where('extension', 'pdf');

        return rediresct()->route('files.zip', ['id' => $files->pluck('id')->toArray(), 'name' => str_replace(['/', '\\', ':', '*', '<', '>', '?', '"', '|'], "_", $employee->extended_name)]);
    }

}
