<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo (Session::get('avatar') && Session::get('avatar')!='') ? base_url().'tmp/cdn/'.Session::get('avatar') : base_url().'tmp/public/images/avatar.png';?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo Session::get('username'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="treeview <?php if($_web['uri']['mod']=='home') echo 'active';?>">
          <a href="<?php echo base_url().'home/home/index'; ?>">
            <i class="fa fa-home" aria-hidden="true"></i> <span><?php echo lang('dashboard'); ?></span>
          </a>
        </li>
        <li class="treeview <?php if($_web['uri']['mod']=='settings') echo 'active';?>">
          <a href="<?php echo base_url().'settings/settings/index'; ?>">
            <i class="fa fa-wrench" aria-hidden="true"></i> <span><?php echo lang('settings'); ?></span>
          </a>
        </li>
        <li class="treeview <?php if($_web['uri']['mod']=='options') echo 'active';?>">
          <a href="<?php echo base_url().'options/options/index'; ?>">
            <i class="fa fa-cogs" aria-hidden="true"></i> <span><?php echo lang('options'); ?></span>
          </a>
        </li>
        <li class="treeview <?php if($_web['uri']['mod']=='menu' || $_web['uri']['mod']=='widgets') echo 'active';?>">
          <a href="#">
            <i class="fa fa-bars" aria-hidden="true"></i>
            <span><?php echo lang('appearance'); ?> &nbsp;&nbsp;<i class="fa fa-sort-desc" aria-hidden="true"></i></span>
          </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo base_url().'menu/position/index';?>"><?php echo lang('menu');?></a></li>
                <li><a href="<?php echo base_url().'widgets/widgets/index';?>"><?php echo lang('widgets');?></a></li>
              </ul>
        </li>
        <li class="treeview <?php if($_web['uri']['mod']=='banners') echo 'active';?>">
          <a href="<?php echo base_url().'banners/banners/index';?>">
            <i class="fa fa-picture-o" aria-hidden="true"></i> <span><?php echo lang('banners'); ?></span>
          </a>
        </li>
        <li class="treeview <?php if($_web['uri']['mod']=='pages') echo 'active';?>">
          <a href="<?php echo base_url().'pages/pages/index'; ?>">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            <span><?php echo lang('pages'); ?></span>
          </a>
        </li>
        <li class="treeview <?php if($_web['uri']['mod']=='posts') echo 'active';?>">
          <a href="#">
            <i class="fa fa-file-text" aria-hidden="true"></i>
            <span><?php echo lang('post'); ?> &nbsp;&nbsp;<i class="fa fa-sort-desc" aria-hidden="true"></i></span>
          </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo base_url().'posts/posts/index';?>"><?php echo lang('all_posts');?></a></li>
                <li><a href="<?php echo base_url().'posts/categories/index';?>"><?php echo lang('categories');?></a></li>
                <li><a href="<?php echo base_url().'posts/manager/index';?>"><?php echo lang('manager_show_index');?></a></li>
                <li><a href="<?php echo base_url().'posts/comments_posts/index';?>"><?php echo lang('comments');?></a></li>
              </ul>
        </li>
        <li class="treeview <?php if($_web['uri']['mod']=='order') echo 'active';?>">
          <a href="<?php echo base_url().'order/order/index'; ?>">
            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i> <span><?php echo lang('order'); ?></span>
          </a>
        </li>
        <li class="treeview <?php if($_web['uri']['mod']=='media') echo 'active';?>">
          <a href="<?php echo base_url().'media/media/index'; ?>">
            <i class="fa fa-file-image-o" aria-hidden="true"></i> <span><?php echo lang('media'); ?></span>
          </a>
        </li>
        <li class="treeview <?php if($_web['uri']['mod']=='contact') echo 'active';?>">
          <a href="<?php echo base_url().'contact/contact/index'; ?>">
            <i class="fa fa-envelope"></i> <span><?php echo lang('contact'); ?></span>
          </a>
        </li>
        <!-- <li>
          <a href="#">
            <i class="fa fa-comments-o" aria-hidden="true"></i> <span><?php echo lang('comments'); ?></span>
          </a>
        </li> -->
        <li class="treeview <?php if($_web['uri']['mod']=='users') echo 'active';?>">
          <a href="<?php echo base_url().'users/users/index'; ?>">
            <i class="fa fa-users" aria-hidden="true"></i> <span><?php echo lang('administrator'); ?></span>
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>