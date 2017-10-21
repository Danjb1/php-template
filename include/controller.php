<?php
namespace myWebsite;

/**
 * Class responsible for retrieving and rendering a page based on the requested
 * URL.
 */
class FrontController {
    
    /**
     * Gets the filename of the page requested in the given URL.
     */
    public function getPageFilename($requestUri) {
        
        # Special case for the homepage
        if ($requestUri == '/'){
            return PAGE_DIR . PAGE_HOME;
        }
        
        # Protect against directory traversal attacks
        if (strpos($requestUri, '..') !== false) {
            return PAGE_DIR . PAGE_ERROR;
        }
        
        # Look up the requested page
        $filename = PAGE_DIR . substr($requestUri, 1);
        if (is_file($filename)) {
            return $filename;
        }
        
        # Try again, this time adding a ".php" extension
        $filename = $filename . '.php';
        if (is_file($filename)) {
            return $filename;
        }
        
        return PAGE_DIR . PAGE_ERROR;
    }
    
    /**
     * Renders the page with the given filename.
     */
    public function render($page) {
        $pageContents = file_get_contents($page);
        if ($this->shouldUseTemplate($pageContents)) {
            require(INCLUDE_DIR . 'page_template.php');
        } else {
            require($page);
        }
    }
    
    /**
     * Determines if the given page should use the standard template.
     */
    public function shouldUseTemplate($pageContents) {
        return substr($pageContents, 0, 15) != '<!DOCTYPE html>';
    }
    
}
?>
