@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Orders' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('orders.orders.destroy', $orders->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('orders.orders.index') }}" class="btn btn-primary" title="Show All Orders">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('orders.orders.create') }}" class="btn btn-success" title="Create New Orders">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('orders.orders.edit', $orders->id ) }}" class="btn btn-primary" title="Edit Orders">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Orders" onclick="return confirm(&quot;Click Ok to delete Orders.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>User</dt>
            <dd>{{ optional($orders->user)->id }}</dd>
            <dt>Is Active</dt>
            <dd>{{ ($orders->is_active) ? 'Yes' : 'No' }}</dd>

        </dl>

    </div>
</div>

@endsection