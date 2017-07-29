<li class="{{ Request::is('clients*') ? 'active' : '' }}">
    <a href="{!! route('clients.index') !!}"><i class="fa fa-edit"></i><span>Clients</span></a>
</li>

<li class="{{ Request::is('projects*') ? 'active' : '' }}">
    <a href="{!! route('projects.index') !!}"><i class="fa fa-edit"></i><span>Projects</span></a>
</li>

<li class="{{ Request::is('timeEntries*') ? 'active' : '' }}">
    <a href="{!! route('timeEntries.index') !!}"><i class="fa fa-edit"></i><span>TimeEntries</span></a>
</li>

