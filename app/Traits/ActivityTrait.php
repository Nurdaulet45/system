<?php
namespace App\Traits;
use App\Model\ActivityLog;
use carbon\carbon;
use Illuminate\Support\Facades\Auth;
trait ActivityTraits
{
   public  function logCreatedActivity($logModel,$changes,$request)
   {
       $activity = activity()
           ->causedBy(Auth::user())
           ->performedOn($logModel)
           ->withProperties(['attributes'=>$request])
           ->log($changes);
       $lastActivity = ActivityLog::all()->last();
       return true;
   }
   public function logUpdatedActivity($list,$before,$list_changes)
   {
       unset($list_changes['updated_at']);
       $old_keys = [];
       $old_value_array = [];
       if(empty($list_changes)){
           $changes = 'No attribute changed';
       }else{
           if(count($before)>0){
               foreach($before as $key=>$original){
                   if(array_key_exists($key,$list_changes)){
                       $old_keys[$key]=$original;
                   }
               }
           }
           $old_value_array = $old_keys;
           $changes = 'Updated with attributes '.implode(', ',array_keys($old_keys)).' with '.implode(', ',array_values($old_keys)).' to '.implode(', ',array_values($list_changes));
       }
       
       $properties = [
           'attributes'=>$list_changes,
           'old' =>$old_value_array
       ];
    
       $activity = activity()
           ->causedBy(Auth::user())
           ->performedOn($list)
           ->withProperties($properties)
           ->log($changes.' made by '.\Auth::user()->name);

       return true;
   }

   public function logDeletedActivity($list,$changeLogs)
   {
       $attributes = $this->unsetAttributes($list);
       $properties = [
           'attributes' => $attributes->toArray()
       ];
       $activity = activity()
           ->causedBy(Auth::user())
           ->performedOn($list)
           ->withProperties($properties)
           ->log($changeLogs);
       return true;
   }
   public static function logLoginDetails($user)
   {
    // dd($user);
       $updated_at = Carbon::now()->format('d/m/Y H:i:s');
       $properties = [
           'attributes' =>['name'=>$user->last_name,'description'=>'Логин вошел в систему '.$updated_at]
       ];
       $changes = 'Пользователь '.$user->last_name.'  вошел в систему';
       $activity = activity()
           ->causedBy(Auth::user())
           ->performedOn($user)
           ->withProperties($properties)
           ->log($changes);
       return true;
   }

   public static function logLogoutDetails($user)
   {
       $updated_at = Carbon::now()->format('d/m/Y H:i:s');
       $properties = [
           'attributes' =>['name'=>$user->last_name,'description'=>'Логин покинул сайт'.$updated_at]
       ];
       $changes = 'Пользователь '.$user->last_name.' покинул сайт';
       $activity = activity()
           ->causedBy(Auth::user())
           ->performedOn($user)
           ->withProperties($properties)
           ->log($changes);

       return true;
   }

   public static function logLoginFailed($user)
   {
       $updated_at = Carbon::now()->format('d/m/Y H:i:s');
       $properties = [
           'attributes' =>['email'=>$user['email'],'password'=> $user['password'], 'description'=> 'Неправильно ввел данные'.$updated_at]
       ];
       $caused = null;
       $perfomed = null;
       $changes = 'Faker ? '.$user['email'].'';
       $activity = activity()
           ->causedBy($caused)
           ->performedOn($perfomed)
           ->withProperties($properties)
           ->log($changes);
       return true;
   }
 
   public function unsetAttributes($model){
       unset($model->created_at);
       unset($model->updated_at);
       return $model;
   }
}
