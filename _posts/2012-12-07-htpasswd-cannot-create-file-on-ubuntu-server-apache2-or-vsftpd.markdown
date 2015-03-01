---
layout: answers
status: publish
published: true
title: 'htpasswd: cannot create file on ubuntu server (Apache2 or vsFTPd)'
author:
  display_name: Julien Bourdeau
  login: julien
  email: julien@sigerr.org
  url: ''
author_login: julien
author_email: julien@sigerr.org
wordpress_id: 359
wordpress_url: http://sigerr.org/?post_type=answers&#038;p=359
date: '2012-12-07 21:19:45 +0100'
date_gmt: '2012-12-07 21:19:45 +0100'
categories: []
tags: []
---
<p>I looked for a solution online, I thought it was a problem with apache2 modules or something, and I finally sorted it out myself. Get ready you will be amazed!</p>
<p>I created the folder <strong><em>vsftpd</em></strong>, I created the empty file <strong><em>passwd.</em></strong></p>
<pre>[cc]sudo vim /etc/vsftpd/passwd
sudo htpasswd /etc/vsftpd/passwd julien[/cc]</pre>
<p>If you get this error "<strong><em>htpasswd: unable to update file /etc/vsftpd/passwd</em></strong>2" it because you are missing the sudo.</p>
<pre>[cc] sudo htpasswd /etc/vsftpd/passwd julien[/cc]</pre>
