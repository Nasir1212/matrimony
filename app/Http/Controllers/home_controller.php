<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\primary_info;
use App\Models\iom_info;
use App\Models\general_info;
use App\Models\address;
use App\Models\education_info;
use App\Models\family_info;
use App\Models\personal_info;
use App\Models\marriage_info;
use App\Models\other_info;
use App\Models\spouse_expect;
use App\Models\ask_authorities;
use App\Models\communication;
use App\Models\session_Id;
use App\Models\visitor;
use App\Models\favorite;
use App\Models\client_contact;
use App\Models\purchase_package;
use App\Models\package_connection_buy;
use Illuminate\Support\Facades\Mail;
class home_controller extends Controller
{
  public function add_or_edit_biodata(Request $req){
  
  
    $user_id = Register::where(['mail'=>$req->session()->get('email')])->get('id')[0]->id;
    if( Register::where(['id'=>$user_id,'is_permition'=>1])->count() > 0){
        Register::where(['id'=>$user_id,])->update([ 'is_update'=>1]);
    }
   //primary info
   $result=false;
    if($req->t_name=='primary_info'){

        if(primary_info::where(['user_table_id'=>$user_id])->count() ==1){
         $result =    primary_info::where(['user_table_id'=>$user_id])->update([
                'user_name'=>$req->user_name,
                'search_type'=>$req->search_type,
                'date_of_birth'=>$req->date_of_birth,
                'nationality'=>$req->nationality,
                'district'=>$req->district,
                
            ]);
        }else{
            $result =    primary_info::insert([
                'user_name'=>$req->user_name,
                'search_type'=>$req->search_type,
                'date_of_birth'=>$req->date_of_birth,
                'district'=>$req->district,
                'nationality'=>$req->nationality,
                'user_table_id'=> $user_id,
                
            ]);
        }

        //imo info
    }else if($req->t_name=='iom_info'){
        if(iom_info::where(['user_table_id'=>$user_id])->count() ==1){
            $result =    iom_info::where(['user_table_id'=>$user_id])->update([
                'full_name'=>$req->full_name,
                'is_iom_student'=>$req->is_iom_student, 
                'roll_no'=>$req->roll_no,
                'course_and_batch_no'=>$req->course_and_batch_no,
                   
               ]);
              
           }else{
               $result =  iom_info::insert([
                'full_name'=>$req->full_name,
                'is_iom_student'=>$req->is_iom_student,
                'user_table_id'=>$req->user_table_id,
                'roll_no'=>$req->roll_no,
                'course_and_batch_no'=>$req->course_and_batch_no,
                'user_table_id'=>$user_id,
                   
               ]);
           }
   
    }
    else if($req->t_name=='general_info'){
        if(general_info::where(['user_table_id'=>$user_id])->count() ==1){
            $result =    general_info::where(['user_table_id'=>$user_id])->update([
                'biodata_type'=>$req->biodata_type,
                'marid_type'=>$req->marid_type,
                'present_address'=>$req->present_address,
                'divition'=>$req-> divition,
                'permanent_address'=>$req->permanent_address,
                'permanent_divition'=>$req->permanent_divition,
                'birth'=>$req->birth,
                'color'=>$req->color,
                'height'=>$req->height,
                'weight'=>$req->weight,
                'blood_group'=>$req->blood_group,
                'profession'=>$req->profession,
                'monthly_income'=>$req->monthly_income	,
                   
               ]);
              
           }else{
               $result =  general_info::insert([
                'biodata_type'=>$req->biodata_type,
                'marid_type'=>$req->marid_type,
                'present_address'=>$req->present_address,
                'divition'=>$req->divition,
                'permanent_address'=>$req->permanent_address,
                'permanent_divition'=>$req->permanent_divition,
                'birth'=>$req->birth,
                'color'=>$req->color,
                'height'=>$req->height,
                'weight'=>$req->weight,
                'blood_group'=>$req->blood_group,
                'profession'=>$req->profession,
                'monthly_income'=>$req->monthly_income,
                'user_table_id'=>$user_id,
                   
               ]);
               
           }
         
    }

    else if($req->t_name=='address'){
        if(address::where(['user_table_id'=>$user_id])->count() ==1){
            $result = address::where(['user_table_id'=>$user_id])->update([
                'present_address'=>$req->present_address,
                'growing_up'=>$req->growing_up,
                'permanent_address'=>$req->permanent_address,
                   
               ]);
              
           }else{
               $result =  address::insert([
                'present_address'=>$req->present_address,
                'growing_up'=>$req->growing_up,
                'permanent_address'=>$req->permanent_address,
                'user_table_id'=>$user_id,
                   
               ]);
               
           }
         
    }
    else if($req->t_name=='education_info'){
        if(education_info::where(['user_table_id'=>$user_id])->count() ==1){
            $result = education_info::where(['user_table_id'=>$user_id])->update([
                'education_type'=>$req->education_type,
                'is_hafez'=>$req->is_hafez,
                'is_passed_dawrae_hadith'=>$req->is_passed_dawrae_hadith,
                'is_passed_ssc'=>$req->is_passed_ssc,
                'result_ssc'=>$req->result_ssc,
                'divition_ssc'=>$req->divition_ssc,
                'ssc_passed_year'=>$req->ssc_passed_year,
                'is_passed_hsc'=>$req->is_passed_hsc,
                'divition_hsc'=>$req->divition_hsc,
                'result_hsc'=>$req->result_hsc,
                'hsc_passed_year'=>$req->hsc_passed_year,
                'honours_passed'=>$req->honours_passed,
                'honours_passed_year'=>$req->honours_passed_year,
                'highest_education'=>$req->highest_education,
                'other_education'=>$req->other_education,    
                'institute_name'=>$req->institute_name,    
               ]);
              
           }else{
               $result =  education_info::insert([
                'education_type'=>$req->education_type,
                'is_hafez'=>$req->is_hafez,
                'is_passed_dawrae_hadith'=>$req->is_passed_dawrae_hadith,
                'is_passed_ssc'=>$req->is_passed_ssc,
                'result_ssc'=>$req->result_ssc,
                'divition_ssc'=>$req->divition_ssc,
                'ssc_passed_year'=>$req->ssc_passed_year,
                'is_passed_hsc'=>$req->is_passed_hsc,
                'divition_hsc'=>$req->divition_hsc,
                'result_hsc'=>$req->result_hsc,
                'hsc_passed_year'=>$req->hsc_passed_year,
                'honours_passed'=>$req->honours_passed,
                'honours_passed_year'=>$req->honours_passed_year,
                'highest_education'=>$req->highest_education,
                'other_education'=>$req->other_education,
                'institute_name'=>$req->institute_name,
                'user_table_id'=>$user_id,
                   
               ]);
               
           } 
    }

    else if($req->t_name=='family_info'){
      
        if(family_info::where(['user_table_id'=>$user_id])->count() ==1){
            $result = family_info::where(['user_table_id'=>$user_id])->update([
                'father_name'=>$req->father_name,
                'mother_name'=>$req->mother_name,
                'profession_father'=>$req->profession_father,
                'profession_mother'=>$req->profession_mother,
                'sister'=>$req->sister,
                'borther'=>$req->borther,
                'uncle'=>$req->uncle,
                'economic_social_status'=>$req->economic_social_status,
                'islamic_status'=>$req->islamic_status,
                'info_sister'=>$req->info_sister,
                'info_broter'=>$req->info_broter,
               ]);
              
           }else{
               $result =  family_info::insert([
                'father_name'=>$req->father_name,
                'mother_name'=>$req->mother_name,
                'profession_father'=>$req->profession_father,
                'profession_mother'=>$req->profession_mother,
                'sister'=>$req->sister,
                'borther'=>$req->borther,
                'uncle'=>$req->uncle,
                'economic_social_status'=>$req->economic_social_status,
                'islamic_status'=>$req->islamic_status,
                'info_sister'=>$req->info_sister,
                'info_broter'=>$req->info_broter,
                'user_table_id'=>$user_id,
                   
               ]);
               
           } 
    }
    else if($req->t_name=='personal_info'){
        if(personal_info::where(['user_table_id'=>$user_id])->count() ==1){
            $result = personal_info::where(['user_table_id'=>$user_id])->update([
                'beard'=>$req->beard,
                'ankle'=>$req->ankle,
                'prayer'=>$req->prayer,
                'prayer_year'=>$req->prayer_year,
                'mahram_comply'=>$req->mahram_comply,
                'recite_quran'=>$req->recite_quran,
                'wearing_type'=>$req->wearing_type,
                'political_philosophy'=>$req->political_philosophy,
                'entertainment'=>$req->entertainment,
                'disease'=>$req->disease,
                'involved_religion'=>$req->involved_religion,
                'follower_pir'=>$req->follower_pir,
                'shrines'=>$req->shrines,
                'islamic_books'=>$req->islamic_books,
                'scholars_name'=>$req->scholars_name,
                'special_qualifications'=>$req->special_qualifications,
                'write_yourself'=>$req->write_yourself,
                'options_apply'=>$req->options_apply,
                'mazhab'=>$req->mazhab,
                'save_eye'=>$req->save_eye,
                'future_plane'=>$req->future_plane,
                'spend_free_time'=>$req->spend_free_time,
                'congregation_pray'=>$req->congregation_pray,
                'responsibilities_home'=>$req->responsibilities_home,
                'smoking'=>$req->smoking,
               ]);
              
           }else{
               $result =  personal_info::insert([
                'beard'=>$req->beard,
                'ankle'=>$req->ankle,
                'prayer'=>$req->prayer,
                'prayer_year'=>$req->prayer_year,
                'mahram_comply'=>$req->mahram_comply,
                'recite_quran'=>$req->recite_quran,
                'wearing_type'=>$req->wearing_type,
                'political_philosophy'=>$req->political_philosophy,
                'entertainment'=>$req->entertainment,
                'disease'=>$req->disease,
                'involved_religion'=>$req->involved_religion,
                'follower_pir'=>$req->follower_pir,
                'shrines'=>$req->shrines,
                'islamic_books'=>$req->islamic_books,
                'scholars_name'=>$req->scholars_name,
                'special_qualifications'=>$req->special_qualifications,
                'write_yourself'=>$req->write_yourself,
                'options_apply'=>$req->options_apply,
                'mazhab'=>$req->mazhab,
                'save_eye'=>$req->save_eye,
                'future_plane'=>$req->future_plane,
                'spend_free_time'=>$req->spend_free_time,
                'congregation_pray'=>$req->congregation_pray,
                'responsibilities_home'=>$req->responsibilities_home,
                'smoking'=>$req->smoking,
                'user_table_id'=>$user_id,
                   
               ]);
               
           } 
    }
    else if($req->t_name=='marriage_info'){
        if(marriage_info::where(['user_table_id'=>$user_id])->count() ==1){
            $result = marriage_info::where(['user_table_id'=>$user_id])->update([
                'is_agree'=>$req->is_agree,
                'thought_marriage'=>$req->thought_marriage,
                'selection_mind'=>$req->selection_mind,
               ]);
              
           }else{
               $result =  marriage_info::insert([
                'is_agree'=>$req->is_agree,
                'thought_marriage'=>$req->thought_marriage,
                'selection_mind'=>$req->selection_mind,
                'user_table_id'=>$user_id,
                   
               ]);
               
           } 
    }
    else if($req->t_name=='other_info'){
        if(other_info::where(['user_table_id'=>$user_id])->count() ==1){
            $result = other_info::where(['user_table_id'=>$user_id])->update([
                'asking'=>$req->asking,
                'profession'=>$req->profession,
               ]);
              
           }else{
               $result =  other_info::insert([
                'asking'=>$req->asking,
                'profession'=>$req->profession,
                'user_table_id'=>$user_id,
                   
               ]);
               
           } 
    }
    else if($req->t_name=='spouse_expect'){
        if( spouse_expect::where(['user_table_id'=>$user_id])->count() ==1){
            $result =  spouse_expect::where(['user_table_id'=>$user_id])->update([
                'year_old'=>$req->year_old,
                'color'=>$req->color,
                'min_height'=>$req->min_height,
                'min_education'=>$req->min_education,
                'marid_status'=>$req->marid_status,
                'profession'=>$req->profession,
                'economic_status'=>$req->economic_status,
                'family_status'=>$req->family_status,
                'spouse_expection'=>$req->spouse_expection,
                'character_spouse'=>$req->character_spouse,
               ]);
              
           }else{
               $result =   spouse_expect::insert([
                'year_old'=>$req->year_old,
                'color'=>$req->color,
                'min_height'=>$req->min_height,
                'min_education'=>$req->min_education,
                'marid_status'=>$req->marid_status,
                'profession'=>$req->profession,
                'economic_status'=>$req->economic_status,
                'family_status'=>$req->family_status,
                'spouse_expection'=>$req->spouse_expection,
                'character_spouse'=>$req->character_spouse,
                'user_table_id'=>$user_id,
                   
               ]);
               
           } 
    }
    else if($req->t_name=='communication'){
        if( communication::where(['user_table_id'=>$user_id])->count() ==1){
            $result =  communication::where(['user_table_id'=>$user_id])->update([
                'parent_number'=>$req->parent_number,
                'who_wrote_number'=>$req->who_wrote_number,
                'email_recived_biodata'=>$req->email_recived_biodata,
                'number_visible_authority'=>$req->number_visible_authority,
               ]);
              
           }else{
               $result =   communication::insert([
                'parent_number'=>$req->parent_number,
                'who_wrote_number'=>$req->who_wrote_number,
                'email_recived_biodata'=>$req->email_recived_biodata,
                'number_visible_authority'=>$req->number_visible_authority,
                'user_table_id'=>$user_id,
                   
               ]);
               
           } 
    }
    else if($req->t_name=='ask_authorities'){
        if( ask_authorities::where(['user_table_id'=>$user_id])->count() ==1){
            $result =  ask_authorities::where(['user_table_id'=>$user_id])->update([
                'submitted_biodata_allowed'=>$req->submitted_biodata_allowed,
                'is_true_information'=>$req->is_true_information,
                'authority_responsibility'=>$req->authority_responsibility,
               ]);
              
           }else{
               $result =   ask_authorities::insert([
                'submitted_biodata_allowed'=>$req->submitted_biodata_allowed,
                'is_true_information'=>$req->is_true_information,
                'authority_responsibility'=>$req->authority_responsibility,
                'user_table_id'=>$user_id,
                   
               ]);
               
           } 
    }
    if($result){
          
        return json_encode(['condition'=>true,'message'=>'Successfully']);
     }else{
        return json_encode(['condition'=>false,'message'=>' failed']);
     }

  }

