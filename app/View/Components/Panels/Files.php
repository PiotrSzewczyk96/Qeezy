<?php

namespace App\View\Components\Panels;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;
use App\Models\FileCategory;

class Files extends Component
{
    /**
     * Files
     */
    public $files;

    /**
     * File Categories
     */
    public $file_categories;

    /**
     * ZIP filename
     */
    public $name;
    public $fileable_type;
    public $fileable_id;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($files, $name, $type, $id)
    {
        $this->files = $files;
        $this->file_categories = FileCategory::whereIn('id', $files->pluck('file_category_id')->toArray())->get();
        $this->name =  $name;
        $this->fileable_type = $type;
        $this->fileable_id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.panels.files');
    }
}
