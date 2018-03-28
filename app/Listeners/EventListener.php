<?php

namespace App\Listeners;

use App\Events\Event;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Session\Store;

class EventListener
{
    protected  $seesion;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Store $session)
    {
        $this->seesion = $session;
    }

    /**
     * Handle the event.
     *
     * @param  Event  $event
     * @return void
     */
    public function handle(Event $event)
    {
        $post = $event->post;
        //先进行判断是否已经查看过
        if(!$this->hasViewedBlog($post)){
            //保存到数据库
            $post->view_cache = $post->view_cache +1;
            $post->save();
            //看过之后将保存到 Session
            $this->storeViewedBlogs($post);
        };
    }

    protected function  hasViewedBlog($post){
        return array_key_exists($post->id , $this->getViewdBlogs());
    }

    protected  function getViewdBlogs(){
        return $this->seesion->get('viewed_Blogs',[]);
    }

    protected function storeViewedBlogs($post){
        $key = 'viewed_Blogs.'.$post->id;
        $this->session->put($key ,time());
    }
}
