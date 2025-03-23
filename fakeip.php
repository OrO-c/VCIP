<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

// 完整数据模板（每个模板包含全部字段）
$dataTemplates = [
    'test' => [
        "ip"            => "111.111.111.111",
        "continent"    => "亚洲",
        "country"       => "中国",
        "province"     => "江苏",
        "city"         => "江山",
        "district"     => "江山市",
        "isp"          => "中国电信",
        "areacode"     => "江山",
        "countrycode"  => "CN",
        "countryenglish"=> "China",
        "timezone"      => "UTC+8",
        "latitude"      => "2.65283",
        "longitude"     => "0.96074"
    ],
    'test1' => [
        "ip"            => "999.999.999.999",
        "continent"     => "亚洲",
        "country"       => "中国",
        "province"     => "xxx",
        "city"         => "xxx",
        "district"     => "xxx",
        "isp"          => "中国移动",
        "areacode"     => "440100",
        "countrycode"  => "CN",
        "countryenglish"=> "China",
        "timezone"      => "UTC+8",
        "latitude"      => "2.273",
        "longitude"     => "1.53"
    ],
    'test2' => [
        "ip"            => "127.0.0.1",
        "continent"     => "亚洲",
        "country"       => "中国",
        "province"     => "火星",
        "city"         => "火星",
        "district"     => "浦东新区",
        "isp"          => "中国电信",
        "areacode"     => "310115",
        "countrycode"  => "CN",
        "countryenglish"=> "China",
        "timezone"      => "UTC+8",
        "latitude"      => "31.23037",
        "longitude"     => "121.47370"
    ]
];

// 检查是否存在key参数
if (!isset($_GET['key'])) {
    http_response_code(400);
    echo json_encode([
        "code" => 400,
        "msg"  => "必须提供有效的key参数"
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    exit;
}

// 获取并验证key
$requestKey = $_GET['key'];
if (array_key_exists($requestKey, $dataTemplates)) {
    $response = [
        "code" => 200,
        "msg"  => "success",
        "result" => $dataTemplates[$requestKey]
    ];
    echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
} else {
    http_response_code(404);
    echo json_encode([
        "code" => 404,
        "msg"  => "无效的key参数"
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}
?>
