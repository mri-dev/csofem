<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/html4"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="http://www.facebook.com/2008/fbml" lang="hu-HU" ng-app="tuzvedelmicentrum">
<head>
    <title><?=$this->title?></title>
    <?=$this->addMeta('robots','index,folow')?>
    <?=$this->SEOSERVICE?>
    <?php if ( $this->settings['FB_APP_ID'] != '' ): ?>
    <meta property="fb:app_id" content="<?=$this->settings['FB_APP_ID']?>" />
    <?php endif; ?>
    <? $this->render('meta'); ?>
</head>
<body class="<?=$this->bodyclass?>" ng-controller="App" ng-init="init(<?=($this->gets[0] == 'kosar' && $this->gets[1] == 4)?'true':'false'?>)">
<div ng-show="showed" ng-controller="popupReceiver" class="popupview" data-ng-init="init({'contentWidth': 1150, 'domain': '.csofem.web-pro.hu', 'receiverdomain' : '<?=POPUP_RECEIVER_URL?>', 'imageRoot' : '<?=POPUP_IMG_ROOT?>/'})"><ng-include src="'/<?=VIEW?>popupview.html'"></ng-include></div>
<? if(!empty($this->settings[google_analitics])): ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', ' <?=$this->settings[google_analitics]?>', 'auto');
  ga('send', 'pageview');
</script>
<? endif; ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/hu_HU/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<header>
  <div class="top">
    <div class="flex">
      <div class="social">
        <div class="flex flexmob-exc-resp">
          <?php if ( !empty($this->settings['social_facebook_link'])) : ?>
          <div class="facebook">
            <a target="_blank" title="Facebook oldalunk" href="<?=$this->settings['social_facebook_link']?>"><i class="fa fa-facebook"></i></a>
          </div>
          <?php endif; ?>
          <?php if ( !empty($this->settings['social_youtube_link'])) : ?>
          <div class="youtube">
            <a target="_blank" title="Youtube csatornánk" href="<?=$this->settings['social_youtube_link']?>"><i class="fa fa-youtube"></i></a>
          </div>
          <?php endif; ?>
          <?php if ( !empty($this->settings['social_googleplus_link'])) : ?>
          <div class="googleplus">
            <a target="_blank" title="Google+ oldalunk" href="<?=$this->settings['social_googleplus_link']?>"><i class="fa fa-google-plus"></i></a>
          </div>
          <?php endif; ?>
          <?php if ( !empty($this->settings['social_twitter_link'])) : ?>
          <div class="twitter">
            <a target="_blank" title="Twitter oldalunk" href="<?=$this->settings['social_twitter_link']?>"><i class="fa fa-twitter"></i></a>
          </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="navs">
        <div class="flex">
          <div class="ugyfelkapu">
            <a href="/user/belepes"><i class="fa fa-user"></i> Ügyfélkapu</a>
          </div>
          <div class="kedvencek">
            <a href="/kedvencek"><i class="fa fa-star"></i> Kedvencek <span class="badge">{{fav_num}}</span></a>
          </div>
          <div class="div"></div>
          <div class="elofoglalas">
            <a href="/user/elofoglalas"><i class="fa fa-pause-circle-o"></i> Előfoglalás <span class="badge">{{fav_num}}</span></a>
          </div>
          <div class="cart">
            <div class="holder" id="mb-cart" mb-event="true" data-mb='{ "event": "toggleOnClick", "target" : "#mb-cart" }'>
              <span class="badge" id="cart-item-num-v">0</span>
              <div class="ico">
                <img src="<?=IMG?>icons/cart.svg" alt="Kosár" />
              </div>
              <div class="cash"><span class="amount" id="cart-item-prices">0</span> Ft</div>
              <div class="floating">
                <div id="cartContent" class="overflowed">
                  <div class="noItem"><div class="inf">A kosár üres</div></div>
                </div>
                <div class="whattodo">
                  <div class="flex">
                    <div class="doempty">
                      <a href="/kosar/?clear=1">Kosár ürítése <i class="fa fa-trash"></i></a>
                    </div>
                    <div class="doorder">
                      <a href="/kosar">Megrendelése <i class="fa fa-arrow-circle-o-right"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="main">
    <div class="flex">
      <div class="logo">
        <a href="<?=$this->settings['page_url']?>"><img src="<?=IMG?>csofem_logo.svg" alt="<?=$this->settings['page_title']?>"></a>
      </div>
      <div class="nav">
        <ul>
          <li class="cats">
            <a href="/termekek"><i class="fa fa-sliders"></i> Összes termék <i class="fa fa-angle-down"></i></a>
            <div class="list">
              <?php $this->render('templates/sidebar_menu'); ?>
            </div>
          </li>
          <? foreach ( $this->menu_header->tree as $menu ): ?>
          <li>
            <a href="<?=($menu['link']?:'')?>">
              <? if($menu['kep']): ?><img src="<?=\PortalManager\Formater::sourceImg($child['kep'])?>"><? endif; ?>
              <?=$menu['nev']?> <? if($menu['child']): ?><i class="fa fa-angle-down"></i><? endif; ?></a>
              <? if($menu['child']): ?>
              <div class="sub nav-sub-view">
                  <div class="inside">
                    <ul>
                    <? foreach($menu['child'] as $child): ?>
                    <li class="<?=$child['css_class']?>">
                      <? if($child['link']): ?><a href="<?=$child['link']?>"><? endif; ?>
                      <span style="<?=$child['css_styles']?>"><?=$child['nev']?></span>
                      <? if($child['link']): ?></a><? endif; ?>
                    </li>
                    <? endforeach; ?>
                    </ul>
                  </div>
              </div>
              <? endif; ?>
          </li>
          <? endforeach; ?>
          <li class="searcher">
            <a href="javascript:void(0);">Keresés <i class="fa fa-search"></i></a>
            <div class="searchform">
              <form class="" action="/termekek/" method="get">
              <div class="flex flexmob-exc-resp">
                <div class="input">
                  <input type="text" name="src" value="<?=$_GET['src']?>" placeholder="Keresési kifejezés megadása">
                </div>
                <div class="button">
                  <button type="submit"><i class="fa fa-search"></i></button>
                </div>
              </div>
              </form>
            </div>
          </li>
        </ul>
      </div>
      <div class="contact-phone">
        asd
      </div>
    </div>
  </div>
  <div class="slideshow">
    <?php $this->render('templates/slideshow'); ?>
  </div>
  <div class="bottom">
    <div class="pw">
      <div class="flex">
        <div class="">
          1
        </div>
        <div class="">
          2
        </div>
      </div>
    </div>
  </div>
</header>
<?php if ( !$this->homepage ): ?>
<!-- Content View -->
<div class="website">
		<?=$this->gmsg?>
		<div class="general-sidebar"></div>
		<div class="site-container <?=($this->gets[0]=='termek' || $this->gets[0]=='kosar' )?'productview':''?>">
			<div class="clr"></div>
			<div class="inside-content">
<?php endif; ?>