  public static function show_random_biodata(){

   return  \DB::select("SELECT  general_info.biodata_type, primary_info.user_name, general_info.marid_type,general_info.birth,general_info.profession,general_info.user_table_id ,districts.bn_name AS present_address FROM general_info LEFT JOIN districts ON districts.id = general_info.present_address LEFT JOIN primary_info ON primary_info.user_table_id = general_info.user_table_id LEFT JOIN user ON user.id = general_info.user_table_id  WHERE user.is_publish=1  ORDER BY RAND () Limit 6 ");


  }

  public static function latest_biodata(){
    return \DB::select("SELECT general_info.biodata_type,  general_info.user_table_id, primary_info.user_name  FROM user LEFT JOIN general_info ON general_info.user_table_id = user.id  LEFT JOIN primary_info ON primary_info.user_table_id = user.id WHERE user.is_publish=1  ORDER BY  user.id desc Limit 20 ");
  }

  public static function biodata(Request $req){
    //  return $req;
  
  
    if($req->type =="filter_box"){
if(isset($req->biodata_type) && isset($req->minimumages)   && isset($req->maximumages)  && isset($req->biodata_type)  && isset($req->marital_status)  && isset($req->district)){}

    $searching_data =   \DB::select("SELECT DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), primary_info.date_of_birth)), '%Y')+0 AS years, general_info.biodata_type, primary_info.user_name, general_info.marid_type,general_info.birth,general_info.profession,general_info.user_table_id ,districts.bn_name AS present_address FROM general_info LEFT JOIN districts ON districts.id = general_info.present_address LEFT JOIN primary_info ON primary_info.user_table_id = general_info.user_table_id LEFT JOIN user ON user.id = general_info.user_table_id  WHERE user.is_publish=1 AND general_info.biodata_type = $req->biodata_type AND   general_info.marid_type = '$req->marital_status' AND  general_info.present_address LIKE  '%$req->district%' AND $req->minimumages <= DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), primary_info.	date_of_birth)), '%Y')+0 AND DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), primary_info.	date_of_birth)), '%Y')+0 <= $req->maximumages");
    if(count($searching_data) >0){
        return view('pages.search_biodata',['searching_data'=>$searching_data]);

    }else{
        $searching_data =    \DB::select("SELECT DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), primary_info.date_of_birth)), '%Y')+0 AS years, general_info.biodata_type, primary_info.user_name, general_info.marid_type,general_info.birth,general_info.profession,general_info.user_table_id ,districts.bn_name AS present_address FROM general_info LEFT JOIN districts ON districts.id = general_info.present_address LEFT JOIN primary_info ON primary_info.user_table_id = general_info.user_table_id LEFT JOIN user ON user.id = general_info.user_table_id LEFT JOIN  personal_info ON  personal_info.user_table_id =general_info.user_table_id LEFT JOIN  education_info ON  education_info.user_table_id = general_info.user_table_id  WHERE general_info.biodata_type = '$req->biodata_type' AND   user.is_publish=1 ORDER BY RAND () ");
        return view('pages.search_biodata',['searching_data'=>$searching_data]);
    }

    }else if ($req->type =="Advancefilter"){
       $ages =   explode(';',$req->age);
        // return $req;
    //   return general_info::where(['biodata_type'=>$req->biodata_type])->get();


//    return \DB::select("SELECT DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), primary_info.date_of_birth)), '%Y')+0 AS years FROM general_info LEFT JOIN districts ON districts.id = general_info.present_address LEFT JOIN primary_info ON primary_info.user_table_id = general_info.user_table_id LEFT JOIN user ON user.id = general_info.user_table_id LEFT JOIN  personal_info ON  personal_info.user_table_id =general_info.user_table_id LEFT JOIN  education_info ON  education_info.user_table_id = general_info.user_table_id  WHERE user.is_publish=1 AND general_info.biodata_type LIKE  '%$req->biodata_type%' AND  general_info.marid_type LIKE  '%$req->marital_status%' AND  general_info.present_address LIKE  '%$req->p__address%' AND  general_info.permanent_address LIKE '%$req->pm__address%' AND general_info.height LIKE '%$req->height%' AND general_info.color LIKE '%$req->personal_skins%' AND personal_info.options_apply LIKE '%$req->expected_people%' AND general_info.profession LIKE  '%$req->occupation%' AND education_info.education_type LIKE '%$req->education%' ");

       $searching_data =  \DB::select("SELECT DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), primary_info.date_of_birth)), '%Y')+0 AS years, general_info.biodata_type, primary_info.user_name, general_info.marid_type,general_info.birth,general_info.profession,general_info.user_table_id ,districts.bn_name AS present_address FROM general_info LEFT JOIN districts ON districts.id = general_info.present_address LEFT JOIN primary_info ON primary_info.user_table_id = general_info.user_table_id LEFT JOIN user ON user.id = general_info.user_table_id LEFT JOIN  personal_info ON  personal_info.user_table_id =general_info.user_table_id LEFT JOIN  education_info ON  education_info.user_table_id = general_info.user_table_id  WHERE user.is_publish=1 AND general_info.biodata_type LIKE  '%$req->biodata_type%' AND  general_info.marid_type LIKE  '%$req->marital_status%' AND  general_info.present_address LIKE  '%$req->p__address%' AND  general_info.permanent_address LIKE '%$req->pm__address%' AND general_info.height LIKE '%$req->height%' AND general_info.color LIKE '%$req->personal_skins%' AND personal_info.options_apply LIKE '%$req->expected_people%' AND general_info.profession LIKE  '%$req->occupation%' AND education_info.education_type LIKE '%$req->education%' AND $ages[0] <= DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), primary_info.date_of_birth)), '%Y')+0 AND DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), primary_info.date_of_birth)), '%Y')+0 <= $ages[1]");
       return view('pages.search_biodata',['searching_data'=>$searching_data]);

    }else if($req->type =="all"){
        $searching_data =  \DB::select("SELECT DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), primary_info.date_of_birth)), '%Y')+0 AS years, general_info.biodata_type, primary_info.user_name, general_info.marid_type,general_info.birth,general_info.profession,general_info.user_table_id ,districts.bn_name AS present_address FROM general_info LEFT JOIN districts ON districts.id = general_info.present_address LEFT JOIN primary_info ON primary_info.user_table_id = general_info.user_table_id LEFT JOIN user ON user.id = general_info.user_table_id LEFT JOIN  personal_info ON  personal_info.user_table_id =general_info.user_table_id LEFT JOIN  education_info ON  education_info.user_table_id = general_info.user_table_id  WHERE user.is_publish=1 ORDER BY RAND () ");
        return view('pages.search_biodata',['searching_data'=>$searching_data]);
    }

  }

