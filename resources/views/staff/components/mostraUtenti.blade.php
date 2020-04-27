<?php
    $sections = \App\Section::all();
    $roles = \App\Role::all();
?>
<noscript>
    Senza JS la pagina non funziona
</noscript>
@if(isset($message))
    <div class="success"> {{$message}}</div>
@endif
<table>
    <tr>
        <th>Nome</th>
        @forelse($sections as $section)
            <th>{{$section->name}}</th>
        @empty
            <th>Non sono state create sezioni</th>
        @endforelse
    </tr>
    @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            @forelse($sections as $section)
                <td>
                    <form method="post" id="roleForm-{{$user->id.'-'.$section->id}}">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="name" value="{{$oldRequest}}">
                        <input type="hidden" name="userId" value="{{$user->id}}">
                        <input type="hidden" name="sectionId" value="{{$section->id}}">
                        <select onchange="document.forms['roleForm-{{$user->id.'-'.$section->id}}'].submit()" name="roleId">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}"
                                @if($user->getRole($section)->is($role))
                                    selected class="selected"
                                @endif
                            >{{$role->name}}</option>
                        @endforeach
                    </select>
                    </form>
                </td>
            @empty
                no sezioni
            @endforelse
        </tr>
    @endforeach

</table>
