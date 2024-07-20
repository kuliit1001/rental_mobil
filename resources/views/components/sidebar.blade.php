
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link active" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                
                <div class="sb-sidenav-menu-heading">Pages</div>
                <a class="nav-link {{request()->segment(1) == "tipemobil" ? "active" : ""}}" href="/tipemobil">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Tipe mobil
                </a>
                <a class="nav-link {{request()->segment(1) == "merk" ? "active" : ""}}" href="/merk">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Merk
                </a>
                <a class="nav-link {{request()->segment(1) == "mobil" ? "active" : ""}}" href="/mobil">
                    <div class="sb-nav-link-icon"><i class="fas fa-car"></i></div>
                    Mobil
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name }}
        </div>        
    </nav>
</div>