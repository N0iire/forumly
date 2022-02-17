<?php

namespace App\Http\Controllers\Pages;

use App\Contracts\ViewsContract;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use App\Models\Thread;
use App\Models\Category;
use App\Jobs\CreateThread;
use App\Jobs\UpdateThread;
use Illuminate\Http\Request;
use App\Policies\ThreadPolicy;
use Illuminate\Container\Container;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Requests\ThreadStoreRequest;
use App\Jobs\SubscribeToSubscriptionAble;
use App\Jobs\UnsubscribeFromSubscriptionAble;
use App\Models\Like;
use Carbon\Carbon;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Database\Eloquent\Builder;

class ThreadController extends Controller
{
    public function __construct()
    {
        return $this->middleware([Authenticate::class, EnsureEmailIsVerified::class])->except(['index', 'show']);
    }

    public function index()
    {
        return view('pages.threads.index', [
            'threads'       => Thread::orderBy('id', 'desc')->paginate(10),
        ]);
    }

    public function create()
    {
        return view('pages.threads.create', [
            'categories'    => Category::all(),
            'tags'          => Tag::all(),
        ]);
    }

    public function store(ThreadStoreRequest $request)
    {
        $this->dispatchSync(CreateThread::fromRequest($request));

        return redirect()->route('threads.index')->with('success', 'Thread created!');
    }

    public function show(Category $category, Thread $thread)
    {
        $expireAt = now()->addHours(12);

        views($thread)
            ->cooldown($expireAt)
            ->record();

        return view('pages.threads.show', compact('thread', 'category'));
    }

    public function edit(Thread $thread)
    {
        $this->authorize(ThreadPolicy::UPDATE, $thread);

        $oldTags = $thread->tags()->pluck('id')->toArray();
        $selectedCategory = $thread->category;

        return view('pages.threads.edit', [
            'thread'            => $thread,
            'tags'              => Tag::all(),
            'oldTags'           => $oldTags,
            'categories'        => Category::all(),
            'selectedCategory'  => $selectedCategory,
        ]);
    }

    public function update(ThreadStoreRequest $request, Thread $thread)
    {
        $this->authorize(ThreadPolicy::UPDATE, $thread);

        $this->dispatchSync(UpdateThread::fromRequest($thread, $request));

        return redirect()->route('threads.index')->with('success', 'Thread Updated!');
    }

    public function subscribe(Request $request, Thread $thread)
    {
        $this->authorize(ThreadPolicy::SUBSCRIBE, $thread);

        $this->dispatchSync(new SubscribeToSubscriptionAble($request->user(), $thread));

        return redirect()->route('threads.show', [$thread->category->slug(), $thread->slug()])
            ->with('success', 'You have been subscribed to this thread');
    }

    public function unsubscribe(Request $request, Thread $thread)
    {
        $this->authorize(ThreadPolicy::UNSUBSCRIBE, $thread);

        $this->dispatchSync(new UnsubscribeFromSubscriptionAble($request->user(), $thread));

        return redirect()->route('threads.show', [$thread->category->slug(), $thread->slug()])
            ->with('success', 'You have been unsubscribed from this thread');
    }

    public function sortByCategory($slug)
    {
        return view('pages.threads.index', [
            'threads'       => Thread::whereHas('category', function (Builder $q) use ($slug) {
                $q->where('slug', '=', $slug);
            })->paginate(10),
        ]);
    }

    public function thisWeek()
    {
        $threads = Thread::leftJoin('views', 'views.viewable_id', '=', 'threads.id')
            ->selectRaw('threads.*, COUNT(views.viewable_id) AS view_count')
            ->whereBetween('created_at', [Carbon::now()->subWeek()->format("Y-m-d H:i:s"), Carbon::now()])
            ->groupBy('threads.id')
            ->orderByDesc('view_count');

        return view('pages.threads.index', [
            'threads'       => $threads->paginate(10),
        ]);
    }

    public function allTime()
    {
        $threads = Thread::leftJoin('views', 'views.viewable_id', '=', 'threads.id')
            ->selectRaw('threads.*, COUNT(views.viewable_id) AS view_count')
            ->groupBy('threads.id')
            ->orderByDesc('view_count');

        return view('pages.threads.index', [
            'threads'       => $threads->paginate(10),
        ]);
    }

    public function zeroComment()
    {
        $threads = Thread::leftJoin('replies', 'replies.replyable_id', '=', 'threads.id')
            ->selectRaw('threads.*')
            ->groupBy('threads.id')
            ->whereNull('replies.replyable_id');

        return view('pages.threads.index', [
            'threads'       => $threads->paginate(10),
        ]);
    }

    public function search(Request $request)
    {
        $threads = Thread::where('title', 'LIKE', '%'.$request->search.'%')
            ->orWhere('slug', 'LIKE', '%'.$request->search.'%')
            ->orWhere('body', 'LIKE', '%'.$request->search.'%');

        return view('pages.threads.index', [
            'threads'       => $threads->paginate(10),
        ]);
    }
}
