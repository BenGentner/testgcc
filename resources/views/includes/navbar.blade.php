<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/">
                <div class="logo-container">
                    <div class="brand">
                    </div>
                </div>
            </a>
        </div>

        <div class="collapse navbar-collapse pull-right">
            <ul class="nav navbar-nav">

                <?php
                $menu = App\Models\MenuItem::whereNull('parent_id')->orderby('lft')->get();
                ?>

                @foreach($menu as $menuItem)
                    @if($menuItem->descendants->isNotEmpty())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $menuItem->name }} <b
                                        class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @foreach($menuItem->descendants->sortBy('lft') as $subMenuItem)
                                    <li><a href="{{ $subMenuItem->url() }}">{{ $subMenuItem->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li><a href="{{ $menuItem->url() }}">{{ $menuItem->name }}</a></li>
                    @endif
                @endforeach

                {{--
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Verein <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/verein/vorstand">Vorstand</a></li>
                        <li><a href="/verein/sitzungspraesidenten">Sitzungspräsidenten</a></li>
                        <li><a href="/verein/satzung">Satzung</a></li>
                        <li><a href="/verein/orden">Orden</a></li>
                    </ul>
                </li>--}}
            </ul>
        </div>
    </div>
</nav>