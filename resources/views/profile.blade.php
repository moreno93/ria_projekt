@extends('layouts.app')

@section('header')
    <h3>Profile page</h3>
    <small>User profile layout</small>
@endsection

@section('content')
    <div class="col-lg-2">
        <div class="block">
            <div class="block">
                <div class="thumbnail">
                    <div class="thumb">
                        @if ( Auth::user()->profile_pic )
                            <img src="{{ Auth::user()->profile_pic }}" alt="">
                        @else
                            <img src="images/profile_pic/default.jpg" alt="">
                        @endif
                        
                        <div class="thumb-options">
                            <span>
                                <form action="{{ url('/profile/update_pic') }}" method="POST" class="block" role="form" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button id="btnfile" class="btn btn-icon btn-success" onclick="$('#profile_pic').trigger('click'); return false;">
                                        <i class="icon-pencil"></i>
                                    </button>
                                    <div style="display:none;" class="file_wrapper">
                                         <input name="profile_pic" type="file" id="profile_pic" onchange="this.form.submit()"> 
                                    </div>
                                    
                                    <a class="btn btn-icon btn-success" href="#">
                                        <i class="icon-remove"></i>
                                    </a>
                                </form>
                            </span>
                        </div>
                    </div>
                    <div class="caption text-center">
                        <h6>
                        {{ Auth::user()->name }}
                        <small>{{ Auth::user()->profession }}</small>
                        </h6>
                        <div class="icons-group">
                            <a class="tip" title="" href="#" data-original-title="Google Drive">
                                <i class="icon-google-drive"></i>
                            </a>
                            <a class="tip" title="" href="#" data-original-title="Twitter">
                                <i class="icon-twitter"></i>
                            </a>
                            <a class="tip" title="" href="#" data-original-title="Github">
                                <i class="icon-github3"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="nav nav-list">
                <li class="nav-header">
                    My Profile
                    <i class="icon-accessibility"></i>
                </li>
                <li>
                    <a href="#">General Info</a>
                </li>
                <li>
                    <a href="#">Networks<span class="label label-danger">21</span></a>
                </li>
                <li>
                    <a href="#">Connections</a>
                </li>
            </ul>
        </div>   
    </div>
    <div class="col-lg-10">

                    <!-- Page tabs -->
                    <div class="tabbable page-tabs">
                        <ul class="nav nav-pills nav-justified">
                            <li class="active"><a href="#activity" data-toggle="tab"><i class="icon-paragraph-justify2"></i> Activity</a></li>
                            <li><a href="#stats" data-toggle="tab"><i class="icon-stats2"></i> Reports <i class="icon-spinner7 spin pull-right"></i></a></li>
                            <li><a href="#profile-messages" data-toggle="tab"><i class="icon-bubbles3"></i> Messages <span class="label label-danger">12</span></a></li>
                            <li><a href="#tasks" data-toggle="tab"><i class="icon-settings"></i> Tasks <span class="label label-danger">7</span></a></li>
                            <li><a href="#settings" data-toggle="tab"><i class="icon-cogs"></i> Settings</a></li>
                        </ul>
                        <div class="tab-content">

                            <!-- First tab -->
                            <div class="tab-pane active fade in" id="activity">

                                <!-- Statistics -->
                                <div class="block">
                                    <ul class="statistics list-justified">
                                        <li>
                                            <div class="statistics-info">
                                                <a href="#" title="" class="bg-success"><i class="icon-user-plus"></i></a>
                                                <strong>12,476</strong>
                                            </div>
                                            <div class="progress progress-micro">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                            <span>User registrations</span>
                                        </li>
                                        <li>
                                            <div class="statistics-info">
                                                <a href="#" title="" class="bg-warning"><i class="icon-point-up"></i></a>
                                                <strong>621,873</strong>
                                            </div>
                                            <div class="progress progress-micro">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                            <span>Total clicks</span>
                                        </li>
                                        <li>
                                            <div class="statistics-info">
                                                <a href="#" title="" class="bg-info"><i class="icon-cart-plus"></i></a>
                                                <strong>562</strong>
                                            </div>
                                            <div class="progress progress-micro">
                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                                    <span class="sr-only">90% Complete</span>
                                                </div>
                                            </div>
                                            <span>New orders</span>
                                        </li>
                                        <li>
                                            <div class="statistics-info">
                                                <a href="#" title="" class="bg-danger"><i class="icon-coin"></i></a>
                                                <strong>$45,360</strong>
                                            </div>
                                            <div class="progress progress-micro">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                                                    <span class="sr-only">70% Complete</span>
                                                </div>
                                            </div>
                                            <span>General balance</span>
                                        </li>
                                        <li>
                                            <div class="statistics-info">
                                                <a href="#" title="" class="bg-primary"><i class="icon-people"></i></a>
                                                <strong>562K+</strong>
                                            </div>
                                            <div class="progress progress-micro">
                                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                                                    <span class="sr-only">50% Complete</span>
                                                </div>
                                            </div>
                                            <span>Total users</span>
                                        </li>
                                        <li>
                                            <div class="statistics-info">
                                                <a href="#" title="" class="bg-info"><i class="icon-facebook"></i></a>
                                                <strong>36,290</strong>
                                            </div>
                                            <div class="progress progress-micro">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100" style="width: 93%;">
                                                    <span class="sr-only">93% Complete</span>
                                                </div>
                                            </div>
                                            <span>Facebook fans</span>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /statistics -->


                                <!-- Search line -->
                                <form action="#" class="search-line block" role="form">
                                    <span class="subtitle"><i class="icon-pencil3"></i> Search Activity:</span>
                                    <div class="input-group">
                                        <div class="search-control">
                                            <input type="text" class="form-control autocomplete" placeholder="What are you looking for?">
                                            <select multiple="multiple" class="multi-select-search" tabindex="2">
                                                <option value="Everywhere" selected="selected">Everywhere</option> 
                                                <option value="Users">Users</option> 
                                                <option value="Profiles">Profiles</option> 
                                                <option value="Images">Images</option> 
                                                <option value="Connections">Connections</option> 
                                                <option value="Gallery">Gallery</option> 
                                                <option value="Posts">Posts</option> 
                                            </select>
                                        </div>
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button">Search</button>
                                        </span>
                                    </div>
                                </form> 
                                <!-- /search line -->


                                <!-- Contacts (list) -->
                                <div class="block">
                                    <h6><i class="icon-paragraph-justify2"></i> Online contacts</h6>
                                    <ul class="message-list">

                                        <li class="message-list-header">Buddies</li>

                                        <li>
                                            <div class="clearfix">
                                                <div class="chat-member">
                                                    <a href="#"><img src="http://placehold.it/300" alt=""></a> 
                                                    <h6>Eugene Kopyov <span class="status status-success"></span> <small>&nbsp; /&nbsp; Wed developer</small></h6>
                                                </div>
                                                <div class="chat-actions">
                                                    <a class="btn btn-link btn-icon btn-xs" data-toggle="collapse" href="#eugene_kopyov"><i class="icon-bubble3"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-phone2"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-camera5"></i></a>
                                                </div>
                                            </div>

                                            <div class="panel-collapse collapse" id="eugene_kopyov">
                                                <div class="chat">
                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            <span class="typing"></span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc volutpat commodo ullamcorper. Vivamus consequat sapien ac ante pharetra pellentesque. Sed molestie leo vitae erat sagittis, ac posuere nibh faucibus. In nec massa suscipit, sagittis ligula non, accumsan velit.
                                                            Pellentesque habitant morbi tristique senectus et netus et malesuada fames.
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">10 Nov, 2013</div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Aenean dictum vitae tortor vitae placerat. Donec tristique urna tellus, porttitor commodo quam facilisis sit amet. Pellentesque ullamcorper metus sed libero imperdiet, id consequat libero malesuada. Aenean mattis, nisl nec sodales adipiscing, nunc mauris volutpat nulla, quis dictum sapien nibh vitae metus. Fusce vehicula aliquam enim, sed viverra ipsum elementum at
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nulla venenatis enim et mi egestas blandit. Praesent in consequat eros, et sagittis metus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Mauris at tellus viverra, lobortis elit non, luctus dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla in ornare ligula. Sed in pellentesque justo, vitae tristique urna. Vestibulum congue ligula ac posuere pharetra
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">12 Nov, 2013</div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Pellentesque ut sollicitudin quam, et suscipit lectus. Duis accumsan, purus ac feugiat condimentum, sem risus eleifend mi, vitae sagittis nisi sem nec libero. Nunc mauris tellus, cursus vel faucibus non, accumsan quis risus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Morbi lacus nulla, tristique eu hendrerit non, auctor ut arcu. Morbi id ligula mi. Vivamus ultricies lobortis erat sed placerat. Etiam molestie urna pulvinar porta fringilla. Aenean vitae lacinia felis, id laoreet diam
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc laoreet aliquam enim adipiscing placerat. Donec ac ultricies nisi. Nunc vel varius ante, et luctus elit. In eros urna, dignissim vitae quam eu, facilisis lacinia leo
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <textarea name="enter-message" class="form-control" rows="3" cols="1" placeholder="Enter your message..."></textarea>
                                                <div class="message-controls">
                                                    <span class="pull-left"><i class="icon-checkmark-circle"></i> Some basic <a href="#" title="">HTML</a> is OK</span>
                                                    <div class="pull-right">
                                                        <div class="upload-options">
                                                            <a href="#" title="" class="tip" data-original-title="Smileys"><i class="icon-smiley"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Upload photo"><i class="icon-camera3"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Attach file"><i class="icon-attachment"></i></a>
                                                        </div>
                                                        <button type="button" class="btn btn-danger btn-loading" data-loading-text="<i class='icon-spinner7 spin'></i> Processing">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="clearfix">
                                                <div class="chat-member">
                                                    <a href="#"><img src="http://placehold.it/300" alt=""></a> 
                                                    <h6>Duncan McMart <span class="status status-default"></span> <small>&nbsp; /&nbsp; Wed designer</small></h6>
                                                </div>
                                                <div class="chat-actions">
                                                    <a class="btn btn-link btn-icon btn-xs" data-toggle="collapse" href="#duncan_mcmart"><i class="icon-bubble3"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-phone2"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-camera5"></i></a>
                                                </div>
                                            </div>

                                            <div class="panel-collapse collapse" id="duncan_mcmart">
                                                <div class="chat">
                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            <span class="typing"></span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc volutpat commodo ullamcorper. Vivamus consequat sapien ac ante pharetra pellentesque. Sed molestie leo vitae erat sagittis, ac posuere nibh faucibus. In nec massa suscipit, sagittis ligula non, accumsan velit.
                                                            Pellentesque habitant morbi tristique senectus et netus et malesuada fames.
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">10 Nov, 2013</div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Aenean dictum vitae tortor vitae placerat. Donec tristique urna tellus, porttitor commodo quam facilisis sit amet. Pellentesque ullamcorper metus sed libero imperdiet, id consequat libero malesuada. Aenean mattis, nisl nec sodales adipiscing, nunc mauris volutpat nulla, quis dictum sapien nibh vitae metus. Fusce vehicula aliquam enim, sed viverra ipsum elementum at
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nulla venenatis enim et mi egestas blandit. Praesent in consequat eros, et sagittis metus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Mauris at tellus viverra, lobortis elit non, luctus dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla in ornare ligula. Sed in pellentesque justo, vitae tristique urna. Vestibulum congue ligula ac posuere pharetra
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">12 Nov, 2013</div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Pellentesque ut sollicitudin quam, et suscipit lectus. Duis accumsan, purus ac feugiat condimentum, sem risus eleifend mi, vitae sagittis nisi sem nec libero. Nunc mauris tellus, cursus vel faucibus non, accumsan quis risus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Morbi lacus nulla, tristique eu hendrerit non, auctor ut arcu. Morbi id ligula mi. Vivamus ultricies lobortis erat sed placerat. Etiam molestie urna pulvinar porta fringilla. Aenean vitae lacinia felis, id laoreet diam
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc laoreet aliquam enim adipiscing placerat. Donec ac ultricies nisi. Nunc vel varius ante, et luctus elit. In eros urna, dignissim vitae quam eu, facilisis lacinia leo
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <textarea name="enter-message" class="form-control" rows="3" cols="1" placeholder="Enter your message..."></textarea>
                                                <div class="message-controls">
                                                    <span class="pull-left"><i class="icon-checkmark-circle"></i> Some basic <a href="#" title="">HTML</a> is OK</span>
                                                    <div class="pull-right">
                                                        <div class="upload-options">
                                                            <a href="#" title="" class="tip" data-original-title="Smileys"><i class="icon-smiley"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Upload photo"><i class="icon-camera3"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Attach file"><i class="icon-attachment"></i></a>
                                                        </div>
                                                        <button type="button" class="btn btn-danger btn-loading" data-loading-text="<i class='icon-spinner7 spin'></i> Processing">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="clearfix">
                                                <div class="chat-member">
                                                    <a href="#"><img src="http://placehold.it/300" alt=""></a> 
                                                    <h6>Lucy Smith <span class="status status-warning"></span> <small>&nbsp; /&nbsp; UI expert</small></h6>
                                                </div>
                                                <div class="chat-actions">
                                                    <a class="btn btn-link btn-icon btn-xs" data-toggle="collapse" href="#lucy_smith"><i class="icon-bubble3"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-phone2"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-camera5"></i></a>
                                                </div>
                                            </div>

                                            <div class="panel-collapse collapse" id="lucy_smith">
                                                <div class="chat">
                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            <span class="typing"></span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc volutpat commodo ullamcorper. Vivamus consequat sapien ac ante pharetra pellentesque. Sed molestie leo vitae erat sagittis, ac posuere nibh faucibus. In nec massa suscipit, sagittis ligula non, accumsan velit.
                                                            Pellentesque habitant morbi tristique senectus et netus et malesuada fames.
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">10 Nov, 2013</div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Aenean dictum vitae tortor vitae placerat. Donec tristique urna tellus, porttitor commodo quam facilisis sit amet. Pellentesque ullamcorper metus sed libero imperdiet, id consequat libero malesuada. Aenean mattis, nisl nec sodales adipiscing, nunc mauris volutpat nulla, quis dictum sapien nibh vitae metus. Fusce vehicula aliquam enim, sed viverra ipsum elementum at
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nulla venenatis enim et mi egestas blandit. Praesent in consequat eros, et sagittis metus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Mauris at tellus viverra, lobortis elit non, luctus dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla in ornare ligula. Sed in pellentesque justo, vitae tristique urna. Vestibulum congue ligula ac posuere pharetra
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">12 Nov, 2013</div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Pellentesque ut sollicitudin quam, et suscipit lectus. Duis accumsan, purus ac feugiat condimentum, sem risus eleifend mi, vitae sagittis nisi sem nec libero. Nunc mauris tellus, cursus vel faucibus non, accumsan quis risus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Morbi lacus nulla, tristique eu hendrerit non, auctor ut arcu. Morbi id ligula mi. Vivamus ultricies lobortis erat sed placerat. Etiam molestie urna pulvinar porta fringilla. Aenean vitae lacinia felis, id laoreet diam
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc laoreet aliquam enim adipiscing placerat. Donec ac ultricies nisi. Nunc vel varius ante, et luctus elit. In eros urna, dignissim vitae quam eu, facilisis lacinia leo
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <textarea name="enter-message" class="form-control" rows="3" cols="1" placeholder="Enter your message..."></textarea>
                                                <div class="message-controls">
                                                    <span class="pull-left"><i class="icon-checkmark-circle"></i> Some basic <a href="#" title="">HTML</a> is OK</span>
                                                    <div class="pull-right">
                                                        <div class="upload-options">
                                                            <a href="#" title="" class="tip" data-original-title="Smileys"><i class="icon-smiley"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Upload photo"><i class="icon-camera3"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Attach file"><i class="icon-attachment"></i></a>
                                                        </div>
                                                        <button type="button" class="btn btn-danger btn-loading" data-loading-text="<i class='icon-spinner7 spin'></i> Processing">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="message-list-header">Colleagues</li>

                                        <li>
                                            <div class="clearfix">
                                                <div class="chat-member">
                                                    <a href="#"><img src="http://placehold.it/300" alt=""></a> 
                                                    <h6>Angel Nowak <span class="status status-default"></span> <small>&nbsp; /&nbsp; Usability expert</small></h6>
                                                </div>
                                                <div class="chat-actions">
                                                    <a class="btn btn-link btn-icon btn-xs" data-toggle="collapse" href="#angel_nowak"><i class="icon-bubble3"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-phone2"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-camera5"></i></a>
                                                </div>
                                            </div>

                                            <div class="panel-collapse collapse" id="angel_nowak">
                                                <div class="chat">
                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            <span class="typing"></span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc volutpat commodo ullamcorper. Vivamus consequat sapien ac ante pharetra pellentesque. Sed molestie leo vitae erat sagittis, ac posuere nibh faucibus. In nec massa suscipit, sagittis ligula non, accumsan velit.
                                                            Pellentesque habitant morbi tristique senectus et netus et malesuada fames.
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">10 Nov, 2013</div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Aenean dictum vitae tortor vitae placerat. Donec tristique urna tellus, porttitor commodo quam facilisis sit amet. Pellentesque ullamcorper metus sed libero imperdiet, id consequat libero malesuada. Aenean mattis, nisl nec sodales adipiscing, nunc mauris volutpat nulla, quis dictum sapien nibh vitae metus. Fusce vehicula aliquam enim, sed viverra ipsum elementum at
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nulla venenatis enim et mi egestas blandit. Praesent in consequat eros, et sagittis metus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Mauris at tellus viverra, lobortis elit non, luctus dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla in ornare ligula. Sed in pellentesque justo, vitae tristique urna. Vestibulum congue ligula ac posuere pharetra
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">12 Nov, 2013</div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Pellentesque ut sollicitudin quam, et suscipit lectus. Duis accumsan, purus ac feugiat condimentum, sem risus eleifend mi, vitae sagittis nisi sem nec libero. Nunc mauris tellus, cursus vel faucibus non, accumsan quis risus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Morbi lacus nulla, tristique eu hendrerit non, auctor ut arcu. Morbi id ligula mi. Vivamus ultricies lobortis erat sed placerat. Etiam molestie urna pulvinar porta fringilla. Aenean vitae lacinia felis, id laoreet diam
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc laoreet aliquam enim adipiscing placerat. Donec ac ultricies nisi. Nunc vel varius ante, et luctus elit. In eros urna, dignissim vitae quam eu, facilisis lacinia leo
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <textarea name="enter-message" class="form-control" rows="3" cols="1" placeholder="Enter your message..."></textarea>
                                                <div class="message-controls">
                                                    <span class="pull-left"><i class="icon-checkmark-circle"></i> Some basic <a href="#" title="">HTML</a> is OK</span>
                                                    <div class="pull-right">
                                                        <div class="upload-options">
                                                            <a href="#" title="" class="tip" data-original-title="Smileys"><i class="icon-smiley"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Upload photo"><i class="icon-camera3"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Attach file"><i class="icon-attachment"></i></a>
                                                        </div>
                                                        <button type="button" class="btn btn-danger btn-loading" data-loading-text="<i class='icon-spinner7 spin'></i> Processing">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="clearfix">
                                                <div class="chat-member">
                                                    <a href="#"><img src="http://placehold.it/300" alt=""></a> 
                                                    <h6>Vin Dins <span class="status status-danger"></span> <small>&nbsp; /&nbsp; Wed developer</small></h6>
                                                </div>
                                                <div class="chat-actions">
                                                    <a class="btn btn-link btn-icon btn-xs" data-toggle="collapse" href="#vin_dins"><i class="icon-bubble3"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-phone2"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-camera5"></i></a>
                                                </div>
                                            </div>

                                            <div class="panel-collapse collapse" id="vin_dins">
                                                <div class="chat">
                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            <span class="typing"></span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc volutpat commodo ullamcorper. Vivamus consequat sapien ac ante pharetra pellentesque. Sed molestie leo vitae erat sagittis, ac posuere nibh faucibus. In nec massa suscipit, sagittis ligula non, accumsan velit.
                                                            Pellentesque habitant morbi tristique senectus et netus et malesuada fames.
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">10 Nov, 2013</div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Aenean dictum vitae tortor vitae placerat. Donec tristique urna tellus, porttitor commodo quam facilisis sit amet. Pellentesque ullamcorper metus sed libero imperdiet, id consequat libero malesuada. Aenean mattis, nisl nec sodales adipiscing, nunc mauris volutpat nulla, quis dictum sapien nibh vitae metus. Fusce vehicula aliquam enim, sed viverra ipsum elementum at
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nulla venenatis enim et mi egestas blandit. Praesent in consequat eros, et sagittis metus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Mauris at tellus viverra, lobortis elit non, luctus dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla in ornare ligula. Sed in pellentesque justo, vitae tristique urna. Vestibulum congue ligula ac posuere pharetra
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">12 Nov, 2013</div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Pellentesque ut sollicitudin quam, et suscipit lectus. Duis accumsan, purus ac feugiat condimentum, sem risus eleifend mi, vitae sagittis nisi sem nec libero. Nunc mauris tellus, cursus vel faucibus non, accumsan quis risus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Morbi lacus nulla, tristique eu hendrerit non, auctor ut arcu. Morbi id ligula mi. Vivamus ultricies lobortis erat sed placerat. Etiam molestie urna pulvinar porta fringilla. Aenean vitae lacinia felis, id laoreet diam
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc laoreet aliquam enim adipiscing placerat. Donec ac ultricies nisi. Nunc vel varius ante, et luctus elit. In eros urna, dignissim vitae quam eu, facilisis lacinia leo
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <textarea name="enter-message" class="form-control" rows="3" cols="1" placeholder="Enter your message..."></textarea>
                                                <div class="message-controls">
                                                    <span class="pull-left"><i class="icon-checkmark-circle"></i> Some basic <a href="#" title="">HTML</a> is OK</span>
                                                    <div class="pull-right">
                                                        <div class="upload-options">
                                                            <a href="#" title="" class="tip" data-original-title="Smileys"><i class="icon-smiley"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Upload photo"><i class="icon-camera3"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Attach file"><i class="icon-attachment"></i></a>
                                                        </div>
                                                        <button type="button" class="btn btn-danger btn-loading" data-loading-text="<i class='icon-spinner7 spin'></i> Processing">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="message-list-header">Remote team members</li>

                                        <li>
                                            <div class="clearfix">
                                                <div class="chat-member">
                                                    <a href="#"><img src="http://placehold.it/300" alt=""></a> 
                                                    <h6>Robert Razinsky <span class="status status-default"></span> <small>&nbsp; /&nbsp; Usability expert</small></h6>
                                                </div>
                                                <div class="chat-actions">
                                                    <a class="btn btn-link btn-icon btn-xs" data-toggle="collapse" href="#robert_razinsky"><i class="icon-bubble3"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-phone2"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-camera5"></i></a>
                                                </div>
                                            </div>

                                            <div class="panel-collapse collapse" id="robert_razinsky">
                                                <div class="chat">
                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            <span class="typing"></span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc volutpat commodo ullamcorper. Vivamus consequat sapien ac ante pharetra pellentesque. Sed molestie leo vitae erat sagittis, ac posuere nibh faucibus. In nec massa suscipit, sagittis ligula non, accumsan velit.
                                                            Pellentesque habitant morbi tristique senectus et netus et malesuada fames.
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">10 Nov, 2013</div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Aenean dictum vitae tortor vitae placerat. Donec tristique urna tellus, porttitor commodo quam facilisis sit amet. Pellentesque ullamcorper metus sed libero imperdiet, id consequat libero malesuada. Aenean mattis, nisl nec sodales adipiscing, nunc mauris volutpat nulla, quis dictum sapien nibh vitae metus. Fusce vehicula aliquam enim, sed viverra ipsum elementum at
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nulla venenatis enim et mi egestas blandit. Praesent in consequat eros, et sagittis metus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Mauris at tellus viverra, lobortis elit non, luctus dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla in ornare ligula. Sed in pellentesque justo, vitae tristique urna. Vestibulum congue ligula ac posuere pharetra
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">12 Nov, 2013</div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Pellentesque ut sollicitudin quam, et suscipit lectus. Duis accumsan, purus ac feugiat condimentum, sem risus eleifend mi, vitae sagittis nisi sem nec libero. Nunc mauris tellus, cursus vel faucibus non, accumsan quis risus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Morbi lacus nulla, tristique eu hendrerit non, auctor ut arcu. Morbi id ligula mi. Vivamus ultricies lobortis erat sed placerat. Etiam molestie urna pulvinar porta fringilla. Aenean vitae lacinia felis, id laoreet diam
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc laoreet aliquam enim adipiscing placerat. Donec ac ultricies nisi. Nunc vel varius ante, et luctus elit. In eros urna, dignissim vitae quam eu, facilisis lacinia leo
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <textarea name="enter-message" class="form-control" rows="3" cols="1" placeholder="Enter your message..."></textarea>
                                                <div class="message-controls">
                                                    <span class="pull-left"><i class="icon-checkmark-circle"></i> Some basic <a href="#" title="">HTML</a> is OK</span>
                                                    <div class="pull-right">
                                                        <div class="upload-options">
                                                            <a href="#" title="" class="tip" data-original-title="Smileys"><i class="icon-smiley"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Upload photo"><i class="icon-camera3"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Attach file"><i class="icon-attachment"></i></a>
                                                        </div>
                                                        <button type="button" class="btn btn-danger btn-loading" data-loading-text="<i class='icon-spinner7 spin'></i> Processing">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="clearfix">
                                                <div class="chat-member">
                                                    <a href="#"><img src="http://placehold.it/300" alt=""></a> 
                                                    <h6>Mary Robinson <span class="status status-danger"></span> <small>&nbsp; /&nbsp; Wed developer</small></h6>
                                                </div>
                                                <div class="chat-actions">
                                                    <a class="btn btn-link btn-icon btn-xs" data-toggle="collapse" href="#mary_robinson"><i class="icon-bubble3"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-phone2"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-camera5"></i></a>
                                                </div>
                                            </div>

                                            <div class="panel-collapse collapse" id="mary_robinson">
                                                <div class="chat">
                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            <span class="typing"></span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc volutpat commodo ullamcorper. Vivamus consequat sapien ac ante pharetra pellentesque. Sed molestie leo vitae erat sagittis, ac posuere nibh faucibus. In nec massa suscipit, sagittis ligula non, accumsan velit.
                                                            Pellentesque habitant morbi tristique senectus et netus et malesuada fames.
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">10 Nov, 2013</div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Aenean dictum vitae tortor vitae placerat. Donec tristique urna tellus, porttitor commodo quam facilisis sit amet. Pellentesque ullamcorper metus sed libero imperdiet, id consequat libero malesuada. Aenean mattis, nisl nec sodales adipiscing, nunc mauris volutpat nulla, quis dictum sapien nibh vitae metus. Fusce vehicula aliquam enim, sed viverra ipsum elementum at
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nulla venenatis enim et mi egestas blandit. Praesent in consequat eros, et sagittis metus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Mauris at tellus viverra, lobortis elit non, luctus dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla in ornare ligula. Sed in pellentesque justo, vitae tristique urna. Vestibulum congue ligula ac posuere pharetra
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">12 Nov, 2013</div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Pellentesque ut sollicitudin quam, et suscipit lectus. Duis accumsan, purus ac feugiat condimentum, sem risus eleifend mi, vitae sagittis nisi sem nec libero. Nunc mauris tellus, cursus vel faucibus non, accumsan quis risus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Morbi lacus nulla, tristique eu hendrerit non, auctor ut arcu. Morbi id ligula mi. Vivamus ultricies lobortis erat sed placerat. Etiam molestie urna pulvinar porta fringilla. Aenean vitae lacinia felis, id laoreet diam
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc laoreet aliquam enim adipiscing placerat. Donec ac ultricies nisi. Nunc vel varius ante, et luctus elit. In eros urna, dignissim vitae quam eu, facilisis lacinia leo
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <textarea name="enter-message" class="form-control" rows="3" cols="1" placeholder="Enter your message..."></textarea>
                                                <div class="message-controls">
                                                    <span class="pull-left"><i class="icon-checkmark-circle"></i> Some basic <a href="#" title="">HTML</a> is OK</span>
                                                    <div class="pull-right">
                                                        <div class="upload-options">
                                                            <a href="#" title="" class="tip" data-original-title="Smileys"><i class="icon-smiley"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Upload photo"><i class="icon-camera3"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Attach file"><i class="icon-attachment"></i></a>
                                                        </div>
                                                        <button type="button" class="btn btn-danger btn-loading" data-loading-text="<i class='icon-spinner7 spin'></i> Processing">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                                <!-- contacts (list) -->


                                <!-- WYSIWYG editor -->
                                <h6><i class="icon-bubble6"></i> Share your thoughts</h6>
                                <form class="block well" action="#" role="form">
                                    <div class="block-inner">
                                        <textarea class="editor" placeholder="Create new entry..."></textarea>
                                    </div>
                                    <div class="form-actions text-right">
                                        <button type="submit" class="btn btn-danger">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                                <!-- /WYSIWYG editor -->


                                <!-- Alert -->
                                <div class="alert alert-warning fade in block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <i class="icon-info"></i> Nullam tincidunt dapibus nisi. Aenean porttitor egestas dolor, ut pretium enim vehicula at. Vivamus vulputate risus felis, eget blandit urna aliquam at
                                </div>
                                <!-- /alert -->


                                <!-- Recent activity -->
                                <div class="block">
                                    <h6 class="heading-hr"><i class="icon-people"></i> Recent activity</h6>
                                    <ul class="media-list">
                                        <li class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object" src="http://placehold.it/300" alt="">
                                            </a>
                                            <div class="media-body">
                                                <div class="clearfix">
                                                    <a href="#" class="media-heading">Eugene Kopyov</a>
                                                    <span class="media-notice">December 10, 2013 / 10:20 pm</span>
                                                </div>
                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                                            </div>
                                        </li>

                                        <li class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object" src="http://placehold.it/300" alt="">
                                            </a>
                                            <div class="media-body">
                                                <div class="clearfix">
                                                    <a href="#" class="media-heading">Martin Wolf</a>
                                                    <span class="media-notice">December 12, 2013 / 10:14 pm</span>
                                                </div>
                                                Cras tempus pretium ligula, quis viverra purus eleifend et.
                                            </div>
                                        </li>

                                        <li class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object" src="http://placehold.it/300" alt="">
                                            </a>
                                            <div class="media-body">
                                                <div class="clearfix">
                                                    <a href="#" class="media-heading">Duncan McMart</a>
                                                    <span class="media-notice">January 3, 2014 / 12:14 pm</span>
                                                </div>
                                                Quisque dignissim nibh nec massa egestas interdum. Proin congue vulputate velit, sodales mattis neque tempor a.
                                            </div>
                                        </li>

                                        <li class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object" src="http://placehold.it/300" alt="">
                                            </a>
                                            <div class="media-body">
                                                <div class="clearfix">
                                                    <a href="#" class="media-heading">Lucy Smith</a>
                                                    <span class="media-notice">January 22, 2014 / 10:26 pm</span>
                                                </div>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget orci non sem sodales dictum.
                                            </div>
                                        </li>

                                        <li class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object" src="http://placehold.it/300" alt="">
                                            </a>
                                            <div class="media-body">
                                                <div class="clearfix">
                                                    <a href="#" class="media-heading">Angel Nowak</a>
                                                    <span class="media-notice">January 24, 2014 / 10:20 am</span>
                                                </div>
                                                Mauris vulputate bibendum justo non pretium. Sed eleifend, est vitae pellentesque condimentum, lacus ligula consectetur dolor, a congue metus odio ut neque.
                                            </div>
                                        </li>

                                        <li class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object" src="http://placehold.it/300" alt="">
                                            </a>
                                            <div class="media-body">
                                                <div class="clearfix">
                                                    <a href="#" class="media-heading">Barbara Madison</a>
                                                    <span class="media-notice">February 2, 2014 / 10:47 pm</span>
                                                </div>
                                                Nullam vel massa blandit turpis sodales consectetur. Maecenas non mattis purus. Nullam vitae risus eu est.
                                            </div>
                                        </li>

                                        <li class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object" src="http://placehold.it/300" alt="">
                                            </a>
                                            <div class="media-body">
                                                <div class="clearfix">
                                                    <a href="#" class="media-heading">James Willings</a>
                                                    <span class="media-notice">February 16, 2014 / 07:28 am</span>
                                                </div>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc purus lacus, consequat et dui ut, ullamcorper sollicitudin lorem. Donec gravida eget nisi eget congue. Sed varius sollicitudin adipiscing.
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /recent activity -->

                            </div>
                            <!-- /first tab -->


                            <!-- Second tab -->
                            <div class="tab-pane fade" id="stats">

                                <!-- Stats graphs -->
                                <h6><i class="icon-bars"></i> Profile statistics</h6>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="block">
                                            <div class="bg-success realtime-stats">
                                                <div id="updating-widget-1" class="graph"></div>
                                            </div>

                                            <div class="section-details text-center container-fluid">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        13.5 M <span>total visits</span>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        12.245 <span>new visitors</span>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        $34.290 <span>current balance</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="block">
                                            <div class="bg-info realtime-stats">
                                                <div id="updating-widget-2" class="graph"></div>
                                            </div>

                                            <div class="section-details text-center container-fluid">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        431 <span>new orders</span>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        45.209 <span>total orders</span>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        $51.356 <span>total value</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="block">
                                            <div class="bg-danger realtime-stats">
                                                <div id="updating-widget-3" class="graph"></div>
                                            </div>

                                            <div class="section-details text-center container-fluid">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        35.1 Gb <span>data uploaded</span>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        92.56 Gb <span>data downloaded</span>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        104.45 Gb <span>available space</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /stats graphs -->


                                <!-- Auto updating graph (filled) -->
                                <div class="block">
                                    <h6><i class="icon-calendar2"></i> Filled updating graph</h6>
                                    <div class="graph-standard" id="auto_filled"></div>
                                </div>
                                <!-- /auto updating graph (filled) -->


                                <!-- Animated graphs -->
                                <div class="row">
                                    <div class="col-md-6">

                                        <!-- Animated graph 1 -->
                                        <div class="block">
                                            <h6><i class="icon-calendar2"></i> Animated graph 1</h6>
                                            <div class="graph-standard" id="animated_1"></div>
                                        </div>
                                        <!-- /animated graph 1 -->

                                    </div>

                                    <div class="col-md-6">

                                        <!-- Animated graph 2 -->
                                        <div class="block">
                                            <h6><i class="icon-calendar2"></i> Animated graph 2</h6>
                                            <div class="graph-standard" id="animated_2"></div>
                                        </div>
                                        <!-- /animated graph 2 -->

                                    </div>
                                </div>
                                <!-- /animated graphs -->

                            </div>
                            <!-- /second tab -->


                            <!-- Third tab -->
                            <div class="tab-pane fade" id="profile-messages">
                                <div class="chat-member-heading clearfix">
                                    <h6 class="pull-left"><i class="icon-bubbles"></i> Messages</small></h6>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-primary btn-icon btn-xs"><i class="icon-plus-circle"></i></a>
                                    </div>
                                </div>
                                <div class="block">
                                    <ul class="message-list">
                                        <li>
                                            <div class="clearfix">
                                                <div class="chat-member">
                                                    <a href="#"><img src="http://placehold.it/300" alt=""></a> 
                                                    <h6>Eugene Kopyov <span class="user-online"></span> <small>/ &nbsp; Wed developer</small></h6>
                                                </div>
                                                <div class="chat-actions">
                                                    <a class="btn btn-link btn-icon btn-xs" data-toggle="collapse" href="#eugene"><i class="icon-bubble3"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-phone2"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-camera5"></i></a>
                                                </div>
                                            </div>

                                            <div class="panel-collapse collapse" id="eugene">
                                                <div class="chat">
                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            <span class="typing"></span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc volutpat commodo ullamcorper. Vivamus consequat sapien ac ante pharetra pellentesque. Sed molestie leo vitae erat sagittis, ac posuere nibh faucibus. In nec massa suscipit, sagittis ligula non, accumsan velit.
                                                            Pellentesque habitant morbi tristique senectus et netus et malesuada fames.
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">10 Nov, 2013</div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Aenean dictum vitae tortor vitae placerat. Donec tristique urna tellus, porttitor commodo quam facilisis sit amet. Pellentesque ullamcorper metus sed libero imperdiet, id consequat libero malesuada. Aenean mattis, nisl nec sodales adipiscing, nunc mauris volutpat nulla, quis dictum sapien nibh vitae metus. Fusce vehicula aliquam enim, sed viverra ipsum elementum at
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nulla venenatis enim et mi egestas blandit. Praesent in consequat eros, et sagittis metus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Mauris at tellus viverra, lobortis elit non, luctus dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla in ornare ligula. Sed in pellentesque justo, vitae tristique urna. Vestibulum congue ligula ac posuere pharetra
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">12 Nov, 2013</div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Pellentesque ut sollicitudin quam, et suscipit lectus. Duis accumsan, purus ac feugiat condimentum, sem risus eleifend mi, vitae sagittis nisi sem nec libero. Nunc mauris tellus, cursus vel faucibus non, accumsan quis risus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Morbi lacus nulla, tristique eu hendrerit non, auctor ut arcu. Morbi id ligula mi. Vivamus ultricies lobortis erat sed placerat. Etiam molestie urna pulvinar porta fringilla. Aenean vitae lacinia felis, id laoreet diam
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc laoreet aliquam enim adipiscing placerat. Donec ac ultricies nisi. Nunc vel varius ante, et luctus elit. In eros urna, dignissim vitae quam eu, facilisis lacinia leo
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <textarea name="enter-message" class="form-control" rows="3" cols="1" placeholder="Enter your message..."></textarea>
                                                <div class="message-controls">
                                                    <span class="pull-left"><i class="icon-checkmark-circle"></i> Some basic <a href="#" title="">HTML</a> is OK</span>
                                                    <div class="pull-right">
                                                        <div class="upload-options">
                                                            <a href="#" title="" class="tip" data-original-title="Smileys"><i class="icon-smiley"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Upload photo"><i class="icon-camera3"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Attach file"><i class="icon-attachment"></i></a>
                                                        </div>
                                                        <button type="button" class="btn btn-danger btn-loading" data-loading-text="<i class='icon-spinner7 spin'></i> Processing">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="clearfix">
                                                <div class="chat-member">
                                                    <a href="#"><img src="http://placehold.it/300" alt=""></a> 
                                                    <h6>Duncan McMart <span class="user-offline"></span> <small>/ &nbsp; Wed designer</small></h6>
                                                </div>
                                                <div class="chat-actions">
                                                    <a class="btn btn-link btn-icon btn-xs" data-toggle="collapse" href="#duncan"><i class="icon-bubble3"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-phone2"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-camera5"></i></a>
                                                </div>
                                            </div>

                                            <div class="panel-collapse collapse" id="duncan">
                                                <div class="chat">
                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            <span class="typing"></span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc volutpat commodo ullamcorper. Vivamus consequat sapien ac ante pharetra pellentesque. Sed molestie leo vitae erat sagittis, ac posuere nibh faucibus. In nec massa suscipit, sagittis ligula non, accumsan velit.
                                                            Pellentesque habitant morbi tristique senectus et netus et malesuada fames.
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">10 Nov, 2013</div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Aenean dictum vitae tortor vitae placerat. Donec tristique urna tellus, porttitor commodo quam facilisis sit amet. Pellentesque ullamcorper metus sed libero imperdiet, id consequat libero malesuada. Aenean mattis, nisl nec sodales adipiscing, nunc mauris volutpat nulla, quis dictum sapien nibh vitae metus. Fusce vehicula aliquam enim, sed viverra ipsum elementum at
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nulla venenatis enim et mi egestas blandit. Praesent in consequat eros, et sagittis metus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Mauris at tellus viverra, lobortis elit non, luctus dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla in ornare ligula. Sed in pellentesque justo, vitae tristique urna. Vestibulum congue ligula ac posuere pharetra
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">12 Nov, 2013</div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Pellentesque ut sollicitudin quam, et suscipit lectus. Duis accumsan, purus ac feugiat condimentum, sem risus eleifend mi, vitae sagittis nisi sem nec libero. Nunc mauris tellus, cursus vel faucibus non, accumsan quis risus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Morbi lacus nulla, tristique eu hendrerit non, auctor ut arcu. Morbi id ligula mi. Vivamus ultricies lobortis erat sed placerat. Etiam molestie urna pulvinar porta fringilla. Aenean vitae lacinia felis, id laoreet diam
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc laoreet aliquam enim adipiscing placerat. Donec ac ultricies nisi. Nunc vel varius ante, et luctus elit. In eros urna, dignissim vitae quam eu, facilisis lacinia leo
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <textarea name="enter-message" class="form-control" rows="3" cols="1" placeholder="Enter your message..."></textarea>
                                                <div class="message-controls">
                                                    <span class="pull-left"><i class="icon-checkmark-circle"></i> Some basic <a href="#" title="">HTML</a> is OK</span>
                                                    <div class="pull-right">
                                                        <div class="upload-options">
                                                            <a href="#" title="" class="tip" data-original-title="Smileys"><i class="icon-smiley"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Upload photo"><i class="icon-camera3"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Attach file"><i class="icon-attachment"></i></a>
                                                        </div>
                                                        <button type="button" class="btn btn-danger btn-loading" data-loading-text="<i class='icon-spinner7 spin'></i> Processing">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="clearfix">
                                                <div class="chat-member">
                                                    <a href="#"><img src="http://placehold.it/300" alt=""></a> 
                                                    <h6>Lucy Smith <span class="user-away"></span> <small>/ &nbsp; UI expert</small></h6>
                                                </div>
                                                <div class="chat-actions">
                                                    <a class="btn btn-link btn-icon btn-xs" data-toggle="collapse" href="#lucy"><i class="icon-bubble3"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-phone2"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-camera5"></i></a>
                                                </div>
                                            </div>

                                            <div class="panel-collapse collapse in" id="lucy">
                                                <div class="chat">
                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            <span class="typing"></span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc volutpat commodo ullamcorper. Vivamus consequat sapien ac ante pharetra pellentesque. Sed molestie leo vitae erat sagittis, ac posuere nibh faucibus. In nec massa suscipit, sagittis ligula non, accumsan velit.
                                                            Pellentesque habitant morbi tristique senectus et netus et malesuada fames.
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">10 Nov, 2013</div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Aenean dictum vitae tortor vitae placerat. Donec tristique urna tellus, porttitor commodo quam facilisis sit amet. Pellentesque ullamcorper metus sed libero imperdiet, id consequat libero malesuada. Aenean mattis, nisl nec sodales adipiscing, nunc mauris volutpat nulla, quis dictum sapien nibh vitae metus. Fusce vehicula aliquam enim, sed viverra ipsum elementum at
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nulla venenatis enim et mi egestas blandit. Praesent in consequat eros, et sagittis metus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Mauris at tellus viverra, lobortis elit non, luctus dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla in ornare ligula. Sed in pellentesque justo, vitae tristique urna. Vestibulum congue ligula ac posuere pharetra
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">12 Nov, 2013</div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Pellentesque ut sollicitudin quam, et suscipit lectus. Duis accumsan, purus ac feugiat condimentum, sem risus eleifend mi, vitae sagittis nisi sem nec libero. Nunc mauris tellus, cursus vel faucibus non, accumsan quis risus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Morbi lacus nulla, tristique eu hendrerit non, auctor ut arcu. Morbi id ligula mi. Vivamus ultricies lobortis erat sed placerat. Etiam molestie urna pulvinar porta fringilla. Aenean vitae lacinia felis, id laoreet diam
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc laoreet aliquam enim adipiscing placerat. Donec ac ultricies nisi. Nunc vel varius ante, et luctus elit. In eros urna, dignissim vitae quam eu, facilisis lacinia leo
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <textarea name="enter-message" class="form-control" rows="3" cols="1" placeholder="Enter your message..."></textarea>
                                                <div class="message-controls">
                                                    <span class="pull-left"><i class="icon-checkmark-circle"></i> Some basic <a href="#" title="">HTML</a> is OK</span>
                                                    <div class="pull-right">
                                                        <div class="upload-options">
                                                            <a href="#" title="" class="tip" data-original-title="Smileys"><i class="icon-smiley"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Upload photo"><i class="icon-camera3"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Attach file"><i class="icon-attachment"></i></a>
                                                        </div>
                                                        <button type="button" class="btn btn-danger btn-loading" data-loading-text="<i class='icon-spinner7 spin'></i> Processing">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="clearfix">
                                                <div class="chat-member">
                                                    <a href="#"><img src="http://placehold.it/300" alt=""></a> 
                                                    <h6>James Jameson <span class="user-away"></span> <small>/ &nbsp; Engineer</small></h6>
                                                </div>
                                                <div class="chat-actions">
                                                    <a class="btn btn-link btn-icon btn-xs" data-toggle="collapse" href="#james"><i class="icon-bubble3"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-phone2"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-camera5"></i></a>
                                                </div>
                                            </div>

                                            <div class="panel-collapse collapse" id="james">
                                                <div class="chat">
                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            <span class="typing"></span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc volutpat commodo ullamcorper. Vivamus consequat sapien ac ante pharetra pellentesque. Sed molestie leo vitae erat sagittis, ac posuere nibh faucibus. In nec massa suscipit, sagittis ligula non, accumsan velit.
                                                            Pellentesque habitant morbi tristique senectus et netus et malesuada fames.
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">10 Nov, 2013</div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Aenean dictum vitae tortor vitae placerat. Donec tristique urna tellus, porttitor commodo quam facilisis sit amet. Pellentesque ullamcorper metus sed libero imperdiet, id consequat libero malesuada. Aenean mattis, nisl nec sodales adipiscing, nunc mauris volutpat nulla, quis dictum sapien nibh vitae metus. Fusce vehicula aliquam enim, sed viverra ipsum elementum at
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nulla venenatis enim et mi egestas blandit. Praesent in consequat eros, et sagittis metus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Mauris at tellus viverra, lobortis elit non, luctus dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla in ornare ligula. Sed in pellentesque justo, vitae tristique urna. Vestibulum congue ligula ac posuere pharetra
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">12 Nov, 2013</div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Pellentesque ut sollicitudin quam, et suscipit lectus. Duis accumsan, purus ac feugiat condimentum, sem risus eleifend mi, vitae sagittis nisi sem nec libero. Nunc mauris tellus, cursus vel faucibus non, accumsan quis risus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Morbi lacus nulla, tristique eu hendrerit non, auctor ut arcu. Morbi id ligula mi. Vivamus ultricies lobortis erat sed placerat. Etiam molestie urna pulvinar porta fringilla. Aenean vitae lacinia felis, id laoreet diam
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc laoreet aliquam enim adipiscing placerat. Donec ac ultricies nisi. Nunc vel varius ante, et luctus elit. In eros urna, dignissim vitae quam eu, facilisis lacinia leo
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <textarea name="enter-message" class="form-control" rows="3" cols="1" placeholder="Enter your message..."></textarea>
                                                <div class="message-controls">
                                                    <span class="pull-left"><i class="icon-checkmark-circle"></i> Some basic <a href="#" title="">HTML</a> is OK</span>
                                                    <div class="pull-right">
                                                        <div class="upload-options">
                                                            <a href="#" title="" class="tip" data-original-title="Smileys"><i class="icon-smiley"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Upload photo"><i class="icon-camera3"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Attach file"><i class="icon-attachment"></i></a>
                                                        </div>
                                                        <button type="button" class="btn btn-danger btn-loading" data-loading-text="<i class='icon-spinner7 spin'></i> Processing">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="clearfix">
                                                <div class="chat-member">
                                                    <a href="#"><img src="http://placehold.it/300" alt=""></a> 
                                                    <h6>Angel Nowak <span class="user-offline"></span> <small>/ &nbsp; Usability expert</small></h6>
                                                </div>
                                                <div class="chat-actions">
                                                    <a class="btn btn-link btn-icon btn-xs" data-toggle="collapse" href="#angel"><i class="icon-bubble3"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-phone2"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-camera5"></i></a>
                                                </div>
                                            </div>

                                            <div class="panel-collapse collapse" id="angel">
                                                <div class="chat">
                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            <span class="typing"></span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc volutpat commodo ullamcorper. Vivamus consequat sapien ac ante pharetra pellentesque. Sed molestie leo vitae erat sagittis, ac posuere nibh faucibus. In nec massa suscipit, sagittis ligula non, accumsan velit.
                                                            Pellentesque habitant morbi tristique senectus et netus et malesuada fames.
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">10 Nov, 2013</div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Aenean dictum vitae tortor vitae placerat. Donec tristique urna tellus, porttitor commodo quam facilisis sit amet. Pellentesque ullamcorper metus sed libero imperdiet, id consequat libero malesuada. Aenean mattis, nisl nec sodales adipiscing, nunc mauris volutpat nulla, quis dictum sapien nibh vitae metus. Fusce vehicula aliquam enim, sed viverra ipsum elementum at
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nulla venenatis enim et mi egestas blandit. Praesent in consequat eros, et sagittis metus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Mauris at tellus viverra, lobortis elit non, luctus dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla in ornare ligula. Sed in pellentesque justo, vitae tristique urna. Vestibulum congue ligula ac posuere pharetra
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">12 Nov, 2013</div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Pellentesque ut sollicitudin quam, et suscipit lectus. Duis accumsan, purus ac feugiat condimentum, sem risus eleifend mi, vitae sagittis nisi sem nec libero. Nunc mauris tellus, cursus vel faucibus non, accumsan quis risus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Morbi lacus nulla, tristique eu hendrerit non, auctor ut arcu. Morbi id ligula mi. Vivamus ultricies lobortis erat sed placerat. Etiam molestie urna pulvinar porta fringilla. Aenean vitae lacinia felis, id laoreet diam
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc laoreet aliquam enim adipiscing placerat. Donec ac ultricies nisi. Nunc vel varius ante, et luctus elit. In eros urna, dignissim vitae quam eu, facilisis lacinia leo
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <textarea name="enter-message" class="form-control" rows="3" cols="1" placeholder="Enter your message..."></textarea>
                                                <div class="message-controls">
                                                    <span class="pull-left"><i class="icon-checkmark-circle"></i> Some basic <a href="#" title="">HTML</a> is OK</span>
                                                    <div class="pull-right">
                                                        <div class="upload-options">
                                                            <a href="#" title="" class="tip" data-original-title="Smileys"><i class="icon-smiley"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Upload photo"><i class="icon-camera3"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Attach file"><i class="icon-attachment"></i></a>
                                                        </div>
                                                        <button type="button" class="btn btn-danger btn-loading" data-loading-text="<i class='icon-spinner7 spin'></i> Processing">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="clearfix">
                                                <div class="chat-member">
                                                    <a href="#"><img src="http://placehold.it/300" alt=""></a> 
                                                    <h6>Vin Dins <span class="user-busy"></span> <small>/ &nbsp; Wed developer</small></h6>
                                                </div>
                                                <div class="chat-actions">
                                                    <a class="btn btn-link btn-icon btn-xs" data-toggle="collapse" href="#vin"><i class="icon-bubble3"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-phone2"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-camera5"></i></a>
                                                </div>
                                            </div>

                                            <div class="panel-collapse collapse" id="vin">
                                                <div class="chat">
                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            <span class="typing"></span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc volutpat commodo ullamcorper. Vivamus consequat sapien ac ante pharetra pellentesque. Sed molestie leo vitae erat sagittis, ac posuere nibh faucibus. In nec massa suscipit, sagittis ligula non, accumsan velit.
                                                            Pellentesque habitant morbi tristique senectus et netus et malesuada fames.
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">10 Nov, 2013</div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Aenean dictum vitae tortor vitae placerat. Donec tristique urna tellus, porttitor commodo quam facilisis sit amet. Pellentesque ullamcorper metus sed libero imperdiet, id consequat libero malesuada. Aenean mattis, nisl nec sodales adipiscing, nunc mauris volutpat nulla, quis dictum sapien nibh vitae metus. Fusce vehicula aliquam enim, sed viverra ipsum elementum at
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nulla venenatis enim et mi egestas blandit. Praesent in consequat eros, et sagittis metus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Mauris at tellus viverra, lobortis elit non, luctus dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla in ornare ligula. Sed in pellentesque justo, vitae tristique urna. Vestibulum congue ligula ac posuere pharetra
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">12 Nov, 2013</div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Pellentesque ut sollicitudin quam, et suscipit lectus. Duis accumsan, purus ac feugiat condimentum, sem risus eleifend mi, vitae sagittis nisi sem nec libero. Nunc mauris tellus, cursus vel faucibus non, accumsan quis risus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Morbi lacus nulla, tristique eu hendrerit non, auctor ut arcu. Morbi id ligula mi. Vivamus ultricies lobortis erat sed placerat. Etiam molestie urna pulvinar porta fringilla. Aenean vitae lacinia felis, id laoreet diam
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc laoreet aliquam enim adipiscing placerat. Donec ac ultricies nisi. Nunc vel varius ante, et luctus elit. In eros urna, dignissim vitae quam eu, facilisis lacinia leo
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <textarea name="enter-message" class="form-control" rows="3" cols="1" placeholder="Enter your message..."></textarea>
                                                <div class="message-controls">
                                                    <span class="pull-left"><i class="icon-checkmark-circle"></i> Some basic <a href="#" title="">HTML</a> is OK</span>
                                                    <div class="pull-right">
                                                        <div class="upload-options">
                                                            <a href="#" title="" class="tip" data-original-title="Smileys"><i class="icon-smiley"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Upload photo"><i class="icon-camera3"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Attach file"><i class="icon-attachment"></i></a>
                                                        </div>
                                                        <button type="button" class="btn btn-danger btn-loading" data-loading-text="<i class='icon-spinner7 spin'></i> Processing">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="clearfix">
                                                <div class="chat-member">
                                                    <a href="#"><img src="http://placehold.it/300" alt=""></a> 
                                                    <h6>John Doe <span class="user-online"></span> <small>/ &nbsp; Wed developer</small></h6>
                                                </div>
                                                <div class="chat-actions">
                                                    <a class="btn btn-link btn-icon btn-xs" data-toggle="collapse" href="#john"><i class="icon-bubble3"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-phone2"></i></a>
                                                    <a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-camera5"></i></a>
                                                </div>
                                            </div>

                                            <div class="panel-collapse collapse" id="john">
                                                <div class="chat">
                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            <span class="typing"></span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc volutpat commodo ullamcorper. Vivamus consequat sapien ac ante pharetra pellentesque. Sed molestie leo vitae erat sagittis, ac posuere nibh faucibus. In nec massa suscipit, sagittis ligula non, accumsan velit.
                                                            Pellentesque habitant morbi tristique senectus et netus et malesuada fames.
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">10 Nov, 2013</div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Aenean dictum vitae tortor vitae placerat. Donec tristique urna tellus, porttitor commodo quam facilisis sit amet. Pellentesque ullamcorper metus sed libero imperdiet, id consequat libero malesuada. Aenean mattis, nisl nec sodales adipiscing, nunc mauris volutpat nulla, quis dictum sapien nibh vitae metus. Fusce vehicula aliquam enim, sed viverra ipsum elementum at
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nulla venenatis enim et mi egestas blandit. Praesent in consequat eros, et sagittis metus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Mauris at tellus viverra, lobortis elit non, luctus dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla in ornare ligula. Sed in pellentesque justo, vitae tristique urna. Vestibulum congue ligula ac posuere pharetra
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="moment">12 Nov, 2013</div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Pellentesque ut sollicitudin quam, et suscipit lectus. Duis accumsan, purus ac feugiat condimentum, sem risus eleifend mi, vitae sagittis nisi sem nec libero. Nunc mauris tellus, cursus vel faucibus non, accumsan quis risus
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Morbi lacus nulla, tristique eu hendrerit non, auctor ut arcu. Morbi id ligula mi. Vivamus ultricies lobortis erat sed placerat. Etiam molestie urna pulvinar porta fringilla. Aenean vitae lacinia felis, id laoreet diam
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>

                                                    <div class="message reversed">
                                                        <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                                                        <div class="message-body">
                                                            Nunc laoreet aliquam enim adipiscing placerat. Donec ac ultricies nisi. Nunc vel varius ante, et luctus elit. In eros urna, dignissim vitae quam eu, facilisis lacinia leo
                                                            <span class="attribution">14:23pm, 4th Dec 2010</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <textarea name="enter-message" class="form-control" rows="3" cols="1" placeholder="Enter your message..."></textarea>
                                                <div class="message-controls">
                                                    <span class="pull-left"><i class="icon-checkmark-circle"></i> Some basic <a href="#" title="">HTML</a> is OK</span>
                                                    <div class="pull-right">
                                                        <div class="upload-options">
                                                            <a href="#" title="" class="tip" data-original-title="Smileys"><i class="icon-smiley"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Upload photo"><i class="icon-camera3"></i></a>
                                                            <a href="#" title="" class="tip" data-original-title="Attach file"><i class="icon-attachment"></i></a>
                                                        </div>
                                                        <button type="button" class="btn btn-danger btn-loading" data-loading-text="<i class='icon-spinner7 spin'></i> Processing">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /third tab -->


                            <!-- Fourth tab -->
                            <div class="tab-pane fade" id="tasks">

                                <!-- Tasks table -->
                                <div class="block">
                                    <h6 class="heading-hr"><i class="icon-settings"></i> My Tasks</h6>
                                    <div class="datatable-tasks">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Task Description</th>
                                                    <th class="task-priority">Priority</th>
                                                    <th class="task-date-added">Date Added</th>
                                                    <th class="task-progress">Progress</th>
                                                    <th class="task-deadline">Deadline</th>
                                                    <th class="task-tools text-center">Tools</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="task-desc">
                                                        <a href="task_detailed.html">Donec suscipit ultrices commodo. Suspendisse potenti</a>
                                                        <span>General layout additions</span>
                                                    </td>
                                                    <td class="text-center"><span class="label label-danger">High</span></td>
                                                    <td>September 20, 2013</td>
                                                    <td>
                                                        <div class="progress progress-micro">
                                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                                                <span class="sr-only">90% Complete</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon-clock"></i> <strong class="text-danger">14</strong> hours left</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
                                                            <ul class="dropdown-menu icons-right dropdown-menu-right">
                                                                <li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
                                                                <li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
                                                                <li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
                                                                <li><a href="#"><i class="icon-stack"></i> Archive</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="task-desc">
                                                        <a href="task_detailed.html">Donec sagittis sit amet felis non semper</a>
                                                        <span>Design &amp; UI concepts</span>
                                                    </td>
                                                    <td class="text-center"><span class="label label-danger">High</span></td>
                                                    <td>September 18, 2013</td>
                                                    <td>
                                                        <div class="progress progress-micro">
                                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                                                                <span class="sr-only">40% Complete</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon-clock"></i> <strong class="text-danger">2</strong> days left</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
                                                            <ul class="dropdown-menu icons-right dropdown-menu-right">
                                                                <li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
                                                                <li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
                                                                <li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
                                                                <li><a href="#"><i class="icon-stack"></i> Archive</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="task-desc">
                                                        <a href="task_detailed.html">Pellentesque sed nibh non neque auctor ornare ac in est</a>
                                                        <span>HTML / CSS changes</span>
                                                    </td>
                                                    <td class="text-center"><span class="label label-info">Low</span></td>
                                                    <td>September 2, 2013</td>
                                                    <td>
                                                        <div class="progress progress-micro">
                                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="width: 12%;">
                                                                <span class="sr-only">12% Complete</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon-clock"></i> <strong class="text-danger">18</strong> days left</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
                                                            <ul class="dropdown-menu icons-right dropdown-menu-right">
                                                                <li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
                                                                <li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
                                                                <li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
                                                                <li><a href="#"><i class="icon-stack"></i> Archive</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="task-desc">
                                                        <a href="task_detailed.html">Pellentesque habitant morbi tristique senectus et netus</a>
                                                        <span>HTML / CSS changes</span>
                                                    </td>
                                                    <td class="text-center"><span class="label label-success">Normal</span></td>
                                                    <td>August 21, 2013</td>
                                                    <td>
                                                        <div class="progress progress-micro">
                                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                                                                <span class="sr-only">50% Complete</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon-clock"></i> <strong class="text-danger">7</strong> days left</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
                                                            <ul class="dropdown-menu icons-right dropdown-menu-right">
                                                                <li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
                                                                <li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
                                                                <li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
                                                                <li><a href="#"><i class="icon-stack"></i> Archive</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="task-desc">
                                                        <a href="task_detailed.html">Et malesuada fames ac turpis egestas</a>
                                                        <span>HTML / CSS changes</span>
                                                    </td>
                                                    <td class="text-center"><span class="label label-danger">High</span></td>
                                                    <td>August 12, 2013</td>
                                                    <td>
                                                        <div class="progress progress-micro">
                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                                                                <span class="sr-only">80% Complete</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon-clock"></i> <strong class="text-danger">90</strong> days left</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
                                                            <ul class="dropdown-menu icons-right dropdown-menu-right">
                                                                <li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
                                                                <li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
                                                                <li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
                                                                <li><a href="#"><i class="icon-stack"></i> Archive</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="task-desc">
                                                        <a href="task_detailed.html">Maecenas eros nisl, tempor vitae dolor eu</a>
                                                        <span>General layout additions</span>
                                                    </td>
                                                    <td class="text-center"><span class="label label-success">Normal</span></td>
                                                    <td>August 7, 2013</td>
                                                    <td>
                                                        <div class="progress progress-micro">
                                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100" style="width: 41%;">
                                                                <span class="sr-only">41% Complete</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon-clock"></i> <strong class="text-danger">62</strong> days left</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
                                                            <ul class="dropdown-menu icons-right dropdown-menu-right">
                                                                <li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
                                                                <li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
                                                                <li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
                                                                <li><a href="#"><i class="icon-stack"></i> Archive</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="task-desc">
                                                        <a href="task_detailed.html">Nunc gravida, nunc vel condimentum mattis</a>
                                                        <span>General layout additions</span>
                                                    </td>
                                                    <td class="text-center"><span class="label label-danger">High</span></td>
                                                    <td>July 30, 2013</td>
                                                    <td>
                                                        <div class="progress progress-micro">
                                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                                                                <span class="sr-only">40% Complete</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon-clock"></i> <strong class="text-danger">21</strong> hour left</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
                                                            <ul class="dropdown-menu icons-right dropdown-menu-right">
                                                                <li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
                                                                <li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
                                                                <li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
                                                                <li><a href="#"><i class="icon-stack"></i> Archive</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="task-desc">
                                                        <a href="task_detailed.html">Rhoncus rutrum metus neque rutrum tortor</a>
                                                        <span>General layout additions</span>
                                                    </td>
                                                    <td class="text-center"><span class="label label-danger">High</span></td>
                                                    <td>July 26, 2013</td>
                                                    <td>
                                                        <div class="progress progress-micro">
                                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                                                <span class="sr-only">60% Complete</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon-clock"></i> <strong class="text-danger">62</strong> days left</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
                                                            <ul class="dropdown-menu icons-right dropdown-menu-right">
                                                                <li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
                                                                <li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
                                                                <li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
                                                                <li><a href="#"><i class="icon-stack"></i> Archive</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="task-desc">
                                                        <a href="task_detailed.html">Fusce sapien velit, accumsan eget risus et</a>
                                                        <span>General layout additions</span>
                                                    </td>
                                                    <td class="text-center"><span class="label label-info">Low</span></td>
                                                    <td>July 22, 2013</td>
                                                    <td>
                                                        <div class="progress progress-micro">
                                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                                                                <span class="sr-only">40% Complete</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon-clock"></i> <strong class="text-danger">51</strong> day left</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
                                                            <ul class="dropdown-menu icons-right dropdown-menu-right">
                                                                <li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
                                                                <li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
                                                                <li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
                                                                <li><a href="#"><i class="icon-stack"></i> Archive</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="task-desc">
                                                        <a href="task_detailed.html">Suspendisse dictum vitae ante ut tempor</a>
                                                        <span>HTML / CSS changes</span>
                                                    </td>
                                                    <td class="text-center"><span class="label label-info">Low</span></td>
                                                    <td>July 10, 2013</td>
                                                    <td>
                                                        <div class="progress progress-micro">
                                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100" style="width: 6%;">
                                                                <span class="sr-only">6% Complete</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon-clock"></i> <strong class="text-danger">2</strong> days left</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
                                                            <ul class="dropdown-menu icons-right dropdown-menu-right">
                                                                <li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
                                                                <li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
                                                                <li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
                                                                <li><a href="#"><i class="icon-stack"></i> Archive</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="task-desc">
                                                        <a href="task_detailed.html">Maecenas porta augue et odio dignissim</a>
                                                        <span>HTML / CSS changes</span>
                                                    </td>
                                                    <td class="text-center"><span class="label label-info">Low</span></td>
                                                    <td>June 25, 2013</td>
                                                    <td>
                                                        <div class="progress progress-micro">
                                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%;">
                                                                <span class="sr-only">65% Complete</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon-clock"></i> <strong class="text-danger">3</strong> days left</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
                                                            <ul class="dropdown-menu icons-right dropdown-menu-right">
                                                                <li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
                                                                <li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
                                                                <li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
                                                                <li><a href="#"><i class="icon-stack"></i> Archive</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="task-desc">
                                                        <a href="task_detailed.html">Morbi varius odio at quam vehicula mattis</a>
                                                        <span>Design &amp; UI concepts</span>
                                                    </td>
                                                    <td class="text-center"><span class="label label-success">Normal</span></td>
                                                    <td>June 21, 2013</td>
                                                    <td>
                                                        <div class="progress progress-micro">
                                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
                                                                <span class="sr-only">20% Complete</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon-clock"></i> <strong class="text-danger">89</strong> days left</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
                                                            <ul class="dropdown-menu icons-right dropdown-menu-right">
                                                                <li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
                                                                <li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
                                                                <li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
                                                                <li><a href="#"><i class="icon-stack"></i> Archive</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="task-desc">
                                                        <a href="task_detailed.html">Quisque ultrices libero in nisl fringilla</a>
                                                        <span>Design &amp; UI concepts</span>
                                                    </td>
                                                    <td class="text-center"><span class="label label-danger">High</span></td>
                                                    <td>June 17, 2013</td>
                                                    <td>
                                                        <div class="progress progress-micro">
                                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                                                                <span class="sr-only">40% Complete</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon-clock"></i> <strong class="text-danger">32</strong> days left</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
                                                            <ul class="dropdown-menu icons-right dropdown-menu-right">
                                                                <li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
                                                                <li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
                                                                <li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
                                                                <li><a href="#"><i class="icon-stack"></i> Archive</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="task-desc">
                                                        <a href="task_detailed.html">Nam fermentum ut nunc eget tristique</a>
                                                        <span>HTML / CSS changes</span>
                                                    </td>
                                                    <td class="text-center"><span class="label label-danger">High</span></td>
                                                    <td>June 14, 2013</td>
                                                    <td>
                                                        <div class="progress progress-micro">
                                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100" style="width: 31%;">
                                                                <span class="sr-only">31% Complete</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon-clock"></i> <strong class="text-danger">2</strong> days left</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
                                                            <ul class="dropdown-menu icons-right dropdown-menu-right">
                                                                <li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
                                                                <li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
                                                                <li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
                                                                <li><a href="#"><i class="icon-stack"></i> Archive</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="task-desc">
                                                        <a href="task_detailed.html">Etiam viverra porttitor auctor</a>
                                                        <span>Design &amp; UI concepts</span>
                                                    </td>
                                                    <td class="text-center"><span class="label label-success">Normal</span></td>
                                                    <td>June 3, 2013</td>
                                                    <td>
                                                        <div class="progress progress-micro">
                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                                                <span class="sr-only">90% Complete</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon-clock"></i> <strong class="text-danger">1</strong> day left</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
                                                            <ul class="dropdown-menu icons-right dropdown-menu-right">
                                                                <li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
                                                                <li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
                                                                <li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
                                                                <li><a href="#"><i class="icon-stack"></i> Archive</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="task-desc">
                                                        <a href="task_detailed.html">Curabitur quis commodo massa. Proin eget arcu eros</a>
                                                        <span>Design &amp; UI concepts</span>
                                                    </td>
                                                    <td class="text-center"><span class="label label-danger">High</span></td>
                                                    <td>May 9, 2013</td>
                                                    <td>
                                                        <div class="progress progress-micro">
                                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                                                                <span class="sr-only">10% Complete</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon-clock"></i> <strong class="text-danger">2</strong> days left</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
                                                            <ul class="dropdown-menu icons-right dropdown-menu-right">
                                                                <li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
                                                                <li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
                                                                <li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
                                                                <li><a href="#"><i class="icon-stack"></i> Archive</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="task-desc">
                                                        <a href="task_detailed.html">Maecenas sed sapien vel nisi porta sollicitudin</a>
                                                        <span>Design &amp; UI concepts</span>
                                                    </td>
                                                    <td class="text-center"><span class="label label-danger">High</span></td>
                                                    <td>May 2, 2013</td>
                                                    <td>
                                                        <div class="progress progress-micro">
                                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                                                                <span class="sr-only">40% Complete</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon-clock"></i> <strong class="text-danger">37</strong> days left</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
                                                            <ul class="dropdown-menu icons-right dropdown-menu-right">
                                                                <li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
                                                                <li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
                                                                <li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
                                                                <li><a href="#"><i class="icon-stack"></i> Archive</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="task-desc">
                                                        <a href="task_detailed.html">Nunc placerat mattis consectetur. Cras sagittis scelerisque imperdiet</a>
                                                        <span>HTML / CSS changes</span>
                                                    </td>
                                                    <td class="text-center"><span class="label label-info">Low</span></td>
                                                    <td>April 21, 2013</td>
                                                    <td>
                                                        <div class="progress progress-micro">
                                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                                                                <span class="sr-only">10% Complete</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon-clock"></i> <strong class="text-danger">3</strong> days left</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
                                                            <ul class="dropdown-menu icons-right dropdown-menu-right">
                                                                <li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
                                                                <li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
                                                                <li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
                                                                <li><a href="#"><i class="icon-stack"></i> Archive</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="task-desc">
                                                        <a href="task_detailed.html">Nunc tincidunt consectetur quam et venenatis</a>
                                                        <span>HTML / CSS changes</span>
                                                    </td>
                                                    <td class="text-center"><span class="label label-info">Low</span></td>
                                                    <td>April 19, 2013</td>
                                                    <td>
                                                        <div class="progress progress-micro">
                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                                                <span class="sr-only">100% Complete</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon-clock"></i> <strong>Complete!</strong></td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
                                                            <ul class="dropdown-menu icons-right dropdown-menu-right">
                                                                <li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
                                                                <li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
                                                                <li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
                                                                <li><a href="#"><i class="icon-stack"></i> Archive</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="task-desc">
                                                        <a href="task_detailed.html">Phasellus quis sagittis orci, vitae placerat mauris</a>
                                                        <span>Design &amp; UI concepts</span>
                                                    </td>
                                                    <td class="text-center"><span class="label label-info">Low</span></td>
                                                    <td>April 11, 2013</td>
                                                    <td>
                                                        <div class="progress progress-micro">
                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                                                <span class="sr-only">100% Complete</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon-clock"></i> <strong>Complete!</strong></td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
                                                            <ul class="dropdown-menu icons-right dropdown-menu-right">
                                                                <li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
                                                                <li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
                                                                <li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
                                                                <li><a href="#"><i class="icon-stack"></i> Archive</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="task-desc">
                                                        <a href="task_detailed.html">Nunc sit amet arcu euismod nulla luctus pulvinar in at enim</a>
                                                        <span>Design &amp; UI concepts</span>
                                                    </td>
                                                    <td class="text-center"><span class="label label-danger">High</span></td>
                                                    <td>April 1, 2013</td>
                                                    <td>
                                                        <div class="progress progress-micro">
                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                                                <span class="sr-only">100% Complete</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon-clock"></i> <strong>Complete!</strong></td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
                                                            <ul class="dropdown-menu icons-right dropdown-menu-right">
                                                                <li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
                                                                <li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
                                                                <li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
                                                                <li><a href="#"><i class="icon-stack"></i> Archive</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="task-desc">
                                                        <a href="task_detailed.html">Duis convallis ornare risus, sit amet tincidunt elit euismod vel</a>
                                                        <span>HTML / CSS changes</span>
                                                    </td>
                                                    <td class="text-center"><span class="label label-danger">High</span></td>
                                                    <td>March 8, 2013</td>
                                                    <td>
                                                        <div class="progress progress-micro">
                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                                                <span class="sr-only">100% Complete</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon-clock"></i> <strong>Complete!</strong></td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
                                                            <ul class="dropdown-menu icons-right dropdown-menu-right">
                                                                <li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
                                                                <li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
                                                                <li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
                                                                <li><a href="#"><i class="icon-stack"></i> Archive</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="task-desc">
                                                        <a href="task_detailed.html">Cras eu mauris adipiscing massa porttitor </a>
                                                        <span>Design &amp; UI concepts</span>
                                                    </td>
                                                    <td class="text-center"><span class="label label-danger">High</span></td>
                                                    <td>March 2, 2013</td>
                                                    <td>
                                                        <div class="progress progress-micro">
                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                                                <span class="sr-only">100% Complete</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon-clock"></i> <strong>Complete!</strong></td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
                                                            <ul class="dropdown-menu icons-right dropdown-menu-right">
                                                                <li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
                                                                <li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
                                                                <li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
                                                                <li><a href="#"><i class="icon-stack"></i> Archive</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /tasks table -->

                            </div>
                            <!-- /fourth tab -->


                            <!-- Fifth tab -->
                            <div class="tab-pane fade" id="settings">

                                <!-- Profile information -->
                                <form action="{{ url('/profile/update') }}" method="POST" class="block" role="form">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <h6 class="heading-hr"><i class="icon-user"></i> Profile information:</h6>

                                    <div class="block-inner">
                                                                                
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Full name</label>
                                                    <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
                                                </div>

                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>About</label>
                                                    <textarea style="resize:none" class="form-control" rows="5" name="about">{{ Auth::user()->about }}</textarea>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Address line 1</label>
                                                    <input type="text" name="address_line1" value="{{ Auth::user()->address->address_line1 }}" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Address line 2</label>
                                                    <input type="text" name="address_line2" value="{{ Auth::user()->address->address_line2 }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>City</label>
                                                    <input type="text" name="city" value="{{ Auth::user()->address->city }}" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>State/Province</label>
                                                    <input type="text" name="state" value="{{ Auth::user()->address->state }}" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>ZIP code</label>
                                                    <input type="text" name="zip_code" value="{{ Auth::user()->address->zip_code }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Email</label>
                                                    <input type="text" name="email" readonly="readonly" value="{{ Auth::user()->email }}" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Your country:</label>
                                                    <select name="country" data-placeholder="{{ Auth::user()->address->country }}" class="select-full" tabindex="2">
                                                        <option value=""></option> 
                                                        <option value="Cambodia">Cambodia</option>
                                                        <option value="Croatia">Croatia</option> 
                                                        <option value="Cameroon">Cameroon</option> 
                                                        <option value="Canada">Canada</option> 
                                                        <option value="Cape Verde">Cape Verde</option> 
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <h6 class="heading-hr"><i class="icon-lock"></i> Security information:</h6>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>New password:</label>
                                                <input type="password" readonly="readonly" placeholder="Enter new password" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Repeat password:</label>
                                                <input type="password" readonly="readonly" placeholder="Repeat new password" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Profile visibility: </label>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="visibility" class="styled" checked="checked">
                                                        Visible to everyone
                                                    </label>
                                                </div>

                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="visibility" class="styled">
                                                        Visible to friends only
                                                    </label>
                                                </div>

                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="visibility" class="styled">
                                                        Visible to my connections only
                                                    </label>
                                                </div>

                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="visibility" class="styled">
                                                        Visible to my colleagues only
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label>Notifications: </label>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" class="styled" checked="checked">
                                                        Password expiration notification
                                                    </label>
                                                </div>

                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" class="styled" checked="checked">
                                                        New message notification
                                                    </label>
                                                </div>

                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" class="styled" checked="checked">
                                                        New task notification
                                                    </label>
                                                </div>

                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" class="styled">
                                                        New contact request notification
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <input type="reset" value="Cancel" class="btn btn-default">
                                        <input type="submit" value="Apply changes" class="btn btn-success">
                                    </div>

                                </form>
                                <!-- /profile information -->

                            </div>
                            <!-- /fifth tab -->

                        </div>
                    </div>
                    <!-- /page tabs -->

                </div>
            </div>
    </div>
@endsection