<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function permissions()
    {
        $permissions = Permission::all();
        return view('auth/permissions', compact('permissions'));
    }

    public function roles()
    {
        $roles = role::all();
        return view('auth/roles', compact('roles'));
    }

    public function add_role()
    {
        return view('auth/add_role');
    }

    public function add_permission()
    {
        return view('auth/add_permission');
    }

    public function store_permission(Request $request)
    {
        $permission = Permission::where('group_name', $request->group_name)->where('name', $request->name . ' ' . $request->group_name)->first();

        if ($permission == null) {
            $new_permission = Permission::create([
                'group_name' => $request->group_name,
                'name' => $request->name . ' ' . $request->group_name,
            ]);
            return redirect('add_permission')->with('success', 'Permission created !');
        } else {
            return redirect('add_permission')->with('error', 'Permission already exist !');
        }
    }

    public function destroy_permission(Request $request)
    {
        $permission = permission::find($request->id);
        $permission->delete();
        return redirect()->route('permissions')->with('success', 'permission deleted successfully!');
    }

    public function store_role(Request $request)
    {
        $new_role = Role::create([
            'name' => $request->name,
        ]);
        return redirect('roles')->with('success', 'role added successfully!');
    }

    public function destroy_role(Request $request)
    {
        $role = Role::find($request->id);
        $role->delete();
        return redirect()->route('roles')->with('success', 'role deleted successfully!');
    }

    public function assign_permissions()
    {
        $roles = Role::all();
        $groups = Permission::select('group_name')
            ->groupBy('group_name')
            ->get();

        $groupedPermissions = [];

        foreach ($groups as $group) {
            $permissions = Permission::select('id', 'name')
                ->where('group_name', $group->group_name)
                ->get();

            $groupedPermissions[$group->group_name] = $permissions;
        }
        return view('auth/assign_permissions', compact('roles', 'groupedPermissions'));
    }

    public function store_assign_permissions(Request $request)
    {
        $role = Role::find($request->role_id);

        // Detach all previously assigned permissions
        $role->syncPermissions([]);
        

        foreach ($request->permissions as  $permission_id) {
            $permission = Permission::find($permission_id);
            if (!$role->hasPermissionTo($permission->name)) {
                $role->givePermissionTo($permission->name);
            }
        }
        return redirect()->back()->with('success', 'data inserted');
    }

    public function getPermissions($role_id)
    {
        $permissions = DB::table('role_has_permissions')->select('permission_id as id')->where('role_id', $role_id)->get();
        return response()->json(['permissions' => $permissions]);
    }
}
