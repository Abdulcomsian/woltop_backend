<?php

use App\Models\VariationOption;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

if (!function_exists('theme')) {
    function theme()
    {
        return app(App\Core\Theme::class);
    }
}


if (!function_exists('getName')) {
    /**
     * Get product name
     *
     * @return void
     */
    function getName()
    {
        return config('settings.KT_THEME');
    }
}


if (!function_exists('addHtmlAttribute')) {
    /**
     * Add HTML attributes by scope
     *
     * @param $scope
     * @param $name
     * @param $value
     *
     * @return void
     */
    function addHtmlAttribute($scope, $name, $value)
    {
        theme()->addHtmlAttribute($scope, $name, $value);
    }
}


if (!function_exists('addHtmlAttributes')) {
    /**
     * Add multiple HTML attributes by scope
     *
     * @param $scope
     * @param $attributes
     *
     * @return void
     */
    function addHtmlAttributes($scope, $attributes)
    {
        theme()->addHtmlAttributes($scope, $attributes);
    }
}


if (!function_exists('addHtmlClass')) {
    /**
     * Add HTML class by scope
     *
     * @param $scope
     * @param $value
     *
     * @return void
     */
    function addHtmlClass($scope, $value)
    {
        theme()->addHtmlClass($scope, $value);
    }
}


if (!function_exists('printHtmlAttributes')) {
    /**
     * Print HTML attributes for the HTML template
     *
     * @param $scope
     *
     * @return string
     */
    function printHtmlAttributes($scope)
    {
        return theme()->printHtmlAttributes($scope);
    }
}


if (!function_exists('printHtmlClasses')) {
    /**
     * Print HTML classes for the HTML template
     *
     * @param $scope
     * @param $full
     *
     * @return string
     */
    function printHtmlClasses($scope, $full = true)
    {
        return theme()->printHtmlClasses($scope, $full);
    }
}


if (!function_exists('getSvgIcon')) {
    /**
     * Get SVG icon content
     *
     * @param $path
     * @param $classNames
     * @param $folder
     *
     * @return string
     */
    function getSvgIcon($path, $classNames = 'svg-icon', $folder = 'assets/media/icons/')
    {
        return theme()->getSvgIcon($path, $classNames, $folder);
    }
}


if (!function_exists('setModeSwitch')) {
    /**
     * Set dark mode enabled status
     *
     * @param $flag
     *
     * @return void
     */
    function setModeSwitch($flag)
    {
        theme()->setModeSwitch($flag);
    }
}


if (!function_exists('isModeSwitchEnabled')) {
    /**
     * Check dark mode status
     *
     * @return void
     */
    function isModeSwitchEnabled()
    {
        return theme()->isModeSwitchEnabled();
    }
}


if (!function_exists('setModeDefault')) {
    /**
     * Set the mode to dark or light
     *
     * @param $mode
     *
     * @return void
     */
    function setModeDefault($mode)
    {
        theme()->setModeDefault($mode);
    }
}


if (!function_exists('getModeDefault')) {
    /**
     * Get current mode
     *
     * @return void
     */
    function getModeDefault()
    {
        return theme()->getModeDefault();
    }
}


if (!function_exists('setDirection')) {
    /**
     * Set style direction
     *
     * @param $direction
     *
     * @return void
     */
    function setDirection($direction)
    {
        theme()->setDirection($direction);
    }
}


if (!function_exists('getDirection')) {
    /**
     * Get style direction
     *
     * @return void
     */
    function getDirection()
    {
        return theme()->getDirection();
    }
}


if (!function_exists('isRtlDirection')) {
    /**
     * Check if style direction is RTL
     *
     * @return void
     */
    function isRtlDirection()
    {
        return theme()->isRtlDirection();
    }
}


if (!function_exists('extendCssFilename')) {
    /**
     * Extend CSS file name with RTL or dark mode
     *
     * @param $path
     *
     * @return void
     */
    function extendCssFilename($path)
    {
        return theme()->extendCssFilename($path);
    }
}