  public function show_biodata ($id ){
   $session_id =  $_SERVER['REMOTE_ADDR'];

  if(session_Id::where(['session_id'=>$session_id])->count()==0){
   $session_t_id =   session_Id::insertGetId(['session_id'=>$session_id]);
    
  if(visitor::where(['user_table_id'=>$id])->count() == 0){
    visitor::insert([
        'user_table_id'=>$id,
        'session_arr'=>$session_t_id.","
      ]);
  }else{
   $all_visitor =  visitor::where(['user_table_id'=>$id])->get()[0]->session_arr; 
   visitor::where(['user_table_id'=>$id])->update([
    "session_arr"=>$all_visitor.$session_t_id.","
   ]);
}
//return visitor::where(['user_table_id'=>$id])->where("session_arr","LIKE","%$session_t_id,%")->get()[0]->session_arr;


  }else{
   $session_id =  session_Id::where(['session_id'=>$session_id])->get()[0]->id;
   $all_visitor =  visitor::where(['user_table_id'=>$id])->get();
     if( count($all_visitor) ==0 ){
        visitor::insert([
            'user_table_id'=>$id,
            'session_arr'=>$session_id.","
          ]);
     }
  else if(visitor::where(['user_table_id'=>$id])->where("session_arr","LIKE","%$session_id,%")->count() ==0){
   
    $all_visitor =  $all_visitor[0]->session_arr;
    visitor::where(['user_table_id'=>$id])->update([
        "session_arr"=>$all_visitor.$session_id.","
       ]);
   }
  
  }
  $session_id =  session_Id::where(['session_id'=>$_SERVER['REMOTE_ADDR']])->get()[0]->id;
 $total_visitor =  visitor::where(['user_table_id'=>$id])->where("session_arr","LIKE","%$session_id,%")->get();

    return view('pages.show_biodata',['total_visitor'=>$total_visitor[0]->session_arr,'biodata_id'=>$id]);
  }

