@extends('backends.layouts.app')
@section('_title', $_title)
@section('page_name', $_title)
@section('content')
    <div class="card position-relative">
        <div class="ribbon-wrapper ribbon-xl">
            <div class="ribbon
             @switch($objItem->status)
                @case(0)
                    bg-secondary
                @break
                @case(1)
                    bg-warning
                @break
                @case(2)
                    bg-info
                @break
                @case(3)
                    bg-success
                @break
                @case(4)
                    bg-danger
                @break
                @endswitch
             text-lg">
                {{ config('app.order_status')[$objItem->status] }}
            </div>
        </div>
        <div class="card-header text-center">
            <h3 class="card-title">{{ $_title }}</h3>
        </div>
        <div class="card-body">
            <h3 class="text-center mb-5">Customer Information</h3>
            <div class="row">
                <div class="col-sm-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Full name:</strong> {{ $objItem->first_name.' '.$objItem->last_name }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $objItem->email }}</li>
                        <li class="list-group-item"><strong>Phone:</strong> {{ $objItem->email }}</li>
                        <li class="list-group-item"><strong>Address:</strong> {{ $objItem->village->name }}, {{ $objItem->district->name }}, {{ $objItem->cityProvince->name }}</li>
                        <li class="list-group-item"><strong>Address 2:</strong> {{ $objItem->address }}</li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Payment:</strong> {{ config('app.payment')[$objItem->payment] }}</li>
                        <li class="list-group-item"><strong>Ship:</strong> {{ config('app.ship')[$objItem->ship] }}</li>
                        <li class="list-group-item"><strong>Note:</strong> {{ $objItem->note }}</li>
                        <li class="list-group-item"><strong>Order at:</strong> {{ date('d/m/Y H:i:s',strtotime($objItem->created_at)) }}</li>
                    </ul>
                </div>
            </div>
            <div class="table-responsive mt-5">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#Product ID</th>
                        <th>Product name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Discount</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($objItem) && $objItem->products->count() > 0)
                        @foreach($objItem->products as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <img src="{{ Storage::url($item->image) }}" class="img-fluid" style="max-width: 50px; max-height: 50px; object-fit: cover;" alt="">
                                    <strong>{{ $item->name }}</strong>
                                </td>
                                <td>{{ $item->pivot->price }}</td>
                                <td>{{ $item->pivot->quantity }}</td>
                                <td>{{ $item->pivot->discount }}%</td>
                                <td class="text-bold text-danger">{{ ($item->pivot->price - (($item->pivot->price*$item->pivot->discount)/100))*$item->pivot->quantity }}</td>
                            </tr>
                    @endforeach
                        <tr>
                            <th colspan="5">Total price</th>
                            <td class="text-bold text-danger">
                                {{
                                    $objItem->products->reduce(function($a, $b){
                                        return $a + (($b->pivot->price - (($b->pivot->price*$b->pivot->discount)/100))*$b->pivot->quantity);
                                    }, 0)
                                }}
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
        </div>
    </div>
@endsection
