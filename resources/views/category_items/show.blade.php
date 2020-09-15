@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($categoryItems->title) ? $categoryItems->title : 'Category Items' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('category_items.category_items.destroy', $categoryItems->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('category_items.category_items.index') }}" class="btn btn-primary" title="Show All Category Items">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('category_items.category_items.create') }}" class="btn btn-success" title="Create New Category Items">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('category_items.category_items.edit', $categoryItems->id ) }}" class="btn btn-primary" title="Edit Category Items">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Category Items" onclick="return confirm(&quot;Click Ok to delete Category Items.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Category</dt>
            <dd>{{ optional($categoryItems->category)->name }}</dd>
            <dt>Price Per One</dt>
            <dd>{{ $categoryItems->price_per_one }}</dd>
            <dt>Title</dt>
            <dd>{{ $categoryItems->title }}</dd>
            <dt>Details</dt>
            <dd>{{ $categoryItems->details }}</dd>

        </dl>

    </div>
</div>

@endsection