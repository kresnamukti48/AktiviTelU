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

<!-- Nav Item - Member -->  
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

<!-- Nav Item - Kegiatan UKM -->  
<li class="nav-item {{ Nav::isRoute('kegiatans.index') }}">  
    <a class="nav-link" href="{{ route('kegiatans.index') }}">  
        <i class="fas fa-fw fa-plus"></i>  
        <span>{{ __('Kegiatan UKM CRUD') }}</span>  
    </a>  
</li>  

<!-- Nav Item - Event -->  
<li class="nav-item {{ Nav::isRoute('events.index') }}">  
    <a class="nav-link" href="{{ route('events.index') }}">  
        <i class="fas fa-fw fa-plus"></i>  
        <span>{{ __('Event CRUD') }}</span>  
    </a>  
</li>

<!-- Nav Item - Ticket -->
<li class="nav-item {{ Nav::isRoute('tickets.index') }}">
    <a class="nav-link" href="{{ route('tickets.index') }}">
        <i class="fas fa-fw fa-plus"></i>
            <span>{{ __('Ticket CRUD') }}</span>
    </a>
</li>

<!-- Nav Item - Checkout -->
<li class="nav-item {{ Nav::isRoute('checkouts.index') }}">
    <a class="nav-link" href="{{ route('checkouts.index') }}">
        <i class="fas fa-fw fa-plus"></i>
            <span>{{ __('Transaksi') }}</span>
    </a>
</li>

