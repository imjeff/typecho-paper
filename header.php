<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="<?php $this->options->charset(); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php $this->archiveTitle(['category' => _t('%s'),'search' => _t('搜索结果：%s'),'tag' => _t('标签：%s'),'author' => _t('作者：%s')], '', ' - '); ?><?php $this->options->title(); ?></title>
<style>
:root {
    --width: 720px;
    --font-yahei: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Ubuntu,"Helvetica Neue",Helvetica,Arial,"PingFangSC-Regular","Hiragino Sans GB","Lantinghei SC","Microsoft Yahei","Source Han Sans CN","WenQuanYi Micro Hei",SimSun,sans-serif;
    --font-fangsong: Baskerville, "Times New Roman", "Liberation Serif", STFangsong, FangSong, FangSong_GB2312, "CWTEX\-F", serif;
    --font-songti: Georgia, "Nimbus Roman No9 L", "Songti SC", "Noto Serif CJK SC", "Source Han Serif SC", "Source Han Serif CN", STSong, "AR PL New Sung", "AR PL SungtiL GB", NSimSun, SimSun, "TW\-Sung", "WenQuanYi Bitmap Song", "AR PL UMing CN", "AR PL UMing HK", "AR PL UMing TW", "AR PL UMing TW MBE", PMingLiU, MingLiU, serif;
    --font-scale: 1em;
    --background-color: #F2F0E5;
    --main-color:#fff;
    --heading-color: #222;
    --nav-color:#666;
    --text-color: #444;
    --link-color: #444;
    --code-background-color: #f2f2f2;
    --code-color: #222;
    --blockquote-color: #222;
    --gray-color: #999;
    --shadow-color:#ebe4c6;
}
@media (prefers-color-scheme: dark) {
:root {
    --background-color: #0b0c1b;
    --main-color: #0e1028;
    --heading-color: #c2cef0;
    --nav-color: #585c90;
    --text-color: #a6b4d2;
    --link-color: #7b88c8;
    --code-background-color: #000;
    --code-color: #ddd;
    --blockquote-color: #ccc;
    --gray-color: #4f5287;
    --shadow-color: #000;
    }
}
body {
    font-family: var(--font-yahei); /* 可替换 --font-fangsong 或 --font-songti 字体 */
    font-size: var(--font-scale);
    margin: auto;
    padding: 20px;
    max-width: var(--width);
    text-align: left;
    background-color: var(--background-color);
    word-wrap: break-word;
    overflow-wrap: break-word;
    line-height: 1.8;
    color: var(--text-color);
}
html{scroll-behavior:smooth;}
h1,h2,h3,h4,h5,h6{color:var(--heading-color);}
a{color:var(--link-color);cursor:pointer;text-decoration:none}
a:hover{opacity:0.5;}
nav a{margin-right:10px}
strong,b{color:var(--heading-color)}
button{margin:0;cursor:pointer}
time,.comment-meta a{color:var(--gray-color);}
main{padding:7%; background-color:var(--main-color);box-shadow: 0px 10px 20px 0px var(--shadow-color);}
table{width:100%}
hr{border:0;border-top:1px dashed}
img{max-width:100%;height:auto}
code{font-family:monospace;padding:2px;background-color:var(--code-background-color);color:var(--code-color);border-radius:3px}
blockquote{border-left:1px solid var(--gray-color);color:var(--code-color);padding-left:20px;font-style:italic}
header,footer{padding:20px 0;margin: 10px 0;color:var(--gray-color);}
header a,footer a{color:var(--nav-color)}
article{margin-bottom: 40px;padding-bottom:40px;border-bottom:1px dashed var(--gray-color);}
h1.title,h2.title {margin:0;line-height:1.6;}
.intro{color:var(--gray-color);margin-bottom:60px;}
.content a,.comment-reply a,.page-navigator .current{border-bottom:1px solid var(--link-color);}
.content a:has(img){border:none}
.tags,.tags a{color:var(--gray-color);margin-right: 10px;}
.page-navigator{list-style: none;padding:0;}
.page-navigator li{display: inline-block;padding:0 6px;margin-right: 10px;}
.comment-list{list-style: none;padding:0;margin-bottom:40px;}
.comment-children{margin:30px 0 0 50px}
.comment-author cite{font-weight:bold;font-style:normal;}
.comment-author .says,.comment-author .avatar{display:none}
input,textarea{border-radius:4px;border:1px solid var(--gray-color);display:block;font-size:0.9em;margin:0 0 10px;padding:10px;}
button[type="submit"]{border:none;font-size:0.9em;border-radius:4px;padding:10px 16px;background:#ccc;}
button[type="submit"]:hover{cursor:pointer;opacity:.7;}
#search input{display:inline-block;margin-right: 5px;}
</style>
<?php $this->header(); ?>
</head>
<body>
<header>
<?php if ($this->is('single') || $this->is('category') || $this->is('search') || $this->is('tag')) { ?>
<a href="<?php $this->options->siteUrl(); ?>">← <?php $this->options->title() ?></a>
<?php if ($this->is('post')) { ?> | <?php $this->category(','); ?><?php } ?>
<?php } else { ?>
<nav>
<?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
<?php while($category->next()): ?>
<a<?php if($this->is('category', $category->slug)): ?> class="current"<?php endif; ?> href="<?php $category->permalink(); ?>" title="<?php $category->name(); ?>"><?php $category->name(); ?></a>
<?php endwhile; ?>
<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
<?php while ($pages->next()): ?>
<a<?php if ($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
<?php endwhile; ?>
</nav>
<?php } ?>
</header>
<main>