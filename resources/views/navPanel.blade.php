<nav class="navbar navbar-default header">

    <div class="container-fluid header">

        <div class="container">
             <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-main">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                    <div id="logo">
                       <h1><a href="{{ route('index') }} ">OnlineShops</a></h1>
                    </div>
              </div>

            <div class="collapse navbar-collapse navbar-right" id="navbar-main">
                <ul class="nav nav-pills active">
                <li class="current active"><a href="{{ route('index') }}">Головна</a></li>
                <li class="current"><a href="{{ route('admin.index') }}">Адміністрування</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>