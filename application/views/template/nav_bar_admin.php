
<div class="col-md-3">
    <div class="list-group">
        <a href="<?php echo base_url('admin/articles_manager'); ?>" class="list-group-item <?php if ($nav_admin == 'articles_manager') echo 'active';?>">Quản lý bài viết</a>
        <a href="<?php echo base_url('admin/add_article'); ?>" class="list-group-item <?php if ($nav_admin == 'add_article') echo 'active';?>">Thêm bài viết</a>
        <a href="<?php echo base_url('admin/videos_manager'); ?>" class="list-group-item <?php if ($nav_admin == 'videos_manager') echo 'active';?>">Quản lý video</a>
        <a href="<?php echo base_url('admin/add_video'); ?>" class="list-group-item <?php if ($nav_admin == 'add_video') echo 'active';?>">Thêm video</a>
    </div>
</div>
