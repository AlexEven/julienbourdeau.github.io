---
layout: post
status: publish
published: true
title: 'PhpStorm: get autocomplete for PrestaShop'
author: Julien Bourdeau
date: '2015-02-14 14:55:18 +0100'
date_gmt: '2015-02-14 13:55:18 +0100'
categories:
- PhpStorm
tags:
- IDE
- phpstorm
- hack
- library
download: https://github.com/julienbourdeau/PhpStorm-PrestaShop-Autocomplete/archive/master.zip
github: https://github.com/julienbourdeau/PhpStorm-PrestaShop-Autocomplete
---

{% icon fa-flag-checkered %} This article is also [available in French](http://blog.julienbourdeau.com/geek/phpstorm-lautocompletion-avec-prestashop/).

If you use PhpStorm and PrestaShop you probably noticed that you can't get your IDE to autocomplete everything.

![phpstorm-prestashop-autocomplete-screenshot](http://www.sigerr.org/wp-content/uploads/2015/02/phpstorm-prestashop-autocomplete-screenshot.png)

PrestaShop is designed to be overridden, and every class from the core is suffixed with 'Core'.

For example, Address class is actually declared this way:
{% highlight php startinline=true %}
class AddressCore extends ObjectModel
{
  // ...
}
{% endhighlight %}

So I have generated a file that extends each class with the correct name

{% highlight php startinline=true %}
class Address extends AddressCore {}
{% endhighlight %}

## Configure PhpStorm with PrestaShop

1. Download the file autocomplete.php (or clone this repo)
1. Add the file to your project as an "External Library" as shown on the image below

![how-to-get-phpstorm-autocomplete-prestashop](http://www.sigerr.org/wp-content/uploads/2015/02/how-to-get-phpstorm-autocomplete-prestashop.png)

Find out more on Github: [https://github.com/julienbourdeau/PhpStorm-PrestaShop-Autocomplete]()
