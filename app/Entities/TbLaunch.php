<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;


class TbLaunch extends Model implements Transformable
{
    use TransformableTrait;

   
     public     $timestamps   = true;
     protected  $table        = 'tb_launch';
     protected  $fillable     = ['id','id_user','value','operation_date','reference_month','reference_year','idtb_operation','status','idtb_type_launch','idtb_base', 'idtb_closing', 'status', 'created_at', 'updated_at'];
     

     public function user(){
            return $this->belongsTo(TbCadUser::class, 'id_user', 'id');

     }

     public function type_launch(){
            return $this->belongsTo(TbTypeLaunch::class, 'idtb_type_launch', 'id');
        
    }

    public function operation(){
       return $this->belongsTo(TbTypeLaunch::class, 'idtb_operation', 'id');
   
    }

    public function base(){
       return $this->belongsTo(TbTypeLaunch::class, 'idtb_base', 'idtb_base');
   
    }

}
