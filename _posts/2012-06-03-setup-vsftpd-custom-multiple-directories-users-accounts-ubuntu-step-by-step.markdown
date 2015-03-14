---
layout: post
title: Setup VSFTPD with custom multiple directories and (virtual) users accounts
  on Ubuntu (no database required)
icon: fa-server
author: Julien Bourdeau
header-img: "assets/images/headers/vsftpd-cluster.jpg"
date: '2012-06-03 16:52:40 +0200'
date_gmt: '2012-06-03 16:52:40 +0200'
categories:
- Linux
tags:
- admin
- sysadmin
- FTP
- Ubuntu
- Linux
- tutorial
---

I wanted to install an FTP server on my servers, I checked online and it turned out that VSFTPD is the most secure one, so I began to installing it.


I've been through many tutorials but couldn't find any in full detail, so decided to write my own. I set up VSFTPD on my personal server, **wrote the tutorial step by step** then followed my own tutorial to deploy VSFTPD **on my production dedicated server**.


### How to do it

* Install vsftpd and a PAM library
* Edit /etc/vsftpd.conf and /etc/pam.d/vsftpd
* Create user accouts with custom directories (in /var/www/ for example)
* Set directories with the correct chmod and chown
* **Create a admin user with full access to the server**
* Troubleshoot



## 1. Install vsftpd (Very Secure FTP Deamon) and libpam-pwdfile to create virtual users

I wanted to create FTP users but I didn't want to add local unix users (no shell access, no home directory and so on). A PAM (**Pluggable Authentication Modules)** will help you create virtual users.

{% highlight sh %}
sudo apt-get install vsftpd libpam-pwdfile
{% endhighlight %}



## 2. Edit vsftpd.conf

First you need to back up the original file

{% highlight sh %}
sudo mv /etc/vsftpd.conf /etc/vsftpd.conf.bak
{% endhighlight %}

Then create a new one

{% highlight sh %}
sudo vim /etc/vsftpd.conf
{% endhighlight %}

Copy and paste the following lines. The file **should ONLY contain these lines**:

{% highlight sh %}

listen=YES
anonymous_enable=NO
local_enable=YES
write_enable=YES
local_umask=022
nopriv_user=vsftpd
virtual_use_local_privs=YES
guest_enable=YES
user_sub_token=$USER
local_root=/var/www/$USER
chroot_local_user=YES
hide_ids=YES
guest_username=vsftpd

{% endhighlight %}



## 3. Register virtual users

To register a user you use htpasswd, so I assume you have apache2 working on your server. Create a vsftpd folder then put configuration files in it.

{% highlight sh %}
sudo mkdir /etc/vsftpd
{% endhighlight %}

then

{% highlight sh %}
sudo htpasswd -cd /etc/vsftpd/ftpd.passwd user1
{% endhighlight %}

* **-c** means that we'll create the file if it's not existing yet
* **-d** forces MD5, you need it on ubuntu 12.04, just use it always
The command will prompt for a password.

If you want to add new users afterwards:

{% highlight sh %}
sudo htpasswd -d /etc/vsftpd/ftpd.passwd user2
{% endhighlight %}



## 4. Configure PAM in /etc/pam.d/vsftpd

Again, you need to back up the orignal file

{% highlight sh %}
sudo mv /etc/pam.d/vsftpd /etc/pam.d/vsftpd.bak
{% endhighlight %}

and create a new one

{% highlight sh %}
sudo vim /etc/pam.d/vsftpd
{% endhighlight %}

Copy and paste these 2 lines (this should be the only content). I insist only these 2 lines, I wasted a lot of time keeping the originals and just added these.

{% highlight sh %}
auth required pam_pwdfile.so pwdfile /etc/vsftpd/ftpd.passwd
account required pam_permit.so
{% endhighlight %}



## 5. Create a local user without shell access

{% highlight sh %}
sudo useradd --home /home/vsftpd --gid nogroup -m --shell /bin/false vsftpd
{% endhighlight %}

You can check that it's been created with the id command: id vsftpd. We define the user with the /bin/false shell because of the [check_shell parameter](https://security.appspot.com/vsftpd/vsftpd_conf.html) (even if you don't use it).


{% alert info %}
When the end user  connects to the FTP server, they will be used for rights and ownership: chmod and chown.
{% endalert %}



