---
layout: post
title: "Setting up Discourse on Laravel Forge"
subtitle: "Setup Discourse with SSL on a server managed with Laravel Forge"
icon: fa-file-code-o
date: '2018-09-16'
tags: ["discourse", "laravel forge", "nginx", "lets encrypt"]
image: "assets/images/headers/discourse-forge.jpg"
credits:
  - {name: "Farzad Mohsenvand", url: "https://unsplash.com/photos/uFpRNc-7S-M?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText"}
---

My server is manager with Laravel Forge, mostly because I found that setting up new project
with SSL takes a lot of time. Plus, I never know if I "did it right". Forge is great if you use PHP, typically Laravel, WordPress or Symfony, but with something else, it can be tricky.

I recently wanted to install Ghost 2.0, but I gave up rapidly, just reading the install guide.

The same was about to happen with Discourse, but this time I decided to dive into it. This guide
will help you setting up Discourse, next to your other project with Laravel Forge.

**DOWNTIME**: Installing discourse will require you to turn off Nginx, all other websites will be down.
{:.alert.alert-danger}

## Getting started

### 1. Setup your DNS

Before we start, make sure the domain you want to use for Discourse is pointing to your server.
I recommend doing this first, because it might take a lot of time.

### 2. Install Docker

Discourse ships as a Docker container, which really helps installing it next to other websites. Imagine
if it required another version of Nginx or Redis than what you use!

I followed this step-by-step guide:

* [How To Install and Use Docker on Ubuntu 16.04](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-16-04)


### 3. Stop Nginx

In order to install Discourse, you need to be able to access the docker container from the outside.
When you launch the build, it will fail because your 80 port is already in-use. There is probably a way
to use another port instead but I couldn't be bothered.

I stopped Nginx and shut down all my other websites for a few hours. It wasn't a big deal for me.

```
sudo service nginx stop
```

### 4. Install Discourse

To install Discourse, I created a Mailgun account because the install process requires SMTP information. Then, I followed this guide:

* [How To Install Discourse on Ubuntu 16.04](https://www.digitalocean.com/community/tutorials/how-to-install-discourse-on-ubuntu-16-04)


## Setting up Nginx

### 5. Add a new website on Forge

Now, it's time to head to your Laravel Forge account and add a new website. Select a static HTML
website config, we will modify that later.

![Laravel Forge configuration for Discourse](/assets/images/content/2018/Laravel_Forge-static-forum.png)


### 6. Setup SSL certificate

One of the main reason I'm happily paying for Forge is that I hate SSL. The following steps assume you used Let's Encrypt from Forge. If you didn't, you may have to change some config lines in the Nginx config.

### 7. Update Nginx config

Instead of serving the default folder we want to redirect the traffic to Discourse's Docker container.
I have modify the config to remove all PHP reference and use Discourse. Make sure Nginx is reloaded and
running after your modifications.

{% gist julienbourdeau/734f1ff3577694454d5e33d48f700435 %}


## Tweaking Discourse

### 8. Update Discourse container

This is the toughest part, based on [this guide](https://meta.discourse.org/t/running-other-websites-on-the-same-machine-as-discourse/17247).

Note that I provide my entire config file, yours might be a little different but if you
focus on the diff part, it should be the same.

{% gist julienbourdeau/4ee98f9a2cbb30a2a63664de0f22e133 %}


### 9. Rebuild Discourse

Grab a coffee, this step is really long! As long as the first time you installed Discourse I guess, but
it felt much longer.

```
sudo -s
/var/discourse/launcher rebuild app
```

You're done!

![Laravel Forge configuration for Discourse](/assets/images/content/2018/Discourse-running.png)
