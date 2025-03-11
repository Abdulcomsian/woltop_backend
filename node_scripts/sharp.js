const sharp = require('sharp');
const fs = require('fs');

// Get command line arguments
const inputPath = process.argv[2];  // Image to optimize
const outputPath = process.argv[3]; // Output optimized image
const width = parseInt(process.argv[4]) || null; // Resize width
const height = parseInt(process.argv[5]) || null; // Resize height

// Process Image
sharp(inputPath)
  .resize(width, height) // Resize if dimensions are provided
  .toFormat('webp') // Convert to WebP for better optimization
  .toFile(outputPath)
  .then(() => {
    console.log('Image optimized successfully');
    process.exit(0);
  })
  .catch(err => {
    console.error('Error optimizing image:', err);
    process.exit(1);
  });
