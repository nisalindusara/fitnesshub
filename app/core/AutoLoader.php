<?php

class AutoLoader
{
    private static ?array $classMap = null;

    public static function register(array $directories): void
    {
        spl_autoload_register(
            function (string $class) use ($directories) {
                if (self::$classMap === null) {
                    self::$classMap = self::buildClassMap($directories);
                }

                if (isset(self::$classMap[$class])) {
                    require_once self::$classMap[$class];
                }
            }
        );
    }

    private static function buildClassMap(array $directories): array
    {
        $map = [];

        foreach ($directories as $directory) {
            $files = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($directory, FilesystemIterator::SKIP_DOTS)
            );

            foreach ($files as $file) {
                if ($file->getExtension() !== 'php') {
                    continue;
                }

                $class = $file->getBasename('.php');

                if (isset($map[$class])) {
                    throw new RuntimeException(
                        "Duplicate class name '{$class}': {$map[$class]} and {$file->getPathname()}"
                    );
                }
                $map[$class] = $file->getPathname();
            }
        }
        return $map;
    }
}
