{{-- project management start --}}
@if (hasPermission('client_menu'))
<li class="nav-item mb-1 {{ set_menu([route('project.index')]) }}">
    <a class="nav-link" data-bs-toggle="collapse" href="#clients" role="button"
        aria-expanded="{{ menu_active_by_route(['client.index', 'client.create', 'client.edit']) }}"
        aria-controls="clients">
        <i class="link-icon" data-feather="users"></i>
        <span class="link-title"> {{ _trans('common.Clients') }}</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse {{ set_active(['admin/client*']) }}" id="clients">
        <ul class="nav sub-menu">
            @if (hasPermission('client_create'))
                <li class="nav-item {{ menu_active_by_route(['client.create', 'client.edit']) }}">
                    <a class="nav-link"  href="{{ route('client.create') }}">
                        <span> {{ _trans('common.Add Client') }}</span>
                    </a>
                </li>
            @endif

            @if (hasPermission('client_list'))
                <li class="nav-item {{ menu_active_by_route(['client.index']) }}">
                    <a class="nav-link"   href="{{ route('client.index') }}">
                        <span> {{ _trans('common.Client Lists') }}</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</li>
@endif
