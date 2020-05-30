@extends('admin.layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h5>List Of Transactions</h5>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Stripe Txn ID</th>
					<th scope="col">Amount</th>
					<th scope="col">Created At</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($transactions as $transaction)
				<tr>
					<td>{{$transaction->stripe_txn_id}}</td>
					<td>{{$transaction->amount_paid}}</td>
					<td>{{$transaction->created_at}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
