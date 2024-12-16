        <!-- Nav Item  - Member -->
        <li class="nav-item {{ Nav::isRoute('members.index') }}">
            <a class="nav-link" href="{{ route('members.index') }}">
                <i class="fas fa-fw fa-plus"></i>
                <span>{{ __('Member CRUD') }}</span>
            </a>
        </li>