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
                <h4 class="mt-5 mb-5">Category Items</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('category_items.category_items.create') }}" class="btn btn-success" title="Create New Category Items">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($categoryItemsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Category Items Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Price Per One</th>
                            <th>Title</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($categoryItemsObjects as $categoryItems)
                        <tr>
                            <td>{{ optional($categoryItems->category)->name }}</td>
                            <td>{{ $categoryItems->price_per_one }}</td>
                            <td>{{ $categoryItems->title }}</td>

                            <td>

                                <form method="POST" action="{!! route('category_items.category_items.destroy', $categoryItems->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('category_items.category_items.show', $categoryItems->id ) }}" class="btn btn-info" title="Show Category Items">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('category_items.category_items.edit', $categoryItems->id ) }}" class="btn btn-primary" title="Edit Category Items">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Category Items" onclick="return confirm(&quot;Click Ok to delete Category Items.&quot;)">
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
            {!! $categoryItemsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection