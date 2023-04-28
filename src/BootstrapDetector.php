<?php

namespace gertexllc\yii2bootstrapdetector;

use Yii;
use yii\base\Component;

class BootstrapDetector extends Component
{
    /**
     * Detect the used Bootstrap major version number and return it.
     * Return null if none is detected.
     *
     * @return string|null The detected Bootstrap major version number or null
     */
    public function detectMajorVersion()
    {
        $versionNumber = $this->detectVersionNumber();
        return $versionNumber ? strtok($versionNumber, '.') : null;
    }

    /**
     * Detect the used Bootstrap version number and return it.
     * Return null if none is detected.
     *
     * @return string|null The detected Bootstrap version number or null
     */
    public function detectVersionNumber()
    {
        $assetManager = Yii::$app->assetManager;

        // Check if the Bootstrap 5 asset bundle is registered
        if ($assetManager->getBundle('yii\\bootstrap5\\BootstrapAsset')) {
            return $this->getVersionNumber('yii\\bootstrap5\\BootstrapAsset');
        }

        // Check if the Bootstrap 4 asset bundle is registered
        if ($assetManager->getBundle('yii\\bootstrap4\\BootstrapAsset')) {
            return $this->getVersionNumber('yii\\bootstrap4\\BootstrapAsset');
        }

        // Check if the Bootstrap 3 asset bundle is registered
        if ($assetManager->getBundle('yii\\bootstrap\\BootstrapAsset')) {
            return $this->getVersionNumber('yii\\bootstrap\\BootstrapAsset');
        }

        // If no version is detected, return null
        return null;
    }

    /**
     * Extract the version number and minor version number from the asset bundle class name.
     *
     * @param string $bundleClassName The class name of the asset bundle
     * @return string|null The version number and minor version number or null
     */
    private function getVersionNumber($bundleClassName)
    {
        $version = null;

        // Extract the major and minor version numbers from the class name
        if (preg_match('/\\\\(\d+\\.\\d+)/', $bundleClassName, $matches)) {
            $version = $matches[1];
        }

        return $version;
    }
}