if (!function_exists('includeFavicon')) {
    /**
     * Include favicon from settings
     *
     * @return string
     */
    function includeFavicon()
    {
        return theme()->includeFavicon();
    }
}


if (!function_exists('includeFonts')) {
    /**
     * Include the fonts from settings
     *
     * @return string
     */
    function includeFonts()
    {
        return theme()->includeFonts();
    }
}


if (!function_exists('getGlobalAssets')) {
    /**
     * Get the global assets
     *
     * @param $type
     *
     * @return array
     */
    function getGlobalAssets($type = 'js')
    {
        return theme()->getGlobalAssets($type);
    }
}


if (!function_exists('addVendors')) {
    /**
     * Add multiple vendors to the page by name. Refer to settings KT_THEME_VENDORS
     *
     * @param $vendors
     *
     * @return void
     */
    function addVendors($vendors)
    {
        theme()->addVendors($vendors);
    }
}


if (!function_exists('addVendor')) {
    /**
     * Add single vendor to the page by name. Refer to settings KT_THEME_VENDORS
     *
     * @param $vendor
     *
     * @return void
     */
    function addVendor($vendor)
    {
        theme()->addVendor($vendor);
    }
}


if (!function_exists('addJavascriptFile')) {
    /**
     * Add custom javascript file to the page
     *
     * @param $file
     *
     * @return void
     */
    function addJavascriptFile($file)
    {
        theme()->addJavascriptFile($file);
    }
}


if (!function_exists('addCssFile')) {
    /**
     * Add custom CSS file to the page
     *
     * @param $file
     *
     * @return void
     */
    function addCssFile($file)
    {
        theme()->addCssFile($file);
    }
}


if (!function_exists('getVendors')) {
    /**
     * Get vendor files from settings. Refer to settings KT_THEME_VENDORS
     *
     * @param $type
     *
     * @return array
     */
    function getVendors($type)
    {
        return theme()->getVendors($type);
    }
}


if (!function_exists('getCustomJs')) {
    /**
     * Get custom js files from the settings
     *
     * @return array
     */
    function getCustomJs()
    {
        return theme()->getCustomJs();
    }
}


if (!function_exists('getCustomCss')) {
    /**
     * Get custom css files from the settings
     *
     * @return array
     */
    function getCustomCss()
    {
        return theme()->getCustomCss();
    }
}


if (!function_exists('getHtmlAttribute')) {
    /**
     * Get HTML attribute based on the scope
     *
     * @param $scope
     * @param $attribute
     *
     * @return array
     */
    function getHtmlAttribute($scope, $attribute)
    {
        return theme()->getHtmlAttribute($scope, $attribute);
    }
}


if (!function_exists('isUrl')) {
    /**
     * Get HTML attribute based on the scope
     *
     * @param $url
     *
     * @return mixed
     */
    function isUrl($url)
    {
        return filter_var($url, FILTER_VALIDATE_URL);
    }
}


if (!function_exists('image')) {
    /**
     * Get image url by path
     *
     * @param $path
     *
     * @return string
     */
    function image($path)
    {
        return asset('assets/media/'.$path);
    }
}


if (!function_exists('getIcon')) {
    /**
     * Get icon
     *
     * @param $path
     *
     * @return string
     */
    function getIcon($name, $class = '', $type = '', $tag = 'span')
    {
        return theme()->getIcon($name, $class, $type, $tag);
    }
}

if (!function_exists('calculateDiscount')) {
    /**
     * Get icon
     *
     * @param $path
     *
     * @return string
     */
    function calculateDiscount($price, $sale_price)
    {
        if ($price == 0) return 0;
        $result = (($price - $sale_price) / $price) * 100;
        return (int) $result;
    }
}

if (!function_exists('generateUniqueSlug')) {
    /**
     * Get icon
     *
     * @param $path
     *
     * @return string
     */
    function generateUniqueSlug($title, $model, $column)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (DB::table((new $model)->getTable())->where($column, $slug)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        return $slug;
    }
}

