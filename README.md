# Yii2 Bootstrap Detector

A Yii2 component to detect the used Bootstrap version and return it.

## Installation

You can install this component via Composer by running the following command:

```bash
composer require gertexllc/yii2-bootstrap-detector
```

## Usage

To use the Bootstrap detector, simply create a new instance of the `BootstrapDetector` class and call the `detectVersionNumber()` or `detectMajorVersion()` methods:

```php
use gertexllc\yii2bootstrapdetector\BootstrapDetector;

// Detect the full version number
$detector = new BootstrapDetector();
$version = $detector->detectVersionNumber(); // e.g. "4.6.0"

// Detect the major version number only
$detector = new BootstrapDetector();
$majorVersion = $detector->detectMajorVersion(); // e.g. "4"
```

The `detectVersionNumber()` method returns the full version number of the detected Bootstrap version, or `null` if no version is detected. The `detectMajorVersion()` method returns only the major version number of the detected Bootstrap version, or `null` if no version is detected.

## Requirements

This component requires Yii2 and the Bootstrap asset bundles used by your Yii2 application.

## License

This component is released under the MIT License. See the [LICENSE](LICENSE) file for details.

## Author

The `VinDecoder` was developed and brought to you free of charge by GerTex, LLC