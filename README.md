# Banner Plugin

A simple, banner management plugin for October CMS.

Requires [Tiny Slider 2](https://ganlanyuan.github.io/tiny-slider/)

## Implementing front-end pages

Use the `banners` component to display a banner carousel. The component has the following properties:

The banners component injects the following variables to the page where it's used:

* **area** - id of the page where de banners will be displayed.

The example shows the basic component usage on the banner:

    title = "Home"
    url = "/"
    id = "home"

    [banners]
    area = "home"

    ==

    ...

    {% component 'banners' %}

    ...