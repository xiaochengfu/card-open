<?php
class HttpRequest{

    /**
     * @description: 以GET访问模拟访问
     * @author: injurys
     * @param string $url      请求地址
     * @param array $query     GET数据
     * @param array $headers   请求头
     * @return mixed
     */
    public static function get($url, $query = [], $headers = [])
    {
        $options['query'] = $query;
        return self::request('get', $url, $options, $headers);
    }

    /**
     * @description: CURL模拟网络请求
     * @author: injurys
     * @param string $method  请求方式
     * @param string $url     请求地址
     * @param array $options  请求参数
     * @param array $headers  请求头
     * @return mixed
     */
    public static function request($method, $url, $options = [], $headers=[])
    {
        $curl = curl_init();
        // GET参数设置
        if (!empty($options['query'])) {
            $url .= (stripos($url, '?') !== false ? '&' : '?') . http_build_query($options['query']);
        }
        // CURL头信息设置
        if (!empty($headers)) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        }
        // POST数据设置
        if (strtolower($method) === 'post') {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $options['data']);
        }
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_TIMEOUT, 60);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        list($content) = [curl_exec($curl), curl_close($curl)];
        return $content;
    }
}
