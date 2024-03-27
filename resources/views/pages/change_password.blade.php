@extends("master.layout")
@section("content")

<div class="card" style="width: 20rem;margin: 0 auto;margin-top: 2rem">
    <div class="card-body">

      
       
        @if (session('message'))
        <div class="alert    alert-danger ">
            {{ session('message') }}
        </div>
        @endif

        @if(session("otp_email"))
        <form action="{{URL::to("/handle_change_password")}}" method="post">
            @csrf
        <div class="form-group">
            <label for="">Password</label>
            <input type="Password" name="password" class="form-control" placeholder="Enter Password " >
          </div>

          <div class="form-group">
            <label for="">Confirm Password</label>
            <input type="Confirm Password" name="confirm_password" class="form-control" placeholder="Enter Confirm Password " >
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-success btn-block">Submit</button>
          </div>
        </form>
        @endif
    </div>
</div>
@endsection