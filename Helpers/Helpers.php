<?php

    // Retorna url del proyecto
    function base_url()
    {
        return BASE_URL;
    }

    // Muestra información formateada
    function dep($data)
    {
        $format = print_r('<pre>');
        $format .= print_r($data);
        $format .= print_r('</pre>');
        return $format;
    }

    function getModal(string $nameModal, $data)
    {
        $viewModal= "Views/modals/{$nameModal}.php";
        require_once $viewModal;
    }

    function media() {
        return BASE_URL."Assets";
    }

    function headerAdmin($data="") {
        $view_header = "Views/template/header_admin.php";
        require_once ($view_header);
    }

    function footerAdmin($data="") {
        $view_footer = "Views/template/footer_admin.php";
        require_once ($view_footer);
    }

    function token()
    {
        $section1 = bin2hex(random_bytes(10));
        $section2 = bin2hex(random_bytes(10));
        $section3 = bin2hex(random_bytes(10));
        $section4 = bin2hex(random_bytes(10));

        return $section1.'-'.$section2.'-'.$section3.'-'.$section4;
    }

?>