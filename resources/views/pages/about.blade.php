@extends ('layout.app')

@section('content')
        <h1>This is pages where user get to know the homestay basic info</h1>
        
        {{-- <form action="" method="post"> --}}
        {{-- <input type="text" id="check_in" placeholder="date of check in">
        <input type="text" id="check_out" placeholder="date of check out">
        
        <button onclick="calcDiff()"> Calculate</button> --}}
{{--         
        <label for="check out">Amount </label>
        <input type="text" name="amount" id="Amount" required><br>
        <label for="check out">Discount </label>
        <input type="text" name="discount" id="Discount" required><br>
        <label for="check out">Paid </label>
        <input type="text" name="paid" id="Paid" required><br>
        <label for="check out">Lack </label>
        <input type="text" name="lack" id="Lack" required><br> --}}

{{-- <hr>
        <div class="container">
        <div class="row">
                <div class="col-md-8">
                        <label class="control-label col-md-2">Amount 1:</label>
                        <div class="col-ms-4">
                                <input type="text" class="form-control input-sm text-right amount">
                        </div>
                </div>
        </div>
        <br>
        <div class="row">
                <div class="col-md-8">
                        <label class="control-label col-md-2">Amount 2:</label>
                        <div class="col-ms-4">
                                <input type="text" class="form-control input-sm text-right amount">
                        </div>
                </div>
        </div>
        <br>
        <div class="row">
                <div class="col-md-8">
                        <label class="control-label col-md-2">Amount 3:</label>
                        <div class="col-ms-4">
                                <input type="text" class="form-control input-sm text-right amount">
                        </div>
                </div>
        </div>
        <br>
        <div class="row">
                <div class="col-md-8">
                        <label class="control-label col-md-2">Total :</label>
                        <div class="col-ms-4">
                                <input type="text" class="form-control input-sm text-right" readonly id="total_amount">
                        </div>
                </div>
        </div>
        <br>
        </div> --}}


<p>Loan Amount: $<input id="amount" type="number" min="1" max="1000000" onchange="computeLoan()"></p>
<p>Interest Rate: <input id="interest_rate" type="number" min="0" max="100" value="10" step=".1" onchange="computeLoan()">%</p>
<p>Months: <input id="months" type="number" min="1" max="72" value="1" step="1" onchange="computeLoan()"></p>
<h2 id="payment"></h2>


@endsection
{{-- @section('script')
    @include('Fee.payment')
@endsection --}}
