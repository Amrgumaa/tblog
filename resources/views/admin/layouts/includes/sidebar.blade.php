   <!-- Main Sidebar Container -->
   <aside class="main-sidebar elevation-4 sidebar-light-cyan">
       <!-- Brand Logo -->
       <a href="index3.html" class="brand-link navbar-cyan">
           <img src="{{ asset('admin/assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
           <span class="brand-text font-weight-light">AdminLTE 3</span>
       </a>

       <!-- Sidebar -->
       <div class="sidebar">
           <!-- Sidebar Menu -->
           <nav class="mt-2">
               <ul class="  nav nav-pills nav-sidebar flex-column text-sm" data-widget="treeview" role="menu" data-accordion="false">

                   <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                   <li class="nav-item has-treeview menu-open">
                       <a href="#" class="nav-link active">
                           <i class="fa fa-user" aria-hidden="true"></i>
                           <p>
                               User Management
                               <i class="right fas fa-angle-left"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{route('user.index')}}" class="{{request()->is('*user*') ? 'nav-link active' : 'nav-link' }}">
                                   <i class="fa fa-user" aria-hidden="true"></i>
                                   <p> Users</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{('admin.index')}}" class="{{request()->is('*admins*') ? 'nav-link active' : 'nav-link' }}">
                                   <i class="fa fa-user" aria-hidden="true"></i>
                                   <p>Admins</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{ ('laratrust.roles-assignment.index') }}" class="{{request()->is('*roles-assignment*') ? 'nav-link active' : 'nav-link' }}">
                                   <i class="fas fa-user-lock"></i>
                                   <p>Roles&Permissions Assignment</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{('laratrust.roles.index')}}" class="{{request()->is('*roles') ? 'nav-link active' : 'nav-link' }}">
                                   <i class="fas fa-user-lock"></i>
                                   <p>Roles</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{ ('laratrust.permissions.index')}}" class="{{request()->is('*permissions*') ? 'nav-link active' : 'nav-link' }}">
                                   <i class="fas fa-user-lock"></i>
                                   <p>Permissions</p>
                               </a>
                           </li>

                       </ul>
                   </li>
                   <li class="nav-item has-treeview menu-open">
                       <a href="#" class="nav-link active">
                           <i class="fas fa-blog" aria-hidden="true"></i>
                           <p>
                               Blog
                               <i class="right fas fa-angle-left"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{route('post.index')}}" class="{{request()->is('admin/post') ? 'nav-link active' : 'nav-link' }}">
                                   <i class="fas fa-blog"> </i>
                                   <p>Posts</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{('posts.myposts')}}" class="{{request()->is('admin/myposts') ? 'nav-link active' : 'nav-link' }}">
                                   <i class="fas fa-blog"> </i>
                                   <i class="fas fa-user"></i></i>
                                   <p>My Posts</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{route('category.index')}}" class="{{request()->is('admin/category') ? 'nav-link active' : 'nav-link' }}">
                                   <i class="fas fa-hashtag"></i>
                                   <p>Categories</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{route('tag.index')}}" class="{{request()->is('admin/tag') ? 'nav-link active' : 'nav-link' }}">
                                   <i class="fas fa-tags"></i>
                                   <p>Tags</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{route('contact.index')}}" class="{{request()->is('admin/contact') ? 'nav-link active' : 'nav-link' }}">
                                   <i class="far fa-envelope"></i>
                                   <p>Messages</p>
                               </a>
                           </li>

                       </ul>
                   </li>
               </ul>
           </nav>
           <!-- /.sidebar-menu -->
       </div>
       <!-- /.sidebar -->
   </aside>
