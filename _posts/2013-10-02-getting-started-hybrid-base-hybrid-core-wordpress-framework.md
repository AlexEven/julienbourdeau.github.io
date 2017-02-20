---
layout: post
title: Getting started with Hybrid Base and Hybrid Core (Wordpress Framework)
date: '2013-10-02 11:41:33 +0200'
date_gmt: '2013-10-02 09:41:33 +0200'
image: "assets/images/headers/framework-writer.jpg"
categories:
- Wordpress
tags:
- tutorial
- wordpress
- framework
- hybrid
- getting started
---

I haven't developed any Wordpress themes for a while, **for most websites I now try to find something on ThemeForest**. The last theme I created, I made this one that you are looking at. It's based on [_s](http://underscores.me/) (Underscores) and Bootstrap 2. This theme is also [available on github](https://github.com/julienbourdeau/sigerr-theme). Making it myself wasn't a need, it was more about something fun to do.

Today on ThemeForest I couldn't find any Wordpress themes that would fit my needs, so I'm gonna code it from an HTML theme. Yeah, I'm not an artist , I have to face facts.

<div class='alert alert-info'>
You can skip the first part and go straight to Getting Started with Hybrid Base.
</div>

## Hybrid Core, Hybrid Base or Underscores (_s) ?

Before I start coding, I want to make sure that I'm going down the right road. Do I need a framework? Do I need a theme functionality or a plugin? After a lot of reading I picked 3 frameworks to start a theme.

### Hybrid Core

![](/assets/images/content/2013/hybrid-core-logo-300x200.png)

**Hybrid Core** is a proper framework: set of modular PHP scripts to aid in the development of WordPress themes. Like they say on the web page, **Hybrid is NOT a theme**, you cannot expect it to work straight away. There isn't any index.php or single.php in the folder, only one hybrid.php.

_Example of features_:

* Breadcrumb Trail
* Cleaner Gallery
* Drop-down Menus
* Post Templates
* ...

**Hybrid is free but the support and doc are paid**, you need to be a member of the Club. It's only $29 a year so if you are a beginner I think it is worth it.

<div style="text-align:center;">
	<a class="btn btn-primary" href="http://themehybrid.com/hybrid-core">
		<i class="fa fa-home"></i>
		Homepage
	</a>
	<a class="btn btn-danger" href="https://github.com/justintadlock/hybrid-core">
		<i class="fa fa-github"></i>
		Github
	</a>
	<a class="btn btn-warning" href="https://github.com/justintadlock/hybrid-core/archive/master.zip">
		<i class="fa fa-file"></i>
		Download
	</a>
</div>

### Hybrid Base

![](/assets/images/content/2013/hybrid-base-screenshot-300x200.png)

Hybrid Base is a starter theme based on Hybrid Core. It will provide every file you need; the markup and loops are ready to use. Hybrid base defines many post formats: aside, audio, chat, image, gallery, link, quote, status and video.

The point with Hybrid base is that you can really focus on the style. The style.css defined several empty CSS classes, it will help you keep it organized.

Hybrid Base cannot work with Hybrid Core but I'll get into that in the next part.

<div style="text-align:center;">
	<a class="btn btn-primary" href="http://themehybrid.com/themes/hybrid-base">
		<i class="fa fa-home"></i>
		Homepage
	</a>
	<a class="btn btn-danger" href="https://github.com/justintadlock/hybrid-base">
		<i class="fa fa-github"></i>
		Github
	</a>
	<a class="btn btn-warning" href="https://github.com/justintadlock/hybrid-base/archive/master.zip">
		<i class="fa fa-file"></i>
		Download
	</a>
</div>

### _s

_s is another starter theme. It's created by Automatic and Ian Stewart, who also made the [Thematic Framework](http://thematictheme.com/).

> Hi. I'm a starter theme called _s, or underscores, if you like. I'm a theme meant for hacking so don't use me as a Parent Theme. Instead try turning me into the next, most awesome, WordPress theme out there. That's what I'm here for.

Underscores is very similar to Hybrid Base but after using it, I feel like there are less features. The website lets you define a name for your project before you download the theme, it will prefix and rename every function (replacing "_S", "_S_", "_s_" with your defined name). It's worth trying !

<div style="text-align:center;">
	<a class="btn btn-primary" href="http://underscores.me/">
		<i class="fa fa-home"></i>
		Homepage
	</a>
	<a class="btn btn-danger" href="https://github.com/automattic/_s">
		<i class="fa fa-github"></i>
		Github
	</a>
	<a class="btn btn-warning" href="https://github.com/Automattic/_s/archive/master.zip">
		<i class="fa fa-file"></i>
		Download
	</a>
</div>

![The first thing you get with your started theme (_s or Hybrid Base)](/assets/images/content/2013/La_Boucherie_Bio__Un_site_utilisant_WordPress-680x371.png)

The first thing you get with your started theme (`_s` or Hybrid Base)[/caption]

### Shall I use a parent theme?

I used to be a pretty big fan of Thematic, I chose this one over Hybrid a while ago but I can't really remember why. Last year when I started my theme for sigerr.org I didn't want to use Thematic, all the hooks, all the parent/child problems,... It was just to much pain. Too much effort.

Today I came across this post "[Theme template hooks are outdated](http://justintadlock.com/archives/2013/09/16/theme-template-hooks-are-outdated)" by *Justin Tadlock*, what a relief. I wasn't being lazy: I was right !

Anyway, you shouldn't create a child theme unless you just want to override some CSS or [enqueue](http://codex.wordpress.org/Function_Reference/wp_enqueue_script) some JS.

## Getting Started with Hybrid Base

Now that we chose to use Hybrid Base, let's get into it.

<div class='alert alert-warning'>
I assume that you have basic knowledge about Git. You have it installed and you know what it is for.
</div>

### Method 1: Clone from Github

The easiest way. In your terminal, navigate to wp-content/themes/ and clone the repo.

```bash
git clone https://github.com/justintadlock/hybrid-base.git
```

This is not ready yet, the Library folder is empty. It is where you are meant to copy Hybrid Core. Like I said before, Hybrid Base does not work without Hybrid Core. Luckily Git has a feature call submodules. [Submodules](http://git-scm.com/book/en/Git-Tools-Submodules) let you clone a repo inside a cloned repo.

<i class="fa fa-book"></i> So we cloned Hybrid Base into the *hybrid-base* folder, we will now clone Hybrid Core into the *hybrid-base/library* folder, using *git submodule*.

```shell
git submodule init
```

```bash
git submodule update[/cc_bash]
```

You should get something like that:

![This is what you should get (screenshot)](/assets/images/content/2013/1.___Sites_laboucheriebio.com_wp-content_themes_hybrid-base__zsh_.png)

### Method 2: Copy and paste files then create submodules

I wasn't happy with method one, because I forked Hybrid Base and then I couldn't  push to a private repo on Github. I don't think it was the right way though.

Follow these simple steps:

1. Create a github (private) repo
1. Clone it on my laptop
1. Copy and paste all the Hybrid Base files into it
1. **Delete the *library* folder**
1. Commit
1. Add the git submodule for Hybrid Core using the following command
1. Commit

```bash
git submodule add _https://github.com/justintadlock/hybrid-core.git_ library[/cc_bash]
```

You should get something like this:

![git submodules hybrid core screeshot](/assets/images/content/2013/git-submodules-hybrid-core-screeshot.png)

That's it, you can start hacking your theme !

## Troubleshooting

##### Warning: require_once(/Users/.../wp-content/themes/hybrid-base/library/hybrid.php)

You install Hybrid Base but you didn't install the Hybrid Core dependency. Refer to method 1 or Method 2 to do so.

Otherwise, if you don't know git and you can't be bothered, just download Hybrid Core and copy/paste all the file into the library folder.

_Error message_:

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
