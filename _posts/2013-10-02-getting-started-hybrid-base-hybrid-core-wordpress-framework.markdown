---
layout: post
status: publish
published: true
title: Getting started with Hybrid Base and Hybrid Core (Wordpress Framework)
author:
  display_name: Julien Bourdeau
  login: julien
  email: julien@sigerr.org
  url: ''
author_login: julien
author_email: julien@sigerr.org
wordpress_id: 421
wordpress_url: http://www.sigerr.org/?p=421
date: '2013-10-02 11:41:33 +0200'
date_gmt: '2013-10-02 09:41:33 +0200'
categories:
- Wordpress
tags:
- tutorial
- wordpress
- framework
- hybrid
- getting started
---
<p>I haven't developed any Wordpress themes for a while, <strong>for most websites I now try to find something on ThemeForest</strong>. The last theme I created, I made this one that you are looking at. It's based on <a href="http://underscores.me/" target="_blank">_s</a> (Underscores) and Bootstrap 2. This theme is also <a href="https://github.com/julienbourdeau/sigerr-theme" target="_blank">available on github</a>. Making it myself wasn't a need, it was more about something fun to do.</p>
<p>Today on ThemeForest I couldn't find any Wordpress themes that would fit my needs, so I'm gonna code it from an HTML theme. Yeah, I'm not an artist , I have to face facts.</p>
<p>[alert type="info" closable="1"]You can skip the first part and go straight to "<em><strong><a href="#getting-started-with-hybrid-base">Getting Started with Hybrid Base</a></strong></em>" [/alert]</p>
<h2>Hybrid Core, Hybrid Base or Underscores (_s) ?</h2>
<p>Before I start coding, I want to make sure that I'm going down the right road. Do I need a framework? Do I need a theme functionality or a plugin? After a lot of reading I picked 3 frameworks to start a theme.</p>
<h3>Hybrid Core</h3>
<p><img class="size-medium wp-image-426 alignright" alt="hybrid-core-logo" src="http://www.sigerr.org/wp-content/uploads/2013/10/hybrid-core-logo-300x200.png" width="300" height="200" /></p>
<p><strong>Hybrid Core</strong> is a proper framework: set of modular <abbr title="Hypertext Preprocessor">PHP</abbr> scripts to aid in the development of WordPress themes. Like they say on the web page, <strong>Hybrid is NOT a theme</strong>, you cannot expect it to work straight away. There isn't any index.php or single.php in the folder, only one hybrid.php.</p>
<p><span style="text-decoration: underline;">Example of features</span>:</p>
<ul>
<li>Breadcrumb Trail</li>
<li>Cleaner Gallery</li>
<li>Drop-down Menus</li>
<li>Post Templates</li>
<li>...</li>
</ul>
<p><strong>Hybrid is free but the support and doc are paid</strong>, you need to be a member of the Club. It's only $29 a year so if you are a beginner I think it is worth it.</p>
<p style="text-align: center;">[button link="http://themehybrid.com/hybrid-core" text="Homepage" size="large" type="" icon="home" white=""] [button link="https://github.com/justintadlock/hybrid-core" text="Github" size="large" type="" icon="wrench" white=""] [button link="https://github.com/justintadlock/hybrid-core/archive/master.zip" text="Download" size="large" type="" icon="file" white=""]</p>
<h3>Hybrid Base</h3>
<p><img class="alignright size-medium wp-image-428" alt="hybrid-base-screenshot" src="http://www.sigerr.org/wp-content/uploads/2013/10/hybrid-base-screenshot-300x200.png" width="300" height="200" />Hybrid Base is a starter theme based on Hybrid Core. It will provide every file you need; the markup and loops are ready to use. Hybrid base defines many post formats: aside, audio, chat, image, gallery, link, quote, status and video.</p>
<p>The point with Hybrid base is that you can really focus on the style. The style.css defined several empty CSS classes, it will help you keep it organized.</p>
<p>Hybrid Base cannot work with Hybrid Core but I'll get into that in the next part.</p>
<p style="text-align: center;">[button link="http://themehybrid.com/themes/hybrid-base" text="Homepage" size="large" type="" icon="home" white=""] [button link="https://github.com/justintadlock/hybrid-base" text="Github" size="large" type="" icon="wrench" white=""] [button link="https://github.com/justintadlock/hybrid-base/archive/master.zip" text="Download" size="large" type="" icon="file" white=""]</p>
<h3>_s</h3>
<p>_s is another starter theme. It's created by Automatic and Ian Stewart, who also made the <a href="http://thematictheme.com/" target="_blank">Thematic Framework</a>.</p>
<blockquote><p>Hi. I'm a starter theme called _s, or underscores, if you like. I'm a theme meant for hacking so don't use me as a Parent Theme. Instead try turning me into the next, most awesome, WordPress theme out there. That's what I'm here for.</p></blockquote>
<p>Underscores is very similar to Hybrid Base but after using it, I feel like there are less features. The website lets you define a name for your project before you download the theme, it will prefix and rename every function (replacing "_S", "_S_", "_s_" with your defined name). It's worth trying !</p>
<p style="text-align: center;">[button link="http://underscores.me/" text="Homepage" size="large" type="" icon="home" white=""] [button link="https://github.com/automattic/_s" text="Github" size="large" type="" icon="wrench" white=""] [button link="https://github.com/Automattic/_s/archive/master.zip" text="Download" size="large" type="" icon="file" white=""]</p>
<p>[caption id="attachment_436" align="aligncenter" width="640"]<img class="size-large wp-image-436" alt="The first thing you get with your started theme (_s or Hybrid Base)" src="http://www.sigerr.org/wp-content/uploads/2013/10/La_Boucherie_Bio__Un_site_utilisant_WordPress-680x371.png" width="640" height="349" /> The first thing you get with your started theme (_s or Hybrid Base)[/caption]</p>
<h3>Shall I use a parent theme?</h3>
<p>I used to be a pretty big fan of Thematic, I chose this one over Hybrid a while ago but I can't really remember why. Last year when I started my theme for sigerr.org I didn't want to use Thematic, all the hooks, all the parent/child problems,... It was just to much pain. Too much effort.</p>
<p>Today I came across this post "<a href="http://justintadlock.com/archives/2013/09/16/theme-template-hooks-are-outdated" target="_blank">Theme template hooks are outdated</a>" by <em>Justin Tadlock</em>, what a relief. I wasn't being lazy: I was right !</p>
<p>Anyway, you shouldn't create a child theme unless you just want to override some CSS or <a href="http://codex.wordpress.org/Function_Reference/wp_enqueue_script" target="_blank">enqueue</a> some JS.</p>
<h2 id="getting-started-with-hybrid-base">Getting Started with Hybrid Base</h2>
<p>Now that we chose to use Hybrid Base, let's get into it.<br />
[alert type="warning" closable="0"]I assume that you have basic knowledge about Git. You have it installed and you know what it is for.[/alert]</p>
<h3>Method 1: Clone from Github</h3>
<p>The easiest way. In your terminal, navigate to wp-content/themes/ and clone the repo.</p>
<p>[cc_bash]git clone https://github.com/justintadlock/hybrid-base.git[/cc_bash]</p>
<p>This is not ready yet, the Library folder is empty. It is where you are meant to copy Hybrid Core. Like I said before, Hybrid Base does not work without Hybrid Core. Luckily Git has a feature call submodules. <a href="http://git-scm.com/book/en/Git-Tools-Submodules" target="_blank">Submodules</a> let you clone a repo inside a cloned repo.</p>
<p>[icon icon="book" white=""] So we cloned Hybrid Base into the <em>hybrid-base</em> folder, we will now clone Hybrid Core into the <em>hybrid-base/library</em> folder, using <em>git submodule</em>.</p>
<p>[cc_bash]git submodule init[/cc_bash]</p>
<p>[cc_bash]git submodule update[/cc_bash]</p>
<p>You should get something like that:</p>
<p>[caption id="attachment_443" align="aligncenter" width="713"]<img class="size-full wp-image-443" alt="This is what you should get (screenshot)" src="http://www.sigerr.org/wp-content/uploads/2013/10/1.___Sites_laboucheriebio.com_wp-content_themes_hybrid-base__zsh_.png" width="713" height="189" /> This is what you should get (screenshot)[/caption]</p>
<h3>Method 2: Copy and paste files then create submodules</h3>
<p>I wasn't happy with method one, because I forked Hybrid Base and then I couldn't  push to a private repo on Github. I don't think it was the right way though.</p>
<p>Follow these simple steps:</p>
<ol>
<li>Create a github (private) repo</li>
<li>Clone it on my laptop</li>
<li>Copy and paste all the Hybrid Base files into it</li>
<li><strong>Delete the <em>library</em> folder</strong></li>
<li>Commit</li>
<li>Add the git submodule for Hybrid Core using the following command</li>
<li>Commit</li>
</ol>
<p>[cc_bash]git submodule add <span style="text-decoration: underline;">https://github.com/justintadlock/hybrid-core.git</span> library[/cc_bash]</p>
<p>You should get something like this:</p>
<p>[caption id="attachment_444" align="aligncenter" width="825"]<img class="size-full wp-image-444" alt="git submodules hybrid core screeshot" src="http://www.sigerr.org/wp-content/uploads/2013/10/git-submodules-hybrid-core-screeshot.png" width="825" height="282" /> Git submodules add (screenshot)[/caption]</p>
<p>That's it, you can start hacking your theme !</p>
<h2>Troubleshooting</h2>
<h4>Warning: require_once(/Users/.../wp-content/themes/hybrid-base/library/hybrid.php)</h4>
<p>You install Hybrid Base but you didn't install the Hybrid Core dependency. Refer to method 1 or Method 2 to do so.</p>
<p>Otherwise, if you don't know git and you can't be bothered, just download Hybrid Core and copy/paste all the file into the library folder.</p>
<p><span style="text-decoration: underline;">Error message</span>:</p>
<table style="font-family: serif; font-size: 12px;" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td colspan="5" valign="middle"><b>( ! )</b><b> Warning: require_once(/Users/julien/.../wp-content/themes/hybrid-base/library/hybrid.php): failed to open stream: No such file or directory in /Users/julien/.../wp-content/themes/hybrid-base/functions.php on line <i>32</i></b></td>
</tr>
<tr>
<td colspan="5" valign="middle"><b>Call Stack</b></td>
</tr>
<tr>
<td valign="middle"><b>#</b></td>
<td valign="middle"><b>Time</b></td>
<td valign="middle"><b>Memory</b></td>
<td valign="middle"><b>Function</b></td>
<td valign="middle"><b>Location</b></td>
</tr>
<tr>
<td valign="middle">1</td>
<td valign="middle">0.0000</td>
<td valign="middle">236792</td>
<td valign="middle">{main}( )</td>
<td valign="middle">../themes.php<b>:</b>0</td>
</tr>
<tr>
<td valign="middle">2</td>
<td valign="middle">0.0001</td>
<td valign="middle">238728</td>
<td valign="middle">require_once( '/Users/julien/Sites/.../wp-admin/admin.php' )</td>
<td valign="middle">../themes.php<b>:</b>10</td>
</tr>
<tr>
<td valign="middle">3</td>
<td valign="middle">0.0002</td>
<td valign="middle">240600</td>
<td valign="middle">require_once( '/Users/julien/Sites/.../wp-load.php' )</td>
<td valign="middle">../admin.php<b>:</b>30</td>
</tr>
<tr>
<td valign="middle">4</td>
<td valign="middle">0.0002</td>
<td valign="middle">241664</td>
<td valign="middle">require_once( '/Users/julien/Sites/.../wp-config.php' )</td>
<td valign="middle">../wp-load.php<b>:</b>29</td>
</tr>
<tr>
<td valign="middle">5</td>
<td valign="middle">0.0003</td>
<td valign="middle">242552</td>
<td valign="middle">require_once( '/Users/julien/Sites/.../wp-settings.php' )</td>
<td valign="middle">../wp-config.php<b>:</b>99</td>
</tr>
<tr>
<td valign="middle">6</td>
<td valign="middle">0.1716</td>
<td valign="middle">6784680</td>
<td colspan="2" valign="middle">include( '/Users/julien/Sites/.../wp-content/themes/hybrid-base/functions.php' )</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
