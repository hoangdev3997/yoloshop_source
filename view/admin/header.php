<aside id="aside" class="aside aside-left" data-fuse-bar="aside" data-fuse-bar-media-step="md" data-fuse-bar-position="left">
    <div class="aside-content bg-primary-700 text-auto">
        <div class="aside-toolbar">
            <div class="logo">
                <span class="logo-icon">R</span>
                <span class="logo-text">RIN</span>
            </div>
            <button id="toggle-fold-aside-button" type="button" class="btn btn-icon d-none d-lg-block" data-fuse-aside-toggle-fold>
                <i class="icon icon-backburger"></i>
            </button>

        </div>

        <ul class="nav flex-column custom-scrollbar" id="sidenav" data-children=".nav-item">
            <li class="subheader">
                <span>APPS</span>
            </li>
            <li class="nav-item " role="tab" id="heading-dashboards">
                <a class="nav-link nav-panel ripple <?php echo $home ?>" href="admin.php" data-url="index.html">
                    <i class="icon s-4 icon-tile-four"></i>
                        <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item" role="tab" id="heading-ecommerce">
                <a class="nav-link ripple with-arrow collapsed" data-toggle="collapse" data-target="#collapse-ecommerce" href="#" aria-expanded="false" aria-controls="collapse-ecommerce">
                    <i class="icon s-4 icon-image-area"></i>
                    <span>Image</span>
                </a>
                <ul id="collapse-ecommerce" class='collapse ' role="tabpanel" aria-labelledby="heading-ecommerce" data-children=".nav-item">
                    <li class="nav-item">
                        <a class="nav-link ripple nav-panel <?php echo $slide ?>" href="#" data-url="#">
                            <i class="icon s-4 icon-image-area-close"></i>
                            <span>Slide</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ripple nav-panel <?php echo $banner ?>" href="#" data-url="#">
                            <i class="icon s-4 icon-image-area-close"></i>
                            <span>Banner</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="subheader">
                <span>PAGES</span>
            </li>
            <li class="nav-item">
                <a class="nav-link ripple nav-panel <?php echo $catalog ?>" href="admin.php?page=catalog" data-url="#">
                    <i class="icon s-4 icon-vector-arrange-below"></i>
                    <span>Catalog</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link ripple nav-panel <?php echo $product ?>" href="admin.php?page=product" data-url="#">
                    <i class="icon s-4 icon-cart-outline"></i>
                    <span>Product</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link ripple nav-panel <?php echo $order ?>" href="admin.php?page=order" data-url="#">
                    <i class="icon s-4 icon-cart-plus"></i>
                    <span>Order</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link ripple nav-panel <?php echo $user ?>" href="admin.php?page=user" data-url="#">
                    <i class="icon s-4 icon-ninja"></i>
                    <span>User</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link ripple fuse-ripple-ready nav-panel <?php echo $contact ?>" href="admin.php?page=contact" data-url="#">
                    <i class="icon s-4 icon-account-box"></i>
                    <span>Contacts</span>
                </a>
            </li>
        </ul>
    </div>

</aside>