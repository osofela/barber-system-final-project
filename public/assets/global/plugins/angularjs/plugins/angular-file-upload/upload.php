<?php
//exit; // upload demo is disabled


echo $_FILES[ 'file' ][ 'name' ];

if ( !empty( $_FILES ) ) {
    $tempPath = $_FILES[ 'file' ][ 'tmp_name' ];
    $uploadPath = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $_FILES[ 'file' ][ 'name' ];

    $moveFile = move_uploaded_file( $tempPath, $uploadPath );

	if($moveFile){
	echo "moved file";
	}
	
	else{
	echo "unable to move file";
	}
    $answer = array( 'answer' => 'File transfer completed' );
    $json = json_encode( $answer );

    echo $json;

} else {
    echo 'No files';
}
?>