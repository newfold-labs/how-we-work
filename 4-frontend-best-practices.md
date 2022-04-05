# Frontend Best Practices

Our most stringent standards and expectations are for experiences that our customers provide their visitors -- but we strive for similar quality in our authenticated experiences.

We expect diagnostic tools like Lighthouse and the Network tab in a browser to be used in profiling frontend experiences.

## Semantic HTML

We expect markup to be expressed in valid, semantic HTML elements with proper heading structure, appropriate use of anchors vs. buttons and without legacy tags like `<marquee>`, `<b>` or `<i>`.

Beyond being more accessible, more digestable for search engines and scrapers, there are secondary benefits as well to relying too heavily on `<div>` to divide interfaces even when SEO isn't a factor.

One example is that in the WordPress Admin, if a third-party plugin is loading a stylesheet indiscriminately targeting `<div>` in a way that interferes with our specificity, simply by using `<header>`, `<section>`, `<aside>` or other semantic tags we dodge that issue.

## Documents and DOMs

### Avoid excessive DOM size and depth

Excessive document sizes, whether transmitted in-full or built after runtime, impact browser performance and run up against memory limits of thin clients. It doesn't matter how clever and well-formed code is, if there's simply too much of it, the experience is poor.

* Aim for less than 1,500 DOM elements.
* Aim for tree depths less than 32 elements.
* Aim for fewer than 60 children elements per parent element.

While these are not hard limits, they are good reminders and worthy targets. In the end, less markup is faster markup.

In WordPress, we often don't control DOM size, shape or depth -- but we can be congnizant of how our code exists within the environment.

### Batch DOM changes

If looping data to write to the DOM, batch those changes into DOM nodes that get added with a single insertion, instead of updating the DOM during each loop iteration.

### Buffer giant lists

Use efficient scrolling and paging techniques like list virtualization to limit DOM elements to those only currently visible in the viewport.

## Runtime Execution

### Avoid render-blocking resources

#### `<script>`

Make appropriate use of `defer` and `async`.

_In WordPress, the `script_loader_tag` filter can be used to apply per-handle._

#### `<link rel="stylesheet">`

When possible, make use of `media` to declare the media query the stylesheet applies to so the browser can prioritize requests.

_In WordPress, the `style_loader_tag` filter can be used to apply per-handle._

### Preload, preconnect & prefetch

#### Preloading

JavaScript, CSS stylesheets, webfont files, frame documents, audio, video and XHR requests to JSON files can be preloaded.

While not every resource should be preloaded, it's a great way to declare high-priority assets and make them available before or early in browser rendering.

