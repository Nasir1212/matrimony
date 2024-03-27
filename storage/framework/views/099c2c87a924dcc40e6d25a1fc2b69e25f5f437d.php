
<?php $__env->startSection("content"); ?>
<section class="breadcrumbs bg-primary py-5">
<div class="container">
<div class="row">
<div class="col-xl-12">
<div class="breadcrumbs-title">
    <?php $auth =  App\Models\Register::where(['mail'=>session()->get('email')])->get()[0] ?>
<h4 class="text-light">এডিট বায়োডাটা <?php echo e($auth->name); ?>,</h4>

</div>
</div>
</div>
</div>
</section>

<section class="profile-section py-5">
<div class="container">
<div class="row">
<div class="col-xl-4">
    <?php $__env->startComponent("component/profile_card"); ?><?php echo $__env->renderComponent(); ?>

</div>
<div class="col-xl-8">
<div class="pre-loader-request"></div>
<div class="profile-tab-content edit-profile position-relative">
<ul class="nav nav-biodata mb-3" id="biodata-tab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="tab-8-tab" data-toggle="pill" href="#tab-8" role="tab" aria-controls="tab-8" aria-selected="true">প্রাথমিক তথ্য</a>
</li>

<li class="nav-item">
<a class="nav-link " id="tab-10-tab" data-toggle="pill" href="#tab-10" role="tab" aria-controls="tab-10" aria-selected="true">সাধারণ তথ্য</a>
</li>
<li class="nav-item">
<a class="nav-link " id="tab-11-tab" data-toggle="pill" href="#tab-11" role="tab" aria-controls="tab-11" aria-selected="true">ঠিকানা</a>
</li>
<li class="nav-item">
<a class="nav-link " id="tab-12-tab" data-toggle="pill" href="#tab-12" role="tab" aria-controls="tab-12" aria-selected="true">শিক্ষাগত যোগ্যতা</a>
</li>
<li class="nav-item">
<a class="nav-link " id="tab-13-tab" data-toggle="pill" href="#tab-13" role="tab" aria-controls="tab-13" aria-selected="true">পারিবারিক তথ্য</a>
</li>
<li class="nav-item">
<a class="nav-link " id="tab-14-tab" data-toggle="pill" href="#tab-14" role="tab" aria-controls="tab-14" aria-selected="true">ব্যক্তিগত তথ্য</a>
</li>
<li class="nav-item">
<a class="nav-link " id="tab-15-tab" data-toggle="pill" href="#tab-15" role="tab" aria-controls="tab-15" aria-selected="true">বিয়ে সংক্রান্ত তথ্য</a>
</li>
<li class="nav-item">
<a class="nav-link " id="tab-16-tab" data-toggle="pill" href="#tab-16" role="tab" aria-controls="tab-16" aria-selected="true">অন্যান্য তথ্য</a>
</li>
<li class="nav-item">
<a class="nav-link " id="tab-17-tab" data-toggle="pill" href="#tab-17" role="tab" aria-controls="tab-17" aria-selected="true">যেমন জীবনসঙ্গী আশা করেন</a>
</li>
<li class="nav-item">
<a class="nav-link " id="tab-18-tab" data-toggle="pill" href="#tab-18" role="tab" aria-controls="tab-18" aria-selected="true">কর্তৃপক্ষের জিজ্ঞাসা</a>
</li>
<li class="nav-item">
<a class="nav-link " id="tab-19-tab" data-toggle="pill" href="#tab-19" role="tab" aria-controls="tab-19" aria-selected="true">যোগাযোগ</a>
</li>
</ul>
<hr>
<div class="tab-content" id="biodata-tabContent">

<div class="tab-pane fade show active" id="tab-8" role="tabpanel" aria-labelledby="tab-8-tab">
<form name="primary_info" >

<?php  $primary_info =  App\Models\primary_info::where(['user_table_id'=>$auth->id])->first() ?>



<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="ব্যবহৃত নাম (Primary)" class="font-weight-bold">ব্যবহৃত নাম (Primary)  </label>
<input type="text" class="form-control" name="user_name" value="<?php if($primary_info != null): ?> <?php echo e($primary_info->user_name); ?> <?php endif; ?>" placeholder="ব্যবহৃত নাম (Primary)">
<input type="hidden" name="t_name" value="primary_info">
</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="আমি খুঁজছি" class="font-weight-bold">আমি খুঁজছি </label>
<select class="form-control" name="search_type" id="field_10" data-id="10" data-group="8" placeholder="আমি খুঁজছি">
<option value=''>Select</option>
<option value="1" <?php if($primary_info != null){ if($primary_info->search_type == '1') echo "Selected"; }?> >পাত্রীর বায়োডাটা</option>
<option value="2" <?php if($primary_info != null){ if($primary_info->search_type == '2') echo "Selected";  } ?>>পাত্রের বায়োডাটা</option>
</select>
</div>
</div>
</div>
<div class="card mb-3 " >
<div class="card-body">
<div class="form-group">
<label for="date_of_birth" class="font-weight-bold">জন্ম তারিখ </label>
<input type="text"  class="form-control" onblur="handle_birth_day(this);" onfocus="handle_birth_day(this);"  name="date_of_birth" id="date_of_birth" value="<?php if($primary_info != null): ?><?php  $date=date_create($primary_info->date_of_birth); ?><?php echo e(date_format($date,"m/d/Y")); ?><?php endif; ?>" placeholder = "mm/dd/yyyy">
<p class="text-danger d-none">Enter valid birth day </p>
</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="জেলা" class="font-weight-bold">জেলা </label>

