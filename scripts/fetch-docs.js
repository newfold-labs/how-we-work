const { execSync } = require('child_process');
const path = require('path');
const fs = require('fs');

const REPO_URL = 'https://github.com/newfold-labs/how-we-work.git';
const TARGET_DIR = path.join(process.cwd(), '.docs', 'how-we-work');

function exec(command) {
    try {
        execSync(command, { stdio: 'inherit' });
        return true;
    } catch {
        return false;
    }
}

function cloneRepo() {
    const parentDir = path.dirname(TARGET_DIR);
    if (!fs.existsSync(parentDir)) {
        fs.mkdirSync(parentDir, { recursive: true });
    }

    console.log('Cloning how-we-work documentation...');

    if (!exec(`git clone --depth 1 ${REPO_URL} "${TARGET_DIR}"`)) {
        console.warn('Warning: Failed to clone how-we-work docs. Skipping.');
        return;
    }

    console.log('Documentation cloned to .docs/how-we-work');
}

function updateRepo() {
    console.log('Updating how-we-work documentation...');

    if (!exec(`git -C "${TARGET_DIR}" pull --ff-only`)) {
        console.warn('Warning: Failed to update how-we-work docs. Skipping.');
        return;
    }

    console.log('Documentation updated.');
}

const gitDir = path.join(TARGET_DIR, '.git');
if (fs.existsSync(gitDir) && fs.statSync(gitDir).isDirectory()) {
    updateRepo();
} else {
    cloneRepo();
}
