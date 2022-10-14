<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
class UsersController extends Controller
{

    public function index(Request $request)
    {   /* $usuarios = User::all();
        return view('usuarios.index',compact('usuarios'));
 */
        $this->authorize('registrar-usuarios');
        $usuarios = User::orderBy('id','DESC')->where([
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if (($s = $request->s)) {
                    $query->orWhere('email', 'LIKE', '%' . $s . '%')
                        ->get();
                }
            }]
        ])->paginate(4);
        return view('usuarios.index',compact('usuarios'))
            ->with('i', ($request->input('page', 1) - 1) * 4);
    }

    public function create()
    {
        $this->authorize('registrar-usuarios');
        $roles = Role::pluck('name','name')->all();
        return view('usuarios.create',compact('roles'));
    }


    public function store(Request $request)
    {
        $this->authorize('registrar-usuarios');
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'roles' => 'required'
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('usuarios.index')
                        ->with('success','User created successfully');

    }


    public function show($id)
    {
        $this->authorize('registrar-usuarios');
        $user = User::find($id);
        return view('usuarios.show',compact('user'));


    }


    public function edit($id)
    {
        $this->authorize('registrar-usuarios');

        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('usuarios.edit',compact('user','roles','userRole'));

    }


    public function update(Request $request,  $id)
    {
        $this->authorize('registrar-usuarios');
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'roles' => 'required'
        ]);
        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('usuarios.index')
                        ->with('success','User updated successfully');


    }


    public function destroy($id)
    {
        $this->authorize('registrar-usuarios');
        User::find($id)->delete();
        return redirect()->route('usuarios.index')
                        ->with('success','User deleted successfully');


    }
}
