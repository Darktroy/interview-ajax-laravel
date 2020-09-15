@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Order Items</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('order_items.order_items.create') }}" class="btn btn-success" title="Create New Order Items">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($orderItemsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Order Items Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Item</th>
                            <th>Price Per One</th>
                            <th>Quantity</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($orderItemsObjects as $orderItems)
                        <tr>
                            <td>{{ optional($orderItems->order)->is_active }}</td>
                            <td>{{ optional($orderItems->item)->id }}</td>
                            <td>{{ $orderItems->price_per_one }}</td>
                            <td>{{ $orderItems->quantity }}</td>

                            <td>

                                <form method="POST" action="{!! route('order_items.order_items.destroy', $orderItems->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('order_items.order_items.show', $orderItems->id ) }}" class="btn btn-info" title="Show Order Items">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('order_items.order_items.edit', $orderItems->id ) }}" class="btn btn-primary" title="Edit Order Items">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Order Items" onclick="return confirm(&quot;Click Ok to delete Order Items.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $orderItemsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection