<?php
namespace App;
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class UserGroupModel extends Model
{
    protected $collection = 'user_group';
    protected $primaryKey = 'user_group_id';

    protected $fillable = [
        '_id', 'user_group_id', 'group_id', 'user_id', 'created_at', 'updated_at'
    ];

    public function group()
    {
        return $this->belongsTo(GroupModel::class, 'group_id');   
    }

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');   
    }
}