        <aside id="left-sidebar">

        <ul id="slide-out" class="side-nav fixed leftside-navigation ps-container ps-active-y" style="width: 240px;">
                <li class="user-details cyan darken-2">
                <div class="row">
                    
                        Hello World

                </div>
                </li>
                <li class="bold active"><a href="<?php echo route('Dashboard');?>" class="waves-effect">
                    <i class="material-icons">dashboard</i>Dashboard</a>
                </li>
                <li class="bold"><a href="<?php echo route('Articles');?>" class="waves-effect">
                    <i class="material-icons">help</i>Knowledge Base</a>
                </li>
                <li class="bold"><a href="<?php echo route('Domains');?>" class="waves-effect">
                    <i class="material-icons">language</i>Domain Info</a>
                </li>
                <li class="bold"><a href="{{ route('MailStatus')}}" class="waves-effect">
                    <i class="material-icons">email</i>Mail Status</a>
                </li>
                <li class="">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect"><i class="material-icons">speaker_notes</i>Logs</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <li><a href="css-typography.html" class="subItem  indigo lighten-5">Quad Log</a>
                                    </li>
                                    <li><a href="css-icons.html" class="subItem indigo lighten-5">Aldi Log</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                        
                    </ul>
                </li>
            </ul>

        </aside>