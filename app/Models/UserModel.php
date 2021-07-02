<?php
namespace App;
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class UserModel extends Model
{
    protected $collection = 'user';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        '_id', 'user_id', 'nama', 'user', 'email', 'created_at', 'updated_at'
    ];

    public function usergroup()
    {
        return $this->hasMany(UserGroupModel::class, 'user_id');
    }
}