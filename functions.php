<?

#return a font awesome icon
function i($code){
    $icon = '<i class="fa fa-'.$code.'"></i>';
    return $icon;
}

#return readable date from Unix time stamp
function dateReadable($date){
    return date('M j Y h:i A', $date);
}

function timeNice($seconds){
    $h = floor($seconds/60/60);
    $m = round(($seconds/60) - ($h*60));
    return $h.'hrs : '.$m.' mins';
}

function save($data){
    $json = json_encode($data);
    $file = fopen("data.json", "w");
    fwrite($file, $json);
}

function debug_to_console( $data ) {
    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
}

?>