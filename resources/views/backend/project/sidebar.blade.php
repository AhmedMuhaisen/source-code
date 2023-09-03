 
 
 
 
 


{{-- Service management start --}}
 
@if (hasPermission('service_menu'))
<li class="nav-item {{ set_menu([route('service.index')]) }}">
    <a class="nav-link" data-bs-toggle="collapse" href="#services" role="button"
        aria-expanded="{{ menu_active_by_route(['service.create','service.index','service.view','service.edit']) }}"
        aria-controls="services">
        <i class="link-icon" data-feather="feather"></i>
        <span class="link-title">{{ _trans('common.Services') }}</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse {{ set_active(['admin/service*']) }}" id="services">
        <ul class="nav sub-menu">
            @if (hasPermission('service_create'))
                <li class="nav-item {{ menu_active_by_route(['service.create']) }}">
                    <a class="nav-link  href="{{ route('client.create') }}">
                        <span> {{ _trans('common.Add Client') }}</span>
                    </a>
                </li>
            @endif

            @if (hasPermission('service_list'))
                <li class="nav-item {{ menu_active_by_route(['service.index','service.view','service.edit']) }}">
                    <a class="nav-link"   href="{{ route('service.index') }}">
                        <span>{{ _trans('common.service List') }}</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</li>
@endif