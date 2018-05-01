---
layout: post
title: "[Laravel Spark] Setting up Horizon with Spark and Forge"
subtitle: Using Spark Kiosk to authenticate to Horizon and setting up Supervisor with Laravel Forge
icon: fa-file-code-o
date: '2018-05-01'
tags: ['laravel', 'laravel spark', 'laravel horizon']
image: "assets/images/headers/horizon-spark-forge.jpg"
credits:
  - {name: "Mirza Babar Baig", url: "https://unsplash.com/photos/i_GIJysTyG0?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText"}
---

I have recently started working on a new project that I expect to show in a couple of days.
When I started, the technical stack was a no brainer for me: Laravel, Spark, Forge and Algolia.

Unfortunately, I found that it was not clear how to combine them all. I will share
with you the few tips I have put together to make Laravel Horizon work smoothly with Kiosk
(a feature of Laravel Spark),
and how to setup the supervior with Laravel Forge.


## Laravel Horizon

Horizon is the best way to manage your queues with Laravel.
It comes with a nice dashboard to monitor your jobs but you have to setup
something for authentication. By default, you can only access it in `local` env.

The documented way, is to use the `Auth` callback:

```php
Horizon::auth(function ($request) {
    // return true / false;
});
```

By I didn't want to implement any custom logic and duplicate it. Laravel Spark
ships with Kiosk, a dedicated dashboard area for devs and admins. I thought
it would make sense to just use that to authenticate to the Horizon dashboard.

**It's undocumented and it's not in the default config file** but you can
pass a list of middleware to use for Horizon.

In your `config/horizon.php`:

```php
return [
  // ...
  // Existing config
  // ...

  'middleware' => ['web', 'dev'],
];
```

Now, Laravel will check [if the logged in user is a developer](https://spark.laravel.com/docs/4.0/kiosk)
(in the Spark sense of things) but it will only allow access in `local` env.

You need to override the `Horizon::Auth` callback. In your `AppServiceProvider`:

```php
public function boot()
{
    \Horizon::auth(function () { return true; });
}
```

And you're good to go! :rocket:


## Setting up supervisor for Horizon with Laravel Forge

I'm not a expert in server management so I chose to use Laravel Forge but
I couldn't figure out how to make sure Laravel Horizon was always running.

### Add a deamon

Under _Server Details > Deamon_, add a deamon to start Horizon. This will make
sure that every time the process is terminated, the server start it again.

![Laravel Forge configuration for Horizon deamon](/assets/images/content/2018/Laravel_Forge_Horizon-deamon-supervisor.png)


### Terminate Horizon after new deployment

Because the process will always use the version of the code it was booted with, it
has to be terminated to use the latest version of your code.

In your deployment script, you only have to add the following line at the very end.

```bash
php artisan horizon:terminate
```

### Restart Horizon regularly

PHP usually isn't doing to good with long running processes so I prefer restarting
Horizon regularly.

You can achieve that in the _Server details > Scheduler_ section.

![Laravel Forge configuration for Horizon deamon](/assets/images/content/2018/Laravel_Forge_Horizon-schedule-terminate.png)


That's it! I hope it will help some of you.
