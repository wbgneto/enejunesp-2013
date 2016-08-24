<?php 
class Userticket extends AppModel {
	public $useTable = 'usertickets';
	public $primaryKey = 'userticket_id';
	public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey'   => 'user_id'
        ));

    public $actsAs = array(
        'Upload.Upload' => array(
            'photo' => array(
                'fields' => array(
                    'dir' => 'photo_dir'
                ),
                'thumbnailSizes' => array(
                    'thumb' => '80x80'
                )
            )
        )
    );

 public $validate = array(
    'photo' => array(
        'rule' => 'isCompletedUpload',
        'message' => 'File was not successfully uploaded'
    ),
    'photo' => array(
        'rule' => 'isFileUpload',
        'message' => 'File was missing from submission'
    ),
    'photo' => array(
        'rule' => array('isBelowMaxSize', 1024),
        'message' => 'File is larger than the maximum filesize'
    ),
    'photo' => array(
        'rule' => array('isValidExtension', array('pdf', 'png', 'jpg', 'txt')),
        'message' => 'File does not have a pdf, png, or txt extension'
    )
);
}
 ?>