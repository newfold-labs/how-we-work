# CSS & Frontend
## Accessibility

### Best Practices
* Respect `@media (prefers-reduced-motion: reduce)`
* Avoid using reversal and radical positioning to visually re-order DOM elements.
* Strive for visible and legible fonts
* Strive for WCAG 2.1 AA Color Contrast

Remember Accessibility isn't only about compliance, it's about creating low-friction experiences for all users.

To that end, containers that hold text should be capped for nice readability and line heights should use golden-or-legible proportions that reduce work for sighted users follow documents and makes good use of screen real estate.

## Performance

The primary area where CSS performance comes into place is stylesheet sizes. Ship as little as possible to get the job done right.

However, one other area that can get unwieldy in larger codebases is media queries. When possible, combine and minimize media queries. Component libraries are common culprits for tons of media queries and when rendered they can add up to hundreds or thousands of lines of code.

## Responsive

In general, we like to avoid traditional width, margin and padding-based grids because of the inevitable nightmare of maintaining the spacing.

Our preferred grid approach is CSS Grid, as it's generally the smallest and most readable amount of markup to digest.

But Flexbox has it's place and combining Grid and Flexbox is fine.

Of particular interest, particularly in places like the WordPress Admin, are container queries and we're watching browser support closely.

## Syntax & Formatting

In general, CSS property shorthand is fine and preferred. 

Balance clarity and brevity with specific properties, and avoid unnecessary repetition like...
```css
margin-left: 1rem;
margin-right: 1rem;
margin-top: 1rem;
margin-bottom: 1rem;
```

## Documentation

## Frameworks

Our preferred framework outside the WordPress Admin is Tailwind.

Inside the WordPress Admin, we have a Newfold Component Library specifically for branded WordPress interfaces.