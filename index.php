<?php
namespace myWebsite;

    /*
     * Our .htaccess file redirects all pages here.
     * We then use our FrontController to determine which page was actually
     * requested, and include the revelant files.
     */
    
    # Include required files
    require_once($_SERVER['DOCUMENT_ROOT'] . '/include/variables.php');
    require_once(INCLUDE_DIR . 'controller.php');
    
    // Construct page
    $controller = new FrontController();
    $page = $controller->getPageFilename($_SERVER['REQUEST_URI']);
    $controller->render($page);
?>
