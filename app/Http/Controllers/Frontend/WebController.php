<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\Status;
use App\Http\Controllers\FrontendController;
use App\Models\Banner;
use App\Models\Category;

use App\Models\Product;

class WebController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['site_title'] = 'Frontend';
    }

    public function index()
    {
        $this->data['banners']   = Banner::where(['status' => Status::ACTIVE])->orderBy('sort', 'asc')->get();
      
        return view('welcome', $this->data);
    }

  
}
