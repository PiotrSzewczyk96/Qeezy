<?php

namespace App\Http\Controllers\API;

use App\Models\Investment;
use App\Traits\HasDatatables;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvestmentController extends Controller
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
        return $this->getJsonData($request, 'App\Models\Investment');
    }

    /**
     * Generate zip archive 
     * 
     * @param App\Investment $id
     * @param array $extensions
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function zip_files($id)
    {
        $investment = Investment::findOrFail($id);
        $files = $investment->files->where('extension', 'pdf');

        return redirect()->route('files.zip', ['id' => $files->pluck('id')->toArray(), 'name' => str_replace(['/', '\\', ':', '*', '<', '>', '?', '"', '|'], "_", $investment->extended_name)]);
    }

}
