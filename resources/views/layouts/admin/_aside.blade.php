<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

<aside class="app-sidebar">
    @if(auth()->check())
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="{{ auth()->user()->image_path }}" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">{{ auth()->user()->name }}</p>
            <p class="app-sidebar__user-designation">{{ auth()->user()->first()->name }}</p>
        </div>
    </div>
    

    <ul class="app-menu">

        <li><a class="app-menu__item {{ request()->is('*home*') ? 'active' : '' }}" href="{{ route('admin.home') }}"><i class="app-menu__icon fa fa-home"></i> <span class="app-menu__label">@lang('site.home')</span></a></li>

        {{--roles--}}
        @if (auth()->user()->hasPermission('read_roles'))
            <li><a class="app-menu__item {{ request()->is('*roles*') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}"><i class="app-menu__icon fa fa-lock"></i> <span class="app-menu__label">@lang('roles.roles')</span></a></li>
        @endif

        {{--admins--}}
        @if (auth()->user()->hasPermission('read_admins'))
            <li><a class="app-menu__item {{ request()->is('*admins*') ? 'active' : '' }}" href="{{ route('admin.admins.index') }}"><i class="app-menu__icon fa fa-users"></i> <span class="app-menu__label">@lang('admins.admins')</span></a></li>
        @endif

        {{--users--}}
        @if (auth()->user()->hasPermission('read_users'))
            <li><a class="app-menu__item {{ request()->is('*users*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}"><i class="app-menu__icon fa fa-user"></i> <span class="app-menu__label">@lang('users.users')</span></a></li>
        @endif

        {{--projects-types--}}
        @if (auth()->user()->hasPermission('read_projects_types'))
            <li><a class="app-menu__item {{ request()->is('*projects-types*') ? 'active' : '' }}" href="{{ route('admin.project-types.index') }}"><i class="app-menu__icon fas fa-project-diagram"></i><span class="app-menu__label">@lang('projects.projects_types')</span></a></li>
        @endif

        {{--domains--}}
        @if (auth()->user()->hasPermission('read_domains'))
            <li><a class="app-menu__item {{ request()->is('*domains*') ? 'active' : '' }}" href="{{ route('admin.domains.index') }}"><i class="app-menu__icon fas fa-highlighter"></i><span class="app-menu__label">@lang('domains.domains')</span></a></li>
        @endif

        {{--Sliders--}}
            <li><a class="app-menu__item {{ request()->is('*sliders*') ? 'active' : '' }}" href="{{ route('admin.sliders.index') }}"><i class="app-menu__icon fas fa-envelope-open-text"></i><span class="app-menu__label">@lang('sliders.sliders')</span></a></li>

        {{--Services--}}
            <li><a class="app-menu__item {{ request()->is('*services*') ? 'active' : '' }}" href="{{ route('admin.services.index') }}"><i class="app-menu__icon fas fa-envelope-open-text"></i><span class="app-menu__label">@lang('services.services')</span></a></li>

        {{--Our Client--}}
            <li><a class="app-menu__item {{ request()->is('*our_clients*') ? 'active' : '' }}" href="{{ route('admin.our_clients.index') }}"><i class="app-menu__icon fas fa-envelope-open-text"></i><span class="app-menu__label">@lang('our_clients.our_clients')</span></a></li>

        {{--About Us--}}
            <li><a class="app-menu__item {{ request()->is('*about_us*') ? 'active' : '' }}" href="{{ route('admin.about_us.index') }}"><i class="app-menu__icon fas fa-envelope-open-text"></i><span class="app-menu__label">@lang('about_us.about_us')</span></a></li>
        {{--Connects--}}
            <li><a class="app-menu__item {{ request()->is('*connects*') ? 'active' : '' }}" href="{{ route('admin.connects.index') }}"><i class="app-menu__icon fas fa-envelope-open-text"></i><span class="app-menu__label">@lang('connects.connects')</span></a></li>
        {{--Counters--}}
            <li><a class="app-menu__item {{ request()->is('*counters*') ? 'active' : '' }}" href="{{ route('admin.counters.index') }}"><i class="app-menu__icon fas fa-envelope-open-text"></i><span class="app-menu__label">@lang('counters.counters')</span></a></li>
        {{--Advisor--}}
            <li><a class="app-menu__item {{ request()->is('*advisors*') ? 'active' : '' }}" href="{{ route('admin.advisors.index') }}"><i class="app-menu__icon fas fa-envelope-open-text"></i><span class="app-menu__label">@lang('advisors.advisors')</span></a></li>
        {{--Email--}}
            <li><a class="app-menu__item {{ request()->is('*email/subscribe*') ? 'active' : '' }}" href="{{ route('admin.email_subscribe.index') }}"><i class="app-menu__icon fas fa-envelope-open-text"></i><span class="app-menu__label">@lang('email_subscribe.email_subscribe')</span></a></li>
        {{--Rais--}}
            <li><a class="app-menu__item {{ request()->is('*rais*') ? 'active' : '' }}" href="{{ route('admin.rais.index') }}"><i class="app-menu__icon fas fa-envelope-open-text"></i><span class="app-menu__label">@lang('rais.rais')</span></a></li>


        {{--projects--}}
        @if (auth()->user()->hasPermission('read_projects'))
            <li><a class="app-menu__item {{ request()->is('*projects*') ? 'active' : '' }}" href="{{ route('admin.projects.index') }}"><i class="app-menu__icon fas fa-lightbulb"></i><span class="app-menu__label">@lang('projects.projects')</span></a></li>
        @endif

        {{--contacts--}}
        @if (auth()->user()->hasPermission('read_contacts'))
            <li><a class="app-menu__item {{ request()->is('*contacts*') ? 'active' : '' }}" href="{{ route('admin.contacts.index') }}"><i class="app-menu__icon fas fa-envelope-open-text"></i><span class="app-menu__label">@lang('contacts.contacts')</span></a></li>
        @endif

        {{--blogs--}}
        @if (auth()->user()->hasPermission('read_contacts'))
            <li><a class="app-menu__item {{ request()->is('*blogs*') ? 'active' : '' }}" href="{{ route('admin.blogs.index') }}"><i class="app-menu__icon fas fa-marker"></i><span class="app-menu__label">@lang('blogs.blogs')</span></a></li>
        @endif

        {{--discuss--}}
        @if (auth()->user()->hasPermission('read_discuss'))
            <li class="treeview {{ request()->is('*discusses*') ? 'is-expanded' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-comment-dots"></i><span class="app-menu__label">@lang('discuss.discusses')</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                   @if (auth()->user()->hasPermission('read_topics'))
                    <li><a class="treeview-item" href="{{ route('admin.topics.index') }}"><i class="icon fas fa-hashtag"></i>@lang('discuss.topics')</a></li>
                   @endif
                   @if (auth()->user()->hasPermission('read_discuss'))
                    <li><a class="treeview-item" href="{{ route('admin.discusses.index') }}"><i class="icon fas fa-feather"></i>@lang('discuss.discusses')</a></li>
                   @endif
                </ul>
            </li>
        @endif

        {{--settings--}}
        @if (auth()->user()->hasPermission('read_settings'))
            <li class="treeview {{ request()->is('*settings*') ? 'is-expanded' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cogs"></i><span class="app-menu__label">@lang('settings.settings')</span><i class="treeview-indicator fa fa-angle-right"></i></a>

                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="{{ route('admin.settings.general') }}"><i class="icon fa fa-circle-o"></i>@lang('settings.general')</a></li>
                    <li><a class="treeview-item" href="{{ route('admin.settings.contact') }}"><i class="icon fa fa-circle-o"></i>@lang('settings.contact')</a></li>
                </ul>
            </li>
        @endif

        {{--profile--}}
        <li class="treeview {{ request()->is('*profile*') || request()->is('*password*')  ? 'is-expanded' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user-circle"></i><span class="app-menu__label">@lang('users.profile')</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{ route('admin.profile.edit') }}"><i class="icon fa fa-circle-o"></i>@lang('users.edit_profile')</a></li>
                <li><a class="treeview-item" href="{{ route('admin.profile.password.edit') }}"><i class="icon fa fa-circle-o"></i>@lang('users.change_password')</a></li>
            </ul>
        </li>
    </ul>
    @endif
</aside>
