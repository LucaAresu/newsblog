@extends('staff.template.template')
@section('content')
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
        </tr>
    @forelse($sections as $section)
        <tr>
            <td>{{$section->id}}</td>
            <td>{{$section->name}}</td>
        </tr>
    @empty
        <tr>
            <td colspan="2">Non sono ancora presenti sezioni</td>
        </tr>
    @endforelse
    </table>

    <h1>Crea Sezione</h1>
    <form method="post">
        @csrf
        <div class="form-staff">
            @error('name')
            <div class="error">{{$message}}</div>
            @enderror
            <label for="name">Nome</label>
            <input type="text" name="name">
        </div>
        <button class="button-staff" type="submit">Crea</button>
    </form>
@endsection
