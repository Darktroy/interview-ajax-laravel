@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($items->title) ? $items->title : 'Items' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('items.items.destroy', $items->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('items.items.index') }}" class="btn btn-primary" title="Show All Items">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('items.items.create') }}" class="btn btn-success" title="Create New Items">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('items.items.edit', $items->id ) }}" class="btn btn-primary" title="Edit Items">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Items" onclick="return confirm(&quot;Click Ok to delete Items.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Category</dt>
            <dd>{{ optional($items->category)->name }}</dd>
            <dt>Price Per One</dt>
            <dd>{{ $items->price_per_one }}</dd>
            <dt>Title</dt>
            <dd>{{ $items->title }}</dd>
            <dt>Details</dt>
            <dd>{{ $items->details }}</dd>
            <dt>Image</dt>
            <dd>{{ $items->image }}</dd>

        </dl>

    </div>
</div>

@endsection