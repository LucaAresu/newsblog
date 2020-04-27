<div class="navbar">
    <ul>
        <li><a href="{{route('index')}}">Home</a></li>
        <li><a
                @if(Route::is('staff_index'))
                class="active"
                @endif
                href="{{route('staff_index')}}">Staff</a></li>

        @can('create-section')
            <li><a
                    @if(Route::is('staff_create_section'))
                        class="active"
                    @endif
                    href="{{route('staff_create_section')}}">Crea Sezione</a></li>
        @endcan
        @can('promote-to-staff')
            <li><a
            @if(Route::is('staff_promote'))
                class="active"
            @endif
            href="{{route('staff_promote')}}">Promuovi</a></li>
        @endcan
    </ul>
</div>