  public static function show_ai_biodata(){
    $user_id = Register::where(['mail'=>\Session()->get('email')])->get('id')[0]->id;
    $general_info = general_info::where(['user_table_id'=>$user_id])->first();
    if($general_info != null ){
    return  \DB::select("SELECT  general_info.biodata_type, primary_info.user_name, general_info.marid_type,general_info.birth,general_info.profession,general_info.user_table_id ,districts.bn_name AS present_address FROM general_info LEFT JOIN districts ON districts.id = general_info.present_address LEFT JOIN primary_info ON primary_info.user_table_id = general_info.user_table_id LEFT JOIN user ON user.id = general_info.user_table_id  WHERE user.is_publish=1 AND general_info.profession = '$general_info->profession'  AND  general_info.permanent_address = '$general_info->permanent_address' ORDER BY RAND ()");
    }else {
        return [];
    }
  }
  
  public static function show_favorite(){
    $user_id = Register::where(['mail'=>\Session()->get('email')])->get('id')[0]->id;
    return \DB::select("SELECT favorite.id AS  favorite_id,  general_info.biodata_type,general_info.user_table_id, primary_info.user_name FROM favorite LEFT JOIN general_info ON general_info.user_table_id = favorite.favorited LEFT JOIN primary_info ON primary_info.user_table_id =  favorite.favorited WHERE favorite.favoriter = $user_id ");

  }

