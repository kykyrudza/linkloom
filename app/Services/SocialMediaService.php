<?php

namespace App\Services;

use GuzzleHttp\Client;

class SocialMediaService
{
    protected $client;
    protected $accessTokens;

    public function __construct()
    {
        $this->client = new Client();
        $this->accessTokens = [
            'instagram' => env('INSTAGRAM_ACCESS_TOKEN'),
            'twitter' => env('TWITTER_ACCESS_TOKEN'),
            'facebook' => env('FACEBOOK_ACCESS_TOKEN'),
        ];
    }

    public function getInstagramNickname($url)
    {
        $username = basename(rtrim($url, '/'));
        $accessToken = $this->accessTokens['instagram'];

        try {
            $response = $this->client->get("https://graph.instagram.com/v12.0/{$username}?fields=username&access_token={$accessToken}");
            $data = json_decode($response->getBody()->getContents(), true);
            return $data['username'] ?? null;
        } catch (\Exception $e) {
            // Логирование ошибок
            return null;
        }
    }

    public function getTwitterNickname($url)
    {
        $username = basename(rtrim($url, '/'));
        $accessToken = $this->accessTokens['twitter'];

        try {
            $response = $this->client->get("https://api.twitter.com/2/users/by/username/{$username}", [
                'headers' => [
                    'Authorization' => "Bearer {$accessToken}",
                ],
            ]);
            $data = json_decode($response->getBody()->getContents(), true);
            return $data['data']['username'] ?? null;
        } catch (\Exception $e) {
            // Логирование ошибок
            return null;
        }
    }

    public function getFacebookNickname($url)
    {
        $username = basename(rtrim($url, '/'));
        $accessToken = $this->accessTokens['facebook'];

        try {
            $response = $this->client->get("https://graph.facebook.com/{$username}?fields=username&access_token={$accessToken}");
            $data = json_decode($response->getBody()->getContents(), true);
            return $data['username'] ?? null;
        } catch (\Exception $e) {
            // Логирование ошибок
            return null;
        }
    }
}
