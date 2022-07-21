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
        
        $popularThreads = Thread::orderBy('reply_count', 'DESC')->take(4)->get();
        $brands = CarMaker::take(7)->get();

        $posts = Post::get();
        $categories = Category::get();

        $threads = Thread::join('users', 'users.id', '=', 'forum_threads.author_id')
            ->select('forum_threads.id',
                'forum_threads.category_id',
                'forum_threads.author_id',
                'forum_threads.title',
                'forum_threads.created_at',
                'forum_threads.first_post_id',
                'forum_threads.updated_at',
                'forum_threads.reply_count',
                'users.first_name',
                'users.last_name',
                'users.username',
                'users.avatar')
            ->get();

        foreach($threads as $thread){
            foreach($categories as $category){
                if($thread->category_id == $category->id){
                    $thread->category_name = $category->title;
                }
            }
            foreach($posts as $post){
                if($thread->first_post_id == $post->id){
                    $thread->content = $post->content;
                }
            }
            $thread->content = mb_strimwidth($thread->content, 0, 200, "...");
        }
        

        return view('forum/forum-index')
            ->with(['brands'=>$brands])
            ->with(['popularThreads'=>$popularThreads])
            ->with(['categories'=>$categories])
            ->with(['threads'=>$threads]);
    }

    public function viewThread(Request $request)
    {
        $categories = Category::get();
        $popularThreads = Thread::orderBy('reply_count', 'DESC')->take(4)->get();

        $threads = Thread::join('users', 'users.id', '=', 'forum_threads.author_id')
            ->join('forum_posts', 'forum_posts.thread_id', '=', 'forum_threads.id')
            ->where('forum_posts.sequence', '=', '1')
            ->where('forum_threads.id', '=', $request->key)
            ->select('forum_threads.id',
                'forum_threads.category_id',
                'forum_threads.author_id',
                'forum_threads.title',
                'forum_threads.first_post_id',
                'forum_threads.last_post_id',
                'forum_threads.reply_count',
                'forum_threads.created_at',
                'forum_posts.thread_id',
                'forum_posts.content',
                'users.first_name',
                'users.last_name',
                'users.username',
                'users.mobile_num',
                'users.email',
                'users.avatar')
            ->get();

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
            ->with(['popularThreads'=>$popularThreads])
            ->with(['categories'=>$categories])
            ->with(['thread'=>$thread]);
    }

    public function postComment(Request $request){
        

        $thread = Thread::where('id', '=', $request->thread_id)->first();

        $post= new Post();
        $post->thread_id= $request->thread_id;
        $post->author_id= $request->author_id;
        $post->content= $request->content;
        $post->post_id= $request->post_id;

        if(is_null($thread->reply_count))
        {
            $post->sequence= 2;
        }
        else 
            $post->sequence= ($thread->reply_count + 2);
        $post->save();

        $newThread=  Thread::findOrFail($request->thread_id);
        
        if(is_null($thread->reply_count)){
            $newThread->reply_count= 1;
        }
        else 
            $newThread->reply_count= ($thread->reply_count +1);
        $post->save();
        $newThread->last_post_id=  $post->id;
        $newThread->save();

        Alert::success('Success');
        return redirect()->route('forums.thread', $request->thread_id);
    }

    public function postThread(Request $request){

        $thread= new Thread();
        $thread->category_id= $request->category_id;
        $thread->author_id= $request->author_id;
        $thread->title= $request->Title;
        $thread->first_post_id= 0;
        $thread->last_post_id= 0;
        $thread->pinned= 0;
        $thread->locked= 0;
        $thread->reply_count= 0;
        $thread->save();

        $post= new Post();
        $post->thread_id= $thread->id;
        $post->author_id= $request->author_id;
        $post->content= $request->content;
        $post->sequence= 1;
        $post->save();

        Thread::where("id", '=', $thread->id)
            ->update(["first_post_id" =>  $post->id,
            "last_post_id" => $post->id,
        ]);

        Alert::success('Success');
        return redirect()->route('forums.thread', $thread->id);
    }


    public function updateThread(Request $request){


        Thread::where("id", '=', $request->thread_id)
            ->update([
                "category_id" => $request->category_id,
                "author_id" => $request->author_id,
                "title" => $request->title,
        ]);

        Post::where("id", '=', $request->first_post_id)
            ->update([
                "content" => $request->content,
        ]);

        Alert::success('Success');
        return redirect()->route('forums.thread', $request->thread_id);
    }




    public function searchThread(Request $request)
    {
        $threads = Thread::join('users', 'users.id', '=', 'forum_threads.author_id')
        ->join('forum_posts', 'forum_posts.thread_id', '=', 'forum_threads.id')
        ->where('forum_posts.sequence', '=', '1')
        ->where('forum_threads.title', 'like',  '%' . $request->thread_title .'%')
        ->orWhere('forum_posts.content', 'like',  '%' . $request->thread_title .'%')
        ->get();

        $categories = Category::get();
        $popularThreads = Thread::orderBy('reply_count', 'DESC')->take(4)->get();


        foreach($threads as $thread){
            foreach($categories as $category){
                if($thread->category_id == $category->id){
                    $thread->category_name = $category->title;
                }
            }
            $thread->content = mb_strimwidth($thread->content, 0, 200, "...");
        }

        $brands = CarMaker::take(7)->get();


        return view('forum/forum-index')
            ->with(['brands'=>$brands])
            ->with(['popularThreads'=>$popularThreads])
            ->with(['categories'=>$categories])
            ->with(['threads'=>$threads]);
    }

    public function showThreadsByCategory(Request $request)
    {
        $categories = Category::get();
        $popularThreads = Thread::orderBy('reply_count', 'DESC')->take(4)->get();
        $brands = CarMaker::take(7)->get();
        $posts = Post::get();

        $threads = Thread::join('users', 'users.id', '=', 'forum_threads.author_id')
            ->where('category_id', '=', $request->key)
            ->select('forum_threads.id',
                'forum_threads.category_id',
                'forum_threads.author_id',
                'forum_threads.title',
                'forum_threads.created_at',
                'forum_threads.first_post_id',
                'forum_threads.updated_at',
                'users.first_name',
                'users.last_name',
                'users.username',
                'users.avatar')
            ->get();

        foreach($threads as $thread){
            foreach($categories as $category){
                if($thread->category_id == $category->id){
                    $thread->category_name = $category->title;
                }
            }
            foreach($posts as $post){
                if($thread->first_post_id == $post->id){
                    $thread->content = $post->content;
                }
            }
            $thread->content = mb_strimwidth($thread->content, 0, 200, "...");
        }

        return view('forum/forum-index')
            ->with(['brands'=>$brands])
            ->with(['popularThreads'=>$popularThreads])
            ->with(['categories'=>$categories])
            ->with(['threads'=>$threads]);
    }
}
