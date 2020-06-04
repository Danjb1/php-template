<?php
namespace myWebsite;

    /*
     * Our .htaccess file redirects all pages here.
     * We then use our FrontController to determine which page was actually
     * requested, and include the revelant files.
     */
    
    # Include required files
    require_once $_SERVER['DOCUMENT_ROOT'] . '/include/variables.php';
    require_once INCLUDE_DIR . 'controller.php';
    
    // Construct page
    $front_controller = new FrontController();
    $page = $front_controller->getPageFilename($_SERVER['REQUEST_URI']);
    $front_controller->render($page);
?>
