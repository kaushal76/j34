<?php
/**
* @package   yoo_master2
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// get theme configuration
include($this['path']->path('layouts:theme.config.php'));

?>
<!DOCTYPE HTML>
<html lang="<?php echo $this['config']->get('language'); ?>" dir="<?php echo $this['config']->get('direction'); ?>"  data-config='<?php echo $this['config']->get('body_config','{}'); ?>'>

<head>
  <?php echo $this['template']->render('head'); ?>
</head>

<body class="<?php echo $this['config']->get('body_classes'); ?>">
  <div class="tm-body">
    <?php if ($this['widgets']->count('toolbar-l + toolbar-r')) : ?>
      <div id="tm-toolbar" class="tm-toolbar uk-hidden-small">
        <div class="uk-container uk-container-center uk-clearfix">
          <?php if ($this['widgets']->count('toolbar-l')) : ?>
            <div class="uk-float-left"><?php echo $this['widgets']->render('toolbar-l'); ?></div>
          <?php endif; ?>
          <?php if ($this['widgets']->count('toolbar-r')) : ?>
            <div class="uk-float-right"><?php echo $this['widgets']->render('toolbar-r'); ?></div>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>

    <?php if ($this['widgets']->count('logo + logo-small + headerbar + search + menu + offcanvas')) : ?>
      <nav class="tm-navbar tm-header"
      <?php if ($this['config']->get('fixed_navigation')) echo 'data-uk-sticky'; ?>>

        <div class="tm-headerbar tm-headerbar-container">
          <div class="tm-headerbar-left uk-flex uk-flex-middle">
            <?php if ($this['widgets']->count('logo')) : ?>
              <a class="tm-logo uk-hidden-small" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo'); ?></a>
            <?php endif; ?>

            <?php if ($this['widgets']->count('logo-small')) : ?>
              <a class="tm-logo-small uk-visible-small" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo-small'); ?></a>
            <?php endif; ?>
          </div>

          <?php if ($this['widgets']->count('menu')) : ?>
            <div class="uk-flex uk-flex-center">
              <?php echo $this['widgets']->render('menu'); ?>
            </div>
          <?php endif; ?>

          <?php if ($this['widgets']->count('headerbar + search + offcanvas')) : ?>
            <div class="tm-headerbar-right uk-flex uk-flex-middle">
              <?php if ($this['widgets']->count('search')) : ?>
                <div class="uk-hidden-small">
                  <?php echo $this['widgets']->render('search'); ?>
                </div>
              <?php endif; ?>

              <?php if ($this['widgets']->count('headerbar')) : ?>
                <?php echo $this['widgets']->render('headerbar'); ?>
              <?php endif; ?>

              <?php if ($this['widgets']->count('offcanvas')) : ?>
                <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
              <?php endif; ?>

            </div>
          <?php endif; ?>
        </div>
      </nav>
    <?php endif; ?>

    <?php if (!$this['config']->get('fixed_navigation')) : ?>
      <?php if ($this['config']->get('totop_scroller', true)) : ?>
        <div class="tm-totop-scroller-fixed" data-uk-smooth-scroll data-uk-sticky="{top:-400, animation: 'uk-animation-slide-top'}">
          <a href="#"></a>
        </div>
      <?php endif; ?>
    <?php endif; ?>
    <?php if ($this['widgets']->count('heading')) : ?>
      <div id="tm-heading" class="<?php echo $block_classes['heading']; ?>">
        <div class="<?php echo $container_class['heading']; ?>">
          <section class="<?php echo $grid_classes['heading']; echo $display_classes['heading']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('heading', array('layout'=>$this['config']->get('grid.heading.layout'))); ?></section>
        </div>
      </div>
    <?php endif; ?>
    <?php if ($this['widgets']->count('top-a')) : ?>
      <div id="tm-top-a" class="<?php echo $block_classes['top-a']; ?>">
        <div class="<?php echo $container_class['top-a']; ?>">
          <section class="<?php echo $grid_classes['top-a']; echo $display_classes['top-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('top-a', array('layout'=>$this['config']->get('grid.top-a.layout'))); ?></section>
        </div>
      </div>
    <?php endif; ?>

    <?php if ($this['widgets']->count('top-b')) : ?>
      <div id="tm-top-b" class="<?php echo $block_classes['top-b']; ?>">
        <div class="<?php echo $container_class['top-b']; ?>">
          <section class="<?php echo $grid_classes['top-b']; echo $display_classes['top-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('top-b', array('layout'=>$this['config']->get('grid.top-b.layout'))); ?></section>
        </div>
      </div>
    <?php endif; ?>

    <?php if ($this['widgets']->count('top-c')) : ?>
      <div id="tm-top-c" class="<?php echo $block_classes['top-c']; ?>">
        <div class="<?php echo $container_class['top-c']; ?>">
          <section class="<?php echo $grid_classes['top-c']; echo $display_classes['top-c']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('top-c', array('layout'=>$this['config']->get('grid.top-c.layout'))); ?></section>
        </div>
      </div>
    <?php endif; ?>

    <?php if ($this['widgets']->count('top-d')) : ?>
      <div id="tm-top-d" class="<?php echo $block_classes['top-d']; ?>">
        <div class="<?php echo $container_class['top-d']; ?>">
          <section class="<?php echo $grid_classes['top-d']; echo $display_classes['top-d']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('top-d', array('layout'=>$this['config']->get('grid.top-d.layout'))); ?></section>
        </div>
      </div>
    <?php endif; ?>

    <?php if ($this['widgets']->count('main-top + main-bottom + sidebar-a + sidebar-b') || $this['config']->get('system_output', true)) : ?>
      <div id="tm-main" class="<?php echo $block_classes['main']; ?>">

        <div class="<?php echo $container_class['main']; ?>">

          <?php if ($this['widgets']->count('breadcrumbs')) : ?>
            <?php echo $this['widgets']->render('breadcrumbs'); ?>
          <?php endif; ?>

          <div class="uk-grid" data-uk-grid-match data-uk-grid-margin>

            <?php if ($this['widgets']->count('main-top + main-bottom') || $this['config']->get('system_output', true)) : ?>
              <div class="<?php echo $columns['main']['class'] ?>">

                <?php if ($this['widgets']->count('main-top')) : ?>
                  <section id="tm-main-top" class="<?php echo $grid_classes['main-top']; echo $display_classes['main-top']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-top', array('layout'=>$this['config']->get('grid.main-top.layout'))); ?></section>
                <?php endif; ?>

                <?php if ($this['config']->get('system_output', true)) : ?>

                  <main id="tm-content" class="tm-content">

                    <?php echo $this['template']->render('content'); ?>

                  </main>
                <?php endif; ?>

                <?php if ($this['widgets']->count('main-bottom')) : ?>
                  <section id="tm-main-bottom" class="<?php echo $grid_classes['main-bottom']; echo $display_classes['main-bottom']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-bottom', array('layout'=>$this['config']->get('grid.main-bottom.layout'))); ?></section>
                <?php endif; ?>

              </div>
            <?php endif; ?>

            <?php foreach($columns as $name => &$column) : ?>
              <?php if ($name != 'main' && $this['widgets']->count($name)) : ?>
                <aside class="<?php echo $column['class'] ?>"><?php echo $this['widgets']->render($name) ?></aside>
              <?php endif ?>
            <?php endforeach ?>

          </div>

        </div>

      </div>
    <?php endif; ?>

    <?php if ($this['widgets']->count('bottom-a')) : ?>
      <div id="tm-bottom-a" class="<?php echo $block_classes['bottom-a']; ?>">
        <div class="<?php echo $container_class['bottom-a']; ?>">
          <section class="<?php echo $grid_classes['bottom-a']; echo $display_classes['bottom-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('bottom-a', array('layout'=>$this['config']->get('grid.bottom-a.layout'))); ?></section>
        </div>
      </div>
    <?php endif; ?>

    <?php if ($this['widgets']->count('bottom-b')) : ?>
      <div id="tm-bottom-b" class="<?php echo $block_classes['bottom-b']; ?>">
        <div class="<?php echo $container_class['bottom-b']; ?>">
          <section class="<?php echo $grid_classes['bottom-b']; echo $display_classes['bottom-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('bottom-b', array('layout'=>$this['config']->get('grid.bottom-b.layout'))); ?></section>
        </div>
      </div>
    <?php endif; ?>

    <?php if ($this['widgets']->count('bottom-c')) : ?>
      <div id="tm-bottom-c" class="<?php echo $block_classes['bottom-c']; ?>">
        <div class="<?php echo $container_class['bottom-c']; ?>">
          <section class="<?php echo $grid_classes['bottom-c']; echo $display_classes['bottom-c']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('bottom-c', array('layout'=>$this['config']->get('grid.bottom-c.layout'))); ?></section>
        </div>
      </div>
    <?php endif; ?>

    <?php if ($this['widgets']->count('bottom-d')) : ?>
      <div id="tm-bottom-d" class="<?php echo $block_classes['bottom-d']; ?>">
        <div class="<?php echo $container_class['bottom-d']; ?>">
          <section class="<?php echo $grid_classes['bottom-d']; echo $display_classes['bottom-d']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('bottom-d', array('layout'=>$this['config']->get('grid.bottom-d.layout'))); ?></section>
        </div>
      </div>
    <?php endif; ?>
    <?php if ($this['widgets']->count('footer-bottom')) : ?>
      <div id="tm-footer-bottom" class="<?php echo $block_classes['footer-bottom']; ?>">
        <div class="<?php echo $container_class['footer-bottom']; ?>">
          <section class="<?php echo $grid_classes['footer-bottom']; echo $display_classes['footer-bottom']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('footer-bottom', array('layout'=>$this['config']->get('grid.footer-bottom.layout'))); ?></section>
        </div>
      </div>
    <?php endif; ?>
    <?php if ($this['widgets']->count('footer + footer-l + footer-r + debug') || $this['config']->get('warp_branding', true) || $this['config']->get('totop_scroller', true)) : ?>
      <footer id="tm-footer" class="tm-footer">
        <div class="uk-container uk-container-center">
          <?php if ($this['config']->get('totop_scroller', true)) : ?>
            <div class="tm-totop-scroller" data-uk-smooth-scroll>
              <a href="#"></a>
            </div>
          <?php endif; ?>
          <?php if ($this['widgets']->count('footer')) : ?>
            <?php echo $this['widgets']->render('footer'); ?>
          <?php endif; ?>
          <div class="uk-grid" data-uk-grid-margin="">
            <?php if ($this['widgets']->count('footer-l')) : ?>
              <div class="uk-width-medium-1-2">
                <?php echo $this['widgets']->render('footer-l'); ?>
                <?php
                $this->output('warp_branding');
                echo $this['widgets']->render('debug');
                ?>
              </div>
            <?php endif; ?>
            <?php if ($this['widgets']->count('footer-r')) : ?>
              <div class="uk-width-medium-1-2 uk-clearfix">
                <div class="uk-float-right">
                  <?php echo $this['widgets']->render('footer-r'); ?>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </footer>
    <?php endif; ?>
    <?php echo $this->render('footer'); ?>
    <?php if ($this['widgets']->count('offcanvas')) : ?>
      <div id="offcanvas" class="uk-offcanvas">
        <div class="uk-offcanvas-bar"><?php echo $this['widgets']->render('offcanvas'); ?></div>
      </div>
    <?php endif; ?>

  </div>
</body>
</html>
