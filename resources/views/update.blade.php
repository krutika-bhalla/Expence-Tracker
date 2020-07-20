@extends('layouts.app')
@section('content')
    @foreach($expensesdata as $ed)
{{--        {{dd($ed->item)}}--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" align="center"><h1>Update "{{$ed->item}}"</h1></div>
{{--{{dd($expenses)}}--}}
                        <div class="row px-3 py-5">
{{--                            <div class="col-md-8 table-responsive">--}}
{{--                                <table class="table table-bordered">--}}
{{--                                    <thead>--}}
{{--                                    <th class="text-center">#</th>--}}
{{--                                    <th>Item</th>--}}
{{--                                    <th>Amount</th>--}}
{{--                                    <th>Date</th>--}}
{{--                                    <th>Action</th>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    @foreach($expenses as $exp)--}}
{{--                                        <tr>--}}
{{--                                            <td align="center"></td>--}}
{{--                                            <td></td>--}}
{{--                                            <td></td>--}}
{{--                                            <td></td>--}}
{{--                                            <td>--}}
{{--                                                <a href="" class="btn btn-sm btn-warning">Edit</a>--}}
{{--                                                <a href="" class="btn btn-sm btn-danger">Delete</a>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                --}}{{--                    @empty--}}
{{--                --}}{{--                        <tr>--}}
{{--                --}}{{--                            <td colspan="5" align="center">No transaction..</td>--}}
{{--                --}}{{--                        </tr>--}}
{{--                                    @endforelse--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}

                            <div class="col-md-12">
                                <div class="card mb-5 border-0 shadow bg-primary">
                                    <div class="card-header border-0">
                                        <div class="card-title">
                                            <p class="text-white">Total Expenses</p>
                                            <h2 class="text-white">RM </h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border-0 shadow">
                                    <div class="card-header bg-white border-0">
                                        Updating Expense Name: {{$ed->item}}
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{route('updated-expense', $id ?? '')}}" id="form">
                                            @csrf


                                            <div class="form-group">
                                                <label for="item">Item</label>
                                                <input type="text" id="item" name="item" placeholder="Enter your item..." value="{{$ed->item}}" class="form-control">
                                                @if($errors->has('item')) <span class="text-danger"></span>@endif
                                            </div>
                                            <div class="form-group">
                                                <label for="amount">Amount</label>
                                                <input type="number" id="amount" name="amount" placeholder="Enter your amount..." value="{{$ed->amount}}" class="form-control">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer border-0 text-right bg-white">
{{--                                        <a href="" class="btn btn-warning">Back</a>--}}
                                        <input type="submit" form="form" class="btn btn-primary" value="Save">
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
            </div>
        </div>
    </div>
    @endforeach

@endsection
