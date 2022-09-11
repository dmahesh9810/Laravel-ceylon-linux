<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Region;
use App\Models\Role;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->hasRole(Role::ROLE_ADMIN)) {

            $order = Order::all();
            return $this->viewOrder($order);
        } else {
            $order = Order::where('user_id', 'like', $request->user()->id)->get();
            return $this->viewOrder($order);
        }
    }
    public function store(Request $request)
    {

        if ($request->searchclick == 1) {
            $pono = $request->pono;
            $datefrom = $request->datefrom;
            $dateto = $request->dateto;

            if ($pono || $datefrom || $dateto) {
                if ($pono && $datefrom && $dateto) {
                    if ($request->user()->hasRole(Role::ROLE_ADMIN)) {

                        $order = Order::whereBetween('date', [$datefrom, $dateto])
                            ->where('po_no', $pono)->get();
                        return $this->viewOrder($order);
                    } else {
                        $order = Order::whereBetween('date', [$datefrom, $dateto])
                            ->where('po_no', $pono)
                            ->where('user_id', $request->user()->id)->get();;
                        return $this->viewOrder($order);
                    }
                }
                if ($pono) {
                    if ($request->user()->hasRole(Role::ROLE_ADMIN)) {

                        $order = Order::where('po_no', $pono)->get();
                        return $this->viewOrder($order);
                    } else {
                        $order = Order::where('po_no','like', $pono .'%')
                            ->where('user_id', $request->user()->id)->get();
                        return $this->viewOrder($order);
                    }
                }
                if ($datefrom && $dateto) {
                    if ($request->user()->hasRole(Role::ROLE_ADMIN)) {
                        $order = Order::whereBetween('date', [$datefrom, $dateto])->get();
                        return $this->viewOrder($order);
                    } else {

                        $order = Order::whereBetween('date', [$datefrom, $dateto])
                            ->where('user_id', $request->user()->id)->get();
                        return $this->viewOrder($order);
                    }
                }
            }
            if ($request->user()->hasRole(Role::ROLE_ADMIN)) {
                $order = Order::all();
                return $this->viewOrder($order);
            } else {

                $order = Order::where('user_id', $request->user()->id)->get();
                return $this->viewOrder($order);
            }
        } else {

            if ($request->user()->hasRole(Role::ROLE_ADMIN)) {

                $order = Order::all();
                return $this->viewOrder($order);
            } else {
                $order = Order::where('user_id', 'like', $request->user()->id)->get();
                return $this->viewOrder($order);
            }
        }
    }

    public function viewOrder($order)
    {
        return view('order')
            ->with(['orders' => $order]);
    }
    public function livesearch(Request $request)
    {
        if($request->ajax()){

            $output = "";
            $data = Region::where('zone_id', 'LIKE', '%'.$request->search)->get();

            if($data){
                foreach($data as $data){
                    $output .=  '<option name="zone_id" value="'.$data->id.'" id="1">'.$data->region_code.'</option>';
                }

                return response()->json($output);
            }
        }

        return view('admin.liveserch');
    }
    public function livesearch2(Request $request)
    {
        if($request->ajax()){

            $output = "";
            $data = Region::where('zone_id', $request->search)->get();

            if($data){
                foreach($data as $data){
                    $output .=  '<option name="search" value="'.$data->zone->id.'" id="1">'.$data->zone->code.'</option>';
                }

                return response()->json($output);
            }
        }

        return view('admin.liveserch');
    }
}