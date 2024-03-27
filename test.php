<?php

// Check if the content and size query string parameters are set
if (isset($_GET['content']) && isset($_GET['size'])) {
    // Set the content and size based on the query string parameters
    $content = $_GET['content'];
    $size = intval($_GET['size']);
} else {
    // Set default values for the content and size
    $content = 'https://www.example.com';
    $size = 300;
}

// Set the default error correction level
$errorCorrectionLevel = 'L';

// Check if the errorCorrectionLevel query string parameter is set
if (isset($_GET['errorCorrectionLevel'])) {
    // Set the error correction level based on the query string parameter
    $errorCorrectionLevel = $_GET['errorCorrectionLevel'];
}

// Check if the size is within the allowed range
if ($size < 100 || $size > 1000) {
    // Set the size to the default value if it is outside the allowed range
    $size = 300;
}

// Generate the QR code image data
$qrCodeData = generateQRCode($content, $size, $errorCorrectionLevel);

// Create an image from the QR code data
$qrCodeImage = imagecreatefromstring($qrCodeData);

// Set the content type header to output the image as a PNG
header('Content-Type: image/png');

// Output the QR code image data as a PNG image
imagepng($qrCodeImage);

// Free up memory
imagedestroy($qrCodeImage);

/**
 * Generates a QR code image data.
 *
 * @param string $content      The content to encode into the QR code.
 * @param int    $size         The size of the QR code (in pixels).
 * @param string $errorCorrectionLevel The error correction level (L, M, Q, or H).
 *
 * @return string The QR code image data in PNG format.
 */
function generateQRCode($content, $size, $errorCorrectionLevel)
{
    // Create a QR code object
    $qrCode = new QRcode();

    // Set the error correction level
    $qrCode->setErrorCorrectionLevel($errorCorrectionLevel);

    // Set the content to encode
    $qrCode->setText($content);

    // Set the size of the QR code (in pixels)
    $qrCode->setSize($size);

    // Generate the QR code image data
    return $qrCode->get();
}

