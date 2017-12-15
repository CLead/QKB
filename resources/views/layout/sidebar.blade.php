        <aside id="left-sidebar">

        <ul id="slide-out" class="side-nav fixed leftside-navigation ps-container ps-active-y" style="width: 240px;">
                <li class="user-details blue-grey lighten-2">
                <div class="row">
                    @if (Auth::check())
                        <span class="user"><i class="material-icons vmiddle">person</i>{{Auth::user()->name}}</span>
                        <a class="btn blue-grey lighten-3 right" style="padding: 0 5px; margin-top: 6px;margin-right: 5px;" href="{{route("logout")}}"><i style="font-size: 12px;padding:0; margin:0" class="material-icons right vmiddle small">lock_open</i>Logout</a>
                    @endif
                </div>
                </li>
                <li class="bold active"><a href="<?php echo route('Dashboard');?>" class="waves-effect">
                    <i class="material-icons">dashboard</i>Dashboard</a>
                </li>
                <li class="bold"><a href="{{ route('Articles') }}" class="waves-effect">
                    <i class="material-icons">help</i>Knowledge Base</a>
                </li>
                <li class="bold"><a href="{{ route('Domains') }}" class="waves-effect">
                    <i class="material-icons">language</i>Domain Info</a>
                </li>
                <li class="bold"><a href="{{route('aldistore') }}" class="waves-effect">
                    <i class="material-icons">local_grocery_store</i>Aldi Store Lookup</a>
                </li>

                <li class="">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect"><i class="material-icons">email</i>Email</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <li><a href="{{ route('MailStatus')}}" class="subItem  indigo lighten-5"><i class="material-icons" style="margin:0 10px 0 0 !important">email</i>Server Status</a>
                                    </li>
                                    <li><a href="{{ route('missing') }}" class="subItem indigo lighten-5"><i class="material-icons" style="margin:0 10px 0 0 !important">show_chart</i>Queue Status</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                        
                    </ul>
                </li>
                <li class="">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect"><i class="material-icons">speaker_notes</i>Logs</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <li><a href="{{ route('missing') }}" class="subItem  indigo lighten-5">Quad Log</a>
                                    </li>
                                    <li><a href="{{ route('missing') }}" class="subItem indigo lighten-5">Aldi Log</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                        
                    </ul>
                </li>
                <li class="">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect"><i class="material-icons">personal_video</i>Hardware</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                   <li>
                                        <a href="{{ route('HWCompanies')}}" class="waves-effect bold subItem indigo lighten-5"><i class="material-icons" style="margin: 0 10px 0 0; !important; ">personal_video</i>Customers</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('missing')}}" class="waves-effect bold subItem indigo lighten-5"><i class="material-icons" style="margin: 0 10px 0 0; !important; ">keyboard</i>MT Log</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>

        </aside>