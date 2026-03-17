<?php

namespace NewfoldLabs\Scripts;

class FetchDocs
{
    private const REPO_URL = 'https://github.com/newfold-labs/how-we-work.git';
    private const TARGET_DIR = '.docs/how-we-work';

    public static function fetch(): void
    {
        $targetDir = getcwd() . '/' . self::TARGET_DIR;

        if (is_dir($targetDir . '/.git')) {
            self::update($targetDir);
        } else {
            self::clone($targetDir);
        }
    }

    private static function clone(string $targetDir): void
    {
        $parentDir = dirname($targetDir);
        if (!is_dir($parentDir)) {
            mkdir($parentDir, 0755, true);
        }

        echo "Cloning how-we-work documentation...\n";

        $result = self::exec(sprintf(
            'git clone --depth 1 %s %s',
            escapeshellarg(self::REPO_URL),
            escapeshellarg($targetDir)
        ));

        if ($result === false) {
            echo "Warning: Failed to clone how-we-work docs. Skipping.\n";
            return;
        }

        echo "Documentation cloned to " . self::TARGET_DIR . "\n";
    }

    private static function update(string $targetDir): void
    {
        echo "Updating how-we-work documentation...\n";

        $result = self::exec(sprintf(
            'git -C %s pull --ff-only',
            escapeshellarg($targetDir)
        ));

        if ($result === false) {
            echo "Warning: Failed to update how-we-work docs. Skipping.\n";
            return;
        }

        echo "Documentation updated.\n";
    }

    private static function exec(string $command): bool
    {
        $returnCode = 0;
        passthru($command . ' 2>&1', $returnCode);

        return $returnCode === 0;
    }
}
