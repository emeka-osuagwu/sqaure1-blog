<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use App\Http\Services\PostService;


class PostImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'import post from api';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $n = 0;
        $dataPost = [];
        $client = new Client(['base_uri' => env('API_POSTS')]);
        $response = $client->request('GET', 'posts');
        
        $data = json_decode($response->getBody()->getContents());
        foreach ($data->data as $key => $post) {
            $findPost = $this->postService->findWhere('title', $post->title)->get()->count();
            
            if ($findPost == 0) { 

                $newPost = [
                    'user_id' => 1,
                    'title' => $post->title,
                    'description' => $post->description,
                    'publication_date' => $post->publication_date,
                ];

                $this->postService->create($newPost);
                $n++;
            }
        }
        $this->info($n.' posts were imported.');
    }
}
