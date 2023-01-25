---
title: Philosophy
---

# Philosophy
## How we approach software engineering

### Learn it all over know it all

A key part of our team culture is to always be learning. Our team strives to always have the great questions, and know what we don't know.

### User-centric engineering

Our motivations for writing code should always start with the end user. What are their motivations? What are their goals? What are their concerns? How can we best empower end users and get out of their way?

Kind of like Human-Oriented Design, but for software.

### Generally follow "the WordPress way" and community norms

The WordPress Way has evolved over time. It might not always be the most modern or even "best" way. But it's tested by time and massive audience. Leaning on WordPress norms also makes it easier to onboard developers used to WordPress.

### Simple over clever

In general, code in the simplest way not the coolest or cleverist way. Aim to ship code that is readable and reliable, not to win engineering awards.

### Balance repetition and reuse

There is a fine balance between choosing to repeat simple code and building reusable abstractions.

Use good judgement for when to create utilities and abstractions that keep code uniform and maintainable, increase quality and expedite development. 

However, don't be afraid to choose repetition when it is the most sensible and expedient option.

### Performance matters

We have concrete performance practices for different kinds of code, but it is also a part of our philosophy.

Due to the distributed or high-traffic nature of many of our codebases, micro-optimizations add up in scale and over time. The flip side of that coin is that unoptimized, unminified and unnecessary assets exponentially eat away at storage and bandwidth as our userbases scale.

We don't optimize just for optimization's sake, but we look for opportunities to prioritize our resources and give time back to users.

### Legacy code is value code

Old code isn't inherently bad code. Old code has stood the test of time and created value for users and value for the organization. It may not be a foundation we can extend or build more off of, but that doesn't mean it wasn't good code when it was written and valuable code today.
