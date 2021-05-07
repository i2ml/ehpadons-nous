<?php


/* Debug Helpers */
/* --------------------------------------------------------------------------------- */


/*
 * var_dump amélioré
 */

function var_debug($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}


/* Template Helpers */
/* --------------------------------------------------------------------------------- */

function icon($id, $class = '', $inline = false)
{
    if ($inline) {

    } else
        echo '<svg class="icon ' . $class . '"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-' . $id . '"></use></svg>';
}

// careful with security here
function get_view($name)
{
    include(TEMPLATEPATH . '/views/' . $name . '.php');
}

function modal($name)
{
    ?>
    <div class="dialog" data-dialogId="<?= $name ?>">
        <div class="dialog-mask"></div>
        <div class="dialog-container">
            <a href="#" class="dialog-close">
                <? icon('cross') ?>
            </a>
            <div class="dialog-body">
                <? get_view($name) ?>
            </div>
        </div>
    </div>
    <?
}


/*
 * truncate string
 */

function tokenTruncate($string, $your_desired_width, $end_string = '...')
{
    $string = strip_tags($string);
    $parts = preg_split('/([\s\n\r]+)/', $string, null, PREG_SPLIT_DELIM_CAPTURE);
    $parts_count = count($parts);

    $has_been_cut = false;
    $length = 0;
    $last_part = 0;
    for (; $last_part < $parts_count; ++$last_part) {
        $length += strlen($parts[$last_part]);
        if ($length > $your_desired_width) {
            $has_been_cut = true;
            break;
        }
    }

    // if cut add $end_string
    if ($has_been_cut) {
        return implode(array_slice($parts, 0, $last_part)) . $end_string;
    } else {
        return implode(array_slice($parts, 0, $last_part));
    }
}


/* AJAX Helpers */
/* --------------------------------------------------------------------------------- */

// global > return json response from array
function returnResponse($response_array, $code = 200)
{
    $response = json_encode($response_array, JSON_HEX_QUOT);
    http_response_code($code);
    header("HTTP/1.0 " . $code);
    header("Content-Type: application/json");
    echo $response;
    exit;
}
