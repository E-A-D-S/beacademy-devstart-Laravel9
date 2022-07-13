@extends ('template.users')
@section('title', "Listagem de postagens do {$user->name}")
@section('body')
<h1>Postagens do {{$user->name}}</h1>

@foreach($posts as $post)
    <div class="mb-3">
        <label class="form-laabel">Identificação Nº:<br><b>{{ $post->id }}</b></label>
            <br>
        <label class="form-laabel">Status:<br><b>{{ $post->active?'Ativo':'Inativo' }}</b></label>
             <br>
        <label class="form-laabel">Título:<br><b>{{ $post->title }}</b></label>
            <br>
        <label class="form-laabel">Postagem:<br></label>
             <br>
        <textarea class="form-control" rows="5">{{ $post->post }}</textarea>
    </div>
    
    @endforeach
@endsection