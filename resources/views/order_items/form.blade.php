
<div class="form-group {{ $errors->has('order_id') ? 'has-error' : '' }}">
    <label for="order_id" class="col-md-2 control-label">Order</label>
    <div class="col-md-10">
        <select class="form-control" id="order_id" name="order_id">
        	    <option value="" style="display: none;" {{ old('order_id', optional($orderItems)->order_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select order</option>
        	@foreach ($orders as $key => $order)
			    <option value="{{ $key }}" {{ old('order_id', optional($orderItems)->order_id) == $key ? 'selected' : '' }}>
			    	{{ $order }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('order_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('item_id') ? 'has-error' : '' }}">
    <label for="item_id" class="col-md-2 control-label">Item</label>
    <div class="col-md-10">
        <select class="form-control" id="item_id" name="item_id">
        	    <option value="" style="display: none;" {{ old('item_id', optional($orderItems)->item_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select item</option>
        	@foreach ($items as $key => $item)
			    <option value="{{ $key }}" {{ old('item_id', optional($orderItems)->item_id) == $key ? 'selected' : '' }}>
			    	{{ $item }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('item_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('price_per_one') ? 'has-error' : '' }}">
    <label for="price_per_one" class="col-md-2 control-label">Price Per One</label>
    <div class="col-md-10">
        <input class="form-control" name="price_per_one" type="text" id="price_per_one" value="{{ old('price_per_one', optional($orderItems)->price_per_one) }}" minlength="1" placeholder="Enter price per one here...">
        {!! $errors->first('price_per_one', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
    <label for="quantity" class="col-md-2 control-label">Quantity</label>
    <div class="col-md-10">
        <input class="form-control" name="quantity" type="text" id="quantity" value="{{ old('quantity', optional($orderItems)->quantity) }}" minlength="1" placeholder="Enter quantity here...">
        {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
    </div>
</div>

