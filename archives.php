<?php
/**
 * 文章归档
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<h1 class="title"><?php $this->title() ?></h1>
<p>
<?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
$year=0; $mon=0; $i=0; $j=0; $output='';
while($archives->next()):
$year_tmp = date('Y',$archives->created);
$mon_tmp = date('m',$archives->created);
$y=$year; $m=$mon;
if ($mon != $mon_tmp && $mon > 0) $output .= '</ul>';
if ($year != $year_tmp && $year > 0) $output .= '';
if ($year != $year_tmp && $mon != $mon_tmp) {
$year = $year_tmp;
$mon = $mon_tmp;
$output .= '<h3>'. $year .'年'. $mon .'月</h3><ul>';
}
$output .= '<li><time datetime="'.date('Y年m月d日',$archives->created).'" itemprop="datePublished">'.date('m-d',$archives->created).'</time>&nbsp·&nbsp<a href="'.$archives->permalink .'">'. $archives->title .'</a></li>';
endwhile;
$output .= '</ul>';
echo $output;
?>
</p>
<?php $this->need('footer.php'); ?>