---
layout: answers
status: publish
published: true
title: Protect directory from access but allow some filetype with .htaccess
author:
  display_name: Julien Bourdeau
  login: julien
  email: julien@sigerr.org
  url: ''
author_login: julien
author_email: julien@sigerr.org
wordpress_id: 350
wordpress_url: http://sigerr.org/?post_type=answers&#038;p=350
date: '2012-12-07 20:34:50 +0100'
date_gmt: '2012-12-07 20:34:50 +0100'
categories: []
tags: []
---
<p>To protect your directory but allow some file extension just put the following code into a file called .htaccess and upload in the folder to protect. In this example I allow only PDF and JPG.</p>
<pre>
deny from all
&lt;FilesMatch "\.(pdf|jpg)$"&gt;
Satisfy Any
Allow from all
</pre>
