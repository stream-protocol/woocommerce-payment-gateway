## WooCommerce Payment Gateway Coding Guidelines

The purpose would be that anyone who wants to could develop a WooCommerce Gateway plugin for StreamPay.
The goal of these guidelines is to improve developer productivity by allowing
developers code should be updated as soon as possible to reflect the new
conventions to jump into any file in the "WooCommerce payment gateway" codebase and not need to adapt to
inconsistencies in how the code is written.


## Pull Requests

When you notice those dependencies, put the fix into a commit of its own, then checkout a new
branch.

Once the commit is merged, rebase the original branch to purge the
cherry-picked commit:

```bash
$ git pull --rebase upstream master

### The PR Problem Statement

The git repo implements a product with various features. The problem statement
should describe how the product is missing a feature, how a feature is
incomplete, or how the implementation of a feature is somehow undesirable. If
an issue being fixed already describes the problem, go ahead and copy-paste it.
As mentioned above, reviewer time is scarce. Given a queue of PRs to review,
the reviewer may ignore PRs that expect them to click through links to see if
the PR warrants attention.

### The Proposed Changes

Typically the content under the "Proposed changes" section will be a bulleted
list of steps taken to solve the problem. Oftentimes, the list is identical to
the subject lines of the git commits contained in the PR. It's especially
generous (and not expected) to rebase or reword commits such that each change
matches the logical flow in your PR description.
