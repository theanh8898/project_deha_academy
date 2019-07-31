<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="profile.html"><img src="{{ asset('admin/dashio/img/ta.jpg') }}"
                                                            class="img-circle" width="80"></a></p>
            <h5 class="centered">NuHongMongManh</h5>
            <li class="mt">
                <a class="active" href="#">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="{{ url('/laptops') }}">
                    <i class="fa fa-desktop"></i>
                    <span>Laptops</span>
                </a>
            </li>


            <li class="sub-menu">
                <a href="{{ url('/laptoptypes') }}">
                    <i class="fa fa-th"></i>
                    <span>Laptop Type</span>
                </a>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="fa fa-envelope"></i>
                    <span>Mail </span>
                    <span class="label label-theme pull-right mail-info">2</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-comments-o"></i>
                    <span>Chat Room</span>
                </a>
                <ul class="sub">
                    <li><a href="lobby.html">Lobby</a></li>
                    <li><a href="chat_room.html"> Chat Room</a></li>
                </ul>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
