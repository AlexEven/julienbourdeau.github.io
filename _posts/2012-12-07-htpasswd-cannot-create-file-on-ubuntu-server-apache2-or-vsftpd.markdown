---
layout: answers
title: "htpasswd: cannot create file on ubuntu server (Apache2 or vsFTPd)"
author: Julien Bourdeau
date: '2012-12-07 21:19:45 +0100'
date_gmt: '2012-12-07 21:19:45 +0100'
categories: []
tags: []
question: "Why do I get this error: htpasswd: unable to update file /etc/vsftpd/passwd2"
question-desc: |
    I am setting up my FTP server and I had trouble creating virtual users. Every time I used the htpasswd command I got this error message:
    julien@ju-server:~$ htpasswd -c /etc/vsftpd/passwd julien htpasswd: cannot create file /etc/vsftpd/passwd
---

I looked for a solution online, I thought it was a problem with apache2 modules or something, and I finally sorted it out myself. Get ready you will be amazed!

I created the folder *vsftpd*, I created the empty file *passwd*.

{% highlight sh %}
sudo vim /etc/vsftpd/passwd
sudo htpasswd /etc/vsftpd/passwd julien
{% endhighlight %}

If you get this error **"htpasswd: unable to update file /etc/vsftpd/passwd2"** it because you are missing the sudo.

{% highlight sh %}
sudo htpasswd /etc/vsftpd/passwd julien
{% endhighlight %}
