@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Order Items' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('order_items.order_items.destroy', $orderItems->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('order_items.order_items.index') }}" class="btn btn-primary" title="Show All Order Items">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('order_items.order_items.create') }}" class="btn btn-success" title="Create New Order Items">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('order_items.order_items.edit', $orderItems->id ) }}" class="btn btn-primary" title="Edit Order Items">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Order Items" onclick="return confirm(&quot;Click Ok to delete Order Items.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Order</dt>
            <dd>{{ optional($orderItems->order)->is_active }}</dd>
            <dt>Item</dt>
            <dd>{{ optional($orderItems->item)->id }}</dd>
            <dt>Price Per One</dt>
            <dd>{{ $orderItems->price_per_one }}</dd>
            <dt>Quantity</dt>
            <dd>{{ $orderItems->quantity }}</dd>

        </dl>

    </div>
</div>

@endsection