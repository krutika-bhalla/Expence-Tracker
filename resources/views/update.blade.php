@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row px-3 py-5">
            <div class="col-md-8 table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <th class="text-center">#</th>
                    <th>Item</th>
                    <th>Amount</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    </thead>
                    <tbody>
                    @forelse($expenses as $exp)
                        <tr>
                            <td align="center">{{ $loop->iteration }}</td>
                            <td>{{ $exp->item }}</td>
                            <td>{{ $exp->amount }}</td>
                            <td>{{ date('d M Y', strtotime($exp->created_at)) }}</td>
                            <td>{{ date('d M Y', strtotime($exp->updated_at)) }}</td>
{{--                            <td>--}}
{{--                                <a href="{{ route('edit', $exp) }}" class="btn btn-sm btn-warning">Edit</a>--}}
{{--                                <a href="{{ route('delete', $exp) }}" class="btn btn-sm btn-danger">Delete</a>--}}
{{--                            </td>--}}
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" align="center">No transaction..</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <div class="card mb-5 border-0 shadow bg-primary">
                    <div class="card-header border-0">
                        <div class="card-title">
                            <p class="text-white">Total Expenses</p>
                            <h2 class="text-white">₹ {{ number_format($total, 2) }}</h2>
                        </div>
                    </div>
                </div>
                <div class="card border-0 shadow">
                    <div class="card-header bg-white border-0">
                        <h5 style="text-align: center; text-decoration: underline">Update: {{ ucwords($expense->item) }}</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('update', $expense) }}" id="form">
                            @csrf
                            <div class="form-group">
                                <label for="item">Item</label>
                                <input type="text" id="item" name="item" placeholder="Enter your item..." value="{{ $expense->item }}" class="form-control">
                                @if($errors->has('item')) <span class="text-danger">{{ $errors->first('item') }}</span>@endif
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount (₹)</label>
                                <input type="number" id="amount" name="amount" placeholder="Enter your amount..." value="{{ $expense->amount }}" class="form-control">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer border-0 text-right bg-white">
                        <a href="{{ route('home') }}" class="btn btn-warning">Back</a>
                        <input type="submit" form="form" class="btn btn-primary" value="Save">
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
