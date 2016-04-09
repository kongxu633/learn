<?php
/* 调试输出数组 */
function p($array){
    dump($array,1,'<pre>',0);
}

/* 从路径中获取图片名 */
function parse_pic($path,$part='0',$needle='/')
{
    $pos = strrpos($path, $needle);
    if($pos === false) {
        return $path;
    }
    // part 默认为0 获取半部分
    // 其他情况都返回后半部分 例: 1 , 后面 , 图片名
    if($part){
        return substr($path, $pos + 1);
    } else {
        return substr($path, 0 , $pos + 1);
    }
}

/* 前端时间格式化 */
function timer($t){
    $now=time();
    $dif=$now-$t;
    if($dif<0 || $dif>=604800)
    {
        $time= date('Y-m-d H:i:s',$t);
        return $time;

    }
    if($dif<60)
    {
        $time=$dif;
        return $time."秒前";
    }
    if($dif>=60 && $dif<3600)
    {
        $time= floor($dif/60);
        return $time."分钟前";
    }
    if($dif>=3600 && $dif<86400)
    {
        $time= floor($dif/3600);
        return $time."小时前";
    }
    if($dif>=86400 && $dif<604800)
    {
        $time= floor($dif/86400);
        return $time."天前";
    }
}

/**
 * THINKPHP 3.1.3 版本提取
 * 快速文件数据读取和保存 针对简单类型数据 字符串、数组
 * @param string $name 缓存名称
 * @param mixed $value 缓存值
 * @param string $path 缓存路径
 * @return mixed
 */
function F313($name, $value='', $path=DATA_PATH) {
    static $_cache  = array();
    $filename       = $path . $name . '.php';
    if ('' !== $value) {
        if (is_null($value)) {
            // 删除缓存
            return false !== strpos($name,'*')?array_map("unlink", glob($filename)):unlink($filename);
        } else {
            // 缓存数据
            $dir            =   dirname($filename);
            // 目录不存在则创建
            if (!is_dir($dir))
                mkdir($dir,0755,true);
            $_cache[$name]  =   $value;
            return file_put_contents($filename, strip_whitespace("<?php\treturn " . var_export($value, true) . ";?>"));
        }
    }
    if (isset($_cache[$name]))
        return $_cache[$name];
    // 获取缓存数据
    if (is_file($filename)) {
        $value          =   include $filename;
        $_cache[$name]  =   $value;
    } else {
        $value          =   false;
    }
    return $value;
}