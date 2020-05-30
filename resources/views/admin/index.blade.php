@extends('admin.layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<ul>
			<li>
				<a href="{{route('admin.create.item')}}">Add new item</a>
			</li>
		</ul>
	</div>
	<div class="row">
		<h5>List Of items</h5>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Name</th>
					<th scope="col">Price</th>
					<th scope="col">Description</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($items as $item)
				<tr>
					<td>{{$item->name}}</td>
					<td>{{$item->price}}</td>
					<td>{{!empty($item->description) ? $item->description : 'N/A'}}</td>
					<td><a href="{{route('admin.edit.item', ['id' => $item->id])}}">Edit</a> | <a href="">Delete</a> </td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
