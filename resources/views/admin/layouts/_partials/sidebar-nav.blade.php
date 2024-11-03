<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('events.index') }}" aria-expanded="false">
                <i class="mdi mdi-cogs menu-icon"></i>
                <span class="menu-title">Events</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link"  href="{{ route('events.reminder.bulk-create') }}" aria-expanded="false">
                <i class="mdi mdi-cogs menu-icon"></i>
                <span class="menu-title">Bulk Reminder</span>
            </a>
        </li>
    </ul>
</nav>
