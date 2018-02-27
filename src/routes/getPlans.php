<?php

$app->post('/api/TestRail/getPlans', function ($request, $response) {

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['appName','username','apiKey','projectId']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $requiredParams = ['appName'=>'appName','username'=>'username','apiKey'=>'apiKey','projectId'=>'projectId'];
    $optionalParams = ['createdAfter'=>'created_after','createdBefore'=>'created_before','createdBy'=>'created_by','isCompleted'=>'is_completed','limit'=>'limit','offset'=>'offset','milestoneId'=>'milestone_id'];
    $bodyParams = [
       'query' => ['created_after','created_before','created_by','is_completed','limit','offset','milestone_id']
    ];

    $data = \Models\Params::createParams($requiredParams, $optionalParams, $post_data['args']);

    
    if(isset($data['created_after'])) { $data['created_after'] = \Models\Params::toFormat($data['created_after'], 'unixtime'); }
    if(isset($data['created_before'])) { $data['created_before'] = \Models\Params::toFormat($data['created_before'], 'unixtime'); }
    if(isset($data['created_by'])) { $data['created_by'] = \Models\Params::toString($data['created_by'], ','); }
    if(isset($data['milestone_id'])) { $data['milestone_id'] = \Models\Params::toString($data['milestone_id'], ','); }

    $client = $this->httpClient;
    $query_str = "https://{$data['appName']}.testrail.io/index.php?/api/v2/get_plans/{$data['projectId']}";

    

    $requestParams = \Models\Params::createRequestBody($data, $bodyParams);
    $requestParams['headers'] = ["Content-Type"=>"application/json"];
    $requestParams["auth"] = [$data['username'],$data['apiKey']];

    try {
        $resp = $client->get($query_str, $requestParams);
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