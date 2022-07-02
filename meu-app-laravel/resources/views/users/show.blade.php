@extends('template.users')
@section('title', $title)
@section ('body')
        <h1>Usuário {{ $user->name }}</h1>
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
                 <tr>
                 <th scope="row">{{ $user->id}}</th>
                 <td> {{ $user->name}} </td>
                 <td>{{ $user->email}}</td>
                 <td>{{ date ('d/m/Y - H:i', strtotime($user->creat_at)) }}</td>
                 <td>
                    <a href="{{route('users.edit', $user->id) }}" class="btn btn-warning text-white">Editar</a>
                    <a href="" class="btn btn-danger text-white">Deletar</a>
                </td>
                </tr>
                
           </tbody>
     </table>
@endsection