---
layout: answers
title: How to create (add new) a MySQL user in command line
author: Julien Bourdeau
icon: fa-database
date: '2012-12-07 21:28:53 +0100'
date_gmt: '2012-12-07 21:28:53 +0100'
categories: []
tags: []
question: How can i easily create a new mysql user using command line?
question-desc: When you are setting up your MySQL you need to create new users. Using the command line you can do it easily.
---

First create your database if it's not done yet. Then create your mysql user.

{% highlight mysql %}
create database mynewdb;
{% endhighlight %}

What you need to replace:

* **mynewdb** : the name of the database
* **some_table** : the name of the table
* **localhost** : the host of your database, in my case everything is on the same server
* **user1** : the name of your mysql user
* **@s3cur3PWD** : the password of your user

### A user who can access all tables in a given database

{% highlight mysql %}
grant all privileges on mynewdb.* to 'user1'@'localhost' identified by "@s3cur3PWD";
{% endhighlight %}

### A user who can access all databases

{% highlight mysql %}
grant all privileges on *.* to 'user1'@'localhost' identified by "@s3cur3PWD";
{% endhighlight %}

### A user who can access a given table in a given database

{% highlight mysql %}
grant all privileges on mynewdb.some_table to 'user1'@'localhost' identified by "@s3cur3PWD";
{% endhighlight %}
