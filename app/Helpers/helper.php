<?php

use App\Models\Setting;

function getConfigValueFormSettingTable($configKey){
    $settings = Setting::where('config_key',$configKey)->first();
    if(!empty($settings)){
        return $settings->config_value;
    }
    return null;
}


// load theo file , vào file composer.js tạo thêm chỗ autoload  
// "files": [
//     "app/Helpers/helper.php"
// ]
// vào chạy lại câu lệnh : composer dump-autoload