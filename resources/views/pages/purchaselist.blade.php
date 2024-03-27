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
@if(count($package) >0)
<div class="table-header text-center">
<h3> আমার সিঙ্গেল বায়োডাটা ক্রয়সমূহের তালিকা</h3>
</div>
<div class="favorite-table pt-20 table-responsive">
<table class="table align-middle w-100 table-stripped justify-content-center text-center">
<thead>
<tr>
<th scope="col">ক্র.নং</th>
<th scope="col">বায়োডাটা নাম</th>
<th scope="col">লিঙ্গ</th>
<th scope="col">অভিভাবকের নাম্বার</th>
<th scope="col">যার নাম্বার লিখেছে </th>
<th scope="col"> ই-মেইল এড্রেস </th>

</tr>
</thead>
<tbody>
 
    <?php $i=0 ?>
    @foreach ( $package as $data )
<tr id="delete_row_3318">
<th scope="row">{{++$i}}</th>
<td><a href="/show_biodata/{{$data->user_table_id}}" target>{{$data->purchased_name}}</a></td>
<td><span class="badge badge primary bg-primary text-light">@if($data->biodata_type=="1") পুরুষ @elseif ($data->biodata_type=="2")  নারী @endif</span></td>
<td>{{$data->parent_number}}</td>
<td>{{$data->who_wrote_number}}</td>
<td>{{$data->email_recived_biodata}}</td>

</tr>
@endforeach
</tbody>
</table>
</div>
@endif
</div>
<div class="col-4"></div>
<div class="col-md-8">
    @if(count($dual_package) >0)
    <div class="table-header text-center">
        <h3> আমার প্যকেজ ক্রয়সমূহের তালিকা</h3>
        </div>
        <div class="favorite-table pt-20 table-responsive">
        <table class="table align-middle w-100 table-stripped justify-content-center text-center">
        <thead>
        <tr>
        <th scope="col" style="width:1rem">ক্র.নং</th>
        <th scope="col">প্যাকেজের নাম </th>
        <th scope="col" style="width:11rem">তারিখ </th>
        <th scope="col">দেখুন</th>
        
        </tr>
        </thead>
        <tbody>
         
            <?php $i=0 ?>
            @foreach ( $dual_package as $data )
        <tr id="delete_row_3318">
        <th scope="row">{{++$i}}</th>
        <td>@if($data->package == "10")
            প্রিমিয়াম
            @elseif ($data->package == "5")
            পপুলার
            @elseif ($data->package == "3")
            বেসিক
            @endif
        </td>
        <td> {{date("D - M - Y",strtotime($data->date))}}  </td>
        <td> <button class="btn" id="{{ $data->id}}" onclick="handle_modal_biodata('{{ $data->id}}')"><i class="fa fa-eye" aria-hidden="true"></i></button>     </td>
      
        
        </tr>
        @endforeach
        </tbody>
        </table>
        </div>
        @endif
</div>
</div>
</div>
</section>

<script>
  async  function handle_modal_biodata(id){
        console.log(id)
        $('#myModal').modal('show')
        const res = await fetch(`${location.origin}/handle_modal_biodata?id=${id}`)
        const data = await res.json()
        console.log(data)
        let view = data.map((d,i)=>{
    return(`            
    <tr >
    <td>${++i}</td>
    <td><a href="/show_biodata/${d.user_table_id}"> ${d.user_name}</a></td>
    <td>${d.parent_number}</td>
    <td>${d.who_wrote_number}</td>
    <td>${d.email_recived_biodata}</td>
    </tr>
    
        
    `)
}).join('')
show_data.innerHTML = view;
        console.log(view)
    }
</script>


  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" style="overflow: auto">
        <div class="modal-header">
          <h5 class="modal-title d-none" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" >
          <table class="table align-middle w-100 table-stripped justify-content-center text-center">
            <thead>
            <th scope="col">ক্র.নং</th>
            <th scope="col">বায়োডাটা নাম</th>
            <th scope="col">অভিভাবকের নাম্বার</th>
            <th scope="col">যার নাম্বার লিখেছে </th>
            <th scope="col"> ই-মেইল এড্রেস </th>
            </thead>
            <tbody id="show_data">

            </tbody>
          </table>
        </div>
        
      </div>
    </div>
  </div>

@endsection