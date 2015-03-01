---
layout: answers
status: publish
published: true
title: How to create (add new) a MySQL user in command line
author:
  display_name: Julien Bourdeau
  login: julien
  email: julien@sigerr.org
  url: ''
author_login: julien
author_email: julien@sigerr.org
wordpress_id: 348
wordpress_url: http://sigerr.org/?post_type=answers&#038;p=348
date: '2012-12-07 21:28:53 +0100'
date_gmt: '2012-12-07 21:28:53 +0100'
categories: []
tags: []
---
<p>First create your database if it's not done yet. Then create your mysql user.</p>
<pre>[cc_mysql]create database mynewdb;[/cc_mysql]</pre>
<p>What you need to replace:</p>
<ul>
<li><strong>mynewdb</strong>: the name of the database</li>
<li><strong>some_table</strong>: the name of the table</li>
<li><strong>localhost</strong>: the host of your database, in my case everything is on the same server</li>
<li><strong>user1</strong>: the name of your mysql user</li>
<li><strong>@s3cur3PWD</strong>: the password of your user</li>
</ul>
<h3>A user who can access all tables in a given database</h3>
<pre>[cc_mysql]grant all privileges on mynewdb.* to 'user1'@'localhost' identified by "@s3cur3PWD";[/cc_mysql]</pre>
<h3>A user who can access all databases</h3>
<pre>[cc_mysql]grant all privileges on *.* to 'user1'@'localhost' identified by "@s3cur3PWD";[/cc_mysql]</pre>
<h3>A user who can access a given table in a given database</h3>
<pre>[cc_mysql]grant all privileges on mynewdb.some_table to 'user1'@'localhost' identified by "@s3cur3PWD";[/cc_mysql]</pre>
