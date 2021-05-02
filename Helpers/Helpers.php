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

    function token()
    {
        $section1 = bin2hex(random_bytes(10));
        $section2 = bin2hex(random_bytes(10));
        $section3 = bin2hex(random_bytes(10));
        $section4 = bin2hex(random_bytes(10));

        return $section1.'-'.$section2.'-'.$section3.'-'.$section4;
    }

?>