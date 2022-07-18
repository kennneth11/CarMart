<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CarMaker;
use TeamTeaTime\Forum\Models\Thread;
use TeamTeaTime\Forum\Models\Category;
use TeamTeaTime\Forum\Models\Post;
use RealRashid\SweetAlert\Facades\Alert;

class ForumController extends Controller
{

    public function index()
    {
        $threads = Thread::join('users', 'users.id', '=', 'forum_threads.author_id')
            ->join('forum_posts', 'forum_posts.thread_id', '=', 'forum_threads.id')
            ->where('forum_posts.sequence', '=', '1')
            ->get();

        $categories = Category::get();


        foreach($threads as $thread){
            foreach($categories as $category){
                if($thread->category_id == $category->id){
                    $thread->category_name = $category->title;
                }
            }

        }

        $brands = CarMaker::take(7)->get();

 
        return view('forum/forum-index')
            ->with(['brands'=>$brands])
            ->with(['threads'=>$threads]);
    }

    public function viewThread(Request $request)
    {
        $threads = Thread::join('users', 'users.id', '=', 'forum_threads.author_id')
            ->join('forum_posts', 'forum_posts.thread_id', '=', 'forum_threads.id')
            ->where('forum_posts.sequence', '=', '1')
            ->where('forum_threads.id', '=', $request->key)
            ->get();

        $categories = Category::get();

        foreach($threads as $thread){
            foreach($categories as $category){
                if($thread->category_id == $category->id){
                    $thread->category_name = $category->title;
                }
            }

        }

        $allPosts = Post::join('users', 'users.id', '=', 'forum_posts.author_id')
            ->select('forum_posts.id',
            'forum_posts.thread_id',
            'forum_posts.author_id',
            'forum_posts.post_id',
            'forum_posts.content',
            'forum_posts.sequence',
            'forum_posts.created_at',
            'forum_posts.updated_at',
            'users.first_name',
            'users.last_name',
            'users.username',
            'users.avatar')
            ->get();

        $posts = Post::where('thread_id', '=', $request->key)
            ->join('users', 'users.id', '=', 'forum_posts.author_id')
            ->select('forum_posts.id',
                'forum_posts.thread_id',
                'forum_posts.author_id',
                'forum_posts.post_id',
                'forum_posts.content',
                'forum_posts.sequence',
                'forum_posts.created_at',
                'forum_posts.updated_at',
                'users.first_name',
                'users.last_name',
                'users.username',
                'users.avatar')
            ->orderBy('sequence', 'ASC')->get();

        foreach($posts as $post){
            foreach($allPosts as $allPost){
                if($post->post_id == $allPost->id){
                    $post->replied_content = $allPost->content;
                    $post->replied_created_at = $allPost->created_at;
                    $post->replied_first_name = $allPost->first_name;
                    $post->replied_last_name = $allPost->last_name;
                    $post->replied_avatar = $allPost->avatar;
                    
                }
            }
        }
  
    

        $postsCount = $posts->count();
        $brands = CarMaker::take(7)->get();


     

        return view('forum/forum-view-thread')
            ->with(['brands'=>$brands])
            ->with(['posts'=>$posts])
            ->with(['postsCount'=>$postsCount])
            ->with(['thread'=>$thread]);
    }

    public function postComment(Request $request){

        $thread = Thread::where('id', '=', $request->thread_id)->first();



        $post= new Post();
        $post->thread_id= $request->thread_id;
        $post->author_id= $request->author_id;
        $post->content= $request->content;
        $post->sequence= ($thread->reply_count + 2);
        $post->save();

        $newThread=  Thread::findOrFail($request->thread_id);
        $newThread->reply_count= ($thread->reply_count +1);
        $newThread->save();

        Alert::success('Success');
        return redirect()->route('forums.thread', $request->thread_id);
    }
}
