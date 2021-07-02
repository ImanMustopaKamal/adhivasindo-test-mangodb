<?php
namespace App;
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class GroupModel extends Model
{
    protected $collection = 'group';
    protected $primaryKey = 'group_id';

    protected $fillable = [
        '_id', 'group_id', 'nama', 'keterangan', 'created_at', 'updated_at'
    ];

}