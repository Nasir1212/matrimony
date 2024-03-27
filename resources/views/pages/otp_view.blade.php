@extends("master.layout")
@section("content")

<div class="card" style="width: 20rem;margin: 0 auto;margin-top: 2rem" >
    <div class="card-body">
        {{-- @if (session('message')) --}}
        <div class="alert    alert-success ">
            {{-- {{ session('message') }} --}}
            We have sent OTP on your  email 
        </div>
        {{-- @endif --}}

        <form action="{{URL::to("/checking_otp")}}" method="post">
            @csrf
        <div class="form-group">

            <label for="">OTP</label>
            <input type="OTP" name="otp" class="form-control" placeholder="Enter OTP " >
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-success btn-block">Submit</button>
          </div>
        </form>
    </div>
</div>
@endsection