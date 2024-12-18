        <!-- Nav Item  - Member -->
        <li class="nav-item {{ Nav::isRoute('members.index') }}">
            <a class="nav-link" href="{{ route('members.index') }}">
                <i class="fas fa-fw fa-plus"></i>
                <span>{{ __('Member CRUD') }}</span>
            </a>
        </li>

        <!-- Nav Item - Kegiatan UKM -->
        <li class="nav-item {{ Nav::isRoute('kegiatans.index') }}">
            <a class="nav-link" href="{{ route('kegiatans.index') }}">
                <i class="fas fa-fw fa-plus"></i>
                <span>{{ __('Kegiatan UKM CRUD') }}</span>
            </a>
        </li>