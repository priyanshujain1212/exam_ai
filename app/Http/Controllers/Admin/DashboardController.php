<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ShopStatus;
use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Http\Controllers\BackendController;
use App\Models\Order;
use App\Models\Shop;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['siteTitle'] = 'Dashboard';
        $this->middleware([ 'permission:dashboard' ])->only('index');
    }

    public function index()
    {
        $this->data['months'] = [
            1 => 'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];
      
        return view('admin.dashboard.index', $this->data);
    }

    public function dayWiseIncomeOrder( Request $request )
    {
        $type          = $request->type;
        $monthID       = $request->monthID;
        $dayWiseData   = $request->dayWiseData;
        $showChartData = [];
        if ( $type && $monthID ) {
            $days        = date('t', mktime(0, 0, 0, $monthID, 1, date('Y')));
            $dayWiseData = json_decode($dayWiseData, true);
            for ( $i = 1; $i <= $days; $i++ ) {
                $showChartData[ $i ] = isset($dayWiseData[ $i ]) ? $dayWiseData[ $i ] : 0;
            }
        } else {
            for ( $i = 1; $i <= 31; $i++ ) {
                $showChartData[ $i ] = 0;
            }
        }
        echo json_encode($showChartData);
    }

}