[Learn more](https://developer.mozilla.org/en-US/docs/Web/HTML/Link_types/preload) about using `<link>`'s for preloading at MDN.

#### Preconnection

Preconnection allows a browser to resolve DNS for an origin resource, often making subsequent requests to that domain faster.

This resource hint empowers the browser to setup a connection before an HTTP request is sent to the server, cutting down on request latency.

`preconnect` is best for resources that will always be requested, and ideal for connecting CDNs and image services.

##### Prefer Link HTTP Header to <link> tag as it can happen prior to parsing of markup.
##### Font resources must have the `crossorigin` attribute with `rel="preconnect"`

#### Prefetch

`prefetch` is a low-priority technique for resource-hinting. It instructs browsers to fetch resources in the background during idle time and keep them in browser cache.

There are three distinct kinds of prefetching:
* Link prefetching (i.e. /image.jpg)
* DNS prefetching (we'll get to the difference between this and preconnect)
* Prerender of documents

### Link prefetching 

Link prefetching should be used sparingly, only on top-priority assets like a company logo, or one with overwhelming certainty of being needed.

### DNS prefetching

Where `preconnect` is best for assets that will always be requested, `dns-prefetch` performs DNS lookups during idle and has broader browser support and therefore serves as a good fallback for browsers that don't support preconnect.

DNS resolution is often fast, but use of `dns-prefetch` can cut 20-120ms from the request round-trip.

### Lazy-loading images and iframe embeds

Often images and service embeds like YouTube included directly are the bulk of the impact to performance budgets, so we look to solutions that rely on IntersectionObserver for images or user-interaction for service embeds. However, it is important images and video don't rapidly enter the rendered document causing Cumulative Layout Shift -- one huge contributor to the perceived performance of a frontend. So providing placeholders, skeleton animations and aspect-ratio's that are exact or very close to the final image or frame are very important.

### Avoid excessive use of spinners and skeletons

Loading and progress states are a valuable way to communicate to users, but they can be overdone and more distracting than helpful.

A few common issues we try to avoid:
* Multiple spinners running on a page in different cards -- one or none.
* Showing a loading animation that doesn't have time to complete one or a few loops -- this is often more jarring than impressive.
* Skeleton states that noticably different than the content they replace -- the brain is busy reconciling the difference instead of focusing on the content when it enters.
* The dreaded progress bar that isn't fluid, accurate or the worst offender -- frequently jumps back.
* Short operations less than 400ms shouldn't have a spinner, progress bar or "pulsing skeleton state." They should be blank and rapidly fade-in.
* Medium operations between 400ms and 5000ms are best to show a skeleton state and rapid fade-in.
* Long-running operations without reliable way to predic
* Using SVG animations where CSS animations can work -- SVG animations can often be expressed using less code in CSS or get "SVG jank" where they stutter as the entire document loads where CSS is often smoother.

## Runtime Payloads
* Use efficient and modern image formats optimized by compression algorhythms
* Use modern and limited quanities of webfonts, ideally variable webfonts to avoid multiple weights
* Minify scripts, styles and vectors.

## JavaScript

### Too many dependencies

While we don't have hard performance budgets and don't believe in rebuilding the wheel, please keep a close eye on the size of vendor dependencies and whether the ROI for the business purpose supports the additional resource weight.

### Prefer getElementById and simple matches over querySelectorAll

Aim for the most-efficient selectors when selecting DOM nodes in JavaScript.

### Prefer `mouseup` to `click`

`mouseup` fires quicker than `click` and can greatly contribute to the perceived performance of interface interactions.

### Reads and write to browser storage

The performance of browser local and session storage can be both slow, unreliable and limited and require additional vendor dependencies to assure compatibility. 

Browsers also limit the quanity of data that can be stored before unclear prompts that can scare and annoy users, and these caps are for the cumulative use by all code executing for a site.

### Efficient tapping of browser events

We expect appropriate use of `requestAnimationFrame()` and `requestIdleCallback()` within JavaScript, debouncing at a higher cadence if necessary and using something like IntersectionObserver for scroll observation insteady of legacy solutions with poor performance.

## Inline & Linked CSS Stylesheets
* Please respect user preferences for `@media (prefers-reduced-motion: reduce)`
* Please use `will-change` to enable browsers to serve the best experience as experiences morph state.
* Please use `font-display` and other techniques to avoid Flash of Unstyled Text and avoid Cumulative Layout Shift.
* Please be conscious of resource-intensive CSS properties like `box-shadow`, `transform`, `filter` and `position: fixed`, `border-radius`, `:nth-child`.
* Avoid Base64 bitmaps or vectors when possible -- base64 is 30% larger than the original and parsed by the browser
* Critical CSS
* Use the `media` attribute on `<link rel="stylesheet">` to declare download priority for browsers when CSS is isolated by screen size.
* Animation: prefer `position`, `scale`, `rotation` and `opacity`, dislike changes to height and width (transform: scale), avoid `top|right|button|left` instead `transform: translate()`.

## Images and embeds
* Prefer AVIF and webp to jpeg and png.
* Prefer vectors to bitmaps and icon fonts.
* Always compress assets to an optimized delivery size.
* Use srcset on large images to right-size the version of the asset delivered to various display widths.

### On YouTube, Twitter and Facebook

Embeds from popular services often can be a drag on frontend performance, so using lazy-loading techniques on iframes, styles to help mitigate CLS and judicious use should all be considered when using media and content embeds.

## Limit & Group Media Queries

Media queries can be expensive to execute as a browser resizes and repaints, including on the first paint. Knowing this, aim for the fewest possible media queries, never leave an empty media query in stylesheets and consider using a tool like [postcss-combine-media-query](https://github.com/SassNinja/postcss-combine-media-query) to combine media queries in isolated component systems.

## Leverage CDNs and subdomains

CDNs that keep assets at-the-edge are a common best practice for fast delivery of static assets.

While less of an issue with HTTP/2 and greater, browsers can have a maximum number of concurrent resource requests and with HTTP/1.1 this often maxed-out at 6-8 requests per-domain. By storing images and media on a different CDN subdomain that scripts and styles, or further subdividing assets, browsers can more quickly download resources for presentation.  

# Minify assets, including HTML

Minification -- removing white space, line breaks and reducing variable names so assets are optimized for machines not readability -- is an important technique in modern development. This also goes for HTML markup delivered to browsers and in API responses to reduce the transmission size of documents.