## 6. Restart vsftpd

The common way is using init.d like all deamon

{% highlight sh %}
sudo /etc/init.d/vsftpd restart
{% endhighlight %}

In Ubuntu 12.04 there is something new with services. It worked on my 12.04 but not on my 10.04 one. To be honest I'm not a Linux expert (yet) so I can't explain why. Something to do with *Upstart* I think.

{% highlight sh %}
sudo service vsftpd restart
{% endhighlight %}



## 7. Create directories

According to your configuration all users will be placed into this folder: **/var/www/user1.**

You need to create them with particular rights: **the root folder cannot be writable!**

* Folder **/** [root = /var/www/user1] => 555
	* Folder **www** [ /var/www/user1/www ] => 755
	* Folder **docs** [ /var/www/user1/docs ] => 755

{% alert warning %}
 Note: the user **cannot** create files or folders in the root directory.
{% endalert %}

In vsftpd.conf we have chroot_local_user=YES so the user can't see anything outside of his folder. To him, the server looks like this:

![login ftp vsftpd chroot](/assets/images/content/2012/login-ftp-vsftpd-chroot-680x428.jpg)

So just run these commands:

{% highlight sh %}
mkdir /var/www/user1
chmod -w /var/www/user1
mkdir www/user1/www
chmod -R 755 /var/www/user1/www
chown -R vsftpd:nogroup /var/www/user1
{% endhighlight %}

The */var/www/user1* folder HAS TO exist or connection will fail.


Right now **you can try to connect with your FTP client** and it will succeed! If it doesn't you can check the troubleshooting part.



## 8. Create an Admin user to access the entire server

To create an admin user we need to register a new user with htpasswd.


Before we do so, I'll advise you to check into the /etc/ftpusers file that define certain users that are **not** allowed to connect with ftp. I think it's only for local users and not virtual users but just in case don't choose a name contained in this file. Let's be honest, vsftpd is complicated enough!

{% highlight sh %}
sudo htpasswd -d /etc/vsftpd/ftpd.passwd theadmin
{% endhighlight %}

Now we need to add a new line into /etc/vsftpd.conf

{% highlight sh %}
chroot_list_enable=YES
{% endhighlight %}

This means that your user will be placed into their folder (as a jail) **EXCEPT** users in the **/etc/vsftpd.chroot_list**


Let's create this file and add our user, the file is a simple line containing "theadmin". Add one user per line. That means you DON'T need to create a /var/www/theadmin folder, the user will login and start in /home/vsftpd.

Restart the server and you're done !



## Troubleshooting

Here are some errors I encountered.


### 500 OOPS: vsftpd: refusing to run with writable root inside chroot ()

Your root directory is writable, this is not allowed. Check part 7 for more information, you need to create a 555 root and 755 subfolders


### 500 OOPS: cannot change directory:/var/www/theadmin if the folder doesnt exist

The /var/www/$USER folder doesn't exist, create it with the correct rights (not writable) or add the user into the /etc/vsftpd.chroot_list (see part 8). Don't forget to restart the server.


### htpasswd: cannot create file /etc/vsftpd/ftpd.passwd

The /etc/vsftpd/ folder has to be existing, htpasswd won't create it.


### vsftpd restart or stop error: *"restart: Unknown instance"*

This means you can't start the deamon even if you have success message with /etc/init.d/vsftpd start. It doesn't start because your configuration is wrong. Start the tutorial again.



## Sources

Here are some websites that helped me

* <a href="http://www.debiantutorials.com/installing-vsftpd-using-text-file-for-virtual-users/">My favorite one</a>
* <a href="https://security.appspot.com/vsftpd/vsftpd_conf.html">The man page</a>
* <a href="http://www.benscobie.com/fixing-500-oops-vsftpd-refusing-to-run-with-writable-root-inside-chroot/">this one says something about allow_writeable_chroot but it's not in the man page</a>
* <a href="http://ubuntuforums.org/showthread.php?t=518293">A post on this forum</a>

{% alert warning %}
If you want to create some sort of symlink to let your user access somewhere outside their chroot jail use **mount --bind**
[http://backdrift.org/how-to-use-bind-mounts-in-linux](http://backdrift.org/how-to-use-bind-mounts-in-linux) 
{% endalert %}



