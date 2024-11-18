<?php
// 设置响应的内容类型为 JSON
header('Content-Type: application/json');

// 检查POST数据是否存在
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 从POST请求中获取数据
    $postData = $_POST;

    // 处理数据（这里假设接收一个名为'name'的字段）
    if (isset($postData['option'])) {
        $opt = $postData['option'];
        // 创建一个关联数组作为返回结果
        if ($opt === 'get_ver') {
            $response = [
                'status' => 'success',
                'version' => '1.0',
            ];
        }
    } else {
        // 如果'name'字段不存在，则返回错误信息
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
