<?php
/**
 * Paper，一页纸，一片让博主可写可绘的极简创作空间。本主题为极简主题，禅定黄+静思蓝暗黑配色，无 JS、图片文件引用，对代码极简优化。主题支持自定义背景、自定义菜单，保留搜索及评论功能；内置文章归档和搜索模板；已作中文字体优化，内置3种字体方案可选。<br/>
 * 发布页：<a href="https://yayu.net/projects/typecho-paper" target="_blank">https://yayu.net/projects/typecho-paper</a>
 *
 * @package Paper
 * @author Jeff Chen
 * @version 1.1.0
 * @link https://yayu.net/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php'); ?>
<?php if ($this->is('index')){ ?>
<h1 class="title"><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a></h1>
<div class="intro"><?php $this->options->description() ?></div>
<?php }; if ($this->is('archive')) { ?>
<h1 class="title"><?php $this->archiveTitle(['category' => _t('%s'),'tag' => _t('标签：%s'),'author' => _t('作者：%s')], '', ''); ?></h1>
<div class="intro"><?php echo $this->getDescription(); ?></div>
<?php } ?>
<?php if ($this->have()): ?>
<?php while ($this->next()): ?>
<article class="<?php if ( !$this->is('single') ) { ?>list<?php } else {?>single<?php }; ?>">
<?php $site_title_elem 	= $this->is('single') ? 'h1' : 'h2'; ?>
<<?php echo $site_title_elem; ?> class="title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></<?php echo $site_title_elem; ?>>
<time datetime="<?php $this->date('c'); ?>"><?php $this->date(); ?></time> · <a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('发表评论', '1 条评论', '%d 条评论'); ?></a>
<div class="content"><?php $this->content(); ?></div>
<?php if ( $this->is('post') ) { ?>
<p class="tags"># <?php $this->tags('# ', true, '无标签'); ?></p>
<?php }; ?>
</article>
<?php endwhile; ?>
<?php if ( $this->is('single') ) { ?>
<?php $this->need('comments.php'); ?><?php } else { ?>
<?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
<?php }; ?>
<?php else : ?><article><em>空空如也 ...</em></article><?php endif; ?>
<?php $this->need('footer.php'); ?>