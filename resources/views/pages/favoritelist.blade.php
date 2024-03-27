@extends("master.layout")
@section("content")

<section class="breadcrumbs bg-primary py-5">
<div class="container">
<div class="row">
<div class="col-xl-12">
<div class="breadcrumbs-title">
<h4 class="text-light"> পছন্দের বায়োডাটা </h4>
</div>
</div>
</div>
</div>
</section>



<section class="profile-section py-5">
<div class="container">
<div class="row">
<div class="col-xl-4">
    @component("component/profile_card")@endcomponent
</div>
<div class="col-md-8">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="table-header text-center">
<h3>পছন্দের তালিকা</h3>
</div>
<div class="favorite-table pt-20 table-responsive">
<table class="table align-middle w-100 table-stripped justify-content-center text-center">
<thead>
<tr>
<th scope="col">ক্র.নং</th>
<th scope="col">বায়োডাটা নাম</th>
<th scope="col">লিঙ্গ</th>
<th scope="col">এ্যাকশন</th>
</tr>
</thead>
<tbody>
    <?php $i=0 ?>
    @foreach ( App\Http\Controllers\home_controller::show_favorite() as $data )
{{-- @dd($data) --}}

<tr id="delete_row_3318">
<th scope="row">{{++$i}}</th>
<td><a href="/show_biodata/{{$data->user_table_id}}" target>{{$data->user_name}}</a></td>
<td><span class="badge badge primary bg-primary text-light">@if($data->biodata_type=="1") পুরুষ @else  নারী @endif</span></td>
<td><a href="/delete_favorite/{{$data->favorite_id}}" class="text-center data-delete" data-id="3318"><i class="fa fa-trash text-danger"></i></a></td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
</section>

@endsection