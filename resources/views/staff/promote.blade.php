@extends('staff.template.template')

@section('content')
    @if(isset($users))
        @error('name')
        <div class="error">{{message}}</div>
        @else
            @component('staff.components.mostraUtenti',compact('users','oldRequest','message'))
            @endcomponent
        @enderror
    @endif

    <form method="post">
        @csrf
        <div class="form-staff">
            @error('name')
                <div class="error">{{$message}}</div>
            @enderror
            <label for="name">Nome Utente</label>
            <input type="text" name="name">
            <button type="submit">Cerca</button>
        </div>
    </form>
@endsection