<select  class="form-control form-select" aria-label=".form-select-lg example"  name="district"   placeholder="জেলা">
<option value>Select</option>
<?php $__currentLoopData = App\Models\districts::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
<option value="<?php echo e($district->id); ?>" <?php if($primary_info != null): ?> <?php if($primary_info->district==$district->id): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>><?php echo e($district->bn_name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="জাতীয়তা" class="font-weight-bold">জাতীয়তা </label>
<select class="form-control" name="nationality"  id="field_16" data-id="16" data-group="8" placeholder="জাতীয়তা">
<option value>Select</option>
<option value="1" selected>বাংলাদেশী</option>
</select>

</div>
</div>
</div>

</form>
</div>



<div class="tab-pane fade " id="tab-10" role="tabpanel" aria-labelledby="tab-10-tab">
<form  name="general_info">
    <?php  $general_info =  App\Models\general_info::where(['user_table_id'=>$auth->id])->first() ?>

<div class="card mb-3 class" >
<div class="card-body">
<div class="form-group">
<label for="বায়োডাটার ধরন *" class="font-weight-bold">বায়োডাটার ধরন * </label>
<select class="form-control" name="biodata_type" placeholder="বায়োডাটার ধরন *">
<option value>Select</option>
<option value="1" <?php if($general_info != null): ?> <?php if($general_info->biodata_type=="1"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>পাত্রের বায়োডাটা</option>
<option value="2" <?php if($general_info != null): ?> <?php if($general_info->biodata_type=="2"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>পাত্রীর বায়োডাটা</option>
</select>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="বৈবাহিক অবস্থা" class="font-weight-bold">বৈবাহিক অবস্থা <span class="text-mute">(Required)</span></label>
<select class="form-control" name="marid_type"  placeholder="বৈবাহিক অবস্থা" required>
<option value>Select</option>
<option value="অবিবাহিত" <?php if($general_info != null): ?> <?php if($general_info->marid_type=="অবিবাহিত"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>অবিবাহিত</option>
<option value="বিবাহিত" <?php if($general_info != null): ?> <?php if($general_info->marid_type=="বিবাহিত"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>বিবাহিত</option>
<option value="ডিভোর্সড" <?php if($general_info != null): ?> <?php if($general_info->marid_type=="ডিভোর্সড"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>ডিভোর্সড</option>
<option value="বিধবা" <?php if($general_info != null): ?> <?php if($general_info->marid_type=="বিধবা"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>বিধবা</option>
<option value="বিপত্নীক" <?php if($general_info != null): ?> <?php if($general_info->marid_type=="বিপত্নীক"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>বিপত্নীক</option>
</select>

</div>
</div>
</div>

<div class="card mb-3 class" >
    <div class="card-body">
    <div class="form-group">
    <label for="বিভাগ *" class="font-weight-bold"> বর্তমান ঠিকানা (বিভাগ) * </label>
    <select  class="form-control form-select" aria-label=".form-select-lg example2"  name="divition"  id="field_23" data-id="23" data-group="10" placeholder="বিভাগ *">
    <option value>Select</option>
    
    <?php $__currentLoopData = App\Models\divisions::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $divisions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
    <option value="<?php echo e($divisions->id); ?>" <?php if($general_info != null): ?> <?php if($general_info->divition==$divisions->id): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>><?php echo e($divisions->bn_name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    </div>
    </div>
    </div>

<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="বর্তমান ঠিকানা *" class="font-weight-bold">বর্তমান ঠিকানা (জেলা) *  </label>
<select  class="form-control form-select" aria-label=".form-select-lg example2"  name="present_address"   name="present_address"   placeholder="বর্তমান ঠিকানা *">
<option value>Select</option>
<?php $__currentLoopData = App\Models\districts::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
<option value="<?php echo e($district->id); ?>" <?php if($general_info != null): ?> <?php if($general_info->present_address==$district->id): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>><?php echo e($district->bn_name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>
</div>
</div>

<div class="card mb-3 class" data-condtion id="id">
    <div class="card-body">
    <div class="form-group">
    <label for="বিভাগ *" class="font-weight-bold">স্থায়ী ঠিকানা (বিভাগ)* </label>
    <select  class="form-control form-select" aria-label=".form-select-lg example5"  name="permanent_divition"  id="field_25" data-id="25" data-group="10" placeholder="বিভাগ *">
    
        <?php $__currentLoopData = App\Models\divisions::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $divisions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <option value="<?php echo e($divisions->id); ?>" <?php if($general_info != null): ?> <?php if($general_info->permanent_divition==$divisions->id): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>><?php echo e($divisions->bn_name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    
    </div>
    </div>
    </div>

<div class="card mb-3 class">
<div class="card-body">
<div class="form-group">
<label for="স্থায়ী ঠিকানা *" class="font-weight-bold">স্থায়ী ঠিকানা (জেলা)* <span class="text-mute">(Required)</span></label>
<select  class="form-control form-select" aria-label=".form-select-lg example4"  name="permanent_address"  placeholder="স্থায়ী ঠিকানা *" required>
<option value>Select</option>
<?php $__currentLoopData = App\Models\districts::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
<option value="<?php echo e($district->id); ?>" <?php if($general_info != null): ?> <?php if($general_info->permanent_address==$district->id): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>><?php echo e($district->bn_name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>

</div>
</div>
</div>

<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="জন্মসন (আসল) *" class="font-weight-bold">জন্মসন (আসল) * </label>
<select class="form-control" name="birth"  id="field_26" data-id="26" data-group="10" placeholder="জন্মসন (আসল) *">
<option value>Select</option>
<option value="১৯৭০" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৭০"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৭০</option>
<option value="১৯৭১" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৭১"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৭১</option>
<option value="১৯৭২" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৭২"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৭২</option>
<option value="১৯৭৩" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৭৩"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৭৩</option>
<option value="১৯৭৪" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৭৪"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৭৪</option>
<option value="১৯৭৫" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৭৫"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৭৫</option>
<option value="১৯৭৬" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৭৬"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৭৬</option>
<option value="১৯৭৭" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৭৭"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৭৭</option>
<option value="১৯৭৮" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৭৮"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৭৮</option>
<option value="১৯৭৯" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৭৯"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৭৯</option>
<option value="১৯৮০" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৮০"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৮০</option>
<option value="১৯৮১" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৮১"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৮১</option>
<option value="১৯৮২" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৮২"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৮২</option>
<option value="১৯৮৩" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৮৩"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৮৩</option>
<option value="১৯৮৪" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৮৪"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৮৪</option>
<option value="১৯৮৫" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৮৫"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৮৫</option>
<option value="১৯৮৬" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৮৬"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৮৬</option>
<option value="১৯৮৭" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৮৭"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৮৭</option>
<option value="১৯৮৮" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৮৮"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৮৮</option>
<option value="১৯৮৯" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৮৯"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৮৯</option>
<option value="১৯৯০" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৯০"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৯০</option>
<option value="১৯৯১" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৯১"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৯১</option>
<option value="১৯৯২" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৯২"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৯২</option>
<option value="১৯৯৩" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৯৩"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৯৩</option>
<option value="১৯৯৪" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৯৪"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৯৪</option>
<option value="১৯৯৫" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৯৫"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৯৫</option>
<option value="১৯৯৬" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৯৬"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৯৬</option>
<option value="১৯৯৭" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৯৭"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৯৭</option>
<option value="১৯৯৮" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৯৮"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৯৮</option>
<option value="১৯৯৯" <?php if($general_info != null): ?> <?php if($general_info->birth=="১৯৯৯"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>১৯৯৯</option>
<option value="২০০০" <?php if($general_info != null): ?> <?php if($general_info->birth=="২০০০"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>২০০০</option>
<option value="২০০১" <?php if($general_info != null): ?> <?php if($general_info->birth=="২০০১"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>২০০১</option>
<option value="২০০২" <?php if($general_info != null): ?> <?php if($general_info->birth=="২০০২"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>২০০২</option>
<option value="২০০৩" <?php if($general_info != null): ?> <?php if($general_info->birth=="২০০৩"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>২০০৩</option>
<option value="২০০৪" <?php if($general_info != null): ?> <?php if($general_info->birth=="২০০৪"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>২০০৪</option>
<option value="২০০৫" <?php if($general_info != null): ?> <?php if($general_info->birth=="২০০৫"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>২০০৫</option>
<option value="২০০৬" <?php if($general_info != null): ?> <?php if($general_info->birth=="২০০৬"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>২০০৬</option>
<option value="২০০৭" <?php if($general_info != null): ?> <?php if($general_info->birth=="২০০৭"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>২০০৭</option>
<option value="২০০৮" <?php if($general_info != null): ?> <?php if($general_info->birth=="২০০৮"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>২০০৮</option>
<option value="২০০৯" <?php if($general_info != null): ?> <?php if($general_info->birth=="২০০৯"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>২০০৯</option>
<option value="২০১০" <?php if($general_info != null): ?> <?php if($general_info->birth=="২০১০"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>২০১০</option>
</select>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="গাত্রবর্ণ" class="font-weight-bold">গাত্রবর্ণ <span class="text-mute">(Required)</span></label>
<select class="form-control" name="color"  id="field_27" data-id="27" data-group="10" placeholder="গাত্রবর্ণ" required>
<option value>Select</option>
<option value="কালো" <?php if($general_info != null): ?> <?php if($general_info->color=="কালো"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>কালো</option>
<option value="শ্যামলা" <?php if($general_info != null): ?> <?php if($general_info->color=="শ্যামলা"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>শ্যামলা</option>
<option value="উজ্জ্বল শ্যামলা" <?php if($general_info != null): ?> <?php if($general_info->color=="উজ্জ্বল শ্যামলা"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>উজ্জ্বল শ্যামলা</option>
<option value="ফর্সা" <?php if($general_info != null): ?> <?php if($general_info->color=="ফর্সা"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>ফর্সা</option>
<option value="উজ্জ্বল ফর্সা" <?php if($general_info != null): ?> <?php if($general_info->color=="উজ্জ্বল ফর্সা"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>উজ্জ্বল ফর্সা</option>
</select>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="উচ্চতা" class="font-weight-bold">উচ্চতা <span class="text-mute">(Required)</span></label>
<select class="form-control" name="height"  id="field_54" data-id="54" data-group="10" placeholder="উচ্চতা" required>
<option value>Select</option>
<option value="1" <?php if($general_info != null): ?>  <?php if($general_info->height=="1"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৪&#039;১&#039;&#039;</option>
<option value="2" <?php if($general_info != null): ?>  <?php if($general_info->height=="2"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৪&#039;২&#039;&#039;</option>
<option value="3" <?php if($general_info != null): ?>  <?php if($general_info->height=="3"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৪&#039;৩&#039;&#039;</option>
<option value="4" <?php if($general_info != null): ?>  <?php if($general_info->height=="4"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৪&#039;৪&#039;&#039;</option>
<option value="5" <?php if($general_info != null): ?>  <?php if($general_info->height=="5"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৪&#039;৫&#039;&#039;</option>
<option value="6" <?php if($general_info != null): ?>  <?php if($general_info->height=="6"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৪&#039;৬&#039;&#039;</option>
<option value="7" <?php if($general_info != null): ?>  <?php if($general_info->height=="7"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৪&#039;৭&#039;&#039;</option>
<option value="8" <?php if($general_info != null): ?>  <?php if($general_info->height=="8"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৪&#039;৮&#039;&#039;</option>
<option value="9" <?php if($general_info != null): ?>  <?php if($general_info->height=="9"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৪&#039;৯&#039;&#039;</option>
<option value="10" <?php if($general_info != null): ?>  <?php if($general_info->height=="10"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৪&#039;১০&#039;&#039;</option>
<option value="11" <?php if($general_info != null): ?>  <?php if($general_info->height=="11"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৪&#039;১১&#039;&#039;</option>
<option value="12" <?php if($general_info != null): ?>  <?php if($general_info->height=="12"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৪&#039;১২&#039;&#039;</option>
<option value="13" <?php if($general_info != null): ?>  <?php if($general_info->height=="13"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৫&#039;০&#039;&#039;</option>
<option value="14" <?php if($general_info != null): ?>  <?php if($general_info->height=="14"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৫&#039;১&#039;&#039;</option>
<option value="15" <?php if($general_info != null): ?>  <?php if($general_info->height=="15"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৫&#039;২&#039;&#039;</option>
<option value="16" <?php if($general_info != null): ?>  <?php if($general_info->height=="16"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৫&#039;৩&#039;&#039;</option>
<option value="17" <?php if($general_info != null): ?>  <?php if($general_info->height=="17"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৫&#039;৪&#039;&#039;</option>
<option value="18" <?php if($general_info != null): ?>  <?php if($general_info->height=="18"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৫&#039;৫&#039;&#039;</option>
<option value="19" <?php if($general_info != null): ?>  <?php if($general_info->height=="19"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৫&#039;৬&#039;&#039;</option>
<option value="20" <?php if($general_info != null): ?>  <?php if($general_info->height=="20"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৫&#039;৭&#039;&#039;</option>
<option value="21" <?php if($general_info != null): ?>  <?php if($general_info->height=="21"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৫&#039;৮&#039;&#039;</option>
<option value="22" <?php if($general_info != null): ?>  <?php if($general_info->height=="22"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৫&#039;৯&#039;&#039;</option>
<option value="23" <?php if($general_info != null): ?>  <?php if($general_info->height=="23"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৫&#039;১০&#039;&#039;</option>
<option value="24" <?php if($general_info != null): ?>  <?php if($general_info->height=="24"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৫&#039;১১&#039;&#039;</option>
<option value="25" <?php if($general_info != null): ?>  <?php if($general_info->height=="25"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৫&#039;১২&#039;&#039;</option>
<option value="26" <?php if($general_info != null): ?>  <?php if($general_info->height=="26"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৬&#039;০&#039;&#039;</option>
<option value="27" <?php if($general_info != null): ?>  <?php if($general_info->height=="27"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৬&#039;১&#039;&#039;</option>
<option value="28" <?php if($general_info != null): ?>  <?php if($general_info->height=="28"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৬&#039;২&#039;&#039;</option>
<option value="29" <?php if($general_info != null): ?>  <?php if($general_info->height=="29"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৬&#039;৩&#039;&#039;</option>
<option value="30" <?php if($general_info != null): ?>  <?php if($general_info->height=="30"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৬&#039;৪&#039;&#039;</option>
<option value="31" <?php if($general_info != null): ?>  <?php if($general_info->height=="31"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৬&#039;৫&#039;&#039;</option>
<option value="32" <?php if($general_info != null): ?>  <?php if($general_info->height=="32"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৬&#039;৬&#039;&#039;</option>
<option value="33" <?php if($general_info != null): ?>  <?php if($general_info->height=="33"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৬&#039;৭&#039;&#039;</option>
<option value="34" <?php if($general_info != null): ?>  <?php if($general_info->height=="34"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৬&#039;৮&#039;&#039;</option>
<option value="35" <?php if($general_info != null): ?>  <?php if($general_info->height=="35"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৬&#039;৯&#039;&#039;</option>
<option value="36" <?php if($general_info != null): ?>  <?php if($general_info->height=="36"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৬&#039;১০&#039;&#039;</option>
<option value="37" <?php if($general_info != null): ?>  <?php if($general_info->height=="37"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৬&#039;১১&#039;&#039;</option>
<option value="38" <?php if($general_info != null): ?>  <?php if($general_info->height=="38"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>৬&#039;১২&#039;&#039;</option>
</select>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="ওজন" class="font-weight-bold">ওজন <span class="text-mute">(Required)</span></label>
<input type="text" class="form-control" name="weight"  value="<?php if($general_info != null): ?><?php echo e($general_info->weight); ?> <?php endif; ?>" placeholder="ওজন">
</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="রক্তের গ্রুপ *" class="font-weight-bold">রক্তের গ্রুপ * <span class="text-mute">(Required)</span></label>
<select class="form-control" name="blood_group" id="field_56" data-id="56" data-group="10" placeholder="রক্তের গ্রুপ *" required>
<option value>Select</option>
<option value="A+"  <?php if($general_info != null): ?> <?php if($general_info->blood_group=="A+"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>A+</option>
<option value="A-"  <?php if($general_info != null): ?> <?php if($general_info->blood_group=="A-"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>A-</option>
<option value="AB+"  <?php if($general_info != null): ?> <?php if($general_info->blood_group=="AB+"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>AB+</option>
<option value="AB-"  <?php if($general_info != null): ?> <?php if($general_info->blood_group=="AB-"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>AB-</option>
<option value="B+"  <?php if($general_info != null): ?> <?php if($general_info->blood_group=="B+"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>B+</option>
<option value="B-"  <?php if($general_info != null): ?> <?php if($general_info->blood_group=="B-"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>B-</option>
<option value="O+"  <?php if($general_info != null): ?> <?php if($general_info->blood_group=="O+"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>O+</option>
<option value="O-"  <?php if($general_info != null): ?> <?php if($general_info->blood_group=="O-"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>O-</option>
</select>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="পেশা" class="font-weight-bold">পেশা <span class="text-mute">(Required)</span></label>

<select class="form-control mt-2" name="profession" data-placeholder="নিবার্চন করুন">
    <option value>নিবার্চন করুন</option>
    <option value="গৃহিণী"  <?php if($general_info != null): ?> <?php if($general_info->profession=="গৃহিণী"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>গৃহিণী</option>
    <option value="ছাত্র/ছাত্রী"  <?php if($general_info != null): ?> <?php if($general_info->profession=="ছাত্র/ছাত্রী"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>ছাত্র/ছাত্রী</option>
    <option value="ব্যবসা"  <?php if($general_info != null): ?> <?php if($general_info->profession=="ব্যবসা"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>ব্যবসা</option>
    <option value="প্রাইভেট জব"  <?php if($general_info != null): ?> <?php if($general_info->profession=="প্রাইভেট জব"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>প্রাইভেট জব</option>
    <option value="সরকারি চাকুরীজীবি"  <?php if($general_info != null): ?> <?php if($general_info->profession=="সরকারি চাকুরীজীবি"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>সরকারি চাকুরীজীবি</option>
    <option value="মাদ্রাসার শিক্ষক"  <?php if($general_info != null): ?> <?php if($general_info->profession=="মাদ্রাসার শিক্ষক"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>মাদ্রাসার শিক্ষক</option>
    <option value="স্কুলের শিক্ষক"  <?php if($general_info != null): ?> <?php if($general_info->profession=="স্কুলের শিক্ষক"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>স্কুলের শিক্ষক</option>
    <option value="ফ্রিল্যান্সার"  <?php if($general_info != null): ?> <?php if($general_info->profession=="ফ্রিল্যান্সার"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>ফ্রিল্যান্সার</option>
    <option value="ডাক্তার"  <?php if($general_info != null): ?> <?php if($general_info->profession=="ডাক্তার"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>ডাক্তার</option>
    <option value="বিএসসি ইঞ্জিনিয়ার"  <?php if($general_info != null): ?> <?php if($general_info->profession=="বিএসসি ইঞ্জিনিয়ার"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>বিএসসি ইঞ্জিনিয়ার</option>
    <option value="ডিপ্লোমা ইঞ্জিনিয়ার"  <?php if($general_info != null): ?> <?php if($general_info->profession=="ডিপ্লোমা ইঞ্জিনিয়ার"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>ডিপ্লোমা ইঞ্জিনিয়ার</option>
    <option value="ড্রাইভিং"  <?php if($general_info != null): ?> <?php if($general_info->profession=="ড্রাইভিং"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>ড্রাইভিং</option>
    <option value="বাড়ি ভাড়া ব্যবসা"  <?php if($general_info != null): ?> <?php if($general_info->profession=="বাড়ি ভাড়া ব্যবসা"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>বাড়ি ভাড়া ব্যবসা</option>
    <option value="সাংবাদিক"  <?php if($general_info != null): ?> <?php if($general_info->profession=="সাংবাদিক"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>সাংবাদিক</option>
    <option value="নার্স"  <?php if($general_info != null): ?> <?php if($general_info->profession=="নার্স"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>নার্স</option>
    <option value="উকিল"  <?php if($general_info != null): ?> <?php if($general_info->profession=="উকিল"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>উকিল</option>
    <option value="সেনাবাহিনী/নৌবাহিনী/বিমানবাহিনী"  <?php if($general_info != null): ?> <?php if($general_info->profession=="সেনাবাহিনী/নৌবাহিনী/বিমানবাহিনী"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>সেনাবাহিনী/নৌবাহিনী/বিমানবাহিনী</option>
    <option value="পুলিশ/বিজিবি/কোস্টগার্ড ও অন্যান্য নিরাপত্তা বাহিনীর সদস্য"  <?php if($general_info != null): ?> <?php if($general_info->profession=="পুলিশ/বিজিবি/কোস্টগার্ড ও অন্যান্য নিরাপত্তা বাহিনীর সদস্য"): ?> <?php echo e("Selected"); ?>  <?php endif; ?> <?php endif; ?>>পুলিশ/বিজিবি/কোস্টগার্ড ও অন্যান্য নিরাপত্তা বাহিনীর সদস্য</option>
    <option value="কৃষি"  <?php if($general_info != null): ?> <?php if($general_info->profession=="কৃষি"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>কৃষি</option>
    <option value="বেকার"  <?php if($general_info != null): ?> <?php if($general_info->profession=="বেকার"): ?> <?php echo e("Selected"); ?>  <?php endif; ?> <?php endif; ?>>বেকার</option>
    <option value="সাধারণ"  <?php if($general_info != null): ?> <?php if($general_info->profession=="সাধারণ"): ?> <?php echo e("Selected"); ?>  <?php endif; ?> <?php endif; ?>>সাধারণ</option>
    </select>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="মাসিক আয়" class="font-weight-bold">মাসিক আয় </label>
<input type="text" class="form-control"name="monthly_income" value="<?php if($general_info != null): ?> <?php echo e($general_info->monthly_income); ?> <?php endif; ?>" placeholder="মাসিক আয়">
<input type="hidden" class="form-control"name="t_name" value="general_info">

</div>
</div>
</div>

</form>
</div>

<div class="tab-pane fade " id="tab-11" role="tabpanel" aria-labelledby="tab-11-tab">
<form name="address" >
    <?php  $address =  App\Models\address::where(['user_table_id'=>$auth->id])->first() ?>

<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="স্থায়ী ঠিকানা *" class="font-weight-bold">স্থায়ী ঠিকানা * <span class="text-mute">(Required)</span></label>
<input type="text" class="form-control" name="permanent_address" value="<?php if($address != null): ?>  <?php echo e($address->permanent_address); ?> <?php endif; ?>" placeholder="স্থায়ী ঠিকানা *" required>
<input type="hidden" class="form-control" name="t_name" value="address" placeholder="স্থায়ী ঠিকানা *" required>

</div>
</div>
</div>
<div class="card mb-3 class"  id="id">
<div class="card-body">
<div class="form-group">
<label for="বর্তমান ঠিকানা *" class="font-weight-bold">বর্তমান ঠিকানা * <span class="text-mute">(Required)</span></label>
<input type="text" class="form-control" name="present_address" value="<?php if($address != null): ?>  <?php echo e($address->present_address); ?> <?php endif; ?>"   placeholder="বর্তমান ঠিকানা *" required>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="কোথায় বড় হয়েছেন? *" class="font-weight-bold">কোথায় বড় হয়েছেন? * </label>
<input type="text" class="form-control"  name="growing_up" value="<?php if($address != null): ?> <?php echo e($address->growing_up); ?> <?php endif; ?>"  placeholder="কোথায় বড় হয়েছেন? *">

</div>
</div>
</div>
</div>
</form>
<div class="tab-pane fade " id="tab-12" role="tabpanel" aria-labelledby="tab-12-tab">
<form name="education_info">
    <?php  $education_info =  App\Models\education_info::where(['user_table_id'=>$auth->id])->first() ?>

<input type="hidden" name="t_name" value="education_info">
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="কোন মাধ্যমে পড়াশোনা করেছেন? *" class="font-weight-bold">কোন মাধ্যমে পড়াশোনা করেছেন? * </label>
<select class="form-control" name="education_type"   placeholder="কোন মাধ্যমে পড়াশোনা করেছেন? *">
<option value>Select</option>
<option value="1" <?php if($education_info != null): ?> <?php if($education_info->education_type=="1"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>মাদ্রাসা</option>
<option value="2" <?php if($education_info != null): ?> <?php if($education_info->education_type=="2"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>জেনারেল</option>
</select>

</div>
</div>
</div>
<div class="card mb-3 class31" data-condtion="31" id="id109">
<div class="card-body">
<div class="form-group">
<label for="আপনি কি হাফেজ?" class="font-weight-bold">আপনি কি হাফেজ? </label>
<select class="form-control" name="is_hafez"  placeholder="আপনি কি হাফেজ?">
<option value>Select</option>
<option value="1" <?php if($education_info != null): ?> <?php if($education_info->is_hafez=="1"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>হ্যাঁ</option>
<option value="0" <?php if($education_info != null): ?> <?php if($education_info->is_hafez=="0"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>না</option>
</select>

</div>
</div>
</div>
<div class="card mb-3 class31" >
<div class="card-body">
<div class="form-group">
<label for="দাওরায়ে হাদীস পাশ করেছেন?" class="font-weight-bold">দাওরায়ে হাদীস পাশ করেছেন? </label>
<select class="form-control" name="is_passed_dawrae_hadith"   placeholder="দাওরায়ে হাদীস পাশ করেছেন?">
<option value>Select</option>
<option value="1" <?php if($education_info != null): ?> <?php if($education_info->is_passed_dawrae_hadith=="1"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>হ্যাঁ</option>
<option value="0" <?php if($education_info != null): ?> <?php if($education_info->is_passed_dawrae_hadith=="0"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>না</option>
</select>


</div>
</div>
</div>
<div class="card mb-3 class31">
<div class="card-body">
<div class="form-group">
<label for="মাধ্যমিক (SSC) / সমমান পাশ করেছেন?" class="font-weight-bold">মাধ্যমিক (SSC) / সমমান পাশ করেছেন? </label>
<select class="form-control" name="is_passed_ssc"  id="field_35" data-id="35" data-group="12" placeholder="মাধ্যমিক (SSC) / সমমান পাশ করেছেন?">
<option value>Select</option>
<option value="1" <?php if($education_info != null): ?> <?php if($education_info->is_passed_ssc=="1"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>হ্যাঁ</option>
<option value="0" <?php if($education_info != null): ?> <?php if($education_info->is_passed_ssc=="0"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>না</option>
</select>

</div>
</div>
</div>
<div class="card mb-3 class31" data-condtion="31" id="id110">
<div class="card-body">
<div class="form-group">
<label for="মাধ্যমিক (SSC) / সমমান ফলাফল" class="font-weight-bold">মাধ্যমিক (SSC) / সমমান ফলাফল </label>
<input type="text" class="form-control"  name="result_ssc" value="<?php if($education_info != null): ?><?php echo e($education_info->result_ssc); ?> <?php endif; ?>"   placeholder="মাধ্যমিক (SSC) / সমমান ফলাফল">

</div>
</div>
</div>
<div class="card mb-3 class31" data-condtion="31" id="id110">
<div class="card-body">
<div class="form-group">
<label for="মাধ্যমিক (SSC) / সমমান বিভাগ" class="font-weight-bold">মাধ্যমিক (SSC) / সমমান বিভাগ </label>
<select class="form-control" name="divition_ssc"   placeholder="মাধ্যমিক (SSC) / সমমান বিভাগ">
<option value>Select</option>
<option value="1" <?php if($education_info != null): ?> <?php if($education_info->divition_ssc=="1"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>বিজ্ঞান বিভাগ</option>
<option value="2" <?php if($education_info != null): ?> <?php if($education_info->divition_ssc=="2"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>মানবিক বিভাগ</option>
<option value="3" <?php if($education_info != null): ?> <?php if($education_info->divition_ssc=="3"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>ব্যবসা বিভাগ</option>
<option value="4" <?php if($education_info != null): ?> <?php if($education_info->divition_ssc=="4"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>কারিগরি / ভোকেশনাল</option>
</select>

</div>
</div>
</div>
<div class="card mb-3 class31" data-condtion="31" id="id110">
<div class="card-body">
<div class="form-group">
<label for="মাধ্যমিক (SSC) / সমমান পাসের সন" class="font-weight-bold">মাধ্যমিক (SSC) / সমমান পাসের সন </label>


<input type="text" class="form-control" value="<?php if($education_info != null): ?> <?php echo e($education_info->ssc_passed_year); ?> <?php endif; ?>" name="ssc_passed_year" placeholder="মাধ্যমিক (SSC) / সমমান পাসের সন">
</div>
</div>
</div>
<div class="card mb-3 class31" data-condtion="31" id="id110">
<div class="card-body">
<div class="form-group">
<label for="উচ্চ মাধ্যমিক (HSC) / সমমান পাশ করেছেন?" class="font-weight-bold">উচ্চ মাধ্যমিক (HSC) / সমমান পাশ করেছেন? </label>
<select class="form-control" name="is_passed_hsc"  placeholder="উচ্চ মাধ্যমিক (HSC) / সমমান পাশ করেছেন?">
<option value>Select</option>
<option value="1" <?php if($education_info != null): ?> <?php if($education_info->is_passed_hsc=="1"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>হ্যাঁ</option>
<option value="0" <?php if($education_info != null): ?> <?php if($education_info->is_passed_hsc=="0"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>না</option>
</select>

</div>
</div>
</div>
<div class="card mb-3 class31" data-condtion="31" id="id110">
<div class="card-body">
<div class="form-group">
<label for="উচ্চ মাধ্যমিক (HSC) / সমমানের বিভাগ" class="font-weight-bold">উচ্চ মাধ্যমিক (HSC) / সমমানের বিভাগ </label>
<select class="form-control" name="divition_hsc"  placeholder="উচ্চ মাধ্যমিক (HSC) / সমমানের বিভাগ">
<option value>Select</option>
<option value="1" <?php if($education_info != null): ?> <?php if($education_info->divition_hsc=="1"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>বিজ্ঞান বিভাগ</option>
<option value="2" <?php if($education_info != null): ?> <?php if($education_info->divition_hsc=="2"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>মানবিক বিভাগ</option>
<option value="3" <?php if($education_info != null): ?> <?php if($education_info->divition_hsc=="3"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>ব্যবসা বিভাগ</option>
<option value="4" <?php if($education_info != null): ?> <?php if($education_info->divition_hsc=="4"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>কারিগরি / ভোকেশনাল</option>
</select>

</div>
</div>
</div>
<div class="card mb-3 class31" data-condtion="31" id="id110">
<div class="card-body">
<div class="form-group">
<label for="উচ্চ মাধ্যমিক (HSC) / সমমান ফলাফল" class="font-weight-bold">উচ্চ মাধ্যমিক (HSC) / সমমান ফলাফল </label>
<input type="text" class="form-control" name="result_hsc" value="<?php if($education_info != null): ?><?php echo e($education_info->result_hsc); ?> <?php endif; ?>" placeholder="উচ্চ মাধ্যমিক (HSC) / সমমান ফলাফল">

</div>
</div>
</div>
<div class="card mb-3 class31" data-condtion="31" id="id110">
<div class="card-body">
<div class="form-group">
<label for="উচ্চ মাধ্যমিক (HSC) / সমমান পাসের সন" class="font-weight-bold">উচ্চ মাধ্যমিক (HSC) / সমমান পাসের সন </label>
<input type="text" class="form-control" name="hsc_passed_year" value="<?php if($education_info != null): ?> <?php echo e($education_info->hsc_passed_year); ?> <?php endif; ?>"   placeholder="উচ্চ মাধ্যমিক (HSC) / সমমান পাসের সন">


</div>
</div>
</div>
<div class="card mb-3 class31" data-condtion="31" id="id110">
<div class="card-body">
<div class="form-group">
<label for="স্নাতক / স্নাতক (সম্মান) / সমমান শিক্ষাগত যোগ্যতা" class="font-weight-bold">স্নাতক / স্নাতক (সম্মান) / সমমান শিক্ষাগত যোগ্যতা </label>
<input type="text" class="form-control"name="honours_passed" value="<?php if($education_info != null): ?> <?php echo e($education_info->honours_passed); ?> <?php endif; ?>"  placeholder="স্নাতক / স্নাতক (সম্মান) / সমমান শিক্ষাগত যোগ্যতা">

</div>
</div>
</div>
<div class="card mb-3 class31" data-condtion="31" id="id110">
<div class="card-body">
<div class="form-group">
   
<label for="শিক্ষাপ্রতিষ্ঠানের নাম" class="font-weight-bold">শিক্ষাপ্রতিষ্ঠানের নাম </label>
<input type="text" class="form-control" value="<?php if($education_info != null): ?> <?php echo e($education_info->institute_name); ?> <?php endif; ?>" name="institute_name" placeholder="শিক্ষাপ্রতিষ্ঠানের নাম">
</div>
</div>
</div>
<div class="card mb-3 class31" data-condtion="31" id="id110">
<div class="card-body">
<div class="form-group">
<label for="পাসের সন" class="font-weight-bold">পাসের সন </label>
<input type="text" class="form-control" value="<?php if($education_info != null): ?> <?php echo e($education_info->honours_passed_year); ?> <?php endif; ?>"  name="honours_passed_year"  placeholder="পাসের সন">

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="সর্বোচ্চ শিক্ষাগত যোগ্যতা" class="font-weight-bold">সর্বোচ্চ শিক্ষাগত যোগ্যতা </label>
<input type="text" class="form-control" name="highest_education" value="<?php if($education_info != null): ?> <?php echo e($education_info->highest_education); ?> <?php endif; ?>"  placeholder="সর্বোচ্চ শিক্ষাগত যোগ্যতা">

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="অন্যান্য শিক্ষাগত যোগ্যতা" class="font-weight-bold">অন্যান্য শিক্ষাগত যোগ্যতা </label>
<input type="text" class="form-control"  name="other_education" value="<?php if($education_info != null): ?> <?php echo e($education_info->other_education); ?> <?php endif; ?>"  placeholder="অন্যান্য শিক্ষাগত যোগ্যতা">

</div>
</div>
</div>
</div>
</form>
<div class="tab-pane fade " id="tab-13" role="tabpanel" aria-labelledby="tab-13-tab">
<form name="family_info" >
    <?php  $family_info =  App\Models\family_info::where(['user_table_id'=>$auth->id])->first() ?>

<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="পিতার নাম (শুধুমাত্র আপনি ও কতৃপক্ষ বাদে কেউ দেখতে পাচ্ছে না) *" class="font-weight-bold">পিতার নাম (শুধুমাত্র আপনি ও কতৃপক্ষ বাদে কেউ দেখতে পাচ্ছে না) * <span class="text-mute">(Required)</span></label>
<input type="text" class="form-control"  name="father_name" value="<?php if($family_info != null): ?> <?php echo e($family_info->father_name); ?> <?php endif; ?>"   placeholder="পিতার নাম (শুধুমাত্র আপনি ও কতৃপক্ষ বাদে কেউ দেখতে পাচ্ছে না) *" required>


</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="মাতার নাম (শুধুমাত্র আপনি ও কতৃপক্ষ বাদে কেউ দেখতে পাচ্ছে না)" class="font-weight-bold">মাতার নাম (শুধুমাত্র আপনি ও কতৃপক্ষ বাদে কেউ দেখতে পাচ্ছে না) <span class="text-mute">(Required)</span></label>
<input type="text" class="form-control"  name="mother_name" value="<?php if($family_info != null): ?> <?php echo e($family_info->mother_name); ?> <?php endif; ?>"  placeholder="মাতার নাম (শুধুমাত্র আপনি ও কতৃপক্ষ বাদে কেউ দেখতে পাচ্ছে না)" required>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="পিতার পেশা *" class="font-weight-bold">পিতার পেশা * <span class="text-mute">(Required)</span></label>
<input type="text" class="form-control"  name="profession_father" value="<?php if($family_info != null): ?> <?php echo e($family_info->profession_father); ?> <?php endif; ?>"  placeholder="পিতার পেশা *" required>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="মাতার পেশা *" class="font-weight-bold">মাতার পেশা * </label>
<input type="text" class="form-control"  name="profession_mother" value="<?php if($family_info != null): ?> <?php echo e($family_info->profession_mother); ?> <?php endif; ?>"  placeholder="মাতার পেশা *">

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="বোন কয়জন? *" class="font-weight-bold">বোন কয়জন? * </label>
<input type="text" class="form-control" name="sister"  placeholder="বোন কয়জন? *" value="<?php if($family_info != null): ?> <?php echo e($family_info->sister); ?> <?php endif; ?>">

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="ভাই কয়জন? *" class="font-weight-bold">ভাই কয়জন? * </label>
<input type="text" value="<?php if($family_info != null): ?> <?php echo e($family_info->borther); ?> <?php endif; ?>" class="form-control" name="borther"   placeholder="ভাই কয়জন? *">

</div>
</div>
</div>
<div class="card mb-3 class75" data-condtion="75" id="id676">
<div class="card-body">
<div class="form-group">
<label for="বোনদের সম্পর্কে তথ্য" class="font-weight-bold">বোনদের সম্পর্কে তথ্য </label>
<textarea colspan="3" rows="2" class="form-control" name="info_sister"  placeholder="বোনদের সম্পর্কে তথ্য"><?php if($family_info != null): ?> <?php echo e($family_info->info_sister); ?> <?php endif; ?></textarea>

</div>
</div>
</div>
<div class="card mb-3 class76" data-condtion="76" id="id687">
<div class="card-body">
<div class="form-group">
<label for="ভাইদের সম্পর্কে তথ্য" class="font-weight-bold">ভাইদের সম্পর্কে তথ্য </label>
<textarea colspan="3" rows="2" class="form-control"  name="info_broter"  placeholder="ভাইদের সম্পর্কে তথ্য"><?php if($family_info != null): ?> <?php echo e($family_info->info_broter); ?> <?php endif; ?></textarea>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="চাচা মামাদের পেশা" class="font-weight-bold">চাচা মামাদের পেশা </label>
<textarea colspan="3" rows="2" class="form-control"  name="uncle"  placeholder="চাচা মামাদের পেশা"><?php if($family_info != null): ?> <?php echo e($family_info->uncle); ?> <?php endif; ?></textarea>
<input type="hidden" name="t_name" value="family_info">
</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="পরিবারের অর্থনৈতিক ও সামাজিক অবস্থা *" class="font-weight-bold">পরিবারের অর্থনৈতিক ও সামাজিক অবস্থা * <span class="text-mute">(Required)</span></label>
<input type="text" class="form-control" name="economic_social_status" value="<?php if($family_info != null): ?> <?php echo e($family_info->economic_social_status); ?> <?php endif; ?>"  placeholder="পরিবারের অর্থনৈতিক ও সামাজিক অবস্থা *" required>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="আপনার পরিবারের দ্বীনি অবস্থা কেমন? (বিস্তারিত বর্ননা করুন )" class="font-weight-bold">আপনার পরিবারের দ্বীনি অবস্থা কেমন? (বিস্তারিত বর্ননা করুন ) </label>
<input type="text" class="form-control" name="islamic_status"  value="<?php if($family_info != null): ?> <?php echo e($family_info->islamic_status); ?> <?php endif; ?>"  placeholder="আপনার পরিবারের দ্বীনি অবস্থা কেমন? (বিস্তারিত বর্ননা করুন )">

</div>
</div>
</div>
</div>
</form>
<div class="tab-pane fade " id="tab-14" role="tabpanel" aria-labelledby="tab-14-tab">
<form name="personal_info" >
    <?php  $personal_info =  App\Models\personal_info::where(['user_table_id'=>$auth->id])->first() ?>

<input type="hidden" name="t_name" value="personal_info">
<div class="card mb-3 class19" data-condtion="19" id="id53">
<div class="card-body">
<div class="form-group">
<label for="সুন্নতি দাঁড়ি রয়েছে কি?" class="font-weight-bold">সুন্নতি দাঁড়ি রয়েছে কি? </label>
<input type="text" class="form-control"  name="beard" value=" <?php if($personal_info != null): ?> <?php echo e($personal_info->beard); ?> <?php endif; ?>" placeholder="সুন্নতি দাঁড়ি রয়েছে কি?">

</div>
</div>
</div>
<div class="card mb-3 class19" data-condtion="19" id="id53">
<div class="card-body">
<div class="form-group">
<label for="পায়ের টাখনুর উপরে কাপড় পরেন?" class="font-weight-bold">পায়ের টাখনুর উপরে কাপড় পরেন? </label>
<input type="text" class="form-control"name="ankle"  value="<?php if($personal_info != null): ?> <?php echo e($personal_info->ankle); ?> <?php endif; ?>" placeholder="পায়ের টাখনুর উপরে কাপড় পরেন?">

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="প্রতিদিন পাঁচ ওয়াক্ত নামাজ পড়া হয় ? *" class="font-weight-bold">প্রতিদিন পাঁচ ওয়াক্ত নামাজ পড়া হয় ? * <span class="text-mute">(Required)</span></label>
<input type="text" class="form-control" name="prayer" value="<?php if($personal_info != null): ?> <?php echo e($personal_info->prayer); ?> <?php endif; ?>" placeholder="প্রতিদিন পাঁচ ওয়াক্ত নামাজ পড়া হয় ? *" required>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="নিয়মিত নামায কত সময় যাবত পড়ছেন? *" class="font-weight-bold">নিয়মিত নামায কত সময় যাবত পড়ছেন? * </label>
<input type="text" class="form-control" name="prayer_year" value="<?php if($personal_info != null): ?> <?php echo e($personal_info->prayer_year); ?> <?php endif; ?>"  placeholder="নিয়মিত নামায কত সময় যাবত পড়ছেন? *">

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="মাহরাম/গাইরে-মাহরাম মেনে চলেন কি? *" class="font-weight-bold">মাহরাম/গাইরে-মাহরাম মেনে চলেন কি? * <span class="text-mute">(Required)</span></label>
<input type="text" class="form-control" name="mahram_comply" value="<?php if($personal_info != null): ?> <?php echo e($personal_info->mahram_comply); ?> <?php endif; ?>" placeholder="মাহরাম/গাইরে-মাহরাম মেনে চলেন কি? *" required>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="শুদ্ধভাবে কুরআন তিলওয়াত করতে পারেন? *" class="font-weight-bold">শুদ্ধভাবে কুরআন তিলওয়াত করতে পারেন? * <span class="text-mute">(Required)</span></label>
<input type="text" class="form-control" name="recite_quran" value="<?php if($personal_info != null): ?> <?php echo e($personal_info->recite_quran); ?> <?php endif; ?>"  placeholder="শুদ্ধভাবে কুরআন তিলওয়াত করতে পারেন? *" required>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="ঘরের বাহিরে সাধারণত কী ধরণের পোশাক পরেন?" class="font-weight-bold">ঘরের বাহিরে সাধারণত কী ধরণের পোশাক পরেন? <span class="text-mute">(Required)</span></label>
<input type="text" class="form-control"  name="wearing_type" value="<?php if($personal_info != null): ?> <?php echo e($personal_info->wearing_type); ?> <?php endif; ?>"  placeholder="ঘরের বাহিরে সাধারণত কী ধরণের পোশাক পরেন?" required>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="কোনো রাজনৈতিক দর্শন থাকলে লিখুন *" class="font-weight-bold">কোনো রাজনৈতিক দর্শন থাকলে লিখুন * </label>
<input type="text" class="form-control"  name="political_philosophy"  value="<?php if($personal_info != null): ?> <?php echo e($personal_info->political_philosophy); ?> <?php endif; ?>"  placeholder="কোনো রাজনৈতিক দর্শন থাকলে লিখুন *">

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="নাটক/সিনেমা/সিরিয়াল/গান/খেলা এসব দেখেন বা শুনেন? *" class="font-weight-bold">নাটক/সিনেমা/সিরিয়াল/গান/খেলা এসব দেখেন বা শুনেন? * <span class="text-mute">(Required)</span></label>
<input type="text" class="form-control"  name="entertainment" value="<?php if($personal_info != null): ?> <?php echo e($personal_info->entertainment); ?> <?php endif; ?>" placeholder="নাটক/সিনেমা/সিরিয়াল/গান/খেলা এসব দেখেন বা শুনেন? *" required>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="মানসিক বা শারীরিক কোনো রোগ আছে কি? *" class="font-weight-bold">মানসিক বা শারীরিক কোনো রোগ আছে কি? * </label>
<input type="text" class="form-control"  name="disease" value="<?php if($personal_info != null): ?> <?php echo e($personal_info->disease); ?> <?php endif; ?>" placeholder="মানসিক বা শারীরিক কোনো রোগ আছে কি? *">

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="দ্বীনের কোন বিশেষ মেহনতে যুক্ত আছেন? *" class="font-weight-bold">দ্বীনের কোন বিশেষ মেহনতে যুক্ত আছেন? * </label>
<input type="text" class="form-control"  name="involved_religion" value="<?php if($personal_info != null): ?> <?php echo e($personal_info->involved_religion); ?> <?php endif; ?>"  placeholder="দ্বীনের কোন বিশেষ মেহনতে যুক্ত আছেন? *">

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="আপনি কি কোনো পীরের মুরিদ বা অনুসারী ? *" class="font-weight-bold">আপনি কি কোনো পীরের মুরিদ বা অনুসারী ? * </label>
<input type="text" class="form-control"  name="follower_pir" value="<?php if($personal_info != null): ?> <?php echo e($personal_info->follower_pir); ?> <?php endif; ?>" placeholder="আপনি কি কোনো পীরের মুরিদ বা অনুসারী ? *">

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="মাজার সম্পর্কে আপনার ধারণা বা বিশ্বাস কি? *" class="font-weight-bold">মাজার সম্পর্কে আপনার ধারণা বা বিশ্বাস কি? * </label>
<input type="text" class="form-control"  name="shrines" value="<?php if($personal_info != null): ?> <?php echo e($personal_info->shrines); ?> <?php endif; ?>" placeholder="মাজার সম্পর্কে আপনার ধারণা বা বিশ্বাস কি? *">

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="আপনার পছন্দের অন্তত ৩ টি ইসলামী বই এর নাম লিখুন" class="font-weight-bold">আপনার পছন্দের অন্তত ৩ টি ইসলামী বই এর নাম লিখুন </label>
<input type="text" class="form-control"  name="islamic_books" value="<?php if($personal_info != null): ?> <?php echo e($personal_info->islamic_books); ?> <?php endif; ?>" placeholder="আপনার পছন্দের অন্তত ৩ টি ইসলামী বই এর নাম লিখুন">

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="আপনার পছন্দের অন্তত ৩ জন আলেমের নাম লিখুন *" class="font-weight-bold">আপনার পছন্দের অন্তত ৩ জন আলেমের নাম লিখুন * </label>
<input type="text" class="form-control" name="scholars_name" value="<?php if($personal_info != null): ?> <?php echo e($personal_info->scholars_name); ?> <?php endif; ?>" placeholder="আপনার পছন্দের অন্তত ৩ জন আলেমের নাম লিখুন *">

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="বিশেষ দ্বীনি বা দুনিয়াবি যোগ্যতা (যদি থাকে)" class="font-weight-bold">বিশেষ দ্বীনি বা দুনিয়াবি যোগ্যতা (যদি থাকে) </label>
<input type="text" class="form-control"  name="special_qualifications" value="<?php if($personal_info != null): ?> <?php echo e($personal_info->special_qualifications); ?> <?php endif; ?>" placeholder="বিশেষ দ্বীনি বা দুনিয়াবি যোগ্যতা (যদি থাকে)">

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="নিজের সম্পর্কে কিছু লিখুন *" class="font-weight-bold">নিজের সম্পর্কে কিছু লিখুন * <span class="text-mute">(Required)</span></label>
<textarea colspan="3" rows="2" class="form-control" name="write_yourself" placeholder="নিজের সম্পর্কে কিছু লিখুন *" required><?php if($personal_info != null): ?> <?php echo e($personal_info->write_yourself); ?> <?php endif; ?></textarea>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="আপনার ক্ষেত্রে প্রযোজ্য হয় এমন অপশন গুলো সিলেক্ট করুন" class="font-weight-bold">আপনার ক্ষেত্রে প্রযোজ্য হয় এমন অপশন গুলো সিলেক্ট করুন </label>
<select class="form-control" name="options_apply"  id="field_122" data-id="122" data-group="14" placeholder="আপনার ক্ষেত্রে প্রযোজ্য হয় এমন অপশন গুলো সিলেক্ট করুন">
<option value>Select</option>
<option value="1"<?php if($personal_info != null): ?>  <?php if($personal_info->options_apply=="1"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>নওমুসলিম</option>
<option value="2"<?php if($personal_info != null): ?>  <?php if($personal_info->options_apply=="2"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>মাসনায় আগ্রহী</option>
<option value="3"<?php if($personal_info != null): ?>  <?php if($personal_info->options_apply=="3"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>প্রবাসী/ প্রবাসী বিয়ে করতে আগ্রহী</option>
<option value="4"<?php if($personal_info != null): ?>  <?php if($personal_info->options_apply=="4"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>ঘর জামাই থাকতে চাই</option>
<option value="5"<?php if($personal_info != null): ?>  <?php if($personal_info->options_apply=="5"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>প্রযোজ্য নয়</option>
</select>


</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="কোন মাজহাব অনুসরণ করেন?" class="font-weight-bold">কোন মাজহাব অনুসরণ করেন? <span class="text-mute">(Required)</span></label>
<select class="form-control" name="mazhab" id="field_124" data-id="124" data-group="14" placeholder="কোন মাজহাব অনুসরণ করেন?" required>
<option value>Select</option>
<option value="1"<?php if($personal_info != null): ?>  <?php if($personal_info->mazhab=="1"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>হানাফি</option>
<option value="2"<?php if($personal_info != null): ?>  <?php if($personal_info->mazhab=="2"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>শাফেয়ী</option>
<option value="3"<?php if($personal_info != null): ?>  <?php if($personal_info->mazhab=="3"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>মালেকি</option>
<option value="4"<?php if($personal_info != null): ?>  <?php if($personal_info->mazhab=="4"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>হাম্বলি</option>
<option value="5"<?php if($personal_info != null): ?>  <?php if($personal_info->mazhab=="5"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>সালাফি[আহলে হাদিস]</option>
<option value="6"<?php if($personal_info != null): ?>  <?php if($personal_info->mazhab=="6"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>জানিনা</option>
</select>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="নজরের হেফাজত করেন?" class="font-weight-bold">নজরের হেফাজত করেন? </label>
<select class="form-control" name="save_eye" id="field_125" data-id="125" data-group="14" placeholder="নজরের হেফাজত করেন?">
<option value>Select</option>
<option value="0"<?php if($personal_info != null): ?>  <?php if($personal_info->save_eye=="0"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>না</option>
<option value="2"<?php if($personal_info != null): ?>  <?php if($personal_info->save_eye=="1"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>হ্যা</option>
<option value="3"<?php if($personal_info != null): ?>  <?php if($personal_info->save_eye=="2"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?>>চেষ্টা করি</option>
</select>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="দ্বীনি ফিউচার প্ল্যন কি আপনার?" class="font-weight-bold">দ্বীনি ফিউচার প্ল্যন কি আপনার? </label>
<input type="text" class="form-control" name="future_plane" value="<?php if($personal_info != null): ?> <?php echo e($personal_info->future_plane); ?> <?php endif; ?>" placeholder="দ্বীনি ফিউচার প্ল্যন কি আপনার?">

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="অবসর সময় কিভাবে কাটান?" class="font-weight-bold">অবসর সময় কিভাবে কাটান? </label>
<input type="text" class="form-control" name="spend_free_time" value="<?php if($personal_info != null): ?> <?php echo e($personal_info->spend_free_time); ?> <?php endif; ?>" placeholder="অবসর সময় কিভাবে কাটান?">

</div>
</div>
</div>
<div class="card mb-3 class19" data-condtion="19" id="id">
<div class="card-body">
<div class="form-group">
<label for="কত ওয়াক্ত নামায জামাতের সাথে আদায় করেন?" class="font-weight-bold">কত ওয়াক্ত নামায জামাতের সাথে আদায় করেন? </label>
<input type="text" class="form-control" name="congregation_pray" value="<?php if($personal_info != null): ?> <?php echo e($personal_info->congregation_pray); ?> <?php endif; ?>" placeholder="কত ওয়াক্ত নামায জামাতের সাথে আদায় করেন?">

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="বাড়িতে কি কি দায়িত্ব আপনি পালন করে থাকেন?" class="font-weight-bold">বাড়িতে কি কি দায়িত্ব আপনি পালন করে থাকেন? </label>
<input type="text" class="form-control"  name="responsibilities_home" value="<?php if($personal_info != null): ?> <?php echo e($personal_info->responsibilities_home); ?> <?php endif; ?>" placeholder="বাড়িতে কি কি দায়িত্ব আপনি পালন করে থাকেন?">

</div>
</div>
</div>
<div class="card mb-3 class19" data-condtion="19" id="id">
<div class="card-body">
<div class="form-group">
<label for="আপনি কি ধুমপান করেন?" class="font-weight-bold">আপনি কি ধুমপান করেন? </label>
<input type="text" class="form-control" name="smoking" value="<?php if($personal_info != null): ?> <?php echo e($personal_info->smoking); ?> <?php endif; ?>" placeholder="আপনি কি ধুমপান করেন?">


</div>
</div>
</div>
</div>
</form>
<div class="tab-pane fade " id="tab-15" role="tabpanel" aria-labelledby="tab-15-tab">
<form name="marriage_info">

 <?php  $marriage_info =  App\Models\marriage_info::where(['user_table_id'=>$auth->id])->first() ?>


<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="অভিভাবক আপনার বিয়েতে রাজি কি না? *" class="font-weight-bold">অভিভাবক আপনার বিয়েতে রাজি কি না? * <span class="text-mute">(Required)</span></label>
<input type="text" class="form-control"  name="is_agree" value="<?php if($marriage_info != null): ?> <?php echo e($marriage_info->is_agree); ?> <?php endif; ?>"  placeholder="অভিভাবক আপনার বিয়েতে রাজি কি না? *" required>
<input type="hidden"  name="t_name" value="marriage_info" >

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="বিয়ে কেন করছেন? বিয়ে সম্পর্কে আপনার ধারণা কি? *" class="font-weight-bold">বিয়ে কেন করছেন? বিয়ে সম্পর্কে আপনার ধারণা কি? * <span class="text-mute">(Required)</span></label>
<textarea colspan="3" rows="2" class="form-control" name="thought_marriage" placeholder="বিয়ে কেন করছেন? বিয়ে সম্পর্কে আপনার ধারণা কি? *" required> <?php if($marriage_info != null): ?><?php echo e($marriage_info->thought_marriage); ?>  <?php endif; ?></textarea>

</div>
 </div>
</div>





<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="পাত্র/পাত্রী নির্বাচনে কোন বিষয়গুলো ছাড় দেয়ার মানসিকতা রাখেন?" class="font-weight-bold">পাত্র/পাত্রী নির্বাচনে কোন বিষয়গুলো ছাড় দেয়ার মানসিকতা রাখেন? </label>
<select class="form-control" name="selection_mind" placeholder="পাত্র/পাত্রী নির্বাচনে কোন বিষয়গুলো ছাড় দেয়ার মানসিকতা রাখেন?">
<option value>Select</option>
<option value="1" <?php if($marriage_info != null): ?> <?php if($marriage_info->selection_mind=="1"): ?> <?php echo e("Selected"); ?>  <?php endif; ?> <?php endif; ?> >জেলা</option>
<option value="2" <?php if($marriage_info != null): ?> <?php if($marriage_info->selection_mind=="2"): ?> <?php echo e("Selected"); ?>  <?php endif; ?> <?php endif; ?> >ছাড় দিতে রাজি নই</option>
<option value="3" <?php if($marriage_info != null): ?> <?php if($marriage_info->selection_mind=="3"): ?> <?php echo e("Selected"); ?>  <?php endif; ?> <?php endif; ?> >আর্থিক অবস্থা</option>
<option value="4" <?php if($marriage_info != null): ?> <?php if($marriage_info->selection_mind=="4"): ?> <?php echo e("Selected"); ?>  <?php endif; ?> <?php endif; ?> >আর্থিক অবস্থা ও গায়ের রং</option>
<option value="5" <?php if($marriage_info != null): ?> <?php if($marriage_info->selection_mind=="5"): ?> <?php echo e("Selected"); ?>  <?php endif; ?> <?php endif; ?> >আর্থিক অবস্থা ও জেলা</option>
<option value="6" <?php if($marriage_info != null): ?> <?php if($marriage_info->selection_mind=="6"): ?> <?php echo e("Selected"); ?>  <?php endif; ?> <?php endif; ?> >গায়ের রং ও জেলা</option>
<option value="7" <?php if($marriage_info != null): ?> <?php if($marriage_info->selection_mind=="7"): ?> <?php echo e("Selected"); ?>  <?php endif; ?> <?php endif; ?> >সবক্ষেত্রেই ছাড় দিতে রাজি আছি</option>
<option value="8" <?php if($marriage_info != null): ?> <?php if($marriage_info->selection_mind=="8"): ?> <?php echo e("Selected"); ?>  <?php endif; ?> <?php endif; ?> >গায়ের রং</option>
</select>

</div>
</div>
</div>
</form>
</div>

<div class="tab-pane fade " id="tab-16" role="tabpanel" aria-labelledby="tab-16-tab">
<form name="other_info">
    <?php  $other_info =  App\Models\other_info::where(['user_table_id'=>$auth->id])->first() ?>


<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="পেশা সম্পর্কিত তথ্য" class="font-weight-bold">পেশা সম্পর্কিত তথ্য </label>
<textarea colspan="3" rows="2" class="form-control"  name="profession" placeholder="পেশা সম্পর্কিত তথ্য"><?php if($other_info != null): ?> <?php echo e($other_info->profession); ?> <?php endif; ?></textarea>
<input type="hidden" name="t_name" value="other_info">
</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="বিশেষ কিছু যদি জানাতে চান" class="font-weight-bold">বিশেষ কিছু যদি জানাতে চান </label>
<textarea colspan="3" rows="2" class="form-control"  name="asking"placeholder="বিশেষ কিছু যদি জানাতে চান"><?php if($other_info != null): ?> <?php echo e($other_info->asking); ?> <?php endif; ?></textarea>

</div>
</div>
</div>
</form>
</div>

<div class="tab-pane fade " id="tab-17" role="tabpanel" aria-labelledby="tab-17-tab">
<form >
    <?php  $spouse_expect =  App\Models\spouse_expect::where(['user_table_id'=>$auth->id])->first() ?>


<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="বয়স *" class="font-weight-bold">বয়স * </label>
<input type="text" class="form-control" name="year_old"  value="<?php if($spouse_expect != null): ?> <?php echo e($spouse_expect->year_old); ?> <?php endif; ?>" value placeholder="বয়স *">
<input type="hidden"  name="t_name" value="spouse_expect" placeholder="বয়স *">

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="গাত্রবর্ণ *" class="font-weight-bold">গাত্রবর্ণ * <span class="text-mute">(Required)</span></label>

<select class="form-control" name="color"  id="field_27" data-id="27" data-group="10" placeholder="গাত্রবর্ণ" required>
    <option value>Select</option>
    <option value="কালো" <?php if($spouse_expect != null): ?> <?php if($spouse_expect->color=="কালো"): ?> <?php echo e("Selected"); ?> <?php endif; ?>  <?php endif; ?>>কালো</option>
    <option value="শ্যামলা" <?php if($spouse_expect != null): ?> <?php if($spouse_expect->color=="শ্যামলা"): ?> <?php echo e("Selected"); ?> <?php endif; ?>  <?php endif; ?>>শ্যামলা</option>
    <option value="উজ্জ্বল শ্যামলা" <?php if($spouse_expect != null): ?> <?php if($spouse_expect->color=="উজ্জ্বল শ্যামলা"): ?> <?php echo e("Selected"); ?> <?php endif; ?>  <?php endif; ?>>উজ্জ্বল শ্যামলা</option>
    <option value="ফর্সা" <?php if($spouse_expect != null): ?> <?php if($spouse_expect->color=="ফর্সা"): ?> <?php echo e("Selected"); ?>  <?php endif; ?> <?php endif; ?>>ফর্সা</option>
    <option value="উজ্জ্বল ফর্সা" <?php if($spouse_expect != null): ?> <?php if($spouse_expect->color=="উজ্জ্বল ফর্সা"): ?> <?php echo e("Selected"); ?> <?php endif; ?>  <?php endif; ?>>উজ্জ্বল ফর্সা</option>
    </select>


</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="নূন্যতম উচ্চতা *" class="font-weight-bold">নূন্যতম উচ্চতা * <span class="text-mute">(Required)</span></label>
<input type="text" class="form-control"  name="min_height" value=" <?php if($spouse_expect != null): ?> <?php echo e($spouse_expect->min_height); ?> <?php endif; ?>" placeholder="নূন্যতম উচ্চতা *" required>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="নূন্যতম শিক্ষাগত যোগ্যতা *" class="font-weight-bold">নূন্যতম শিক্ষাগত যোগ্যতা * <span class="text-mute">(Required)</span></label>
<input type="text" class="form-control"  name="min_education" value=" <?php if($spouse_expect != null): ?> <?php echo e($spouse_expect->min_education); ?> <?php endif; ?>"  placeholder="নূন্যতম শিক্ষাগত যোগ্যতা *" required>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="বৈবাহিক অবস্থা *" class="font-weight-bold">বৈবাহিক অবস্থা * <span class="text-mute">(Required)</span></label>
<input type="text" class="form-control"  name="marid_status" value=" <?php if($spouse_expect != null): ?> <?php echo e($spouse_expect->marid_status); ?> <?php endif; ?>"  placeholder="বৈবাহিক অবস্থা *" required>

</div>
</div>
</div>
<div class="card mb-3 class19" data-condtion="19" id="id53">
<div class="card-body">
<div class="form-group">
<label for="জীবনসঙ্গীর পর্দা সম্পর্কে যেমনটা চান-" class="font-weight-bold">জীবনসঙ্গীর পর্দা সম্পর্কে যেমনটা চান- </label>
<input type="text" class="form-control" name="profession" value=" <?php if($spouse_expect != null): ?> <?php echo e($spouse_expect->profession); ?> <?php endif; ?>"  placeholder="জীবনসঙ্গীর পর্দা সম্পর্কে যেমনটা চান-">

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="পেশা *" class="font-weight-bold">পেশা * </label>
<input type="text" class="form-control" name="economic_status"  value=" <?php if($spouse_expect != null): ?> <?php echo e($spouse_expect->economic_status); ?> <?php endif; ?>"   placeholder="পেশা *">

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="অর্থনৈতিক অবস্থা *" class="font-weight-bold">অর্থনৈতিক অবস্থা * <span class="text-mute">(Required)</span></label>
<input type="text" class="form-control"  name="economic_status"  value=" <?php if($spouse_expect != null): ?> <?php echo e($spouse_expect->economic_status); ?> <?php endif; ?>"  placeholder="অর্থনৈতিক অবস্থা *" required>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="পারিবারিক অবস্থা" class="font-weight-bold">পারিবারিক অবস্থা </label>
<input type="text" class="form-control"name="family_status"  value=" <?php if($spouse_expect != null): ?> <?php echo e($spouse_expect->family_status); ?> <?php endif; ?>"  placeholder="পারিবারিক অবস্থা">

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="জীবনসঙ্গীর যে বৈশিষ্ট্য বা গুণাবলী আশা করেন *" class="font-weight-bold">জীবনসঙ্গীর যে বৈশিষ্ট্য বা গুণাবলী আশা করেন * <span class="text-mute">(Required)</span></label>
<textarea colspan="3" rows="2" class="form-control"  name="character_spouse"  placeholder="জীবনসঙ্গীর যে বৈশিষ্ট্য বা গুণাবলী আশা করেন *" required> <?php if($spouse_expect != null): ?> <?php echo e($spouse_expect->character_spouse); ?> <?php endif; ?></textarea>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="জীবনসংঙ্গীর জেলা যেমনটা চাচ্ছেন?" class="font-weight-bold">জীবনসংঙ্গীর জেলা যেমনটা চাচ্ছেন? </label>
<input type="text" class="form-control"  name="spouse_expection" value=" <?php if($spouse_expect != null): ?> <?php echo e($spouse_expect->spouse_expection); ?> <?php endif; ?>" placeholder="জীবনসংঙ্গীর জেলা যেমনটা চাচ্ছেন?">

</div>
</div>
</div>
</div>
</form>
<div class="tab-pane fade " id="tab-18" role="tabpanel" aria-labelledby="tab-18-tab">
<form >
<?php  $ask_authorities =  App\Models\ask_authorities::where(['user_table_id'=>$auth->id])->first()?>
<input type="hidden" name="t_name" value="ask_authorities">
 
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="বায়োডাটা জমা দিচ্ছেন তা অভিভাবক জানেন? *" class="font-weight-bold">বায়োডাটা জমা দিচ্ছেন তা অভিভাবক জানেন? * <span class="text-mute">(Required)</span></label>
<select class="form-control" name="submitted_biodata_allowed"  placeholder="বায়োডাটা জমা দিচ্ছেন তা অভিভাবক জানেন? *" required>
<option value>Select</option>
<option value="1" <?php if($ask_authorities != null): ?> <?php if($ask_authorities->submitted_biodata_allowed=="1"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?> >হ্যা</option>
<option value="0" <?php if($ask_authorities != null): ?> <?php if($ask_authorities->submitted_biodata_allowed=="0"): ?> <?php echo e("Selected"); ?> <?php endif; ?> <?php endif; ?> >না</option>
</select>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="আল্লাহ&#039;র শপথ করে সাক্ষ্য দিন, যে তথ্যগুলো দিচ্ছেন সব সত্য? *" class="font-weight-bold">আল্লাহ&#039;র শপথ করে সাক্ষ্য দিন, যে তথ্যগুলো দিচ্ছেন সব সত্য? * <span class="text-mute">(Required)</span></label>
<select class="form-control" name="is_true_information"   placeholder="আল্লাহ&#039;র শপথ করে সাক্ষ্য দিন, যে তথ্যগুলো দিচ্ছেন সব সত্য? *" required>
<option value>Select</option>
<option value="1"  <?php if($ask_authorities != null): ?>  <?php if($ask_authorities->is_true_information=="1"): ?> <?php echo e("Selected"); ?> <?php endif; ?>  <?php endif; ?>>হ্যা</option>
<option value="0"  <?php if($ask_authorities != null): ?>  <?php if($ask_authorities->is_true_information=="0"): ?> <?php echo e("Selected"); ?> <?php endif; ?>  <?php endif; ?>>না</option>
</select>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="কোনো মিথ্যা তথ্য দিয়ে থাকলে তার দুনিয়াবী ও আখিরাতের দায়ভার ওয়েবসাইট কর্তৃপক্ষ নিবে না। আপনি কি রাজি? *" class="font-weight-bold">কোনো মিথ্যা তথ্য দিয়ে থাকলে তার দুনিয়াবী ও আখিরাতের দায়ভার ওয়েবসাইট কর্তৃপক্ষ নিবে না। আপনি কি রাজি? * <span class="text-mute">(Required)</span></label>
<select class="form-control" name="authority_responsibility"   placeholder="কোনো মিথ্যা তথ্য দিয়ে থাকলে তার দুনিয়াবী ও আখিরাতের দায়ভার ওয়েবসাইট কর্তৃপক্ষ নিবে না। আপনি কি রাজি? *" required>
<option value>Select</option>
<option value="1"  <?php if($ask_authorities != null): ?>  <?php if($ask_authorities->authority_responsibility=="1"): ?> <?php echo e("Selected"); ?> <?php endif; ?>  <?php endif; ?>>হ্যা</option>
<option value="0"  <?php if($ask_authorities != null): ?>  <?php if($ask_authorities->authority_responsibility=="0"): ?> <?php echo e("Selected"); ?> <?php endif; ?>  <?php endif; ?>>না</option>
</select>

</div>
</div>
</div>
</div>
</form>
<div class="tab-pane fade " id="tab-19" role="tabpanel" aria-labelledby="tab-19-tab">
<form >
    <?php  $communication =  App\Models\communication::where(['user_table_id'=>$auth->id])->first() ?>

<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="অভিভাবকের নাম্বার *" class="font-weight-bold">অভিভাবকের নাম্বার * </label>
<input type="text" class="form-control" value=" <?php if($communication != null): ?> <?php echo e($communication->parent_number); ?> <?php endif; ?>"  name="parent_number"  placeholder="অভিভাবকের নাম্বার *">

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="যার নাম্বার লিখেছেন *" class="font-weight-bold">যার নাম্বার লিখেছেন * <span class="text-mute">(Required)</span></label>
<input type="text" class="form-control" name="who_wrote_number" value=" <?php if($communication != null ): ?> <?php echo e($communication->who_wrote_number); ?> <?php endif; ?>"   placeholder="যার নাম্বার লিখেছেন *" required>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="বায়োডাটা গ্রহণের ই-মেইল এড্রেস *" class="font-weight-bold">বায়োডাটা গ্রহণের ই-মেইল এড্রেস * <span class="text-mute">(Required)</span></label>
<input type="text" class="form-control"  name="email_recived_biodata"  value=" <?php if($communication != null ): ?> <?php echo e($communication->email_recived_biodata); ?> <?php endif; ?>"  placeholder="বায়োডাটা গ্রহণের ই-মেইল এড্রেস *" required>

</div>
</div>
</div>
<div class="card mb-3 class" data-condtion id="id">
<div class="card-body">
<div class="form-group">
<label for="আপনার নাম্বার (শুধুমাত্র আপনি ও কতৃপক্ষ বাদে কেউ দেখতে পাচ্ছে না) *" class="font-weight-bold">আপনার নাম্বার (শুধুমাত্র আপনি ও কতৃপক্ষ বাদে কেউ দেখতে পাচ্ছে না) * <span class="text-mute">(Required)</span></label>
<input type="text" class="form-control"  name="number_visible_authority"  value=" <?php if($communication != null ): ?> <?php echo e($communication->number_visible_authority); ?> <?php endif; ?>"   placeholder="আপনার নাম্বার (শুধুমাত্র আপনি ও কতৃপক্ষ বাদে কেউ দেখতে পাচ্ছে না) *" required />
<input type="hidden" name="t_name" value="communication">
</div>
</div>
</div>
</div>
</form>
</div>

<div class="saving-btn mb-3">
<ul class="list-inline d-flex justify-content-between">
<li><a href="<?php echo e(URL::to("/is_permition_for_public")); ?>" id="publish_btn"  class="d-none btn btn-warning btn-sm bg-info">বায়োডাটা পাবলিশ করুন</a></li>
<li><button type="button" class="btn btn-warning btn-sm bg-success" id="data__submit" onclick="save_biodata();">সেভ করুন</button></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("Js_link"); ?>
<script>




   async  function handle_sign_up (){
    let User = document.forms['signup_form'].elements;          
    for (const iterator of User) {
        iterator.style.border=''
         if(iterator.name !='gender' && iterator.value==''  ){
            if(iterator.dataset.message !=undefined){
            Toast.fire({ icon: 'error', title: `${iterator.dataset.message}`, })
            iterator.style.border='1px solid red';
            return false
        }
    }       
    }
     if(User.gender.value != 'male' && User.gender.value != 'female') {
         Toast.fire({ icon: 'error', title: `Select Gender`, })
         return false;
     }


     try {
        const response = await fetch(`/signup_user`,{
        method:'POST',
        body:JSON.stringify(Object.fromEntries(new FormData( document.forms['signup_form']))),
        headers: new Headers({
        'Content-Type': 'application/json',
        })
    })

    const result = await response.json();
    console.log(result)
    if(result.condition==true){
        Toast.fire({ icon: 'success', title: result.message, })
      
    }else{
        Toast.fire({ icon: 'error', title: result.message, })
    }

} catch (error) {
    Toast.fire({ icon: 'error', title: `Something Went wrong`, })
            
        }
    }

 async   function save_biodata(){
        let tabContent =  document.getElementById("biodata-tabContent").getElementsByClassName("show")[0]
        let form =  tabContent.children[0]
        try {
        const response = await fetch(`/add_or_edit_biodata`,{
        method:'POST',
        body:JSON.stringify(Object.fromEntries(new FormData(form))),
        headers: new Headers({
        'Content-Type': 'application/json',
        })
    })

    const result = await response.json();
    if(result.condition==true){
        Toast.fire({ icon: 'success', title: result.message, })
        if(tabContent.nextElementSibling != null){
        tabContent.nextElementSibling.classList.add("active","show")
        tabContent.classList.remove("active","show")
        document.getElementById(`tab-${tabContent.id.split('-')[1]}-tab`).classList.remove("active")
        document.getElementById(`tab-${ tabContent.nextElementSibling.id.split('-')[1]}-tab`).classList.add("active")     
        }else{
            document.getElementById("publish_btn").classList.remove("d-none")
        }
      
    }else{
        Toast.fire({ icon: 'error', title: result.message, })
    }

} catch (error) {
    Toast.fire({ icon: 'error', title: `Something Went wrong`, })
            
        }


}
   
function handle_birth_day(e){
   
    console.log( e.type)
    // e.type='date'
    if(e.type=='text'){
        e.type = 'date';
    }else{
        e.type='text';
        console.log(e.value)
    }

return 

if(isValidDate(e.value.trim()) != true){
    e.value='';
    e.nextElementSibling.classList.remove("d-none")
}else{
    e.value=e.value.trim();
    e.nextElementSibling.classList.add("d-none")
}

}

function isValidDate(dateString) {
  var regEx = /^\d{4}-\d{2}-\d{2}$/;
console.log( dateString.split("-")[1]);
if(dateString.split("-")[1] > 12) return false;
if(dateString.split("-")[3] > 31) return false;
  return dateString.match(regEx) != null;
}
   

</script>
<?php if(session('condition') == true): ?>
    <script>
        
var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })

        Toast.fire({ icon: 'success', title: `Successful`, })
    </script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("master.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ordhang1/public_html/resources/views/pages/dashboardedit.blade.php ENDPATH**/ ?>