 <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="<?=base_url('assets/light/admin')?>/images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="<?=base_url('assets/light/admin')?>/images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?=site_url(array('home'))?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                   
                    <li class="menu-item-has-children active dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Categories</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="<?=site_url(array('category'))?>">List</a></li>
                            <li><i class="fa fa-table"></i><a href="<?=site_url(array('category','add'))?>">Add</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Cars</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="<?=site_url(array('car'))?>">Cars</a></li>
							<li><i class="menu-icon fa fa-th"></i><a href="<?=site_url(array('car','add'))?>">Add Car</a></li>
                            
                        </ul>
                    </li>

                   
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->
