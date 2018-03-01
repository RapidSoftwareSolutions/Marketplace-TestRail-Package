<?php

$app->post('/api/TestRail/createsMilestone', function ($request, $response) {

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['appName','username','apiKey','projectId','name']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $requiredParams = ['appName'=>'appName','username'=>'username','apiKey'=>'apiKey','projectId'=>'projectId','name'=>'name'];
    $optionalParams = ['description'=>'description','dueOn'=>'due_on','parentId'=>'parent_id','startOn'=>'start_on'];
    $bodyParams = [
       'json' => ['name','description','due_on','parent_id','start_on']
    ];

    $data = \Models\Params::createParams($requiredParams, $optionalParams, $post_data['args']);

    if(!empty($data['due_on']))
    {
        $data['due_on'] = \Models\Params::toFormat($data['due_on'], 'unixtime');

    }

    if(!empty($data['start_on']))
    {
        $data['start_on'] = \Models\Params::toFormat($data['start_on'], 'unixtime');
    }

    $client = $this->httpClient;
    $query_str = "https://{$data['appName']}.testrail.io/index.php?/api/v2/add_milestone/{$data['projectId']}";

    

    $requestParams = \Models\Params::createRequestBody($data, $bodyParams);
    $requestParams['headers'] = ["Content-Type"=>"application/json"];
    $requestParams["auth"] = [$data['username'],$data['apiKey']];
    exit();
    try {
        $resp = $client->post($query_str, $requestParams);
        $responseBody = $resp->getBody()->getContents();

        if(in_array($resp->getStatusCode(), ['200', '201', '202', '203', '204'])) {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
            if(empty($result['contextWrites']['to'])) {
                $result['contextWrites']['to']['status_msg'] = "Api return no results";
            }
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ConnectException $exception) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
        $result['contextWrites']['to']['status_msg'] = 'Something went wrong inside the package.';

    }

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});