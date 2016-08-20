<?php

/**
 * ��ȡ΢�Ų�������
 * @staticvar array $wechat
 * @param type $type    �ӿ�����
 * @param type $config  SDK����(token,appid,appsecret,encodingaeskey,mch_id,partnerkey,ssl_cer,ssl_key,qrc_img)
 * @return WechatBasic
 */
function &load_wechat($type = '', $config = array()) {
    static $wechat = array();
    if (!isset($wechat[$type])) {
        $className = "\\Wechat\\Wechat" . ucfirst(strtolower($type));
        $wechat[$type] = new $className($config);
    }
    return $wechat[$type];
}

/**
 * ע���Զ����غ���
 */
spl_autoload_register(function($class) {
    if (stripos($class, 'Wechat\\') === 0) {
        require __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    }
});
