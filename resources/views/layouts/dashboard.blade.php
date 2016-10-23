@extends('layouts.plane')
@section('body')
 <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url ('') }}">Course Builder</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Rodrigo Gloria Batistella</strong>
                                    <span class="pull-right text-muted">
                                        <em>21-oct-2016 23:00</em>
                                    </span>
                                </div>
                                <div>Development started</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Rodrigo Gloria Batistella</strong>
                                    <span class="pull-right text-muted">
                                        <em>21-oct-2016 23:30</em>
                                    </span>
                                </div>
                                <div>Template applied</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Rodrigo Gloria Batistella</strong>
                                    <span class="pull-right text-muted">
                                        <em>22-oct-2016 0:30</em>
                                    </span>
                                </div>
                                <div>Template refined</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Rodrigo Gloria Batistella</strong>
                                    <span class="pull-right text-muted">
                                        <em>22-oct-2016 1:00</em>
                                    </span>
                                </div>
                                <div>Database and course table created</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Rodrigo Gloria Batistella</strong>
                                    <span class="pull-right text-muted">
                                        <em>22-oct-2016 1:30</em>
                                    </span>
                                </div>
                                <div>Home screen created</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Rodrigo Gloria Batistella</strong>
                                    <span class="pull-right text-muted">
                                        <em>22-oct-2016 2:30</em>
                                    </span>
                                </div>
                                <div>Routes and create course form created</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ url ('login') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li {{ (Request::is('/courses') ? 'class="active"' : '') }}>
                            <a href="{{ url ('/courses') }}"><i class="fa fa-dashboard fa-fw"></i> Courses</a>
                        </li>
                        <li {{ (Request::is('/myassets') ? 'class="active"' : '') }}>
                            <a href="{{ url ('/myassets') }}"><i class="fa fa-image fa-fw"></i> Assets</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
			 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('page_heading')</h1>
                </div>
                <!-- /.col-lg-12 -->
           </div>
			<div class="row">  
				@yield('section')
            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@stop