if (!function_exists('generateUniqueSku')) {
    /**
     * Get icon
     *
     * @param $path
     *
     * @return string
     */
    function generateUniqueSku($sku, $model, $column)
    {
        $originalSku = $sku;
        $count = 1;

        while (DB::table((new $model)->getTable())->where($column, $sku)->exists()) {
            $sku = "{$originalSku}{$count}";
            $count++;
        }

        return $sku;
    }
}


if (!function_exists('calculateRange')) {
    /**
     * Get icon
     *
     * @param $path
     *
     * @return string
     */
    function calculateRange($variables)
    {
        if ($variables->isNotEmpty()) {
            return [
                'price' => $variables->min('price') . '-' . $variables->max('price'),
                'sale_price' => $variables->min('sale_price') . '-' . $variables->max('sale_price'),
                'discount' => $variables->min('discount') . '-' . $variables->max('discount'),
            ];
        }
    }
}

if (!function_exists('formatString')) {
    /**
     * Get icon
     *
     * @param $path
     *
     * @return string
     */
    function formatString($input) {
        $position = strrpos($input, "/");
        if ($position !== false) {
            return substr_replace($input, "-", $position, 1);
        }
        return $input;
    }
}

if (!function_exists('generateOrderId')) {
    /**
     * Get icon
     *
     * @param $path
     *
     * @return string
     */
    function generateOrderId($model) {
        do {
            $id = '404-' . substr(time(), -7) . '-' . str_pad(mt_rand(0, 9999999), 7, '0', STR_PAD_LEFT);
            $exists = $model::where('order_id', $id)->exists();
        } while ($exists);
        
        return $id;
    }
}

if (!function_exists('variablePrice')) {
    /**
     * Get icon
     *
     * @param $path
     *
     * @return string
     */
    function variablePrice($variableId) {
       $data  = VariationOption::where('id', $variableId)->first();
       return $data->price;
    }
}

if (!function_exists('variableSalePrice')) {
    /**
     * Get icon
     *
     * @param $path
     *
     * @return string
     */
    function variableSalePrice($variableId) {
       $data  = VariationOption::where('id', $variableId)->first();
       return $data->sale_price;
    }
}

if (!function_exists('generateUniqueFileName')) {
    /**
     * Get icon
     *
     * @param $path
     *
     * @return string
     */
    function generateUniqueFileName($model, $column, $filename) {
        $count = 1;
        $finalFileName = $filename;
        
        // Extract file name and extension
        $explodedFileName = explode(".", $filename);
        $baseName = $explodedFileName[0];
        $extension = isset($explodedFileName[1]) ? "." . $explodedFileName[1] : "";
        
        // Check if filename already exists
        while ($model::where($column, $finalFileName)->exists()) {
            $finalFileName = $baseName . "-" . $count . $extension;
            $count++;
        }
    
        return $finalFileName;
    }    
}

if (!function_exists('getFileName')) {
    /**
     * Get icon
     *
     * @param $path
     *
     * @return string
     */
    function getFileName($filename) {
        $fileName = $filename->getClientOriginalName();
        return str_replace([" ", "_"], "-", $fileName);
    }
}

if (!function_exists('addWebP')) {
    /**
     * Get icon
     *
     * @param $path
     *
     * @return string
     */
    function addWebP($filename) {
        $exploded = explode(".", $filename);
        return $exploded[0] . "." . "avif";
    }
}


if (!function_exists('updateProductUnit')) {
    /**
     * Get icon
     *
     * @param $path
     *
     * @return string
     */
    function updateProductUnit($product_id, $model, $quantity) {
        $data = $model::where('id', $product_id)->first();
        $units = $data->units;
        if($data->units >= $quantity){
            $data->units = $units - $quantity;
            return $data->update();
        }else{
            throw new \Exception('Insufficient stock available of this product.');
        }
    }
}


