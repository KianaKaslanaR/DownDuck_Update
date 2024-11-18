<?php
// 设置响应的内容类型为 JSON
header('Content-Type: application/json');

// 初始化默认响应
$response = [
    'status' => 'error',
    'message' => 'An unexpected error occurred.'
];

// 检查请求方法
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 从POST请求中获取数据
    $postData = $_POST;

    // 检查是否存在'option'字段
    if (isset($postData['option'])) {
        $opt = $postData['option'];

        // 根据'option'的值进行不同的处理
        if ($opt === 'get_ver') {
            $response = [
                'status' => 'success',
                'version' => '1.0',
            ];
        } else {
            // 如果没有匹配的操作
            $response = [
                'status' => 'error',
                'message' => 'Invalid option provided.',
            ];
        }
    } else {
        // 如果'option'字段不存在，则返回错误信息
        $response = [
            'status' => 'error',
            'message' => 'No relevant operations found.',
        ];
    }
} else {
    // 如果请求方法不是POST，则返回错误信息
    $response = [
        'status' => 'error',
        'message' => 'Invalid request method.',
    ];
}

// 输出JSON格式的响应
echo json_encode($response);
