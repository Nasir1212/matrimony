@extends("master.layout")
@section("content")

<section class="breadcrumbs bg-primary py-5">
    <div class="container">
    <div class="row">
    <div class="col-xl-12">
    <div class="breadcrumbs-title">
    <h4 class="text-light"> নোটিফিকেশন লিস্ট </h4>
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
    <div class="col-xl-8">
    
    <div class="row">
    <div class="col-xl-12">
    <div class="card">
    <div class="card-body">
    <h5 class="card-title text-center">নোটিফিকেশন সমূহ</h5>
    <div class="table-responsive">
    <table class="table table-bordered d-none">
    <thead>
    <tr>
    <th scope="col">তারিখ</th>
    <th scope="col">বিষয়</th>
    <th scope="col">বিস্তারিত</th>
    </tr>
    </thead>
    <tbody>
    
    <tr>
    <td>16 Oct, 2023 05:10 pm</td>
    <td>বায়োডাটা সংক্রান্ত নোটিফিকেশন</td>
    <td>
    
    <a href="#" class="text-center" data-toggle="modal" data-target="#reading_Notify340f3445-042b-4324-a01b-25f46cf2ed78"><i class="fa fa-eye" aria-hidden="true"></i></a>
    
    <div class="modal fade bd-example-modal-md" id="reading_Notify340f3445-042b-4324-a01b-25f46cf2ed78" tabindex="-1" role="dialog" aria-labelledby="reading_NotifyTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">জনাব Nasir Uddin </h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body text-justify">
    <p></p>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">বন্ধ করুন</button>
    </div>
    </div>
    </div>
    </div>
    </td>
    </tr>
    </tbody>
    </table>

    <div class="alert alert-danger" role="alert">
       আপনার কোন  নোটিফিকেশন নাই
      </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    <div class="modal fade bd-example-modal-md" id="notification_details" tabindex="-1" role="dialog" aria-labelledby="notification_details" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="modal_title"></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body text-justify">
    <p class="description"></p>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">বন্ধ করুন</button>
    </div>
    </div>
    </div>
    </div>
    </section>
    @endsection