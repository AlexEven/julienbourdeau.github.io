---
layout: answers
title: Wp RSS aggregator no feed items found
author: Julien Bourdeau
date: '2013-10-06 18:08:46 +0200'
date_gmt: '2013-10-06 16:08:46 +0200'
categories: []
tags: []
question: "wp rss aggregator no feed items found: how to fix this error ?"
question-desc: |
    I am using wp rss aggregator wordpress plugin to combine all my feeds into one. It's is very useful and efficient but suddenly it couldn't find any feed item: No feed items found.
    No error really but ALWAYS this no feed items found.

---

After spending hours looking deep into the plugin I realized that the links were all broken.

**http://www.domain.com/feed became http:www.domain.com.** Just fix the links and it should be fine.

It is really hard to see because in the admin page you can still see the link and it works if you click on it (cf. screenshot)

![wp-rss-aggregator-No-feed-items-found](/assets/images/content/2013/wp-rss-aggregator-No-feed-items-found.png)

I think some function striped the //, so possibly it could happen again.

The plugin page: [http://wordpress.org/plugins/wp-rss-aggregator/](http://wordpress.org/plugins/wp-rss-aggregator/)

