<?

	$function = array_key_exists( 'fcn', $_POST ) ? $_POST['fcn'] : null;
	$function = trim( $function );
	$function = strtolower( $function );
	$function = str_replace( ' ', '_', $function );
	if ( strlen($function) == 0 )
		die( 'You must enter in a PHP function above.' );

	if ( ! preg_match('#^[a-z0-9_]+$#',$function) )
		die( 'You must enter in a valid PHP function above.' );

	$key = sprintf( 'phpjsclosure-%s', $function );
	$compiled = apc_fetch( $key );
	if ( $compiled ) {
		echo $compiled;
		exit;
	}

	$url = sprintf( 'http://phpjs.org/functions/%s', $function );
	$page = file_get_contents( $url );

	if ( preg_match('#Here is a list of functions#i',$page) )
		die( 'Unable to find that PHP function on phpjs.org.  Try again' );

	$regex = '#<a href="([^"]+)">raw js source</a>#i';
	if ( ! preg_match($regex,$page,$match) )
		die( 'Unable to parse PHP JS page' );

	$js = file_get_contents( $match[1] );

	$fields = array();
	$fields['output_info']= 'compiled_code';
	$fields['output_format'] = 'text';
	$fields['compilation_level'] = 'SIMPLE_OPTIMIZATIONS';
	$fields['code_url'] = $match[1];

	$post = '';
	foreach ( $fields as $k => $v )
		$post .= sprintf( '%s=%s&', $k, $v );
	$post = substr( $post, 0, strlen($post)-1 ); 

	$closure = 'http://closure-compiler.appspot.com/compile';
	$ch = curl_init( $closure );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt( $ch, CURLOPT_POST, 1 );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $post );
	$compiled = curl_exec($ch);

	apc_store( $key, $compiled, 2592000 );

	echo $compiled;

?>
