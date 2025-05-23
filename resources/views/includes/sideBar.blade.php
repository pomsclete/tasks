<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">TASKS <sup>v1</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" wire:navigate href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Taches
    </div>

    <li class="nav-item active">
        <a class="nav-link" wire:navigate href="{{ route('admin.task') }}">
            <i class="fas fa-fw fa-list"></i>
            <span>Gestion des taches</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Employés
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" wire:navigate href="{{ route('admin.employe') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Gestion des employés</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" wire:navigate href="{{ route('admin.service') }}">
            <i class="fas fa-fw fa-list"></i>
            <span>Gestion des services</span></a>
    </li>



</ul>
