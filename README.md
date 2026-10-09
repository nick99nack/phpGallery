# phpGallery
Basic HTML4 photo gallery written in PHP.

# How to use

## Dependencies

- Web server

- PHP 8.0 (can be modified to work with earlier versions)

- GD library

## Installation

1. Ensure all dependencies are installed and active.

2. Put `index.php` and `thumbs.php` into a web directory with pictures.

3. Ensure the web server service user has write permission to the directory.

4. Navigate to index.php in a web browser to trigger thumbnail generation.

## Customization

The following parameters in `thumbs.php` are customizable:

```
$thumbDir   = 'thumbs';
$thumbWidth = 320;
$columns    = 3;
```

`$thumbDir` is the subdirectory in which to place the thumbnails.

`$thumbWidth` is the width of the thumbnails, in px.

`$columns` is the number of columns the resulting table of thumbnails will have.
