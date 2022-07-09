<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateUserFormRequest;


class Usercontroller extends Controller
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }
   public function index() 
   {
        $users = User::paginate(5);

        return view('users.index', compact('users'));
   }

   public function show($id)
   {

        if (!$user = User::find($id))
            return redirect()->route('users.index');

        //$user = User::findOrFail($id);
        $title = 'Usuário ' .$user->name;

    //$user = User::where('id', $id)->first();
        
    return view('users.show', compact('user', 'title'));
   }


   public function create()
   {
    return view('users.create');
   }

   public function store(StoreUpdateUserFormRequest $request)
   {
    
        //$user = new User;
        //$user->name = $request->name;
        //$user->email = $request->email;
        //$user->password = bcrypt($request->password);
        //$user->save();

        $data = $request->all();
        $data['password'] = bcrypt($request->password);


        if($request->image) {
        $file = $request['image'];
        $path = $file ->store('profile', 'public');
        $data['image'] = $path;
        }
 
        $this->model->create($data);
        return redirect()->route('users.index');
}

    public function edit($id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');
         
        return view('users.edit', compact('user'));    
    }
        public function update(StoreUpdateUserFormRequest $request, $id)
        {
            
        if (!$user = $this->model->find($id))
        return redirect()->route('users.index');

        $data = $request->only('name', 'email');
            if($request->password)
                $data['password']= bcrypt($request->password);

                $user->update($data);
                
                return redirect()->route('users.index');

        }

        public function destroy($id)
        {
 
            if(!$user = $this->model->find($id))
                return redirect()->route('users.index');
               
                $user->delete();

                return redirect()->route('users.index');

        }
    }
