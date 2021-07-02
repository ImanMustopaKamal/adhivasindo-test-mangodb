<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\GroupModel;
use App\Models\UserGroupModel;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = UserModel::get();
        
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $data = $request->getContent();
        $value = json_decode($data);
        foreach($value as $key => $item) {
    
            $users = new UserModel;
    
            $users->user_id = uniqid();
            $users->nama = $item->nama;
            $users->user = $item->user;
            $users->email = $item->email;
            $users->password = $item->password;
    
            $users->save();

            foreach($item->group as $idx => $value) {
                $group = new GroupModel;

                $group->group_id = uniqid();
                $group->nama = $value->name;
                $group->keterangan = $value->name;

                $group->save();

                $usersgroup = new UserGroupModel;

                $usersgroup->user_group_id = uniqid();
                $usersgroup->user_id = $users->user_id;
                $usersgroup->group_id = $group->group_id;

                $usersgroup->save();

            }
    
        }   
    
        return response()->json('User Successfully Created');
    }

    public function show($id)
    {
        $user = UserGroupModel::with(['user', 'group'])->where('user_id', $id)->get();
        
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $data = $request->getContent();
        $value = json_decode($data);
        
        foreach($value as $key => $item) {
            $user_id = UserModel::where('user_id', $id)->first();

            $users = UserModel::find($user_id->_id);
    
            $users->nama = $item->nama;
            $users->user = $item->user;
            $users->email = $item->email;
    
            $users->save();

            $user_group_ex = UserGroupModel::where('user_id', $id)->get();

            foreach($user_group_ex as $key => $val) {
                $group_ex = GroupModel::where('group_id', $val->group_id)->delete();
            }

            $ex_usergroup = UserGroupModel::where('user_id', $id)->delete();

            foreach($item->group as $idx => $value) {
                $group = new GroupModel;

                $group->group_id = uniqid();
                $group->nama = $value->name;
                $group->keterangan = $value->name;

                $group->save();

                $id = UserGroupModel::get();

                $usersgroup = new UserGroupModel;

                $usersgroup->user_group_id = uniqid();
                $usersgroup->user_id = $users->user_id;
                $usersgroup->group_id = $group->group_id;

                $usersgroup->save();

            }

        }

        return response()->json('User Successfully Updated');
    }

    public function destroy($id)
    {
        $user_ex = UserModel::where('user_id', $id)->delete();

        $user_group_ex = UserGroupModel::where('user_id', $id)->get();

            foreach($user_group_ex as $key => $val) {
                $group_ex = GroupModel::where('group_id', $val->group_id)->delete();
            }

        $ex_usergroup = UserGroupModel::where('user_id', $id)->delete();

        return response()->json('User Successfully Deleted');
    }
}
