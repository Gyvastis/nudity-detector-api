<?php

require 'vendor/autoload.php';

$app = new Slim\App();

$app->post('/check', function(Slim\Http\Request $request, Slim\Http\Response $response){
    if($request->getContentType() == 'application/json') {
        $request_params = $request->getParsedBody();
        $response_params = [
            'success' => false,
            'message' => '',
            'data' => []
        ];

        if(empty($request_params)){
            $response_params['message'] = 'No parameters supplied';
        }
        else if(! isset($request_params['url']) || empty($request_params['url'])){
            $response_params['message'] = 'Image URL parameter missing';
        }
        else{
            $source_url = 'http://www.nudedetect.com/';

            $curl = new \Curl\Curl();
            $curl->setReferrer($source_url);
            $curl->post($source_url . 'process.php', [
                'url' => $request_params['url']
            ]);

            if ($curl->error) {
                $response_params['message'] = $curl->error_code;
            }
            else {
                $image_check_response = strtolower($curl->response);
                $curl->close();
                $image_check = preg_match_all("/([0-9]+\.[0-9]+%)<\/h[0-9]>\s([a-z]+)/i", $image_check_response, $image_check_data, PREG_PATTERN_ORDER);

                if( ! $image_check){
                    $response_params['message'] = 'Image check failed';
                }
                else{
                    $response_params['data'] = [
                        'nude' => $image_check_data[1][0],
                        'minimal' => $image_check_data[1][1]
                    ];
                    $response_params['message'] = 'Image processed successfully';
                    $response_params['success'] = true;
                }

            }
        }

        return $response->write(json_encode($response_params))->withHeader(
            'Content-Type',
            'application/json'
        );
    }
});

$app->run();