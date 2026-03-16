<style type="text/css">
    @media screen and (min-width: 1024px) {
        .border-right-card {
            border-right: 1px solid lightgrey;
        }
        .card-height-desktop {
            height: 200px;
        }
    }
</style>
<nav class="navbar navbar-expand navbar-theme">
    <a class="sidebar-toggle d-flex mr-2">
        <i class="hamburger align-self-center"></i>
    </a>

    <form class="form-inline d-none d-sm-inline-block">
        <input class="form-control form-control-lite" type="text" placeholder="Recherche...">
    </form>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto mr-4">
            <li class="nav-item dropdown ml-lg-2">
                <a class="nav-link dropdown-toggle position-relative" href="#" id="userDropdown" data-toggle="dropdown">
                    <div style="margin-right: 80px" class="avatar">
                        <button style="color:#153d77" class="btn mb-1 btn-primary" onclick="window.location.href='<?= base_url('Login/do_logout')?>'"><i class="fa fa-sign-out"></i> Déconnexion</button>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</nav>
<?php 


