<!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
               <a href="index.html" class="b-brand">
                   <div class="b-bg">
                       <i class="feather icon-trending-up"></i>
                   </div>
                   <span class="b-title">Sistema de Cobros</span>
               </a>
               
           </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">

                    {!!App\Http\Controllers\MenuController::funcRetornarMenuPorRol()!!}
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->