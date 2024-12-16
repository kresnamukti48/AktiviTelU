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

                <!-- Nav Item  - Member -->
        <li class="nav-item {{ Nav::isRoute('members.index') }}">
            <a class="nav-link" href="{{ route('members.index') }}">
                <i class="fas fa-fw fa-plus"></i>
                <span>{{ __('Member CRUD') }}</span>
            </a>
        </li>

        <!-- Nav Item - Dosen -->
        <li class="nav-item {{ Nav::isRoute('dosens.index') }}">
            <a class="nav-link" href="{{ route('dosens.index') }}">
                <i class="fas fa-fw fa-plus"></i>
                <span>{{ __('Dosen CRUD') }}</span>
            </a>
        </li>