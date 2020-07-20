@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" align="center"><h1>{{ __('Expense Tracker') }}</h1></div>

                    <div class="card-body">
                        @if (session('msg'))
                            <div class="alert alert-success" role="alert">
                                {{ session('msg') }}
                            </div>
                        @endif
                    </div>
                    {{--                    {{ __('You are logged in!') }}--}}
                    {{--{{dd($expenses)}}--}}

                    <div class="row px-3 py-5">
                        <div class="col-md-8 table-responsive">
                            <table class="table table-bordered">
                                <thead>

                                <th class="text-center">Item</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Created At</th>
                                <th class="text-center">Updated At</th>
                                <th class="text-center">Action</th>
                                </thead>
                                <tbody>
                                @foreach($expenses as $expense)
                                    <tr>

                                        <td>{{$expense->item}}</td>
                                        <td>{{$expense->amount}}</td>
                                        <td>{{ date( 'd/m/Y' , strtotime($expense->created_at)) }}</td>
                                        <td>{{ date( 'd/m/Y' , strtotime($expense->updated_at)) }}</td>
                                        <td>
                                            <a href="/update/{{$expense->id}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> </a>
                                            <a href="/home/{{$expense->id}}" class="btn btn-sm btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                {{--                                        @empty--}}
                                {{--                                            <tr>--}}
                                {{--                                                <td colspan="5" align="center">No transaction..</td>--}}
                                {{--                                            </tr>--}}

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-5 border-0 shadow bg-primary">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <p class="text-white">Total Expenses</p>
                                        <h2 class="text-white">RM</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 shadow">
                                <div class="card-header bg-white border-0">
                                    New Expenses
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{route('store')}}" id="form">
                                        @csrf
                                        <div class="form-group">
                                            <label for="item">Item</label>
                                            <input type="text" id="item" name="item" placeholder="Enter your item..." value="{{ old('item') }}" class="form-control">
                                            @if($errors->has('item'))
                                                <span class="text-danger">{{ $errors->first('item') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="amount">Amount (₹)</label>
                                            <input type="text" id="amount" name="amount" placeholder="Enter your amount..." value="{{ old('amount') }}" class="form-control">
                                            @if($errors->has('amount'))
                                                <span class="text-danger">{{ $errors->first('amount') }}</span>
                                            @endif
                                        </div>
                                    </form>

                                    <div class="card-footer border-0 text-right bg-white">
                                        <input type="submit" form="form" class="btn btn-primary" value="Save">
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