  public static function show_favorited_list(){
    $user_id = Register::where(['mail'=>\Session()->get('email')])->get('id')[0]->id;
    return \DB::select("SELECT favorite.id AS  favorite_id,  general_info.biodata_type,general_info.user_table_id, primary_info.user_name FROM favorite LEFT JOIN general_info ON general_info.user_table_id = favorite.favoriter LEFT JOIN primary_info ON primary_info.user_table_id =  favorite.favoriter WHERE favorite.favorited = $user_id ");

  }


  public function delete_favorite($id){
   $result =  favorite::where(['id'=>$id])->delete();
   if($result){
    return redirect('/favoritelist')->with('status', 'Deleted successfully');
   }else{
    return redirect('/favoritelist')->with('status', 'Deleted Failed');
   }

  }

  public function profile_update(Request $req){
   
     if(empty($req->password) == true  &&  empty($req->password_confirmation) == true){
        $result =  Register::where(['mail'=>$req->session()->get('email')])->update([
            'gender'=>$req->gender,
         
        ]);

        if( $result){
            return redirect('/userprofile')->with(['message'=>'Updated successfully','condition'=>true]);

        }else{
            return redirect('/userprofile')->with(['message'=>'Updated Failed','condition'=>false]);
        }
     }else{

    
    if($req->password != $req->password_confirmation ){
          return redirect('/userprofile')->with(['message'=>'Password and confirm password not match','condition'=>false]);
    }else if (strlen($req->password) <=0){
        return redirect('/userprofile')->with(['message'=>'Enter Password','condition'=>false]);
    }else if( $req->password == $req->password_confirmation){
       $result =  Register::where(['mail'=>$req->session()->get('email')])->update([
            'gender'=>$req->gender,
            'password'=>md5($req->password)
        ]);

        if( $result){
            return redirect('/userprofile')->with(['message'=>'Updated successfully','condition'=>true]);

        }else{
            return redirect('/userprofile')->with(['message'=>'Updated Failed','condition'=>false]);
        }
    }
}
  }

