<?php
/**
 * 简单整洁的博客主题
 * @package Anghunk 
 * @author 子舒
 * @version 1.0
 * @link https://imhan.cn
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<div id="container">
<main class="main-content">
    <div class="banner">
        <img src="<?php $this->options->bannerbg(); ?>">
        <p><?php $this->options->bannertext(); ?></p>
    </div>
    <div class="more">我已经写了 <?php echo allpostnum(1); ?> 篇文章，更多文章请访问 <a href="/posts">Posts</a> ，分类有
        <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
        <?php while ($category->next()): ?>
        <span<?php if ($this->is('post')): ?><?php if ($this->category == $category->slug): ?> class="current"<?php endif; ?>
        <?php else: ?>
        <?php if ($this->is('category', $category->slug)): ?> class="current"<?php endif; ?><?php endif; ?>>
            <a href="<?php $category->permalink(); ?>" title="<?php $category->name(); ?>"><?php $category->name(); ?></a>
        </span>
        <?php endwhile; ?> 。
    </div>

    <section class="blockGroup">
        <?php while($this->next()): ?>
            <article>
                <div class="posttime">
                    <time><?php $this->date('Y/m/d'); ?></time>
                </div>
                <div class="block-title">
                    <a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
                </div>

            </article>
        <?php endwhile; ?>
    </section>
   <nav class="blog-nav">
<?php $this->pageLink('<span>上一页</span>'); ?>
<?php $this->pageLink('<span>下一页</span>','next'); ?>

</nav>
	
</main>
<?php $this->need('footer.php'); ?>
</div>
