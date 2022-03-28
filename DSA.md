# How to set up a fresh Wordpress install
This is my take on a Wordpress install from scratch

## Before install
1. Download fresh new version from Wordpress.org every new install
1. Extract files to webserver
1. Create new database and database user for WP specifically
1. Use long and strong passwords for everything, never reuse
1. Admin-username is not admin or similar, never reuse

## Do first
1. Add to ManageWP
1. Add plugins and themes via ManageWPs 

## Themes
1. [GeneratePress](https://generatepress.com/)
2. [GeneratePress Child Theme](https://docs.generatepress.com/article/using-child-theme/)

# Plugins
My preferred setup
1. ManageWP - Worker 
1. [GeneratePress Premium](https://generatepress.com/premium/)
1. [GenerateBlocks (Use Pro)](https://generateblocks.com/)
1. GenerateBlocks Pro
1. Yoast SEO
1. EWWW Image Optimizer
1. Yoast Dupliser innlegg
1. White Label CMS
1. [Block Navigation](https://gutenberg-showcase.melonpan.io/block-navigation)

# Things
1. [Favicon](https://realfavicongenerator.net/)
1. ...

## Settings
1. Permalinks (flat)
1. Media: 300x300, 600x600, 1920x1920
1. Discussion: do not allow
1. Check time and date format
1. Import setting for White Label CMS
1. ....todo below
1. Google and Bing verification code for Yoast
1. Connect to ManageWP (Orion)
1. Delete all extra themes, except last official WP theme
1. Turn on modules features in GeneratePress
1. Delete example comment and article
2. Test contact forms, make sure spam filters are good, and SPF is configured!)

## Plugins for extra features
1. Contact Form 7 (custom)
1. WPForms Lite (easy)
1. Smash Balloon Instagram Feed
1. Flamingo (important for not losing emails from customer using contact forms)
1. Font Awesome
1. Mailchimp for WooCommerce
1. Loco oversettelse
1. Regenerate Thumbnails
1. Media File Renamer
1. Strong Testimonials 
1. ACF (Pro)
2. Custom Post UI

# SPEED

## Plugins for optimizing
These are for the wrapup, when optimizing site for loading speed, google page speed, gtmetrix
1. WP-rocket (seems to be the best plugin for this)
2. Cloudflare together with WP-rocket
3. Lazy Load for Videos
4. Old advice: Autoptimize
5. Old advice: Async Javascript

## More optimizing
1. Turn on webP in image plugin
