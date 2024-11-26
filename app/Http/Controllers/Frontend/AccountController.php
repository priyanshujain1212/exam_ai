<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\OrderStatus;
use App\Http\Controllers\FrontendController;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\RatingsRequest;
use App\Http\Services\OrderService;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaStream;
use Spatie\MediaLibrary\Models\Media;
use Yajra\Datatables\Datatables;

class AccountController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['site_title'] = 'Frontend';
    }

    public function index()
    {
        $this->data['user'] = auth()->user();
        return view('frontend.account.profile', $this->data);
    }

    public function profileUpdate()
    {
        $this->data['user'] = auth()->user();
        return view('frontend.account.profile-update', $this->data);
    }
    public function getPassword()
    {
        return view('frontend.account.change-password', $this->data);
    }

    public function review()
    {
        return view('frontend.account.review', $this->data);
    }

    public function getOrder()
    {
        return view('frontend.account.order-history', $this->data);
    }

    public function update(ProfileRequest $request)
    {
        $user             = auth()->user();
        $user->first_name = $request->get('first_name');
        $user->last_name  = $request->get('last_name');
        $user->email      = $request->get('email');
        $user->phone      = $request->get('phone');
        $user->username   = $request->username ?? $this->username($request->email);
        $user->address    = $request->get('address');
        $user->save();

        if (request()->file('image')) {
            $user->media()->delete();
            $user->addMedia(request()->file('image'))->toMediaCollection('user');
        }

        return redirect(route('account.profile.index'))->with('status', 'The Account Has Been Updated Successfully');
    }

    private function username($email)
    {
        $emails = explode('@', $email);
        return $emails[0] . mt_rand();
    }

    public function password_update(ChangePasswordRequest $request)
    {
        $user           = auth()->user();
        $user->password = Hash::make(request('password'));
        $user->save();
        return redirect(route('account.password'))->with('status', 'The Password Updated Successfully');
    }

    public function orderShow($id)
    {
        $this->data['order'] = Order::where('user_id', auth()->id())->findOrFail($id);
        return view('frontend.account.order_details', $this->data);
    }

    public function orderCancel( $id )
    {
        if ( $id ) {
            $order = Order::where([
                'user_id' => auth()->id(),
                'status'  => OrderStatus::PENDING
            ])->find($id);
            if ( !blank($order) ) {
                $orderService = app(OrderService::class)->cancel($id);
                if ( $orderService->status ) {
                    return redirect(route('account.order.show', $order->id))->withSuccess('Successfully order cancel');
                } else {
                    return redirect(route('account.order.show', $order->id))->withError($orderService->message);
                }
            } else {
                return redirect(route('account.order'));
            }
        } else {
            return redirect(route('account.order'));
        }
    }

    public function getTransactions()
    {
        $transactions = Transaction::orWhere('source_balance_id', auth()->user()->balance_id)->orWhere(['destination_balance_id' => auth()->user()->balance_id])->orderBy('id', 'DESC')->get();
        return view('frontend.account.transaction', compact('transactions'));
    }

    private function showTransactionItem($transaction)
    {
        $roleID = auth()->user()->myrole ?? 0;

        if ($roleID == 1) {
            if (($transaction->source_balance_id == null && ($transaction->destination_balance_id == auth()->user()->balance_id)) || ($transaction->source_balance_id == 1 && $transaction->destination_balance_id != 1)) {
                return false;
            }
        } else if ($roleID == 3) {
            if (($transaction->source_balance_id == null && ($transaction->destination_balance_id == auth()->user()->balance_id)) || ($transaction->source_balance_id == 1)) {
                return false;
            }
        } else {
            if (($transaction->source_balance_id == null && ($transaction->destination_balance_id == auth()->user()->balance_id)) || ($transaction->source_balance_id == auth()->user()->balance_id)) {
                return false;
            }
        }
        return true;
    }


   
    

    public function getDownloadFile($id)
    {
        if ( (int)$id ) {
            $order = Order::find($id);
            if ( !blank($order) ) {
                $file = $order->getMedia('orders');
                return $this->fileDownloadResponse($file[0]);
            }
        }
    }

    private function fileDownloadResponse(Media $mediaItem)
    {
        return $mediaItem;
    }

}
