function BindUploadifive(obj, setting, complete_callback) {
    $(obj).uploadifive({
        'auto'             : true,
        'fileObjName': "myfile",
        'buttonText' : setting.buttonText ? setting.buttonText : '上传文件',
        'fileType': setting.fileType ? setting.fileType : 'video/*,image/*',
        'queueID'          : setting.queueID ? setting.queueID : 'queue',
        'uploadScript'     : '/index/upload/uploadify',
        'onUploadComplete' : function(file, data) {
            if(typeof complete_callback == 'function'){
                complete_callback(file, data);
            }
        }
    });
}