# Setting Up Your MacOS Development Machine

We work with in numerous development contexts: WordPress, WP-CLI, Laravel, Gatsby, Serverless Functions and more.

As a result, as we switch gears our machines need to be able to switch between these contexts with us. You might not need everything here for every project, however, this is how our team generally configures our machines.

## WARNING: Intended for fresh machines

This guide is meant for starting from a stock machine image -- not an existing development machine.

If you already have a machine configured with some of these tools, be mindful about installing differently here! Pick and choose as-needed.

## System Packages

### 1. Install the latest version of [`brew`](https://brew.sh/)

Homebrew is our package manager of choice on MacOS.

```bash
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
```

### 2. Use [`brew`](https://brew.sh/) to install [`nvm`](https://github.com/nvm-sh/nvm) for managing multiple versions of node

In general, we aim to use the latest node when working with Modern JavaScript and Node 14.x LTS while working in WordPress.

```bash
brew install nvm
```

### 3. Use [`nvm`](https://github.com/nvm-sh/nvm) to install the latest version and Node 14.x

This should default to Node 14. `nvm use node` to switch to latest, `nvm use 14` to switch back.

```bash
nvm install node \
nvm install 14
```

### 4. Continue using `brew` to install system packages

```bash
brew install yarn git composer gh cask curl imapsync lsd subversion wget
```

### 5. Use `npm` to install `--global` packages
```bash
npm install --global gatsby-cli wrangler-cli lando
```

### 6. OPTIONAL: Use Cask to download some open-source GUIs

If your laptop came with stock or IT-managed browser, it works best to remove and reinstall to keep all updates together.

```bash
brew install --cask \
appcleaner \
cloudflare-warp \
firefox \
imageoptim \
local \
microsoft-edge \
microsoft-teams \
paparazzi \
postman \
sequel-ace \
slack \
sourcetree \
spectacle \
visual-studio-code \
vlc \
zoom
```

### 7. OPTIONAL: Use a shell manager like `oh-my-zsh`

Bring-your-own shell manager or setup something like `oh-my-zsh` for a better-than-stock Shell experience.

#### Install `oh-my-zsh`

```bash
sh -c "$(curl -fsSL https://raw.github.com/ohmyzsh/ohmyzsh/master/tools/install.sh)"
```

##### `oh-my-zsh` plugins we recommend

```bash
plugins=(git yarn laravel gatsby wp-cli)
```

#### Bonus: [Install powerlevel10k](https://github.com/romkatv/powerlevel10k#oh-my-zsh) for nicely-formatted prompts

`powerlevel10k` provides an intuitive configuration wizard for customizing your shell prompt look and function.

```bash
git clone --depth=1 https://github.com/romkatv/powerlevel10k.git ${ZSH_CUSTOM:-$HOME/.oh-my-zsh/custom}/themes/powerlevel10k
```

### 8. OPTIONAL: Repo Organization

There are lots of ways to organize files. This is one recommended way that addresses some common needs and problems.

#### 1. Create a `~/projects` directory.

Clone major projects into Projects:
```bash
gh repo clone bluehost/bluehost-wordpress-plugin
gh repo clone bluehost/endurance-wp-module-data
...
```

2. Create a `~/env` directory.

Create

3. Clone repositories into `~/projects` and as you create environments, symlink into the environment. 

```bash
ln -s ~/projects/bluehost-wordpress-plugin ~/env/newfold/wp-content/plugins/bluehost-wordpress-plugin
```

### 9. OPTIONAL: Setup Aliases and Functions

While entirely optional, these are some aliases and functions our team likes to make work easier.

```bash
# SETUP PREFERRED EDITOR (substitute with yours)
if [[ -n $SSH_CONNECTION ]]; then
  export EDITOR='nano'
else
  export EDITOR='nano'
fi

alias p="cd ~/products"
alias e="cd ~/env"

alias bwp="cd ~/products/bluehost-wordpress-plugin"

# GENERIC WORDPRESS NAVIGATION
alias wpc="cd wp-content"
alias wpt="cd wp-content/themes"
alias wpp="cd wp-content/plugins"

alias cwd="open ." # OPEN IN FINDER
alias vsc="code ." # OPEN IN VISUAL STUDIO CODE
alias del "rm -rf" # RIMRAF DELETE

alias yw="yarn workspace"

# SWAP SYSTEM LS WITH LSD
alias ls="lsd"
alias l="ls -al"
alias ll="la"
alias lsize="ls --sizesort -al"
alias lmod="ls --timesort -al"


# "ltools" makes a particular session "Lando-ready" with most common aliases piping commands through to Lando containers.

# SWAP PS1 WITH WHATEVER PROMPT PARAMETER YOU'RE USING
# PowerLevel10k: https://github.com/romkatv/powerlevel10k#how-do-i-add-username-andor-hostname-to-prompt
function ltools {
	alias composer="lando composer"
	alias grunt="lando grunt"
	alias gulp="lando gulp"
	alias npx="lando npx"
	alias phpunit="lando phpunit"
	alias wp="lando wp"
	alias yarn="lando yarn"
	# Add any other aliases you want based on your environment...

	# Modify this as required for your prompt.
	if ! grep -qi lando <<< $PS1; then
		PS1="[Lando] $PS1"
	fi
}
```

### 10. Some miscellaneous tasks
- [ ] Authenticate `gh` with GitHub User 
- [ ] Setup your `git` global config.
- [ ] Generate/import SSH keys
- [ ] Connect to Unified Authentication Platform

