<!-- Nav Item - Member -->  
<li class="nav-item {{ Nav::isRoute('members.index') }}">  
    <a class="nav-link" href="{{ route('members.index') }}">  
        <i class="fas fa-fw fa-users"></i>  
        <span>{{ __('Member CRUD') }}</span>  
    </a>  
</li>  

<!-- Nav Item - Kegiatan UKM -->  
<li class="nav-item {{ Nav::isRoute('kegiatans.index') }}">  
    <a class="nav-link" href="{{ route('kegiatans.index') }}">  
        <i class="fas fa-fw fa-calendar-check"></i>  
        <span>{{ __('Kegiatan UKM CRUD') }}</span>  
    </a>  
</li>  

<!-- Nav Item - Event -->  
<li class="nav-item {{ Nav::isRoute('events.index') }}">  
    <a class="nav-link" href="{{ route('events.index') }}">  
        <i class="fas fa-fw fa-calendar-alt"></i>  
        <span>{{ __('Event CRUD') }}</span>  
    </a>  
</li>

<!-- Nav Item - Ticket -->
<li class="nav-item {{ Nav::isRoute('tickets.index') }}">
    <a class="nav-link" href="{{ route('tickets.index') }}">
        <i class="fas fa-fw fa-ticket-alt"></i>
            <span>{{ __('Ticket CRUD') }}</span>
    </a>
</li>

<!-- Nav Item - Checkout -->
<li class="nav-item {{ Nav::isRoute('checkouts.index') }}">
    <a class="nav-link" href="{{ route('checkouts.index') }}">
        <i class="fas fa-fw fa-dollar-sign"></i>
            <span>{{ __('Transaksi') }}</span>
    </a>
</li>