{{-- SIDEBAR --}}
<div class="app-sidebar sidebar-shadow bg-dark sidebar-text-light">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>    
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Contable</li>
                <li>
                    <a href="{{ route('admin.sales') }}" class="mm<?php if($title == DAILY_SALES_TITLE){echo '-active';} ?>">
                        <i class="metismenu-icon pe-7s-graph2"></i>
                        Ventas
                    </a>
                </li>
                <li class="app-sidebar__heading">Pesadas</li>
                <li>
                    <a href="{{ route('admin.tickets.create') }}" class="mm<?php if($title == NEW_TICKET_TITLE){echo '-active';} ?>">
                        <i class="metismenu-icon pe-7s-angle-right-circle"></i>
                        Nuevo ingreso
                    </a>
                </li>
                <li class="app-sidebar__heading">Informes</li>
                <li>
                    <a href="{{ route('admin.tickets.index') }}" class="mm<?php if($title == TICKETS_TITLE){echo '-active';} ?>">
                        <i class="metismenu-icon pe-7s-note2"></i>
                        Tickets
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.clients.index') }}" class="mm<?php if($title == CLIENTS_TITLE){echo '-active';} ?>">
                        <i class="metismenu-icon pe-7s-users"></i>
                        Clientes
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.vehicles.index') }}" class="mm<?php if($title == VEHICLES_TITLE){echo '-active';} ?>">
                        <i class="metismenu-icon pe-7s-car"></i>
                        Vehiculos
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.products.index') }}" class="mm<?php if($title == PRODUCTS_TITLE){echo '-active';} ?>">
                        <i class="metismenu-icon pe-7s-ticket"></i>
                        Productos
                    </a>
                </li>
                <li class="app-sidebar__heading">Usuarios</li>
                <li>
                    <a href="{{ route('admin.users.index') }}" class="mm<?php if($title == USERS_TITLE){echo '-active';} ?>">
                        <i class="metismenu-icon pe-7s-id"></i>
                        Empleados
                    </a>
                </li>
            </ul> 
        </div>
    </div>
</div>    {{-- end sidebar --}}