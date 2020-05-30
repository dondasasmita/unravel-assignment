@extends('admin.layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h5>Add Item</h5>
	</div>
	
	<div class="row">
		<form  method="POST" action="{{ route('admin.edit.item', ['id' => $item->id]) }}">
			@csrf
			@method('PUT')
			<div class="form-row">
				<div class="form-group col-md-6">
					<label>Item Name</label>
					<input type="text" class="form-control" name="name" placeholder="Item Name" value="{{$item->name}}">
				</div>
				<div class="form-group col-md-6">
					<label>Price</label>
					<input type="number" class="form-control" name="price" placeholder="Price" value="{{$item->price}}">
				</div>
			</div>
			<div class="form-group">
				<label >Image</label>
				<input type="text" class="form-control" name="image" placeholder="Path to Image" value="{{$item->image}}">
			</div>
			<div class="form-group">
				<label>Description</label>
				<input type="text" class="form-control" name="description" value="{{$item->description}}">
			</div>
			<button type="submit" class="btn btn-primary">Edit</button>
		</form>
	</div>
</div>
@endsection