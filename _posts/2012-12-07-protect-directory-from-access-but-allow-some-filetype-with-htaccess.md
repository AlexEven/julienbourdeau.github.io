---
layout: answers
title: Protect directory from access but allow some filetype with .htaccess
date: '2012-12-07 20:34:50 +0100'
date_gmt: '2012-12-07 20:34:50 +0100'
image: "assets/images/headers/warty-final-ubuntu.png"
categories: []
tags: []
question: How do I protect some file extension from visitors
question-desc: |
    I wanted to allow people to download PDF file from a folder but I dont want them to access any other file or get the index of the directory content.

    I knew the .htaccess would help me with this. It did.
---

To protect your directory but allow some file extension just put the following code into a file called .htaccess and upload in the folder to protect. In this example I allow only PDF and JPG.

``` 
deny from all
<FilesMatch "\.(pdf|jpg)$">
Satisfy Any
Allow from all
```
