---
layout: post
status: publish
published: true
title: 'PhpStorm: get autocomplete for PrestaShop'
icon: fa-code-fork
author: Julien Bourdeau
date: '2015-02-14 14:55:18 +0100'
date_gmt: '2015-02-14 13:55:18 +0100'
header-img: "assets/images/headers/PhpStorm-PrestaShop.png"
categories:
- PhpStorm
tags:
- IDE
- phpstorm
- hack
- library
download: https://github.com/julienbourdeau/PhpStorm-PrestaShop-Autocomplete/archive/master.zip
github: https://github.com/julienbourdeau/PhpStorm-PrestaShop-Autocomplete
french: "http://blog.julienbourdeau.com/geek/phpstorm-lautocompletion-avec-prestashop/"
---

If you use PhpStorm and PrestaShop you probably noticed that you can't get your IDE to autocomplete everything.

![phpstorm-prestashop-autocomplete-screenshot](/assets/images/content/2015/phpstorm-prestashop-autocomplete-screenshot.png)

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

![how-to-get-phpstorm-autocomplete-prestashop](/assets/images/content/2015/how-to-get-phpstorm-autocomplete-prestashop.png)

Find out more on Github: [https://github.com/julienbourdeau/PhpStorm-PrestaShop-Autocomplete]()
