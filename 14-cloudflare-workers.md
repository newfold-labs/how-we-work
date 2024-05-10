# Cloudflare Workers

We leverage [Cloudflare Workers](https://developers.cloudflare.com/workers/) for a variety of tasks that we want to run on the edge.

## Table of Contents

- [Cloudflare Workers](#cloudflare-workers)
  - [Table of Contents](#table-of-contents)
  - [Quick Reference](#quick-reference)
    - [Cloudflare Workers KV](#cloudflare-workers-kv)
    - [Creating a Key-Value Namespace](#creating-a-key-value-namespace)
    - [Reading and Writing to KV](#reading-and-writing-to-kv)
    - [Workers AI](#workers-ai)
    - [Adding Workers AI to Your Worker](#adding-workers-ai-to-your-worker)
    - [Testing Workers](#testing-workers)
      - [Getting Started](#getting-started)
      - [Tests with Workers KV](#tests-with-workers-kv)
      - [Testing with multiple Workers](#testing-with-multiple-workers)

## Quick Reference

The following command line snippets assume you have [Wrangler](https://developers.cloudflare.com/workers/wrangler/) installed and connected to your Cloudflare account.

### Cloudflare Workers KV

Cloudflare has a key-value store that can be used to store data that can be accessed by workers. This is an easy way to read and write data without the overhead of a database.

### Creating a Key-Value Namespace

To create a new key-value namespace, run the following command:

```shell
wrangler kv:namespace create <YOUR_NAMESPACE>
```

After running this, you'll want to bind your namespace to your worker. This is done in the `wrangler.toml` file.

```toml
kv-namespaces = [
  { binding = "<YOUR_NAMESPACE>", id = "<YOUR_NAMESPACE_ID>" }
]
```

You'll also most likely want to create a preview namespace for local development. Simply add the `-preview` flag to the `create` command:

```shell
wrangler kv:namespace create <YOUR_NAMESPACE> --preview
```

Then add the preview namespace to your `wrangler.toml` file:

```toml
kv-namespaces = [
  { binding = "<YOUR_NAMESPACE>", id = "<YOUR_NAMESPACE_ID>", preview_id = "<YOUR_NAMESPACE_ID_PREVIEW>" }
]
```

### Reading and Writing to KV

With Wrangler:
_To use the preview environment, add `--preview` to the command._

```shell
# Read from KV
wrangler kv:key get --binding=YOUR_NAMESPACE "some-key"

# Write to KV
wrangler kv:key put --binding=MY_KV "some-key" "some-value"
```

In your worker code:
_Your worker will automatically use the preview environment when running locally, but you can use the normal environment by addding the `--remote` flag when running `wrangler dev`.

```javascript
// Read from KV
const value = await env.MY_NAMESPACE.get('some-key');

// Write to KV
await env.MY_NAMESPACE.put('some-key', 'some-value');
```

### Workers AI

Workers AI easily lets you use a [variety of AI models](https://developers.cloudflare.com/workers-ai/models/) in your code.

### Adding Workers AI to Your Worker

Simply add the following to your `wrangler.toml` file:

```toml
[ai]
binding = "AI"
```

Then, in your worker code:

```javascript
const response = await env.AI.run('<some-model>', {
  prompt: 'Write a haiku about WordPress',
});
```

### Testing Workers

You can use the [Workers Vitest integration](https://developers.cloudflare.com/workers/testing/vitest-integration/get-started/) to easily add automated tests to your worker.

#### Getting Started

Add the dependices to your project:
_Note: as of writing this, you'll need to use version 1.3.0 of `vitest` to work with Workers. [Check if this has changed](https://developers.cloudflare.com/workers/testing/vitest-integration/get-started/write-your-first-test/#install-vitest-and-cloudflarevitest-pool-workers) if you want to use a newer version._

```shell
npm install vitest@1.3.0 --save-dev --save-exact
npm install @cloudflare/vitest-pool-workers --save-dev
```

Then create a `vitest.config.js` file in your project root:

```javascript
import { defineWorkersConfig } from '@cloudflare/vitest-pool-workers/config';

export default defineWorkersConfig({
  test: {
    poolOptions: {
      workers: {
        singleWorker: true,
        wrangler: { configPath: './wrangler.toml' },
      },
    },
  },
});
```

Finally, write your tests in a `test` directory in your project root:

```javascript
import { env, createExecutionContext, waitOnExecutionContext } from 'cloudflare:test';
import { describe, it, expect } from 'vitest';

import worker from '../src';

// Name your test suite.
describe('Hello World worker', () => {

  // Name your test.
  it('responds with Hello World!', async () => {

    // Scaffold a request and context. The URL is arbitrary.
    const request = new Request('http://example.com');
    const ctx = createExecutionContext();
    const response = await worker.fetch(request, env, ctx);
    await waitOnExecutionContext(ctx);

    // Write your test.
    expect(await response.text()).toBe('Hello World!');
  });
});
```

#### Tests with Workers KV

```javascript
import { SELF } from 'cloudflare:test';
import { expect, it } from 'vitest';

import '../src/';

it('stores in KV namespace', async () => {
  let response = await SELF.fetch('https://example.com/kv/key', {
    method: 'PUT',
    body: 'value',
  });
  expect(response.status).toBe(204);

  response = await SELF.fetch("https://example.com/kv/key");
  expect(response.status).toBe(200);
  expect(await response.text()).toBe("value");
});

it("uses isolated storage for each test", async () => {
  // Check write in previous test undone
  const response = await SELF.fetch("https://example.com/kv/key");
  expect(response.status).toBe(204);
});
```

#### Testing with multiple Workers

[Testing with multiple workers](https://github.com/cloudflare/workers-sdk/tree/f520a71201c85a2ef3c071eff017816611b37c55/fixtures/vitest-pool-workers-examples/multiple-workers) is a bit more complex, as you can only read the `wrangler.toml` file for one worker at a time. You'll need to scaffold out the options for each worker in your `vitest.config.js` file:

```javascript
export default defineWorkersProject({
  test: {
    poolOptions: {
      workers: {
        singleWorker: true,
        wrangler: { configPath: './wrangler.toml' },
        miniflare: {
          workers: [
            // Scaffold additional workers.
            {
              name: '<your-worker-name>',
              modules: true,
             // This is the path to where you're mocking out the worker or you can have this configured via an environment variable and build script.
              scriptPath: './<your-worker-name>/index.js',
              compatibilityDate: "2024-01-01",
              compatibilityFlags: ["nodejs_compat"],
            },
          ],
        },
      },
    },
  },
});
