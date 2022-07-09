@extends('template.users')
@section('title', 'Listagem de Usuários')
@section ('body')
        <h1> Listagem de Usuários</h1>
        <a href="{{route('users.create')}}" class="btn btn-outline-dark"> Novo Usuário</a>
  
          <table class="table">
             <thead class=" text-center">
                <tr>
                 <th scope="col">ID</th>
                 <th scope="col">NOME</th>
                 <th scope="col">EMAIL</th>
                 <th scope="col">DATA CADASTRO</th>
                 <th scope="col">AÇÕES</th>
                </tr>
            </thead>
            <tbody class=" text-center">
                @foreach($users as $user)
                    <tr>
                         @if($user->image)
                         <th><img src=" {{ asset('storage/'.$user->image) }}" width="50px" height="50px" class="rounded-circle"/></th>
                         @else
                         <th><img src=" {{ asset('storage/profile/avatar.png') }}" width="50px" height="50px" class="rounded-circle"/></th>
                         @endif
                         <th scope="row">{{ $user->id}}</th>
                         <td> {{ $user->name}} </td>
                         <td>{{ $user->email}}</td>
                         <td>{{ date ('d/m/Y - H:i', strtotime($user->creat_at)) }}</td>
                         <td>
                              <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary text-white">Visualizar</a></td>
                         
                         </tr>
                 @endforeach
           </tbody>
     </table>
    <div class="justify-content-center pagination">
      {{ $users->links('pagination::bootstrap-4') }}
@endsection