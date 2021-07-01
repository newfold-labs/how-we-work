# Introduction

## Goals

In business, rules sometimes get a reputation for stifiling innovation. Coding Standards & Naming Conventions are not rules -- they're guidelines.

These guidelines, like rules, are something we expect our WordPress and WordPress-adjacent code to follow because we think they enable smart innovation and efficiencies, not obstruct creativity.

The three biggest efficiencies enabled by standards and conventions are:
1) **One uniform directory structure** that once learned makes navigating codebases much easier.
2) **Fewer bespoke decisions** around naming things, letting us focus on output and less on rebuilding wheels.
3) **Shared tooling and environments** because we can predict what most code looks like and how it's structured, we can more easily share code and test rigs.

But they're not here to get in the way, and they're not cast in stone. If they do get in the way, make an intelligent and informed choice -- and please update the guidelines.

The obvious and notable exception -- that are true rules to be followed -- are Security & Privacy standards.

## Philosophies

### Contributing

We believe in WordPress and our partnership has allowed us to support it for over 10 years. Our in-house team consists of dedicated WordPress experts to provide the best support and we dedicate engineers on our development staff to full-time WordPress Core development. From our servers to our internal tools to the scripts our customers rely on, we’re built on open source. To give back to the community we work hand-in-hand with developers to leverage our resources and expertise towards helping their software thrive. With a development team experienced in optimizing over 80 open source platforms, Bluehost is the world's leading solution for open source implementation and development.

### Learn it all over know it all

A key part of our team culture is to always be learning. Our team strives to always have the best questions, not the best answers. We offer and embrace informed answers. "I don't know, let me get back to you" is not only acceptable but encouraged. 

There are three buckets of knowledge: what we know we know, what we know we don't know and what we don't know we don't know. We strive to give adequate attention to the first two buckets and honestly embrace there is a third.

### User-centric engineering

Our motivations for writing code should always start with the end user. What are their motiviations? What are their goals? What are their concerns? How can we best empower end users and get out of their way?

End users are the North Star, but they are not the only stars in the sky. Other users might include other teams, other departments, third-party vendors, our team and ourselves. In general everyone's needs and wants should be considered, but use good judgement on which users are prioritized.

### Generally follow "the WordPress way" and community norms

The WordPress Way has evolved over time. It might not always be the most modern or even "best" way. But it's tested by time and massive audience. Leaning on WordPress norms also makes it easier to onboard developers used to WordPress.

* In general, look for opportunities to lean on Core standards and functions. 
* Lean towards reusing 3rd party libraries in Core instead of shipping analogous ones.
* In PHP, use WordPress Hooks to be a good, compatible community citizen.
* In JavaScript, use hooks and SlotFill's to be a good, compatible community citizen.

### Simple over clever

In general, code in the simplest way not the coolest or cleverist way. Aim to ship code that is readable and reliable, not win engineering awards.

### Balance repetition and reuse

There is a fine balance between chosing to repeat simple code and building reusable abstractions. Simple repetition can rapidly grow into unmaintainable and bespoke codebases that become risky. Reusable abstractions can rapidly increase the barrier to entry, make tests more complex and aren't always necessary.

Use good judgement for when to create utilities and abstractions that keep code uniform and maintainable, increase quality and expedite development. However, don't be afraid to choose repetition when it is the safest, easiest and most expedient option.

### Performance matters

We have concrete performance practices for different kinds of code, but it is also a part of our philosophy.

Due to the distributed or high-traffic nature of many of our codebases, micro-optimizations add up in scale and over time. The flip side of that coin is that unoptimized, unminified and unnecessary assets exponentially eat away at storage as our userbases scale.

We don't optimize just for optimization sake, but we look for opportunities to prioritize our resources and give time back to users.

### Legacy code is value code

Old code isn't inheriently bad code. Old code has stood the test of time and created value for users and value for the organization. It may not be a foundation we can extend or build more off of, but that doesn't mean it wasn't good code when it was written and valuable code today.
