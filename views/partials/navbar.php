<!--<div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">-->
<!--    <div class="container-fluid">-->
<!--        <div class="navbar-header"><a class="navbar-brand" href="#">Web Calendar</a>-->
<!--            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>-->
<!--            </button>-->
<!--        </div>-->
<!--        <div class="collapse navbar-collapse navbar-menubuilder">-->
<!--            <ul class="nav navbar-nav navbar-left">-->
<!--                <li><a href="/main">My Calendars</a>-->
<!--                </li>-->
<!--                <li><a href="#">User Settings</a>-->
<!--                </li>-->
<!--                <li><a href="/check">Check Meetings</a>-->
<!--                </li>-->
<!--                <li><a href="/manageTeams">Manage Teams</a>-->
<!--                </li>-->
<!--                <li><a href="/logout">Logout</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


                        <!--NEW NAV BAR -->
                        
                        
                        
                        
                        <div class="app-bar">
    <a class="app-bar-element" href="/main">Home</a>
    <span class="app-bar-divider"></span>
    <ul class="app-bar-menu">
                <li><a href="/main">Calendar Screen</a>
                </li>
                <li><a href="/settings">User Settings</a>
                </li>
                <li><a href="/check">Check Meetings</a>
                </li>
                 <li><a href="/showtasks">Manage Tasks </a>
                </li>
                <li><a href="/team">Manage Teams</a>
                </li>
                <li><a href="/logout">Logout</a></li>
        <li>
            <a href="" class="dropdown-toggle">Products</a>
            <ul class="d-menu" data-role="dropdown">
                <li><a href="">Windows 10</a></li>

                <li class="divider"></li>
                <li><a href="" class="dropdown-toggle">Other Products</a>
                    <ul class="d-menu" data-role="dropdown">
                        <li><a href="">Internet Explorer 10</a></li>
                        <li><a href="">Skype</a></li>
                        <li><a href="">Surface</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" onclick="notifications();"class="btn btn-default" aria-label="Left Align" data-toggle="modal" data-target="#invite">
                                Notifications  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </a>'
        </li>
    </ul>
</div>

    <div data-role="charm" id="notifications">
        <?php include("../modules/getminvitations.php") ?>
    </div>
    
    <script>
        function notifications(){
            toggleMetroCharm($('#notifications'));
        }
    </script>