  public function client_contact_save(Request $req){
    if(strlen($req->name) <=0 || strlen($req->email) <=0 || strlen($req->subject) <=0 || strlen($req->message) <=0  ){
        return redirect('/contact')->with(['message'=>'Please ! Insert all input field','condition'=>false]);
  }else {
    $result =  client_contact::insert([
        'name'=>$req->name,
        'email'=>$req->email,
        'subject'=>$req->subject,
        'message'=>$req->message
    ]);

    if( $result){
        return redirect('/contact')->with(['message'=>'Submited successfully','condition'=>true]);

    }else{
        return redirect('/contact')->with(['message'=>'Submited Failed','condition'=>false]);
    }

}

  }

  public function purchaselist(){
    $user_id = Register::where(['mail'=>\session()->get('email')])->get('id')[0]->id;
    $package =  \DB::select("SELECT communication.parent_number ,communication.user_table_id,communication.who_wrote_number,communication.email_recived_biodata,communication.number_visible_authority, primary_info.user_name AS purchased_name,general_info.biodata_type  FROM purchase_package LEFT JOIN primary_info ON primary_info.user_table_id = purchase_package.purchased LEFT JOIN general_info ON general_info.user_table_id = purchase_package.purchased LEFT JOIN user ON  user.id = purchase_package.purchaser  LEFT JOIN  communication ON  communication.user_table_id =  purchase_package.purchased WHERE purchase_package.purchaser ='$user_id' AND  purchase_package.purchased  REGEXP '^[0-9]' ");
    $dual_package =  package_connection_buy::where(['purchaser'=>$user_id])->get();
   return view("pages.purchaselist",['package'=>$package,'dual_package'=>$dual_package ]);
  }

