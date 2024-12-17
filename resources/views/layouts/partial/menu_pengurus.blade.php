        <!-- Nav Item  - Member -->
        <li class="nav-item {{ Nav::isRoute('members.index') }}">
            <a class="nav-link" href="{{ route('members.index') }}">
                <i class="fas fa-fw fa-plus"></i>
                <span>{{ __('Member CRUD') }}</span>
            </a>
        </li>

        <!-- Nav Item - Event -->
        <li class="nav-item {{ Nav::isRoute('events.index') }}">
            <a class="nav-link" href="{{ route('events.index') }}">
                <i class="fas fa-fw fa-plus"></i>
                <span>{{ __('Event CRUD') }}</span>
            </a>
        </li>