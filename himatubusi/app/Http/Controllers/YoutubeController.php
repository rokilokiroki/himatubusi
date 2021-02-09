<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Service_YouTube;
use Google_Client;
use Google_Service_Exception;
use Google_Exception;

class YoutubeController extends Controller
{
    public $youtube;

    public function __construct()
    {
        $this->youtube = new Google_Service_YouTube($this->getClient());
    }

    private function getClient()
    {
        $client = new Google_Client();
        $client->setApplicationName("himatubushi");
        $client->setDeveloperKey(env('API_KEY'));
        return $client;
    }

    public function searchArashiMovie()
    {
        $params['q'] = "嵐 バラエティ";
        $params['type'] = 'video';
        $params['maxResults'] = 10;
        $params['order'] = 'date';
        try {
            $searchResponse = $this->youtube->search->listSearch('snippet', $params);
        } catch (Google_Service_Exception $e) {
            echo htmlspecialchars($e->getMessage());
            exit;
        } catch (Google_Exception $e) {
            echo htmlspecialchars($e->getMessage());
            exit;
        }
        foreach ($searchResponse['items'] as $search_result) {
            $videos[] = $search_result;
        }
        return $videos;
    }
}
