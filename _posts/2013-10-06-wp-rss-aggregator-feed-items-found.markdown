---
layout: answers
status: publish
published: true
title: "[How To] wp rss aggregator no feed items found."
author:
  display_name: Julien Bourdeau
  login: julien
  email: julien@sigerr.org
  url: ''
author_login: julien
author_email: julien@sigerr.org
wordpress_id: 477
wordpress_url: http://www.sigerr.org/?post_type=answers&#038;p=477
date: '2013-10-06 18:08:46 +0200'
date_gmt: '2013-10-06 16:08:46 +0200'
categories: []
tags: []
---
<p>After spending hours looking deep into the plugin I realized that the links were all broken.</p>
<p><strong>http://www.domain.com/feed became http:www.domain.com. </strong>Just fix the links and it should be fine.</p>
<p>It is really hard to see because in the admin page you can still see the link and it works if you click on it (cf. screenshot)</p>
<p><img class="aligncenter size-full wp-image-478" alt="wp-rss-aggregator-No-feed-items-found" src="http://www.sigerr.org/wp-content/uploads/2013/10/wp-rss-aggregator-No-feed-items-found.png" width="578" height="110" /></p>
<p>I think some function striped the //, so possibly it could happen again.</p>
<p>The plugin page: <a href="http://wordpress.org/plugins/wp-rss-aggregator/">http://wordpress.org/plugins/wp-rss-aggregator/</a></p>