  public function logout(){
    \Session()->flush();
    return redirect('/');
  }

  public function success_callback_url(Request $req){

    
    if($req->status=="success"){
       
        
         $request_data = array(
            'app_key'=>env("BKASH_APP_KEY"),
            'app_secret'=>env("BKASH_APP_SEC")
               );	
        $url = curl_init('https://tokenized.pay.bka.sh/v1.2.0-beta/tokenized/checkout/token/grant');
        $request_data_json=json_encode($request_data);
        $header = array(
              'Content-Type:application/json',
              'username:'.env("BKASH_USER_NAME"),			
              'password:'.env("BKASH_PASSWORD")
              );				
        curl_setopt($url,CURLOPT_HTTPHEADER, $header);
        curl_setopt($url,CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url,CURLOPT_POSTFIELDS, $request_data_json);
        curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        
        $result_data =  curl_exec($url);
        curl_close($url);
        
         $response = json_decode($result_data);
        
          $requestbody = array(
                'paymentID' => $req->paymentID,
            );
            $url = curl_init('https://tokenized.pay.bka.sh/v1.2.0-beta/tokenized/checkout/execute');  
            $requestbodyJson = json_encode($requestbody);
            
            $header = array(
            'Content-Type:application/json',
            'Authorization:'.$response->id_token,
            'X-APP-Key:'.env("BKASH_APP_KEY")
                );

            curl_setopt($url, CURLOPT_HTTPHEADER, $header);
            curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($url, CURLOPT_POSTFIELDS, $requestbodyJson);
            curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            $resultdata = curl_exec($url);
            curl_close($url);
           $res_array = json_decode($resultdata);
           
            $result = null;
            
          if($res_array->transactionStatus == 'Completed'){
             $user_id = Register::where(['mail'=>$req->session()->get('email')])->get('id')[0]->id;
             $result =   purchase_package::insert([
            'payment_id'=>$req->paymentID,
            'purchased'=>\Session()->get('purchased_id'),
            'purchaser'=>$user_id,
            'money'=>\Session()->get('money'),
            'payment_date'=>date("Y-m-d h:i:s A")
        ]);
                  
            
        }
        

        if( $result){
            return redirect("show_biodata/".\Session()->get('purchased_id'))->with(['message'=>'আপনার পেমেন্ট টি সফল হয়েছে ','condition'=>true]);
    
        }else{
            return redirect("show_biodata/".\Session()->get('purchased_id'))->with(['message'=>'দুখিত কর্তৃপক্ষের সাথে যোগাযোগ করুন','condition'=>false]);
        }
    }else if($req->status=="failure"){
        return redirect("show_biodata/".\Session()->get('purchased_id'))->with(['message'=>'আপনার পেমেন্টটি সফল হয়নি । ফেইল হয়েছে ।','condition'=>false]);
    }else if($req->status=="cancel"){
        return redirect("show_biodata/".\Session()->get('purchased_id'))->with(['message'=>'আপনার পেমেন্টটি কেনসেল হয়েছে ।','condition'=>false]);
    }else{
        return redirect("show_biodata/".\Session()->get('purchased_id'))->with(['message'=>'আপনি আবার চেষ্ট করুন ।','condition'=>false]);
    }
  
  }

  
  public function package_connection_callback_url(Request $req){

    // return $req;
    if($req->status=="success"){
        
        
          $request_data = array(
            'app_key'=>env("BKASH_APP_KEY"),
            'app_secret'=>env("BKASH_APP_SEC")
               );	
        $url = curl_init('https://tokenized.pay.bka.sh/v1.2.0-beta/tokenized/checkout/token/grant');
        $request_data_json=json_encode($request_data);
        $header = array(
              'Content-Type:application/json',
              'username:'.env("BKASH_USER_NAME"),			
              'password:'.env("BKASH_PASSWORD")
              );				
        curl_setopt($url,CURLOPT_HTTPHEADER, $header);
        curl_setopt($url,CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url,CURLOPT_POSTFIELDS, $request_data_json);
        curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        
        $result_data =  curl_exec($url);
        curl_close($url);
        
         $response = json_decode($result_data);
        
          $requestbody = array(
                'paymentID' => $req->paymentID,
            );
            $url = curl_init('https://tokenized.pay.bka.sh/v1.2.0-beta/tokenized/checkout/execute');  
            $requestbodyJson = json_encode($requestbody);
            
            $header = array(
            'Content-Type:application/json',
            'Authorization:'.$response->id_token,
            'X-APP-Key:'.env("BKASH_APP_KEY")
                );

            curl_setopt($url, CURLOPT_HTTPHEADER, $header);
            curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($url, CURLOPT_POSTFIELDS, $requestbodyJson);
            curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            $resultdata = curl_exec($url);
            curl_close($url);
           $res_array = json_decode($resultdata);
           
            $result = null;
            
          if($res_array->transactionStatus == 'Completed'){
              
               // return date("Y-m-d h:i:s A");
        $user_id = Register::where(['mail'=>$req->session()->get('email')])->get('id')[0]->id;
       $insert_id =  package_connection_buy::insertGetId([
            'purchaser'=>$user_id,
            'package'=>\Session()->get('connection'),
            'date'=>date("Y-m-d")
        ]);
     
        $result =   purchase_package::insert([
            'payment_id'=>$req->paymentID,
            'purchaser'=>$user_id,
            'purchased'=>"p_".$insert_id,
            'money'=>\Session()->get('money'),
            'payment_date'=>date("Y-m-d h:i:s A")
        ]);
      
              
        //      $user_id = Register::where(['mail'=>$req->session()->get('email')])->get('id')[0]->id;
        //      $result =   purchase_package::insert([
        //     'payment_id'=>$req->paymentID,
        //     'purchased'=>\Session()->get('purchased_id'),
        //     'purchaser'=>$user_id,
        //     'money'=>\Session()->get('money'),
        //     'payment_date'=>date("Y-m-d h:i:s A")
            
        // ]);
                  
            
        }
        
        
        
       

        if( $result){
            return redirect("dashboard")->with(['message'=>'আপনার পেমেন্ট টি সফল হয়েছে ','condition'=>true]);
    
        }else{
            return redirect("dashboard")->with(['message'=>'দুখিত কর্তৃপক্ষের সাথে যোগাযোগ করুন','condition'=>false]);
        }
    }else if($req->status=="failure"){
        return redirect("dashboard")->with(['message'=>'আপনার পেমেন্টটি সফল হয়নি । ফেইল হয়েছে ।','condition'=>false]);
    }else if($req->status=="cancel"){
        return redirect("dashboard")->with(['message'=>'আপনার পেমেন্টটি কেনসেল হয়েছে ।','condition'=>false]);
    }else{
        return redirect("dashboard")->with(['message'=>'আপনি আবার চেষ্ট করুন ।','condition'=>false]);
    }
  
  }



public function package_connection_buy_add(Request $req){
    $user_id = Register::where(['mail'=>$req->session()->get('email')])->get('id')[0]->id;

   $select =  \DB::select("SELECT id, purchased,  LENGTH(purchased) - LENGTH(REPLACE(purchased, ',', ''))  as package_count ,package FROM package_connection_buy WHERE purchaser = '$user_id' AND LENGTH(purchased) - LENGTH(REPLACE(purchased, ',', '')) <package ");
   if(count($select) >0){
    // return $select[0]->purchased.$req->biodata_id.",";
    $result = package_connection_buy::where(['id'=>$select[0]->id])->update([
        'purchased'=>$select[0]->purchased.$req->biodata_id.",",
    ]);
    return redirect("show_biodata/$req->biodata_id")->with(['message'=>'সফল ভাবে কানেকশন এড করা হয়েছে  !','condition'=>true]);

   }else if( package_connection_buy::where(['purchaser'=>$user_id])->where(['purchased'=>null])->count() >0){
   $select =  package_connection_buy::where(['purchaser'=>$user_id])->where(['purchased'=>null])->first();


   $result = package_connection_buy::where(['id'=>$select->id])->update([
    'purchased'=>$req->biodata_id.",",
]);
return redirect("show_biodata/$req->biodata_id")->with(['message'=>'সফল ভাবে কানেকশন এড করা হয়েছে  !','condition'=>true]);

   } else{
    $select ;
    return redirect("show_biodata/$req->biodata_id")->with(['message'=>'আপনার প্যাকেজ পাওয়া যায়নি !','condition'=>false]);
   }
 
   
}

public function handle_modal_biodata(Request $req){
   $package =  rtrim(package_connection_buy::where(['id'=>$req->id])->get()[0]->purchased,',') ;
   return $package =  \DB::select("SELECT communication.* ,primary_info.user_name FROM communication LEFT JOIN primary_info ON primary_info.user_table_id = communication.user_table_id  WHERE communication.user_table_id IN ($package) ");
}

public function is_permition_for_public(){
    $user_id = Register::where(['mail'=>Session()->get('email')])->get('id')[0]->id;
    Register::where(['id'=>$user_id])->update(['is_permition'=>'1']);
    return redirect("dashboardedit")->with(['message'=>'Success','condition'=>true]);

}

}


