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
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @forelse($expenses as $expense)
                        <tr>
                            <td align="center">{{ $loop->iteration }}</td>
{{--                            {{dd($loop)}}--}}
                            <td>{{ $expense->item }}</td>
                            <td>{{ $expense->amount }}</td>
                            <td>{{ date('d M Y', strtotime($expense->created_at)) }}</td>
                            <td>{{ date('d M Y', strtotime($expense->updated_at)) }}</td>
                            <td>
                                <a href="{{ route('edit', $expense) }}" class="btn btn-sm btn-outline-dark"><i class="fa fa-pencil"></i> </a>
                                <a href="{{ route('delete', $expense) }}" class="btn btn-sm btn-outline-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" align="center">No transaction..</td>
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
                        New Expenses
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('store') }}" id="form">
                            @csrf
                            <div class="form-group">
                                <label for="item">Item</label>
                                <input type="text" id="item" name="item" placeholder="Enter your item..." value="{{ old('item') }}" class="form-control">
                                @if($errors->has('item')) <span class="text-danger">{{ $errors->first('item') }}</span>@endif
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount (₹)</label>
                                <input type="text" id="amount" name="amount" placeholder="Enter your amount..." value="{{ old('amount') }}" class="form-control">
                                @if($errors->has('amount')) <span class="text-danger">{{ $errors->first('amount') }}</span>@endif
                            </div>
                        </form>
                    </div>
                    <div class="card-footer border-0 text-right bg-white">
                        <input type="submit" form="form" class="btn btn-primary" value="Save">
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
