# Banner Plugin

A simple, banner management plugin for October CMS.

Requires [Tiny Slider 2](https://ganlanyuan.github.io/tiny-slider/)

## Implementing front-end pages

Use the `banners` component to display a banner carousel. The component has the following properties:

* **group_id** - id of the banner group.
* **controls** - show "Prev" and "Next" buttons (default: true).
* **nav** - show dots navigation (default: true).

The example shows the basic component usage on the banner:

    title = "Home"
    url = "/"
    id = "home"

    [banners]

    ==

    ...

    {% component 'banners' group_id='1' controls='false' nav='false' %}


    ...