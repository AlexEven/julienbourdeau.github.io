---
layout: answers
status: publish
published: true
title: "[Ubuntu] uShare Deamon doesn’t start"
author:
  display_name: Julien Bourdeau
  login: julien
  email: julien@sigerr.org
  url: ''
author_login: julien
author_email: julien@sigerr.org
wordpress_id: 338
wordpress_url: http://sigerr.org/?post_type=answers&#038;p=338
date: '2012-12-07 19:33:30 +0100'
date_gmt: '2012-12-07 19:33:30 +0100'
categories: []
tags: []
---
<h2>The Solution</h2>
<p>I cannot explain what went wrong, I edited the file with VIM to change some path:</p>
<ol>
<li>Demon file path: <strong>/usr/bin/ushare</strong></li>
<li>Config file path: <strong>/usr/local/etc/ushare.conf</strong></li>
</ol>
<p>At the end the command “ushare” was still using the file in /etc/init.d/ushare so I edited this one as well. Now its working pretty well except it’s not starting the server at boot. <em>sudo update-rc.d ushare defaults</em> isn’t working. I tried to use the graphical interface to execute the following command at boot but it failed. It’s still working with MP4 but I have to start the server manually.</p>
<pre>[cc_bash]
/usr/local/etc/init.d/ushare start
[/cc_bash]</pre>
<p>Tonight all I can think about is that I didn’t uninstall ushare correctly before compiling it myself.</p>
