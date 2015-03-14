---
layout: answers
title: "[Ubuntu] uShare Deamon doesn’t start"
icon: fa-linux
author: Julien Bourdeau
date: '2012-12-07 19:33:30 +0100'
date_gmt: '2012-12-07 19:33:30 +0100'
header-img: "assets/images/headers/warty-final-ubuntu.png"
categories: []
tags: []
comment: 'off'
question: How do I start uShare Deamon (upnp player) ?
question-desc: |
    If like me you wanted to play MP4 video with you share you probably had to compile it yourself. I followed this nice post but it didn’t work exactly like I expected.

    The ushare.conf file was at the right place

    /usr/local/etc/ushare.conf
    but the file /usr/local/etc/init.d/ushare was refering to

    /etc/ushare.conf
---

## The Solution

I cannot explain what went wrong, I edited the file with VIM to change some path:

1. Demon file path: **/usr/bin/ushare**
1. Config file path: **/usr/local/etc/ushare.conf**

At the end the command “ushare” was still using the file in /etc/init.d/ushare so I edited this one as well. Now its working pretty well except it’s not starting the server at boot. *sudo update-rc.d ushare defaults* isn’t working. I tried to use the graphical interface to execute the following command at boot but it failed. It’s still working with MP4 but I have to start the server manually.


{% highlight sh %}
/usr/local/etc/init.d/ushare start
{% endhighlight %}


Tonight all I can think about is that I didn’t uninstall ushare correctly before compiling it myself.
