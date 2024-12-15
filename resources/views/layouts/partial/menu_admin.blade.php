        <!-- Nav Item -->
        <li class="nav-item {{ Nav::isRoute('basic.index') }}">
            <a class="nav-link" href="{{ route('basic.index') }}">
                <i class="fas fa-fw fa-plus"></i>
                <span>{{ __('User CRUD') }}</span>
            </a>
        </li>

        <!-- Nav Item - UKM -->
        <li class="nav-item {{ Nav::isRoute('ukms.index') }}">
            <a class="nav-link" href="{{ route('ukms.index') }}">
                <i class="fas fa-fw fa-plus"></i>
                <span>{{ __('UKM CRUD') }}</span>
            </a>
        </li>